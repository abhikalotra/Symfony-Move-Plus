<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogPostmeta
 *
 * @ORM\Table(name="blog_postmeta")
 * @ORM\Entity
 */
class BlogPostmeta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="post_id", type="bigint", nullable=false)
     */
    private $postId;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_key", type="string", length=255, nullable=true)
     */
    private $metaKey;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_value", type="text", nullable=true)
     */
    private $metaValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="meta_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $metaId;



    /**
     * Set postId
     *
     * @param integer $postId
     * @return BlogPostmeta
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    
        return $this;
    }

    /**
     * Get postId
     *
     * @return integer 
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set metaKey
     *
     * @param string $metaKey
     * @return BlogPostmeta
     */
    public function setMetaKey($metaKey)
    {
        $this->metaKey = $metaKey;
    
        return $this;
    }

    /**
     * Get metaKey
     *
     * @return string 
     */
    public function getMetaKey()
    {
        return $this->metaKey;
    }

    /**
     * Set metaValue
     *
     * @param string $metaValue
     * @return BlogPostmeta
     */
    public function setMetaValue($metaValue)
    {
        $this->metaValue = $metaValue;
    
        return $this;
    }

    /**
     * Get metaValue
     *
     * @return string 
     */
    public function getMetaValue()
    {
        return $this->metaValue;
    }

    /**
     * Get metaId
     *
     * @return integer 
     */
    public function getMetaId()
    {
        return $this->metaId;
    }
}