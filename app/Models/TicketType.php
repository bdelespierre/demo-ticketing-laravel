<?php

namespace App\Models;

use App\Contracts\Enum;

class TicketType implements Enum
{
    private const FEATURE = "feature";
    private const BUG = "bug";
    private const REFACTORING = "refactoring";

    protected function __construct(
        private string $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function fromValue(string $value): self
    {
        switch ($value) {
            case self::FEATURE:
                return self::feature();

            case self::BUG:
                return self::bug();

            case self::REFACTORING:
                return self::refactoring();

            default:
                throw new \UnexpectedValueException("Invalid value '{$value}'");
        }
    }

    public static function feature(): self
    {
        return new self(self::FEATURE);
    }

    public static function bug(): self
    {
        return new self(self::BUG);
    }

    public static function refactoring(): self
    {
        return new self(self::REFACTORING);
    }
}
