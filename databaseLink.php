<?php

/**
 * 网站数据库链接
 * 
 * 实现数据库链接功能
 * 具体参数请以个人实际情况确定
 * 数据表中包含host，port，name，owner字段
 * 
 * 建议将resources文件夹单独放置并设置安全权限
 * 
 * @author RoyenHeart
 */

/* 获取数据库数据文件 */
include __DIR__ . '/resources/code/dbconnect.php'; // 根据实际存放位置修改

/* 连接数据库 */
try {
    $con = mysqli_connect($dbServer,$dbUserName,$dbPassword,$dbName); 
} catch (Exception $e) {
    echo "Oops, something may happen to the server <br>";
    echo "Exception " . $e.getCode() . ": " . $e.getMessage() . "<br>".
    " in " . $e.getFile() . " on line " . $e.getLine() . "<br>";
}

/* 声明服务器数据存储数组 */
$hosts = array();
$ports = array();
$names = array();
$owners = array();
$subdomains = array();

/* 获取服务器数据 */
$sql="SELECT * FROM 数据表名称"; // 获取数据表指令
try {
    $result = mysqli_query($con,$sql);
} catch (Exception $e) {
    echo "Oops, something may happen to the server <br>";
    echo "Exception " . $e.getCode() . ": " . $e.getMessage() . "<br>".
    " in " . $e.getFile() . " on line " . $e.getLine() . "<br>";
}

while($row = mysqli_fetch_array($result)) {
    $hosts[count($hosts) + 1] = $row['host']; // 获取服务器地址
    $ports[count($ports) + 1] = $row['port']; // 获取服务器接口
    $names[count($names) + 1] = $row['name']; // 获取服务器名字，也是进入地址
    $owners[count($owners) + 1] = $row['owner']; // 获取服主信息
    $subdomains[count($subdomains) + 1] = $row['subdomain']; // 子域名
}

/* 声明通讯录队列 */
$contactList = array();

/* 获取联系数据 */

$sql="SELECT * FROM 数据表名称";
try {
    $result = mysqli_query($con,$sql);
} catch (Exception $e) {
    echo "Oops, something may happen to the server <br>";
    echo "Exception " . $e.getCode() . ": " . $e.getMessage() . "<br>".
    " in " . $e.getFile() . " on line " . $e.getLine() . "<br>";
}

while ($row = mysqli_fetch_array($result)) {
    $person = new Owner(
        $row['name'],$row['mail'],$row['phone'],$row['qq']
    );
    $contactList[$row['name']] = $person;
}

mysqli_close($con);

?>