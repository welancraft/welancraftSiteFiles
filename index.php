<?php

/**
 * welancraft.top我的世界服务器网页文件-主界面
 * @author royenheart
 */

/* 数据获取 */
include_once __DIR__ . '/databaseLink.php';

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
    <!-- 获取服务器信息并输出 -->
    <?php $exitence = count($hosts); // 获取服务器个数 ?>
    <?php include __DIR__ . '/serverDataDisplay/data.php'; // 服务器信息获取 ?>
    <?php for ($id = 1; $id <= $exitence; $id++) : ?>
        <hr>
        <p>状态：<font color="#2a6c0f"><?php echo $statuses[$id]; ?></font>
        </p>
        <p>IP 或域名：<font color="#2a6c0f"><?php echo $hosts[$id]; ?></font>
            <br>主机 IP：<font color="#2a6c0f"><?php echo $hostips[$id]; ?></font>
            <br>端口：<font color="#2a6c0f"><?php echo $ports[$id]; ?></font>
        </p>
        <p>MOTD：<font color="#2a6c0f"><?php echo $motds[$id]; ?></font>
            <br>清除颜色参数后的 MOTD：<font color="#2a6c0f"><?php echo $clean_motds[$id]; ?></font>
            <br>颜色参数转为 HTML 的 MOTD：<font color="#2a6c0f"><?php echo $html_motds[$id]; ?></font>
        </p>
        <p>平台：<font color="#2a6c0f"><?php echo $platforms[$id]; ?></font>
            <br>游戏类型：<font color="#2a6c0f"><?php echo $gametypes[$id]; ?></font>
        </p>
        <p>兼容游戏版本：<font color="#2a6c0f"><?php echo $versions[$id]; ?></font>
            <br>服务器使用的软件或核心：<font color="#2a6c0f"><?php echo $softwares[$id]; ?></font>
        </p>
        <p>可容纳最大玩家数：<font color="#2a6c0f"><?php echo $players_maxs[$id]; ?></font>
            <br>在线玩家数：<font color="#2a6c0f"><?php echo $players_onlines[$id]; ?></font>
        </p>
        <p>使用的查询方式：<font color="#2a6c0f"><?php echo $agreements[$id]; ?></font>
            <br>查询用时：<font color="#2a6c0f"><?php echo $processeds[$id]; ?></font>
        </p>
        <h3>目前在线玩家 <font color="#2a6c0f"><?php echo $players_onlines[$id]; ?></font>/<font color="#2a6c0f"><?php echo $players_maxs[$id]; ?></font>
        </h3>
        <?php if (is_array($PlayersList[$id])) : ?>
            <?php foreach ($PlayersList[$id] as $Player) : ?>
                <?php if ($platforms[$id] == "MINECRAFT") : ?>
                    <?php echo '<img src="https://cravatar.eu/helmhead/' . htmlspecialchars($Player) . '/15.png"> ' . htmlspecialchars($Player); ?><br>
                <?php else : ?>
                    <?php echo '<img src="https://cravatar.eu/helmhead/steve/15.png"> ' . htmlspecialchars($Player); ?><br>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            无玩家在线。
        <?php endif; ?>
        <hr>
    <?php endfor; ?>
</body>

</html>