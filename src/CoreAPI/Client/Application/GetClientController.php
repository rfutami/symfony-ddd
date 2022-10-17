<?php

declare(strict_types=1);

namespace CoreAPI\Client\Application;

use CoreAPI\Client\Domain\Entities\Client;
use CoreAPI\Client\Domain\ValueObjects\ClientId;
use CoreAPI\Client\Domain\Repositories\ClientRepositoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/client_hola/{client_id}', name:'client_hola', methods: ['GET'])]
final class GetClientController extends AbstractController
{
    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $client_id): ?Client
    {
        $id = new ClientId($client_id);

        $client = $this->repository->find($id);

        return $client;    
    }
}

