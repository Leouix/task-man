<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Task Manager</title>

</head>
<body>

<div class="container main-block">

    <a href="/add-task"><button type="button" class="btn btn-link">Добавить задачу</button></a>

    <form action="">
        Сортировать задачи по:
        <select name="sort" onchange="this.form.submit()">
            <option value="id" >умолчанию</option>
            <option value="implementer" <?=$sort['implementer']?>>исполнителю</option>
            <option value="status" <?=$sort['status']?>>статусу</option>
            <option value="deadline" <?=$sort['deadline']?>>сроку выполнения</option>
            <option value="date_complete" <?=$sort['date_complete']?>>дате выполнения</option>
        </select>
    </form>

    <?php

    foreach( $tasks as $task ) {

        $class_past = ( date('Y-m-d') > $task['deadline'] ) ? 'past_task' : '';

        $status = [
            'added' => '',
            'in_work' => '',
            'complete' => '',
        ];

        $status[$task['status']] = 'selected';
        $status_disabled = ($task['status'] == 'complete') ? 'disabled' : '';

        ?>

        <div class="card" >
            <div class="card-body <?=$class_past?>">
                <h5 class="card-title">Название задачи: <?=$task['task_name']?></h5>
                <p class="card-text"><b>Исполнитель:</b> <?=$task['implementer']?></p>
                <p class="card-text"><b>Описание:</b> <?=$task['description']?></p>
                <p class="card-text"><b>Дедлайн:</b> <?=$task['deadline']?></p>
                <p class="card-text"><b>Выполнено (дата):</b> <?=$task['date_complete']?></p>
                <form action="" method="POST">
                    <p class="card-text"><b>Статус:</b>
                        <select name="status" onchange="this.form.submit()" <?=$status_disabled?>>
                            <option value="added" <?=$status['added']?>>Добавлена</option>
                            <option value="in_work" <?=$status['in_work']?>>В работе</option>
                            <option value="complete" <?=$status['complete']?>>Завершена</option>
                        </select>
                    </p>
                    <input type="hidden" name="task_id" value="<?=$task['id']?>">
                </form>
                <a href="/delete/?id=<?=$task['id']?>"><p>Удалить</p></a>
            </div>
        </div>

        <?php
    }
    ?>

</div>

<style>
    .main-block {
        padding: 35px 0;
    }
    .card {
        margin: 10px 0;
    }
    .past_task {
        background: #f3802e91
    }
    .btn-link {
        padding-left: 0;
    }
    @media screen and (max-width: 575px) {
        .main-block {
            padding: 35px 20px;
        }
    }
</style>

</body>
</html>
