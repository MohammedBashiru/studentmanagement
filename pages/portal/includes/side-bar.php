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
  elseif ($redirect_url == "ytd-videos" ){
    $ytd = true;
  }
  elseif ($redirect_url == "downloads" ){
    $downloads = true;
  }
  elseif ($redirect_url == "payments" ){
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
                  <?php if ( $_SESSION["profile"] ) : ?>
                    <img src="<?= $_SESSION["profile"] ?>" alt="profile image">
                  <?php else :  ?>
                   <img src="../pages/portal/assets/faces/user.png" alt="profile image">
                  <?php endif; ?>
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
            <a class="nav-link" href="/">
              <i class="menu-icon mdi mdi-content-paste"></i>
              <span class="menu-title">Results</span>
            </a>
          </li>
          <li class="nav-item <?php 
               if ( $timetable == true ){
                echo 'active';
               }
             ?>">
            <a class="nav-link" href="/ytd-videos">
              <i class="menu-icon mdi mdi-calendar-text"></i>
              <span class="menu-title">Timetable</span>
            </a>
          </li>
          <li class="nav-item <?php 
               if ( $noticeboard == true ){
                echo 'active';
               }
             ?>"">
            <a class="nav-link" href="/downloads">
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
            <a class="nav-link" href="/payments">
              <i class="menu-icon mdi mdi-bank"></i>
              <span class="menu-title">Payments</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->