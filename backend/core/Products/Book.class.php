<?php

// book function
class Book extends Validator implements Product {
    
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

    // validates attributes from book input field
    public function validateAttributes()
    {
        if(is_numeric($this->inputs['weight']) && floatval($this->inputs['weight'] >= 0))
        {
            $this->attribute = $this->inputs['weight'].' KG';
            return true;
        }

        return false;
    }
}
    