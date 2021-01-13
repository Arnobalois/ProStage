<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class ProStageController extends AbstractController
{
    public function index(): Response
    {
      //récupérer le repository de l'entité stages
      $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

      //Récupérer les stages enregistrées en BD
      $stages = $repositoryStage->findAll();

      //envoyer les stages récupérées à la vue charger de les afficher

        return $this->render('pro_stage/index.html.twig',['stages'=>$stages]);
    }

    //Controller pour les pages des Entreprises

     public function filtreEntreprise(): Response
     {

       //récupérer le repository de l'entité entreprise
       $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

       //Récupérer les stages enregistrées en BD
       $entreprises = $repositoryEntreprise->findAll();

       //envoyer les stages récupérées à la vue charger de les afficher
       return $this->render('pro_stage/filtreEntreprises.html.twig',['entreprises'=>$entreprises]);
     }

     public function entreprise($entreprise_ID): Response
     {
       //récupérer le repository de l'entité stages
       $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

       //Récupérer les stages enregistrées en BD
       $stages = $repositoryStage->findBy(["Entreprise" => $entreprise_ID]);

       //envoyer les stages récupérées à la vue charger de les afficher
       return $this->render('pro_stage/entreprise.html.twig',['stages' => $stages]);
     }

     //Controller pour les pages des Formations

     public function filtreFormations(): Response
     {
       //récupérer le repository de l'entité entreprise
       $repositoryFormation = $this->getDoctrine()->getRepository(formation::class);

       //Récupérer les stages enregistrées en BD
       $formations = $repositoryFormation->findAll();

       //envoyer les stages récupérées à la vue charger de les afficher
       return $this->render('pro_stage/filtreFormations.html.twig',['formations' => $formations]);
     }

      public function formations($formation_ID): Response
      {

        //récupérer le repository de l'entité stages
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les stages enregistrées en BD
        $stages = $repositoryStage->findBy(["Formation"=>$formation_ID]);

        //envoyer les stages récupérées à la vue charger de les afficher
        return $this->render('pro_stage/formations.html.twig',['stages' => $stages]);
      }

      //Controller pour la page du stage

      public function stages($id): Response
         {
           //récupérer le repository de l'entité stages
           $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

           //Récupérer les stages enregistrées en BD
           $stages = $repositoryStage->find($id);

           //envoyer les stages récupérées à la vue charger de les afficher
           return $this->render('pro_stage/stages.html.twig',['stages' => $stages]);

         }


}
