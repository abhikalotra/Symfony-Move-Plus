<?php

namespace MovePlus\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CleaningMailform
 *
 * @ORM\Table(name="cleaning_mailform")
 * @ORM\Entity
 */
class CleaningMailform
{
    /**
     * @var integer
     *
     * @ORM\Column(name="form_id", type="integer", nullable=true)
     */
    private $formId;

    /**
     * @var string
     *
     * @ORM\Column(name="attr_name", type="string", length=255, nullable=true)
     */
    private $attrName;

    /**
     * @var string
     *
     * @ORM\Column(name="attr_type", type="string", length=255, nullable=true)
     */
    private $attrType;

    /**
     * @var string
     *
     * @ORM\Column(name="attr_option", type="text", nullable=true)
     */
    private $attrOption;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="field_name", type="string", length=22255, nullable=true)
     */
    private $fieldName;

    /**
     * @var string
     *
     * @ORM\Column(name="field_name_id", type="string", length=255, nullable=true)
     */
    private $fieldNameId;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set formId
     *
     * @param integer $formId
     * @return CleaningMailform
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
     * Set attrName
     *
     * @param string $attrName
     * @return CleaningMailform
     */
    public function setAttrName($attrName)
    {
        $this->attrName = $attrName;
    
        return $this;
    }

    /**
     * Get attrName
     *
     * @return string 
     */
    public function getAttrName()
    {
        return $this->attrName;
    }

    /**
     * Set attrType
     *
     * @param string $attrType
     * @return CleaningMailform
     */
    public function setAttrType($attrType)
    {
        $this->attrType = $attrType;
    
        return $this;
    }

    /**
     * Get attrType
     *
     * @return string 
     */
    public function getAttrType()
    {
        return $this->attrType;
    }

    /**
     * Set attrOption
     *
     * @param string $attrOption
     * @return CleaningMailform
     */
    public function setAttrOption($attrOption)
    {
        $this->attrOption = $attrOption;
    
        return $this;
    }

    /**
     * Get attrOption
     *
     * @return string 
     */
    public function getAttrOption()
    {
        return $this->attrOption;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return CleaningMailform
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
     * Set fieldName
     *
     * @param string $fieldName
     * @return CleaningMailform
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
    
        return $this;
    }

    /**
     * Get fieldName
     *
     * @return string 
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * Set fieldNameId
     *
     * @param string $fieldNameId
     * @return CleaningMailform
     */
    public function setFieldNameId($fieldNameId)
    {
        $this->fieldNameId = $fieldNameId;
    
        return $this;
    }

    /**
     * Get fieldNameId
     *
     * @return string 
     */
    public function getFieldNameId()
    {
        return $this->fieldNameId;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return CleaningMailform
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
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