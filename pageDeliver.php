<?php

/**
 * 根据url读取参数值
 */

/* https://www.php.cn/php-weizijiaocheng-28181.html#:~:text=%E4%BD%BF%E7%94%A8PHP%E7%BC%96%E5%86%99%E7%A8%8B%E5%BA%8F%E7%9A%84%E6%97%B6%E5%80%99%EF%BC%8C%E6%88%91%E4%BB%AC%E5%B8%B8%E5%B8%B8%E6%83%B3%E8%A6%81%E8%8E%B7%E5%8F%96%E5%BD%93%E5%89%8D%E9%A1%B5%E9%9D%A2%E7%9A%84URL%E3%80%82%20%E4%B8%8B%E9%9D%A2%E6%8F%90%E4%BE%9B%E4%B8%80%E4%B8%AA%E7%94%A8%E4%BA%8E%E8%8E%B7%E5%8F%96%E5%BD%93%E5%89%8D%E9%A1%B5%E9%9D%A2URL%E7%9A%84%E5%87%BD%E6%95%B0%E4%BB%A5%E5%8F%8A%E4%BD%BF%E7%94%A8%E6%96%B9%E6%B3%95%EF%BC%9A%20%24pageURL%20.%3D%20%24_SERVER%5B%22SERVER_NAME%5C%20.,%22%3A%22%20.%20%24_SERVER%5B%22SERVER_PORT%5C%20.%20%24_SERVER%5B%22REQUEST_URI%5C%3B%20%E4%B8%8A%E9%9D%A2%E7%9A%84%E5%87%BD%E6%95%B0%E5%8F%AF%E4%BB%A5%E8%8E%B7%E5%8F%96%E5%BD%93%E5%89%8D%E9%A1%B5%E9%9D%A2%E5%AE%8C%E6%95%B4%E7%9A%84URL%EF%BC%8C%E5%8D%B3%E4%BD%A0%E5%9C%A8%E6%B5%8F%E8%A7%88%E5%99%A8%E5%9C%B0%E5%9D%80%E6%A0%8F%E7%9C%8B%E5%88%B0%E7%9A%84%E5%86%85%E5%AE%B9%E3%80%82 */
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

/* https://www.jb51.net/article/57392.htm#:~:text=%E5%9C%A8php%E4%B8%AD%E8%8E%B7%E5%8F%96u,%E8%A1%A8%E8%BE%BE%E5%BC%8F%E6%9D%A5%E6%93%8D%E4%BD%9C%E4%BA%86%E3%80%82 */
function getParams() {
    $url = curPageURL();

    $refer_url = parse_url($url);

    $params = $refer_url['query'];

    $arr = array();
    if (!empty($params)) {
        $paramsArr = explode('&', $params);

        foreach ($paramsArr as $k => $v) {
            $a = explode('=', $v);
            $arr[$a[0]] = $a[1];
        }
    }
    return $arr;
}

?>
