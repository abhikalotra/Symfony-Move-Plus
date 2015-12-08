<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogOptions
 *
 * @ORM\Table(name="blog_options")
 * @ORM\Entity
 */
class BlogOptions
{
    /**
     * @var string
     *
     * @ORM\Column(name="option_name", type="string", length=64, nullable=false)
     */
    private $optionName;

    /**
     * @var string
     *
     * @ORM\Column(name="option_value", type="text", nullable=false)
     */
    private $optionValue;

    /**
     * @var string
     *
     * @ORM\Column(name="autoload", type="string", length=20, nullable=false)
     */
    private $autoload;

    /**
     * @var integer
     *
     * @ORM\Column(name="option_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionId;



    /**
     * Set optionName
     *
     * @param string $optionName
     * @return BlogOptions
     */
    public function setOptionName($optionName)
    {
        $this->optionName = $optionName;
    
        return $this;
    }

    /**
     * Get optionName
     *
     * @return string 
     */
    public function getOptionName()
    {
        return $this->optionName;
    }

    /**
     * Set optionValue
     *
     * @param string $optionValue
     * @return BlogOptions
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;
    
        return $this;
    }

    /**
     * Get optionValue
     *
     * @return string 
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * Set autoload
     *
     * @param string $autoload
     * @return BlogOptions
     */
    public function setAutoload($autoload)
    {
        $this->autoload = $autoload;
    
        return $this;
    }

    /**
     * Get autoload
     *
     * @return string 
     */
    public function getAutoload()
    {
        return $this->autoload;
    }

    /**
     * Get optionId
     *
     * @return integer 
     */
    public function getOptionId()
    {
        return $this->optionId;
    }
}