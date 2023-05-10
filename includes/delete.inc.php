<?php

  /**
   * Author: Maribel Bustamante
   *
   * Final Assignment: delete.php
   * Logic to handle record deletion from users
   * table after delete button is clicked on admin.php using the id passed in
   * a query string.
   *
   */

  // Instantiate Dbh class.
  include('includes/dbh.inc.php');

  // Create an object of Dbh class.
  $startConnection = new Dbh();

  // Create connection to database, outputting connection status.
  $startConnection->connect();

  $db = $startConnection->conn;

  //  Logic to delete a record, using the id passed in a query string.
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM users WHERE id= " . $_GET['id'] . ";";

    $result = $startConnection->connect()->query($deleteQuery);
    //$editData = $result->fetch_assoc();

    if ($result) {
      $msg = "Record deleted successfully.";
      echo $msg;
      header("location:admin.php?RecordDeletedSuccessfully");
    }
    else {
      $msg = "ERROR: Not able to delete record.";
      header("location:admin.php?error=deleteQueryFailed");
      exit();

    }
    return $msg;
  }
