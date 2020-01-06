<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CmsBlocTranslationRepository")
 */
class TextBlocTranslation
{
    use Translation;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;


    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
}
