<?php

/**
 * 各服务器公告
 */

/* 获取数据 */

$sortData = (!empty($curl["list102"]))?$curl["list102"]:"default"; // 分类方式

/* 若传入错误参数 */

$sortData = (in_array($sortData,["time","server","default"]))?$sortData:"default";

$notice = $_POST["whichNotice"];

?>

<!-- 加载css文件 -->

<link rel="stylesheet" href="../assets/css/articlePage102.css" />

<!-- 加载js文件 -->

<script type="text/javascript" src="../assets/js/articlePage102.js"></script>

<div id=articlePage102>
    <?php
        include __DIR__.'/articlePage102/noticeGet.php'; // 获取公告信息
        if (!empty($notice)) {

        } else {
            if ($sortData == "dafault") {
                
            } else if ($sortData == "time") {

            } else if ($sortData == "server") {

            }
        }
    ?>
</div>