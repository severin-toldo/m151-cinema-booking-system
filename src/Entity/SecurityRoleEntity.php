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
use Doctrine\ORM\PersistentCollection;

/**
 * @Entity
 * @Table(name="security_role")
 * @ORM\Entity(repositoryClass="App\Repository\SecurityRoleEntityRepository")
 */
class SecurityRoleEntity {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\ManyToMany(targetEntity="SecurityPermissionEntity")
     * @ORM\JoinTable(name="security_role_permission",
     *     joinColumns={@ORM\JoinColumn(name="security_role_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="security_permission_id", referencedColumnName="id")}
     *     )
     */
    private Collection $securityPermissions;

    public function __construct() {
        $this->securityPermissions = new ArrayCollection();
    }


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
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * @return Collection
     */
    public function getSecurityPermissions(): Collection {
        return $this->securityPermissions;
    }

    /**
     * @param Collection $securityPermissions
     */
    public function setSecurityPermissions(Collection $securityPermissions): void {
        $this->securityPermissions = $securityPermissions;
    }

    #endregion
}