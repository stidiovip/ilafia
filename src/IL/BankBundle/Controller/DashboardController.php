<?php
/**
 * Created by PhpStorm.
 * User: gincogroupprojects
 * Date: 10/27/18
 * Time: 8:38 PM
 */

namespace IL\BankBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sousMobile = $em->getRepository('ILCoreBundle:SouscriptionMobile')->NumberOfSouscriptions();
        $sousBanque = $em->getRepository('ILCoreBundle:SouscriptionBanque')->NumberOfSouscriptions();
        $transfert = $em->getRepository('ILCoreBundle:SouscriptionBanque')->NumberOfTransfert();
        $banque = $em->getRepository('ILCoreBundle:SouscriptionBanque')->getBanqueChart();
        $mobile = $em->getRepository('ILCoreBundle:SouscriptionBanque')->getMobileChart();
        $resiliation = $em->getRepository('ILCoreBundle:SouscriptionBanque')->getResiliationChart();

        return $this->render('ILBankBundle::index.html.twig', [
            'sousMobile' => $sousMobile,
            'sousBanque' => $sousBanque,
            'transfert' => $transfert[0],
            'banque' => $banque,
            'mobile' => $mobile,
            'resiliation' => $resiliation
        ]);
    }

}