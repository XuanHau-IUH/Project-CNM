
<?php
include_once("Model/mXemLichSu.php");

class cSeeLichSu
{
    public function get_lichsu($idKetQua)
    {
        $mViewLichSu = new mViewLichSu();
        $table = $mViewLichSu->view_schedule_su($idKetQua);
        return $table;
    }
}
?>
