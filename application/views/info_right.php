<div class="secondweb_right">
	<div class="right_item">
		<div class="title_1">
			<a class="f_l" href="<?php echo base_url('/courses/list'); ?>"><p>主打课程<span>&nbspLeading Courses</span></p></a>
			<a class="f_r" href="<?php echo base_url('/courses/list'); ?>"><p class="more">更多 &gt;</p></a>
			<div class="clear"></div>
		</div>
		<ul style="margin-top:10px;margin-bottom:10px;">
			<?php foreach($courses as $c): ?>		
			<li><a href="<?php echo base_url('/courses/?id=' . $c['id']); ?>"><?php echo $c['name']?></a></li>
			<?php endforeach;?>
			<!-- 
			<li><a href="#">班组建设与班组长管理能力提升</a></li>
			<li><a href="#">基于阳光心态的企业归属和团队信任再造</a></li>
			<li><a href="#">客户经理的沟通与谈判技巧</a></li>
			<li><a href="#">深度管理沟通大纲</a></li>
			<li><a href="#">团队情绪与压力管理</a></li>
			<li><a href="#">销售团队的激励与管理</a></li>
			<li><a href="#">班组建设与班组长管理能力提升</a></li>
			 -->
		</ul>
	</div>
	<div class="right_item">
		<div class="title_1">
			<a class="f_l" href="<?php echo base_url('/article/list'); ?>"><p>讲师动态<span>&nbspLatest Dynamic</span></p></a>
			<a class="f_r" href="<?php echo base_url('/article/list'); ?>"><p class="more">更多 &gt;</p></a>
			<div class="clear"></div>
		</div>
		<ul style="margin-top:10px;margin-bottom:15px;">
			<?php foreach($news as $a): ?>				
			<li><a href="<?php echo base_url('/article/?aid=' . $a['aid']); ?>"><?php echo $a['title']?></a></li>
			<?php endforeach;?>
			<!-- 			
			<li><a href="#">《管理者素质能力提升与卓越团队建设》</a></li>
			<li><a href="#">《管理者卓越领导力》</a></li>
			<li><a href="#">《企业应变策略与管理模式升级》</a></li>
			<li><a href="#">《企业卓越执行力塑造》</a></li>
			<li><a href="#">《金牌员工职业化》</a></li>
			<li><a href="#">《顾问式销售》</a></li>
			<li><a href="#">《深度管理沟通》</a></li>
			<li><a href="#">《管理者角色认知与心智改善》</a></li>
			 -->			
		</ul>
	</div>
	<div class="right_item">
		<div class="title_1">
			<a class="f_l" href="<?php echo base_url('/project/list'); ?>"><p>咨询项目<span>&nbspTeaching Video</span></p></a>
			<a class="f_r" href="<?php echo base_url('/project/list'); ?>"><p class="more">更多 &gt;</p></a>
			<div class="clear"></div>
		</div>
		<ul style="margin-top:10px;margin-bottom:15px;">
			<?php foreach($projects as $p): ?>						
			<li><a href="<?php echo base_url('/project/?id=' . $p['id']); ?>"><?php echo $p['name']?></a></li>
			<?php endforeach;?>						
		</ul>
	</div>
</div>
<div class="clear">
</div>
</div>