<?php
/**
 * Author: Maribel Bustamante
 *
 * Final Assignment: content.php
 *
 * Classes to prefill content on webpages.
 *
 */

  class Content {

  /**
   * Opens new db connection to query tables and output query results.
   */

    public function selectQuery(): string {
      include ('dbh.classes.php');
      $dbConnection = new Dbh();

      // Build SQL statement to query all columns from header_menu
      $sql = "SELECT * FROM books";

      // Connect to database, send query statement and set results to variable
      $results = $dbConnection->connect()->query($sql);

      // Check number of records returned.
      if ($results->num_rows !== 0) {
        $select = $results;
      }
      return $select;
    }

    /**
     * Opens db and passes an insert statement to use in methods to get input
     * from website.
     *
     */
    public function insertQuery(): void {
      $sql = "INSERT INTO reviews (fullName, title , bookReview) VALUES (
              '" . $fullName . "', '" . $title . "', 
              '" . $bookReview . "')";

      if ($this->connect()->query($sql) === TRUE) {
      echo "Record inserted successfully";
      }
      else {
        echo "ERROR:" . $sql . "<br />" . $this->connect()->error;
      }
    }

  /**
   * Displays the featured book of the month's image on navy blue
   * ribbon wrapper on webpage.
   *
   * @returns string $wrapper;
   *
   */

    public function wrapperBook($select): string {
      $this->selectQuery();
      $wrapper = '<div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
          <img width="300" alt="' .$select[0]['title'] . '" 
          class="pure-img-responsive" src="' . $select[0]['image'] . '">
      </div>
      <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">
          <h2 class="content-head content-head-ribbon">' . $select[0]['title'] .'</h2>
  
          <p>
              Review the book of the month and share your thoughts with 
              other members.
          </p>
      </div>';
      return $wrapper;
    }


    /**
     * Displays review form and Inserts review into reviews table.
     */
    public function insertReview(): string {
      if (isset($_POST['submit'])) {
        $fullName = $_POST['fullName'];
        $title = $_POST['title'];
        $bookReview = $_POST['bookReview'];

        $this->insertQuery();
      }
      else {
        $reviewForm = '<div class="content">
        <h2 class="content-head is-center">Write Your Review and Share</h2>

        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <form class="pure-form pure-form-stacked">
                    <fieldset>

                        <label for="fullName">Your Full Name</label>
                        <input id="fullName" name="fullName" type="text" placeholder="Full Name">


                        <label for="title">Book Title</label>
                        <input id="title" name=title type="text" placeholder="Book Title">

                        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">
                        <label for="bookReview">Your Book Review: </label>

                      <textarea id="bookReview" name="bookReview" rows="10" cols="25">
                      </textarea><br><br>
                      <h2 class="content-head content-head-ribbon is-center"></h2>
                    
                    
                       <button type="submit" class="pure-button">Sign Up</button>
                </fieldset>
            </form>
        </div>';
      }
      return $reviewForm;
      
    }
  }


  

  
  




