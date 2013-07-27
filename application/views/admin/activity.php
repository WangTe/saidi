
	<div id="right">
		<div id="content">
			<div class="title_2">公益管理</div>
			<div class="content">
				<div class="func">
					<a href="<?php echo base_url('/admin/activity/add_v/'); ?>">添加</a>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="5%">排序</td>
							<td width="60">公益名称</td>
							<td width="23%">图片预览</td>
							<td width="12%">操作</td>
						</tr>
						<?php foreach ($activities as $activity): ?>
						<tr>
							<td><?php echo $activity['index'];?></td>
							<td><?php echo $activity['name'];?></td>
							<td><img src="<?php echo base_url($activity['photo']);?>" title="<?php echo $activity['name'];?>" width="147" height="101" /></td>
							<td>
								<a href="<?php echo base_url('/activity/?id=' . $activity['id']); ?>" target="_blank">查看</a>
								<a href="<?php echo base_url('/admin/activity/edit_v/?id=' . $activity['id']); ?>">编辑</a>
								<a onclick="return del_alert()" href="<?php echo base_url('/admin/activity/del/?id=' . $activity['id']) ; ?>">删除</a>
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