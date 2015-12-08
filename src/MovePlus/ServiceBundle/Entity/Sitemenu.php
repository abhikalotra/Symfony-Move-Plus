<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sitemenu
 *
 * @ORM\Table(name="sitemenu")
 * @ORM\Entity
 */
class Sitemenu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     */
    public $parentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_no", type="integer", nullable=false)
     */
    public $orderNo;

    /**
     * @var string
     *
     * @ORM\Column(name="menu_type", type="string", length=255, nullable=false)
     */
    public $menuType;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="link_url", type="text", nullable=false)
     */
    public $linkUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;



    /**
     * Set parentId
     *
     * @param integer $parentId
     * @return Sitemenu
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    
        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set orderNo
     *
     * @param integer $orderNo
     * @return Sitemenu
     */
    public function setOrderNo($orderNo)
    {
        $this->orderNo = $orderNo;
    
        return $this;
    }

    /**
     * Get orderNo
     *
     * @return integer 
     */
    public function getOrderNo()
    {
        return $this->orderNo;
    }

    /**
     * Set menuType
     *
     * @param string $menuType
     * @return Sitemenu
     */
    public function setMenuType($menuType)
    {
        $this->menuType = $menuType;
    
        return $this;
    }

    /**
     * Get menuType
     *
     * @return string 
     */
    public function getMenuType()
    {
        return $this->menuType;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Sitemenu
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
     * Set linkUrl
     *
     * @param string $linkUrl
     * @return Sitemenu
     */
    public function setLinkUrl($linkUrl)
    {
        $this->linkUrl = $linkUrl;
    
        return $this;
    }

    /**
     * Get linkUrl
     *
     * @return string 
     */
    public function getLinkUrl()
    {
        return $this->linkUrl;
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