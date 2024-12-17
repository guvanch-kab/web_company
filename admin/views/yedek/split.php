<?php
/*
$date_entries = [];
while ($row = $result->fetch_assoc()) {
    $date_entries[] = $row['Date_Entry'];
}

$processed_entries = [];

foreach ($date_entries as $date_entry) {
    list($datePart, $timePart) = explode(', ', $date_entry);
    list($day, $month, $year) = explode('.', $datePart);

    $processed_entries[] = [
        'year' => $year,
        'time' => $timePart
    ];
}
*/


// Örnek tarih (Unix zaman damgası)
$timestamp = 1719572475000 / 1000; // JavaScript'teki milisaniyeyi saniyeye çevirmek için 1000'e böleriz
$date = new DateTime("@$timestamp");
$date->setTimezone(new DateTimeZone('Asia/Ashgabat'));

// Tarihi ve saati ayrı olarak al
$dateString = $date->format('d.m.Y');
$timeString = $date->format('H:i:s');

echo $dateString .'<p>';
echo $timeString;
// İşlenmiş veriyi dizi olarak sakla
// $processed_entries = [
//     'date' => $dateString,
//     'time' => $timeString
// ];
?>

<script>
// PHP'den işlenmiş veriyi JavaScript'e aktarıyoruz
const processedEntry = <?php echo json_encode($processed_entries); ?>;

console.log('Tarih:', processedEntry.date); // Tarih: 28.06.2024
console.log('Saat:', processedEntry.time); // Saat: 12:50:02
</script>



<script>
    /*
// PHP'den işlenmiş veriyi JavaScript'e aktarıyoruz
const processedEntries = <?php echo json_encode($processed_entries); ?>;

processedEntries.forEach(entry => {
    console.log('Year:', entry.year);
    console.log('Time:', entry.time);
});
*/
</script>
