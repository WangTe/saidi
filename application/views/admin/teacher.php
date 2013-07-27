
	<div id="right">
		<div id="content">
			<div class="title_2">讲师管理</div>
			<div class="content">
				<div class="func">
					<a href="<?php echo base_url('/admin/teacher/add_v/'); ?>">添加</a>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="5%">排序</td>
							<td width="7%">姓名</td>
							<td width="16%">图片预览</td>
							<td width="15%">现任职位</td>
							<td width="36%">职业资质</td>
							<td width="12%">操作</td>
						</tr>
						<?php foreach ($teachers as $teacher): ?>
						<tr>
							<td><?php echo $teacher['index'];?></td>
							<td><?php echo $teacher['name'];?></td>
							<td><img src="<?php echo base_url($teacher['photo']);?>" title="<?php echo $teacher['name'];?>" width="102" height="132" /></td>
							<td><?php echo $teacher['position'];?></td>
							<td><?php echo $teacher['quality'];?></td>
							
							<td>
								<a href="<?php echo base_url('/teacher/?id=' . $teacher['id']); ?>" target="_blank">查看</a>
								<a href="<?php echo base_url('/admin/teacher/edit_v/?id=' . $teacher['id']); ?>">编辑</a>
								<a onclick="return del_alert()" href="<?php echo base_url('/admin/teacher/del/?id=' . $teacher['id']) ; ?>">删除</a>
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