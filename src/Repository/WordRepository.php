<?php

namespace App\Repository;

use App\Entity\Word;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class WordRepository
 * @package App\Repository
 * @author Ryan Sprott
 *
 * @method Word|null find($id, $lockMode = null, $lockVersion = null)
 * @method Word|null findOneBy(array $criteria, array $orderBy = null)
 * @method Word[]    findAll()
 * @method Word[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WordRepository extends ServiceEntityRepository
{
    /**
     * WordRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Word::class);
    }

    /**
     * Find words with the same representation as the input (i.e. anagrams)
     *
     * @param String $input Numeric representation of a word
     * @param QueryBuilder|null $qb
     * @return mixed
     */
    public function findByNumericRepresentation(String $input, QueryBuilder $qb = null)
    {
        return $this->getOrCreateQueryBuilder($qb)
            ->select('w.text_representation')
            ->andWhere('w.numeric_representation = :input')
            ->setParameter('input', $input)
            ->distinct()
            ->getQuery()
            ->useQueryCache(true)
            ->useResultCache(true)
            ->getResult();
    }

    /**
     * @param QueryBuilder|null $qb
     * @return QueryBuilder
     */
    private function getOrCreateQueryBuilder(QueryBuilder $qb = null)
    {
        return $qb ?: $this->createQueryBuilder('w');
    }

}
