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
            this.collection.on('change:currentQuestion', this.render, this);
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
        template: template('questionButtonTemplate'),        
        initialize: function() {
            //console.log(this.model.attributes);
            this.model.on('change', this.render, this);
        },        
        render: function() {
            var template = this.template(this.model.toJSON());
            this.$el.html(template);
            return this;
        }
    });
    App.Collections.QuestionButtons = Backbone.Collection.extend({
        model: App.Models.QuestionButton
    });
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

    App.Views.Main = Backbone.View.extend({
        el: '#app-container',
        render: function() {
            var topicsCollection = new App.Collections.Topics([
                {
                    title: 'Computer Awareness',
                    id: 1
                },
                {
                    title: 'English',
                    id: 2
                },
                {
                    title: 'General Awareness',
                    id: 3
                }
            ]);
            var topicsView = new App.Views.Topics({
                collection: topicsCollection
            });
            topicsView.render();

            // Questions
            var questionsCollection = new App.Collections.Questions([
                {
                    id: 2,
                    title: 'This is the second question title',
                    option_1: 'socond que Option number 1',
                    option_2: 'socond que Option number 2',
                    option_3: 'socond que Option number 3',
                    option_4: 'socond que Option number 4',
                    option_5: 'socond que Option number 5'
                },
                {
                    id: 3,
                    title: 'This is the question title',
                    option_1: 'Third question Option number 1',
                    option_2: 'Third question Option number 2',
                    option_3: 'Third question Option number 3',
                    option_4: 'Third question Option number 4',
                    option_5: 'Third question Option number 5'
                },
                {
                    id: 1,
                    title: 'This is the question title',
                    option_1: 'first Option number 1',
                    option_2: 'first Option number 2',
                    option_3: 'first Option number 3',
                    option_4: 'first Option number 4',
                    option_5: 'first Option number 5'
                }
            ]);

            var questionsView = new App.Views.Questions({
                collection: questionsCollection
            });
            questionsView.render();

            // Question Buttons
            var questionButtonCollection = new App.Collections.QuestionButtons([
                {
                    title: '111',
                    id: 1
                },
                {
                    title: '222',
                    id: 2
                },
                {
                    title: '333',
                    id: 3
                }
            ]);
            var questionButtonsView = new App.Views.QuestionButtons({
                collection: questionButtonCollection        
            });
            questionButtonsView.render();

            // Do all the code here
            console.log('render works');
        }
    });

    var myExamPreparation = new App.Views.Main;
    myExamPreparation.render();


})();