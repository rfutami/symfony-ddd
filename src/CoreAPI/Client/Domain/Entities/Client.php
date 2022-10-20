<?php

declare(strict_types=1);

namespace App\CoreAPI\Client\Domain\Entities;

use App\CoreAPI\Client\Domain\ValueObjects\ClientName;
use App\CoreAPI\Client\Domain\ValueObjects\ClientId;
use App\CoreAPI\SharedKernel\AggregateRoot\AggregateRoot;

final class Client extends AggregateRoot
{
    private $id;
    private $name;

    public function __construct(
        ClientName $name
    ) {
        $this->name = $name->value();
    }

    public function id(): ClientId
    {
        return new ClientId($this->id);
    }

    public function name(): ClientName
    {
        return new ClientName($this->name);
    }

    public static function create(
        ClientName $name
    ): Client {
        // Get next available id
        $client = new self($name);

        // Lanzar evento de creación    
        return $client;
    }
}
