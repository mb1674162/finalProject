<!DOCTYPE html>
<html lang="en">
<!-- Author: Maribel Bustamante Final Assignment: index.php-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup Form</title>
  <link  href="styles/default.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" />
  <link rel="stylesheet" href="/css/pure/pure-min.css">
  <link rel="stylesheet" href="/css/pure/grids-responsive-min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="/layouts/marketing/styles.css">
</head>
<body>
<?php
  //Header Section of Website Layout.
  // Include files.
  include ('classes/header.classes.php');
  include ('classes/menu.classes.php');
  include ('classes/signup.classes.php');
  include ('classes/footer.classes.php');

  // Create an instance of Header class.
  $object = new HeaderTemplate();

  // Print Header using Header class method.
  echo $object->displayHeader();

  //Navigation Menu of Website Layout.
  // Instantiate Menu class.
  // Create an instance of Menu class.
  $object = new Menu();

  // Print login/logout buttons and username using Menu class based on session.
  if (isset($_SESSION["validFullName"])) {
    echo $object->validSessButtons();
  }
  else {
    echo $object->displayNavMenu();
  }
?>
</div>
<div class="splash-container">
  <div class="splash">
    <h1 class="splash-head">Join Our Book Club</h1>
    <p class="splash-subhead">
        Join the fun! Become a member and write or search for a book review.
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

      <h2 class="content-head content-head-ribbon">Write a book review
        <textarea>
        </textarea>
    </div>
  </div>

  <!-- Main Content of Website Layout. Stays on template-->
  <div class="content">
    <h2 class="content-head is-center">Enter your information to become a
      member</h2>
    <div class="pure-g">
      <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
        <?php
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
    // Create an instance of footer class.
    $object = new Footer();

    // Print footer using Footer class method.
    echo $object->displayFooter();
  ?>
</div>
</body>
</html>
