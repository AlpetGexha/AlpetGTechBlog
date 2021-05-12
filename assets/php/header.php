 <?php
  include "database/config.php";
  ob_start();
  ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>

   <!-- ------------ Meta ------------------ -->
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- ------------ Main style ------------------ -->
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">

   <!-- ------------ Boostrap css ------------------ -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!-- ------------ icone ------------------ -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
   <title>AlpetG Tech Blog</title>
 </head>

 <!-- ------------ Boostrap JS ------------------ -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <!-- ------------ Ajax------------------ -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

 <!-- ------------ jQuery------------------ -->
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

 <body>
   <header>
     <nav class="navbar sticky-top navbar-expand-lg bg-light navbar-light">
       <div class="container-xxl" aria-label="Main navigation">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link" href="index.php">Faqja Kryesore</a>
             </li>

             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                 Kadegorit
               </a>
               <div class="dropdown-menu">
                 <a class="dropdown-item" href="#">1</a>
                 <a class="dropdown-item" href="#">2 </a>
                 <a class="dropdown-item" href="#">3</a>
                 <a class="dropdown-item" href="#">4</a>
                 <a class="dropdown-item" href="#">5</a>
               </div>

             <li class="nav-item">
               <a class="nav-link" href="index.php">Rreth nesh</a>
             </li>

             <li class="nav-item">
               <a class="nav-link" href="index.php">Kontakti</a>
             </li>

           </ul>
           <ul class="navbar-nav ml-auto">
             <form method="GET" action="#" class="d-flex ">
               <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success" type="submit">Search</button>
             </form>
           </ul>

         </div>
     </nav>
     </div>

   </header>