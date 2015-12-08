<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegionArea
 */
class RegionArea
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $countyName;

    /**
     * @var string
     */
    public $cityName;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var string
     */
    public $postalCode;

    /**
     * @var string
     */
    public $sortDesc;

    /**
     * @var integer
     */
    public $status;

    /**
     * @var integer
     */
    public $id;


    /**
     * Set type
     *
     * @param string $type
     * @return RegionArea
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set countyName
     *
     * @param string $countyName
     * @return RegionArea
     */
    public function setCountyName($countyName)
    {
        $this->countyName = $countyName;
    
        return $this;
    }

    /**
     * Get countyName
     *
     * @return string 
     */
    public function getCountyName()
    {
        return $this->countyName;
    }

    /**
     * Set cityName
     *
     * @param string $cityName
     * @return RegionArea
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
    
        return $this;
    }

    /**
     * Get cityName
     *
     * @return string 
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return RegionArea
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return RegionArea
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    
        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set sortDesc
     *
     * @param string $sortDesc
     * @return RegionArea
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
     * Set status
     *
     * @param integer $status
     * @return RegionArea
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
