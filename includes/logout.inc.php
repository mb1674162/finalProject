<?php
  /**
   * Author: Maribel Bustamante
   * Final Assignment: logout.php
   * File that destroys a session in order to make logout button,
   * functional as it is set as the href link.
   */
  session_start();
  session_unset();
  session_destroy();

  // Navigate back to index page
  header("location: ../index.php?error=none");

