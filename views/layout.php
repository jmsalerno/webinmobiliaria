<?php

    if(!isset($_SESSION)) {
        
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    
    <title>Web Inmobiliaria</title>

    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    
</head>
<body>

    <?php 

        include_once __DIR__ .'/templates/header.php';

        echo $contenido;

        include_once __DIR__ .'/templates/footer.php'; 
    ?>

    <script src="../build/js/bundle.min.js" defer></script>

</body>
</html>