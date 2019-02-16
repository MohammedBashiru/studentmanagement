<?php

  $results = false;
  $timetable = false;
  $noticeboard = false;
  $forum = false;
  $payments = false;

  // echo '<pre>';
  // var_dump($_SERVER);
  // echo '</pre>';

  // die();
  $redirect_url = $_SERVER["REDIRECT_URL"];

  if ( $redirect_url == "/" ){
    $results = true;
  }
  elseif ($redirect_url == "/portal/ytd-videos" ){
    $ytd = true;
  }
  elseif ($redirect_url == "/portal/downloads" ){
    $downloads = true;
  }
  elseif ($redirect_url == "/portal/payments" ){
    $payments = true;
  }


?>


<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="../pages/portal/assets/nerd.png" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?= $_SESSION['full_name']; ?></p>
                  <div>
                    <small class="designation text-muted">Student</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li class="nav-item <?php 
               if ( $results == true ){
                echo 'active';
               }
             ?>">
            <a class="nav-link" href="/portal">
              <i class="menu-icon mdi mdi-content-paste"></i>
              <span class="menu-title">Results</span>
            </a>
          </li>
          <li class="nav-item <?php 
               if ( $timetable == true ){
                echo 'active';
               }
             ?>">
            <a class="nav-link" href="/portal/ytd-videos">
              <i class="menu-icon mdi mdi-calendar-text"></i>
              <span class="menu-title">Timetable</span>
            </a>
          </li>
          <li class="nav-item <?php 
               if ( $noticeboard == true ){
                echo 'active';
               }
             ?>"">
            <a class="nav-link" href="/portal/downloads">
              <i class="menu-icon mdi mdi-file-document-box"></i>
              <span class="menu-title">Noticeboard</span>
            </a>
          </li>
          <li class="nav-item <?php 
               if ( $forum == true ){
                echo 'active';
               }
             ?>">
            <a class="nav-link" href="index.html">
              <i class="menu-icon mdi mdi-message"></i>
              <span class="menu-title">Forum</span>
            </a>
          </li>
          <li class="nav-item <?php 
               if ( $payments == true ){
                echo 'active';
               }
             ?>"">
            <a class="nav-link" href="/portal/payments">
              <i class="menu-icon mdi mdi-bank"></i>
              <span class="menu-title">Payments</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->