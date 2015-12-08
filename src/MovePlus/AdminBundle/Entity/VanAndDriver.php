<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VanAndDriver
 */
class VanAndDriver
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var integer
     */
    public $id;


    /**
     * Set title
     *
     * @param string $title
     * @return VanAndDriver
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
