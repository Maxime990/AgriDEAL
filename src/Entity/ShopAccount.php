<?php

namespace App\Entity;

use App\Repository\ShopAccountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopAccountRepository::class)]
class ShopAccount
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Shopname;

    #[ORM\Column(type: 'string', length: 255)]
    private $phonenumber;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $gatewaypay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShopname(): ?string
    {
        return $this->Shopname;
    }

    public function setShopname(string $Shopname): self
    {
        $this->Shopname = $Shopname;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

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

    public function getGatewaypay(): ?string
    {
        return $this->gatewaypay;
    }

    public function setGatewaypay(string $gatewaypay): self
    {
        $this->gatewaypay = $gatewaypay;

        return $this;
    }
}
