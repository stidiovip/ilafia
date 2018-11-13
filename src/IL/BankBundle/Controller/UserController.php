<?php
/**
 * Created by PhpStorm.
 * User: gincogroupprojects
 * Date: 11/2/18
 * Time: 4:39 AM
 */

namespace IL\BankBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function profilAction()
    {   
        $user = $this->getUser();
        return $this->render('ILBankBundle:User:profil.html.twig', [
            'user' => $user,
        ]);

    }

}