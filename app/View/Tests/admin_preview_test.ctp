<?php //echo $this->Html->script(array('underscore-min', 'backbone', 'backbone-relational', 'admin_preview'), array('inline' => false));?>
<?php echo $this->Html->script(array('jquery.mustache','mustache', 'mep'), array('inline' => false));?>
<script type="text/template" id="topicTemplate">
    <a href="#" class="btn btn-primary"><%= name %></a>
</script>
<script type="text/template" id="questionTemplate">
    <h4>Question No. <%= Question.id %></h4>
    <div class="question-title"><%= Question.title %></div>
    <ul class="unstyled options-container">
        <li><input type="radio"><%= Question.option_1 %></li>
        <li><input type="radio"><%= Question.option_2 %></li>
        <li><input type="radio"><%= Question.option_3 %></li>
        <li><input type="radio"><%= Question.option_4 %></li>
        <li><input type="radio"><%= Question.option_5 %></li>
    </ul>
    <div>
        <div class="pull-left">
            <a class="btn btn-info mark-question" href="#">Mark for Review and Next</a>
            <a class="btn btn-info clean-question" href="#">Clear Response</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary save-question" href="#">Save and Next</a>
        </div>
    </div>
</script>
<script id="questionButtonTemplate" type="text/template">
    <a href="#" data-question-id="<%= Question.id %>" class="btn answerbtn"><%= Question.id %></a>
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
        <div id="sections"></div>
        <hr />
        <div id="questions">               
        </div>
    </div>
    <div class="span3">
        <div class="row">
            <div class="span3"><a class="start-test btn btn-large btn-danger">Start Test</a></div>
            <div class="span1" style="background:blue;height:70px;">&nbsp;</div>
            <div class="span2">
                <h4>User Name</h4>
                <p>Time Left: 30:20</p>
            </div>
        </div>
        <hr />
        <div class="row">
            <div id="question-buttons-container" class="span3">                              
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