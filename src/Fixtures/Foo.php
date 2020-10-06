<?php

namespace App\Fixtures;

class Foo
{
    /** @var int[] */
    private array $property;

    public function __construct(array $property)
    {
        $this->property = $property;
    }

    public function getProperty(): array
    {
        return $this->property;
    }
}
