<?php
use Illuminate\Support\Facades\Route;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <meta charset="UTF-8">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="../resources/css/app.css">


    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/fontawesome.css">
    <script src="fontawesome-free-6.1.1-web/js/all.js"></script>
    <script src="../resources/js/axios.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</head>



    @yield('home')
    <script src="../resources/js/app.js"></script>
</body>

</html>
