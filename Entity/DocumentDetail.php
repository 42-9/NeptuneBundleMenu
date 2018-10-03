<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/09/2018
 * Time: 10:35
 */

namespace ScyLabs\NeptuneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="ScyLabs\NeptuneBundle\Repository\DocumentDetailRepository")
 */
class DocumentDetail extends AbstractDetail
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ScyLabs\NeptuneBundle\Entity\Document", inversedBy="details")
     * @ORM\JoinColumn(nullable=false)
     */
    private $document;

    public function getId(){
        return $this->id;
    }
    public function setDocument(Document $document) : self{
        $this->document = $document;
        return $this;
    }
    public function getDocument() : Document{
        return $this->document;
    }

}