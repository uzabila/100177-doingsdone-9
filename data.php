 <?php 

date_default_timezone_set("Europe/Moscow");
setlocale(LC_ALL, 'ru_RU');
$current_timestamp = time();

 // показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

                    $tasks_list = [
                    [
                        'task_name' => 'Собеседование в IT компании',
                        'task_date_done' => '01.12.2019',
                        'task_category' => 'Работа',
                        'task_status' => false
                    ],
                    [
                        'task_name' => 'Выполнить тестовое задание',
                        'task_date_done' => '26.04.2019',
                        'task_category' => 'Работа',
                        'task_status' => false
                    ],
                    [
                        'task_name' => 'Сделать задание первого раздела',
                        'task_date_done' => '21.12.2018',
                        'task_category' => 'Учеба',
                        'task_status' => true
                    ],
                    [
                        'task_name' => 'Встреча с другом',
                        'task_date_done' => '22.12.2018',
                        'task_category' => 'Входящие',
                        'task_status' => false
                    ],
                    [
                        'task_name' => 'Купить корм для кота',
                        'task_date_done' => 'Нет',
                        'task_category' => 'Домашние дела',
                        'task_status' => false
                    ],
                    [
                        'task_name' => 'Заказать пиццу',
                        'task_date_done' => 'Нет',
                        'task_category' => 'Домашние дела',
                        'task_status' => false
                    ]
                    ];

                    $projects_list = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];