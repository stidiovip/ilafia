<?php
/**
 * Created by PhpStorm.
 * User: gincogroupprojects
 * Date: 11/2/18
 * Time: 4:39 AM
 */

namespace IL\BankBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TransfertController extends Controller
{
    public function transfertAction()
    {
        $sql = "SELECT *  FROM transfert where trans = 'c2w' ";
        $connexion = $this->getDoctrine()->getConnection();
        $query = $connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();

        //dump($result); exit;

        return $this->render('ILBankBundle:Transfert:list.html.twig', [
            'transferts' => $result
        ]);

    }

}