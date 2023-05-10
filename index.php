<!DOCTYPE html>
<html lang="en">
<!-- Author: Maribel Bustamante 
  Final Assignment: index.php-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Maribel's BookClub Site</title>
  <link  href="styles/default.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" />
  <link rel="stylesheet" href="/css/pure/pure-min.css">
  <link rel="stylesheet" href="/css/pure/grids-responsive-min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="/layouts/marketing/styles.css">
</head>
<body>
<div>
<?php
   //Header Section of Website Layout.
  // Include files.
  include ('classes/header.classes.php');
  include ('classes/menu.classes.php');
  include ('classes/login.classes.php');
  include ('classes/signup.classes.php');
  include ('classes/footer.classes.php');
  // Create an instance of Header class.
  $object = new HeaderTemplate();

  // Print Header using Header class method.
  echo $object->displayHeader();

//Navigation Menu of Website Layout.
  // Instantiate Menu class.
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
      <h2 class="content-head is-center">Read Our Member Reviews</h2>

      <div class="pure-g">
          <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

              <h3 class="content-subhead">
    <?php
          include ('classes/dbh.classes.php');
          $dbConnection = new Dbh();

          // Build SQL statement to query all columns from header_menu
          $sql = "SELECT * FROM reviews";

          // Connect to database, send query statement and set results to variable
          $results = $dbConnection->connect()->query($sql);

          // Check number of records returned.
          if ($results->num_rows !== 0) {
            echo '<li class="pure-menu-item"><img style=width="200" height="200" 
                class="post-avatar" src="' . $results[0]["link"] . '" alt="book picture" ></li>
                <li class="pure-menu-item">' . $results[0]['title'] . '</h3>';
            echo '<p>Review by member :"' . $results[0][""] . '"';
            echo $results[0]["bookReview"] . '"</p>"';
          }
        ?>
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
        }
    ?>
  </div>
    </div>
  </div>
  <!-- Large Navy Blue box 3/4 of page down-->
    <div class="ribbon l-box-lrg pure-g">
    <!--book of the month image-->
          <?php
            include ('classes/content.php');
            $featured = new Content();
            echo $featured->wrapperBook();
          ?>
    </div>

  <!-- Main Content of Website Layout. Stays on template-->
  <div class="content">
    <h2 class="content-head is-center">Dolore magna aliqua. Uis aute irure.</h2>

    <div class="pure-g">
        <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
        <?php
          $review = new Content();
          print $review->wrapperBook();
        ?>
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
