<?php

namespace IL\BankBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ILBankBundle:Default:index.html.twig');
    }
}
