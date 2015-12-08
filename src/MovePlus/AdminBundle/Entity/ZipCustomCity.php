<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZipCustomCity
 */
class ZipCustomCity
{
    /**
     * @var integer
     */
    public $countyId;

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
    public $postcode;

    /**
     * @var integer
     */
    public $status;

    /**
     * @var integer
     */
    public $id;


    /**
     * Set countyId
     *
     * @param integer $countyId
     * @return ZipCustomCity
     */
    public function setCountyId($countyId)
    {
        $this->countyId = $countyId;
    
        return $this;
    }

    /**
     * Get countyId
     *
     * @return integer 
     */
    public function getCountyId()
    {
        return $this->countyId;
    }

    /**
     * Set cityName
     *
     * @param string $cityName
     * @return ZipCustomCity
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
     * @return ZipCustomCity
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
     * Set postcode
     *
     * @param string $postcode
     * @return ZipCustomCity
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    
        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return ZipCustomCity
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
