-- Code Generated 22.06.2020 11.39
-- Formatted by sitri

CREATE TABLE hall (
    id INT AUTO_INCREMENT NOT NULL,

    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE movie (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(200) NOT NULL,
    length INT NOT NULL,
    fsk_approval VARCHAR(2) NOT NULL,
    description VARCHAR(1000) NOT NULL,
    image_file_name VARCHAR(255) NOT NULL,

    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE presentation (
    id INT AUTO_INCREMENT NOT NULL,
    movie_id INT DEFAULT NULL,
    hall_id INT DEFAULT NULL,
    start_time DATETIME NOT NULL,

    INDEX IDX_9B66E8938F93B6FC (movie_id),
    INDEX IDX_9B66E89352AFCFD6 (hall_id),
    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE reservation (
    id INT AUTO_INCREMENT NOT NULL,
    seat_id INT DEFAULT NULL,
    presentation_id INT DEFAULT NULL,
    user_id INT DEFAULT NULL,
    code VARCHAR(10) NOT NULL,

    UNIQUE INDEX UNIQ_42C8495577153098 (code),
    INDEX IDX_42C84955C1DAFE35 (seat_id),
    INDEX IDX_42C84955AB627E8B (presentation_id),
    INDEX IDX_42C84955A76ED395 (user_id),
    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE seat (
    id INT AUTO_INCREMENT NOT NULL,
    seatrow_id INT DEFAULT NULL,
    row_position INT NOT NULL,

    INDEX IDX_3D5C3666DE060E4A (seatrow_id),
    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE seatrow (
    id INT AUTO_INCREMENT NOT NULL,
    hall_id INT DEFAULT NULL,
    letter VARCHAR(1) NOT NULL,

    INDEX IDX_23ABCDDE52AFCFD6 (hall_id),
    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE security_permission (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) DEFAULT NULL,

    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE security_role (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,

    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE security_role_permission (
    security_role_id INT NOT NULL,
    security_permission_id INT NOT NULL,

    INDEX IDX_97E5D03BBBE829B1 (security_role_id),
    INDEX IDX_97E5D03B7730B2D4 (security_permission_id),
    PRIMARY KEY(security_role_id, security_permission_id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE user (
    id INT AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phonenumber VARCHAR(10) DEFAULT NULL,
    email VARCHAR(255) NOT NULL,

    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

CREATE TABLE user_security_role (
    user_id INT NOT NULL,
    security_role_id INT NOT NULL,

    INDEX IDX_66F6ABFBA76ED395 (user_id),
    INDEX IDX_66F6ABFBBBE829B1 (security_role_id),
    PRIMARY KEY(user_id, security_role_id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

ALTER TABLE presentation ADD CONSTRAINT FK_9B66E8938F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id);
ALTER TABLE presentation ADD CONSTRAINT FK_9B66E89352AFCFD6 FOREIGN KEY (hall_id) REFERENCES hall (id);
ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C1DAFE35 FOREIGN KEY (seat_id) REFERENCES seat (id);
ALTER TABLE reservation ADD CONSTRAINT FK_42C84955AB627E8B FOREIGN KEY (presentation_id) REFERENCES presentation (id);
ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id);
ALTER TABLE seat ADD CONSTRAINT FK_3D5C3666DE060E4A FOREIGN KEY (seatrow_id) REFERENCES seatrow (id);
ALTER TABLE seatrow ADD CONSTRAINT FK_23ABCDDE52AFCFD6 FOREIGN KEY (hall_id) REFERENCES hall (id);
ALTER TABLE security_role_permission ADD CONSTRAINT FK_97E5D03BBBE829B1 FOREIGN KEY (security_role_id) REFERENCES security_role (id);
ALTER TABLE security_role_permission ADD CONSTRAINT FK_97E5D03B7730B2D4 FOREIGN KEY (security_permission_id) REFERENCES security_permission (id);
ALTER TABLE user_security_role ADD CONSTRAINT FK_66F6ABFBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id);
ALTER TABLE user_security_role ADD CONSTRAINT FK_66F6ABFBBBE829B1 FOREIGN KEY (security_role_id) REFERENCES security_role (id);