
	<div id="right">
		<div id="content">
			<div class="title_2">后台用户管理</div>
			<div class="content">
				<div class="func">
					<a href="<?php echo base_url('/admin/admin_manager/add_v'); ?>">添加</a>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="5%">UID</td>
							<td width="30%">用户名</td>
							<td width="25%">使用者姓名</td>
							<td width="10%">操作</td>
						</tr>
						<?php foreach ($users as $user): ?>
						<tr>
							<td><?php echo $user['uid'];?></td>
							<td><?php echo $user['username'];?></td>
							<td><?php echo $user['name'];?></td>
							<td>
								<a href="<?php echo base_url('/admin/admin_manager/edit_v/?uid=' . $user['uid']); ?>">编辑</a>
								<a onclick="return del_alert()" href="<?php echo base_url('/admin/admin_manager/del/?uid=' . $user['uid']) ; ?>">删除</a>
							</td>
						</tr>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>