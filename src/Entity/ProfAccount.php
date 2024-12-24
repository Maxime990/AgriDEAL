<?php

namespace App\Entity;

use App\Repository\ProfAccountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfAccountRepository::class)]
class ProfAccount
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Compname;

    #[ORM\Column(type: 'string', length: 255)]
    private $phonenumber;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $activities;

    #[ORM\Column(type: 'string', length: 255)]
    private $gatewaypay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompname(): ?string
    {
        return $this->Compname;
    }

    public function setCompname(string $Compname): self
    {
        $this->Compname = $Compname;

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

    public function getActivities(): ?string
    {
        return $this->activities;
    }

    public function setActivities(string $activities): self
    {
        $this->activities = $activities;

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
