<?php

namespace Composition\Coordinates;

use Throwable;
use UnexpectedValueException;

final class Longitude
{
    public function __construct(private readonly float $longitude)
    {
        if ($this->longitude < -180 || $this->longitude > 180) {
            throw new UnexpectedValueException("Longitude must be between -180° and 180°.");
        }
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public static function isValid(float $longitude): bool
    {
        try {
            new self($longitude);

            return true;
        } catch (Throwable) {}

        return false;
    }
}