<?php

  /**
   * Author: Maribel Bustamante
   *
   * Final Assignment: edit.php
   * Processes information after an "edit" form is submitted in order to
   * update a record in the users table.
   *
   */

  // Instantiate Dbh class.
  include('includes/dbh.inc.php');

  // Create an object of Dbh class.
  $startConnection = new Dbh();

  // Create connection to database, outputting connection status.
  $startConnection->connect();

  ////  Logic to update record, using the id passed in a query string.
  if (isset($_POST['firstName'])) {
    $id = $_POST['id'];
    // Sanitize values
    $firstName = mysqli_real_escape_string($startConnection->connect(),
      $_POST['firstName'] ?? '');
    $lastName = mysqli_real_escape_string($startConnection->connect(),
      $_POST['lastName']) ?? '';
    $username = mysqli_real_escape_string($startConnection->connect(),
      $_POST['username']) ?? '';
    $password = mysqli_real_escape_string($startConnection->connect(),
      $_POST['password']) ?? '';
    $email = mysqli_real_escape_string($startConnection->connect(),
      $_POST['email']) ?? '';
    $phone = mysqli_real_escape_string($startConnection->connect(),
      $_POST['phone']) ?? '';

    // Hash password using crypt()
    $hashPwd = crypt($password, CRYPT_MD5);

    $updateQuery = "UPDATE users SET
                  firstName= '$firstName',
                  lastName= '$lastName',
                  username= '$username',
                  password= '$hashPwd', 
                  email= '$email',
                  phone= '$phone'
                  WHERE id= '$id'";
    $execute = $startConnection->connect()->query($updateQuery);

    if ($execute) {
      header("location:admin.php?RecordUpdatedSuccessfully");
      $msg = "Record updated successfully.";
    }
    else {
      $msg = "ERROR: Not able to update record.";
      echo $startConnection->conn->error;
    }
    return $msg;
  }


