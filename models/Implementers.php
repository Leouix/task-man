<?php

class Implementers {

    public static function getAll() {

        $db = DB::getConnection();

        // implementers: id | implementer

        $sql = "SELECT * FROM `implementers`";
        $stm = $db->query($sql);

        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

}