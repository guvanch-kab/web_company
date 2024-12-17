<?php
            ////////////////////////// TIME _ REASON ////////////////////////////////////////

include_once '../config/dbase_accessdata.php';
$today = date('Y-m-d');// '2024-07-16';   

$query = "SELECT * FROM Daily_leave ";
$result = mysqli_query($connect, $query);

if ($result->num_rows > 0) {
    echo '<table class="table table-striped" style="text-align: center; vertical-align: middle;">
            <thead>
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

    while ($row = $result->fetch_assoc()) {
       $cellColor = ($row['Time_arrive'] < $row['Result_time']) ? 'background-color: #ffcccc;' : '';
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['PersonID']) . '</td>';
        echo '<td>' . htmlspecialchars($row['PersonName']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Department']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Date_leave']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Time_leave']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Time_arrive']) . '</td>';
        echo '<td style="' . $cellColor . '">' . ($row['Result_time']) . '</td>'; // Renklendirilen hücr
      // echo '<td>' . ($row['Result_time']) . '</td>'; // Renklendirilen hücr
        echo '<td>' . htmlspecialchars($row['Reason']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Others']) . '</td>';
        echo '</tr>';
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
$query = "
SELECT controlgate1_exit.*, controlgate1.*
FROM controlgate1
JOIN  controlgate1_exit
ON controlgate1_exit.PersonID = controlgate1.PersonID 
WHERE controlgate1.DateEntry = '$today'
AND controlgate1.TimeEntry = (
    SELECT MAX(controlgate1.TimeEntry)
    FROM controlgate1
    WHERE controlgate1_exit.PersonID = controlgate1.PersonID
    AND controlgate1.DateEntry = '$today'
);";

$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      
        $personid = $row['PersonID'];
        $timeentry = $row['TimeEntry'];
        $timeexit = $row['Time_exit']; // Time_exit verisini alıyoruz
        
        if (!empty($timeexit)) {
            if (strtotime($timeentry) > strtotime($timeexit)) {
                echo "PersonID: $personid - Entry Time is later than Exit Time.<br>";
         
        
        //$timearrive = $row['Time_arrive'];
// echo $personid.'<br>';
// echo $timeentry.'<br>';
        $update_query = "
        UPDATE controlgate1_exit 
        SET Entry_time = '$timeentry'
        WHERE PersonID = '$personid' AND (Entry_time='' OR Entry_time IS NULL) AND Time_exit!='' ";
        mysqli_query($connect, $update_query);
     }
      }   
     }
    } 
////////////////////////////  IZIN ALANI KONTROLU

$query3 = "
SELECT controlgate1_exit.*, Daily_leave.*
FROM controlgate1_exit
JOIN Daily_leave
ON controlgate1_exit.PersonID = Daily_leave.PersonID 
WHERE controlgate1_exit.Date_exit = '$today'
AND Daily_leave.Date_leave = '$today' 
AND Daily_leave.Izin = 'Rugsat'";

$result3 = mysqli_query($connect, $query3);

if (mysqli_num_rows($result3) > 0) {
    while($row = mysqli_fetch_assoc($result3)) {
        $personid = $row['PersonID'];
        $timeentry = $row['Entry_time'];
        
        // Prepare the update query
        $update_query = "
        UPDATE Daily_leave SET Result_time = ?   WHERE PersonID = ?  AND (Result_time='' OR Result_time IS NULL)";        

        if ($stmt = mysqli_prepare($connect, $update_query)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ss", $timeentry, $personid);            

            if (mysqli_stmt_execute($stmt)) {
               // echo "Update successful for PersonID: $personid<br>";
            } else {
                echo "Update failed for PersonID: $personid<br>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Prepare statement failed<br>";
        }
    }
} 
// else {
//     echo "(No records found for today).<br>";
// }


$connect->close();
?>
