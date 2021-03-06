<?php

namespace App\Controller ;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Routing\Annotation\Route ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController ;
use App\Entity\Formation ;
use App\Form\FormationType ;

class FormationController extends AbstractController
{
    public function create()
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        
        return $this->render(
            'Formation/create.html.twig',
            [
            'entity' => $formation,
            'form' => $form->createView(),
            ]
        );
    }
    
    public function valid(Request $request)
    {
        $formation = new Formation() ;
        $form = $this->createForm(FormationType::class, $formation);
    
        $form->handleRequest($request) ;
        
        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();
            
            return $this->redirectToRoute('app_lucky_number');
        }
        
        return $this->render(
            'Formation/create.html.twig',
            [
            'entity' => $formation,
            'form' => $form->createView(),
            ]
        );
    }
    
    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $formation = $entityManager->getRepository(Formation::class)->findOneBy(['id' => $id]);
        if ($formation) {
            $form = $this->createForm(FormationType::class, $formation);
            return $this->render(
                'Formation/create.html.twig',
                [
                'entity' => $formation,
                'form' => $form->createView(),
                ]
            );
        } else {
            $error = "L'id n'existe pas" ;
            return $this->render("Formation/create.html.twig", [
                'error' => $error
                ]);
        }
    }
    
    public function remove($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $formation=$eManager->getRepository(Formation::class)->findOneBy(['id' => $id]);
        
        if ($formation) {
            $eManager->remove($formation);
            $eManager->flush();
        } else {
            $error = "L'id n'existe pas" ;
            return $this->render("Formation/create.html.twig", [
                'error' => $error
                ]);
        }
        
        return $this->redirectToRoute('app_lucky_number');
    }
}
