
	<div id="right">
		<div id="content">
			<div class="title_2">前台用户编辑</div>
			<div class="content">
				<div>
				<div><?php echo $info; ?></div>
					<?php echo form_open($form_url);?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr class="title_3">
								<td colspan="2">编辑用户</td>
							</tr>
							<tr>
								<td width="12%">用户邮箱</td>
								<td><?php echo $user['email'];?><input name="email" type="hidden" value="<?php echo $user['email'];?>" /></td>
								
							</tr>
							<tr>
								<td>用户密码</td>
								<td><input name="pw" type="password"  size="20" /></td>
							</tr>
							<tr>
								<td>确认密码</td>
								<td><input name="pw2" type="password"  size="20" /></td>
							</tr>

						</table>
						<div class="button"><button type="submit">提交</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>