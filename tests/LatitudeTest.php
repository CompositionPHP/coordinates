<?php

namespace Composition\Tests\Coordinates;

use Composition\Coordinates\Latitude;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

class LatitudeTest extends TestCase
{
    public function test_that_number_between_negative_90_and_positive_90_is_valid()
    {
        $valueObject = new Latitude(89.00);

        $this->assertSame(89.00, $valueObject->getLatitude());
    }

    public function test_that_number_under_negative_90_is_invalid()
    {
        $this->expectExceptionObject(
            new UnexpectedValueException("Latitude must be between -90° and 90°.")
        );

        new Latitude(-91);
    }

    public function test_that_number_over_positive_90_is_invalid()
    {
        $this->expectExceptionObject(
            new UnexpectedValueException("Latitude must be between -90° and 90°.")
        );

        new Latitude(91);
    }

    public function test_that_validity_can_be_checked()
    {
        $this->assertTrue(Latitude::isValid(72.12311));
        $this->assertTrue(Latitude::isValid(-50.0001));

        $this->assertFalse(Latitude::isValid(91));
        $this->assertFalse(Latitude::isValid(-91));
    }
}