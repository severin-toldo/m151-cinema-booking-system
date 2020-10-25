<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @Entity
 * @Table(name="reservation")
 * @ORM\Entity(repositoryClass="App\Repository\ReservationEntityRepository")
 */
class ReservationEntity {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="string", length=13, unique=true)
     */
    private string $code;

    /**
     * @ManyToOne(targetEntity="App\Entity\SeatEntity")
     */
    private SeatEntity $seat;

    /**
     * @ManyToOne(targetEntity="App\Entity\PresentationEntity")
     */
    private PresentationEntity $presentation;

    /**
     * @ManyToOne(targetEntity="App\Entity\UserEntity")
     */
    private UserEntity $user;

    /**
     * @Column(type="boolean", nullable=false, options={"default" : true})
     */
    private bool $valid = true;

    public function getDisplayName(): string {
        $reservationStatus = $this->valid ? 'Pending' : 'Served';
        return $this->getPresentation()->getDisplayName() . ', ' . $this->seat->getDisplayName() . ' | ' . $reservationStatus;
    }

    #region getters & setters

    /**
     * @return bool
     */
    public function isValid(): bool {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid(bool $valid): void {
        $this->valid = $valid;
    }

    /**
     * @return SeatEntity
     */
    public function getSeat(): SeatEntity {
        return $this->seat;
    }

    /**
     * @param SeatEntity $seat
     */
    public function setSeat(SeatEntity $seat): void {
        $this->seat = $seat;
    }

    /**
     * @return PresentationEntity
     */
    public function getPresentation(): PresentationEntity {
        return $this->presentation;
    }

    /**
     * @param PresentationEntity $presentation
     */
    public function setPresentation(PresentationEntity $presentation): void {
        $this->presentation = $presentation;
    }

    /**
     * @return UserEntity
     */
    public function getUser(): UserEntity {
        return $this->user;
    }

    /**
     * @param UserEntity $user
     */
    public function setUser(UserEntity $user): void {
        $this->user = $user;
    }

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
    public function getCode(): string {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void {
        $this->code = $code;
    }

    #endregion
}