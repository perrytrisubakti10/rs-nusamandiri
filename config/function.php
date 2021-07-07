<?php
function foto_profile($img)
{
    $img_infolder = "public/img/gambaruser/" . $img;
    if ($img == '') {
        $foto_profile = "public/img/user.jpg";
    } else if (file_exists($img_infolder)) {
        $foto_profile = $img_infolder;
    } else {
        $foto_profile = "public/img/user.jpg";
    }

    return $foto_profile;
}
