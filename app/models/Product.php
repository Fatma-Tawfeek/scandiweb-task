<?php

class Product 
{

    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }


    public function getProducts()
    {
        $this->db->query("SELECT * FROM products");
        $results = $this->db->resultset();
        return $results;
    }

    function addProduct($data) {
        $this->db->query("INSERT INTO products (sku, name, price, productType, size, weight, height, width, length) 
        VALUES (:sku, :name, :price, :productType, :size, :weight, :height, :width, :length)");
                         
        // Bind Values
        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':productType', $data['productType']);
        $this->db->bind(':size', $data['size']);
        $this->db->bind(':weight', $data['weight']);
        $this->db->bind(':height', $data['height']);
        $this->db->bind(':width', $data['width']);
        $this->db->bind(':length', $data['length']);        

        //Execute
        if($this->db->execute()){
        return true;
        } else {
        return false;
        }
     }

     // Find Product BY SKU
    public function findProductBySku($sku){
        $this->db->query("SELECT * FROM products WHERE sku = :sku ");
        $this->db->bind(':sku', $sku);

        $row = $this->db->single();

        //Check Row
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }    
   
   public function deleteProducts($arr)
    {       
        $this->db->query("DELETE FROM products WHERE id in ($arr)");
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
   

};

