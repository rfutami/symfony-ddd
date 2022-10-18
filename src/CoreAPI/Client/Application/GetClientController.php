<?php

declare(strict_types=1);

namespace CoreAPI\Client\Application;

use CoreAPI\Client\Domain\ValueObjects\ClientId;
use CoreAPI\Client\Domain\Repositories\ClientRepositoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/client_hola/{client_id}', name:'client_hola', methods: ['GET'])]
final class GetClientController extends AbstractController
{
    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $client_id): JsonResponse
    {
        $id = new ClientId($client_id);

        $client = $this->repository->findByClientId($id);
var_dump($client);
        //return JsonResponse::fromJsonString(json_encode($client));
        return $this->json($client, headers: ['Content-Type' => 'application/json;charset=UTF8']);
    }
}

