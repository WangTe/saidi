
	<div id="right">
		<div id="content">
			<div class="title_2">关于我们</div>
			<div class="content">
				<div class="func">
					<a href="<?php echo base_url('/admin/about/add_v'); ?>">添加</a>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="20%">类别名称</td>
							<td width="80%">操作</td>
						</tr>
						<?php foreach ($abouts as $about): ?>
						<tr>
							<td><?php echo $about['type'];?></td>
							<td>
								<a href="<?php echo base_url('about/?aid=' . $about['aid']); ?>" target="_blank">查看</a>
								<a href="<?php echo base_url('/admin/about/edit_v/?aid=' . $about['aid']); ?>">编辑</a>
								<a onclick="return del_alert()" href="<?php echo base_url('/admin/about/del/?aid=' . $about['aid']); ?>">删除</a>
							</td>
						</tr>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>