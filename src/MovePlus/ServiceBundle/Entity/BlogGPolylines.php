<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogGPolylines
 *
 * @ORM\Table(name="blog_g_polylines")
 * @ORM\Entity
 */
class BlogGPolylines
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
     * @ORM\Column(name="line_color", type="string", length=7, nullable=false)
     */
    private $lineColor;

    /**
     * @var string
     *
     * @ORM\Column(name="line_width", type="string", length=5, nullable=false)
     */
    private $lineWidth;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_line_color", type="string", length=9, nullable=false)
     */
    private $hoverLineColor;

    /**
     * @var string
     *
     * @ORM\Column(name="hover_line_opacity", type="string", length=9, nullable=false)
     */
    private $hoverLineOpacity;

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
     * @return BlogGPolylines
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
     * @return BlogGPolylines
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
     * @return BlogGPolylines
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
     * @return BlogGPolylines
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
     * @return BlogGPolylines
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
     * Set lineWidth
     *
     * @param string $lineWidth
     * @return BlogGPolylines
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
     * Set hoverLineColor
     *
     * @param string $hoverLineColor
     * @return BlogGPolylines
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
     * Set hoverLineOpacity
     *
     * @param string $hoverLineOpacity
     * @return BlogGPolylines
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}