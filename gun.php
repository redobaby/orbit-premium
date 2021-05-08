<?php
$gonder = $_POST["gonder"];
$gun = $_POST["gün"];
if(isset($gonder)){
   $toplam = time() + (15 * 24 * 60 * 60);
    echo $toplam;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input name="gun" type="text" name="gun">
    <button name="gonder" type="submit">Topla</button>
    </form>
</body>
</html>