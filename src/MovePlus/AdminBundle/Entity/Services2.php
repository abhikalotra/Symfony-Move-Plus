<?php

namespace MovePlus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services2
 */
class Services2
{
    /**
     * @var integer
     */
    public $parentId;

    /**
     * @var string
     */
    public $metaTitle;

    /**
     * @var string
     */
    public $metaKeyword;

    /**
     * @var string
     */
    public $metaDescription;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $shortDescription;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $featuredImage;

    /**
     * @var string
     */
    public $county;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $regionArea;

    /**
     * @var integer
     */
    public $zipCode;

    /**
     * @var string
     */
    public $pageType;

    /**
     * @var integer
     */
    public $id;


    /**
     * Set parentId
     *
     * @param integer $parentId
     * @return Services2
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
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return Services2
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    
        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set metaKeyword
     *
     * @param string $metaKeyword
     * @return Services2
     */
    public function setMetaKeyword($metaKeyword)
    {
        $this->metaKeyword = $metaKeyword;
    
        return $this;
    }

    /**
     * Get metaKeyword
     *
     * @return string 
     */
    public function getMetaKeyword()
    {
        return $this->metaKeyword;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Services2
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    
        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Services2
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
     * Set title
     *
     * @param string $title
     * @return Services2
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
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Services2
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    
        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Services2
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set featuredImage
     *
     * @param string $featuredImage
     * @return Services2
     */
    public function setFeaturedImage($featuredImage)
    {
        $this->featuredImage = $featuredImage;
    
        return $this;
    }

    /**
     * Get featuredImage
     *
     * @return string 
     */
    public function getFeaturedImage()
    {
        return $this->featuredImage;
    }

    /**
     * Set county
     *
     * @param string $county
     * @return Services2
     */
    public function setCounty($county)
    {
        $this->county = $county;
    
        return $this;
    }

    /**
     * Get county
     *
     * @return string 
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Services2
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set regionArea
     *
     * @param string $regionArea
     * @return Services2
     */
    public function setRegionArea($regionArea)
    {
        $this->regionArea = $regionArea;
    
        return $this;
    }

    /**
     * Get regionArea
     *
     * @return string 
     */
    public function getRegionArea()
    {
        return $this->regionArea;
    }

    /**
     * Set zipCode
     *
     * @param integer $zipCode
     * @return Services2
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    
        return $this;
    }

    /**
     * Get zipCode
     *
     * @return integer 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set pageType
     *
     * @param string $pageType
     * @return Services2
     */
    public function setPageType($pageType)
    {
        $this->pageType = $pageType;
    
        return $this;
    }

    /**
     * Get pageType
     *
     * @return string 
     */
    public function getPageType()
    {
        return $this->pageType;
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
