<div id="myposition" class="box"><p><a href="#">首页</a>&nbsp&gt&nbsp<a href="#">主打课程</a></p></div>
<div class="box">
	<div id="teacher_detail">
		<div class="course_list">
			<ul>
				<?php $i = 0;?>
				<?php foreach ($courses as $c):?>
				<li <?php if($i/4%2==1) echo 'class="bg_249"'; ?>>
					<a title="<?php  echo $c['name'];?>" href="<?php echo base_url('/courses/?id=' . $c['id']); ?>"><img src="<?php echo base_url($c['photo']); ?>" width="147" height="101" /></a>
					<a title="<?php  echo $c['name'];?>" href="<?php echo base_url('/courses/?id=' . $c['id']); ?>"><p class="t_center"><?php  echo $c['name'];?></p></a>
					<p class="course_remark"><span></span>&nbsp主讲人：<a href="#"><?php  echo $c['professor'];?></a></p><!-- 主讲人-链接？ -->
				</li>
				<?php $i++;?>
				<?php endforeach ?>
				<div class="clear"></div>
			</ul>
		</div>
	</div>