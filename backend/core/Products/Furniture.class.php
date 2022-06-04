<?php

// furniture function
class Furniture extends Validator implements Product {
    protected $inputs;

    function __construct(array $post_inputs)
    {
        parent::__construct($post_inputs);
        $this->inputs = $post_inputs;

        $this->sku = $post_inputs['sku'];
        $this->name = $post_inputs['name'];
        $this->price = $post_inputs['price'];
        $this->type = $post_inputs['type'];
    }

    // validates attributes from furniture input field
    public function validateAttributes()
    {
        if(is_numeric($this->inputs['height']) && is_numeric($this->inputs['width']) && is_numeric($this->inputs['length']) && floatval($this->inputs['height'] >= 0) && floatval($this->inputs['width'] >= 0) && floatval($this->inputs['length'] >= 0))
        {
            $this->attribute = $this->inputs['height'].'x'.$this->inputs['width'].'x'.$this->inputs['length'];
            return true;
        }

        return false;
    }

}