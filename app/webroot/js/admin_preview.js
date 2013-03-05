(function() {
    
    // Global
    window.App = {
        Models      : {},
        Collections : {},
        Views       : {}
    };
    window.template = function(id) {
        return _.template( $('#' + id).html() );
    };

    //
    // TOPICS
    //
    App.Models.Topic = Backbone.Model.extend({});
    App.Views.Topic  = Backbone.View.extend({
        tagName: 'span',
        className: 'topic',
        template: template('topicTemplate'),
        events: {
            'click a': 'selectTopic',
            'hover a': 'showTopicStats'
        },
        initialize: function() {
            this.model.on('change', this.render, this);
        },
        selectTopic: function(e) {
            $('.topic > a').removeClass('disabled');
            $(e.currentTarget).addClass('disabled');
        },
        showTopicStats: function() {},
        render: function() {
            var template = this.template(this.model.toJSON());
            this.$el.html(template);

            return this;
        }
    });
    App.Collections.Topics = Backbone.Collection.extend({
        initialize: function() {
          this.on('change', this.render, this);  
        },
        model: App.Models.Topic,
    });
    App.Views.Topics = Backbone.View.extend({
        el: '#sections',
        render: function() {
            this.collection.each(this.addOne, this);
            return this;
        },
        addOne: function(topic) {
            var topicView = new App.Views.Topic({model: topic});
            this.$el.append( topicView.render().el );
        }
    });


    /**
     * QUESTIONS
     */
    App.Models.Question = Backbone.Model.extend({});
    App.Views.Question  = Backbone.View.extend({
        tagName: 'div',
        template: template('questionTemplate'),
        initialize: function() {
            this.model.set('indexId', this.model.collection.indexOf(this.model));
            this.model.on('change', this.render, this);
        },
        render: function() {
            var template = this.template(this.model.toJSON());
            this.$el.html(template);

            return this;
        }
    });
    App.Collections.Questions = Backbone.Collection.extend({
        model: App.Models.Question,
        next: function () {
            this.setQuestion(this.at(this.indexOf(this.getQuestion()) + 1));
        },
        prev: function() {
            this.setQuestion(this.at(this.indexOf(this.getQuestion()) - 1));
        },        
        getQuestion: function() {
            return this.currentQuestion;
        },
        setQuestion: function(model) {
            this.currentQuestion = model;
        }
    });
    App.Views.Questions = Backbone.View.extend({
        el: '#questions',
        render: function() {
            var currentQuestion     = this.getQuestion();
            var currentQuestionView = new App.Views.Question({model: currentQuestion});

            this.$el.html( currentQuestionView.render().el );
        },
        events: {
            'click .save-question' : 'next'
        },
        next: function() {
            this.collection.next();
            this.render();
        },
        initialize: function() {
            this.setQuestion(this.collection.at(0));                
            this.collection.on('change', this.render, this);
        },
        getQuestion: function() {
            return this.collection.currentQuestion;
        },
        setQuestion: function(model) {
            this.collection.currentQuestion = model;
        }
    });


    //
    // QuestionButtons
    //
    App.Models.QuestionButton = Backbone.Model.extend({});
    App.Views.QuestionButton = Backbone.View.extend({
        tagName: 'span',
        events: {
            'click a' : 'selectQuestion'
        },
        selectQuestion: function(event) {
            var indexId = this.model.get('cid');
            //console.log(this.model.cid);
            //console.log(indexId);
            this.model.collection.setQuestion(this.model);
        },
        template: template('questionButtonTemplate'),        
        initialize: function() {
            this.model.set('indexId', this.model.collection.indexOf(this.model));
            this.model.on('change', this.render, this);
        },        
        render: function() {            
            var template = this.template(this.model.toJSON());
            this.$el.html(template);
            return this;
        }
    });
    /*App.Collections.QuestionButtons = Backbone.Collection.extend({
        model: App.Models.QuestionButton
    });*/
    App.Views.QuestionButtons = Backbone.View.extend({
        el: '#question-buttons-container',        
        render: function() {
            this.collection.each(this.addOne, this);
            return this;
        },
        addOne: function(questionButton) {
            var questionButtonView = new App.Views.QuestionButton({model: questionButton});

            this.$el.append( questionButtonView.render().el );
        }
    });

    //
    // Main app
    //
    App.Views.Main = Backbone.View.extend({
        el: '#app-container',
        events: {
            'click .start-test' : 'beginTest'
        },
        beginTest: function(event) {
            this.initializeTopics();
            this.initializeQuestions();
            //this.initializeQuestionButtons();
            
            $(event.currentTarget).hide();
        },
        initializeTopics: function() {
            var topicsCollection = new App.Collections.Topics;
            topicsCollection.url = '/tests/submit/get_topics';
            
            topicsCollection.fetch({
                reset: true,
                success: function (response) {
                    var topicsView = new App.Views.Topics({
                        collection: topicsCollection
                    });
                    topicsView.render();
                },
                error: function (response) {
                    console.log(response);
                }
            });
        },
        initializeQuestions: function() {
            var questionsCollection = new App.Collections.Questions;
            questionsCollection.url = '/tests/submit/get_questions';
            
            questionsCollection.fetch({
                reset: true,
                success: function (response) {
                    var questionsView = new App.Views.Questions({
                        collection: questionsCollection
                    });
                    questionsView.render();
                    
                    // Create buttons for the same collection
                    var questionButtonsView = new App.Views.QuestionButtons({
                        collection: questionsCollection        
                    });
                    questionButtonsView.render();

                },
                error: function (response) {
                    console.log(response);
                }
            });
        },
        render: function() {

        }
    });

    var myExamPreparation = new App.Views.Main;
    myExamPreparation.render();

})();