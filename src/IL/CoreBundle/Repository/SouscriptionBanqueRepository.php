<?php

namespace IL\CoreBundle\Repository;

/**
 * SouscriptionBanqueRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SouscriptionBanqueRepository extends \Doctrine\ORM\EntityRepository
{
    public function NumberOfSouscriptions()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('count(u.id)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function NumberOfTransfert()
    {
        $sql = "SELECT count(id) as nbre FROM transfert";
        $connexion = $this->_em->getConnection();
        $query = $connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();

        //dump($result); exit;

        return $result;
    }

    public function getBanqueChart()
    {
        $sql = "SELECT count(id) as nbre, DATE(created_at) as date FROM souscription_banque GROUP BY created_at";
        $connexion = $this->_em->getConnection();
        $query = $connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();

        //dump($result); exit;

        return $result;



    }

    public function getMobileChart()
    {
        $sql = "SELECT count(id) as nbre, DATE(created_at) as date FROM souscription_mobile GROUP BY created_at";
        $connexion = $this->_em->getConnection();
        $query = $connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();

        //dump($result); exit;

        return $result;
    }

    public function numberOfResiliation()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('count(u.id)')->andWhere("u.statutLiaison = 'Resiliated'");
        return $qb->getQuery()->getSingleScalarResult();
    }

    public function getResiliationChart()
    {
        $sql = "SELECT count(id) as nbre, DATE(created_at) as date FROM souscription_mobile WHERE statut_liaison='Resiliated' GROUP BY created_at";
        $connexion = $this->_em->getConnection();
        $query = $connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();

        //dump($result); exit;

        return $result;



    }


}
