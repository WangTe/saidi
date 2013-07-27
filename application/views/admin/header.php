<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>华智讯教育 -- 管理后台</title>
<link href="<?php echo base_url('/static/admin/css/admin.css'); ?>" rel="stylesheet" type="text/css" />
<link rel=stylesheet href="<?php echo base_url('/static/ueditor/themes/default/ueditor.css'); ?>" />
<script type=text/javascript src="<?php echo base_url('static/admin/js/jquery-1.8.0.js'); ?>"></script>
<script type=text/javascript src="<?php echo base_url('static/admin/js/admin.js'); ?>"></script>
</head>

<body>
<div id="top" class="box">
	<p class="f_l">欢迎登录华智讯后台管理系统,  当前用户：<?php echo $username;?></p>
	<p class="f_r">
		<a href="<?php echo base_url('/'); ?>" target="_blank">网站首页</a> | <a href="<?php echo base_url('/admin/admin_manager/edit_pass')?>">修改密码</a> | 
		<a href="<?php echo base_url('/admin/index/logout'); ?>">退出</a>
	</p>
</div>