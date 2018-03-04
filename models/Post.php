<?php

class Post {

    public $title;

    public $content;

    public function __construct($properties) {

        // Iterate Properties Provided & Set
        
        foreach($properties as $key => $value) {

            $this->$key = $value;

        }

    }
    
}

?>