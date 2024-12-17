    metallimg = ['arm2', 'arm02', 'pipebest', 'prof1', 'prof2', 'pipe1'];
    for (a of metallimg) {
        var aa = '<div class="col-md-2"><div class="card customsize" style="border-radius: 8px;"> <img  class="card-img-top customimg" src="images/' + a + '.jpg" ></div></div>';
        $("#addcard").append(aa)
    }       
