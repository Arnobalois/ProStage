<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      //Creation des données de test des formations

      //formations DUT
        $formationdut = new Formation;
        $formationdut ->setNom("DUT Informatique Anglet");
        $formationdut -> setTypeFormation("DUT");
        $formationdut ->setDomaine("Informatique");
        $formationdut ->setVille("Anglet");

      //formation LP prog avance
        $formationLP = new Formation;
        $formationLP ->setNom("License Pro Prog Avance");
        $formationLP -> setTypeFormation("License Pro");
        $formationLP ->setDomaine("Programmation Avance");
        $formationLP ->setVille("Anglet");

      //formation LP Cyberdéfense

        $formationLPC = new Formation;
        $formationLPC ->setNom("License Pro Cyberdefense");
        $formationLPC -> setTypeFormation("License Pro");
        $formationLPC ->setDomaine("Cyberdefense");
        $formationLPC ->setVille("Vannes");

      //formation L3

        $formationL3 = new Formation;
        $formationL3 ->setNom("License 3 Informatique");
        $formationL3 -> setTypeFormation("License 3");
        $formationL3 ->setDomaine("Informatique");
        $formationL3 ->setVille("Paris");

      //formation Polytech1
        $formationP1 = new Formation;
        $formationP1 ->setNom("Polytech Angers");
        $formationP1 -> setTypeFormation("Ecole Ingenieur");
        $formationP1 ->setDomaine("Genie Informatique");
        $formationP1 ->setVille("Angers");

      //formation Polytech2
        $formationP2 = new Formation;
        $formationP2 ->setNom("Polytech Lyon");
        $formationP2 -> setTypeFormation("Ecole Ingenieur");
        $formationP2 ->setDomaine("Genie Biomedical");
        $formationP2 ->setVille("Lyon");

        //formation INSA
        $formationI = new Formation;
        $formationI ->setNom("INSA Toulouse");
        $formationI -> setTypeFormation("Ecole Ingenieur");
        $formationI ->setDomaine("Informatique et Reseaux");
        $formationI ->setVille("Toulouse");

        //formation INP
        $formationIN = new Formation;
        $formationIN ->setNom("ENSEEIHT");
        $formationIN -> setTypeFormation("Ecole Ingenieur");
        $formationIN ->setDomaine("Science du numerique");
        $formationIN ->setVille("Toulouse");

        $formations = array($formationdut , $formationLP , $formationLPC , $formationL3 , $formationP1 , $formationP2 , $formationI , $formationIN  );

        foreach $formation in $formations
        {
          $manager->persist($formation);
        }



        $manager->flush();

    }
}
