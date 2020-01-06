<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CmsPageTranslationRepository")
 */
class CmsPageTranslation
{
    use Translation;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return CmsPageTranslation
     */
    public function setTitle(?string $title): CmsPageTranslation
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return CmsPageTranslation
     */
    public function setSlug(?string $slug): CmsPageTranslation
    {
        $this->slug = $slug;
        return $this;
    }

    public function __toString()
    {
        return $this->title . ' ' . $this->locale;
    }
}
