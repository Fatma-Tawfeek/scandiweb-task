<?php

class Service
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    
    public function getProducts()
    {
        $this->db->query("SELECT * FROM products");
        $result = $this->db->resultSet();
        return $result;
    }

    
    public function deleteProducts($arr)
    {
        foreach ($arr as $id) {
            $this->db->query("DELETE FROM products WHERE id=" . $id);
            $this->db->execute();
        }
    }
}