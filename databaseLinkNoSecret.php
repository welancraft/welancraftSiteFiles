<?php

/**
 * 网站数据库链接
 * @author RoyenHeart
 * 
 * 此文件做数据库链接功能
 * 具体参数请以个人实际情况确定
 * 数据表中包含host，port，name，owner字段
 * 
 * 实际部署时请去掉文件前缀后'NoSecret'
 */

/* 连接数据库 */
$con = mysqli_connect('主机地址','用户名','用户密码','使用的数据库');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

/* 声明服务器数据存储数组 */
$hosts = array();
$ports = array();
$names = array();
$owners = array();
$subdomains = array();

/* 获取服务器数据 */
$sql="SELECT * FROM 数据表名称"; // 获取数据表指令
$result = mysqli_query($con,$sql);

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
$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result)) {
    $person = new Owner(
        $row['name'],$row['mail'],$row['phone'],$row['qq']
    );
    $contactList[$row['name']] = $person;
}

mysqli_close($con);

?>