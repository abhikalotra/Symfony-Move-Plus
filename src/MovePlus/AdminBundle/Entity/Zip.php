<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zip
 */
class Zip
{
    /**
     * @var integer
     */
    public $countyId;

    /**
     * @var integer
     */
    public $cityId;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var string
     */
    public $zipcode;

    /**
     * @var integer
     */
    public $id;


    /**
     * Set countyId
     *
     * @param integer $countyId
     * @return Zip
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
     * Set cityId
     *
     * @param integer $cityId
     * @return Zip
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;
    
        return $this;
    }

    /**
     * Get cityId
     *
     * @return integer 
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Zip
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
     * Set zipcode
     *
     * @param string $zipcode
     * @return Zip
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    
        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
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
