<?php

/**
 * 判断服务器端文件是否存在
 * @author RoyenHeart
 */

/**
 * @param string $fileAddr file address  
 */ 
function isFileExist($fileAddr) {

    if(preg_match("/http:\/\//",$fileAddr) == 1 || preg_match("/https:\/\//",$fileAddr) == 1){

        $header = get_headers($fileAddr, true);
        return isset($header[0]) && (strpos($header[0], '200') || strpos($header[0], '304'));
    
    } else {
        return file_exists($fileAddr);
    }

}

?>