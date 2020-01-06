<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CmsBasicBlocRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"cms_basic_bloc" = "CmsBasicBloc", "text_bloc" = "TextBloc", "text_image_block" = "TextImageBloc"})
 */
class CmsBasicBloc
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $orderBy;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var CmsPage
     *
     * @ORM\ManyToOne(targetEntity="CmsPage", inversedBy="textBlocs")
     */
    private $cmsPage;

    /**
     * CmsBasicBloc constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return CmsBasicBloc
     */
    public function setUrl(string $url): CmsBasicBloc
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderBy(): ?int
    {
        return $this->orderBy;
    }

    /**
     * @param int $orderBy
     * @return CmsBasicBloc
     */
    public function setOrderBy(int $orderBy): CmsBasicBloc
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     * @return CmsBasicBloc
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): CmsBasicBloc
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface $updatedAt
     * @return CmsBasicBloc
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): CmsBasicBloc
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return CmsPage
     */
    public function getCmsPage(): CmsPage
    {
        return $this->cmsPage;
    }

    /**
     * @param CmsPage $cmsPage
     * @return CmsBasicBloc
     */
    public function setCmsPage(?CmsPage $cmsPage): CmsBasicBloc
    {
        $this->cmsPage = $cmsPage;
        return $this;
    }
}
