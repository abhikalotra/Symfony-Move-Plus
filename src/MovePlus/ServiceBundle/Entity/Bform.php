<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bform
 *
 * @ORM\Table(name="bform")
 * @ORM\Entity
 */
class Bform
{
    /**
     * @var integer
     *
     * @ORM\Column(name="form_id", type="integer", nullable=false)
     */
    public $formId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="email_subject", type="text", nullable=false)
     */
    public $emailSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="email_to", type="string", length=255, nullable=false)
     */
    public $emailTo;

    /**
     * @var string
     *
     * @ORM\Column(name="email_cc", type="text", nullable=false)
     */
    public $emailCc;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    public $content;

    /**
     * @var string
     *
     * @ORM\Column(name="sucess_message", type="text", nullable=false)
     */
    public $sucessMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="catagory", type="string", length=255, nullable=false)
     */
    public $catagory;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_steps", type="integer", nullable=false)
     */
    public $numberSteps;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;



    /**
     * Set formId
     *
     * @param integer $formId
     * @return Bform
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
    
        return $this;
    }

    /**
     * Get formId
     *
     * @return integer 
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Bform
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
     * Set emailSubject
     *
     * @param string $emailSubject
     * @return Bform
     */
    public function setEmailSubject($emailSubject)
    {
        $this->emailSubject = $emailSubject;
    
        return $this;
    }

    /**
     * Get emailSubject
     *
     * @return string 
     */
    public function getEmailSubject()
    {
        return $this->emailSubject;
    }

    /**
     * Set emailTo
     *
     * @param string $emailTo
     * @return Bform
     */
    public function setEmailTo($emailTo)
    {
        $this->emailTo = $emailTo;
    
        return $this;
    }

    /**
     * Get emailTo
     *
     * @return string 
     */
    public function getEmailTo()
    {
        return $this->emailTo;
    }

    /**
     * Set emailCc
     *
     * @param string $emailCc
     * @return Bform
     */
    public function setEmailCc($emailCc)
    {
        $this->emailCc = $emailCc;
    
        return $this;
    }

    /**
     * Get emailCc
     *
     * @return string 
     */
    public function getEmailCc()
    {
        return $this->emailCc;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Bform
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set sucessMessage
     *
     * @param string $sucessMessage
     * @return Bform
     */
    public function setSucessMessage($sucessMessage)
    {
        $this->sucessMessage = $sucessMessage;
    
        return $this;
    }

    /**
     * Get sucessMessage
     *
     * @return string 
     */
    public function getSucessMessage()
    {
        return $this->sucessMessage;
    }

    /**
     * Set catagory
     *
     * @param string $catagory
     * @return Bform
     */
    public function setCatagory($catagory)
    {
        $this->catagory = $catagory;
    
        return $this;
    }

    /**
     * Get catagory
     *
     * @return string 
     */
    public function getCatagory()
    {
        return $this->catagory;
    }

    /**
     * Set numberSteps
     *
     * @param integer $numberSteps
     * @return Bform
     */
    public function setNumberSteps($numberSteps)
    {
        $this->numberSteps = $numberSteps;
    
        return $this;
    }

    /**
     * Get numberSteps
     *
     * @return integer 
     */
    public function getNumberSteps()
    {
        return $this->numberSteps;
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