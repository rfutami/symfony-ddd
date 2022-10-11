<?php

declare(strict_types=1);

namespace CoreAPI\Client\Domain\Contracts;

use CoreAPI\Client\Domain\Client;
use CoreAPI\Client\Domain\ValueObjects\ClientId;
use CoreAPI\Client\Domain\ValueObjects\ClientName;

interface ClientRepositoryContract
{
    public function find(ClientId $id): ?Client;

    public function findByCriteria(ClientName $clientName): ?Client;

    public function save(Client $client): void;

    public function update(ClientId $clientId, Client $client): void;

    public function delete(ClientId $id): void;
}
