
	<div id="right">
		<div id="content">
			<div class="title_2">关于我们</div>
			<div class="content">
				<div>
					<?php echo form_open($form_url); ?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr class="title_3">
								<td colspan="2">编辑关于</td>
							</tr>
							<tr>
								<td width="9%">名称</td>
								<td><input name="type" type="text" value="<?php echo $type;?>" size="80" /></td>
							</tr>
							<tr>
								<td>标题</td>
								<td><input name="title" type="text" value="<?php echo $title;?>" size="80" /></td>
							</tr>
							<tr>
								<td>内容</td>
								<td width="91%"><script type="text/plain" id="ue_content" name="ue_content"><?php echo $content;?></script></td>
							</tr>
						</table>
						<div class="button"><button type="submit">提交</button></div>
					</form>
					<script type=text/javascript src="<?php echo base_url('static/ueditor/editor_config.js'); ?>"></script>
					<script type=text/javascript src="<?php echo base_url('static/ueditor/editor_all_min.js'); ?>"></script>
					<script type="text/javascript">
			    		var ue = new UE.ui.Editor();
					    $(function() {
							ue.render('ue_content');
							if(0){//navigator.userAgent.indexOf("Firefox") != -1) {
						    	setTimeout(function() {
										var ue_iframe = document.getElementById('baidu_editor_0').contentWindow.document;
										ue_iframe.designMode="off";
										ue_iframe.execCommand('enableObjectResizing', false, 'false');
									}
									,1500
						    	);
							}
					    })
					</script>
				</div>
			</div>
		</div>
	</div>
					