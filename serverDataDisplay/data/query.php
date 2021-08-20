<?php
/*
 * 張文相 Zhang Wenxiang - 個人 Blog
 * https://blog.reh.tw/
 *
 * 範例教學
 * https://blog.reh.tw/webpage-display-minecraft-server-status/
 */

/**
 * @二次修改 RoyenHeart
 */

use xPaw\MinecraftQuery;
use xPaw\MinecraftQueryException;

// 获取服务器数据 query方式（ping方式部分数据如玩家列表无法获取）

require_once dirname(dirname(__FILE__)).'/src/MinecraftQuery.php';
require_once dirname(dirname(__FILE__)).'/src/MinecraftQueryException.php'; // 加载 Query 类

$Timers = array(); // 查询时间数组，存放各个服务器信息查询时间

$Querys = array(); // 创建Query类数组，用以存放各个服务器数据

for ($id = 1;$id <= $exitence;$id++) {
    $Timer = MicroTime(true); // 计算查询时间

    $Querys[$id] = new MinecraftQuery(); // Query类数组，用于存储获取的服务器信息
    try {
        $Querys[$id]->Connect($hosts[$id], $ports[$id], 1);
    } catch(MinecraftQueryException $e) {
        $Exception = $e;
    }

    $Timer = Number_Format(MicroTime(true) - $Timer, 4, '.', ''); // 返回查找时间
    $Timers[$id] = $Timer;
}

?>
