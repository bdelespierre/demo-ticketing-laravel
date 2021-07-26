<?php

namespace App\Models;

use App\Contracts\Enum;

class TicketPriority implements Enum
{
    private const LOW = "low";
    private const NORMAL = "normal";
    private const HIGH = "high";

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
            case self::LOW:
                return self::low();

            case self::NORMAL:
                return self::normal();

            case self::HIGH:
                return self::high();

            default:
                throw new \UnexpectedValueException("Invalid value '{$value}'");
        }
    }

    public static function low(): self
    {
        return new self(self::LOW);
    }

    public static function normal(): self
    {
        return new self(self::NORMAL);
    }

    public static function high(): self
    {
        return new self(self::HIGH);
    }
}
