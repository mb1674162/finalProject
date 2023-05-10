<?php

  /**
   * Author: Maribel Bustamante
   *
   * Final Assignment dbh.classes.php
   * Database handler file with all the settings to connect to final
   * database, and access tables.
   *
   */
  class Dbh {

    private $dbServername;

    private $dbUsername;

    private $dbPassword;

    private $dbName;

    public $conn;


    /** Handles connection to database.
     *
     *
     */
    public function __construct() {
      $this->dbServername = "localhost";
      $this->dbUsername = "root";
      $this->dbPassword = "";
      $this->dbName = "final";
    }

    /**
     *  Starts database connection using mysqli for OOP.
     *
     * @return \mysqli
     */
    public function connect(): mysqli {
      $conn = new mysqli($this->dbServername, $this->dbUsername,
        $this->dbPassword, $this->dbName);

      // Check connection, and output message if error connecting.
      if ($conn->connect_error) {
        die("Error: Database connection failed: " . $conn->connect_error);
      }
      else {
        return $conn;
      }
      return $conn;
    }

  }
