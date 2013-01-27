<div class="row">
    <div class="span3">
	   <?php echo $this->element('Users/admin_sidebar'); ?>
    </div>
    <div class="span9">
        <h1 class="page-title"><?php echo __('Dashboard'); ?></h1>
            <div class="widget">
                <div class="widget-header"><h3><?php echo '<i class="icon-bar-chart"></i>&nbsp;&nbsp;'.__('Test Statistics'); ?></h3></div>
                <div class="widget-content">
                    <div class="box-container">
                        <div class="box-holder">
                            <div class="box"><span><?php echo $stats['users_count'] ?></span>Active Users</div>
                        </div>
                        <div class="box-holder">
                            <div class="box"><span><?php echo "{$stats['topics_count']} / {$stats['subjects_count']}" ?></span>Topics / Subjects</div>
                        </div>
                        <div class="box-holder">
                            <div class="box"><span><?php echo $stats['questions_count'] ?></span>Questions</div>
                        </div>
                        <div class="box-holder">                        
                            <div class="box"><span><?php echo $stats['tests_count'] ?></span>Tests</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="widget">
                <div class="widget-header"><h3><?php echo '<i class="icon-bar-chart"></i>&nbsp;&nbsp;'.__('Score Statistics'); ?></h3></div>
                <div class="widget-content">
                    <div class="box-container">
                        <div class="box-holder">
                            <div class="box"><span>0</span>Average Score</div>
                        </div>
                        <div class="box-holder">
                            <div class="box"><span>0</span>Lowest Score</div>
                        </div>
                        <div class="box-holder">                        
                            <div class="box"><span>0</span>Highest Score</div>
                        </div>
                        <div class="box-holder">
                            <div class="box"><span>0</span>Random stat</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>