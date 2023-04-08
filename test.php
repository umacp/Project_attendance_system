<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi Uma</title>
    <style>
        body{
            background-color: rgb(0, 0, 0);
            color: rgb(255, 255, 255);
        }
        .whole{
            max-width: 100vw;
            height: 100vh;
            display: flex;
            overflow: hidden;
            flex-wrap: wrap;
            line-height: 1px;
            background-color: rgb(0, 0, 0);
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
        p{
            opacity: 0.2;
        }
        .front{
            width: 100%;
            height: 100vh;
            
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }
        h1{
            text-align: center;
            margin-top: 50vh;
            font-size: 60px;
        }
    </style>
</head>
<body>
    <div class="whole">
        <?php
        for($i=0; $i<2000; $i++){
            echo "<p>Riyo</p>";
        }
        ?>
    </div>
    <div class="front">
        <h1>Hi Uma</h1>
    </div>
</body>
</html>