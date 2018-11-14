<?php
/**
 * Created by PhpStorm.
 * User: gincogroupprojects
 * Date: 10/27/18
 * Time: 9:03 PM
 */

namespace IL\BankBundle\Controller;


use IL\CoreBundle\Entity\SouscriptionBanque;
use IL\CoreBundle\Form\SouscriptionBanqueType;
use IL\CoreBundle\Form\SouscriptionMobileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SouscriptionBanqueController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $list = $em->getRepository('ILCoreBundle:SouscriptionBanque')->findBy([
            'statutLiaison' => 'Linked',
            'statutLiaison' => 'Pending'
        ]);

        return $this->render('ILBankBundle:SouscriptionBanque:list.html.twig', [
            'souscriptions' => $list
        ]);
    }

    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $souscription = new SouscriptionBanque();
        $form = $this->createForm(SouscriptionBanqueType::class, $souscription);

        if($form->handleRequest($request)->isValid())
        {
            $souscription->setCreatedAt(new \datetime);
            $souscription->setUpdatedAt(new \datetime);
            $souscription->setEffectuerPar($this->getUser());

            $em->persist($souscription);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'La liaison  a bien été éffectuée.');

            return $this->redirect($this->generateUrl('il_bank_souscription_banque_list'));
        }

        return $this->render('ILBankBundle:SouscriptionBanque:add.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
    public function resilierAction($id, Request $request)
    {
        $em= $this->getDoctrine()->getManager();
        $souscription = $em->getRepository('ILCoreBundle:SouscriptionBanque')->find($id);

        $souscription->setStatutLiaison('Resiliated');
        $em->flush();

        $request->getSession()->getFlashBag()->add('success', 'La liaison  a bien été résiliée.');

        return $this->redirect($this->generateUrl('il_bank_souscription_banque_resiliation_list'));

    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $souscription = $em->getRepository('ILCoreBundle:SouscriptionBanque')->find($id);
        $form = $this->createForm(SouscriptionBanqueType::class, $souscription);

        if($form->handleRequest($request)->isValid())
        {
            $souscription->setUpdatedAt(new \datetime);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'La liaison  a bien été éffectuée.');

            return $this->redirect($this->generateUrl('il_bank_souscription_banque_list'));
        }


        return $this->render('ILBankBundle:SouscriptionBanque:add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function resiliationListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('ILCoreBundle:SouscriptionBanque')->findBy([
            'statutLiaison' => 'Resiliated'
        ]);
        return $this->render('ILBankBundle:SouscriptionBanque:listResiliation.html.twig', [
            'souscriptions' => $list
        ]);

    }

    public function reportAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $souscription = [];
        
        $type_raport = $request->get('type_raport');

        $operateur = $request->get('operateur');
        $type_transaction = $request->get('type_transaction');

        $noCarte = $request->get('numeroCarte');
        $noCompte = $request->get('numeroCompte');

        $statutLiaison = $request->get('statutLiaison');
        
        $dateDebut = $request->get('date_debut');
        $dateFin = $request->get('date_fin');
        
        $souscription = $em->getRepository('ILCoreBundle:SouscriptionMobile')->getSouscriptionMobile(
            $operateur, 
            $statutLiaison, 
            $dateDebut, 
            $dateFin,
            $type_transaction,
            $noCarte,
            $noCompte
        );
       

        return $this->render('ILBankBundle::report.html.twig', [
            'souscriptions' => $souscription,

            'operateur'     => $operateur,
            'type_transaction' => $type_transaction,
            'noCarte' => $noCarte,
            'noCompte' => $noCompte,
            'statutLiaison' => $statutLiaison,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin,
        ]);
    }

}