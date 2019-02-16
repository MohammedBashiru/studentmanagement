<?php

  $users = false;
  $course = false;
  $downloads = false;
  $messages = false;
  $payments = false;

  $redirect_url = $_SERVER["REDIRECT_URL"];

  if ( $redirect_url == "/admin" ){
    $users = true;
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
                  <p class="profile-name"><?= $_SESSION['username']; ?></p>
                  <div>
                    <small class="designation text-muted">Administrator</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item <?= $users? 'active' : '' ?>">
            <a class="nav-link" href="/portal">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Users Management</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->