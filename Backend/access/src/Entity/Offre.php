<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\OffreRepository")
 */
class Offre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datedebut;

    /**
     * @ORM\Column(type="date")
     */
    private $datefin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Descriptionoffre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typecontrat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metier;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="offres")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="offress")
     */
    private $entreprise;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getDescriptionoffre(): ?string
    {
        return $this->Descriptionoffre;
    }

    public function setDescriptionoffre(string $Descriptionoffre): self
    {
        $this->Descriptionoffre = $Descriptionoffre;

        return $this;
    }

    public function getTypecontrat(): ?string
    {
        return $this->typecontrat;
    }

    public function setTypecontrat(string $typecontrat): self
    {
        $this->typecontrat = $typecontrat;

        return $this;
    }

    public function getSecteur(): ?string
    {
        return $this->secteur;
    }

    public function setSecteur(string $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    public function getMetier(): ?string
    {
        return $this->metier;
    }

    public function setMetier(string $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
