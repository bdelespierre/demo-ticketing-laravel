<?php

namespace App\Contracts;

interface Enum
{
    public function __toString(): string;

    public static function fromValue(string $value): self;
}
