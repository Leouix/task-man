<?php

require_once ROOT . '/components/DB.php';

class Tasks {

    public static function getList( $orderby='id' ) {
        $db = DB::getConnection();
        $sql = "SELECT `id`, `task_name`, `description`, `deadline`, `date_complete`, `status`, `implementer` FROM `tasks` INNER JOIN `implementers` ON `id_imp` = `implementer_id` ORDER BY $orderby ASC";
        $stm = $db->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addTask( $task_name, $task_implementer, $task_description, $task_deadline ) {
        $db = DB::getConnection();
        $sql = "INSERT INTO `tasks` (`task_name`, `implementer_id`, `description`, `deadline`, `status`) VALUES ( ?, ?, ?, ?, ? )";
        $stmt= $db->prepare($sql);
        $stmt->execute([$task_name, $task_implementer, $task_description, $task_deadline, 'added' ]);
        header('location: /');
    }

    public static function updateTask( $status, $date_complete, $task_id ) {
        $db = DB::getConnection();
        $sql = "UPDATE `tasks` SET `status`=?, `date_complete`=? WHERE `id`=?";
        $stmt= $db->prepare($sql);
        $stmt->execute([$status, $date_complete, $task_id]);
        header('location:' . $_SERVER['REQUEST_URI'] );
    }

    public static function removeTask($task_id) {
        $db = DB::getConnection();
        $sql = "DELETE FROM `tasks` WHERE `id`=?";
        $stmt= $db->prepare($sql);
        $stmt->execute([$task_id]);
        header('location: /');
    }

}