<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * County
 */
class County
{
    /**
     * @var string
     */
    public $countyName;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var integer
     */
    public $status;

    /**
     * @var integer
     */
    public $id;


    /**
     * Set countyName
     *
     * @param string $countyName
     * @return County
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
     * Set slug
     *
     * @param string $slug
     * @return County
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
     * Set status
     *
     * @param integer $status
     * @return County
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
