<?php echo $this->Html->script(array('jquery.mustache','mustache', 'jquery.jCounter', 'mep'), array('inline' => false));?>
<script type="text/html" id="formSubmittedTemplate">
    <div class="span12">
        <div class="alert alert-success">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <strong>Well done!</strong> You have successfully completed the exam. Now please visit your Dashboard to view your result.
        </div>
    </div>
</script>
<script type="text/html" id="questionTemplate">
    <h4>Question No. {{index}}</h4>
    <div class="question-title">{{{Question.title}}}</div>
    <form id="#answerForm" action="#" method="POST">
        <ul class="unstyled options-container">
            <input name="data[Question][answer]" id="QuestionAnswer_" value="" type="hidden" />
            <li><input name="data[Question][answer]" id="QuestionAnswerOption1" value="1" type="radio" /><label for="QuestionAnswerOption1"> {{{ Question.option_1 }}}</label></li>
            <li><input name="data[Question][answer]" id="QuestionAnswerOption2" value="2" type="radio" /><label for="QuestionAnswerOption2"> {{{ Question.option_2 }}}</label></li>
            <li><input name="data[Question][answer]" id="QuestionAnswerOption3" value="3" type="radio" /><label for="QuestionAnswerOption3"> {{{ Question.option_3 }}}</label></li>
            <li><input name="data[Question][answer]" id="QuestionAnswerOption4" value="4" type="radio" /><label for="QuestionAnswerOption4"> {{{ Question.option_4 }}}</label></li>
            <li><input name="data[Question][answer]" id="QuestionAnswerOption5" value="5" type="radio" /><label for="QuestionAnswerOption5"> {{{ Question.option_5 }}}</label></li>
        </ul>
        <div>
            <div class="pull-left">
                <a class="btn btn-info mark-question" data-current-question-index="{{{index}}}" data-next-question-index="{{{nextQuestionIndex}}}" href="#">Mark for Review and Next</a>
                <a class="btn btn-info clear-response" href="#">Clear Response</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary save-question" data-current-question-index="{{{index}}}" data-next-question-index="{{{nextQuestionIndex}}}" href="#">Save and Next</a>
            </div>
        </div>
    </form>
</script>
<script id="questionButtonTemplate" type="text/template">
    <a href="#" data-question-id="<%= Question.id }}" class="btn answerbtn"><%= Question.id }}</a>
</script>
<div class="topic-data hide">
    <ul class="unstyled">
        <li><a href="#" class="btn btn-info btn-mini">Question Paper</a></li>
        <li><a href="#" class="btn btn-info btn-mini">Instructions</a></li>
        <li><a href="#" class="btn btn-info btn-mini">Profile</a></li>
        <li><a href="#" class="btn btn-info btn-mini disabled">Submit</a></li>
    </ul>
</div>
<div class="row" id="app-container">
    <div class="span9">
        <h4 class="section-heading"><?php echo __('Sections'); ?></h4>        
        <div id="sections">
            <?php foreach($subjects as $subject): ?>
            <?php 
                echo $this->Html->link(
                    $subject['Subject']['name'], 
                    '#', 
                    array('class' => 'btn btn-primary sectionButton', 'data-subject-id' => $subject['Subject']['id'])
                );
            ?>
            <?php endforeach; ?>
        </div>
        <hr />
        <div id="questions"></div>
    </div>
    <div class="span3">
        <div class="row">
            <div class="span1" style="background:blue;height:70px;">
                <?php 
                    $email = "someone@somewhere.com";
                    if ($this->Session->check('Auth.User.email')) {
                        $email = $this->Session->read('Auth.User.email');
                    }
                    $default = "http://www.somewhere.com/homestar.jpg";
                    $size = 70;

                    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;

                    echo $this->Html->image($grav_url);
                 ?>
            </div>
            <div class="span2">
                <h4>User Name</h4>
                <p class="countdown">Time Left: <span class="minutes">00</span>:<span class="seconds">00</span></p>
            </div>
        </div>
        <hr />
        <div class="row">
            <div id="question-buttons-container" class="span3">
                <?php foreach($questions as $key => $question): ?>
                <?php 
                    $btnClass = !empty($question['viewed']) ? 'btn-danger' : '';
                    $btnClass = !empty($question['answer']) ? 'btn-success' : $btnClass;
                    $btnClass = !empty($question['review']) ? 'btn-warning' : $btnClass;
                    echo $this->Html->link(
                        $key + 1,
                        '#', 
                        array('class' => "btn answerbtn $btnClass question-index-{$question['index']}", 'data-question-index' => $key)
                    );
                ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="legend">
            <h4>Legend</h4>
            <a href="#" class="btn btn-mini btn-success answerbtn">&nbsp;</a> Answered <br />
            <a href="#" class="btn btn-mini btn-danger answerbtn">&nbsp;</a> Not Answered <br />
            <a href="#" class="btn btn-mini btn-warning answerbtn">&nbsp;</a> Marked <br />
            <a href="#" class="btn btn-mini answerbtn">&nbsp;</a> Not Visited <br />
        </div>
        <div class="extra-actions">
            <a href="#" class="btn btn-info btn-mini">Question Paper</a>
            <a href="#" class="btn btn-info btn-mini">Instructions</a>
            <a href="#" class="btn btn-info btn-mini">Profile</a>
            <a href="#" class="btn btn-info btn-mini disabled">Submit</a>
        </div>
    </div>
</div>