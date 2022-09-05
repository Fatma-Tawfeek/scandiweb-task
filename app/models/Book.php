<?php

include_once APPROOT . '/helpers/Type.php';

    class Book extends Type
    {   
        public function setAttribute($data)
        {
            return "Wieght: {$data['weight']} KG\n";
        }
    }