<div class="row">
    <div class="span9">
        <h4><?php echo __('Sections'); ?></h4>
        <a href="#" class="btn btn-primary"><?php echo __('Computer Awareness'); ?></a>
        <hr />
        <div class="clearfix">
            <select name="language" id="language" class="span2 pull-right">
                <option value="english">English</option>
            </select>
            <h4>Question No. 1</h4>
        </div>
        <div class="clearfix">
            This is dummy question, dummy question dummy question. This is dummy question, dummy question dummy question. This is dummy question, dummy question dummy question.
        </div>
        <ul class="unstyled">
            <li><input type="radio"> Option 1</li>
            <li><input type="radio"> Option 2</li>
            <li><input type="radio"> Option 3</li>
            <li><input type="radio"> Option 4</li>
            <li><input type="radio"> Option 5</li>            
        </ul>
        <div>
            <div class="pull-left">
                <a class="btn btn-info" href="#">Mark for Review and Next</a>
                <a class="btn btn-info" href="#">Clear Response</a>
            </div>
            <div class="pull-right"><a class="btn btn-primary" href="#">Save and Next</a></div>
        </div>

    </div>
    <div class="span3">
        <div class="row">
            <div class="span1" style="background:blue;height:70px;">&nbsp;</div>
            <div class="span2">
                <h4>User Name</h4>
                <p>Time Left: 30:20</p>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="span3">
                <?php for($i = 1; $i <= 30; $i++): ?>
                <a href="#" class="btn answerbtn"><?php echo $i ?></a>
                <?php endfor; ?>                
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