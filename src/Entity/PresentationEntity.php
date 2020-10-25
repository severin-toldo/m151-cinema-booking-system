<?php
namespace App\Entity;

use App\Model\TimeUnit;
use App\Utils\CommonUtils;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Entity
 * @Table(name="presentation")
 * @ORM\Entity(repositoryClass="App\Repository\PresentationEntityRepository")
 */
class PresentationEntity {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @ManyToOne(targetEntity="App\Entity\MovieEntity")
     */
    private MovieEntity $movie;

    /**
     * @ManyToOne(targetEntity="App\Entity\HallEntity")
     */
    private HallEntity $hall;

    /**
     * @Column(name="start_time", type="datetime", nullable=false)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private DateTime $startTime;

    /**
     * @Column(type="boolean", nullable=false, options={"default" : true})
     */
    private bool $valid = true;

    public function getDisplayName(): string {
        return $this->getStartEndTime() . ', ' . $this->getHall()->getDisplayName();
    }

    public function getStartEndTime(): string {
        return $this->getStartTime()->format('H:i') . ' - ' . $this->getEndTime()->format('H:i / d.m.Y');
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
     * @return MovieEntity
     */
    public function getMovie(): MovieEntity {
        return $this->movie;
    }

    /**
     * @param MovieEntity $movie
     */
    public function setMovie(MovieEntity $movie): void {
        $this->movie = $movie;
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
     * @return DateTime
     */
    public function getStartTime(): DateTime {
        return $this->startTime;
    }

    /**
     * @param DateTime $startTime
     */
    public function setStartTime(DateTime $startTime): void {
        $this->startTime = $startTime;
        CommonUtils::formatDateISO8601($this->startTime);
    }

    /**
     * @return DateTime
     */
    public function getEndTime(): DateTime {
        $endTime = clone $this->startTime;
        CommonUtils::addToDatetime($endTime, $this->getMovie()->getLength(), TimeUnit::MINUTES);
        CommonUtils::formatDateISO8601($endTime);

        return $endTime;
    }

    #endregion
}