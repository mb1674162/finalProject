<?php
  /**
   * Author: Maribel Bustamante
   * Final Assignment : header.classes.php
   * Header class to dynamically insert html header element to project pages.
   */

 class HeaderTemplate {
   /**
    * Inserts html header element to pages as variable.
    *
    * @return string $header
    */
   public function displayHeader(): string {
     include ('dbh.classes.php');
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
       $header = '<div class="header">';

       $header .= '<div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">';

       $header .= '<li class="pure-menu-item"><img style=width="118" height="118"
         class="post-avatar" src="' . $data[9]["item_url"] .'" 
         alt="bookClub avatar logo" ></li>';

       $header .= '<a class="pure-menu-heading" href="' . $data[6]["item_url"]
         . '">Maribel Bustamante BookClub Site</a>';

       //return $header;
     }
     return $header;
   }
 }
