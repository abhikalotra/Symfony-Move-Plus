<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AllService
 *
 * @ORM\Table(name="all_service")
 * @ORM\Entity
 */
class AllService
{
    /**
     * @var string
     *
     * @ORM\Column(name="service_name", type="string", length=255, nullable=true)
     */
    public $serviceName;

    /**
     * @var string
     *
     * @ORM\Column(name="sort_desc", type="string", length=255, nullable=true)
     */
    public $sortDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="full_desc", type="string", length=255, nullable=true)
     */
    public $fullDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    public $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    public $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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