
	<div id="right">
		<div id="content">
			<div class="title_2">首页图片管理</div>
			<div class="content">
				<div class="func">
					<a href="<?php echo base_url('/admin/index_img/add_v/?type=' . $type); ?>">添加</a>
				</div>
				<div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="title_3">
							<td width="5%">排序</td>
							<td width="30%">图片预览</td>
							<td width="30%">链接地址</td>
							<td width="25%">标题</td>
							<td width="10%">操作</td>
						</tr>
						<?php foreach ($imgs as $img): ?>
						<tr>
							<td><?php echo $img['order'];?></td>
							<td><img src="<?php echo base_url($img['path']);?>" title="<?php echo $img['path'];?>" width="220" height="100" /></td>
							<td><?php echo $img['url'];?></td>
							<td><?php echo $img['title'];?></td>
							<td>
								<a href="<?php echo base_url('/admin/index_img/edit_v/?id=' . $img['id']); ?>">编辑</a>
								<a onclick="return del_alert()" href="<?php echo base_url('/admin/index_img/del/?type=1&id=' . $img['id']) ; ?>">删除</a>
							</td>
						</tr>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>