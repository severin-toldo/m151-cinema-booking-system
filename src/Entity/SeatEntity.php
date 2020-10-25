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
 * @Table(name="seat")
 * @ORM\Entity(repositoryClass="App\Repository\SeatEntityRepository")
 */
class SeatEntity {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(name="row_position", type="integer")
     */
    private int $rowPosition;

    /**
     * @ManyToOne(targetEntity="App\Entity\SeatRowEntity")
     */
    private SeatRowEntity $seatrow;

    public function getDisplayName(): string {
        return 'Seat ' . $this->seatrow->getLetter() . $this->rowPosition;
    }

    /**
     * Not persisted
     */
    private bool $reserved = false;


    #region getters & setters

    /**
     * @return bool
     */
    public function isReserved(): bool {
        return $this->reserved;
    }

    /**
     * @param bool $reserved
     */
    public function setReserved(bool $reserved): void {
        $this->reserved = $reserved;
    }

    /**
     * @return SeatRowEntity
     */
    public function getSeatrow(): SeatRowEntity {
        return $this->seatrow;
    }

    /**
     * @param SeatRowEntity $seatrow
     */
    public function setSeatrow(SeatRowEntity $seatrow): void {
        $this->seatrow = $seatrow;
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
     * @return int
     */
    public function getRowPosition(): int {
        return $this->rowPosition;
    }

    /**
     * @param int $rowPosition
     */
    public function setRowPosition(int $rowPosition): void {
        $this->rowPosition = $rowPosition;
    }

    #endregion
}
