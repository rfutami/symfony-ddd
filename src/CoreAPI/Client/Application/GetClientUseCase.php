<?php

declare(strict_types=1);

namespace CoreAPI\Client\Application;

use CoreAPI\Client\Domain\Entities\Client;
use CoreAPI\Client\Domain\ValueObjects\ClientId;
use CoreAPI\Client\Domain\Repositories\ClientRepositoryInterface;

final class GetClientUseCase {
    private $repository;

    public function __construct(ClientRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function __invoke(int $client_id): ?Client
    {
        $id = new ClientId($client_id);

        $client = $this->repository->find($id);

        return $client;    
    }
}

