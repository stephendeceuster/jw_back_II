<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\PhotoCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"PhotoCategories:read"}},
 *     denormalizationContext={"groups"={"PhotoCategories:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"slug":"partial"})
 * @ORM\Entity(repositoryClass=PhotoCategoriesRepository::class)
 * @Vich\Uploadable
 */
class PhotoCategories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"PhotoCases:read", "PhotoCategories:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"PhotoCases:read", "PhotoCategories:read"})
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"PhotoCategories:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"PhotoCategories:read"})
     */
    private $published;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"PhotoCategories:read"})
     */
    private $sorting;

    /**
     * @ORM\ManyToMany(targetEntity=PhotoCases::class, mappedBy="photoCasesCategories")
     * @Groups({"PhotoCategories:read"})
     */
    private $photoCases;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"PhotoCategories:read"})
     */
    private $thumbnail;

    /**
     * * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "thumbnail")
     */
    private $thumbnailFile;

    /**
     *  @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->photoCases = new ArrayCollection();
        $this->updatedAt = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = strip_tags($description);

        return $this;
    }

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getSorting(): ?int
    {
        return $this->sorting;
    }

    public function setSorting(?int $sorting): self
    {
        $this->sorting = $sorting;

        return $this;
    }

    

    public function __toString()
    {
        //return $this->getTitle();
        return $this->title;
    }

    /**
     * @return Collection|PhotoCases[]
     */
    public function getPhotoCases(): Collection
    {
        return $this->photoCases;
    }

    public function addPhotoCase(PhotoCases $photoCase): self
    {
        if (!$this->photoCases->contains($photoCase)) {
            $this->photoCases[] = $photoCase;
            $photoCase->addPhotoCasesCategory($this);
        }

        return $this;
    }

    public function removePhotoCase(PhotoCases $photoCase): self
    {
        if ($this->photoCases->removeElement($photoCase)) {
            $photoCase->removePhotoCasesCategory($this);
        }

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get the value of thumbnailFile
     */ 
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * @param mixed $thumbnailFile
     */
    public function setThumbnailFile($thumbnail)
    {
        $this->thumbnailFile = $thumbnail;

        if ($thumbnail)
        {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
