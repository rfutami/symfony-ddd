<?php

declare(strict_types=1);

namespace CoreAPI\Client\Infrastrcture\Repositories;

use CoreAPI\Client\Domain\Client;
use CoreAPI\Client\Domain\Contracts\ClientRepositoryContract;
use CoreAPI\Client\Domain\ValueObjects\ClientId;
use CoreAPI\Client\Domain\ValueObjects\ClientName;

final class DoctrineClientRepository implements ClientRepositoryContract
{
    public function find(ClientId $id): ?Client
    {
        return $this->find($id);
    }

    public function findByCriteria(ClientName $clientName): ?Client
    {
        return null; 
    }

    public function save(Client $client): void
    {
        
    }

    public function update(ClientId $id, Client $client): void
    {
    
    }

    public function delete(ClientId $id): void
    {
        
    }
}
