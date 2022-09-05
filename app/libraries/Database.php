<?php
/*
* PDO Database Class
* Create prepared statements
* Bind values
* Return rows and results
*/

class Database {
    private $host = 'ec2-54-82-205-3.compute-1.amazonaws.com';
    private $user = 'lnntrdlnkdoqmn';
    private $pass = '7d4e691001361618733d4563ba753296b7abe500d1e92f067b8b9d6c8e3054f2';
    private $dbname = 'dcadncedpg33r3';

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
        // Set DNS
        $dns = 'pgsql:host=' . $this->host .'port=5432;' . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try{
            $this->dbh = new PDO($dns, $this->user, $this->pass, $options);

        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
       }

       // Prepare statement with query
       public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
       }

       // Bind Values
       public function bind($param, $value, $type = null) {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
       }

       // Execute the prepared statement
       public function execute() {
        return $this->stmt->execute();
       }

       // Get result set as array of objects 
       public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
       }

       // Get single record as object
       public function single() {
        $this->stmt->fetch(PDO::FETCH_OBJ);
       }

       // Get row count
       public function rowCount() {
        return $this->stmt->rowCount();
       }
}