
	<div id="right">
		<div id="content">
			<div class="title_2">类别管理</div>
			<div class="content">
				<div>
					<?php echo form_open($form_url);?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr class="title_3">
								<td colspan="2">添加类别</td>
							</tr>
							<tr>
								<td width="12%">父节点</td>
								<td width="88%">
									<select name="pid">
										<option value="0">无父节点</option>
										<?php foreach ($types as $type): ?>
										<?php if($type['level'] < 3): ?>
										<option <?php if($pid == $type['tid']) echo 'selected="selected"';?> value="<?php echo $type['tid'];?>"><?php if($type['level'] == 2) echo '|--';?><?php echo $type['name']?></option>
										<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>类别名称</td>
								<td><input size="30" type="text" name="name" value="<?php echo $name;?>" /></td>
							</tr>
						</table>
						<div class="button"><button type="submit">提交</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>