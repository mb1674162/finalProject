<?php
/**
 * Author: Maribel Bustamante
 * Final Assignment: menu.classes.php
 * Navigation Menu class to dynamically insert html navigation menu element
 * inside header to project pages.
 */
  class Menu {

    /**
     *  Prints login/logout buttons and username using Menu class based on
     *  session.
     */
    public function validMenu(): string {
      if (isset($_SESSION['validFullName'])) {
        $vmenu = $this->validSessButtons();
      }
      else {
        $vmenu = $this->displayNavMenu();
      }
      return $vmenu;
    }

    /**
     * Displays full name and white logout button when user is logged
     * in, and session is valid.
     *
     * @return string $validButton
     */
    public function validSessButtons(): string {
      // Create object of Dbh class.
      $dbConnection = new Dbh();

      // Build SQL statement to query all columns from header_menu
      $sql = "SELECT * FROM header_menu";

      // Connect to database, send query statement and set results to variable
      $results = $dbConnection->connect()->query($sql);

      // Check number of records returned.
      if ($results->num_rows !== 0) {
        // Get all results from that row and set it to array $data to pass
        // and display content from array desired.
        $data = $results->fetch_all(MYSQLI_ASSOC);

        // Menu set to variable to pass and print on pages
        $validButtons = '<ul class="pure-menu-list"><li class="pure-menu-item">';

        //link to full name
        $validButtons .= '<a href="#" class="pure-menu-link">' .
          $_SESSION['validFullName'] . '</a></li>';

        //logout button
        $validButtons .= '<li class="pure-menu-item"><a href="' .
          $data[5]["item_url"] . '" class="pure-button pure-button-primary">'
          . $data[5]["item_name"] . '</a></li></ul>';

      }
      return $validButtons;
    }

    /**
     * Displays css sheet link to display different styles when user is
     * signed in based on the radio button option that they chose at signup.
     *
     * @return string $theme
     */
    public function validStyle(): string {
      $theme = '<link href="' . $_SESSION["theme"] . '" rel= "stylesheet" 
       type="text/css" />';

      return $theme;
    }

    /**
     * Inserts html navigation menu element to pages as variable.
     *
     * @return string $menu
     */
    public function displayNavMenu(): string {
      // Instantiate LoginBox Class.
      //include('../classes/dbh.classes.php');

      // Create object of Dbh class.
      $dbConnection = new Dbh();

      // Build SQL statement to query all columns from header_menu
      $sql = "SELECT * FROM header_menu";

      // Connect to database, send query statement and set results to variable
      $results = $dbConnection->connect()->query($sql);

      // Check number of records returned.
      if ($results->num_rows !== 0) {
        // Get all results from that row and set it to array $data to pass
        // and display content from array desired.
        $data = $results->fetch_all(MYSQLI_ASSOC);

        // Menu set to variable to pass and print on pages
        $menu = '<nav class="nav">';
        //home
        $menu .= '<li class="pure-menu-item">';

        $menu .= '<a href="' . $data[0]["item_url"] . '" class="pure-menu-link">'
          . $data[0]["item_name"] . '</a></li>';

        $menu .= '<li class="pure-menu-item">';

        // book reviews
        $menu .= '<a href="' . $data[1]["item_url"] . '" class="pure-menu-link">'
          . $data[1]["item_name"] . '</a></li>';

        // order book
        $menu .= '<li class="pure-menu-item">';

        $menu .= '<a href="' . $data[2]["item_url"] . '" class="pure-menu-link">'
          . $data[2]["item_name"] . '</a></li>';

        // signup button logged off
        $menu .= '<a href="' . $data[3]["item_url"] . '"class="pure-button pure-button-primary">'
          . $data[3]["item_name"] . '</a>';

        // login button logged off
        //$menu .= '<li class="pure-menu-item">';

        $menu .= '<a href="' . $data[4]["item_url"] . '" 
          class="pure-button pure-button-primary">' . $data[4]["item_name"] .
          '</a></nav></div></div>';
      }
      return $menu;
    }

  }


