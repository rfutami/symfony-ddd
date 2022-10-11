<?php

declare(strict_types=1);

namespace CoreAPI\Client\Application;

use CoreAPI\Client\Domain\Client;
use CoreAPI\Client\Domain\ValueObjects\ClientId;
use CoreAPI\Client\Domain\Contracts\ClientRepositoryContract;

final class GetClientUseCase {
    private $repository;

    public function __construct(ClientRepositoryContract $repository) {
        $this->repository = $repository;
    }

    public function __invoke(int $client_id): ?Client
    {
        $id = new ClientId($client_id);

        $client = $this->repository->find($id);

        return $client;    
    }
}

