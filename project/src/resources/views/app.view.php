<? $text = 'Click to view documentation'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Dashboard | PhpSlides</title>
   <include path="components/Header.php" />
   
   <style>
      .logo {
         width: 45%;
         animation: ReSeize 1.3s ease-in-out infinite;
      }
   
      .logo img {
         width: 100%;
      }
   
      .description,
      .link {
         margin: auto;
         color: wheat;
         font-size: 15px;
         text-align: center;
         font-weight: 400;
         font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      }
   
      .link {
         text-decoration: underline;
      }
   
      .link:hover {
         color: whitesmoke;
      }
   </style>
</head>


<!-- View Contents Begins -->

<body>
   <div class="container">
      <div class="logo">
         <img src="{{ import('../assets/logo.svg') }}" alt="PhpSlides Logo">
      </div>

      <div class="description">
         <p>
            PhpSlides let you create a secured Routing in php and secured API, which prevents SQL injections, and from XSS attack & CSRF.
            <br>
         </p>
         <p>
            <a href="//packagist.org/packages/phpslides/phpslides" class="link">{{ $text }}</a>
         </p>
      </div>

      <a href="{{ asset('any') }}">
         <button class="btn">Navigate To Not Found Page</button>
      </a>
   </div>
</body>

</html>