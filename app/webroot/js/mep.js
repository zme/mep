$(function() {
    /*
     * Timer
     */
    $(".countdown").jCounter({
        twoDigits: 'on',
        customDuration: 10*60,
        callback: function() {
            $('#app-container').mustache('formSubmittedTemplate', {}, { method: 'html' });            
        }
    });

    /*
     * Sections
     */
    $('.sectionButton').live('click', function() {
        var subjectId = parseInt($(this).attr('data-subject-id'));
        var url       = '/tests/submit/set_subject/' + subjectId;

        $section = $(this);
        $.get(url, function(response) {
            if ($.type(response) == 'object') {
                setCurrentQuestion(response);
                markSectionSelected($section);
                setQuestionButtonClass(response);
            }
        });
    });
    
    $('.sectionButton').first().trigger('click');
    
    var markSectionSelected = function($section) {
        $('.sectionButton').removeClass('disabled');
        $section.addClass('disabled');
    }

    /*
     * Questions
     */
    var setCurrentQuestion = function(question) {
        $.Mustache.addFromDom();
        $('#questions').mustache('questionTemplate', question, { method: 'html' });

    };
    var setQuestionButtonClass = function(question, type) {
        if (!question) {
            if (type == 'saveAndNext') {
                if ($("input[name='data[Question][answer]']:checked").val()) {
                    var currentQuestionIndex = $('.save-question').attr('data-current-question-index');
                    var $queBtn = $('.question-index-' + currentQuestionIndex);
                    $queBtn
                        .removeClass('btn-success')
                        .removeClass('btn-danger')
                        .removeClass('btn-warning')
                        .addClass('btn-success')
                }
            }
            else if (type == 'markAndNext') {                
                var currentQuestionIndex = $('.save-question').attr('data-current-question-index');
                var $queBtn = $('.question-index-' + currentQuestionIndex);
                $queBtn
                    .removeClass('btn-success')
                    .removeClass('btn-danger')
                    .removeClass('btn-warning')
                    .addClass('btn-warning')
            }

        } else {
            var $queBtn = $('.question-index-' + question.index);

            if (!$queBtn.hasClass('btn-success') ||
                !$queBtn.hasClass('btn-danger') ||
                !$queBtn.hasClass('btn-warning')  )
            {
                $queBtn.addClass('btn-danger');
            }
        }
    }
    $('.answerbtn').live('click', function() {
        var questionIndex = parseInt($(this).attr('data-question-index'));
        var url        = '/tests/submit/set_question/' + questionIndex;

        $.get(url, function(response) {
            if ($.type(response) == 'object') {
                setCurrentQuestion(response);
                setQuestionButtonClass(response);
            }
        });
    });
    $('.save-question').live('click', function() {
        setQuestionButtonClass(null, 'saveAndNext');

        var questionId = parseInt($(this).attr('data-next-question-index'));
        var url        = '/tests/submit/set_question/' + questionId;

        $.get(url, function(response) {
            if ($.type(response) == 'object') {
                setCurrentQuestion(response);
                setQuestionButtonClass(response);
            }
        });
    });
    $('.mark-question').live('click', function() {
        setQuestionButtonClass(null, 'markAndNext');

        var questionId = parseInt($(this).attr('data-next-question-index'));
        var url        = '/tests/submit/mark_question/' + questionId;

        $.get(url, function(response) {
            if ($.type(response) == 'object') {
                setCurrentQuestion(response);
                setQuestionButtonClass(response);
            }
        });
    });
    $('.clear-response').live('click', function(){
        $('input[name="data[Question][answer]"]').prop('checked', false);
    });



});