<?php
            ////////////////////////// TIME _ REASON ////////////////////////////////////////

include_once '../config/dbase_accessdata.php';
$today = date('Y-m-d');// '2024-07-16';   

$query = "SELECT * FROM Daily_leave WHERE Date_leave='$today'";
$result = mysqli_query($connect, $query);

if ($result->num_rows > 0) {
    $i=0;
    echo '<table class="table table-striped" style="text-align: center; vertical-align: middle;">
            <thead>
            <th style="color:#626231;"> Gunluk sagat boyunca rugsat</th>
                <tr>
                    <th scope="col">PersonID</th>
                    <th scope="col">Ady we familiýasy</th>
                    <th scope="col">Bölümi</th>
                    <th scope="col">Rugsat güni</th>
                    <th scope="col">Giden wagty</th>
                    <th scope="col">Gelmeli wagty</th>
                    <th scope="col">Gelen wagty</th>
                    <th scope="col">Gidiş sebäbi</th>
                    <th scope="col">Beýleki sebäpler</th>
                </tr>
            </thead>
            <tbody>';
$date_show=array();
    while ($row = $result->fetch_assoc()) {

        $date=date_create($row['Date_leave']); 
        $date_show[]=date_format($date,"d-m-Y");

       $cellColor = ($row['Time_arrive'] < $row['Result_time']) ? 'background-color: #ffcccc;' : '';
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['PersonID']) . '</td>';
        echo '<td>' . htmlspecialchars($row['PersonName']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Department']) . '</td>';
        echo '<td>' . htmlspecialchars($date_show[$i]) . '</td>';
        echo '<td>' . htmlspecialchars($row['Time_leave']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Time_arrive']) . '</td>';
        echo '<td style="' . $cellColor . '">' . ($row['Result_time']) . '</td>'; // Renklendirilen hücr
      // echo '<td>' . ($row['Result_time']) . '</td>'; // Renklendirilen hücr
        echo '<td>' . htmlspecialchars($row['Reason']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Others']) . '</td>';
        echo '</tr>';
        $i++;
    }

    echo '</tbody></table>';
} 
else {
    echo '<div class="alert alert-warning">Bugün rugsat alan tapylmady.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
    </div>';
}
?>
<?php
$today = date('Y-m-d');

$query = "
SELECT cg.*, dl.*
FROM controlgate1 AS cg
JOIN Daily_leave AS dl
ON cg.PersonID = dl.PersonID 
WHERE cg.DateEntry = '$today'
AND cg.TimeEntry = (
    SELECT MAX(cg_inner.TimeEntry)
    FROM controlgate1 AS cg_inner
    WHERE cg_inner.PersonID = dl.PersonID
    AND cg_inner.DateEntry = '$today' 
    AND cg_inner.DeviceIPAddress = '10.1.10.211'
)
"; // TimeEntry ile Time_leave karşılaştırması //AND cg.TimeEntry > dl.Time_leave;

$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      
        $personid = $row['PersonID'];
        $timeentry = $row['TimeEntry'];
        $date_leave = $row['Date_leave'];
        $time_leave = $row['Time_leave'];

        // Güncelleme sorgusu
        $update_query = "
        UPDATE Daily_leave 
        SET Result_time = '$timeentry', Izin='Rugsat'
        WHERE PersonID = '$personid' 
        AND Date_leave = '$today'
        AND Izin IS NULL
        AND ('$timeentry' > Time_leave);"; // TimeEntry ile Time_leave karşılaştırması
        mysqli_query($connect, $update_query);  
    }
}
/*

if ($timeentry > $time_leave) {
            // TimeEntry > Time_leave olduğunda güncelleme sorgusu
            $update_query = "
            UPDATE Daily_leave 
            SET Result_time = '$timeentry', Izin='Rugsat'
            WHERE PersonID = '$personid' 
            AND Date_leave = '$today'
            AND Izin IS NULL";

            if (mysqli_query($connect, $update_query)) {
                echo "Update successful for PersonID: $personid<br>";
            } else {
                echo "Update failed for PersonID: $personid. Error: " . mysqli_error($connect) . "<br>";
            }
        } else {
            // TimeEntry <= Time_leave olduğunda "do not exit" mesajı
            echo "Do not exit: TimeEntry is not greater than Time_leave for PersonID: $personid<br>";
        }

*/







////////////////////////////  IZIN ALANI KONTROLU 

// $query3 = "
// SELECT controlgate1_exit.*, Daily_leave.*
// FROM controlgate1_exit
// JOIN Daily_leave
// ON controlgate1_exit.PersonID = Daily_leave.PersonID 
// WHERE controlgate1_exit.Date_exit = '$today'
// AND Daily_leave.Date_leave = '$today' 
// AND Daily_leave.Izin = 'Rugsat'";

// $result3 = mysqli_query($connect, $query3);

// if (mysqli_num_rows($result3) > 0) {
//     while($row = mysqli_fetch_assoc($result3)) {
//         $personid = $row['PersonID'];
//         $timeentry = $row['Entry_time'];
        
//         // Prepare the update query
//         $update_query = "
//         UPDATE Daily_leave SET Result_time = ?   WHERE PersonID = ?  AND (Result_time='' OR Result_time IS NULL)";        

//         if ($stmt = mysqli_prepare($connect, $update_query)) {
//             // Bind parameters
//             mysqli_stmt_bind_param($stmt, "ss", $timeentry, $personid);            

//             if (mysqli_stmt_execute($stmt)) {
//                // echo "Update successful for PersonID: $personid<br>";
//             } else {
//                 echo "Update failed for PersonID: $personid<br>";
//             }

//             mysqli_stmt_close($stmt);
//         } else {
//             echo "Prepare statement failed<br>";
//         }
//     }
// } 
// else {
//     echo "(No records found for today).<br>";
// }


$connect->close();
?>
