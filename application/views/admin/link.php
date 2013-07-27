
	<div id="right">
		<div id="content">
			<div class="title_2">友情链接</div>
			<div class="content">
				<div class="func">
					<a href="index.php?d=admin&c=link&m=add_v">添加</a>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="20%">链接名称</td>
							<td width="40%">URL</td>
							<td width="30%">描述</td>
							<td>操作</td>
						</tr>
						<?php foreach ($links as $link): ?>
						<tr>
							<td><?php echo $link['name'];?></td>
							<td><?php echo $link['url'];?></td>
							<td><?php echo $link['title'];?></td>
							<td>
								<a href="index.php?d=admin&c=link&m=edit_v&lid=<?php echo $link['lid']; ?>">编辑</a>
								<a onclick="return del_alert()" href="index.php?d=admin&c=link&m=del&lid=<?php echo $link['lid']; ?>">删除</a>
							</td>
						</tr>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>