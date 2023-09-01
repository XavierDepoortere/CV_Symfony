<?php

namespace App\Repository;

use App\Entity\Projet;
use App\Data\SearchData;
use App\Entity\Language;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Projet>
 *
 * @method Projet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Projet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Projet[]    findAll()
 * @method Projet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Projet::class);
    }

    /**
     * Récupère les projets associés à un langage donné.
     *
     * @param Language $language Le langage associé aux projets recherchés
     * @return Projet[]|array La liste des projets associés au langage
     */
    public function findByLanguageId(int $languageId)
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.language', 'l')
            ->andWhere('l.id = :languageId')
            ->setParameter('languageId', $languageId)
            ->getQuery()
            ->getResult();
    }

//    public function findOneBySomeField($value): ?Projet
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
