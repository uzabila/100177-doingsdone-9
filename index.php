<?php 

require_once('data.php');
require_once('helpers.php');
require_once('functions.php');

$main_content = include_template('index.php', [ 
	'tasks_list' => $tasks_list,
	'projects_list' => $projects_list,
	'show_complete_tasks' => $show_complete_tasks
]);

$layout_content = include_template('layout.php',[
    'content' => $main_content,    
    'title' => 'DoingsDone - главная страница',
    'user_name' => 'Василий'
]);

print($layout_content);