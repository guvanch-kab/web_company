    <?php
    include_once '../config/dbase_accessdata.php';
    if (isset($_POST["sil"])) {
        $poz = $_POST["sil"];
        $type_r = $_POST["type_r"];
        $exit_d=$_POST["exit_d"];
        $entry_d=$_POST["entry_d"];
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
if($type_r!=1)
{
        $sql = "Delete FROM Reason_type where PersonID='$poz' AND Result_time='$type_r' AND Exit_date='$exit_d' AND Entry_date='$entry_d'  ";
        mysqli_query($connect, $sql);
        if (mysqli_query($connect, $sql)) {
            echo 'Record deleted successfully.';
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }

} // end if


if (isset($_POST["del_id"])) {
    $del_id = $_POST["del_id"];   
    $time_l = $_POST["time_l"];
    $time_a = $_POST["time_a"];

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $sql = "Delete FROM Daily_leave where PersonID='$del_id' AND Time_leave='$time_l' AND Time_arrive='$time_a'  ";
    mysqli_query($connect, $sql);
    if (mysqli_query($connect, $sql)) {
        echo 'Record deleted successfully.';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
   }
   
   
   

















    ///////////////////// delete from smspanel talapiber.php ///////////////////////////////////
    // if (isset($_POST["smstalap"])) {
    //     $talapdel = $_POST["smstalap"];

    //     $sql = "Delete FROM talapiber where Smsno='$talapdel' ";
    //     mysqli_query($conn, $sql);
    //     if ($conn->query($sql) === TRUE) {

    //         echo "<script>windom.location.href='index.php';</script> ";
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    //     ////////////////////////////////////////////////////////

    //     $conn->close();
    // }
    ?>
