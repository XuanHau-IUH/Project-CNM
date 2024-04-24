<?php

include_once("Model/mTuvanTudong.php");

class cTuvanTudong
{
    public function select_tuvan($query)
    {
        $model = new mTuvanTudong();
        $table = $model->select_tuvan($query);
        return $table;
    }

    public function select_message()
    {
        $model = new mTuvanTudong();
        $table = $model->select_message();
        return $table;
    }

    public function insert_message($txt, $added_on, $user, $username = null)
    {
        $model = new mTuvanTudong();
        $insert = $model->insert_message($txt, $added_on, $user, $username);
        if ($insert) {
            return 1; // Thêm thành công
        } else {
            return 0; // Thêm không thành công
        }
    }
    
}
