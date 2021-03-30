<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Length(
*      min = 4,
*      max = 50,
*      minMessage = "le nom de l'entreprise doit être au moin de  {{ limit }} caractères de long",
*      maxMessage = "Le nom de l'entreprise ne doit pas dépaser les {{ limit }} caractères "
*)
* @Assert\NotBlank(message="Le champ ne peut pas être vide")
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le champ ne peut pas être vide")
     */
    private $Domaine;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le champ ne peut pas être vide")
     * @Assert\Url
     */
    private $URL_Site_Web;

    /**
     * @ORM\OneToMany(targetEntity=Stage::class, mappedBy="Entreprise")
     */
    private $stages;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le champ ne peut pas être vide")
     * @Assert\Regex(pattern="#^[1-9][0-9]{0,2}#", message="Le numéro de rue est incorrect")
 	   * @Assert\Regex(pattern="#[rue|avenue|boulevard|impasse|allée|place|route|voie]#",message="Le type de rue est incorrect")
 	   * @Assert\Regex(pattern="#[0-9]{5}#", message="Le code postal est incorrect")
     */
    private $Adresse;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
    }

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

    /**
     * @return Collection|Stage[]
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->stages->contains($stage)) {
            $this->stages[] = $stage;
            $stage->setEntreprise($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->stages->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getEntreprise() === $this) {
                $stage->setEntreprise(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }
}
