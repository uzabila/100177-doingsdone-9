<?php

date_default_timezone_set("Europe/Moscow");
setlocale(LC_ALL, 'ru_RU');
$current_timestamp = time();

 // показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

function get_task_number ( $project_name, $task_data ){ 
                    
                        $item_count = 0;

                        foreach ($task_data as $key => $val) {                  

                        if( $val['task_category'] == $project_name ){
                            $item_count = $item_count + 1;
                        }
                        }           

                        return $item_count;

                };