<?php

/**
 * 获取服务器信息
 * @author RoyenHeart
 */

?>

<!-- 加载css文件 -->

<link rel="stylesheet" href="../assets/css/articlePage101.css" />

<!-- 获取服务器信息并输出 -->

<div id=articlePage101>
<?php $exitence = count($hosts); // 获取服务器个数 ?>
<?php include dirname(dirname(__FILE__)) . '/serverDataDisplay/data.php'; ?>
    <hr>
    <h3>目前welancraft下公开的服务器共有<font class=content><?php echo $exitence; ?></font>个</h3>
<?php for ($id = 1; $id <= $exitence; $id++) : ?>
    <hr>
    <h4>服务器地址：<font class=content><?php echo $names[$id]; ?></font></h4>
    <p>服务器状态：<font class=content><?php echo $statuses[$id]; ?></font></p>
    <p>服主：<font class=content><?php echo $owners[$id]; ?></font></p>
    <p>原始服务器地址：<font class=content><?php echo $hosts[$id].":"."$ports[$id]"; ?></font></p>
    <p>平台：<font class=content><?php echo $platforms[$id]; ?></font></p>
    <p>游戏类型：<font class=content><?php echo $gametypes[$id]; ?></font></p>
    <p>兼容游戏版本：<font class=content><?php echo $versions[$id]; ?></font></p>
    <p>服务器使用的软件或核心：<font class=content><?php echo $softwares[$id]; ?></font></p>
    <p>可容纳最大玩家数：<font class=content><?php echo $players_maxs[$id]; ?></font></p>
    <p>在线玩家数：<font class=content><?php echo $players_onlines[$id]; ?></font></p>
    <h4>目前在线玩家 <font class=content><?php echo $players_onlines[$id]; ?></font>/<font class=content><?php echo $players_maxs[$id]; ?></font></h4>
    <?php if (is_array($PlayersList[$id])) : ?>
        <?php foreach ($PlayersList[$id] as $Player) : ?>
            <?php if ($platforms[$id] == "MINECRAFT") : ?>
                <?php echo '<p><img src="https://cravatar.eu/helmhead/' . htmlspecialchars($Player) . '/15.png"> ' . htmlspecialchars($Player) . '</p>'; ?><br>
            <?php else : ?>
                <?php echo '<p><img src="https://cravatar.eu/helmhead/steve/15.png"> ' . htmlspecialchars($Player) . '</p>'; ?><br>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else : ?>
        <?php if ($InfoPings[$id] !== false) : ?>
            <p>使用 Ping 查询无法取得具体玩家数据</p>
        <?php else : ?>
            <p>无玩家在线</p>       
        <?php endif; ?>
    <?php endif; ?>
    <hr>
<?php endfor; ?>
</div>