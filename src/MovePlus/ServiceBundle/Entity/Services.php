<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="services")
 * @ORM\Entity
 */
class Services
{
    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     */
    public $parentId;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_title", type="string", length=255, nullable=true)
     */
    public $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keyword", type="string", length=255, nullable=true)
     */
    public $metaKeyword;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="string", length=255, nullable=true)
     */
    public $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    public $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="text", nullable=true)
     */
    public $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    public $description;

    /**
     * @var string
     *
     * @ORM\Column(name="featured_image", type="string", length=255, nullable=true)
     */
    public $featuredImage;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    public $country;

    /**
     * @var string
     *
     * @ORM\Column(name="county", type="string", length=255, nullable=true)
     */
    public $county;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    public $city;

    /**
     * @var string
     *
     * @ORM\Column(name="region_area", type="string", length=255, nullable=true)
     */
    public $regionArea;

    /**
     * @var integer
     *
     * @ORM\Column(name="zip_code", type="integer", nullable=true)
     */
    public $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_title", type="string", length=255, nullable=true)
     */
    public $bannerTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_sort_desc", type="string", length=255, nullable=true)
     */
    public $bannerSortDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="page_type", type="string", length=255, nullable=true)
     */
    public $pageType;

    /**
     * @var string
     *
     * @ORM\Column(name="catagory", type="string", length=255, nullable=true)
     */
    public $catagory;

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="string", length=255, nullable=false)
     */
    public $template;

    /**
     * @var string
     *
     * @ORM\Column(name="leftsidebar", type="text", nullable=false)
     */
    public $leftsidebar;

    /**
     * @var string
     *
     * @ORM\Column(name="rightsidebar", type="text", nullable=false)
     */
    public $rightsidebar;

    /**
     * @var integer
     *
     * @ORM\Column(name="howitswork_widget", type="integer", nullable=false)
     */
    public $howitsworkWidget;

    /**
     * @var integer
     *
     * @ORM\Column(name="relatedservices_widget", type="integer", nullable=false)
     */
    public $relatedservicesWidget;

    /**
     * @var integer
     *
     * @ORM\Column(name="readytobook_widget", type="integer", nullable=false)
     */
    public $readytobookWidget;

    /**
     * @var integer
     *
     * @ORM\Column(name="blog_widget", type="integer", nullable=false)
     */
    public $blogWidget;

    /**
     * @var integer
     *
     * @ORM\Column(name="customertestimonial_widget", type="integer", nullable=false)
     */
    public $customertestimonialWidget;

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
     * Set bannerTitle
     *
     * @param string $bannerTitle
     * @return Services
     */
    public function setBannerTitle($bannerTitle)
    {
        $this->bannerTitle = $bannerTitle;
    
        return $this;
    }

    /**
     * Get bannerTitle
     *
     * @return string 
     */
    public function getBannerTitle()
    {
        return $this->bannerTitle;
    }

    /**
     * Set bannerSortDesc
     *
     * @param string $bannerSortDesc
     * @return Services
     */
    public function setBannerSortDesc($bannerSortDesc)
    {
        $this->bannerSortDesc = $bannerSortDesc;
    
        return $this;
    }

    /**
     * Get bannerSortDesc
     *
     * @return string 
     */
    public function getBannerSortDesc()
    {
        return $this->bannerSortDesc;
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
     * Set catagory
     *
     * @param string $catagory
     * @return Services
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
     * Set template
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
     * Get template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set leftsidebar
     *
     * @param string $leftsidebar
     * @return Services
     */
    public function setLeftsidebar($leftsidebar)
    {
        $this->leftsidebar = $leftsidebar;
    
        return $this;
    }

    /**
     * Get leftsidebar
     *
     * @return string 
     */
    public function getLeftsidebar()
    {
        return $this->leftsidebar;
    }

    /**
     * Set rightsidebar
     *
     * @param string $rightsidebar
     * @return Services
     */
    public function setRightsidebar($rightsidebar)
    {
        $this->rightsidebar = $rightsidebar;
    
        return $this;
    }

    /**
     * Get rightsidebar
     *
     * @return string 
     */
    public function getRightsidebar()
    {
        return $this->rightsidebar;
    }

    /**
     * Set howitsworkWidget
     *
     * @param integer $howitsworkWidget
     * @return Services
     */
    public function setHowitsworkWidget($howitsworkWidget)
    {
        $this->howitsworkWidget = $howitsworkWidget;
    
        return $this;
    }

    /**
     * Get howitsworkWidget
     *
     * @return integer 
     */
    public function getHowitsworkWidget()
    {
        return $this->howitsworkWidget;
    }

    /**
     * Set relatedservicesWidget
     *
     * @param integer $relatedservicesWidget
     * @return Services
     */
    public function setRelatedservicesWidget($relatedservicesWidget)
    {
        $this->relatedservicesWidget = $relatedservicesWidget;
    
        return $this;
    }

    /**
     * Get relatedservicesWidget
     *
     * @return integer 
     */
    public function getRelatedservicesWidget()
    {
        return $this->relatedservicesWidget;
    }

    /**
     * Set readytobookWidget
     *
     * @param integer $readytobookWidget
     * @return Services
     */
    public function setReadytobookWidget($readytobookWidget)
    {
        $this->readytobookWidget = $readytobookWidget;
    
        return $this;
    }

    /**
     * Get readytobookWidget
     *
     * @return integer 
     */
    public function getReadytobookWidget()
    {
        return $this->readytobookWidget;
    }

    /**
     * Set blogWidget
     *
     * @param integer $blogWidget
     * @return Services
     */
    public function setBlogWidget($blogWidget)
    {
        $this->blogWidget = $blogWidget;
    
        return $this;
    }

    /**
     * Get blogWidget
     *
     * @return integer 
     */
    public function getBlogWidget()
    {
        return $this->blogWidget;
    }

    /**
     * Set customertestimonialWidget
     *
     * @param integer $customertestimonialWidget
     * @return Services
     */
    public function setCustomertestimonialWidget($customertestimonialWidget)
    {
        $this->customertestimonialWidget = $customertestimonialWidget;
    
        return $this;
    }

    /**
     * Get customertestimonialWidget
     *
     * @return integer 
     */
    public function getCustomertestimonialWidget()
    {
        return $this->customertestimonialWidget;
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