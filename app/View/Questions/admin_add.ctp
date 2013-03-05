<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/admin_sidebar'); ?>
    </div>
    <div class="span9">
        <h1 class="page-title"><?php echo __('Add Question'); ?></h1>
        <div class="widget">
            <div class="widget-header"><h3><?php echo __('Add New Question'); ?></h3></div>
            <div class="widget-content">
            <?php
                echo $this->Form->create('Question', array('inputDefaults' => array('error' => array('attributes' => array('class' => 'text-error')))));
                echo $this->Form->input('topic_id', array('empty' => '-- Select Topic --', 'class' => 'span8'));
                echo $this->Form->input('comprehension', array('class' => 'span8'));
                echo $this->TinyMCE->editor(
                    array(
                        'theme' => 'advanced', 
                        'mode' => 'textareas', 
                        'theme_advanced_toolbar_location' => 'top', 
                        'theme_advanced_toolbar_align' => 'left',
                        'plugins' => "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
                        'theme_advanced_buttons1' => "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                        'theme_advanced_buttons2' => "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                        'theme_advanced_buttons3' => "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen,|,fmath_formula",
                    )
                );
                echo $this->Form->input(
                    'title',
                    array(
                        'class' => 'span8',
                        'label' => array('text' => 'Question'),
                        'error' => array(
                            'notempty' => __('Please enter question', true),
                            'class'    => 'help-inline',
                        ),
                    )
                );
                echo $this->Form->error(
                    'answer', 
                    array('required' => 'Please select at least one correct answer'), 
                    array('class' => 'text-error')
                );
                for($j = 1; $j <= 5; $j++) : 
                    $error    = '';
                    $divClass = 'control-group';
                    if ($j <= 1) {
                        $error = $this->Form->error(
                            "option", 
                            array(
                             'required' => __('Please enter answer', true),
                             'attributes' => array(
                                              'wrap'  => 'span',
                                              'class' => 'text-error',
                                             )
                            )
                        );
                        $divClass = !empty($error) ? 'control-group required error' : 'control-group required';
                    }
                    $correct = "<span class='add-on'>" . 
                               $this->Form->input(
                                    "Question.answer.$j", 
                                    array(
                                     'type'    => 'checkbox',
                                     'div'     => false,
                                     'label'   => false,
                                     'between' => false,
                                    )
                                ).
                               "</span>";

                    echo $this->Form->input(
                        "option_$j", 
                        array(
                         'type'    => 'text',
                         'class'   => 'span8',
                         'div'     => $divClass,
                         'between' => '<div class="controls"><div class="input-prepend">'.$correct,
                         'error'   => array('attributes' => array('class' => 'text-error')),
                         'after'   => $error.'</div>',
                        )
                    );
                endfor;
                echo $this->Form->button('<i class="icon-save"></i>&nbsp;&nbsp;Save', array('class' => 'btn btn-success', 'escape' => false, 'type' => 'submit'));                
                echo $this->Form->end();
            ?>
            </div>
        </div>
    </div>
</div>
