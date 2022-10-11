<?php

declare(strict_types=1);

namespace CoreAPI\Client\Infrastrcture;

use CoreAPI\Client\Application\GetClientUseCase;
use CoreAPI\Client\Infrastrcture\Repositories\DoctrineClientRepository;

final class GetClientController
{
    private $repository;

    public function __construct(DoctrineClientRepository $repository) {
        $this->repository = $repository;
    }

    public function __invoke(int $id)
    {
        $getClientUseCase = new GetClientUseCase($this->repository);
        $client = $getClientUseCase->__invoke($id);

        return $client;
    }
}
