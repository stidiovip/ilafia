<?php
/**
 * Created by PhpStorm.
 * User: gincogroupprojects
 * Date: 10/27/18
 * Time: 9:03 PM
 */

namespace IL\BankBundle\Controller;


use IL\CoreBundle\Entity\SouscriptionMobile;
use IL\CoreBundle\Form\SouscriptionMobileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SouscriptionMobileController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('ILCoreBundle:SouscriptionMobile')->findBy([
            'statutLiaison' => 'Linked',
            'statutLiaison' => 'Pending'
        ]);
        return $this->render('ILBankBundle:SouscriptionMobile:list.html.twig', [
            'souscriptions' => $list
        ]);
    }

    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $souscription = new SouscriptionMobile();
        $form = $this->createForm(SouscriptionMobileType::class, $souscription);

        if($form->handleRequest($request)->isValid())
        {
            $souscription->setCreatedAt(new \datetime);
            $souscription->setUpdatedAt(new \datetime);
            $souscription->setEffectuerPar($this->getUser());

            $em->persist($souscription);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La liaison  a bien été éffectuée.');
  
            return $this->redirect($this->generateUrl('il_bank_souscription_mobile_list'));
        }

        return $this->render('ILBankBundle:SouscriptionMobile:add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function resilierAction($id, Request $request)
    {
        $em= $this->getDoctrine()->getManager();
        $souscription = $em->getRepository('ILCoreBundle:SouscriptionMobile')->find($id);

        $souscription->setStatutLiaison('Resiliated');
        $em->flush();

        $request->getSession()->getFlashBag()->add('success', 'La liaison  a bien été résiliée.');

        return $this->redirect($this->generateUrl('il_bank_souscription_mobile_resiliation_list'));

    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $souscription = $em->getRepository('ILCoreBundle:SouscriptionMobile')->find($id);
        $form = $this->createForm(SouscriptionMobileType::class, $souscription);

        if($form->handleRequest($request)->isValid())
        {
            $souscription->setUpdatedAt(new \datetime);

            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La liaison  a bien été éffectuée.');

            return $this->redirect($this->generateUrl('il_bank_souscription_mobile_list'));
        }


        return $this->render('ILBankBundle:SouscriptionMobile:add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function resiliationListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('ILCoreBundle:SouscriptionMobile')->findBy([
            'statutLiaison' => 'Resiliated'
        ]);
        return $this->render('ILBankBundle:SouscriptionMobile:listResiliation.html.twig', [
            'souscriptions' => $list
        ]);

    }

}