<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomentreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseentreprise;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Annonceur", mappedBy="entreprise")
     */
    private $annonceurs;

    public function __construct()
    {
        $this->annonceurs = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomentreprise(): ?string
    {
        return $this->nomentreprise;
    }

    public function setNomentreprise(string $nomentreprise): self
    {
        $this->nomentreprise = $nomentreprise;

        return $this;
    }

    public function getAdresseentreprise(): ?string
    {
        return $this->adresseentreprise;
    }

    public function setAdresseentreprise(string $adresseentreprise): self
    {
        $this->adresseentreprise = $adresseentreprise;

        return $this;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|Annonceur[]
     */
    public function getAnnonceurs(): Collection
    {
        return $this->annonceurs;
    }

    public function addAnnonceur(Annonceur $annonceur): self
    {
        if (!$this->annonceurs->contains($annonceur)) {
            $this->annonceurs[] = $annonceur;
            $annonceur->setEntreprise($this);
        }

        return $this;
    }

    public function removeAnnonceur(Annonceur $annonceur): self
    {
        if ($this->annonceurs->contains($annonceur)) {
            $this->annonceurs->removeElement($annonceur);
            // set the owning side to null (unless already changed)
            if ($annonceur->getEntreprise() === $this) {
                $annonceur->setEntreprise(null);
            }
        }

        return $this;
    }

}
