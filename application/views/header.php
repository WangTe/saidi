<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="华智讯,华智讯培训,教育培训" />
<meta name="description" content="华智讯,华智讯培训,教育培训" />
<meta name="author" content="风格独特" />
<title>华智讯教育培训中心</title>
<link rel=stylesheet type="text/css" href="<?php echo base_url('static/common/css/index.css'); ?>" />
<link rel=stylesheet type="text/css" href="<?php echo base_url('static/common/css/dynamic.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url('static/common/js/jquery-1.8.0.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/common/js/main.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/common/js/navi.js'); ?>"></script>
</head>
<body>
<!-- <div id="header" class="box">
    <div id="logo">
    </div>
    <div id="header_right">
        <div>
        	<form action="<?php echo base_url('article/search/'); ?>" method="get">
            	<input class="searchword" name="keyword" type="text" maxlength="22" size="22" onfocus="if (this.value=='搜索...') this.value='';" onBlur="if (this.value=='') this.value='搜索...';" value="搜索..." />
            	<button class="search_submit" type="submit">搜索</button>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div> -->
<!-- <div>
	<div id="mainpic_index" class="box">
	    <div id="ad_change">
	        <div id="ad_img"> 
	        	<?php foreach ($ad_img as $row): ?><a href="<?php echo $row['url']; ?>"><img src="static/common/img/13541035064144.jpg" width="960" height="120" /></a><?php endforeach; ?>
	        </div>
	        <div class="img_num">
	            <div style="float:right">
	                <p class="img_numcheck">1</p>
	                <?php for($i = 2; $i <= $ad_img_num; ++$i):?>
	                <p><?php echo $i;?></p>
	                
	                <?php endfor; ?>
	            </div>
	        </div>
	    </div>
	</div>
</div> -->
<div id="header">
	<div class="box">
		<div id="logo">
			<a href="#"><img src="<?php echo base_url('static/common/img/logo.png'); ?>" /></a>
		</div>
	    <div id="header_right">
        	<form action="<?php echo base_url(''); ?>" method="get">
        		<!-- <select name="items" class="select_item">
	        		<option value="全部" selected="selected">全部</option>
					<option value="讲师">讲师</option>
					<option value="课程">课程</option>
					<option value="项目">项目</option>
				</select> -->
            	<input class="searchword" name="keyword" type="text" maxlength="22" size="22" onfocus="if (this.value=='搜索...') this.value='';" onBlur="if (this.value=='') this.value='搜索...';" value="搜索..." />
            	<button class="search_submit" type="submit">搜索</button>
            </form>
        </div>
		<div id="navi">
	        <ul>
	            <li><a href="<?php echo base_url('')?>">首页</a></li>
	            <li><a href="<?php echo base_url('')?>">讲师</a></li>
	            <li><a href="<?php echo base_url('')?>">课程</a></li>
	            <li><a href="<?php echo base_url('')?>">项目</a></li>
	            <li><a href="<?php echo base_url('')?>">动态</a></li>
	            <li><a href="<?php echo base_url('')?>">公益</a></li>
	            <li>
	            	<a href="<?php echo base_url('')?>">关于</a>
	                <div class="naviout">
	                    <a href="<?php echo base_url('')?>">公司简介</a>
	                    <a href="<?php echo base_url('')?>">荣誉资质</a>
	                    <a href="<?php echo base_url('')?>">组织机构</a>
	                    <a href="<?php echo base_url('')?>">联系我们</a>
	                </div>
	            </li>
	            <div class="clear"></div>
	        </ul>
	    </div>
	    <div class="clear"></div>
    </div>
</div>

<div class="mainpic_bg">
	<div id="mainpic_index">
	    <!-- <div id="ad_change">
	        <div id="ad_img"> 
	        	<a href="#"><img src="static/common/img/13541035064144.jpg" width="960" height="120" /></a>
	        </div>
	    </div> -->
	</div>
</div>
