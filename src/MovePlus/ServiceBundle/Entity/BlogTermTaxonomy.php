<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogTermTaxonomy
 *
 * @ORM\Table(name="blog_term_taxonomy")
 * @ORM\Entity
 */
class BlogTermTaxonomy
{
    /**
     * @var integer
     *
     * @ORM\Column(name="term_id", type="bigint", nullable=false)
     */
    private $termId;

    /**
     * @var string
     *
     * @ORM\Column(name="taxonomy", type="string", length=32, nullable=false)
     */
    private $taxonomy;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent", type="bigint", nullable=false)
     */
    private $parent;

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="bigint", nullable=false)
     */
    private $count;

    /**
     * @var integer
     *
     * @ORM\Column(name="term_taxonomy_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $termTaxonomyId;



    /**
     * Set termId
     *
     * @param integer $termId
     * @return BlogTermTaxonomy
     */
    public function setTermId($termId)
    {
        $this->termId = $termId;
    
        return $this;
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

    /**
     * Set taxonomy
     *
     * @param string $taxonomy
     * @return BlogTermTaxonomy
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;
    
        return $this;
    }

    /**
     * Get taxonomy
     *
     * @return string 
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return BlogTermTaxonomy
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
     * Set parent
     *
     * @param integer $parent
     * @return BlogTermTaxonomy
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return BlogTermTaxonomy
     */
    public function setCount($count)
    {
        $this->count = $count;
    
        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Get termTaxonomyId
     *
     * @return integer 
     */
    public function getTermTaxonomyId()
    {
        return $this->termTaxonomyId;
    }
}