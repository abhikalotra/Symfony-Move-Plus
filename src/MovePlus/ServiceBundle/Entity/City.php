<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity
 */
class City
{
    /**
     * @var string
     *
     * @ORM\Column(name="city_name", type="string", length=255, nullable=true)
     */
    private $cityName;

    /**
     * @var integer
     *
     * @ORM\Column(name="county_id", type="integer", nullable=true)
     */
    private $countyId;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="created", type="string", length=255, nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set cityName
     *
     * @param string $cityName
     * @return City
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
     * Set countyId
     *
     * @param integer $countyId
     * @return City
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
     * Set postalCode
     *
     * @param string $postalCode
     * @return City
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
     * Set status
     *
     * @param integer $status
     * @return City
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
     * Set created
     *
     * @param string $created
     * @return City
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return string 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return City
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
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