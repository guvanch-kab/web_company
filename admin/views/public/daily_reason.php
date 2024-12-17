<?php

                ////////////////////////// DAILY _ REASON ////////////////////////////////////////

include_once '../config/dbase_accessdata.php';
$today = date('Y-m-d');



$query = "SELECT * FROM Reason_type WHERE Result_time='2' AND Exit_date='$today'";
$result = mysqli_query($connect, $query);

if ($result->num_rows > 0) {
    $i=0;
    echo '<table class="table table-striped" style="text-align: center; vertical-align: middle;">
            <thead>
                <tr>
                    <th scope="col">PersonID</th>
                    <th scope="col">Ady we familiýasy</th>
                    <th scope="col">Bölümi</th>                    
                    <th scope="col">Gidýän güni</th>
                    <th scope="col">Gelmeli güni</th>           
                    <th scope="col">Gidiş sebäbi</th>
                    <th scope="col">Beýleki sebäpler</th>
                    <th scope="col">Rugsat görnüşi</th>
                </tr>
            </thead>
            <tbody>';
            $date_exit=array();
            $date_arrive=array();
    while ($row = $result->fetch_assoc()) {      

        $date1=date_create($row['Exit_date']); 
        $date_exit[]=date_format($date1,"d-m-Y");

        $date2=date_create($row['Entry_date']); 
        $date_arrive[]=date_format($date2,"d-m-Y");

        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['PersonID']) . '</td>';
        echo '<td>' . htmlspecialchars($row['PersonName']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Department']) . '</td>';
        echo '<td>' . htmlspecialchars($date_exit[$i]) . '</td>';
        echo '<td>' . htmlspecialchars($date_arrive[$i]) . '</td>';
        echo '<td>' . htmlspecialchars($row['Reason']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Others']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Reason_type']) . '</td>';
        echo '</tr>';
        $i++;
    }

    echo '</tbody></table>';
} else {
    echo '<div class="alert alert-warning">Bugün rugsat alan tapylmady.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
    </div>';
}


// Bağlantıyı kapat
$connect->close();

?>
