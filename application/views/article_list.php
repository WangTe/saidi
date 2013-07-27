<div id="myposition" class="box"><p><a href="<?php echo base_url();?>">首页</a>&nbsp>&nbsp<a href="<?php echo base_url('/article/type');?>">讲师动态</a><!-- &nbsp>&nbsp文章标题 --></p></div>
<div class="box">
	<div id="teacher_detail">
		<div class="title_1">
			<a class="f_l" href="<?php echo base_url('/teacher/list');?>"><p>讲师动态</p></a>
			<div class="clear"></div>
		</div>
		<div id="content_right" class="list_content_right">
	        <div>
	            <table width="630" border="0" align="center" cellpadding="0" cellspacing="0">
	            	<?php foreach ($news as $row): ?>
	                <tr>
	                    <td><p><a href="<?php echo base_url('article/?aid=' . $row['aid']); ?>"><?php echo $row['title'];?></a></p></td>
	                    <td width="80" align="center"><?php echo $row['add_date']; ?></td>
	                </tr>
	                <?php endforeach; ?>
	            </table>
	        </div>
	        <!-- <div id="page">
	        	<?php echo $page_html; ?>
	        </div> -->
	    </div>
	</div>