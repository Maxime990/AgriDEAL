<?php

namespace App\Entity;

use App\Repository\BlogCategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogCategorieRepository::class)]
class BlogCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $articleNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getArticleNumber(): ?int
    {
        return $this->articleNumber;
    }

    public function setArticleNumber(int $articleNumber): self
    {
        $this->articleNumber = $articleNumber;

        return $this;
    }
}
