 <?php
    //$_SESSION = [];
    session_start(); // Eğer session başlatılmadıysa, session'ı başlatıyoruz
    session_unset();
    session_destroy();
   //  echo' <script> window.location.href = "index.html" </script>;';
    //header("Location:index.html");
   // exit();

   echo json_encode(['status' => 'success', 'message' => 'Session destroyed successfully']);
exit();
    ?>
