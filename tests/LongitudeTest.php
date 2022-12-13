<?php

namespace Composition\Tests\Coordinates;

use Composition\Coordinates\Longitude;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

class LongitudeTest extends TestCase
{
    public function test_that_number_between_negative_180_and_positive_180_is_valid()
    {
        $valueObject = new Longitude(178.00);

        $this->assertSame(178.00, $valueObject->getLongitude());
    }

    public function test_that_number_under_negative_180_throws_an_exception()
    {
        $this->expectExceptionObject(
            new UnexpectedValueException("Longitude must be between -180° and 180°.")
        );

        new Longitude(-181);
    }

    public function test_that_number_over_positive_180_throws_an_exception()
    {
        $this->expectExceptionObject(
            new UnexpectedValueException("Longitude must be between -180° and 180°.")
        );

        new Longitude(181);
    }

    public function test_that_validity_can_be_checked()
    {
        $this->assertTrue(Longitude::isValid(72.12311));
        $this->assertTrue(Longitude::isValid(-90));

        $this->assertFalse(Longitude::isValid(181));
        $this->assertFalse(Longitude::isValid(-181));
    }
}