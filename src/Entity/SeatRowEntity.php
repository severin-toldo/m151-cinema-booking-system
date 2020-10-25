<?php
namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="seatrow")
 * @ORM\Entity(repositoryClass="App\Repository\SeatRowEntityRepository")
 */
class SeatRowEntity {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="string", length=1)
     */
    private string $letter;

    /**
     * @ManyToOne(targetEntity="App\Entity\HallEntity")
     */
    private HallEntity $hall;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SeatEntity", mappedBy="seatrow")
     */
    private Collection $seats;

    #region getters & setters

    /**
     * @return Collection
     */
    public function getSeats(): Collection {
        return $this->seats;
    }

    /**
     * @param Collection $seats
     */
    public function setSeats(Collection $seats): void {
        $this->seats = $seats;
    }

    /**
     * @return HallEntity
     */
    public function getHall(): HallEntity {
        return $this->hall;
    }

    /**
     * @param HallEntity $hall
     */
    public function setHall(HallEntity $hall): void {
        $this->hall = $hall;
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
    public function getLetter(): string {
        return $this->letter;
    }

    /**
     * @param string $letter
     */
    public function setLetter(string $letter): void {
        $this->letter = $letter;
    }

    #endregion
}