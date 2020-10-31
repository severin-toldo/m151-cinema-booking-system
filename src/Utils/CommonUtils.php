<?php


namespace App\Utils;


use App\Model\TimeUnit;
use DateTime;
use Symfony\Component\HttpFoundation\Request;

class CommonUtils {

    public static function getCookie(string $key, Request $request) {
        $cookies = $request->cookies;

        if ($cookies->has($key)) {
            return $cookies->get($key);
        }

        return null;
    }

    public static function getReservedSeatsByReservations(array $reservations): array {
        $reservedSeats = [];

        foreach($reservations as $reservation) {
            array_push($reservedSeats, $reservation->getSeat());
        }

        return $reservedSeats;
    }

    public static function getSeatsBySeatrows($seatrows): array {
        $seats = [];

        foreach($seatrows as $seatrow) {
            foreach($seatrow->getSeats() as $seat) {
                array_push($seats, $seat);
            }
        }

        return $seats;
    }

    public static function mapToId($array): array {
        $idArray = [];

        foreach ($array as $val) {
            array_push($idArray, $val->getId());
        }

        return $idArray;
    }

    public static function mapToInt($array): array {
        $intArray = [];

        foreach ($array as $val) {
            array_push($intArray, intval($val));
        }

        return $intArray;
    }

    public static function mapToName($array): array {
        $nameArray = [];

        foreach ($array as $val) {
            array_push($nameArray, $val->getName());
        }

        return $nameArray;
    }

    public static function addToDatetime(DateTime $date, int $amount, string $timeUnit): void {
        $date->modify('+' . $amount . $timeUnit);
    }

    public static function formatDateISO8601(DateTime $dateTime): void {
        $dateTime->format(DateTime::ISO8601);
    }

    public static function resolveSlave(): string {
        $num = rand(0, 100);

        if ($num % 2 == 0) {
            return 'slave1';
        } else {
            return 'slave2';
        }
    }
}