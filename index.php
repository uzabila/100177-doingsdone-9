<?php 
// require_once('data.php');
require_once('init.php');
require_once('helpers.php');
// require_once('functions.php');

if (!$link) {

    $error = mysqli_connect_error();
    $content = include_template('error.php', ['error' => $error]);
}
else {
    
	// получаем из БД проекты

    $sql = 'SELECT `id`, `user_id`, `name` FROM projects_cat WHERE user_id=1 ';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $projects_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

    }
    else {
        $error = mysqli_error($link);
        $content = include_template('error.php', ['error' => $error]);
    }

    // получение из БД списка задач

    $sql = 'SELECT `status`, `name`, `date_exp`, `task_url` FROM tasks WHERE user_id=1 ';
         
    if ($res = mysqli_query($link, $sql)) {
        $tasks_list = mysqli_fetch_all($res, MYSQLI_ASSOC);
        
    }
    else {
        $content = include_template('error.php', ['error' => mysqli_error($link)]);
    }

}

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
