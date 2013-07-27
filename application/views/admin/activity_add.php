
	<div id="right">
		<div id="content">
			<div class="title_2">添加公益活动</div>
			<div class="content">
				<div>
					<?php echo form_open_multipart($form_url); ?>
						<table width="100%" bindex="0" cellpadding="0" cellspacing="0">
							<tr class="title_3">
								<td colspan="2">编辑</td>
							</tr>
							<tr>
								<td width="9%">排序</td>
								<td><input name="index" type="text" value="<?php echo $index;?>" size="10" /></td>
							</tr>
							<tr>
								<td>公益名称</td>
								<td><input name="name" type="text" value="<?php echo $name;?>" size="80" /></td>
							</tr>
							<tr>
								<td>公益图片</td>
								<td><input name="upfile" type="file" value="" size="80" /></td>
							</tr>
							<tr>
								<td>公益简介</td>
								<td><script type="text/plain" id="ue_content" name="ue_content"><?php echo $content;?></script></td>
							</tr>
						</table>
						<div class="button"><button type="submit">提交</button></div>
					</form>
					<script type=text/javascript src="<?php echo base_url('/static/ueditor1_2_6_1/ueditor.config.js'); ?>"></script>
					<script type=text/javascript src="<?php echo base_url('/static/ueditor1_2_6_1/ueditor.all.min.js'); ?>"></script>
					<script type=text/javascript src="<?php echo base_url('/static/ueditor1_2_6_1/lang/zh-cn/zh-cn.js'); ?>"></script>
					<script type="text/javascript">
						var ue = UE.getEditor('ue_content');
					</script>
				</div>
			</div>
		</div>
	</div>
					