<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pricepage
 *
 * @ORM\Table(name="pricepage")
 * @ORM\Entity
 */
class Pricepage
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
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    public $description;

    /**
     * @var string
     *
     * @ORM\Column(name="price_image", type="string", length=255, nullable=false)
     */
    public $priceImage;

    /**
     * @var string
     *
     * @ORM\Column(name="price_catagory", type="string", length=255, nullable=false)
     */
    public $priceCatagory;

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
     * @return Pricepage
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
     * @return Pricepage
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
     * Set priceImage
     *
     * @param string $priceImage
     * @return Pricepage
     */
    public function setPriceImage($priceImage)
    {
        $this->priceImage = $priceImage;
    
        return $this;
    }

    /**
     * Get priceImage
     *
     * @return string 
     */
    public function getPriceImage()
    {
        return $this->priceImage;
    }

    /**
     * Set priceCatagory
     *
     * @param string $priceCatagory
     * @return Pricepage
     */
    public function setPriceCatagory($priceCatagory)
    {
        $this->priceCatagory = $priceCatagory;
    
        return $this;
    }

    /**
     * Get priceCatagory
     *
     * @return string 
     */
    public function getPriceCatagory()
    {
        return $this->priceCatagory;
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