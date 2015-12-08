<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SliderContent
 */
class SliderContent
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $sortDesc;

    /**
     * @var string
     */
    public $sliderImage;

    /**
     * @var string
     */
    public $serviceLink;

    /**
     * @var integer
     */
    public $status;

    /**
     * @var integer
     */
    public $id;


    /**
     * Set title
     *
     * @param string $title
     * @return SliderContent
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
     * Set sortDesc
     *
     * @param string $sortDesc
     * @return SliderContent
     */
    public function setSortDesc($sortDesc)
    {
        $this->sortDesc = $sortDesc;
    
        return $this;
    }

    /**
     * Get sortDesc
     *
     * @return string 
     */
    public function getSortDesc()
    {
        return $this->sortDesc;
    }

    /**
     * Set sliderImage
     *
     * @param string $sliderImage
     * @return SliderContent
     */
    public function setSliderImage($sliderImage)
    {
        $this->sliderImage = $sliderImage;
    
        return $this;
    }

    /**
     * Get sliderImage
     *
     * @return string 
     */
    public function getSliderImage()
    {
        return $this->sliderImage;
    }

    /**
     * Set serviceLink
     *
     * @param string $serviceLink
     * @return SliderContent
     */
    public function setServiceLink($serviceLink)
    {
        $this->serviceLink = $serviceLink;
    
        return $this;
    }

    /**
     * Get serviceLink
     *
     * @return string 
     */
    public function getServiceLink()
    {
        return $this->serviceLink;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return SliderContent
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
