<?php

class Question extends AppModel
{

    /**
     * This variable contains list of validation rules.
     *
     * @var array
     */
    public $validate = array(
                        'subject_id' => array('rule' => array('notempty')),
                        'title'      => array('rule' => array('notempty')),
                        'option_1'   => array('rule' => array('notempty')),
                        'option_2'   => array('rule' => array('notempty')),
                        'option_3'   => array('rule' => array('notempty')),
                        'option_4'   => array('rule' => array('notempty')),
                       );

    /**
     * This variable contains list of this models's belongsTo associations.
     *
     * @var array
     */
    public $belongsTo = array('Topic');

    public $hasMany = array('Image');

    public $hasAndBelongsToMany = array('Test');

    function beforeValidate()
    {      
        if (!empty($this->data['Question']['answer'])) {
            $num = 0;
            foreach ($this->data['Question']['answer'] as $option) {       
                if (empty($option)) {
                    $num++;
                }      
            }
            if ($num == 5) {
                $this->invalidate('answer', 'required');           
            }
            $answer = serialize($this->data['Question']['answer']);
            $this->data['Question']['answer'] = $answer; 
        }   
        return true;    
    }//end beforeValidate()

    function beforeSave() {
        //debug($this->data);
        //exit;
        $subjectId = $this->Topic->field('subject_id', array('Topic.id' => $this->data['Question']['topic_id']));
        $this->data['Question']['subject_id'] = $subjectId;
        return true;
    }
}//end class
