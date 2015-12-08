<?php

namespace MovePlus\AdministratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 */
class Services
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
    public $country;

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
    
    public $template;
    
    public $leftsidebar;

    /**
     * @var integer
     */
    public $id;

    
    /**
     * Set setTemplate
     *
     * @param string $template
     * @return Services
     */
    public function setLeftsidebar($leftsidebar)
    {
        $this->leftsidebar = $leftsidebar;
    
        return $this;
    }

    /**
     * Get getTemplate
     *
     * @return string 
     */
    public function getLeftsidebar()
    {
        return $this->leftsidebar;
    }
    
    
    /**
     * Set $template
     *
     * @param string $template
     * @return Services
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get $template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }
    
    
    /**
     * Set parentId
     *
     * @param integer $parentId
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * Set country
     *
     * @param string $country
     * @return Services
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set county
     *
     * @param string $county
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * @return Services
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
     * @return Services
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
