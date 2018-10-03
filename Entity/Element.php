<?php

namespace ScyLabs\NeptuneBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;

/**
 * @ORM\Entity(repositoryClass="ScyLabs\NeptuneBundle\Repository\ElementRepository")
 */
class Element extends AbstractElem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ScyLabs\NeptuneBundle\Entity\ElementType", inversedBy="elements")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $type;

    /**
     * @ORM\OneToMany(targetEntity="ScyLabs\NeptuneBundle\Entity\Photo", mappedBy="element",cascade={"persist","remove"})
     * @OrderBy({"prio" = "ASC"})
     */
    protected $photos;

    /**
     * @ORM\OneToMany(targetEntity="ScyLabs\NeptuneBundle\Entity\Document", mappedBy="element",cascade={"persist","remove"})
     * @OrderBy({"prio" = "ASC"})
     */
    protected $documents;

    /**
     * @ORM\OneToMany(targetEntity="ScyLabs\NeptuneBundle\Entity\Video", mappedBy="element",cascade={"persist","remove"})
     * @OrderBy({"prio" = "ASC"})
     */
    protected $videos;

    /**
     * @ORM\OneToMany(targetEntity="ScyLabs\NeptuneBundle\Entity\ElementDetail", mappedBy="element", orphanRemoval=true,cascade={"persist","remove"})
     */
    protected $details;

    /**
     * @ORM\OneToMany(targetEntity="ScyLabs\NeptuneBundle\Entity\Zone", mappedBy="element")
     */
    private $zones;

    /**
     * @ORM\OneToMany(targetEntity="ScyLabs\NeptuneBundle\Entity\PageUrl", mappedBy="page",cascade={"persist","remove","refresh"})
     */

    private $urls;

    public function __construct()
    {
        $this->zones = new ArrayCollection();
        $this->details = new ArrayCollection();
        parent::__construct();
    }

    public function getId()
    {
        return $this->id;
    }



    /**
     * @return Collection|Zone[]
     */
    public function getZones(): Collection
    {
        return $this->zones;
    }

    public function addZone(Zone $zone): self
    {
        if (!$this->zones->contains($zone)) {
            $this->zones[] = $zone;
            $zone->setElement($this);
        }

        return $this;
    }

    public function removeZone(Zone $zone): self
    {
        if ($this->zones->contains($zone)) {
            $this->zones->removeElement($zone);
            // set the owning side to null (unless already changed)
            if ($zone->getElement() === $this) {
                $zone->setElement(null);
            }
        }

        return $this;
    }
    public function getType(): ?ElementType
    {
        return $this->type;
    }

    public function setType(?ElementType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|ElementDetail[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(ElementDetail $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setElement($this);
        }

        return $this;
    }

    public function removeDetail(ElementDetail $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getElement() === $this) {
                $detail->setElement(null);
            }
        }

        return $this;
    }
    public function getDetail($locale): ElementDetail {
        foreach ($this->details as $detail){
            if($detail->getLang() == $locale){
                return $detail;
            }
        }
        return new ElementDetail();
    }

    public function setParent(AbstractElem $parent) : self{

        if($parent instanceof Page){
            $this->page = $parent;
        }
        return $this;

    }

    /**
     * @return Collection|ElementUrl[]
     */
    public function getUrls(): Collection
    {
        return $this->urls;
    }

    public function getUrl($locale) : ?ElementUrl{
        foreach ($this->urls as $url){
            if($url->getLang() == $locale){
                return $url;
            }
        }
        return null;
    }

    public function addUrl(ElementUrl $url): self
    {
        if (!$this->urls->contains($url)) {
            $this->urls[] = $url;
            $url->setPage($this);
        }

        return $this;
    }

    public function removeUrl(ElementUrl $url): self
    {
        if ($this->urls->contains($url)) {
            $this->urls->removeElement($url);
            // set the owning side to null (unless already changed)
            if ($url->getPage() === $this) {
                $url->setPage(null);
            }
        }

        return $this;
    }


}
