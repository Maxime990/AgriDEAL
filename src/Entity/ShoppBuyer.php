<?php

namespace App\Entity;

use DateTime;
use Assert\Regex;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ShoppBuyerRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ShoppBuyerRepository::class)]
class ShoppBuyer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Regex( pattern: '/^[a-z]+$/i', htmlPattern: '^[a-zA-Z]+$', message: 'Le nom ne doit contenir que des lettres.' )]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Regex( pattern: '/^[0-9]+$/i', htmlPattern: '^[0-9]+$', message: 'Le numéro de téléphone ne doit contenir que des chiffres.' )]
    private $phone;

    #[ORM\Column(type: 'string', length: 255)]
    private $address;

    #[ORM\Column(type: 'datetime')]
    private $create_date;

    #[ORM\Column(type: 'string', length: 255)]
    private $prodcutType;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;   
 
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }
    

    public function __toString(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreateDate(): ?\DateTime
    {
        return $this->create_date;
    }

    public function setCreateDate(DateTime $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getProdcutType(): ?string
    {
        return $this->prodcutType;
    }

    public function setProdcutType(string $prodcutType): self
    {
        $this->prodcutType = $prodcutType;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

}
