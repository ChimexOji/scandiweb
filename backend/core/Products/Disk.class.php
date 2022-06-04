<?php

// Disk function
class Disk extends Validator implements Product {
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

    // validates attributes from Disk input field
    public function validateAttributes()
    {
        if(is_numeric($this->inputs['size']) && floatval($this->inputs['size'] >= 0))
        {
            $this->attribute = $this->inputs['size'].' MB';
            return true;
        }

        return false;
    }
}