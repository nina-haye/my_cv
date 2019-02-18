<?php

namespace App\Controller ;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Routing\Annotation\Route ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController ;
use App\Entity\Loisir ;
use App\Form\LoisirType ;

class LoisirController extends AbstractController
{
    public function create()
    {
        $loisir = new Loisir();
        $form = $this->createForm(LoisirType::class, $loisir);
        
        return $this->render(
            'Loisir/create.html.twig',
            [
            'entity' => $loisir,
            'form' => $form->createView(),
            ]
        );
    }
    
    public function valid(Request $request)
    {
        $loisir = new Loisir() ;
        $form = $this->createForm(LoisirType::class, $loisir);
    
        $form->handleRequest($request) ;
        
        if ($form->isSubmitted() && $form->isValid()) {
            $loisir = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($loisir);
            $entityManager->flush();
            
            return $this->redirectToRoute('app_lucky_number');
        }
        
        return $this->render(
            'Loisir/create.html.twig',
            [
            'entity' => $loisir,
            'form' => $form->createView(),
            ]
        );
    }
    
    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $loisir = $entityManager->getRepository(Loisir::class)->findOneBy(['id' => $id]);
        if ($loisir) {
            $form = $this->createForm(LoisirType::class, $loisir);
            return $this->render(
                'Loisir/create.html.twig',
                [
                'entity' => $loisir,
                'form' => $form->createView(),
                ]
            );
        } else {
            $error = "L'id n'existe pas" ;
            return $this->render("Loisir/create.html.twig", [
                'error' => $error
                ]);
        }
    }
    
    public function remove($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $loisir=$eManager->getRepository(Loisir::class)->findOneBy(['id' => $id]);
        if ($loisir) {
            $eManager->remove($loisir);
            $eManager->flush();
        } else {
            $error = "L'id n'existe pas" ;
            return $this->render("Loisir/create.html.twig", [
                    'error' => $error
                    ]);
        }
        
        return $this->redirectToRoute('app_lucky_number');
    }
}
