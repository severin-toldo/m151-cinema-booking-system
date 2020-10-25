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

    /**
     * @Entity
     * @Table(name="hall")
     * @ORM\Entity(repositoryClass="App\Repository\HallEntityRepository")
     */
    class HallEntity {

        /**
         * @Id
         * @Column(type="integer")
         * @GeneratedValue
         */
        private int $id;

        /**
         * @ORM\OneToMany(targetEntity="App\Entity\SeatRowEntity", mappedBy="hall")
         */
        private Collection $seatrows;

        public function getDisplayName(): string {
            return 'Hall ' . $this->getId();
        }

        #region getters & setters

        public function __construct() {
            $this->seatrows = new ArrayCollection();
        }

        /**
         * @return ArrayCollection|Collection
         */
        public function getSeatrows() {
            return $this->seatrows;
        }

        /**
         * @param ArrayCollection|Collection $seatrows
         */
        public function setSeatrows($seatrows): void {
            $this->seatrows = $seatrows;
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

        #endregion
    }