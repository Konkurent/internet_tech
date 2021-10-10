<?php
define('PATH_TO_LESSON', '/lesson_02');
$randCount = rand(0, 26);
for ($i = 2; $i < 6; $i++) {
    if ($i * $i > $randCount) {
        $randCount = $i * $i;
        $width = 100 * $i + ($i + 1) * 3 + ($i - 1) * 3 . 'px';
        break;
    }
}

$script = '<?php
            $img = imagecreatetruecolor(100, 100);
            $color = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
            imagefilledrectangle($img, 0, 0, 100, 100, $color);
            imagejpeg($img, null, 100);
            ?>';

$arrName = [];
for ($i = 0; $i < $randCount; $i++) {
    $fw = fopen('img_' . $i . '.php', 'w');
    $arrName[] = 'img_' . $i . '.php';
    fwrite($fw, $script);
    fclose($fw);
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Дз 2</title>
    <script defer src="<?=PATH_TO_LESSON . '/'?>index.js"></script>
    <style>
        .container {
            max-width: <?=$width?>;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <?php foreach ($arrName as $key => $value):?>
            <img src="<?=PATH_TO_LESSON . '/' . $value?>" alt="" style="padding: 3px">
        <?endforeach;?>
    </div>
</body>
</html>