<div id="myposition" class="box"><p><a href="<?php echo base_url();?>">首页</a>&nbsp>&nbsp<a href="<?php echo base_url('/teacher/list');?>">金牌讲师</a>&nbsp>&nbsp<?php echo $teacher['name']?></p></div>
<div class="box">
	<div id="teacher_detail">
		<div class="teacher_pic">
			<img src="<?php echo base_url($teacher['photo']);?>" width="170" height="200" />
			<div class="f_l">
				<p class="teacher_name_detail"><?php  echo $teacher['name'];?>&nbsp&nbsp<span><?php  echo $teacher['position'];?></span></p>
				<p class="teacher_qualification">职业资质:</p>
				<h1 style color:#000;font-size:14px;font-weight:bold;margin-top:15px>
					<?php echo nl2br($teacher['quality']); ?>
				</h1>		
			</div>
			<div class="clear"></div>
		</div>
		<div class="intro">
			<div class="title_4">
				<p><?php echo $teacher['name']; ?>简介</p>
			</div>
			<div class="content_main">
				<?php echo $teacher['intro']; ?>
			</div>
		</div> 
	</div>