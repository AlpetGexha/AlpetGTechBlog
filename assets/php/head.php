<!DOCTYPE html>
<html lang="en">

<head>
   <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo.jpg'>
   <!-- ------------ Meta ------------------ -->
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- ------------ Main style ------------------ -->
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">

   <!-- ------------ Boostrap css ------------------ -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

   <!-- ------------ icone ------------------ -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   <script>
      $(document).ready(function() {
         // Add smooth scrolling to all links
         $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
               // Prevent default anchor click behavior
               event.preventDefault();

               // Store hash
               var hash = this.hash;

               // Using jQuery's animate() method to add smooth page scroll
               // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
               $('html, body').animate({
                  scrollTop: $(hash).offset().top
               }, 800, function() {

                  // Add hash (#) to URL when done scrolling (default click behavior)
                  window.location.hash = hash;
               });
            } // End if
         });
      });
   </script>