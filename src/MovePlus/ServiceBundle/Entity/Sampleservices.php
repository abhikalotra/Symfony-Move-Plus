<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sampleservices
 *
 * @ORM\Table(name="sampleservices")
 * @ORM\Entity
 */
class Sampleservices
{
    /**
     * @var string
     *
     * @ORM\Column(name="county_name", type="string", length=255, nullable=false)
     */
    public $countyName;

    /**
     * @var string
     *
     * @ORM\Column(name="service_name", type="string", length=255, nullable=false)
     */
    public $serviceName;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    public $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_title", type="text", nullable=false)
     */
    public $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text", nullable=false)
     */
    public $metaKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", nullable=false)
     */
    public $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="text", nullable=false)
     */
    public $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    public $description;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_img", type="text", nullable=false)
     */
    public $bannerImg;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_text", type="string", length=255, nullable=false)
     */
    public $bannerText;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_sub_text", type="string", length=255, nullable=false)
     */
    public $bannerSubText;

    /**
     * @var string
     *
     * @ORM\Column(name="catagory", type="string", length=255, nullable=false)
     */
    public $catagory;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
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
     * Set countyName
     *
     * @param string $countyName
     * @return Sampleservices
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
     * Set serviceName
     *
     * @param string $serviceName
     * @return Sampleservices
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
     * Set title
     *
     * @param string $title
     * @return Sampleservices
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
     * Set slug
     *
     * @param string $slug
     * @return Sampleservices
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
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return Sampleservices
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
     * Set metaKeywords
     *
     * @param string $metaKeywords
     * @return Sampleservices
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    
        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Sampleservices
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
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Sampleservices
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
     * @return Sampleservices
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
     * Set bannerImg
     *
     * @param string $bannerImg
     * @return Sampleservices
     */
    public function setBannerImg($bannerImg)
    {
        $this->bannerImg = $bannerImg;
    
        return $this;
    }

    /**
     * Get bannerImg
     *
     * @return string 
     */
    public function getBannerImg()
    {
        return $this->bannerImg;
    }

    /**
     * Set bannerText
     *
     * @param string $bannerText
     * @return Sampleservices
     */
    public function setBannerText($bannerText)
    {
        $this->bannerText = $bannerText;
    
        return $this;
    }

    /**
     * Get bannerText
     *
     * @return string 
     */
    public function getBannerText()
    {
        return $this->bannerText;
    }

    /**
     * Set bannerSubText
     *
     * @param string $bannerSubText
     * @return Sampleservices
     */
    public function setBannerSubText($bannerSubText)
    {
        $this->bannerSubText = $bannerSubText;
    
        return $this;
    }

    /**
     * Get bannerSubText
     *
     * @return string 
     */
    public function getBannerSubText()
    {
        return $this->bannerSubText;
    }

    /**
     * Set catagory
     *
     * @param string $catagory
     * @return Sampleservices
     */
    public function setCatagory($catagory)
    {
        $this->catagory = $catagory;
    
        return $this;
    }

    /**
     * Get catagory
     *
     * @return string 
     */
    public function getCatagory()
    {
        return $this->catagory;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Sampleservices
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