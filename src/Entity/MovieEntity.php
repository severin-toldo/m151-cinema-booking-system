<?php
    namespace App\Entity;
    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\ORM\Mapping\Column;
    use Doctrine\ORM\Mapping\Entity;
    use Doctrine\ORM\Mapping\GeneratedValue;
    use Doctrine\ORM\Mapping\Id;
    use Doctrine\ORM\Mapping\Table;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * @Entity
     * @Table(name="movie")
     * @ORM\Entity(repositoryClass="App\Repository\MovieEntityRepository")
     */
    class MovieEntity {
        /**
         * @Id
         * @Column(type="integer")
         * @GeneratedValue
         */
        private int $id;

        /**
         * @Column(type="string", length=200)
         * @Assert\NotNull()
         * @Assert\NotBlank()
         * @Assert\Length(max="200")
         */
        private string $name;

        /**
         * @Column(type="integer")
         * @Assert\NotNull()
         * @Assert\NotBlank()
         */
        private int $length;

        /**
         * @Column(name="fsk_approval", type="string", length=2)
         * @Assert\NotNull()
         * @Assert\NotBlank()
         * @Assert\Length(max="2")
         */
        private int $fskApproval;

        /**
         * @Column(type="string", length=1000)
         * @Assert\NotNull()
         * @Assert\NotBlank()
         * @Assert\Length(max="1000")
         */
        private string $description;

        /**
         * @Column(name="image_file_name", type="string", length=255, nullable=true)
         */
        private ?string $imageFileName = null;


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
         * @return int
         */
        public function getLength(): int {
            return $this->length;
        }

        /**
         * @param int $length
         */
        public function setLength(int $length): void {
            $this->length = $length;
        }

        /**
         * @return string
         */
        public function getFskApproval(): string {
            return $this->fskApproval;
        }

        /**
         * @param string $fskApproval
         */
        public function setFskApproval(string $fskApproval): void {
            $this->fskApproval = $fskApproval;
        }

        /**
         * @return string
         */
        public function getDescription(): string {
            return $this->description;
        }

        /**
         * @param string $description
         */
        public function setDescription(string $description): void {
            $this->description = $description;
        }

        /**
         * @return string
         */
        public function getImageFileName(): ?string {
            return $this->imageFileName;
        }

        /**
         * @param string $imageFileName
         */
        public function setImageFileName(?string $imageFileName): void {
            $this->imageFileName = $imageFileName;
        }

        #endregion
    }
?>