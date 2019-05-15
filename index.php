<?php 
require_once('init.php');

if (!$link) {

    $error = mysqli_connect_error();
    $main_content = include_template('error.php', ['error' => $error]);
    print($main_content);
    die;

} else {
    
	// получаем из БД проекты

    $sql = 'SELECT `id`, `user_id`, `name` FROM projects_cat WHERE user_id=1 ';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $projects_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

    }
    else {
        $error = mysqli_error($link);
        $main_content = include_template('error.php', ['error' => $error]); 
        print($main_content);
        die;
    }

    // получение из БД списка задач

    $sql = 'SELECT `status`, `name`, `date_exp`, `task_url`, `cat_id` FROM tasks WHERE user_id=1 ';
         
    if ($res = mysqli_query($link, $sql)) {
        $tasks_list = mysqli_fetch_all($res, MYSQLI_ASSOC);
        
    }
    else {
        $main_content = include_template('error.php', ['error' => mysqli_error($link)]);
        print($main_content);
        die;    
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

}