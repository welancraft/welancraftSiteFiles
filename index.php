<?php

/**
 * welancraft.top我的世界服务器网页文件-主界面
 * @author RoyenHeart
 */

/* 数据获取 */
include_once __DIR__ . '/databaseLink.php';

include_once __DIR__.'/fileExist.php';

?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/siteIcon.jpg" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <script type="text/javascript" src="/assets/js/main.js"></script>
    <title>WeLanCraft</title>
</head>

<body>

    <!-- 页眉输出 header -->

    <?php include __DIR__ . '/header.php'; ?>

    <!-- 图片栏输出 picshow -->

    <div id=picshow>
        <img id=picshowPic />
        <div id=picshowText>
            Loading...
        </div>
    </div>

    <!-- 正文 article -->

    <div id=article>
        <br>
        <div id=articlePage>
            <?php
            include __DIR__ . '/pageDeliver.php';
            $curl = getParams(); // $curl存储获得参数信息，并以键值对的形式存储
            if (!empty($curl)) {
                if ($curl["page"] == "100") {
                    include __DIR__ . '/archives/articlePage100.php';
                } else if ($curl["page"] == "101") {
                    include __DIR__ . '/archives/articlePage101.php';
                } else if ($curl["page"] == "102") {
                    include __DIR__ . '/archives/articlePage102.php';
                } else if ($curl["page"] == "103") {
                    include __DIR__ . '/archives/articlePage103.php';
                } else if ($curl["page"] == "104") {
                    include __DIR__ . '/archives/articlePage104.php';
                } else if ($curl["page"] == "105") {
                    include __DIR__ . '/archives/articlePage105.php';
                } else {
                    include __DIR__ . '/archives/default.php';
                }
            } else {
                include __DIR__ . '/archives/articlePage100.php';
            }
            ?>
        </div>
        <br>
    </div>

    <!-- 页脚 footer -->

    <div id=footer>
        <br>
        <p>©2021-2021 WeLanCraft 版权所有</p>
        <p>若非特别说明</p>
        <p>以上内容以 <a href="https://github.com/royenheart/welancraftSiteFiles/blob/main/LICENSE">MPL-2.0</a> 协议提供</p>
        <p>内容已于 <a href="https://github.com/royenheart/welancraftSiteFiles">GITHUB</a> 上发布</p>
        <p>浙ICP备2020042582号</p>
        <p><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=62012302000279"><img src="/resources/beianIcon.png" />甘公网安备62012302000279号</a>
        </p>
        <br>
    </div>

</body>

</html>