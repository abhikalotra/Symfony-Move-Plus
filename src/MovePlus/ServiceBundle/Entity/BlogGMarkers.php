<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogGMarkers
 *
 * @ORM\Table(name="blog_g_markers")
 * @ORM\Entity
 */
class BlogGMarkers
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
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=255, nullable=false)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="string", length=255, nullable=false)
     */
    private $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="animation", type="string", length=255, nullable=false)
     */
    private $animation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=false)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=11, nullable=false)
     */
    private $size;

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
     * @return BlogGMarkers
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
     * Set title
     *
     * @param string $title
     * @return BlogGMarkers
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
     * Set lat
     *
     * @param string $lat
     * @return BlogGMarkers
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    
        return $this;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param string $lng
     * @return BlogGMarkers
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    
        return $this;
    }

    /**
     * Get lng
     *
     * @return string 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set animation
     *
     * @param string $animation
     * @return BlogGMarkers
     */
    public function setAnimation($animation)
    {
        $this->animation = $animation;
    
        return $this;
    }

    /**
     * Get animation
     *
     * @return string 
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return BlogGMarkers
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
     * Set img
     *
     * @param string $img
     * @return BlogGMarkers
     */
    public function setImg($img)
    {
        $this->img = $img;
    
        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return BlogGMarkers
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
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