<div class="box">
    <div id="search">
       	<form action="" method="get">
            <div id="keyword">
                <table width="710" border="0" align="center" cellspacing="0">
                    <tr>
                        <td width="130" style="font-size: 14px;"><b>关键字搜索：</b></td>
                    	<td width="351"><input name="keyword" type="text" value="<?php echo $keyword; ?>" size="50" style="font-size: 14px; border: 1px solid #A6B4FF; padding: 4px;" /></td>
                    	<td width="78"><input type="submit" value="搜索" style="font-size: 14px; border: 1px solid #A6B4FF; height:26px; width: 60px;" /></td>
                	</tr>
            	</table>
        	</div>
        </form>
    </div>
    <div id="space"></div>
    <div class="search" id="s_content">
        <table width="960" border="0" align="center" cellspacing="0">
            <tr class="lefttd">
                <td width="115">分类</td>
                <td width="694">标题</td>
                <td width="145">时间</td>
            </tr>
            <?php foreach($articles as $row): ?>
            <tr>
           		<td><a href="<?php echo base_url('article/type/?type=' . $row['type']); ?>" target="_blank"><?php echo $row['type_name']; ?></a></td>
            	<td><a href="<?php echo base_url('article/?aid=' . $row['aid']); ?>" target="_blank"><?php echo str_replace($keyword, '<font color="red">' . $keyword . '</font>', $row['title']); ?></a></td>
            	<td><?php echo $row['add_date']; ?></td>
            </tr>
			<?php endforeach; ?>
		</table>
        <div id="page">
        	<?php echo $page_html; ?>
        </div>
	</div>
</div>