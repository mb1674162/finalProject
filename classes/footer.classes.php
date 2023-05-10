<?php

  /**
   * Author: Maribel Bustamante
   * Final Assignment :     
   * footer.classes.php
   * Footer class to dynamically insert html footer element to project pages.
   */
  class Footer {

    /**
     * Inserts html footer element to pages as variable.
     *
     * @return string $footer
     */
    public function displayFooter(): string {
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

        // Set header string to variable to pass to pages.
        $footer = '<div class="footer">';

        $footer .= '<ul class="pure-menu-list">';

        $footer .= '<a href="' . $data[10]["item_name"] . '" class="pure-menu-link"><img 
          style= width="88" height="88" class="post-avatar" src="'
          . $data[10]["item_url"] . '" alt="weatherRssFeedLogo"></a></li>';

        $footer .='<li class="pure-menu-item pure-menu-selected">';

        $footer .= '<h2>' . $data[8]["item_name"] .'</h2></li></ul></div>';


      }
      return $footer;
    }

  }

