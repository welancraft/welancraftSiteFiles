<?php

/**
 * welancraft.top我的世界服务器网页文件-主界面
 * @author RoyenHeart
 */

/* 数据对象声明获取 */
include_once __DIR__.'/siteDataClass.php';

/* 网页错误 */
include_once __DIR__.'/siteException.php';

/* 数据获取函数 */
include_once __DIR__.'/funcs.php';

/* 数据库信息获取 */
include_once __DIR__ . '/databaseLink.php';

$curl = getParams(); // $curl存储获得参数信息，并以键值对的形式存储

/* 网络文件存放地址 */
define('SERVER_ROOT',"https://mc.royenheart.com"); // 网络根地址
define('SERVER_SRC',SERVER_ROOT."/resources"); // 网页资源文件地址
define('SERVER_ARCHIVE',SERVER_SRC."/archives"); // 各界面内容存放地址

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

    <?php include_once __DIR__.'/footer.php'; ?>

</body>

</html>