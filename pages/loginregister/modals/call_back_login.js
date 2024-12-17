$(document).ready(function() {
    // Giriş ve kayıt işlemleri için genel doğrulama fonksiyonu
    function validateInput(selector) {
        var value = $(selector).val();
        if (value === '') {
            $(selector).addClass('is-invalid').removeClass('is-valid');
            return false;
        } else {
            $(selector).removeClass('is-invalid').addClass('is-valid');
            return true;
        }
    }

    // Form doğrulama ve AJAX işlemleri için ortak fonksiyon
    function submitForm(url, data, formId) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',  // Expect JSON response
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#girkaydet')[0].reset();
                    $('.form-control').removeClass('is-invalid is-valid');
                } else {
                    alert(response.message);
                }
            },
        });
    }

    // Kayıt işlemi için
    $('#registerButton').on('click', function(e) {
        e.preventDefault();

        var isValid = validateInput('#full_name') & validateInput('#phone_number') &
                      validateInput('#email') & validateInput('#register_password') & 
                      validateInput('#confirm_password');

        if ($('#register_password').val() !== $('#confirm_password').val()) {
            $('#confirm_password').addClass('is-invalid').removeClass('is-valid');
            alert('Parollar gabat gelmeýär!');
            isValid = false;
        }

        if (isValid) {
            submitForm('pages/loginregister/modals/register.php', {
                full_name: $('#full_name').val(),
                phone_number: $('#phone_number').val(),
                email: $('#email').val(),
                register_password: $('#register_password').val(),
                confirm_password: $('#confirm_password').val()
            }, '#girkaydet');
        }
    });
});
