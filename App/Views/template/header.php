<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../../public/css<?php
     
     echo $_SERVER['REQUEST_URI'].'.css';
     
     ?>"/>
</head>
<body>
    <h1>Header</h1>
    <?=$content?>
    <h2>Footer</h1>

    
    <script src="../../../public/js/bibliotecas/jquery-3.6.0.min.js"></script>
    <script src="../../../public/js/bibliotecas/jquery.rest.js"></script>
    <script type="text/javascript" src="../../../public/js<?php
    
    echo $_SERVER['REQUEST_URI'].'.js?'.time();
    
    ?>"></script>
    <script src="../../../public/js/login.js"></script>

</body>
</html>