
	<div id="right">
		<div id="content">
			<div class="title_2">项目管理</div>
			<div class="content">
				<div class="func">
					<a href="<?php echo base_url('/admin/project/add_v/'); ?>">添加</a>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="5%">排序</td>
							<td width="60">项目名称</td>
							<td width="23%">图片预览</td>
							<td width="12%">操作</td>
						</tr>
						<?php foreach ($projects as $project): ?>
						<tr>
							<td><?php echo $project['index'];?></td>
							<td><?php echo $project['name'];?></td>
							<td><img src="<?php echo base_url($project['photo']);?>" title="<?php echo $project['name'];?>" width="147" height="101" /></td>
							<td>
								<a href="<?php echo base_url('/project/?id=' . $project['id']); ?>" target="_blank">查看</a>
								<a href="<?php echo base_url('/admin/project/edit_v/?id=' . $project['id']); ?>">编辑</a>
								<a onclick="return del_alert()" href="<?php echo base_url('/admin/project/del/?id=' . $project['id']) ; ?>">删除</a>
							</td>
						</tr>
						<?php endforeach;?>
					</table>
					<div class="page">
						<?php echo $page_html; ?>

					</div>
				</div>
			</div>
		</div>
	</div>