<?php

declare(strict_types=1);

namespace App\CoreAPI\Client\Infrastructure\Repositories;

use App\CoreAPI\Client\Domain\Entities\Client;
use App\CoreAPI\Client\Domain\Repositories\ClientRepositoryInterface;
use App\CoreAPI\Client\Domain\ValueObjects\ClientId;
use App\CoreAPI\Client\Domain\ValueObjects\ClientName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineClientRepository extends ServiceEntityRepository implements ClientRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function findByClientId(ClientId $id): ?Client
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $id->value())
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findByCriteria(ClientName $clientName): ?Client
    {
        return null; 
    }

    public function save(Client $client): void
    {
        $this->_em->persist($client);
        $this->_em->flush();
    }

    public function update(ClientId $id, Client $client): void
    {
    
    }

    public function delete(ClientId $id): void
    {
        
    }
}
