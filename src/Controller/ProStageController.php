<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig');
    }

    //Controller pour les pages des Entreprises

     public function filtreEntreprise(): Response
     {
       return $this->render('pro_stage/filtreEntreprises.html.twig');
     }

     public function entreprise($entreprise_ID): Response
     {
       return $this->render('pro_stage/entreprise.html.twig',['entreprise_ID' => $entreprise_ID]);
     }

     //Controller pour les pages des Formations

     public function filtreFormations(): Response
     {
       return $this->render('pro_stage/filtreFormations.html.twig');
     }

      public function formations($formation_ID): Response
      {
        return $this->render('pro_stage/formations.html.twig',['formation_ID' => $formation_ID]);
      }



      public function stages($id): Response
         {
           return $this->render('pro_stage/stages.html.twig',['id' => $id]);

         }


}
