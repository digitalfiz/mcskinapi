<?php


include "vendor/autoload.php";


header('Content-Type: text/plain');


$split = explode("/", substr($_SERVER['REQUEST_URI'], 1));

if($split[0] == 'avatar') {

    $avatar = $split[1];
    $size = 150;
    if($split[2]) {
        $size = $split[2];
    }


    $skin = digitalfiz\phpMinecraftUtilities\AvatarUtility::getFullAvatar($avatar, $size);

    header('Content-Type: image/png');
    echo $skin;

} else {
    echo "hi";
}

//print_r($_SERVER);