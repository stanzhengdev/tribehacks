<!DOCTYPE html>
<html>
<head>
  <title><?php echo $this->page_title?></title>
  <script>
  var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
  if(!oldieCheck) {
  document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
  } else {
  document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
  }
  </script>
  <script>
  if(!window.jQuery) {
  if(!oldieCheck) {
    document.write('<script src="vendor/gumbyframework/gumby/js/libs/jquery-2.0.2.min.js"><\/script>');
  } else {
    document.write('<script src="vendor/gumbyframework/gumby/js/libs/jquery-1.10.1.min.js"><\/script>');
  }
  }
  </script>
  <link href="vendor/gumbyframework/gumby/css/gumby.css" type="text/css" rel="stylesheet">
  <script src="vendor/gumbyframework/gumby/js/libs/modernizr-2.6.2.min.js"></script>
  <script src="vendor/ckeditor/ckeditor.js"></script>
  <meta name="viewport" content="width=device-width, user-scalable=no">
</head>
<body>
<div id="nav1" class="navbar">
    <div class="row">
        <a href="#" gumby-trigger="#nav1 &gt; .row &gt; ul" class="toggle"><i class="icon-menu"></i></a>
        <h1 class="four columns logo">
          <a href="?r=site">
            <img src="public/img/logo.png" gumby-retina />
          </a>
        </h1>
        <ul class="eight columns">
          <li><a href="?r=site/index"><i class="icon-megaphone"></i> Forums</a></li>
          <li>
            <a href="?r=user/index"><i class="icon-users"></i> Users</a>
          </li>
          <li class="field"><input type="search" placeholder="Search" class="search input"></li>
          <li>
            <a href="<?php echo (isset($_SESSION["auth"]) ) ? "#" : "?r=site/login"?>"><i class="icon-user"></i> <?php echo (isset($_SESSION["auth"]) ) ? $_SESSION["user_name"] : "Login"?></a>
            
            <?php if (isset($_SESSION["auth"])): ?>
                  <div class="dropdown">
                    <ul>
                      <?php if($this->user->isAdmin()):?>
                        <li><a href="?r=admin"><i class="icon-cog"></i> Administration</a></li>
                      <?php endif;?>
                      <li><a href="?r=site/logout"><i class="icon-logout"></i>&nbsp;Logout</a></li>

                    </ul>
                  </div>
              <?php endif; ?>
          </li>

          <!--
          <li><a href="<?php echo (isset($_SESSION["auth"]) ) ? "?r=site/logout" : "?r=site/login"?>"><i class="icon-user"></i> <?php echo (isset($_SESSION["auth"]) ) ? "Logout" : "Login"?></a></li>
        -->
          
        </ul>
    </div>
  </div>
