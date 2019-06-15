<?php

namespace EspritClubsBundle\Controller;

use EspritClubsBundle\Entity\evenement;
use EspritClubsBundle\Form\evenementType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class eventController extends Controller
{
    Public function AjouterEventAction(Request $request){
       $event=new evenement();
        $form=$this->createForm(evenementType::class,$event);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $event->setNbParticipant(0);

            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('esprit_clubs_AjoutEvent');
        }
        return $this->render('@EspritClubs/Default/event/Ajouter.html.twig',array('form'=>$form->createView()));

    }

    Public function AfficheEventAction(){
        $em= $this->getDoctrine()->getRepository(evenement::class)->findAll();

        return $this->render('@EspritClubs/Default/event/Afficher.html.twig',array('table'=>$em));
    }
    Public function ParticiperAction($id){
        $event=new evenement();

        $event= $this->getDoctrine()->getRepository(evenement::class)->find($id);
        $em1 = $this->getDoctrine()->getManager();
        $event->setNbParticipant(1+ $event->getNbParticipant());


        $em1->flush();
        return $this->render('@EspritClubs/Default/event/Felicitation.html.twig',array('somme'=>$event->getNbParticipant()));
    }
    Public function ChercherAction(Request $request){
        $titre=$request->get('T1');

        if(!empty($titre)){
            //var_dump($titre);
            //die();
        $event =$this->getDoctrine()->getRepository(evenement::class)->chercherEvent($titre);

         return $this->render('@EspritClubs/Default/event/Afficher.html.twig',array('table'=>$event));


        }
        return $this->render('@EspritClubs/Default/event/recherche.html.twig',array());

    }
public function SupprimerAction($id){
    $event= $this->getDoctrine()->getRepository(evenement::class)->find($id);
    $em1 = $this->getDoctrine()->getManager();
    $em1->remove($event);
    $em1->flush();
    return $this->redirectToRoute('esprit_clubs_AfficheEvent');
    //return $this->render('@EspritClubs/Default/event/Afficher.html.twig',array('table'=>$event));

}
Public function ModifierAction($id , Request $request){

    $eventold= $this->getDoctrine()->getRepository(evenement::class)->find($id);
    $form=$this->createForm(evenementType::class,$eventold);

    $eventnew =$form->handleRequest($request);

    if ($eventnew->isValid()) {

        $em = $this->getDoctrine()->getManager();

        $em->flush();
        return $this->redirectToRoute('esprit_clubs_AfficheEvent');
    }
    return $this->render('@EspritClubs/Default/event/Ajouter.html.twig',array('form'=>$form->createView()));
}
}
