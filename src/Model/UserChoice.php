<?php


namespace App\Model;


class UserChoice {
    private int $userId;
    private string $email;


    #region getters & setters

    /**
     * @return int
     */
    public function getUserId(): int {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void {
        $this->userId = $userId;
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

    # endregion
}