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
        ClientId $id,
        ClientName $name
    ) {
        $this->id = $id->value();
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
        ClientId $id,
        ClientName $name
    ): Client {
        $client = new self($id, $name);
        
        return $client;
    }
}
