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
        
        return $this->render('Loisir/create.html.twig', [
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
        
        if($form->isSubmitted() && $form->isValid()) {
            $loisir = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($loisir);
            $entityManager->flush();
            
            return $this->redirectToRoute('app_lucky_number');
        }
        
        return $this->render('Loisir/create.html.twig', [
            'entity' => $loisir,
            'form' => $form->createView(),
            ]
        );
    }
    
    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $loisir = $entityManager->getRepository(Loisir::class)->findOneBy(['id' => $id]);
        $form = $this->createForm(LoisirType::class, $loisir);
        return $this->render('Loisir/create.html.twig', [
            'entity' => $loisir,
            'form' => $form->createView(),
            ]
        );
    }
}