
	<div id="content_right">
    	<div class="title_2">
            <p>招生简章</p>
        </div>
        <div class="text">
        	<div class="t_center"><a href="<?php echo base_url('apply/?cid=' . $course['cid']); ?>" target="_blank" class="submit">我要报名</a></div>
        	<ul>
                <li>&nbsp;</li>
                <li><b>课程名称：</b><?php echo $course['name']; ?></li>
                <li><b>课程级别：</b><?php echo $course['level']; ?></li>
                <li><b>开课时间：</b><?php echo $course['time']; ?></li>
                <li><b>课程费用：</b><?php echo $course['price']; ?></li>
                <li>&nbsp;</li>
            </ul>
            <div>
            	<?php echo $course['content']; ?>
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <div class="content_foot1"> 	
    </div>
</div>
<div class="content_foot2">
</div>