<?php
//$today = date('Y-m-d');





?>
<div class="col-md-12" id="netij">

    <div class="row" style="padding:7px 16px;">

        <div class="col-md-6" style="margin-top:10px;color:#757575">
            <h4></h4>
        </div>

        <div class="col-md-2 senetakvimi">
            <select class="form-control select_reason custom-input" id="neden" name="neden[]">
                
                
            </select>
        </div>
        <div class="col-md-2 senetakvimi">
            <input type="date" id="exit_date" class="form-control custom-input">
        </div>
        <div class="col-md-2 senetakvimi">
            <input type="date" id="entry_date" class="form-control custom-input">
        </div>
    </div>
 





    <div class="container mt-5 ">
    <h2>Haryt giriş formy</h2>

    <form action="" method="post" >
    <div class="row" style="padding: 10px 0;">
    <div class="col">
    <label for="name">Haryt Ady:</label>
      <input type="text" class="form-control" placeholder="Haryt Ady" id="name" name="name" required>

    </div>
    <div class="col">
    <label for="exampleFormControlSelect1">Kategoriya sayla</label>
            <select class="form-control" id="exampleFormControlSelect1" required>
                <option selected disabled value="">Kategoriya sayla</option>
                <option>ARAMATUR</option>
                <option>PROFIL</option>
                <option>TURBA</option>
                <option>BOYAG</option>
                <option>GURALLAR</option>
            </select>
            </div>
  </div>

        <div class="form-group" style="padding-bottom: 10px;">
            <label for="message">Bellik:</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Ginisleyin maglumat doldur" required></textarea>
        </div>

        <div class="row" style="padding-bottom: 10px;">
    <div class="col">
    <label for="name">Meter uzynlygy:</label>
      <input type="number" class="form-control" placeholder="San giriz" id="name" name="name" required>

    </div>
    <div class="col">
    <label for="name">1 metrin agramy:</label>
      <input type="number" class="form-control" placeholder="San giriz"  required>

    </div>
  </div>

        <div class="form-group" style="padding-bottom: 10px;">
    <label for="exampleFormControlFile1">Harydyn suradyny goy</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" style="border: 1px solid #aeb3b3;">
  </div>


       <button type="submit" class="btn btn-primary">Sakla</button>
    </form>
</div>

    <!----------------------------- add value to php ------------------------------->
    


    <div class="row">
        <div class="col-sm-12 col-md-5">
       
            <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite"></div>
       
        </div>
        <div class="col-sm-12 col-md-7">
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<script src="public/all_reason_show.js"></script>
<script src="public/js/sil.js"></script>