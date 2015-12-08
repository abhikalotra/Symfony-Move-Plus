<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Testimonial
 *
 * @ORM\Table(name="testimonial")
 * @ORM\Entity
 */
class Testimonial
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    public $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    public $image;

    /**
     * @var string
     *
     * @ORM\Column(name="writer_name", type="string", length=255, nullable=true)
     */
    public $writerName;

    /**
     * @var string
     *
     * @ORM\Column(name="star_rating", type="string", length=255, nullable=false)
     */
    public $starRating;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=false)
     */
    public $date;

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
     * Set title
     *
     * @param string $title
     * @return Testimonial
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
     * Set description
     *
     * @param string $description
     * @return Testimonial
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
     * Set image
     *
     * @param string $image
     * @return Testimonial
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set writerName
     *
     * @param string $writerName
     * @return Testimonial
     */
    public function setWriterName($writerName)
    {
        $this->writerName = $writerName;
    
        return $this;
    }

    /**
     * Get writerName
     *
     * @return string 
     */
    public function getWriterName()
    {
        return $this->writerName;
    }

    /**
     * Set starRating
     *
     * @param string $starRating
     * @return Testimonial
     */
    public function setStarRating($starRating)
    {
        $this->starRating = $starRating;
    
        return $this;
    }

    /**
     * Get starRating
     *
     * @return string 
     */
    public function getStarRating()
    {
        return $this->starRating;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Testimonial
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set howitsworkWidget
     *
     * @param integer $howitsworkWidget
     * @return Testimonial
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
     * @return Testimonial
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
     * @return Testimonial
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
     * @return Testimonial
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
     * @return Testimonial
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
     * Set status
     *
     * @param integer $status
     * @return Testimonial
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