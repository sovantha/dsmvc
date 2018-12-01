<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title><?= dsmvc_page_title(); ?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <?= dsmvc_stylesheet('css/normalize.css'); ?>
  <?= dsmvc_stylesheet('css/skeleton.css'); ?>
  
  <?php
    //dsmvc_include_stylesheets();
    
    /*
    Uncomment the line above to inject custom stylesheets.
    So in the dsmvc_header() function on top of your view, specify its argument as 
    stylesheet names. e.g. dsmvc_header('css/custom.css');
    */
  ?>
  
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

