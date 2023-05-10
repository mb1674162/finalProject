<?php

/**
 * Author: Maribel Bustamante
 * Final Assignment: protect.classes.php
 * Class to password protect admin page.
 */
  class Protect {

    private $usernameTest;

    private $passwordTest;

    /**
     * Contructs a Protect Class objects.
     *
     *
     */
    function __construct() {
      $this->usernameTest = 'admin';
      $this->passwordTest = 'password123';
    }

    /**
     * Authenticates username and password using database to verify against,
     * using hashed password and setting a session if credentials are valid.
     *
     * @param $username
     *
     * @param $password
     *
     * @return void
     *
     */
    public function protectedAuthenticate($username, $password) {
      if ($username == $this->usernameTest && $password == $this->passwordTest) {
        // Instantiate Dbh class using dbh.inc.php file.
        include ('dbh.classes.php');

        // Create an instance of a Dbh class.
        $startConnection = new Dbh();

        // Build SQL statement to query database.
        $sql = "SELECT * FROM users;";

        // Connect to database and send query statement to the database.
        $result = $startConnection->connect()->query($sql);

        // Check number of results from database when using SQL statement.
        $numRows = $result->num_rows; //  $numRows = mysqli_num_rows($result);

        // If $numRows is true, then get that data and print out onto table.
        if ($numRows > 0) {
          $row = $result->fetch_assoc();
          echo '</tr>';
          // Table Border
          echo '<table border="1"><tr>';
          // Table Headings
          foreach ($row as $key => $value) {
            echo '<th>' . $key . '</th>';
          }

          // Edit and delete buttons that display an "edit" form and update each
          // account by id.
          echo '<th>' . 'action' . '</th>';
          echo '<th>' . 'action' . '</th>';

          // Display row values.
          echo '</tr>';
          foreach ($result as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['id'] . '</td>';
            echo '<td>' . $value['firstName'] . '</td>';
            echo '<td>' . $value['lastName'] . '</td>';
            echo '<td>' . $value['userName'] . '</td>';
            echo '<td>' . $value['password'] . '</td>';
            echo '<td>' . $value['email'] . '</td>';
            echo '<td>' . $value['phone'] . '</td>';
            // Edit and submit buttons to update accounts.
            echo '<td>' . '<a href="edit.php?id=' . $value['id'] . '"
            class="pure-button">Edit</a>' . '</td>';
            echo '<td>' . '<a  href="delete.php?id=' . $value['id'] . '"
            class="pure-button">Delete</a>' . '</td>';

            echo '</tr>';
            //close SQL connection
            mysqli_close();

          }
        }
      }
    }

  }

