<?php
/**
<?php
/**
 * @package ImpressPages
 * @copyright   Copyright (C) 2012 ImpressPages LTD.
 * @license see ip_license.html
 */

namespace Modules\developer\form\Field;


class Confirm extends Field{

    protected $checked;
    protected $text;
    
    public function __construct($options = array()) {
        if (isset($options['checked'])) {
            $this->checked = $options['checked'];
        } else {
            if(isset($options['defaultValue']) && $options['defaultValue'] === TRUE) {
                $this->checked = TRUE;
            } else {
                $this->checked = FALSE;
            }
        }       
        if (isset($options['text'])) {
            $this->setText($options['text']);
        }
        if (!isset($options['defaultValue'])) {
            $this->setDefaultValue(1);
        }
        parent::__construct($options);
    }
    
    public function render($doctype) {
        $attributesStr = '';
        $answer = '';
        if ($this->getChecked()) {
            $attributes = 'checked="checked"';
        } else {
            $attributes = '';
        }
        $answer .= '<input class="ipmControlCheckbox" name="'.htmlspecialchars($this->getName()).'" type="checkbox" '.$attributes.' '.$this->getAttributesStr($doctype).' '.$this->getValidationAttributesStr($doctype).' value="'.htmlspecialchars($this->getDefaultValue()).'" />'."\n";
        if ($this->getText()) {
            $answer .= '<div class="ipmControlConfirmOptions">'.$this->getText().'</div>';
        }
    
        return $answer; 
    }
    
    public function setChecked($checked) {
        $this->checked = $checked;
    }
    
    public function getChecked() {
        return $this->checked;
    }
    
    public function setText($text) {
        $this->text = $text;
    }
    
    public function getText() {
        return $this->text;
    }
    
    public function getValueAsString($postedValue) {
        if ($postedValue) {
            return 'Yes';
        } else {
            return 'No';
        }
    }    
    
    /**
    * CSS class that should be applied to surrounding element of this field. By default empty. Extending classes should specify their value.
    */
    public function getCssClass() {
        return 'confirm';
    }    
    
}