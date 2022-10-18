<?php

declare(strict_types=1);

namespace CoreAPI\Client\Domain\Entities;

use CoreAPI\Client\Domain\ValueObjects\ClientName;
use CoreAPI\SharedKernel\AggregateRoot\AggregateRoot;

final class Client extends AggregateRoot
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
