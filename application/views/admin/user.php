
	<div id="right">
		<div id="content">
			<div class="title_2">前台用户管理</div>
			<div class="content">
				<div>
					<form action="<?php echo base_url('admin/user/'); ?>" method="post">
						<table width="100%" border="0" align="center" cellspacing="6">
							<tr class="title_3">
								<td width="6%" colspan="2"><b>搜索用户</b></td>
							</tr>
							<tr>
								<td width="10%">用户邮箱：</td>
								<td>
								<input type="text" name="email" />
								</td>
							</tr>

							<tr>
								<td></td>
								<td><input type="submit" value="搜索" style="font-size: 14px; border: 1px solid #A6B4FF; height:26px; width: 60px;" /></td>
							</tr>
						</table>
					</form>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="10%">用户ID</td>
							<td width="20%">用户邮箱</td>
							<td width="20%">真实姓名</td>
							<td width="20%">手机</td>
							<td>操作</td>
						</tr>
						<?php foreach ($users as $user): ?>
						<tr>
							<td><?php echo $user['user_id'];?></td>
							<td><?php echo $user['email'];?></td>
							<td><?php echo isset($user['fields']['real_name']) ? $user['fields']['real_name'] :$user['email'];?></td>
							<td><?php echo $user['phone'];?></td>
							<td>
								<a href="<?php echo base_url('/admin/user/edit_v/?user_id=' . $user['user_id']); ?>">编辑用户</a>
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