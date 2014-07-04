<?php


include "vendor/autoload.php";


function getAvatar($avatar, $size) {
    $key = $avatar.'--'.$size;
    $memcache = new Memcache;
    $data = $memcache->get($key); // Why does this return 1?
    if ($data === false) {
        $data = digitalfiz\phpMinecraftUtilities\AvatarUtility::getFullAvatar($avatar, $size);
//        $memcache->set($key, $data, 300);
    }

    return $data;
}

header('Content-Type: text/plain');


$split = explode("/", substr($_SERVER['REQUEST_URI'], 1));

if($split[0] == 'avatar') {

    $avatar = $split[1];
    $size = 150;
    if($split[2]) {
        $size = $split[2];
    }



    $skin = getAvatar($avatar, $size);

    header('Content-Type: image/png');
    echo $skin;

} else {
    echo "hi";
}

//print_r($_SERVER);