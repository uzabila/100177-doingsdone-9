        <section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                  <nav class="main-navigation">
                    <ul class="main-navigation__list">
                  
                    <?php foreach ($projects_list as $key => $val): ?>
                    

                        <li class="main-navigation__list-item">
                            <a class="main-navigation__list-item-link" href="#"><?=$val['name'];?></a>
                         
                        <span class="main-navigation__list-item-count"><?=get_task_number( $val['id'], $tasks_list ); ?></span>
                        

                        </li>
                    
                    <?php endforeach; ?>

                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button"
                   href="pages/form-project.html" target="project_add">Добавить проект</a>
        </section>


        <main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post" autocomplete="off">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input class="checkbox__input visually-hidden show_completed" <?php if($show_complete_tasks == 1): ?>checked<?php endif; ?> type="checkbox">
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">

                <?php foreach ($tasks_list as $key => $val): ?>

                    <?php 

                    $dt_end = strtotime($val['date_epx']);
                    $ts_now = time();
                    $secs_in_hour = 3600;
                    $ts_diff = $dt_end - $ts_now;
                    $hours_until_end = floor($ts_diff / $secs_in_hour);                  

                    ?>

                	<?php if( $val['status'] == false ): ?>

                    <tr class="tasks__item task <?php if( $val['status'] == true ): ?>task--completed<?php endif; ?> <?php if( $hours_until_end <= 24 && is_int($dt_end) ) :?>task--important<?php endif; ?>" >
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden <?php if($show_complete_tasks !== 1): ?>task__checkbox<?php endif; ?>" type="checkbox" <?php if($show_complete_tasks !== 1): ?>value="1"<?php endif; ?> <?php if( $val['status'] == true && $show_complete_tasks == 1 ): ?>checked<?php endif; ?>>
                                <span class="checkbox__text"><?=$val['name'];?></span>
                            </label>
                        </td>

                        <td class="task__date"><?=$val['date_exp']; ?></td>
                        <td class="task__controls">

                            <?php if( $val['task_url'] == true ): ?>

                            <a class="download-link" href="#">Home.psd</a> 

                            <?php endif; ?>

                        </td>
                        
                    </tr>

                    <?php elseif( $val['status'] == true && $show_complete_tasks == 1 ): ?>

					<tr class="tasks__item task <?php if( $val['status'] == true ): ?>task--completed<?php endif; ?> <?php if( $hours_until_end <= 24 && is_int($dt_end) ) :?>task--important<?php endif; ?>" >
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden <?php if($show_complete_tasks !== 1): ?>task__checkbox<?php endif; ?>" type="checkbox" <?php if($show_complete_tasks !== 1): ?>value="1"<?php endif; ?> <?php if( $val['status'] == true && $show_complete_tasks == 1 ): ?>checked<?php endif; ?>>
                                <span class="checkbox__text"><?=$val['name'];?></span>
                            </label>
                        </td>

                        <td class="task__date"><?=$val['date_exp'];?></td>
                        <td class="task__controls">

                        <?php if( $val['task_url'] == true ): ?>

                            <a class="download-link" href="#">Home.psd</a> 

                        <?php endif; ?>

                        </td>
                        
                    </tr>

                   	<?php else: ?>



                <?php endif; ?>
                

                 <?php endforeach; ?>

                </table>
            </main>