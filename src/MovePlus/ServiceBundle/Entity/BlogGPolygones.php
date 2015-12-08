<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogGPolygones
 *
 * @ORM\Table(name="blog_g_polygones")
 * @ORM\Entity
 */
class BlogGPolygones
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
     * @ORM\Column(name="data", type="text", nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="line_opacity", type="string", length=5, nullable=false)
     */
    private $lineOpacity;

    /**
     * @var string
     *
     * @ORM\Column(name="line_color", type="string", length=9, nullable=false)
     */
    private $lineColor;

    /**
     * @var string
     *
     * @ORM\Column(name="fill_opacity", type="string", length=5, nullable=false)
     */
    private $fillOpacity;

    /**
     * @var string
     *
     * @ORM\Column(name="fill_color", type="string", length=9, nullable=false)
     */
    private $fillColor;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_line_opacity", type="string", length=5, nullable=false)
     */
    private $hoverLineOpacity;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_line_color", type="string", length=9, nullable=false)
     */
    private $hoverLineColor;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_fill_opacity", type="string", length=5, nullable=false)
     */
    private $hoverFillOpacity;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_fill_color", type="string", length=9, nullable=false)
     */
    private $hoverFillColor;

    /**
     * @var string
     *
     * @ORM\Column(name="line_width", type="string", length=9, nullable=false)
     */
    private $lineWidth;

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
     * @return BlogGPolygones
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
     * @return BlogGPolygones
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
     * Set data
     *
     * @param string $data
     * @return BlogGPolygones
     */
    public function setData($data)
    {
        $this->data = $data;
    
        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set lineOpacity
     *
     * @param string $lineOpacity
     * @return BlogGPolygones
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
     * @return BlogGPolygones
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
     * Set fillOpacity
     *
     * @param string $fillOpacity
     * @return BlogGPolygones
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
     * Set fillColor
     *
     * @param string $fillColor
     * @return BlogGPolygones
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
     * Set url
     *
     * @param string $url
     * @return BlogGPolygones
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set hoverLineOpacity
     *
     * @param string $hoverLineOpacity
     * @return BlogGPolygones
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
     * @return BlogGPolygones
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
     * Set hoverFillOpacity
     *
     * @param string $hoverFillOpacity
     * @return BlogGPolygones
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
     * Set hoverFillColor
     *
     * @param string $hoverFillColor
     * @return BlogGPolygones
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
     * Set lineWidth
     *
     * @param string $lineWidth
     * @return BlogGPolygones
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}