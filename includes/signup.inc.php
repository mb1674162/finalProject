<!DOCTYPE html>
<html lang="en">

<!--* Author: Maribel Bustamante-->
<!--* Final Assignment : signup.inc.php-->
<!--* File where user data is sent to once the signup button/ link is clicked-->
<!--* inside the signup form, and validated inside database.-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MaribelBook Layout</title>
  <link  href="../styles/default.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" />
  <link rel="stylesheet" href="/css/pure/pure-min.css">
  <link rel="stylesheet" href="/css/pure/grids-responsive-min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="/layouts/marketing/styles.css">
</head>
<body>
<?php
//Header Section of Website Layout.
  // Instantiate Header class.
  include('../classes/header.classes.php');

  // Create an instance of Header class.
  $object = new HeaderTemplate();

  // Print Header using Header class method.
  echo $object->displayHeader();

//Navigation Menu of Website Layout.
  // Instantiate Menu class.
  include('../classes/menu.classes.php');

  // Create an instance of Menu class.
  $object = new Menu();

  // Print login/logout buttons and username using Menu class based on session.
  if (isset($_SESSION["validFullName"])) {
    echo $object->validSessButtons();
  }
  else {
    echo $object->displayNavMenu();
  }

  // Instantiate Signup classes.
  include("../classes/dbh.classes.php");
  include ("../classes/signup.classes.php");

  // Create an instance of Signup class.
  $signup = new Signup();

  //check if accessed this page via submit or signup button inside the
  // form vs. typing the url path.
  if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $radio = $_POST['radio'];

    // Run user signup methods
    $signup->checkUser($fullName, $username, $password, $email, $phone,
      $radio);
    echo $signup->checkUser();

  }
  else{
   $signup->getSignupForm();
  }

  ?>

<div class="splash-container">
  <div class="splash">
    <h1 class="splash-head">Join Our Book Club</h1>
    <p class="splash-subhead">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    </p>

    <p>
      <a href="http://purecss.io"
         class="pure-button pure-button-primary">Get Started</a>
    </p>
  </div>
</div>
<!-- Main Content of Website Layout. Stays on template-->
<!-- White wrapper of Website Layout-->
<div class="content-wrapper">
  <div class="content">
    <h2 class="content-head is-center">Excepteur sint occaecat cupidatat.</h2>

    <div class="pure-g">
      <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

        <h3 class="content-subhead">
          <i class="fa fa-rocket"></i>
          Get Started Quickly
        </h3>
        <p>
          Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
        </p>
      </div>
      <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
        <h3 class="content-subhead">
          <i class="fa fa-mobile"></i>
          Responsive Layouts
        </h3>
        <p>
          Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
        </p>
      </div>
      <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
        <h3 class="content-subhead">
          <i class="fa fa-th-large"></i>
          Modular
        </h3>
        <p>
          Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
        </p>
      </div>
      <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
        <h3 class="content-subhead">
          <i class="fa fa-check-square-o"></i>
          Plays Nice
        </h3>
        <p>
          Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
        </p>
      </div>
    </div>
  </div>
  <!-- Large Navy Blue box 3/4 of page down-->

  <div class="ribbon l-box-lrg pure-g">
    <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
      <img width="300" alt="File Icons" class="pure-img-responsive" src="/img/common/file-icons.png">
    </div>
    <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">

      <h2 class="content-head content-head-ribbon">Laboris nisi ut aliquip.</h2>

      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor.
      </p>
    </div>
  </div>


  <!-- Main Content of Website Layout. Stays on template-->
  <div class="content">
    <h2 class="content-head is-center">Dolore magna aliqua. Uis aute irure.</h2>

    <div class="pure-g">
      <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
        <?php
          include('classes/signup.classes.php');
          $signup = new Signup();
          print $signup->getSignupForm();
        ?>
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
  <?php
    // Footer Section of Website Layout.
    // Instantiate footer class.
    include('classes/footer.classes.php');

    // Create an instance of footer class.
    $object = new Footer();

    // Print footer using Footer class method.
    echo $object->displayFooter();
  ?>
</div>
</body>
</html>

