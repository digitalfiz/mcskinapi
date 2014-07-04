<?php namespace digitalfiz\phpMinecraftUtilities;

/**
 * Utility for managing a Minecraft avatar.
 *
 * A lot of the code for `getAvatarFace` and `getFullAvatar` was adapted from work by Jamie Bicknell and his
 * Minecraft-Avatar github repo at: https://github.com/jamiebicknell/Minecraft-Avatar Check it out if you want a much
 * more simple implimentation.
 *
 * @package  minecraft
 */
class AvatarUtility {

    public static $avatarName = "";
    public static $skinData = "";

    /**
     * This gets an avatars skin
     * @return void
     */
    public static function getSkin() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://s3.amazonaws.com/MinecraftSkins/' . static::$avatarName . '.png');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $output = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if($status!='200') {
            echo "Using default!\n";
            // Default Avatar: http://www.minecraft.net/skin/char.png
            $output = 'iVBORw0KGgoAAAANSUhEUgAAAEAAAAAgCAMAAACVQ462AAAABGdBTUEAALGPC/xhBQAAAwBQTFRFAAAAHxALIxcJJBgI';
            $output .= 'JBgKJhgLJhoKJxsLJhoMKBsKKBsLKBoNKBwLKRwMKh0NKx4NKx4OLR0OLB4OLx8PLB4RLyANLSAQLyIRMiMQMyQRNCU';
            $output .= 'SOigUPyoVKCgoPz8/JiFbMChyAFtbAGBgAGhoAH9/Qh0KQSEMRSIOQioSUigmUTElYkMvbUMqb0UsakAwdUcvdEgvek';
            $output .= '4za2trOjGJUj2JRjqlVknMAJmZAJ6eAKioAK+vAMzMikw9gFM0hFIxhlM0gVM5g1U7h1U7h1g6ilk7iFo5j14+kF5Dl';
            $output .= 'l9All9BmmNEnGNFnGNGmmRKnGdIn2hJnGlMnWpPlm9bnHJcompHrHZaqn1ms3titXtnrYBttIRttolsvohst4Jyu4ly';
            $output .= 'vYtyvY5yvY50xpaA////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
            $output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
            $output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
            $output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
            $output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
            $output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
            $output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
            $output .= 'AAAAAAAPSUN6AAAAQB0Uk5T////////////////////////////////////////////////////////////////////';
            $output .= '///////////////////////////////////////////////////////////////////////////////////////////';
            $output .= '///////////////////////////////////////////////////////////////////////////////////////////';
            $output .= '//////////////////////////////////////////////////////////////////////////////////////////A';
            $output .= 'FP3ByUAAAAYdEVYdFNvZnR3YXJlAFBhaW50Lk5FVCB2My4zNqnn4iUAAAKjSURBVEhLpZSLVtNAEIYLpSlLSUITLCBa';
            $output .= 'GhNBQRM01M2mSCoXNUURIkZFxQvv/wz6724Wij2HCM7J6UyS/b+dmZ208rsww6jiqo4FhannZb5yDqjaNgDVwE/8JAm';
            $output .= 'CMqF6fwGwbU0CKjD/+oAq9jcM27gxAFpNQxU3Bwi9Ajy8fgmGZuvaGAcIuwFA12CGce1jJESr6/Ot1i3Tnq5qptFqze';
            $output .= 't1jRA1F2XHWQFAs3RzwTTNhQd3rOkFU7c0DijmohRg1TR9ZmpCN7/8+PX954fb+sTUjK7VLKOYi1IAaTQtUrfm8pP88';
            $output .= '/vTw8M5q06sZoOouSgHEDI5vrO/eHK28el04yxf3N8ZnyQooZiLfwA0arNb6d6bj998/+vx8710a7bW4E2Uc1EKsEhz';
            $output .= '7WiQBK9eL29urrzsB8ngaK1JLDUXpYAkGSQH6e7640fL91dWXjxZ33138PZggA+Sz0WQlAL4gmewuzC1uCenqXevMPW';
            $output .= 'c9XrMX/VXh6Hicx4ByHEeAfRg/wtgSMAvz+CKEkYAnc5SpwuD4z70PM+hUf+4348ixF7EGItjxmQcCx/Dzv/SOkuXAF';
            $output .= '3PdT3GIujjGLELNYwxhF7M4oi//wsgdlYZdMXCmEUUSsSu0OOBACMoBTiu62BdRPEjYxozXFyIpK7IAE0IYa7jOBRqG';
            $output .= 'lOK0BFq3Kdpup3DthFwP9QDlBCGKEECoHEBEDLAXHAQMQnI8jwFYRQw3AMOQAJoOADoAVcDAh0HZAKQZUMZdC43kdeq';
            $output .= 'APwUBEsC+M4cIEq5KEEBCl90mR8CVR3nxwCdBBS9OAe020UGnXb7KcxzPY9SXoEEIBZtgE7UDgBKyLMhgBS2YdzjMJb';
            $output .= '4XHRDAPiQhSGjNOxKQIZTgC8BiMECgarxprjjO0OXiV4MAf4A/x0nbcyiS5EAAAAASUVORK5CYII=';
            $output = base64_decode($output);
        }
        static::$skinData = $output;
    }

    /**
     * This returns the avatars face
     * @param  string  $avatarName
     * @param  integer $size
     * @param  string  $outputPath
     * @return bool/Exception
     */
    public static function getAvatarFace($avatarName, $size=48, $outputPath=NULL) {
        static::$avatarName = $avatarName;
        try {
            static::getSkin();
            $size = max(8,min(250,$size));
            $im = imagecreatefromstring(static::$skinData);
            $av = imagecreatetruecolor($size,$size);
            imagecopyresized($av,$im,0,0,8,8,$size,$size,8,8);    // Face
            imagecolortransparent($im,imagecolorat($im,63,0));    // Black Hat Issue
            imagecopyresized($av,$im,0,0,40,8,$size,$size,8,8);   // Accessories
            imagepng($av, $outputPath);
            imagedestroy($im);
            imagedestroy($av);
            return true;
        }
        catch(Exception $e) {
            return $e;
        }
    }

    /**
     * This returns the avatars full body
     * @param  string  $avatarName
     * @param  integer $size
     * @param  string  $outputPath
     * @return bool/Exception
     */
    public static function getFullAvatar($avatarName, $size=48, $outputPath=NULL) {
        static::$avatarName = $avatarName;

        try {
            static::getSkin();
            $size = max(8,min(250,$size));

            $im = imagecreatefromstring(static::$skinData);
            $mi = imagecreatetruecolor(64,32);
            imagecopyresampled($mi,$im,0,0,64-1,0,64,32,-64,32);
            $av = imagecreatetruecolor(16,32);
            imagesavealpha($av,true);
            imagefill($av,0,0,imagecolorallocatealpha($av,0,0,0,127));

            imagecopyresized($av,$im,4,0,8,8,8,8,8,8); // Head
            imagecopyresized($av,$im,4,8,20,20,8,12,8,12); // Chest
            imagecopyresized($av,$im,0,8,44,20,4,12,4,12); // Right Arm
            imagecopyresized($av,$mi,12,8,16,20,4,12,4,12); // Left Arm
            imagecopyresized($av,$im,4,20,4,20,4,12,4,12); // Right Leg
            imagecopyresized($av,$mi,8,20,56,20,4,12,4,12); // Left Leg

            // Black Hat Issue
            imagecolortransparent($im,imagecolorat($im,63,0));

            // Accessories
            imagecopyresized($av,$im,4,2,40,8,8,8,8,8);


            // Now lets resize this bad boy
            $width = $size;
            $height = $size*2;

            $resized_image = imagecreatetruecolor($width,$height);
            imagesavealpha($resized_image,true);
            imagefill($resized_image,0,0,imagecolorallocatealpha($av,0,0,0,127));
            imagecopyresized(  $resized_image, $av, 0, 0, 0, 0, $width, $height, 16, 32);

            imagepng($resized_image, $outputPath);
            imagedestroy($im);
            imagedestroy($av);
            imagedestroy($resized_image);

            return true;
        }
        catch(Exception $e) {
            return $e;
        }


    }


}
