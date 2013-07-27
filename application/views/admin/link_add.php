
	<div id="right">
		<div id="content">
			<div class="title_2">友情链接</div>
			<div class="content">
				<div>
					<?php echo form_open($form_url); ?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr class="title_3">
								<td colspan="2">编辑友情链接</td>
							</tr>
							<tr>
								<td width="9%">名称</td>
								<td><input name="name" type="text" value="<?php echo $name;?>" size="80" /></td>
							</tr>
							<tr>
								<td>URL</td>
								<td><input name="url" type="text" value="<?php echo $url;?>" size="80" /></td>
							</tr>
							<tr>
								<td>描述</td>
								<td width="91%"><input name="title" type="text" value="<?php echo $title;?>" size="80" /></td>
							</tr>
						</table>
						<div class="button"><button type="submit">提交</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>
					