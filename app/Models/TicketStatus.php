<?php

namespace App\Models;

use App\Contracts\Enum;

class TicketStatus implements Enum
{
    private const OPEN = "open";
    private const IN_PROGRESS = "in_progress";
    private const BLOCKED = "blocked";
    private const DONE = "done";

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
            case self::OPEN:
                return self::open();

            case self::IN_PROGRESS:
                return self::inProgress();

            case self::BLOCKED:
                return self::blocked();

            case self::DONE:
                return self::done();

            default:
                throw new \UnexpectedValueException("Invalid value '{$value}'");
        }
    }

    public static function open(): self
    {
        return new self(self::OPEN);
    }

    public static function inProgress(): self
    {
        return new self(self::IN_PROGRESS);
    }

    public static function blocked(): self
    {
        return new self(self::BLOCKED);
    }

    public static function done(): self
    {
        return new self(self::DONE);
    }
}
