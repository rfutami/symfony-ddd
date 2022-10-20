<?php

declare(strict_types=1);

namespace App\CoreAPI\Client\Application;

use App\CoreAPI\Client\Domain\Entities\Client;
use App\CoreAPI\Client\Domain\ValueObjects\ClientName;
use App\CoreAPI\Client\Domain\Repositories\ClientRepositoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

#[Route('/client', name:'client', methods: ['POST'])]
final class PostClientController extends AbstractController
{
    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $parameters = json_decode(
            $request->getContent(),
            true, 512,
            JSON_THROW_ON_ERROR
        );

        $clientName = new ClientName($parameters['name']);
        $client = Client::create($clientName);

        // Persistir
        $this->repository->save($client);

        // Cómo saber el último id?

        return $this->json(
            [
                'name' => $client->name()->value(),
            ]
        );
    }
}

