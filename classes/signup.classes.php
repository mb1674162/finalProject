?php
  /**
   * Author: Maribel Bustamante
   * Final Assignment: signup.classes.php
   * Methods and properties that allow changes to the database.
   */


  class Signup {
    /**
     * Displays signup form for user to create account.
     *
     * @return string $signupForm
     */
    public function getSignupForm(): string {
      $signupForm = '<form method="POST" class="pure-form pure-form-stacked" 
        action="../includes/signup.inc.php"><fieldset>';

      $signupForm .= '<label for="fullName">Full Name: </label>
            <input type="text" name="fullName" id="fullName">' . '<br />';

      $signupForm .= '<label for="username">Username: </label>
            <input type="text" name="username" id="username">' . '<br />';

      $signupForm .= '<label for="password">Password: </label>
            <input type="password" name="password" id="password">' . '<br />';

      $signupForm .= '<label for="email">Email: </label>
            <input type="email" name="email" id="email">' . '<br />';

      $signupForm .= '<label for="phone">Phone: </label>
            <input type="text" name="phone" id="phone">' . '<br />';
      //theme
      $signupForm .= '<label for="form-prompt">Choose Your Account Background 
        Theme:</label>';

      $signupForm .= '<label class="container" for="default.css">Default Theme
        <input type="radio" id="styles/default.css" name="radio" 
        value="styles/default.css"><span class="checkmark"></span></label>';

      $signupForm .= '<label class="container" for="spring.css">Spring Theme
        <input type="radio"  id="styles/spring.css" name="radio" 
        value="styles/spring.css"><span class="checkmark"></span></label>';

      $signupForm .= '<button class="pure-button" name="submit" type="submit"
            value="submit">Submit</button>' ;
      $signupForm .= '</fieldset></form>';

      return $signupForm;
    }

    /**
     * Checks if username from the signup form does not exists in the
     * database. If true, signup form is displayed, otherwise call to
     * insertValues method inserts.
     *
     */
    public function checkUser($fullName, $username, $password, $email,
                              $phone, $radio): void {
      // Create object of Dbh class.
      $startConnection = new Dbh();

      // Connect to database.
      $startConnection->connect();

      $sql = "SELECT username FROM users WHERE username = '$username'";
      $result = mysqli_query($startConnection->connect(), $sql);
      $count = mysqli_num_rows($result);

      // If username exists in database, output invalid message.
      if ($count > 0) {
        //echo $username . "already taken.<br />";
        //echo "Please enter another valid username.";
        header("location:../index.php?error=InvalidUsername");
      }
      else {
        // Call method to insert account.
        $this->insertValues($fullName, $username, $password, $email,$phone, $radio);
      }
    }

     /**
     *
     * Accepts the signup form's input data as single array, hashes password
     * with CRYPT_MD5 (12-character) salt,and inserts data as a new record into the users table.
     *
     * @return void
     *
     */
    public function insertValues($fullName, $username, $password, $email,$phone, $radio): void {
      // Create object of Dbh class.
      $startConnection = new Dbh();

      // Create hashed password.
      $hashPwd = crypt($password,CRYPT_MD5);

      // Build SQL statement to insert form values into database, including
      // hashed password.
      $sql = "INSERT INTO users (fullName, username, hashPwd, email, 
      phone,radio) VALUES ('" . $fullName . "', '" . $username .
        "', '" . $hashPwd . "', '" . $email . "', '" . $phone
        . "', '" . $radio . "')";

      if ($startConnection->connect()->query($sql) === TRUE) {
        echo "Record inserted successfully into database";
      }
      else {
        //echo "ERROR:" . $sql . "<br />" . $startConnection->connect()->error;
        header("location:../index.php?error=FailedInsertValues");
      }
      // Close connection
      $startConnection->connect()->close();
    }
  }
