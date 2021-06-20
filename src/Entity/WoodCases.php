<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\WoodCasesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"WoodCases:read"}},
 *     denormalizationContext={"groups"={"WoodCases:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"slug":"partial"})
 * @ORM\Entity(repositoryClass=WoodCasesRepository::class)
 * @Vich\Uploadable
 */
class WoodCases
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
     * @Groups({"WoodCases:read", "WoodCategories:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"WoodCases:read", "WoodCategories:read"})
     */
    private $thumbnail;

    /**
     * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "thumbnail")
     */
    private $thumbnailFile;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"WoodCases:read"})
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"WoodCases:read", "WoodCategories:read"})
     */
    private $published;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"WoodCases:read", "WoodCategories:read"})
     */
    private $sorting;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=WoodCategories::class, inversedBy="woodCasesCategories")
     * @Groups({"WoodCases:read"})
     */
    private $woodCasesCategories;

    /**
     * @ORM\ManyToMany(targetEntity=WoodTypes::class)
     * @Groups({"WoodCases:read"})
     */
    private $woodCasesTypes;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"WoodCases:read"})
     */
    private $contentImg1;
    /**
     * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "contentImg1")
     */
    private $contentImg1File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"WoodCases:read"})
     */
    private $contentImg2;
    /**
     * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "contentImg2")
     */
    private $contentImg2File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"WoodCases:read"})
     */
    private $contentImg3;
    /**
     * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "contentImg3")
     */
    private $contentImg3File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"WoodCases:read"})
     */
    private $contentImg4;
    /**
     * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "contentImg4")
     */
    private $contentImg4File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"WoodCases:read"})
     */
    private $contentImg5;
    /**
     * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "contentImg5")
     */
    private $contentImg5File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"WoodCases:read"})
     */
    private $contentImg6;
    
    /**
     * @Vich\UploadableField(mapping = "uploads", fileNameProperty = "contentImg6")
     */
    private $contentImg6File;

    public function __construct()
    {
        $this->woodCasesCategories = new ArrayCollection();
        $this->woodCasesTypes = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    public function setThumbnailFile($thumbnail)
    {
        $this->thumbnailFile = $thumbnail;

        if ($thumbnail)
        {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return Collection|WoodCategories[]
     */
    public function getWoodCasesCategories(): Collection
    {
        return $this->woodCasesCategories;
    }

    public function addWoodCasesCategory(WoodCategories $woodCasesCategory): self
    {
        if (!$this->woodCasesCategories->contains($woodCasesCategory)) {
            $this->woodCasesCategories[] = $woodCasesCategory;
        }

        return $this;
    }

    public function removeWoodCasesCategory(WoodCategories $woodCasesCategory): self
    {
        $this->woodCasesCategories->removeElement($woodCasesCategory);

        return $this;
    }

    /**
     * @return Collection|WoodTypes[]
     */
    public function getWoodCasesTypes(): Collection
    {
        return $this->woodCasesTypes;
    }

    public function addWoodCasesType(WoodTypes $woodCasesType): self
    {
        if (!$this->woodCasesTypes->contains($woodCasesType)) {
            $this->woodCasesTypes[] = $woodCasesType;
        }

        return $this;
    }

    public function removeWoodCasesType(WoodTypes $woodCasesType): self
    {
        $this->woodCasesTypes->removeElement($woodCasesType);

        return $this;
    }

    public function getContentImg1(): ?string
    {
        return $this->contentImg1;
    }

    public function setContentImg1(?string $contentImg1): self
    {
        $this->contentImg1 = $contentImg1;

        return $this;
    }

    public function getContentImg2(): ?string
    {
        return $this->contentImg2;
    }

    public function setContentImg2(?string $contentImg2): self
    {
        $this->contentImg2 = $contentImg2;

        return $this;
    }

    public function getContentImg3(): ?string
    {
        return $this->contentImg3;
    }

    public function setContentImg3(?string $contentImg3): self
    {
        $this->contentImg3 = $contentImg3;

        return $this;
    }

    public function getContentImg4(): ?string
    {
        return $this->contentImg4;
    }

    public function setContentImg4(?string $contentImg4): self
    {
        $this->contentImg4 = $contentImg4;

        return $this;
    }

    public function getContentImg5(): ?string
    {
        return $this->contentImg5;
    }

    public function setContentImg5(?string $contentImg5): self
    {
        $this->contentImg5 = $contentImg5;

        return $this;
    }

    public function getContentImg6(): ?string
    {
        return $this->contentImg6;
    }

    public function setContentImg6(?string $contentImg6): self
    {
        $this->contentImg6 = $contentImg6;

        return $this;
    }

    public function getContentImg1File()
    {
        return $this->contentImg1File;
    }

    public function setContentImg1File($contentImg1)
    {
        $this->contentImg1File = $contentImg1;

        if ($contentImg1)
        {
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getContentImg2File()
    {
        return $this->contentImg2File;
    }

    public function setContentImg2File($contentImg2)
    {
        $this->contentImg2File = $contentImg2;

        if ($contentImg2)
        {
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getContentImg3File()
    {
        return $this->contentImg3File;
    }

    public function setContentImg3File($contentImg3)
    {
        $this->contentImg3File = $contentImg3;

        if ($contentImg3)
        {
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getContentImg4File()
    {
        return $this->contentImg4File;
    }

    public function setContentImg4File($contentImg4)
    {
        $this->contentImg4File = $contentImg4;

        if ($contentImg4)
        {
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getContentImg5File()
    {
        return $this->contentImg5File;
    }

    public function setContentImg5File($contentImg5)
    {
        $this->contentImg5File = $contentImg5;

        if ($contentImg5)
        {
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getContentImg6File()
    {
        return $this->contentImg6File;
    }

    public function setContentImg6File($contentImg6)
    {
        $this->contentImg6File = $contentImg6;

        if ($contentImg6)
        {
            $this->updatedAt = new \DateTime('now');
        }
    }
}
