<?php


namespace App\Model;


class CardButton {

    private string $title;
    private string $type;
    private string $route;
    private array $requiredPermissions = [];


    #region getters & setter

    /**
     * CardButton constructor.
     * @param string $title
     * @param string $type
     * @param string $route
     * @param array $requiredPermissions
     */
    public function __construct(string $title, string $type, string $route, array $requiredPermissions) {
        $this->title = $title;
        $this->type = $type;
        $this->route = $route;
        $this->requiredPermissions = $requiredPermissions;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getRoute(): string {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute(string $route): void {
        $this->route = $route;
    }

    /**
     * @return array
     */
    public function getRequiredPermissions(): array {
        return $this->requiredPermissions;
    }

    /**
     * @param array $requiredPermissions
     */
    public function setRequiredPermissions(array $requiredPermissions): void {
        $this->requiredPermissions = $requiredPermissions;
    }

    #endregions
}
