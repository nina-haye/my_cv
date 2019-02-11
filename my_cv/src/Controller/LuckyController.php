<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use App\Entity\Experience;
use App\Entity\Loisir;

class LuckyController extends Controller
{
    public function number()
    {
        $nom = "coupat haye";
        $prenom = "Nina";
        $number = 12;
        $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        $experiences = $this->getDoctrine()->getRepository(Experience::class)->findAll();
        $loisirs = $this->getDoctrine()->getRepository(Loisir::class)->findAll();
        return $this->render('/lucky/number.html.twig', array(
            'nom' => $nom,
            'prenom' => $prenom,
            'number' => $number,
            
            'formations' => $formations,
            'experiences' => $experiences,
            'loisirs' => $loisirs
        ));
        
        
    }
    
    public function createformation()
    {
        $form = new Formation();
        $form->setName("Ma formation");
        $form->setDate_debut(new \DateTime());
        $form->setDate_fin(new \DateTime());
        $form->setLieu("Toal");
        $eManager = $this->getDoctrine()->getManager();
        $eManager->persist($form);
        $eManager->flush();
        
        return $this->redirectToRoute('app_lucky_number');
    }
    
    public function createexperience()
    {
        $exp = new Experience();
        $exp->setEntreprise("Tessi");
        $exp->setPoste("Agent Administratif");
        $exp->setDate_debut(new \DateTime());
        $exp->setDate_fin(new \DateTime());
        $exp->setLieu("Grenoble");
        $eManager = $this->getDoctrine()->getManager();
        $eManager->persist($exp);
        $eManager->flush();
        
        return $this->redirectToRoute('app_create_experience');
    }
}

