<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogGMaps
 *
 * @ORM\Table(name="blog_g_maps")
 * @ORM\Entity
 */
class BlogGMaps
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="zoom", type="integer", nullable=false)
     */
    private $zoom;

    /**
     * @var string
     *
     * @ORM\Column(name="min_zoom", type="string", length=55, nullable=false)
     */
    private $minZoom;

    /**
     * @var string
     *
     * @ORM\Column(name="max_zoom", type="string", length=55, nullable=false)
     */
    private $maxZoom;

    /**
     * @var integer
     *
     * @ORM\Column(name="border_radius", type="integer", nullable=false)
     */
    private $borderRadius;

    /**
     * @var string
     *
     * @ORM\Column(name="center_lat", type="string", length=255, nullable=false)
     */
    private $centerLat;

    /**
     * @var string
     *
     * @ORM\Column(name="pan_controller", type="string", length=5, nullable=false)
     */
    private $panController;

    /**
     * @var string
     *
     * @ORM\Column(name="zoom_controller", type="string", length=5, nullable=false)
     */
    private $zoomController;

    /**
     * @var string
     *
     * @ORM\Column(name="type_controller", type="string", length=5, nullable=false)
     */
    private $typeController;

    /**
     * @var string
     *
     * @ORM\Column(name="scale_controller", type="string", length=5, nullable=false)
     */
    private $scaleController;

    /**
     * @var string
     *
     * @ORM\Column(name="street_view_controller", type="string", length=5, nullable=false)
     */
    private $streetViewController;

    /**
     * @var string
     *
     * @ORM\Column(name="overview_map_controller", type="string", length=5, nullable=false)
     */
    private $overviewMapController;

    /**
     * @var string
     *
     * @ORM\Column(name="center_lng", type="string", length=255, nullable=false)
     */
    private $centerLng;

    /**
     * @var string
     *
     * @ORM\Column(name="width", type="string", length=5, nullable=false)
     */
    private $width;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="string", length=5, nullable=false)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="align", type="string", length=11, nullable=false)
     */
    private $align;

    /**
     * @var string
     *
     * @ORM\Column(name="info_type", type="string", length=9, nullable=false)
     */
    private $infoType;

    /**
     * @var string
     *
     * @ORM\Column(name="traffic_layer", type="string", length=55, nullable=false)
     */
    private $trafficLayer;

    /**
     * @var string
     *
     * @ORM\Column(name="bike_layer", type="string", length=55, nullable=false)
     */
    private $bikeLayer;

    /**
     * @var string
     *
     * @ORM\Column(name="transit_layer", type="string", length=55, nullable=false)
     */
    private $transitLayer;

    /**
     * @var string
     *
     * @ORM\Column(name="styling_hue", type="text", nullable=false)
     */
    private $stylingHue;

    /**
     * @var string
     *
     * @ORM\Column(name="styling_lightness", type="string", length=55, nullable=false)
     */
    private $stylingLightness;

    /**
     * @var string
     *
     * @ORM\Column(name="styling_gamma", type="string", length=55, nullable=false)
     */
    private $stylingGamma;

    /**
     * @var string
     *
     * @ORM\Column(name="styling_saturation", type="string", length=55, nullable=false)
     */
    private $stylingSaturation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     * @return BlogGMaps
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return BlogGMaps
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set zoom
     *
     * @param integer $zoom
     * @return BlogGMaps
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    
        return $this;
    }

    /**
     * Get zoom
     *
     * @return integer 
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * Set minZoom
     *
     * @param string $minZoom
     * @return BlogGMaps
     */
    public function setMinZoom($minZoom)
    {
        $this->minZoom = $minZoom;
    
        return $this;
    }

    /**
     * Get minZoom
     *
     * @return string 
     */
    public function getMinZoom()
    {
        return $this->minZoom;
    }

    /**
     * Set maxZoom
     *
     * @param string $maxZoom
     * @return BlogGMaps
     */
    public function setMaxZoom($maxZoom)
    {
        $this->maxZoom = $maxZoom;
    
        return $this;
    }

    /**
     * Get maxZoom
     *
     * @return string 
     */
    public function getMaxZoom()
    {
        return $this->maxZoom;
    }

    /**
     * Set borderRadius
     *
     * @param integer $borderRadius
     * @return BlogGMaps
     */
    public function setBorderRadius($borderRadius)
    {
        $this->borderRadius = $borderRadius;
    
        return $this;
    }

    /**
     * Get borderRadius
     *
     * @return integer 
     */
    public function getBorderRadius()
    {
        return $this->borderRadius;
    }

    /**
     * Set centerLat
     *
     * @param string $centerLat
     * @return BlogGMaps
     */
    public function setCenterLat($centerLat)
    {
        $this->centerLat = $centerLat;
    
        return $this;
    }

    /**
     * Get centerLat
     *
     * @return string 
     */
    public function getCenterLat()
    {
        return $this->centerLat;
    }

    /**
     * Set panController
     *
     * @param string $panController
     * @return BlogGMaps
     */
    public function setPanController($panController)
    {
        $this->panController = $panController;
    
        return $this;
    }

    /**
     * Get panController
     *
     * @return string 
     */
    public function getPanController()
    {
        return $this->panController;
    }

    /**
     * Set zoomController
     *
     * @param string $zoomController
     * @return BlogGMaps
     */
    public function setZoomController($zoomController)
    {
        $this->zoomController = $zoomController;
    
        return $this;
    }

    /**
     * Get zoomController
     *
     * @return string 
     */
    public function getZoomController()
    {
        return $this->zoomController;
    }

    /**
     * Set typeController
     *
     * @param string $typeController
     * @return BlogGMaps
     */
    public function setTypeController($typeController)
    {
        $this->typeController = $typeController;
    
        return $this;
    }

    /**
     * Get typeController
     *
     * @return string 
     */
    public function getTypeController()
    {
        return $this->typeController;
    }

    /**
     * Set scaleController
     *
     * @param string $scaleController
     * @return BlogGMaps
     */
    public function setScaleController($scaleController)
    {
        $this->scaleController = $scaleController;
    
        return $this;
    }

    /**
     * Get scaleController
     *
     * @return string 
     */
    public function getScaleController()
    {
        return $this->scaleController;
    }

    /**
     * Set streetViewController
     *
     * @param string $streetViewController
     * @return BlogGMaps
     */
    public function setStreetViewController($streetViewController)
    {
        $this->streetViewController = $streetViewController;
    
        return $this;
    }

    /**
     * Get streetViewController
     *
     * @return string 
     */
    public function getStreetViewController()
    {
        return $this->streetViewController;
    }

    /**
     * Set overviewMapController
     *
     * @param string $overviewMapController
     * @return BlogGMaps
     */
    public function setOverviewMapController($overviewMapController)
    {
        $this->overviewMapController = $overviewMapController;
    
        return $this;
    }

    /**
     * Get overviewMapController
     *
     * @return string 
     */
    public function getOverviewMapController()
    {
        return $this->overviewMapController;
    }

    /**
     * Set centerLng
     *
     * @param string $centerLng
     * @return BlogGMaps
     */
    public function setCenterLng($centerLng)
    {
        $this->centerLng = $centerLng;
    
        return $this;
    }

    /**
     * Get centerLng
     *
     * @return string 
     */
    public function getCenterLng()
    {
        return $this->centerLng;
    }

    /**
     * Set width
     *
     * @param string $width
     * @return BlogGMaps
     */
    public function setWidth($width)
    {
        $this->width = $width;
    
        return $this;
    }

    /**
     * Get width
     *
     * @return string 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param string $height
     * @return BlogGMaps
     */
    public function setHeight($height)
    {
        $this->height = $height;
    
        return $this;
    }

    /**
     * Get height
     *
     * @return string 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set align
     *
     * @param string $align
     * @return BlogGMaps
     */
    public function setAlign($align)
    {
        $this->align = $align;
    
        return $this;
    }

    /**
     * Get align
     *
     * @return string 
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * Set infoType
     *
     * @param string $infoType
     * @return BlogGMaps
     */
    public function setInfoType($infoType)
    {
        $this->infoType = $infoType;
    
        return $this;
    }

    /**
     * Get infoType
     *
     * @return string 
     */
    public function getInfoType()
    {
        return $this->infoType;
    }

    /**
     * Set trafficLayer
     *
     * @param string $trafficLayer
     * @return BlogGMaps
     */
    public function setTrafficLayer($trafficLayer)
    {
        $this->trafficLayer = $trafficLayer;
    
        return $this;
    }

    /**
     * Get trafficLayer
     *
     * @return string 
     */
    public function getTrafficLayer()
    {
        return $this->trafficLayer;
    }

    /**
     * Set bikeLayer
     *
     * @param string $bikeLayer
     * @return BlogGMaps
     */
    public function setBikeLayer($bikeLayer)
    {
        $this->bikeLayer = $bikeLayer;
    
        return $this;
    }

    /**
     * Get bikeLayer
     *
     * @return string 
     */
    public function getBikeLayer()
    {
        return $this->bikeLayer;
    }

    /**
     * Set transitLayer
     *
     * @param string $transitLayer
     * @return BlogGMaps
     */
    public function setTransitLayer($transitLayer)
    {
        $this->transitLayer = $transitLayer;
    
        return $this;
    }

    /**
     * Get transitLayer
     *
     * @return string 
     */
    public function getTransitLayer()
    {
        return $this->transitLayer;
    }

    /**
     * Set stylingHue
     *
     * @param string $stylingHue
     * @return BlogGMaps
     */
    public function setStylingHue($stylingHue)
    {
        $this->stylingHue = $stylingHue;
    
        return $this;
    }

    /**
     * Get stylingHue
     *
     * @return string 
     */
    public function getStylingHue()
    {
        return $this->stylingHue;
    }

    /**
     * Set stylingLightness
     *
     * @param string $stylingLightness
     * @return BlogGMaps
     */
    public function setStylingLightness($stylingLightness)
    {
        $this->stylingLightness = $stylingLightness;
    
        return $this;
    }

    /**
     * Get stylingLightness
     *
     * @return string 
     */
    public function getStylingLightness()
    {
        return $this->stylingLightness;
    }

    /**
     * Set stylingGamma
     *
     * @param string $stylingGamma
     * @return BlogGMaps
     */
    public function setStylingGamma($stylingGamma)
    {
        $this->stylingGamma = $stylingGamma;
    
        return $this;
    }

    /**
     * Get stylingGamma
     *
     * @return string 
     */
    public function getStylingGamma()
    {
        return $this->stylingGamma;
    }

    /**
     * Set stylingSaturation
     *
     * @param string $stylingSaturation
     * @return BlogGMaps
     */
    public function setStylingSaturation($stylingSaturation)
    {
        $this->stylingSaturation = $stylingSaturation;
    
        return $this;
    }

    /**
     * Get stylingSaturation
     *
     * @return string 
     */
    public function getStylingSaturation()
    {
        return $this->stylingSaturation;
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