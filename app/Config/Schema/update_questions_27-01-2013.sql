ALTER TABLE  `questions` DROP  `user_id` , DROP  `mode` ;
ALTER TABLE  `tests` DROP  `topic_id` ;
ALTER TABLE  `test_questions` DROP  `topic_id` ;
RENAME TABLE  `myexampreparation`.`test_questions` TO  `myexampreparation`.`tests_questions` ;