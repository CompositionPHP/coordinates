<?php

namespace Composition\Coordinates;

use Throwable;
use UnexpectedValueException;

final class Latitude
{
    public function __construct(private readonly float $latitude)
    {
        if ($this->latitude < -90 || $this->latitude > 90) {
            throw new UnexpectedValueException("Latitude must be between -90° and 90°.");
        }
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public static function isValid(float $latitude): bool
    {
        try {
            new self($latitude);

            return true;
        } catch (Throwable) {}

        return false;
    }
}