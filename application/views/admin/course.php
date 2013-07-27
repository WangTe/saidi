
	<div id="right">
		<div id="content">
			<div class="title_2">讲师管理</div>
			<div class="content">
				<div class="func">
					<a href="<?php echo base_url('/admin/course/add_v/'); ?>">添加</a>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="4%">排序</td>
							<td width="33%">课程名</td>
							<td width="8%">课程主讲</td>							
							<td width="8%">课程类型</td>
							<td width="17%">图片预览</td>
							<td width="11%">操作</td>
						</tr>
						<?php foreach ($courses as $course): ?>
						<tr>
							<td><?php echo $course['index'];?></td>
							<td><?php echo $course['name'];?></td>
							<td><?php echo $course['professor'];?></td>							
							<td><?php echo $course['type'];?></td>
							<td><img src="<?php echo base_url($course['photo']);?>" title="<?php echo $course['name'];?>" width="147" height="101" /></td>
							<td>
								<a href="<?php echo base_url('/course/?id=' . $course['id']); ?>" target="_blank">查看</a>
								<a href="<?php echo base_url('/admin/course/edit_v/?id=' . $course['id']); ?>">编辑</a>
								<a onclick="return del_alert()" href="<?php echo base_url('/admin/course/del/?id=' . $course['id']) ; ?>">删除</a>
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