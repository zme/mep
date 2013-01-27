<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo __("{$title_for_layout} | My Exam Preparation"); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $this->Html->meta('icon'); ?>

    <!-- Le styles -->
    <?php echo $this->Html->css(array('bootstrap.min', 'bootstrap-responsive.min', 'alveolae', 'font-awesome/css/font-awesome.css', 'http://fonts.googleapis.com/css?family=Asap:400,700', 'frontend-custom')); ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php echo $this->Html->script(array('jquery-1.7.1.min', 'bootstrap')); ?>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
      <?php echo $this->element('topbar'); ?>
        <!-- Main content -->
        <div id="main-content">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <?php echo $this->Session->flash();?> 
                        <?php echo $this->Session->flash('auth'); ?>
                    </div>
                </div>
                <?php echo $content_for_layout; ?>
            </div>
            <!-- End Container -->
        </div>
        <!-- end Main content -->
        <?php       
            echo $this->Html->scriptBlock('var baseUrl = "'.$this->Html->url('/').'";');
            echo $scripts_for_layout;
            //echo $this->element('sql_dump');
        ?>
  </body>
</html>
