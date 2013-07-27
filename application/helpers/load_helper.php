<?php
/**
 * 基本的装载函数，扩张增强CI框架的load
 * 支持数组传递的多model，libraries，helper，view
 * 
 * @author 风格独特
 */

function load_model($model) 
{
	$CI = &get_instance();
		
	if(is_array($model)) {
		foreach ($model as $m) {
			$CI->load->model($m);
		}
	} else {
		$CI->load->model($m);
	}
}

function load_view($view, $data) 
{
	$CI = &get_instance();
	$CI->load->vars($data);
	
	if(is_array($view)) {
		foreach ($view as $v) {
			$CI->load->view($v);
		}
	} else {
		$CI->load->view($view, $data);
	}
}

function load_library($library) 
{
	$CI = &get_instance();
	
	if(is_array($library)) {
		foreach ($library as $l) {
			$CI->load->library($l);
		}
	} else {
		$CI->load->library($library);
	}
}

function load_helper($helper) 
{
	$CI = &get_instance();
	
	if(is_array($helper)) {
		foreach ($helper as $h) {
			$CI->load->helper($h);
		}
	} else {
		$CI->load->helper($helper);
	}
}
