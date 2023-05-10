<!DOCTYPE html>
<html lang="en">
<!-- Author: Maribel Bustamante-->
<!-- Final Assignment:  admin.php-->
<!-- Password-protected page that verifies if user's session is active using-->
<!-- SESSION variable. If logged in, starts session and displays welcome message-->
<!-- with grey background color. Otherwise, redirects user to error page.This page displays all the data in the users table -->
<!-- with edit and delete buttons to update data.-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Page</title>
  <link  href="styles/spring.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" />
</head>
<body>
<div>
<?php
   //Header Section of Website Layout.
//  // Include files.
//  include ('classes/header.classes.php');
//  include('classes/menu.classes.php');
//  include ('classes/signup.classes.php');
//  include('classes/login.classes.php');
//  include ('classes/footer.classes.php');

  // Create an instance of Header class.
  $object = new HeaderTemplate();

  // Print Header using Header class method.
  echo $object->displayHeader();

//Navigation Menu of Website Layout.
   // Create an instance of Menu class.
  $object = new Menu();

  // Print login/logout buttons and username using Menu class based on session.
  if (isset($_POST['login'])) {
    echo $object->validSessButtons();
  }
  else {
    echo $object->displayNavMenu();
  }
?>
</div>


//brown box as header.
<div class="text-box">
<!--  <div class="l-box">-->
    <h1 class="text-box-head">Administration Page</h1>
    <h2 class="text-box-subhead"></h2>
  </div>
</div>


<div class="pure-u-1 form-box">
<div class="l-box">
    <h1>Data in Users Table</h1>
    <form action="includes/edit.inc.php" method="POST">
      <fieldset  class="is-center">
      <?php
        //check if form was submitted, then pass fields to authenticate.
        if (isset($_POST['login'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];

          // Create an instance of Login class.
          $protectedLogin = new Protect();

          // Run Login class methods.
          $protectedLogin->protectedAuthenticate($username, $password);
        }
        else {
          $login = new Login();
          $login->userLoginBox();
        }
      ?>
      </fieldset>
    </form>
  </div>
</div>
<!-- Main Content of Website Layout. Stays on template-->
<div class="content">
    <h2 class="content-head is-center">Dolore magna aliqua. Uis aute irure.</h2>

    <div class="pure-g">
        <div class="l-box-lrg pure-u-1 pure-u-md-2-5">

        </div>
        <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
            <h4>Contact Us</h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.
            </p>

            <h4>More Information</h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
            </p>
        </div>
    </div>

</div>

</div>
<?php
  // Footer Section of Website Layout.
  // Instantiate footer class.


  // Create an instance of footer class.
  $object = new Footer();

  // Print footer using Footer class method.
  echo $object->displayFooter();
?>
</div>
</body>
</html>
