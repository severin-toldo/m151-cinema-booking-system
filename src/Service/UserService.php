<?php


namespace App\Service;


use App\Entity\UserEntity;
use App\Model\Role;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Constraints\IsTrue;


class UserService {

    private EntityManagerInterface $em;
    private SecurityService $ss;

    public function __construct(EntityManagerInterface $em, SecurityService $ss) {
        $this->em = $em;
        $this->ss = $ss;
    }

    /**
     * @param int $id
     *
     * @return UserEntity employee by id or null
     */
    public function getEmployeeById(int $id): ?UserEntity {
        return $this->getUserByRoleAndId(Role::EMPLOYEE, $id);
    }

    /**
     * @return array list of all employees
     */
    public function getEmployees(): array {
        return $this->getUsersByRole(Role::EMPLOYEE);
    }

    /**
     * @param int $id
     *
     * @return UserEntity customer by id or null
     */
    public function getCustomerById(int $id): ?UserEntity {
        return $this->getUserByRoleAndId('', $id);
    }

    /**
     * @return array list of all customers
     */
    public function getCustomers(): array {
        return $this->getUsersByRole('');
    }

    /**
     * @param $newUserEntity
     * @param array $securityRoles if empty, role of the given user will be saved
     *
     * Saves a user entity and encodes the plain password.
     * Used to save a new user or to save user profile data.
     */
    public function saveUserAndPassword($newUserEntity, array $securityRoles = []): void {
        $encodedPassword = $this->ss->encodePassword($newUserEntity, $newUserEntity->getPlainPassword());
        $newUserEntity->setPassword($encodedPassword);

        $roles = empty($securityRoles) ? $newUserEntity->getSecurityRoles() : new ArrayCollection($this->ss->roleNamesToSecurityRoles($securityRoles));
        $newUserEntity->setSecurityRoles($roles);

        $this->em->persist($newUserEntity);
        $this->em->flush();
    }

    /**
     * @param FormBuilderInterface $fb FormBuilder to use
     * @param string $formActionRoute route to send form response to
     * @param array $excludedFieldNames names of fields to exclude
     *
     * Used to build a dynamic user form, which is used in different places.
     *
     * @return FormInterface built form
     */
    public function buildUserForm(FormBuilderInterface $fb, string $formActionRoute, array $excludedFieldNames): FormInterface {
        $fb->setAction($formActionRoute);

        if (!in_array('firstName', $excludedFieldNames)) {
            $fb->add(
                'firstName',
                TextType::class,
                [
                    'label' => 'First Name*',
                    'empty_data' => '',
                ]
            );
        }

        if (!in_array('lastName', $excludedFieldNames)) {
            $fb->add(
                'lastName',
                TextType::class,
                [
                    'label' => 'Last Name*',
                    'empty_data' => '',
                ]
            );
        }

        if (!in_array('phonenumber', $excludedFieldNames)) {
            $fb->add(
                'phonenumber',
                TextType::class,
                [
                    'label' => 'Phone number',
                    'empty_data' => '',
                    'required' => false,
                ]
            );
        }

        if (!in_array('email', $excludedFieldNames)) {
            $fb->add(
                'email',
                EmailType::class,
                [
                    'label' => 'E-Mail*',
                    'empty_data' => ''
                ]
            );
        }

        if (!in_array('plainPassword', $excludedFieldNames)) {
            $fb->add(
                'plainPassword',
                PasswordType::class,
                [
                    'label' => 'Password*',
                    'empty_data' => '',
                ]
            );
        }

        if (!in_array('agreeTerms', $excludedFieldNames)) {
            $fb->add(
                'agreeTerms',
                CheckboxType::class,
                [
                    'label' => 'Agree Terms and Conditions*',
                    'empty_data' => false,
                    'mapped' => false,
                    'constraints' => [
                        new IsTrue(['message' => 'You should agree to our terms.']),
                    ],
                ]
            );
        }

        return $fb
            ->add(
                'submit',
                SubmitType::class,
                ['label' => 'Submit']
            )
            ->add(
                'reset',
                ResetType::class,
                ['label' => 'Reset']
            )
            ->getForm();
    }

    /**
     * @return UserEntity empty user entity with all values set to default
     */
    public function getEmptyUserEntity(): UserEntity {
        $user = new UserEntity();
        $user->setFirstName('');
        $user->setLastName('');
        $user->setPhonenumber('');
        $user->setPlainPassword('');
        $user->setEmail('');
        return $user;
    }

    /**
     * @param string $roleName
     * @param int $id
     *
     * @return UserEntity user with the given role and id or null
     */
    private function getUserByRoleAndId(string $roleName, int $id): ?UserEntity {
        $user = $this->em
            ->getRepository(UserEntity::class)
            ->find($id);

        // handle customers
        if (empty($roleName)) {
            return !$this->ss->isInternal($user) ? $user : null;
        } else {
            return $this->ss->hasRole($roleName, $user) ? $user : null;
        }
    }

    /**
     * @param string $role
     *
     * @return array users with given the role
     */
    private function getUsersByRole(string $role): array {
        $users = $this->em
            ->getRepository(UserEntity::class)
            ->findAll();

        $usersByRole = [];

        foreach ($users as $user) {
            // handle customers
            if (empty($role)) {
                if (!$this->ss->hasAnyRole([Role::EMPLOYEE, Role::ADMIN], $user)) {
                    array_push($usersByRole, $user);
                }
            } else {
                if ($this->ss->hasRole($role, $user)) {
                    array_push($usersByRole, $user);
                }
            }
        }

        return $usersByRole;
    }
}