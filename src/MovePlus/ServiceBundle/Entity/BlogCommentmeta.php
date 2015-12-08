<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogCommentmeta
 *
 * @ORM\Table(name="blog_commentmeta")
 * @ORM\Entity
 */
class BlogCommentmeta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="comment_id", type="bigint", nullable=false)
     */
    private $commentId;

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
     * Set commentId
     *
     * @param integer $commentId
     * @return BlogCommentmeta
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    
        return $this;
    }

    /**
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set metaKey
     *
     * @param string $metaKey
     * @return BlogCommentmeta
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
     * @return BlogCommentmeta
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