<?php

/**
 * 获取服务器信息
 */

?>

<!-- 加载css文件 -->

<link rel="stylesheet" href="../assets/css/articlePage101.css" />

<!-- 加载js文件 -->

<script type="text/javascript" src="../assets/js/articlePage101.js"></script>

<!-- 正文 获取服务器信息并输出 -->

<!-- 由GamerNoTitle的模板修改而来，数据获取修改自MCNewsTools -->

<div id=articlePage101>
<?php $exitence = count($hosts); // 获取服务器个数 ?>
<?php include dirname(dirname(__FILE__)) . '/serverDataDisplay/data.php'; ?>
    <h3>目前公开的服务器共有<label class=content><?php echo $exitence; ?></label>个</h3>
<?php for ($id = 1; $id <= $exitence; $id++) : ?>
    <hr>
    <h4>服务器地址：<label class=content><?php echo $names[$id]; ?></label></h4>
    <p>服务器状态：<label class=content><?php echo $statuses[$id]; ?></label></p>
    <p>服主：<label class=content><?php echo $owners[$id]; ?></label></p>
    <p>原始服务器地址：<label class=content><?php echo $hosts[$id].":"."$ports[$id]"; ?></label></p>
    <p>平台：<label class=content><?php echo $platforms[$id]; ?></label></p>
    <p>游戏类型：<label class=content><?php echo $gametypes[$id]; ?></label></p>
    <p>可容纳最大玩家数：<label class=content><?php echo $players_maxs[$id]; ?></label></p>
    <h4>目前在线玩家 <label class=content><?php echo $players_onlines[$id]; ?></label>/<label class=content><?php echo $players_maxs[$id]; ?></label></h4>
    <?php if (is_array($PlayersList[$id])) : ?>
        <?php foreach ($PlayersList[$id] as $Player) : ?>
            <?php if ($platforms[$id] == "MINECRAFT") : ?>
                <?php echo '<p><img src="https://cravatar.eu/helmhead/' . htmlspecialchars($Player) . '/15.png"> ' . htmlspecialchars($Player) . '</p>'; ?><br>
            <?php else : ?>
                <?php echo '<p><img src="https://cravatar.eu/helmhead/steve/15.png"> ' . htmlspecialchars($Player) . '</p>'; ?><br>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else : ?>
        <?php if ($InfoPings[$id] !== false && $players_onlines[$id] !== 0) : ?>
            <p>使用 Ping 查询无法取得具体玩家数据</p>
        <?php else : ?>
            <p>无玩家在线</p>       
        <?php endif; ?>
    <?php endif; ?>
<?php endfor; ?>
</div>