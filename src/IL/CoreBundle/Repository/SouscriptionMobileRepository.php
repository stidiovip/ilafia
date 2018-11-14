<?php

namespace IL\CoreBundle\Repository;

/**
 * SouscriptionMobileRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SouscriptionMobileRepository extends \Doctrine\ORM\EntityRepository
{
    public function NumberOfSouscriptions()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('count(u.id)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function getSouscriptionMobile($operateur, $statutLiaison, $dateDebut, $dateFin, $type_transaction, $noCarte, $noCompte)
    {
        
        $qb = null;
        $filters = [];

        if($operateur){
            $qb = $this->createQueryBuilder('s');
            
            if ( $operateur != null ){
                $qb = $qb->andWhere('s.operateur = :operateur');
                $filters['operateur'] = $operateur;
            }

            if ( $statutLiaison != null ){
                $qb = $qb->andWhere('s.statutLiaison = :statutLiaison');
                $filters['statutLiaison'] = $statutLiaison;
            }

            if ( $dateDebut != null && $dateFin != null ){

                $dd = \DateTime::createFromFormat('d/m/Y H:i', $dateDebut . '00:00');
                $df = \DateTime::createFromFormat('d/m/Y H:i', $dateFin . '23:59');
                
                $qb = $qb->andWhere('s.createdAt BETWEEN :dateDebut AND :dateFin');
                $filters['dateDebut'] = $dd;
                $filters['dateFin'] = $df;

            }

            $qb = $qb->orderBy('s.createdAt', 'ASC')->setParameters($filters)->getQuery();

            return $qb->getResult();

        }

    }
}
