<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Domaine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $URL_Site_Web;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->Domaine;
    }

    public function setDomaine(string $Domaine): self
    {
        $this->Domaine = $Domaine;

        return $this;
    }

    public function getURLSiteWeb(): ?string
    {
        return $this->URL_Site_Web;
    }

    public function setURLSiteWeb(string $URL_Site_Web): self
    {
        $this->URL_Site_Web = $URL_Site_Web;

        return $this;
    }
}
