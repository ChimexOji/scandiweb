<?php

class Database {

    private $dbHost;
    private $dbUser;
    private $dbPassword;
    private $dbName;

    // connect to database using mysqli
    public function connect() {
        $this->dbHost = "localhost";
        $this->dbUser = "root1";
        $this->dbPassword = "scandiweb1";
        $this->dbName = "scandiweb";

        $conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        return $conn;
    }
}