<?php

include_once APPROOT . '/helpers/Type.php';


class Furniture extends Type
    {   
        public function setAttribute($data)
        {
            return "Deminsions: {$data['height']}x{$data['width']}x{$data['length']} CM\n " ;
        }
    }