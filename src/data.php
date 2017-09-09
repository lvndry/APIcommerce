<?php

  class db
  {
    private $host="localhost";
    private $dbuser="root";
    private $dbpass="root";
    private $dbname="api";

    public function connect() {
      $mysql_connect = "mysql:host=$this->host;dbname=$this->dbname";
      $dbConnection = new PDO($mysql_connect, $this->dbuser, $this->dbpass);
      $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dbConnection;
    }
  }

 ?>
