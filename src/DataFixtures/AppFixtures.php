<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      //création d'un générateur de donnée faker

      $faker = \Faker\Factory::create('fr_FR');

      //Creation des données de test des formations

      //formations DUT
        $formationdut = new Formation();
        $formationdut ->setNom("DUT Informatique Anglet");
        $formationdut -> setTypeFormation("DUT");
        $formationdut ->setDomaine("Informatique");
        $formationdut ->setVille("Anglet");

      //formation LP prog avance
        $formationLP = new Formation();
        $formationLP ->setNom("License Pro Prog Avance");
        $formationLP -> setTypeFormation("License Pro");
        $formationLP ->setDomaine("Programmation Avance");
        $formationLP ->setVille("Anglet");

      //formation LP Cyberdéfense

        $formationLPC = new Formation();
        $formationLPC ->setNom("License Pro Cyberdefense");
        $formationLPC -> setTypeFormation("License Pro");
        $formationLPC ->setDomaine("Cyberdefense");
        $formationLPC ->setVille("Vannes");

      //formation L3

        $formationL3 = new Formation();
        $formationL3 ->setNom("License 3 Informatique");
        $formationL3 -> setTypeFormation("License 3");
        $formationL3 ->setDomaine("Informatique");
        $formationL3 ->setVille("Paris");

      //formation Polytech1
        $formationP1 = new Formation();
        $formationP1 ->setNom("Polytech Angers");
        $formationP1 -> setTypeFormation("Ecole Ingenieur");
        $formationP1 ->setDomaine("Genie Informatique");
        $formationP1 ->setVille("Angers");

      //formation Polytech2
        $formationP2 = new Formation();
        $formationP2 ->setNom("Polytech Lyon");
        $formationP2 -> setTypeFormation("Ecole Ingenieur");
        $formationP2 ->setDomaine("Genie Biomedical");
        $formationP2 ->setVille("Lyon");

        //formation INSA
        $formationI = new Formation();
        $formationI ->setNom("INSA Toulouse");
        $formationI -> setTypeFormation("Ecole Ingenieur");
        $formationI ->setDomaine("Informatique et Reseaux");
        $formationI ->setVille("Toulouse");

        //formation INP
        $formationIN = new Formation();
        $formationIN ->setNom("ENSEEIHT");
        $formationIN -> setTypeFormation("Ecole Ingenieur");
        $formationIN ->setDomaine("Science du numerique");
        $formationIN ->setVille("Toulouse");

        $formations = array($formationdut , $formationLP , $formationLPC , $formationL3 , $formationP1 , $formationP2 , $formationI , $formationIN  );

        foreach ($formations as $formation){
          $manager->persist($formation);
        }


        $Entreprises =array();
        $Domaine = array("Informatique","Electronnique","Chimie","Banque","CyberSécurité","Commerce");


        for($i=0 ; $i < 10 ; $i++ ){
          $entreprise= new Entreprise();
          $entreprise -> setNom($faker->company());
          $entreprise -> setDomaine($Domaine[$faker->numberbetween($min=0 , $max = 5)]);
          $entreprise -> setAdresse($faker->address());
          $entreprise -> setURLSiteWeb($faker->url());
          $Entreprises[] = $entreprise;
        }

        foreach ($Entreprises as $entreprise){
          $manager->persist($entreprise);
        }

        $Stages = array();
        $Competences =array("C++","CSS/HTML","Java","SQL","PHP/JavaScript","C","Shell");
        $Experience = array("Oui","Non");

        foreach ($formations as $formation){


        for($i = 0 ; $i < 5 ; $i++){
          $stage= new Stage();

          $stage -> setNom($faker->JobTitle());
          $stage -> setDuree($faker->numberbetween($min = 2, $max = 30));
          $stage -> setDescription($faker->text($maxNbChars = 200));
          $stage -> setDateDebut($faker->dateTimeBetween($startDate = '-6 months' , $endDate = 'now' , $timezone = 'Europe/Paris' ));
          $stage -> setCompetencesRequises($Competences[$faker->numberbetween($min=0 , $max = 6)]);
          $stage -> setExperienceRequise($Experience[$faker->numberbetween($min=0 , $max = 1)]);
          $stage -> setEmail($faker->companyEmail());
          $stage -> setContact($faker->phoneNumber());
          $stage -> setEntreprise($Entreprises[$faker->numberbetween($min=0 , $max = 9)]);

          $stage -> addFormation($formation);
          $formation -> addStage($stage);

          $Stages[]=$stage ;

        }
      }

        foreach ($Stages as $Stage){
          $manager->persist($Stage);
        }


        $manager->flush();

    }
}
