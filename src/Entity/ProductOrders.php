<?php

namespace App\Entity;

use App\Repository\ProductOrdersRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductOrdersRepository::class)]
class ProductOrders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $entreprisename;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $username;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $emailadresse;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $telephone;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $productcategorie;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $message;

    #[ORM\Column(type: 'string', length: 255)]
    private $website;

    #[ORM\Column(type: 'string', length: 255)]
    private $quantity;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $transitelogistics;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $countries;


    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $cities;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getEntreprisename(): ?string
    {
        return $this->entreprisename;
    }

    public function setEntreprisename(string $entreprisename): self
    {
        $this->entreprisename = $entreprisename;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmailadresse(): ?string
    {
        return $this->emailadresse;
    }

    public function setEmailadresse(string $emailadresse): self
    {
        $this->emailadresse = $emailadresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getProductcategorie(): ?string
    {
        return $this->productcategorie;
    }

    public function setProductcategorie(string $productcategorie): self
    {
        $this->productcategorie = $productcategorie;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTransitelogistics(): ?string
    {
        return $this->transitelogistics;
    }

    public function setTransitelogistics(string $transitelogistics): self
    {
        $this->transitelogistics = $transitelogistics;

        return $this;
    }

    public function getCountries(): ?string
    {
        return $this->countries;
    }

    public function setCountries(string $countries): self
    {
        $this->countries = $countries;

        return $this;
    }

    public function getCities(): ?string
    {
        return $this->cities;
    }

    public function setCities(string $cities): self
    {
        $this->cities = $cities;

        return $this;
    }
}
