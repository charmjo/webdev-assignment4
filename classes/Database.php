<?php

class Database {
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;
    public $dbConn;

    public function __construct()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'Assignment3';
        
    }

    public function connectDb () {
        $this->dbConn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if($this->dbConn->connect_error) {
            die('Something went wrong... please try again later...');
        }
    }

    public function retrieveDataList ($queryString) {
        $this->connectDb();

        $sqlResult = $this->dbConn->query($queryString);
        if(!$sqlResult->num_rows > 0) {
            return false;
        } 

        $list = [];
        while ($row = $sqlResult->fetch_assoc()) {
            array_push($list,$row);
        }
        
        $this->closeConnection();
        return $list;
    }

    public function closeConnection () {
        $this->dbConn->close();
    }
}