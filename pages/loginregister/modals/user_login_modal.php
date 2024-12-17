<style>
    .left_l {
        font-size: 14px;
        height: 45px;
        margin-bottom:8px;
    }

    .left_label {       
        margin-bottom:1px;
        font-size: 13px;
        margin-bottom: 5px;
   }

    a:hover {
        text-decoration: none;
    }

    #giris_bolum,
    #regist_bolum {
        border-bottom: 1px solid #d5d5aa;
    }
    .regist_bolum {
        border-bottom: 1px solid #d5d5aa;
    }

    #registerButton,
    #loginButton {
        width: 100%;
        height: 45px;
    }
</style>

<!-- <form id="loginForm"> -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:70%">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Giriş</h5>
                <button type="button" class="close waves-effect waves-light kapat" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="responseMessage"></div>
                <div class="form-group row">
                    <form id="gir" style="width: 100%;">
                        <div class="col-sm-12" id="giris_bolum" style="display: block;">
                            <label for="phone_email" class="form-label text-right left_label">Telefon (65 x x x x x x) ya da email<span class="text-danger">*</span></label>
                            <input type="text" id="phone_email" name="phone_email" autocomplete="off" class="form-control left_l" required />
                            
                            <label id="prl" for="password" class="form-label text-right mt-2 left_label">Parol<span class="text-danger">*</span></label>
                            <input type="password" id="sifre" name="sifre" autocomplete="off" class="form-control left_l" required />
                            
                            <div class="modal-footer" style="padding:6px 0; border-top:0px">
                                <input type="submit"  id="loginButton" class="btn btn-primary waves-effect waves-light" value="Giriş">
                            </div>
                        </div>
                    </form>
                    
                    <form id="girkaydet" style="width: 100%;">
                        <div class="col-sm-12" id="regist_bolum" style="display: none;">
                            <input placeholder="Adyňyz" type="text" id="firstname" autocomplete="off" name="firstname" class="form-control left_l" required />
                            <input placeholder="Familiýaňyz" type="text" id="surname" autocomplete="off" name="surname" class="form-control left_l" required />
                            
                            <label id="phone_error" style="display: none;"></label>
                            <input type="text" id="phone_number" name="phone_number" autocomplete="off" class="form-control left_l" required placeholder="Telefon numarasi" />
                            <input type="email" id="email" name="email" class="form-control left_l" autocomplete="off" required placeholder="Email" />
                            <input type="password" id="register_password" name="register_password" autocomplete="off" class="form-control left_l" required placeholder="Parol" />
                            <input type="password" id="confirm_password" name="confirm_password" autocomplete="off" class="form-control left_l" required placeholder="Paroly gaýtala" />

                            <div class="modal-footer kaydet" style="padding:6px 0;">
                                <input type="submit" id="registerButton" class="btn btn-primary waves-effect waves-light" value="Hasaba al">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="user_login" style="text-align: right; padding:0px 20px; font-size: 14px; color:#7f7f7f">
                    Hasabynyz yokmy?
                    <span style="color: #2291ff; padding-left:15px;">
                        <strong><a href="#" class="registration">Hasap döret!</a></strong>
                    </span>
                </div>

                <div class="user_register" style="text-align: right; padding:5px 20px; font-size: 14px; color:#7f7f7f"> 
                    Ýazgyda bolsaňyz
                    <span style="color: #2291ff; padding-left:15px;">
                        <strong><a href="#" class="registration">Giriş ediň</a></strong>
                    </span>
                </div>
<hr>
                <div class="sifre" style="text-align: right; padding:5px 20px;">
                    <a href="#" class="forgot_password" style="color:#e34915; font-size:14px; font-weight: 600;">Paroly unutdynmy?</a>
                    <i class="fa fa-lock" style="color:#808080; font-size:16px; padding-left:4px"></i>
                </div>

                <!-- Şifre Sifirlama Formu -->
                <div id="forgotPasswordSection" style="display: none; padding: 10px 0;">
                  
                <form id="forgotPasswordForm">
                        <label for="forgotEmail" class="form-label">E-poçta adresi<span class="text-danger">*</span></label>  
                     
                        <input type="email" id="forgotEmail" name="user_email_unut" class="form-control" required placeholder="E-poçta adresinizi ýazyň" />                    
                       
                       
                        <div class="modal-footer" style="padding: 6px 0;">
                            <input type="submit" id="sendResetLink" class="btn btn-primary kapat" value="Paroly täzelemek">
                            <!-- <button type="submit" value="iber" class="kapat ">Iber</button> -->
                        </div>
                    </form>
                    
                </div>

            </div>
        </div>
    </div>
</div>
    <!-- </form> -->
<script>

$(document).on('click', '.forgot_password', function(event) {
    event.preventDefault(); // Sayfanin yeniden yüklenmesini önle
    $('#forgotPasswordSection').toggle(); // Şifre sifirlama formunu göster
});

$(document).on('click', '#sendResetLink', function(event) {
    if ($('#forgotPasswordForm')[0].checkValidity()) { // Form doğrulama kontrolü
        event.preventDefault(); // Sayfanın yeniden yüklenmesini engelle
        $('#forgotPasswordForm').submit(); // Formu manuel olarak gönder
        setTimeout(function() {
            $('#forgotPasswordSection').hide(); // Form gönderildikten kısa süre sonra gizle
        }, 500); // 0.5 saniye sonra formu gizle
    }
});

////////////////////////////////////////////////////////          send email to reset password /////////////////////////////////////////////////////
$(document).on('submit', '#forgotPasswordForm', function(event) {
    event.preventDefault(); // Sayfanın yeniden yüklenmesini önle
    var email_forget = $('#forgotEmail').val(); // Kullanıcıdan alınan e-posta adresi
    var login_url = 'pages/loginregister/modals/reset_password.php';

    $.ajax({
        url: login_url,
        method: 'POST',
        data: { email_unut: email_forget },
        dataType: 'json', // Yanıtı JSON olarak işleme al
        success: function(response) {
            console.log(response); // Yanıtı konsola yazdır
            if (response.status === 'success') {
                alert(response.message);
            } else {
                alert(response.message); // Hata mesajını göster
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX Hatası:', textStatus, errorThrown); // Hata mesajlarını konsola yazdır
            alert('Bir hata oluştu: ' + textStatus); // Genel hata mesajı
        }
    });
});
</script>


    <script>
    const phoneInputField = document.getElementById('phone_number');   

    phoneInputField.value = "+993";

    phoneInputField.addEventListener('input', function () {
        const maxLength = 12; // "+993" dahil toplam 12 karaktere izin ver
        let value = phoneInputField.value;
        if (!value.startsWith("+993")) {
            value = "+993" + value.replace("+993", ""); // Sabit kismi koru
        }
        if (value.length > maxLength) {
            value = value.slice(0, maxLength);
        }
        phoneInputField.value = value;
    });
    // Input alanina odaklanildiğinda imleci sabit kismin sonuna getir
    phoneInputField.addEventListener('focus', function() {
        if (phoneInputField.value === "+993") {
            phoneInputField.setSelectionRange(4, 4); // İmleci 4. karaktere ayarla
        }
    });
</script>



    <script>
        $(function() {

            // İlk başta giriş bölümünü göster, kayit bölümünü gizle

            $("#login_register").click(function() {
                $(".user_register").hide();
                $(".user_login").show();

                var giris_bolum = document.getElementById('giris_bolum');
                var regist_bolum = document.getElementById('regist_bolum');

                $("#save").text('Giriş')
                regist_bolum.style.display = 'none';
                giris_bolum.style.display = 'block';
            });

            // Registration butonuna tiklandiğinda
            $(".registration").click(function() {
                $(".user_register").show();
                $(".user_login, .sifre").hide();
                var giris_bolum = document.getElementById('giris_bolum');
                var regist_bolum = document.getElementById('regist_bolum');

                $(".user_login").hide();
                regist_bolum.style.display = 'block';
                giris_bolum.style.display = 'none';
                $("#save").text('Hasaba al')
            });

            $(".user_register").click(function() {
                $(".user_register").hide();
                $(".user_login, .sifre").show();
                var giris_bolum = document.getElementById('giris_bolum');
                var regist_bolum = document.getElementById('regist_bolum');

                regist_bolum.style.display = 'none';
                giris_bolum.style.display = 'block';
                $("#save").text('Giriş')
            });
        });
    </script>


    <script>
      $(document).ready(function() {
    
        $("#loginButton").click(function(e) {
        e.preventDefault(); // Formun varsayılan gönderimini engelle

        var phone_email = $('#phone_email').val();
        var sifre = $('#sifre').val();

        // Boş değilse AJAX çağrısı yap
        if (phone_email !== "" && sifre !== "") {
            $.ajax({
                url: 'pages/loginregister/modals/login.php', // PHP dosyasının yolu
                method: 'POST',
                data: {
                    phone_email: phone_email,
                    sifre: sifre,
                },
                success: function(response) {
                    if (response === 'super_admin') {                      
                        
                        window.location.href = '/admin/index.html';
                    } else if (response === 'success') {
                        // Normal kullanıcıysa ana sayfaya yönlendir
                        window.location.href = '../../../index.html';
                    } else if (response === 'error_user') {
                        // Hatalı giriş, hata mesajı göster ve modali kapatma
                        $("#sifre").css("border-color", "red");
                        $("#phone_email").css("border-color", "red");
                        $("#prl").text("* Ulanyjy ýa-da parol ýalňyş").css("color", "red");
                    }
                },
                error: function() {
                    // Sunucu hatası durumunda mesaj göster
                    $("#prl").text("* Sunucu hatası, lütfen daha sonra tekrar deneyin.").css("color", "red");
                }
            });
        } else {
            // Form boşsa hata mesajı göster
            $("#prl").text("* Gerekli ýerleri dolduryň").css("color", "red");
            $("#phone_email, #sifre").css("border-color", "red");
        }
    });

////////////////////////////////////////////////////////////////////

$('#girkaydet').on('submit', function (e) {
    e.preventDefault(); // Formun otomatik olarak yeniden yüklenmesini önler

var password = $('#register_password').val();
    var confirmPassword = $('#confirm_password').val();

    if (password !== confirmPassword) {
        alert("Parollar bir birine deň däl. Tazeden sysnanysyn.");
        return; // Şifreler eşleşmezse, form gönderilmez
    }
    var phoneNumber = $(this).find('input[name="phone_number"]').val();
    
    if (!check_phone_digit(phoneNumber)) {    
        $("#phone_error").css("display","block")
       $("#phone_error").text("* 65, 64, 63, 62, 71 bilen başlaýan sanlar bolmaly")
    .css({
        "color": "red",
        "font-size": "12px",
        "padding-top": "6px",
        "margin-top": "10px",
        "margin-bottom": "6px"
    });
            $("#phone_error").css("border-color", "red");

        return; // Formun gönderilmesini engeller
        }
        var rbaha = Math.floor(Math.random() * 100000);
        var cl_id = Math.random().toString(36).slice(-16) + rbaha;

        var formData = $(this).serialize() + "&cl_id=" + encodeURIComponent(cl_id)
        
    //var formData = $(this).serialize(); // Form verilerini al

    $.ajax({
        type: 'POST',
        url: 'pages/loginregister/modals/register.php', // PHP dosyanizin yolu
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
               // alert(response.message);
                $('#girkaydet')[0].reset(); // Formu sifirla

                regist_bolum.style.display = 'none';
                giris_bolum.style.display = 'block';
                    // Başari mesajini göster
                    $('#responseMessage').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        
                            ${response.message}
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
    </button>
                        </div>
                    `);
                } else if (response.status === 'error') {
                    // Hata veya duplicate mesajini göster
                    $('#responseMessage').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${response.message}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
    </button>
                        </div>
                    `);
                }
        },
        error: function () {
            alert('Bir hata oluştu. Lütfen tekrar deneyin.');
        }
    });
    function check_phone_digit(phone_digit) {
    const phone_num = [65, 64, 63, 62, 61, 71];
    const firstTwoDigits =Number(String(phone_digit).slice(4, 6)); // slice(0.2)

    if (phone_num.includes(firstTwoDigits)) {
        console.log(`${firstTwoDigits} dizide mevcut.`);
        return true; // Doğruysa true döndür
    } else {
        return false; // Yanlişsa false döndür
    }
}
});
});
    </script>
    <!-- <script src="pages/loginregister/modals/call_back_login.js"></script> -->