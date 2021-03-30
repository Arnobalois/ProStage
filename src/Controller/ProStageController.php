<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\EntrepriseType;
use App\Form\StageType;

class ProStageController extends AbstractController
{
    public function index( StageRepository $repositoryStage): Response
    {
      //Récupérer les stages enregistrées en BD
      $stages = $repositoryStage->findAll();

      //envoyer les stages récupérées à la vue charger de les afficher

        return $this->render('pro_stage/index.html.twig',['stages'=>$stages]);
    }

    //Controller pour les pages des Entreprises

     public function filtreEntreprise( EntrepriseRepository $repositoryEntreprise): Response
     {

       //Récupérer les entreprises enregistrées en BD
       $entreprises = $repositoryEntreprise->findAll();

       //envoyer les entreprises récupérées à la vue charger de les afficher
       return $this->render('pro_stage/filtreEntreprises.html.twig',['entreprises'=>$entreprises]);
     }

     public function entreprise(StageRepository $repositoryStage , $entreprise_ID): Response
     {
       //Récupérer les stages enregistrées en BD qui on pour attribut Entreprise l'id passé en parametre
       $stages = $repositoryStage->findByEntreprise($entreprise_ID);

       //envoyer les stages récupérées à la vue charger de les afficher
       return $this->render('pro_stage/entreprise.html.twig',['stages' => $stages]);
     }

     //Controller pour les pages des Formations

     public function filtreFormations(FormationRepository $repositoryFormation): Response
     {
       //Récupérer les Formations enregistrées en BD qui on pour attribut Entreprise l'id passé en parametre
       $formations = $repositoryFormation->findAll();

       //envoyer les Formations récupérées à la vue charger de les afficher
       return $this->render('pro_stage/filtreFormations.html.twig',['formations' => $formations]);
     }

      public function formations(StageRepository $repositoryStage ,$formation_ID): Response
      {
        //Récupérer les stages enregistrées en BD
        $stages = $repositoryStage->findByFormation($formation_ID);

        //envoyer les stages récupérées à la vue charger de les afficher
        return $this->render('pro_stage/formations.html.twig',['stages' => $stages]);
      }

      //Controller pour la page du stage

      public function stages( Stage $stage): Response
         {
           //envoyer les stages récupérées à la vue charger de les afficher
           return $this->render('pro_stage/stages.html.twig',['stage' => $stage]);

         }

        public function AjouterEntreprise(Request $request , EntityManagerInterface $manager ): Response
            {
            $entreprise = new Entreprise;

              $FormulaireEntreprise = $this -> createForm(EntrepriseType::class, $entreprise);


              $FormulaireEntreprise->handleRequest($request);
              if($FormulaireEntreprise->isSubmitted() && $FormulaireEntreprise->isValid()){

                $manager->persist($entreprise);
                $manager->flush();

                return $this->redirectToRoute('pro_stage_accueil');


              }

              //envoyer les stages récupérées à la vue charger de les afficher
              return $this->render('pro_stage/AjoutModifEntreprise.html.twig',['vueFormulaire' => $FormulaireEntreprise->createView(),'action'=>"ajouter"]);

            }

            public function ModifierEntreprise(Request $request , EntityManagerInterface $manager ,Entreprise $entreprise): Response
                {


                  $FormulaireEntreprise = $this -> createForm(EntrepriseType::class, $entreprise);


                  $FormulaireEntreprise->handleRequest($request);
                  if($FormulaireEntreprise->isSubmitted()){

                    $manager->persist($entreprise);
                    $manager->flush();

                    return $this->redirectToRoute('pro_stage_accueil');


                  }

                  //envoyer les stages récupérées à la vue charger de les afficher
                  return $this->render('pro_stage/AjoutModifEntreprise.html.twig',['vueFormulaire' => $FormulaireEntreprise->createView(), 'action'=>"ajouer"]);

                }

                public function AjouterStage(Request $request , EntityManagerInterface $manager ): Response
                    {
                    $stage = new Stage;

                      $FormulaireStage = $this -> createForm(StageType::class, $stage);


                      $FormulaireStage->handleRequest($request);
                      if($FormulaireStage->isSubmitted() && $FormulaireStage->isValid()){

                        $manager->persist($stage);
                        $manager->flush();

                        return $this->redirectToRoute('pro_stage_accueil');


                      }

                      //envoyer les stages récupérées à la vue charger de les afficher
                      return $this->render('pro_stage/Ajouter.html.twig',['vueFormulaire' => $FormulaireStage->createView(),'action'=>"ajouter"]);

                    }


}
