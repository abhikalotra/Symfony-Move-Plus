<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogTermRelationships
 *
 * @ORM\Table(name="blog_term_relationships")
 * @ORM\Entity
 */
class BlogTermRelationships
{
    /**
     * @var integer
     *
     * @ORM\Column(name="term_order", type="integer", nullable=false)
     */
    private $termOrder;

    /**
     * @var integer
     *
     * @ORM\Column(name="object_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $objectId;

    /**
     * @var integer
     *
     * @ORM\Column(name="term_taxonomy_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $termTaxonomyId;



    /**
     * Set termOrder
     *
     * @param integer $termOrder
     * @return BlogTermRelationships
     */
    public function setTermOrder($termOrder)
    {
        $this->termOrder = $termOrder;
    
        return $this;
    }

    /**
     * Get termOrder
     *
     * @return integer 
     */
    public function getTermOrder()
    {
        return $this->termOrder;
    }

    /**
     * Set objectId
     *
     * @param integer $objectId
     * @return BlogTermRelationships
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    
        return $this;
    }

    /**
     * Get objectId
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set termTaxonomyId
     *
     * @param integer $termTaxonomyId
     * @return BlogTermRelationships
     */
    public function setTermTaxonomyId($termTaxonomyId)
    {
        $this->termTaxonomyId = $termTaxonomyId;
    
        return $this;
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