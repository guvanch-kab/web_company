function yazdir() {
    //var phpValue = <?= json_encode($t); ?>;

    var divToPrint = document.getElementById('bootstrap-data-table-export');
    var textElement = document.getElementById('isgar_sany');

    var printWindow = window.open('', '', 'height=600,width=800');

    // Include your CSS styles directly in the print window
    var printContents = `
        <html>
            <head>
                <title>Print</title>
                <style>
                    body { font-size:12px; }
                    .content { margin-bottom: 20px; }
                    table {font-size:12px; border-collapse: collapse; width: 100%; }
                    th, td { border: 1px solid #ddd; padding: 8px; }
                    th { background-color: #f2f2f2; }
                    .text-element { margin-bottom: 20px; font-weight: bold; }
                </style>
            </head>
            <body>
                <div class="content">
                    <div class="text-element">
                       
                    </div>
                    <div>${textElement.outerHTML}</div>
                    <br><br>
                    <div>${divToPrint.outerHTML}</div>
                </div>
            </body>
        </html>
    `;

    // Write the content to the new window
    printWindow.document.write(printContents);
    printWindow.document.close(); // Close the document for printing

    // Trigger the print dialog
    printWindow.focus(); // Focus on the new window
    printWindow.print(); // Print the new window
}