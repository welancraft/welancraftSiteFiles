<?php
/*
 * 张文相 Zhang Wenxiang - 个人 Blog
 * https://blog.reh.tw/
 *
 * 范例教学
 * https://blog.reh.tw/webpage-display-minecraft-server-status/
 */

/**
 * @二次修改 RoyenHeart
 */

require_once __DIR__.'/data/query.php';
require_once __DIR__.'/data/ping.php';

require_once __DIR__.'/closeTags.php';

for ($id = 1;$id <= $exitence;$id++) {
    if (($Info = $Querys[$id]->GetInfo()) !== false) { //Info获取Query信息，判断 Query 是否查询的到
        //转换服务器 MOTD 颜色参数为 HTML
        $hostNameHtmls[$id] = str_replace("§k", "", $Info['HostName']);
        $hostNameHtmls[$id] = str_replace("§l", "", $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§m", "", $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§n", "", $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§o", "", $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§r", '<font color="#">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§0", '<font color="#000000">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§1", '<font color="#0000AA">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§2", '<font color="#00AA00">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§3", '<font color="#00AAAA">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§4", '<font color="#AA0000">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§5", '<font color="#AA00AA">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§6", '<font color="#FFAA00">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§7", '<font color="#AAAAAA">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§8", '<font color="#555555">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§9", '<font color="#5555FF">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§a", '<font color="#55FF55">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§b", '<font color="#55FFFF">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§c", '<font color="#FF5555">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§d", '<font color="#FF55FF">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§e", '<font color="#FFFF55">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§f", '<font color="#FFFFFF">', $hostNameHtmls[$id]);

        $cleanHostNames[$id] = str_replace(array("§k", "§l", "§m", "§n", "§o", "§r", "§0", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f"), "", $Info['HostName']); // 清除服务器 MOTD 颜色参数

        $statuses[$id] = "在线"; // 服务器状态
        $platforms[$id] = $Info['GameName']; // 服务器平台 (MINECRAFT or MINECRAFTPE)
        $gametypes[$id] = $Info['GameType']; // 游戏类型

        $motds[$id] = $Info['HostName']; // 服务器 MOTD
        $clean_motds[$id] = $cleanHostNames[$id]; // 清除颜色参数后的服务器 MOTD
        //$html_motds[$id] = closeTags($hostNameHtmls[$id]); // 颜色参数转为 HTML 的服务器 MOTD

        $hosts[$id] = $hosts[$id]; // 服务器 IP 或域名
        $hostips[$id] = $Info['HostIp']; // 服务器 IP
        $ports[$id] = $Info['HostPort']; // 服务器端口

        $players_maxs[$id] = $Info['MaxPlayers']; // 服务器可容纳最大玩家数
        $players_onlines[$id] = $Info['Players']; // 服务器在线玩家数

        $versions[$id] = $Info['Version']; // 服务器兼容游戏版本
        $softwares[$id] = $Info['Software']; // 服务器使用的软件或核心

        $agreements[$id] = "Query"; // 使用的查询协议
        $processeds[$id] = $Timers[$id]; // 查询耗时

        $PlayersList[$id] = $Querys[$id]->GetPlayers(); // 取得在线玩家列表
        $PluginsList[$id] = $Info['Plugins']; // 取得插件列表
    } else if ($InfoPings[$id] !== false) { // 判断 Ping 是否查询的到
        //转换服务器 MOTD 颜色参数为 HTML
        $hostNameHtmls[$id] = str_replace("§k", "", $InfoPings[$id]['description']);
        $hostNameHtmls[$id] = str_replace("§l", "", $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§m", "", $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§n", "", $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§o", "", $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§r", '<font color="#">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§0", '<font color="#000000">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§1", '<font color="#0000AA">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§2", '<font color="#00AA00">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§3", '<font color="#00AAAA">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§4", '<font color="#AA0000">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§5", '<font color="#AA00AA">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§6", '<font color="#FFAA00">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§7", '<font color="#AAAAAA">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§8", '<font color="#555555">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§9", '<font color="#5555FF">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§a", '<font color="#55FF55">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§b", '<font color="#55FFFF">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§c", '<font color="#FF5555">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§d", '<font color="#FF55FF">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§e", '<font color="#FFFF55">', $hostNameHtmls[$id]);
        $hostNameHtmls[$id] = str_replace("§f", '<font color="#FFFFFF">', $hostNameHtmls[$id]);

        $cleanHostNames[$id] = str_replace(array("§k", "§l", "§m", "§n", "§o", "§r", "§0", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f"), "", $InfoPings[$id]['description']); // 清除服务器 MOTD 颜色参数

        $statuses[$id] = "在线"; // 服务器状态
        $platforms[$id] = "使用 Ping 查询无法取得数据"; // 服务器平台 (MINECRAFT or MINECRAFTPE)
        $gametypes[$id] = "使用 Ping 查询无法取得数据"; // 游戏类型

        $motds[$id] = $InfoPings[$id]['description']; // 服务器 MOTD
        $clean_motds[$id] = $cleanHostNames[$id]; // 清除颜色参数后的服务器 MOTD
        //$html_motds[$id] = closeTags($hostNameHtmls[$id]); // 颜色参数转为 HTML 的服务器 MOTD

        $hosts[$id] = $hosts[$id]; // 服务器 IP 或域名
        $hostips[$id] = "使用 Ping 查询无法取得数据"; // 服务器主机 IP
        $ports[$id] = $ports[$id]; // 服务器端口

        $players_maxs[$id] = $InfoPings[$id]['players']['max']; // 服务器可容纳最大玩家数
        $players_onlines[$id] = $InfoPings[$id]['players']['online']; // 服务器在线玩家数

        $versions[$id] = explode(" ", $InfoPings[$id]['version']['name'], 2);
        $versions[$id] = $versions[$id][1]; // 服务器兼容游戏版本

        $softwares[$id] = "使用 Ping 查询无法取得数据"; // 服务器使用的软件或核心

        $agreements[$id] = "Ping"; // 使用的查询协议
        $processeds[$id] = $Timers[$id]; // 查询耗时
    } else { // 服务器离线
        $statuses[$id] = "离线"; // 服务器状态
        $hosts[$id] = $hosts[$id]; // 服务器 IP 或域名
        $ports[$id] = $ports[$id]; // 服务器端口
    }
}

?>