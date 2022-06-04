// this function validates the user form input
<?php

class Validator {
    private $inputs;
    private $errors = [];
    private static $fields = ['sku', 'name', 'price', 'type', 'attributes'];

    public function __construct($post_input){
        $this->inputs = $post_input;

        // loops through product type
        switch ($this->inputs['type']) {
            case "dvd":
                $this->validateType(new  Disk($this->inputs));
                break;
            case "book":
                $this->validateType(new  Book($this->inputs));
                break;
            case "furniture":
                $this->validateType(new  Furniture($this->inputs));
                break;
        }

    }

    // this function validates user input through forms
    public function validateForm(){
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->inputs)){
              trigger_error("'$field' is not present in the data");
              return;
            }
        }

        $this->validateSku;
        $this->validateName;
        $this->validatePrice;
        $this->validateType;
        $this->validateAttributes;
        return $this->errors;
    }

    // validates Sku input field
    public function validateSku(){
        $value = trim($this->inputs['sku']);

        if(empty($value)){
            $this->addError('sku', 'please provide sku');
        } else {
            return (!preg_match('/\s/', $this->inputs['sku']) && (strlen($this->inputs['sku']) > 0));
        }
    }

    // validates Name input field
    public function validateName(){
        $value = trim($this->inputs['name']);

        if(empty($value)){
            $this->addError('name', 'please provide name');
        } else {
            return (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $this->inputs['name']) && (strlen($this->inputs['name']) > 0)); 
        }
    }

    // validates Price input field
    public function validatePrice(){
        $value = trim($this->inputs['price']);

        if(empty($value)){
            $this->addError('price', 'please provide price');
        } else {
            return !(filter_var($this->inputs['price'], FILTER_VALIDATE_FLOAT) && (strlen($this->inputs['price']) > 0) && floatval($this->inputs['price'] >= 0));
        }
    }

    // validates Type
    public function validateType(){
        if(empty($this->inputs['type'])){
            $this->addError('type', 'please select type');
        }
        return ((strlen($this->inputs['type']) > 0));
    }

    // adds error messages 
    private function addError($key, $val){
        $this->errors[$key] = $val;
      }
}



