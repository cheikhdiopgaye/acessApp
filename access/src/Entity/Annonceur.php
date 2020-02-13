<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\AnnonceurRepository")
 */
class Annonceur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civilite;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confirmepassword;

    /**
     * @ORM\Column(type="json")
     */
    private $profil = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutan;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offre", mappedBy="annonceur")
     */
    private $offress;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="annonceurs")
     */
    private $entreprise;

    public function __construct()
    {
        $this->offress = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getTel1(): ?int
    {
        return $this->tel1;
    }

    public function setTel1(int $tel1): self
    {
        $this->tel1 = $tel1;

        return $this;
    }

    public function getTel2(): ?int
    {
        return $this->tel2;
    }

    public function setTel2(?int $tel2): self
    {
        $this->tel2 = $tel2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmepassword(): ?string
    {
        return $this->confirmepassword;
    }

    public function setConfirmepassword(string $confirmepassword): self
    {
        $this->confirmepassword = $confirmepassword;

        return $this;
    }

    public function getProfil(): ?array
    {
        return $this->profil;
    }

    public function setProfil(array $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getStatutan(): ?string
    {
        return $this->statutan;
    }

    public function setStatutan(string $statutan): self
    {
        $this->statutan = $statutan;

        return $this;
    }

    /**
     * @return Collection|Offre[]
     */
    public function getOffress(): Collection
    {
        return $this->offress;
    }

    public function addOffress(Offre $offress): self
    {
        if (!$this->offress->contains($offress)) {
            $this->offress[] = $offress;
            $offress->setAnnonceur($this);
        }

        return $this;
    }

    public function removeOffress(Offre $offress): self
    {
        if ($this->offress->contains($offress)) {
            $this->offress->removeElement($offress);
            // set the owning side to null (unless already changed)
            if ($offress->getAnnonceur() === $this) {
                $offress->setAnnonceur(null);
            }
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
