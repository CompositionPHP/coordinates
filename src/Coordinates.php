<?php

namespace Composition\Coordinates;

use Throwable;
use UnexpectedValueException;

final class Coordinates
{
    private readonly Latitude $latitude;

    private readonly Longitude $longitude;


    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = new Latitude($latitude);
        $this->longitude = new Longitude($longitude);
    }

    public function getLatitude(): float
    {
        return $this->latitude->getLatitude();
    }

    public function getLongitude(): float
    {
        return $this->longitude->getLongitude();
    }

    public static function fromString(string $latLng): self
    {
        $parts = explode(',', $latLng);

        if (count($parts) !== 2) {
            throw new UnexpectedValueException(
                "Unknown LatLng format, expecting '{lat},{lng}'."
            );
        }

        return new self(...$parts);
    }

    public static function isValid(float $latitude, float $longitude): bool
    {
        try {
            new self($latitude, $longitude);

            return true;
        } catch (Throwable) {}

        return false;
    }
}