<?php

declare(strict_types=1);

namespace App\CoreAPI\Client\Domain\Repositories;

use App\CoreAPI\Client\Domain\Entities\Client;
use App\CoreAPI\Client\Domain\ValueObjects\ClientId;
use App\CoreAPI\Client\Domain\ValueObjects\ClientName;

interface ClientRepositoryInterface
{
    public function findByClientId(ClientId $id): ?Client;

    public function findByCriteria(ClientName $clientName): ?Client;

    public function save(Client $client): void;

    public function update(ClientId $clientId, Client $client): void;

    public function delete(ClientId $id): void;
}
