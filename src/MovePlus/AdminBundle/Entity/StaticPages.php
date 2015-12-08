<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StaticPages
 */
class StaticPages
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
     * @return StaticPages
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
     * @return StaticPages
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
     * @return StaticPages
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
