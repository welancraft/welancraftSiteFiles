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

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

// 获取服务器数据 ping方式

require_once dirname(dirname(__FILE__)).'/src/MinecraftPing.php';
require_once dirname(dirname(__FILE__)).'/src/MinecraftPingException.php'; // 加载 Ping 类

$Timers = array();

$QueryPings = array();
$InfoPings = array();

for ($id = 1;$id <= $exitence;$id++) {
    $Timer = MicroTime(true); // 计算查询时间

    $QueryPings[$id] = null;
    $InfoPings[$id] = false;

    try {
        $QueryPings[$id] = new MinecraftPing($hosts[$id], $ports[$id], 1); // Ping类，用于存储获取的服务器信息
    
        $InfoPings[$id] = $QueryPings[$id]->Query();
    
        if ($InfoPings[$id] === false) {
            $QueryPings[$id]->Close();
            $QueryPings[$id]->Connect();
    
            $InfoPings[$id] = $QueryPings[$id]->QueryOldPre17();
        }
    } catch(MinecraftPingException $e) {
        $Exception = $e;
    }
    
    if ($QueryPings[$id] !== null) {
        $QueryPings[$id]->Close();
    }

    $Timer = Number_Format(MicroTime(true) - $Timer, 4, '.', '');
    $Timers[$id] = $Timer;
}

?>
