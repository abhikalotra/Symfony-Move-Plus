<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogTerms
 *
 * @ORM\Table(name="blog_terms")
 * @ORM\Entity
 */
class BlogTerms
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=200, nullable=false)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="term_group", type="bigint", nullable=false)
     */
    private $termGroup;

    /**
     * @var integer
     *
     * @ORM\Column(name="term_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $termId;



    /**
     * Set name
     *
     * @param string $name
     * @return BlogTerms
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
     * Set slug
     *
     * @param string $slug
     * @return BlogTerms
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
     * Set termGroup
     *
     * @param integer $termGroup
     * @return BlogTerms
     */
    public function setTermGroup($termGroup)
    {
        $this->termGroup = $termGroup;
    
        return $this;
    }

    /**
     * Get termGroup
     *
     * @return integer 
     */
    public function getTermGroup()
    {
        return $this->termGroup;
    }

    /**
     * Get termId
     *
     * @return integer 
     */
    public function getTermId()
    {
        return $this->termId;
    }
}