<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\WoodCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"WoodCategories:read"}},
 *     denormalizationContext={"groups"={"WoodCategories:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"slug":"partial"})
 * @ORM\Entity(repositoryClass=WoodCategoriesRepository::class)
 * @Vich\Uploadable
 */
class WoodCategories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"WoodCases:read", "WoodCategories:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"WoodCases:read", "WoodCategories:read"})
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"WoodCategories:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"WoodCategories:read"})
     */
    private $thumbnail;

    /**
     * * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "thumbnail")
     */
    private $thumbnailFile;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"WoodCategories:read"})
     */
    private $published;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"WoodCategories:read"})
     */
    private $sorting;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=WoodCases::class, mappedBy="woodCasesCategories")
     * @Groups({"WoodCategories:read"})
     */
    private $woodCasesCategories;

    public function __construct()
    {
        $this->woodCasesCategories = new ArrayCollection();
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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|WoodCases[]
     */
    public function getWoodCasesCategories(): Collection
    {
        return $this->woodCasesCategories;
    }

    public function addWoodCasesCategory(WoodCases $woodCasesCategory): self
    {
        if (!$this->woodCasesCategories->contains($woodCasesCategory)) {
            $this->woodCasesCategories[] = $woodCasesCategory;
            $woodCasesCategory->addWoodCasesCategory($this);
        }

        return $this;
    }

    public function removeWoodCasesCategory(WoodCases $woodCasesCategory): self
    {
        if ($this->woodCasesCategories->removeElement($woodCasesCategory)) {
            $woodCasesCategory->removeWoodCasesCategory($this);
        }

        return $this;
    }

    public function __toString()
    {
        //return $this->getTitle();
        return $this->title;
    }
}
