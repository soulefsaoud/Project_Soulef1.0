<?php

namespace App\Controller\Journal;

use App\Entity\Journal;
use App\Form\JournalType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateJournalController extends AbstractController
{
 /**
  * @Route("/admin/journal/creer", name= "creer_journal")
  */
public function create(Request $request, EntityManagerInterface $em): Response
{
    $journal = new Journal();

    $form = $this->createForm(JournalType::class,$journal);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $em->persist($journal); //request comme SQL

        $em->flush();  //execute de SQL

        $this->addFlash('success',' Le journal : ' . $journal->getNom() .' , a bien été enregstré');

        return $this->redirectToRoute('creer_journal');
    }
        return $this->render("journal/creer.html.twig", [
            'formJournal' => $form->createView()
         ]);
      
    }
    

}
