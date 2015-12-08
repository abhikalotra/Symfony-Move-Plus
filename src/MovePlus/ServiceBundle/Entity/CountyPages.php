<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CountyPages
 *
 * @ORM\Table(name="county_pages")
 * @ORM\Entity
 */
class CountyPages
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", nullable=false)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="service_slug", type="string", length=255, nullable=false)
     */
    public $serviceSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="county_slug", type="string", length=255, nullable=false)
     */
    public $countySlug;

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
     * @ORM\Column(name="banner_img", type="text", nullable=false)
     */
    public $bannerImg;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_text", type="text", nullable=false)
     */
    public $bannerText;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_sub_text", type="text", nullable=false)
     */
    public $bannerSubText;

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
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    public $status;

    /**
     * @var string
     *
     * @ORM\Column(name="county", type="string", length=255, nullable=false)
     */
    public $county;

    /**
     * @var string
     *
     * @ORM\Column(name="service_name", type="string", length=255, nullable=false)
     */
    public $serviceName;

    /**
     * @var string
     *
     * @ORM\Column(name="catagory", type="string", length=255, nullable=false)
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
     * Set title
     *
     * @param string $title
     * @return CountyPages
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
     * Set serviceSlug
     *
     * @param string $serviceSlug
     * @return CountyPages
     */
    public function setServiceSlug($serviceSlug)
    {
        $this->serviceSlug = $serviceSlug;
    
        return $this;
    }

    /**
     * Get serviceSlug
     *
     * @return string 
     */
    public function getServiceSlug()
    {
        return $this->serviceSlug;
    }

    /**
     * Set countySlug
     *
     * @param string $countySlug
     * @return CountyPages
     */
    public function setCountySlug($countySlug)
    {
        $this->countySlug = $countySlug;
    
        return $this;
    }

    /**
     * Get countySlug
     *
     * @return string 
     */
    public function getCountySlug()
    {
        return $this->countySlug;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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
     * Set bannerImg
     *
     * @param string $bannerImg
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return CountyPages
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
     * @return CountyPages
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
     * Set status
     *
     * @param integer $status
     * @return CountyPages
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
     * Set county
     *
     * @param string $county
     * @return CountyPages
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
     * Set serviceName
     *
     * @param string $serviceName
     * @return CountyPages
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
     * Set catagory
     *
     * @param string $catagory
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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
     * @return CountyPages
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