<?php

class Test extends AppModel
{

    /**
     * This variable attaches containable behaviour to the class.
     *
     * @var array
     */
    public $actsAs = array('Containable');

    /**
     * This class variable contains list of Validation rules.
     *
     * @var array
     */
    public $validate = array(
                        'name' => array(
                                   'allowEmpty' => false,
                                   'message'    => 'Candidate must be selected.',
                                  ),
                        'topic_id'   => array(
                                           'rule'       => array('numeric'),
                                           'allowEmpty' => false,
                                           'message'    => 'Topic must be selected.',
                                          ),
                        'code'         => array('rule' => array('notempty')),
                       );


    /**
     * This class variable contains list of model's belongsTo associations.
     *
     * @var array
     */
    public $belongsTo = array(
                         'Topic',
                        );


    /**
     * This class variable contains list of model's hasMany associations.
     *
     * @var array
     */
    public $hasMany = array('TestQuestion');


    /**
     * This method is used to generate unique random string to be used as code.
     *
     * @param type $length lenght of the random string
     *
     * @return string
     */
    private function __randomAlphaNum($length)
    {
        $alphNums  = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $newString = str_shuffle(str_repeat($alphNums, rand(1, $length)));

        return substr($newString, rand(0,strlen($newString)-$length), $length);
    }//end __randomAlphaNum()


    /**
     * This method is used for modifying test data.
     *
     * @param array $formData  form data submitted by user
     * @param array $questions list of random questions
     *
     * @return array
     */
    public function modifyTestData($formData, $questions)
    {
        $data = array();
        
        // For each question adjusts data for saving.
        foreach ($questions as $questionId => $topicId) {           

            $formData['TestQuestion'][] = array(
                                       'question_id' => $questionId,
                                       'topic_id'    => $topicId,
                                      );
        }

        // Adds unique code to data.
        $formData['Test']['code'] = $this->__randomAlphaNum(4);
        unset($formData['Test']['topic_id']);

        return $formData;
    }//end modifyTestData()
    

    /**
     * This method is used to get total score and total questions count of the test.
     *
     * @param integer $testId test id
     *
     * @return array
     */
    public function getTestScore($testId)
    {
        // Count total questions
        $totalQuestions = $this->TestQuestion->find(
            'count',
            array('conditions' => array('TestQuestion.test_id' => $testId))
        );
        // Count total correct answers
        $scoreConditions = array(
                            0                      => 'TestQuestion.answer = TestQuestion.selected_option',
                            'TestQuestion.test_id' => $testId,
                           );
        $totalScore      = $this->TestQuestion->find(
            'count',
            array('conditions' => $scoreConditions)
        );

        // Return the score
        return compact('totalScore', 'totalQuestions');
    }//end getTestScore()


}//end class
