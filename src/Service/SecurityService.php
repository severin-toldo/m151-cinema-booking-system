<?php


namespace App\Service;


use App\Entity\SecurityRoleEntity;
use App\Entity\UserEntity;
use App\Model\Role;
use App\Utils\CommonUtils;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityService {

    private EntityManagerInterface $em;
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder) {
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param $user
     *
     * @return true if user is logged in
     * @return false if user isn't logged in
     */
    public function isLoggedIn($user): bool {
        return !!$user;
    }

    /**
     * @param $user
     *
     * @return true if user is employee or admin
     * @return false if user is customer or not logged in
     */
    public function isInternal($user): bool {
        return $this->isLoggedIn($user) && $this->hasRole(Role::ADMIN, $user) || $this->hasRole(Role::EMPLOYEE, $user);
    }

    /**
     * @param string role
     * @param $user
     *
     * @return true if user has given role
     * @return false if user doesn't have the given role or if user isn't logged in
     */
    public function hasRole(string $role, $user): bool {
        return $this->isLoggedIn($user) && (in_array($role, $user->getRoles()));
    }

    /**
     * @param array $roleNames Array of Permission Names
     * @param $user
     *
     * @return true if user has at least on of the given roles
     * @return false if user has none of the given roles or if user isn't logged in
     */
    public function hasAnyRole(array $roleNames, $user): bool {
        return $this->isLoggedIn($user) && !empty(array_intersect($roleNames, $user->getRoles()));
    }

    /**
     * @param string $permission
     * @param $user
     *
     * @return true if user has given permission
     * @return false if user doesn't have the given permission or if user isn't logged in
     */
    public function hasPermission(string $permission, $user): bool {
        if (empty($permission)) {
            return true;
        }

        $userPermissions = CommonUtils::mapToName($this->getSecurityPermissionsByUser($user));

        return $this->isLoggedIn($user) && in_array($permission, $userPermissions);
    }

    /**
     * @param array $permissions Array of Permission Names
     * @param $user
     *
     * @return true if user has at least on of the given permissions
     * @return false if user has none of the given permissions or if user isn't logged in
     */
    public function hasAnyPermission(array $permissions, $user) {
        if (empty($permissions)) {
            return true;
        }

        $userPermissions = CommonUtils::mapToName($this->getSecurityPermissionsByUser($user));

        return $this->isLoggedIn($user) && !empty(array_intersect($permissions, $userPermissions));
    }

    /**
     * @param UserEntity $userEntity
     *
     * @return array collects all securitiy roles from agiven user.
     */
    public function getSecurityPermissionsByUser(UserEntity $userEntity): array {
        $securityPermissions = [];

        foreach ($userEntity->getSecurityRoles()->toArray() as $securityRole) {
            foreach ($securityRole->getSecurityPermissions()->toArray() as $securityPermission) {
                array_push($securityPermissions, $securityPermission);
            }
        }

        return $securityPermissions;
    }

    /**
     * @param UserEntity $user
     * @param string $plainPassword
     *
     * @return string the encoded password
     */
    public function encodePassword(UserEntity $user, string $plainPassword): string {
        return $this->passwordEncoder->encodePassword($user, $plainPassword);
    }

    /**
     * @param array $roleNames
     *
     * @return array SecurityRoleEntites by their role names
     */
    public function roleNamesToSecurityRoles(array $roleNames): array {
        return $this
            ->em
            ->getRepository(SecurityRoleEntity::class)
            ->findBy(['name' => $roleNames]);
    }
}