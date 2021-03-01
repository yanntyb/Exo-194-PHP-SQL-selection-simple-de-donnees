<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=exo194', "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $response = $pdo->prepare("SELECT * FROM user");
    $response->execute();
    $result = $response->fetchAll(PDO::FETCH_ASSOC);?>
    <div class="title"><?php
        foreach(array_keys($result[0]) as $key) {?>
            <span class="title_case"><?php echo $key?></span><?php
        }
    ?>
    </div><?php
    foreach ($result as $data => $item) {
        ?>
        <div class="info"><?php
        foreach ($item as $value) { ?>
            <span><?php echo $value ?></span><?php
        } ?>
        </div> <?php
    }
} catch (PDOException $e) {
    echo $e->getMessage();
} ?>
</body>
</html>
