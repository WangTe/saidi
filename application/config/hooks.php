<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

/*
 * 装载控制器前的钩子定义
 */
$hook['pre_system'] = array(
                                'class'    => 'MyClass',
                                'function' => 'Myfunction',
                                'filename' => 'Myclass.php',
                                'filepath' => 'hooks',
                                'params'   => array('beer', 'wine', 'snacks')
                                );

/*
 * 装载系统前的钩子定义
 */
$hook['pre_controller'] = array(
		'class'    => 'MyClass',
		'function' => 'Myfunction',
		'filename' => 'Myclass.php',
		'filepath' => 'hooks',
		'params'   => array('beer', 'wine', 'snacks')
);



/* End of file hooks.php */
/* Location: ./application/config/hooks.php */