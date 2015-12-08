<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Settings
 *
 * @ORM\Table(name="settings")
 * @ORM\Entity
 */
class Settings
{
    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="text", nullable=false)
     */
    public $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_number", type="text", nullable=false)
     */
    public $contactNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="text", nullable=false)
     */
    public $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="copywrite", type="text", nullable=false)
     */
    public $copywrite;

    /**
     * @var string
     *
     * @ORM\Column(name="socialicon", type="text", nullable=false)
     */
    public $socialicon;

    /**
     * @var string
     *
     * @ORM\Column(name="analytic_code", type="text", nullable=false)
     */
    public $analyticCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;



    /**
     * Set logo
     *
     * @param string $logo
     * @return Settings
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set contactNumber
     *
     * @param string $contactNumber
     * @return Settings
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;
    
        return $this;
    }

    /**
     * Get contactNumber
     *
     * @return string 
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     * @return Settings
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    
        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string 
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set copywrite
     *
     * @param string $copywrite
     * @return Settings
     */
    public function setCopywrite($copywrite)
    {
        $this->copywrite = $copywrite;
    
        return $this;
    }

    /**
     * Get copywrite
     *
     * @return string 
     */
    public function getCopywrite()
    {
        return $this->copywrite;
    }

    /**
     * Set socialicon
     *
     * @param string $socialicon
     * @return Settings
     */
    public function setSocialicon($socialicon)
    {
        $this->socialicon = $socialicon;
    
        return $this;
    }

    /**
     * Get socialicon
     *
     * @return string 
     */
    public function getSocialicon()
    {
        return $this->socialicon;
    }

    /**
     * Set analyticCode
     *
     * @param string $analyticCode
     * @return Settings
     */
    public function setAnalyticCode($analyticCode)
    {
        $this->analyticCode = $analyticCode;
    
        return $this;
    }

    /**
     * Get analyticCode
     *
     * @return string 
     */
    public function getAnalyticCode()
    {
        return $this->analyticCode;
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