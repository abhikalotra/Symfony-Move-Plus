<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * County
 *
 * @ORM\Table(name="county")
 * @ORM\Entity
 */
class County
{
    /**
     * @var string
     *
     * @ORM\Column(name="county_name", type="string", length=255, nullable=true)
     */
    private $countyName;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
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