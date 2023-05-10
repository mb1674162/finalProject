<?php
  /**
   * Author: Maribel Bustamante
   * Final Assignment: login.classes.php
   * Methods and properties that allow users to validate username and password
   * against the database.
   *
   */

  class Login {

    /**
     * Generates a form with username, password and submit
     * button. With the 'for' property to form elements and
     * submit value equal to submit property.
     *
     * @return string
     */
    public function userLoginBox(): string {
      $loginForm = '<label class="center" for="username">Username:</label>
        <input id="username" type="text" name="username">' . '<br />';

      $loginForm .= '<label class="center" for="password">Password:</label>
        <input id="password" type="password" name="password">' . '<br /><br />';

      $loginForm .= '<button type="submit" class="pure-button is-center" name="login" 
        value="login">Login</button>';

      return $loginForm;
    }

    /**
     * Upon successful login authentication session, passes SESSION
     * variables and methods stores the user's query results to display
     * logged-in session.
     *
     */
    public function displayValidContent(): string {
      $object = new Menu();
      $object->validMenu();
      $myHomeForm = '<link href="' . $_SESSION['theme'] . '" rel="stylesheet" 
        type="text/css" />';
      $myHomeForm .= '<h1 class="splash-head">Successful Login</h1>';

      $myHomeForm .= '<p class="splash-subhead">Welcome, ' .
        $_SESSION['validFullName'] . ', you are logged into your account 
        homepage.</p>';
      return $myHomeForm;
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
    public function authenticate($username, $password): array {
      if (!empty($username) && !empty($password)) {
        $username = addslashes($username);
        $password = addslashes($password);

        // Hash password using crypt().
        $hashPwd = crypt($password, CRYPT_MD5);

        // Create object of Dbh class.
        $dbConnection = new Dbh();

        // Build SQL statement to query all columns database for username and
        // password.
        $sql = "SELECT * FROM users WHERE username = '$username' and 
          hashPwd = '$hashPwd'";
        //$dbConnection->connect;
        // Connect to database, send query statement and set results to variable
        $results = $dbConnection->connect()->query($sql);

        // Check number of records returned. If user/hashed password exists
        // in database, then login is successful, and assign it as SESSION
        // super global to store query results.
        if ($results->num_rows == 1) { //!== 0
          // Get all results from that row and set it to array $data to pass
          // and display content from array desired.
          $data = $results->fetch_all(MYSQLI_ASSOC);
          session_start();
          $_SESSION['validFullName'] = $data[0]['fullName'];
          $_SESSION['theme'] = $data[0]['radio'];

          return $data;
        }
        else {
          echo "<h4>Attempt to log in with username: " . $username . ", and 
            password failed.</h4>" . '<br />';
          echo "Please reenter valid credentials. '<br />'";
        }
      }
    }

  }