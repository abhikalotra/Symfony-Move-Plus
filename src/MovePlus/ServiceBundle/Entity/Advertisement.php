<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advertisement
 *
 * @ORM\Table(name="advertisement")
 * @ORM\Entity
 */
class Advertisement
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="catagory_id", type="integer", nullable=false)
     */
    private $catagoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="catagory_name", type="string", length=255, nullable=false)
     */
    private $catagoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     */
    private $link;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set title
     *
     * @param string $title
     * @return Advertisement
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
     * Set description
     *
     * @param string $description
     * @return Advertisement
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Advertisement
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set catagoryId
     *
     * @param integer $catagoryId
     * @return Advertisement
     */
    public function setCatagoryId($catagoryId)
    {
        $this->catagoryId = $catagoryId;
    
        return $this;
    }

    /**
     * Get catagoryId
     *
     * @return integer 
     */
    public function getCatagoryId()
    {
        return $this->catagoryId;
    }

    /**
     * Set catagoryName
     *
     * @param string $catagoryName
     * @return Advertisement
     */
    public function setCatagoryName($catagoryName)
    {
        $this->catagoryName = $catagoryName;
    
        return $this;
    }

    /**
     * Get catagoryName
     *
     * @return string 
     */
    public function getCatagoryName()
    {
        return $this->catagoryName;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Advertisement
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Advertisement
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