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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomentreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseentreprise;

    /**
     * @ORM\Column(type="integer")
     */
    private $teleentreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutentreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offre", mappedBy="entreprise")
     */
    private $offress;

    public function __construct()
    {
        $this->offress = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTeleentreprise(): ?int
    {
        return $this->teleentreprise;
    }

    public function setTeleentreprise(int $teleentreprise): self
    {
        $this->teleentreprise = $teleentreprise;

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

    public function getStatutentreprise(): ?string
    {
        return $this->statutentreprise;
    }

    public function setStatutentreprise(string $statutentreprise): self
    {
        $this->statutentreprise = $statutentreprise;

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
            $offress->setEntreprise($this);
        }

        return $this;
    }

    public function removeOffress(Offre $offress): self
    {
        if ($this->offress->contains($offress)) {
            $this->offress->removeElement($offress);
            // set the owning side to null (unless already changed)
            if ($offress->getEntreprise() === $this) {
                $offress->setEntreprise(null);
            }
        }

        return $this;
    }
}
