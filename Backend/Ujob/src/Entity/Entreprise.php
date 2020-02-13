<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
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
    private $nomentrep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressentrep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionentrep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siteinternet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteuractivite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="entreprise")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomentrep(): ?string
    {
        return $this->nomentrep;
    }

    public function setNomentrep(string $nomentrep): self
    {
        $this->nomentrep = $nomentrep;

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

    public function getAdressentrep(): ?string
    {
        return $this->adressentrep;
    }

    public function setAdressentrep(string $adressentrep): self
    {
        $this->adressentrep = $adressentrep;

        return $this;
    }

    public function getDescriptionentrep(): ?string
    {
        return $this->descriptionentrep;
    }

    public function setDescriptionentrep(string $descriptionentrep): self
    {
        $this->descriptionentrep = $descriptionentrep;

        return $this;
    }

    public function getSiteinternet(): ?string
    {
        return $this->siteinternet;
    }

    public function setSiteinternet(string $siteinternet): self
    {
        $this->siteinternet = $siteinternet;

        return $this;
    }

    public function getSecteuractivite(): ?string
    {
        return $this->secteuractivite;
    }

    public function setSecteuractivite(string $secteuractivite): self
    {
        $this->secteuractivite = $secteuractivite;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setEntreprise($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getEntreprise() === $this) {
                $user->setEntreprise(null);
            }
        }

        return $this;
    }
}
