<?php

include_once APPROOT . '/helpers/Service.php';
include_once APPROOT . '/models/Dvd.php';
include_once APPROOT . '/models/Book.php';
include_once APPROOT . '/models/Furniture.php';

class Product 
{

    public $name;
    public $sku;
    public $price;
    public $productType;
    public $attribute;
    public $db;


    public function __construct($data)
    {
        $this->db = new Database;
        $this->name = $data['name'];
        $this->sku = $data['sku'];
        $this->price = $data['price'];
        $this->productType = $data['producttype']; 
        
        $request = $data['producttype'];
        $attr = $this->setAttribute(new $request, $data);
        $this->attribute = $attr; 
                  
        
    }

    function addProduct() {
        $this->db->query("INSERT INTO products (sku, name, price, producttype, attribute) 
        VALUES ('" . $this->sku . "',
             '" . $this->name . "',
             '" . $this->price . "',
             '" . $this->productType . "',
             '" . $this->attribute . "')");   
                         

         if ($this->db->execute()) {
             return true;
         } else {
             return false;
         }
     }

         
    public function setAttribute(Type $type, $data)
        {   
            return $type->setAttribute($data);
        }
};

