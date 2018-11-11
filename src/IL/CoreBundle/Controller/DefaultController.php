<?php

namespace IL\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ILCoreBundle:Default:index.html.twig');
    }
}
