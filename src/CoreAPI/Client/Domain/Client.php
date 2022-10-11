<?php

declare(strict_types=1);

namespace CoreAPI\Client\Domain;

use CoreAPI\Client\Domain\ValueObjects\ClientName;

final class Client
{
    private $id;
    private $name;

    public function __construct(
        ClientName $name
    ) {
        $this->name = $name;
    }

    public function name(): ClientName
    {
        return $this->name;
    }

    public static function create(
        ClientName $name
    ): Client {
        $client = new self($name);

        return $client;
    }
}
