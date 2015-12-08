<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CityZip
 */
class CityZip
{
    /**
     * @var integer
     */
    public $countyId;

    /**
     * @var string
     */
    public $title;

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
     * @return CityZip
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
     * Set title
     *
     * @param string $title
     * @return CityZip
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
     * Set cityName
     *
     * @param string $cityName
     * @return CityZip
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
     * @return CityZip
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
     * @return CityZip
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
     * @return CityZip
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
