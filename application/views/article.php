<div id="myposition" class="box"><p><a href="<?php echo base_url();?>">首页</a>&nbsp>&nbsp<a href="<?php echo base_url('/article/type');?>">文章列表</a>&nbsp>&nbsp文章标题</p></div>
<div class="box">
	<div id="teacher_detail">
		<div id="content_right" class="article_border">
	        <div>
	        	<p class="news_title"><?php echo $article['title']; ?></p>
	            <p class="news_time">发布时间：<?php echo $article['add_date']; ?></p>
	            <div class="news_main">
	                <?php echo $article['content']; ?>
	            </div>
	        </div>
	    </div>
	</div>