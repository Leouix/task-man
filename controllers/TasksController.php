<?php

require_once ROOT . '/models/Tasks.php';
require_once ROOT . '/models/Implementers.php';

class TasksController {

    public function index() {

        if( isset($_POST['status']) ) {
            $date_complete = $_POST['status'] == 'complete' ? date('Y-m-d') : '';
            Tasks::updateTask($_POST['status'], $date_complete, $_POST['task_id']);
        }

        $sort = [
            'implementer' => '',
            'status' => '',
            'deadline' => '',
            'date_complete' => ''
        ];
        if( isset($_GET['sort'])) $sort[$_GET['sort']] = 'selected';

        $orderby = $_GET['sort'] ?? 'id';
        $tasks = Tasks::getList($orderby);
        $implementers = Implementers::getAll();
        include ROOT . '/views/index.php';
    }

    public function addTask() {
        if( isset($_POST['add_task_form_sended']) ) {
            $task_name        = $_POST['task_name'] ?? '';
            $task_implementer = $_POST['task_implementer'] ?? '';
            $task_description = $_POST['task_description'] ?? '';
            $task_deadline    = $_POST['task_deadline'] ?? '';
            Tasks::addTask($task_name, $task_implementer, $task_description, $task_deadline);
        }
        $implementers = Implementers::getAll();
        include ROOT . '/views/add-task.php';
    }

    public function removeTask() {
        $task_id = $_GET['id'] ?? false;
        if ($task_id) Tasks::removeTask($task_id);
    }

}