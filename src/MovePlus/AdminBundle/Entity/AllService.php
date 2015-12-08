<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AllService
 */
class AllService
{
    /**
     * @var string
     */
    public $serviceName;

    /**
     * @var string
     */
    public $sortDesc;

    /**
     * @var string
     */
    public $fullDesc;

    /**
     * @var string
     */
    public $image;

    /**
     * @var integer
     */
    public $status;

    /**
     * @var integer
     */
    public $id;


    /**
     * Set serviceName
     *
     * @param string $serviceName
     * @return AllService
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    
        return $this;
    }

    /**
     * Get serviceName
     *
     * @return string 
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * Set sortDesc
     *
     * @param string $sortDesc
     * @return AllService
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
     * Set fullDesc
     *
     * @param string $fullDesc
     * @return AllService
     */
    public function setFullDesc($fullDesc)
    {
        $this->fullDesc = $fullDesc;
    
        return $this;
    }

    /**
     * Get fullDesc
     *
     * @return string 
     */
    public function getFullDesc()
    {
        return $this->fullDesc;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return AllService
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
     * Set status
     *
     * @param integer $status
     * @return AllService
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
