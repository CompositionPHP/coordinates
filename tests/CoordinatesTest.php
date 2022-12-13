<?php

namespace Composition\Tests\Coordinates;

use Composition\Coordinates\Coordinates;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

class CoordinatesTest extends TestCase
{
    public function test_getters()
    {
        $coordinates = new Coordinates(65.123111, 163.1111);

        $this->assertSame(65.123111, $coordinates->getLatitude());
        $this->assertSame(163.1111, $coordinates->getLongitude());
    }

    public function test_from_string()
    {
        $coordinates = Coordinates::fromString('65.23, 163.1111');

        $this->assertSame(65.23, $coordinates->getLatitude());
        $this->assertSame(163.1111, $coordinates->getLongitude());
    }

    public function test_from_string_throws_exception_when_too_many_parts_are_provided()
    {
        $this->expectExceptionObject(
            new UnexpectedValueException(
                "Unknown LatLng format, expecting '{lat},{lng}'."
            )
        );

        Coordinates::fromString('65.23, 163.1111, 65.24');
    }

    public function test_that_validity_can_be_checked()
    {
        $this->assertTrue(Coordinates::isValid(72.12311, -178.0001));
        $this->assertTrue(Coordinates::isValid(-90, 156.000));

        $this->assertFalse(Coordinates::isValid(91, 178));
        $this->assertFalse(Coordinates::isValid(78, 181));
    }
}