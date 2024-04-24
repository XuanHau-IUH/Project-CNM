
<?php
include_once("Model/Connect.php");

class mViewLichSu
{
    public function view_schedule_su($idKetQua)
    {
         $conn;
         $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM ketqua where idKetQua";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            //
            return $table;
        } else {
            return false;
        }
    }
}
?>
