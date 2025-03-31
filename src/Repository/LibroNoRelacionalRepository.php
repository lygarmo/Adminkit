<?php

namespace App\Repository;

use App\Entity\LibroNoRelacional;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LibroNoRelacional>
 */
class LibroNoRelacionalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LibroNoRelacional::class);
    }

    //obtener solo libros activos
    public function findAllActivos(): array
    {
        return $this->createQueryBuilder('l')
            ->where('l.activo = true')
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return LibroNoRelacional[] Returns an array of LibroNoRelacional objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LibroNoRelacional
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
