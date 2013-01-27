<?php
class AppController extends Controller
{


   /**
     * This class variable is used to list helper used by all views.
     *
     * @var type
     */
    public $helpers = array(
                       'Html',
                       'Form',
                       'Session',
                       'Js',
                      );


    /**
     * This class variable is used to list component classes used by controllers.
     *
     * @var array
     */                       
    public $components = array('Session');
  

    /**
     * Renders view
     */
    public function render($view = null, $layout = 'frontend') {
        if (is_null($view)) {
            $view = $this->action;
        }
        $viewPath = substr(get_class($this), 0, strlen(get_class($this)) - 10);
        if (!file_exists(APP . 'View' . DS . $viewPath . DS . $view . '.ctp')) {
            $this->plugin = 'Users';
        } else {
            $this->plugin = null;
            $this->viewPath = $viewPath;
        }
        return parent::render($view, $layout);
    }


}//end class