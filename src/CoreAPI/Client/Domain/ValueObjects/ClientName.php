<?php

declare(strict_types=1);

namespace CoreAPI\Client\Domain\ValueObjects;

final class ClientName
{
    private $value;

    public function __construct(string $name) {
        $this->value = $name;
    }

    public function ivalue(): string
    {
        return $this->value;
    }
}
