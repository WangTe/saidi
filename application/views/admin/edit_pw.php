
	<div id="right">
		<div id="content">
			<div class="content">
				<div class="login_error"><?php echo (isset($error)) ? $error : '';?></div>				
				<div>
					<?php echo form_open_multipart($form_url); ?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr class="title_3">
								<td colspan="2">修改密码</td>
							</tr>
							<tr>
								<td>密码</td>
								<td><input name="password" type="password" value="" size="30" /></td>
							</tr>
							<tr>
								<td>重复密码</td>
								<td width="91%"><input name="password2" type="password" value="" size="30" /></td>
							</tr>
						</table>
						<div class="button"><button type="submit">提交</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>
					