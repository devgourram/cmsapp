<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $fileName;

    /**
     * @Vich\UploadableField(mapping="block", fileNameProperty="fileName")
     * @var File
     */
    private $file;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;


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
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return Picture
     */
    public function setFileName(?string $fileName): Picture
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function setFile(File $image = null)
    {
        $this->file = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getFile()
    {
        return $this->file;
    }
}
