<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * @Entity
 * @Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserEntityRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class UserEntity implements UserInterface {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private string $firstName;

    /**
     * @Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private string $lastName;

    /**
     * @Column(type="string", length=10, nullable=true)
     * @Assert\Length(max="10")
     */
    private ?string $phonenumber = null;

    /**
     * @Column(type="string", length=255)
     * @Assert\Email()
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private string $email;

    /**
     * @Length(min="6", max="4096")
     */
    private string $plainPassword;

    /**
     * @Column(type="string", length=128)
     */
    private string $password;

    /**
     * @ORM\ManyToMany(targetEntity="SecurityRoleEntity")
     * @ORM\JoinTable(name="user_security_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="security_role_id", referencedColumnName="id")}
     *     )
     */
    private Collection $securityRoles;

    public function __construct() {
        $this->securityRoles = new ArrayCollection();
    }

    #region UserInterface

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return string[] The user roles
     */
    public function getRoles() {
        if($this->securityRoles !== null) {
            $securityRolesArray = $this->securityRoles->getValues();
            $roles = array();
            foreach ($securityRolesArray as $securityRole) {
                $roles[] = $securityRole->getName();
            }

            return $roles;
        }

        return array();
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string|null The encoded password if any
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt(){
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername() {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials(){

    }

    #endregion

    #region getters & setters

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhonenumber(): ?string {
        return $this->phonenumber;
    }

    /**
     * @param string $phonenumber
     */
    public function setPhonenumber(?string $phonenumber): void {
        $this->phonenumber = $phonenumber;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPlainPassword(): string {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword): void {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return Collection
     */
    public function getSecurityRoles(): Collection {
        return $this->securityRoles;
    }

    /**
     * @param Collection $securityRoles
     */
    public function setSecurityRoles(Collection $securityRoles): void {
        $this->securityRoles = $securityRoles;
    }

    public function getDisplayName(): string {
        return $this->getFirstName() . ', ' . $this->getLastName();
    }

    #endregion
}