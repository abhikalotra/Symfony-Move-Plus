<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogUsermeta
 *
 * @ORM\Table(name="blog_usermeta")
 * @ORM\Entity
 */
class BlogUsermeta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="bigint", nullable=false)
     */
    private $userId;

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
     * @ORM\Column(name="umeta_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $umetaId;



    /**
     * Set userId
     *
     * @param integer $userId
     * @return BlogUsermeta
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set metaKey
     *
     * @param string $metaKey
     * @return BlogUsermeta
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
     * @return BlogUsermeta
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
     * Get umetaId
     *
     * @return integer 
     */
    public function getUmetaId()
    {
        return $this->umetaId;
    }
}