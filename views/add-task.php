<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Добавить задачу</title>
</head>
<body>

<div class="container main-block">

    <form action="" method="POST">
    <div class="mb-3">
        <label for="task-name" class="form-label">Название задачи</label>
        <input type="text" name="task_name" class="form-control" id="task-name" value="<?=$_POST['task_name'] ?? ''?>">
    </div>
    <div class="mb-3">
        <select name="task_implementer">
            <?php foreach($implementers as $implementer): ?>
                <?php $selected = ($_POST['task_implementer'] ?? '' == $implementer['implementer']) ? 'selected' : '';?>
                <option value="<?=$implementer['id_imp']?>" <?=$selected?>><?=$implementer['implementer']?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="task-description" class="form-label">Описание задачи</label>
        <textarea class="form-control" id="task-description" name="task_description" rows="3"><?=$_POST['task_description'] ?? ''?></textarea>
    </div>
    <div class="mb-3">
        <label for="deadline" class="form-label">Дедлайн</label>
        <input type="date" class="form-control" name="task_deadline" id="deadline" value="<?=$_POST['task_deadline'] ?? ''?>">
    </div>
        <input type="submit" class="btn btn-primary" name="add_task_form_sended" value="Добавить задачу">
</form>

</div>
<style>
    .main-block {
        padding: 35px 0;
    }
    @media screen and (max-width: 575px) {
        .main-block {
            padding: 35px 20px;
        }
    }
</style>
</body>
</html>