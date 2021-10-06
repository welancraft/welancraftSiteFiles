<?php

/**
 * 数据处理函数定义
 */

/**
 * 读取界面参数
 * 
 * @return string URL
 */
function curPageURL() {
    $pageURL = 'http';
    
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    } // 设置协议形式
    
    $pageURL .= "://";
    
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    
    return $pageURL;
}

/**
 * 根据界面URL获取参数
 * 
 * @return string URL's params
 */
function getParams() {
    $url = curPageURL();

    $refer_url = parse_url($url);

    $params = $refer_url['query'];

    $arr = array();
    if (!empty($params)) {
        $paramsArr = explode('&', $params); // 分割各个参数

        foreach ($paramsArr as $k => $v) {
            $a = explode('=', $v); // 分割参数名和参数值
            $arr[$a[0]] = $a[1];
        }
    }
    return $arr;

}

/**
 * 判断服务器端文件是否存在
 * 
 * @author RoyenHeart
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
