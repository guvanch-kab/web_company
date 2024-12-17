<style>
.left_l{
    clear:both;
   padding-bottom: 15px; 
   font-size: 13px;
   height: 40px;
}
a:hover {
    text-decoration: none;
}
#save{
    width: 100%;
}
    </style>

<!-- <form id="loginForm"> -->

<div  class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content" style="width:70%" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Giris</h5>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >

                <div class="form-group row">

                <div class="col-sm-12" id="giris_bolum" style="display: block;">
    <label for="phone_email" class="form-label text-right left_label" style="font-size: 13px;">Telefon belgisi ya da email<span class="text-danger">*</span></label>
    <input type="text" id="phone_email" name="phone_email" class="form-control left_label"  required />
    
    <label for="password" class="form-label text-right mt-2 left_label" style="font-size: 13px;">Parol<span class="text-danger">*</span></label>
    <input type="password" id="password" name="password" class="form-control left_label" required />
</div>

<div class="col-sm-12" id="regist_bolum" style="display: none;">
    <br>
    <input placeholder="Ady we familiýasy" type="text" id="full_name" name="full_name" class="form-control left_l" required />
    <br>
    <input type="text" id="phone_number" name="phone_number" class="form-control left_l" required placeholder="Telefon belgisi" />
    <br>
    <input type="email" id="email" name="email" class="form-control left_l" required placeholder="Email" />
    <br>
    <input type="password" id="register_password" name="register_password" class="form-control" required placeholder="Parol" />
    <br>
    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required placeholder="Paroly gaýtala" />
</div>

              
                </div>                
                
<div class="user_login" style="text-align: right; font-size: 14px; color:#7f7f7f">Hasabynyz yokmy? 
     <span style="color: #2291ff; padding-left:15px;"><strong>
        <a href="#" class="registration"  >hasaba al! </a></strong> </span>
            </div>


            <div class="user_register" style="text-align: right; font-size: 14px; color:#7f7f7f"> Ýazgyda bolsaňyz
     <span style="color: #2291ff; padding-left:15px;"><strong>
        <a href="#" class="registration"  >  Giriş ediň </a></strong> </span>
            </div>

            <!--------------------- Button click------------------------------------>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Ýap</button> -->
                <input type="submit" id="save" class="btn btn-primary waves-effect waves-light"></button>
            </div>
       
            <div class="sifre" style="text-align: right; "> 
        <a href="#" class="registration" style="color: #8f8f8f; padding-right:20px;font-size:15px;"  >  Paroly unutdym </a>
            </div>
        </div>
      
    </div>
</div>

<!-- </form> -->


<script>
$(function () { 

$("#login_register").click(function () { 
    $(".user_register").hide();
   $(".user_login").show();
    var giris_bolum = document.getElementById('giris_bolum');
    var regist_bolum = document.getElementById('regist_bolum');

    $("#save").text('Giriş')
    regist_bolum.style.display = 'none';
    giris_bolum.style.display = 'block';
});

// Registration butonuna tıklandığında
$(".registration").click(function () { 
      $(".user_register").show();
     $(".user_login").hide();
    var giris_bolum = document.getElementById('giris_bolum');
    var regist_bolum = document.getElementById('regist_bolum');

    $(".user_login").hide();
    regist_bolum.style.display = 'block';
    giris_bolum.style.display = 'none';
    $("#save").text('Hasaba al')
});

$(".user_register").click(function () { 
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

 <script src="pages/loginregister/modals/call_back_login.js" ></script> 
