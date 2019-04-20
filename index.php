<?php 

require_once('helpers.php');
require_once('functions.php');
require_once('data.php');

$num = count($projects_list);

$main_content = include_template('index.php', [ 
	'tasks_list' => $tasks_list
]);

$layout_content = include_template('layout.php',[
    'content' => $main_content,
    'tasks_list' => $tasks_list,
    'projects_list' => $projects_list,
    'title' => 'DoingsDone - главная страница',
    'user_name' => 'Василий'
]);

print($layout_content);