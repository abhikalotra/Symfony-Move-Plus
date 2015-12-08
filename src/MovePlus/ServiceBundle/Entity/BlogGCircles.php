<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogGCircles
 *
 * @ORM\Table(name="blog_g_circles")
 * @ORM\Entity
 */
class BlogGCircles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="map", type="integer", nullable=false)
     */
    private $map;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="center_lat", type="string", length=255, nullable=false)
     */
    private $centerLat;

    /**
     * @var string
     *
     * @ORM\Column(name="center_lng", type="string", length=255, nullable=false)
     */
    private $centerLng;

    /**
     * @var string
     *
     * @ORM\Column(name="radius", type="string", length=255, nullable=false)
     */
    private $radius;

    /**
     * @var string
     *
     * @ORM\Column(name="line_width", type="string", length=5, nullable=false)
     */
    private $lineWidth;

    /**
     * @var string
     *
     * @ORM\Column(name="line_opacity", type="string", length=5, nullable=false)
     */
    private $lineOpacity;

    /**
     * @var string
     *
     * @ORM\Column(name="line_color", type="string", length=7, nullable=false)
     */
    private $lineColor;

    /**
     * @var string
     *
     * @ORM\Column(name="fill_color", type="string", length=7, nullable=false)
     */
    private $fillColor;

    /**
     * @var string
     *
     * @ORM\Column(name="fill_opacity", type="string", length=7, nullable=false)
     */
    private $fillOpacity;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_line_opacity", type="string", length=5, nullable=false)
     */
    private $hoverLineOpacity;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_line_color", type="string", length=7, nullable=false)
     */
    private $hoverLineColor;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_fill_color", type="string", length=7, nullable=false)
     */
    private $hoverFillColor;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_fill_opacity", type="string", length=7, nullable=false)
     */
    private $hoverFillOpacity;

    /**
     * @var integer
     *
     * @ORM\Column(name="show_marker", type="integer", nullable=false)
     */
    private $showMarker;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set map
     *
     * @param integer $map
     * @return BlogGCircles
     */
    public function setMap($map)
    {
        $this->map = $map;
    
        return $this;
    }

    /**
     * Get map
     *
     * @return integer 
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BlogGCircles
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
     * Set centerLat
     *
     * @param string $centerLat
     * @return BlogGCircles
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
     * Set centerLng
     *
     * @param string $centerLng
     * @return BlogGCircles
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
     * Set radius
     *
     * @param string $radius
     * @return BlogGCircles
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
    
        return $this;
    }

    /**
     * Get radius
     *
     * @return string 
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * Set lineWidth
     *
     * @param string $lineWidth
     * @return BlogGCircles
     */
    public function setLineWidth($lineWidth)
    {
        $this->lineWidth = $lineWidth;
    
        return $this;
    }

    /**
     * Get lineWidth
     *
     * @return string 
     */
    public function getLineWidth()
    {
        return $this->lineWidth;
    }

    /**
     * Set lineOpacity
     *
     * @param string $lineOpacity
     * @return BlogGCircles
     */
    public function setLineOpacity($lineOpacity)
    {
        $this->lineOpacity = $lineOpacity;
    
        return $this;
    }

    /**
     * Get lineOpacity
     *
     * @return string 
     */
    public function getLineOpacity()
    {
        return $this->lineOpacity;
    }

    /**
     * Set lineColor
     *
     * @param string $lineColor
     * @return BlogGCircles
     */
    public function setLineColor($lineColor)
    {
        $this->lineColor = $lineColor;
    
        return $this;
    }

    /**
     * Get lineColor
     *
     * @return string 
     */
    public function getLineColor()
    {
        return $this->lineColor;
    }

    /**
     * Set fillColor
     *
     * @param string $fillColor
     * @return BlogGCircles
     */
    public function setFillColor($fillColor)
    {
        $this->fillColor = $fillColor;
    
        return $this;
    }

    /**
     * Get fillColor
     *
     * @return string 
     */
    public function getFillColor()
    {
        return $this->fillColor;
    }

    /**
     * Set fillOpacity
     *
     * @param string $fillOpacity
     * @return BlogGCircles
     */
    public function setFillOpacity($fillOpacity)
    {
        $this->fillOpacity = $fillOpacity;
    
        return $this;
    }

    /**
     * Get fillOpacity
     *
     * @return string 
     */
    public function getFillOpacity()
    {
        return $this->fillOpacity;
    }

    /**
     * Set hoverLineOpacity
     *
     * @param string $hoverLineOpacity
     * @return BlogGCircles
     */
    public function setHoverLineOpacity($hoverLineOpacity)
    {
        $this->hoverLineOpacity = $hoverLineOpacity;
    
        return $this;
    }

    /**
     * Get hoverLineOpacity
     *
     * @return string 
     */
    public function getHoverLineOpacity()
    {
        return $this->hoverLineOpacity;
    }

    /**
     * Set hoverLineColor
     *
     * @param string $hoverLineColor
     * @return BlogGCircles
     */
    public function setHoverLineColor($hoverLineColor)
    {
        $this->hoverLineColor = $hoverLineColor;
    
        return $this;
    }

    /**
     * Get hoverLineColor
     *
     * @return string 
     */
    public function getHoverLineColor()
    {
        return $this->hoverLineColor;
    }

    /**
     * Set hoverFillColor
     *
     * @param string $hoverFillColor
     * @return BlogGCircles
     */
    public function setHoverFillColor($hoverFillColor)
    {
        $this->hoverFillColor = $hoverFillColor;
    
        return $this;
    }

    /**
     * Get hoverFillColor
     *
     * @return string 
     */
    public function getHoverFillColor()
    {
        return $this->hoverFillColor;
    }

    /**
     * Set hoverFillOpacity
     *
     * @param string $hoverFillOpacity
     * @return BlogGCircles
     */
    public function setHoverFillOpacity($hoverFillOpacity)
    {
        $this->hoverFillOpacity = $hoverFillOpacity;
    
        return $this;
    }

    /**
     * Get hoverFillOpacity
     *
     * @return string 
     */
    public function getHoverFillOpacity()
    {
        return $this->hoverFillOpacity;
    }

    /**
     * Set showMarker
     *
     * @param integer $showMarker
     * @return BlogGCircles
     */
    public function setShowMarker($showMarker)
    {
        $this->showMarker = $showMarker;
    
        return $this;
    }

    /**
     * Get showMarker
     *
     * @return integer 
     */
    public function getShowMarker()
    {
        return $this->showMarker;
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