<div id="myposition" class="box"><p><a href="#">首页</a>&nbsp&gt&nbsp<a href="#">金牌讲师</a>&nbsp&gt&nbsp杨帆</p></div>
<div class="box">
	<div id="teacher_detail">
			<div class="title_1">
				<a class="f_l" href="<?php echo base_url('/teacher/list');?>"><p>金牌讲师</p></a>
				<div class="clear"></div>
			</div>
		<div class="teacher_list">
			<ul>
				<?php for($i=1; $i<=20; $i++):?>
				<li <?php // if(($i-1)%5==0) echo 'style="padding-left:31px;"'; if(($i-1)%5==4) echo 'style="padding-right:21px;"';?>>
					<a href="#"><img src="<?php echo base_url('static/common/img/杨帆.png')?>" width="102" height="132" /></a>
					<div>
						<a href="#"><p class="t_center">杨帆</p></a>
						<p class="teacher_remark">中国高企委特聘专家</p>
					</div>
				</li>
				<?php endfor ?>
				<div class="clear"></div>
			</ul>
		</div>
	</div>