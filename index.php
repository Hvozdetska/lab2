<?php
require_once __DIR__ . "/Cinema.php";

$cinema = new Cinema();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab2</title>
    <script src="script.js"></script>
</head>
<body style="display: flex; justify-content: space-evenly">
<div>
    <form action="" method="post">
        <input type="hidden" name="video"><br>
        <input type="submit" value="Film on videotape"><br>
    </form>
    <form action="" method="post">
        <input type="text" name="actor" placeholder="Имя актера"><br>
        <input type="submit" value="Film By Actor"><br>
    </form>
    <form action="" method="post">
        <input type="hidden" name="year">
        <input type="submit" value="New Films"><br>
    </form>
</div>
<hr>
<div>
    <?php
    if (isset($_POST["video"])) {
        $cinema->video();
    } elseif (isset($_POST["actor"])) {
        $cinema->filmByActor($_POST["actor"]);
    } elseif (isset($_POST["year"])) {
        $cinema->newFilm();
    }
    ?>
</div>
<hr>
<div>
    <div id="contentLoad"></div>
    <br>
    <input type="button" value="Save" onclick="save()">
    <input type="button" value="Load" onclick="load()">
</div>
</body>
</html>
