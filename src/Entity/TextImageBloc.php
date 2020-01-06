<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TextImageBlocRepository")
 */
class TextImageBloc extends TextBloc
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Picture
     *
     * @ORM\OneToOne(targetEntity="Picture", cascade={"all"})
     */
    private $picture;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Picture
     */
    public function getPicture(): ?Picture
    {
        return $this->picture;
    }

    /**
     * @param Picture $picture
     * @return $this
     */
    public function setPicture(Picture $picture): self
    {
        $this->picture = $picture;
        return $this;
    }
}
