
	<div id="right">
		<div id="content">
			<div class="title_2">编辑后台用户</div>
			<div class="content">
				<div class="login_error"><?php echo (isset($error)) ? $error : '';?></div>				
				<div>
					<?php echo form_open_multipart($form_url); ?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr class="title_3">
								<td colspan="2">编辑</td>
							</tr>
							<tr>
								<td width="9%">用户名</td>
								<td><input <?php echo (isset($action) && $action == 'edit') ? 'disabled' : ''; ?> name="username" type="text" value="<?php echo $username;?>" size="30" /></td>
							</tr>
							<tr>
								<td>密码</td>
								<td><input name="password" type="password" value="" size="30" /></td>
							</tr>
							<tr>
								<td>重复密码</td>
								<td width="91%"><input name="password2" type="password" value="" size="30" /></td>
							</tr>
							<tr>
								<td>所属店铺</td>
								<td>
									<select name="power">  
										<option value="0" <?php echo 0 == $power ? 'selected':'' ;?>>全部店铺</option>
										<?php foreach ($shops as $shop):?>
										<option value="<?php echo $shop['shop_id'];?>" <?php echo $shop['shop_id'] == $power ? 'selected':'' ;?>><?php echo $shop['shop_name'];?></option> 
										<?php endforeach;?>
									</select>
								</td>
							</tr>
							<tr>
								<td>使用者</td>
								<td><input name="name" type="text" value="<?php echo $name;?>" size="30" /></td>
							</tr>
						</table>
						<div class="button"><button type="submit">提交</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>
					