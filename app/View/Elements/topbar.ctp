<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            echo $this->Html->link('<i class="icon-book"></i>&nbsp;&nbsp;My Exam Preparation', Router::url('/', true), array('class' => 'brand', 'escape' => false));
                
            $logInMenu = array(
                array(
                    'iconClass' => 'icon-magic',
                    'title'   => 'Log In',
                    'url'     => array('controller' => 'users', 'action' =>'login', 'admin' => false),
                ),
            );            
            $username = $this->Session->read("Auth.User.username");  
            $isAdmin  = ('admin' == $this->Session->read("Auth.User.role")) ? true : false;
            $uiName   = ($username != ' ') ? $username : 'User';
            $logOutMenu = array(
                array(
                    'iconClass' => 'icon-user',
                    'title'    => $uiName,
                    'dropdown' => array(
                        array(
                         'iconClass' => 'icon-dashboard',
                         'title'     => 'Dashboard',
                         'url'       => array('controller' => 'users', 'action' => 'dashboard', 'admin' => $isAdmin),
                        ),
                        array(
                         'iconClass' => 'icon-key',
                         'title'     => 'Change Password',
                         'url'       => array('controller' => 'users', 'action' => 'change_password', 'admin' => false),
                        ),
                    ),
                ),
                array(
                    'iconClass' => 'icon-lock',
                    'title' => 'Log Out',
                    'url'   => array('controller' => 'users', 'action' =>'logout', 'admin' => false),
                ),
            );
            $homeOrDashboard = array('plugin' => null, 'controller' => 'pages', 'action' =>'display', 'home', 'admin' => false);
            if ($this->Session->check('Auth.User.role') && 'admin' == $this->Session->read('Auth.User.role')) {
                $homeOrDashboard = array('plugin' => null, 'controller' => 'tests', 'action' =>'dashboard', 'admin' => true);
            } else if ($this->Session->check('Auth.User.role') && 'admin' != $this->Session->read('Auth.User.role')) {                
                $homeOrDashboard = array('plugin' => null, 'controller' => 'tests', 'action' =>'dashboard', 'admin' => false);

            }
            $pages = array(
                array(
                    'iconClass' => 'icon-home',
                    'title'     => 'Home',
                    'url'       => $homeOrDashboard,
                ),
                array(
                    'iconClass' => 'icon-bullhorn',
                    'title'     => 'About Us',
                    'url'       => array('plugin' => null, 'controller' => 'pages', 'action' =>'about', 'admin' => false),
                ),
                array(
                    'iconClass' => 'icon-tags',
                    'title'     => 'Features',
                    'url'       => array('plugin' => null, 'controller' => 'pages', 'action' =>'features', 'admin' => false),
                ),
            );

            ?>
            <?php if($this->Session->read('Auth.User.id')): ?>
                <?php echo $this->element('bootstrap_menu', array('menu' => $logOutMenu, 'secondary' => true)); ?>
            <?php else: ?>
                <?php echo $this->element('bootstrap_menu', array('menu' => $logInMenu, 'secondary' => true)); ?>
            <?php endif; ?>    
            <?php echo $this->element('bootstrap_menu', array('menu' => $pages, 'secondary' => true)); ?>
        </div>
    </div>
</div>

 

