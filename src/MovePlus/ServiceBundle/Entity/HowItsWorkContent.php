<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HowItsWorkContent
 *
 * @ORM\Table(name="how_its_work_content")
 * @ORM\Entity
 */
class HowItsWorkContent
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    public $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    public $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;



    /**
     * Set title
     *
     * @param string $title
     * @return HowItsWorkContent
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return HowItsWorkContent
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return HowItsWorkContent
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}