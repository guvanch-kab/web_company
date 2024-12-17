

$(function() {   
    
    fetch('/pages/session_user.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.text();
        })
        .then(text => {
         //   console.log('Raw response:', text); // Yanıtı konsolda görüntüleyin

            try {
                const data = JSON.parse(text); // Yanıtı elle JSON'a çevir
               
               // console.log("Sunucudan gelen veri:", data);
                if (data && data.name) {                              
                        $("#client_name").val(data.name);
                        $("#client_surname").val(data.surname);
                        $("#email_add").val(data.email);
                        $("#client_phone").val(data.phone);
                        $("#pass_word").val(data.pass_word);
                        $("#client_id").val(data.client_id);
                        
                }
            } catch (e) {
                console.error('JSON parsing error:', e); // JSON hatasını yakalayın
            }
        })
        .catch(error => {
            console.error('Fetch error:', error); // Fetch işlemi hatasını yakalayın
        });    
});

/////////////////////////////////////////////////////////////////////////////////////////////////////

$(function() {
    $('.btn.profil_oz').on('click', function(e) {
        e.preventDefault(); 

        var clientName = $('#client_name').val();
        var clientSurname = $('#client_surname').val();
        var clientPhone = $('#client_phone').val();
        var emailAdd = $('#email_add').val();
        var password = $('#pass_word').val();        
        var cl_id = $('#client_id').val(); // Düzeltme

       

       // console.log(clientName, clientSurname, clientPhone, emailAdd, password, cl_id); 
        // AJAX isteği gönder
        $.ajax({
            url: 'pages/loginregister/account_update.php', // PHP dosyasının yolu
            type: 'POST',
            data: {
                name: clientName,
                surname: clientSurname,
                phone: clientPhone,
                email: emailAdd,
                password: password,
                cl_id: cl_id                           
            },
            success: function(response) {
                console.log('AJAX Response:', response); // Yanıtı kontrol edin
                try {
                    var jsonResponse = JSON.parse(response); // Yanıtın JSON olup olmadığını kontrol edin
                    
                    if (jsonResponse.status === 'success') {
                        $('#formResult').html('<div class="alert alert-success">Üstünlikli üýtgedildi</div>');
        
                        // session_user.php'den yeni verileri almak
                        fetch('/pages/session_user.php')
                            .then(response => response.json())
                            .then(data => {
                                if (data && data.name) {
                                    $("#client_name").val(data.name);
                                    $("#client_surname").val(data.surname);

                                    //console.log(data.surname);

                                    $("#email_add").val(data.email);
                                    $("#client_phone").val(data.phone);
                                    $("#pass_word").val(data.pass_word);
                                   // $("#client_id").val(data.client_id);
                                }
                            });
        
                    } else {
                        $('#formResult').html('<div class="alert alert-warning">' + jsonResponse.message + '</div>');
                    }
                } catch (e) {
                    $('#formResult').html('<div class="alert alert-warning">Bir hata oluştu. Yanıt işlenemedi.</div>');
                  //  console.error('Yanıt işlenirken hata oluştu:', e);
                }
            },
            error: function(xhr, status, error) {
                $('#formResult').html('<div class="alert alert-danger">Bir hata oluştu. Lütfen tekrar deneyin.</div>');
            }
        });
        
    });
}); 