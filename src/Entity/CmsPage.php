<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CmsPageRepository")
 */
class CmsPage
{
    use Translatable;
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var TextBloc[]
     *
     * @ORM\OneToMany(targetEntity="TextBloc", mappedBy="cmsPage", cascade={"all"})
     */
    private $textBlocs;

    /**
     * @var TextBloc[]
     *
     * @ORM\OneToMany(targetEntity="TextImageBloc", mappedBy="cmsPage", cascade={"all"})
     */
    private $textImageBlocs;

    /**
     * CmsPage constructor.
     */
    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->textBlocs = new ArrayCollection();
        $this->textImageBlocs = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return CmsPage
     */
    public function setCreatedAt(\DateTime $createdAt): CmsPage
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return CmsPage
     */
    public function setUpdatedAt(\DateTime $updatedAt): CmsPage
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return TextBloc[]
     */
    public function getTextBlocs()
    {
        return $this->textBlocs;
    }

    /**
     * @return TextBloc[]
     */
    public function getTextImageBlocs(): Collection
    {
        return $this->textImageBlocs;
    }

    public function addTextBloc(TextBloc $bloc): self
    {
        if (!$this->textBlocs->contains($bloc)) {
            $this->textBlocs[] = $bloc;
            $bloc->setCmsPage($this);
        }

        return $this;
    }

    public function removeTextBloc(TextBloc $bloc): self
    {
        if ($this->textBlocs->contains($bloc)) {
            $this->textBlocs->removeElement($bloc);
            if ($bloc->getCmsPage() === $this) {
                $bloc->setCmsPage(null);
            }
        }

        return $this;
    }

    public function addTextImageBloc(TextImageBloc $bloc): self
    {
        if (!$this->textImageBlocs->contains($bloc)) {
            $this->textImageBlocs[] = $bloc;
            $bloc->setCmsPage($this);
        }

        return $this;
    }

    public function removeTextImageBloc(TextImageBloc $bloc): self
    {
        if ($this->textImageBlocs->contains($bloc)) {
            $this->textImageBlocs->removeElement($bloc);
            if ($bloc->getCmsPage() === $this) {
                $bloc->setCmsPage(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return "$this->id";
    }
}
