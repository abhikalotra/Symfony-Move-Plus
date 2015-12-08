<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MailOption
 *
 * @ORM\Table(name="mail_option")
 * @ORM\Entity
 */
class MailOption
{
    /**
     * @var string
     *
     * @ORM\Column(name="option_type", type="string", length=255, nullable=false)
     */
    private $optionType;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set optionType
     *
     * @param string $optionType
     * @return MailOption
     */
    public function setOptionType($optionType)
    {
        $this->optionType = $optionType;
    
        return $this;
    }

    /**
     * Get optionType
     *
     * @return string 
     */
    public function getOptionType()
    {
        return $this->optionType;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return MailOption
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}