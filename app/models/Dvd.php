<?php

include_once APPROOT . '/helpers/Type.php';


class Dvd extends Type
    {   
        public function setAttribute($data)
        {
            return "Size: {$data['size']} MB\n";
        }
    }