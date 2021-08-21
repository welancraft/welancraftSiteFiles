<?php

/**
 * 页眉生成
 * @author RoyenHeart
 */

/* name as headerXxxXxxXxx */

/* seven main boxes seperated for better reconstruct */

$headerContentBox01 = "<div class=headerContentBox id=a><a href=\"https://mc.royenheart.com\">WeLanCraft</a></div>";
$headerContentBox02 = "<div class=headerContentBox id=b><a href=\"https://mc.royenheart.com\">首页</a></div>";
$headerContentBox03 = "<div class=headerContentBox id=c><a href=\"https://mc.royenheart.com/index.php?page=101\">服务器</a></div>";
$headerContentBox04 = "<div class=headerContentBox id=d><a href=\"https://mc.royenheart.com/index.php?page=102\">公告</a></div>";
$headerContentBox05 = "<div class=headerContentBox id=e><a href=\"https://mc.royenheart.com/index.php?page=103\">加入</a></div>";
$headerContentBox06 = "<div class=headerContentBox id=f><a href=\"https://mc.royenheart.com/index.php?page=104\">展示</a></div>";
$headerContentBox07 = "<div class=headerContentBox id=g><a href=\"https://mc.royenheart.com/index.php?page=105\">鸣谢</a></div>";

// ContentList
$headerContentList = array($headerContentBox02,$headerContentBox03,$headerContentBox04,
                           $headerContentBox05,$headerContentBox06,$headerContentBox07);

echo "<div id=header>";
echo "<div id=headerContent>";
echo $headerContentBox01,$headerContentBox07,$headerContentBox06,$headerContentBox05,
     $headerContentBox04,$headerContentBox03,$headerContentBox02;
echo "</div>";
echo "</div>";

?>