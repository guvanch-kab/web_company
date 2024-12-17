

    $(document).ready(function() {

        var param = localStorage.getItem('param'); 

        $.ajax({
            url: 'pages/sifer/shifer.php', // Sunucu tarafındaki PHP dosyası
            method: 'POST',
            data: { page: param },
            dataType: 'json', // JSON formatında veri beklediğimizi belirtiyoruz
            success: function(response) {
                
                if (response && response.items) {    

                    localStorage.removeItem('param');                  
                     
                    $('.newsHeaderWrapper').empty();                    
                    $.each(response.items, function(index, item) {
                        var newsItemHtml = `
                            <div class="newsItem">
                                <img src="${item.imgSrc}" alt="">
                                <h5 class="show_detail">${item.title} &nbsp; ${item.size}</h5> 
                            </div>
                        `;                       
                        $('.newsHeaderWrapper').append(newsItemHtml);
                       
                    });
                    $('.separator').show(); // Tüm separatorları göster
                    $('#sifer_ady').text(response.items[0].title); 
                    $('#count_roofs').text(response.rowCount + " sany");
              
              
                    $('.newsHeaderWrapper').on('click', '.show_detail', function(e) {
                        e.preventDefault();

                        var clickedTitle = $(this).text();
                       // var roof_price='';
                    
                        $(".accordion_place").load("pages/sifer/sifer_accordion.html", function() {
                            $(".accordion_prof").text(clickedTitle);

                            let addedThickness = [];
                            let addedColors = [];
                            var radioButtonsHtml = '';
                            
                            $.each(response.items, function(index, item) {
                                // Eğer thickness daha önce eklenmemişse
                                if (!addedThickness.includes(item.thickness)) {
                                    radioButtonsHtml += `
                                        <div class="radio_size" style="padding-left: 15px;">
                                            <input class="form-check-input" type="radio" id="price-${index}" name="priceOptions" value="${item.thickness}">
                                            <label class="form-check-label" for="price-${index}">${item.title} - ${item.thickness}</label>
                                        </div>
                                    `;
                            
                                    // Eklenen thickness değerini diziye ekle
                                    addedThickness.push(item.thickness);
                                }

                            });                             
                            $.each(response.items, function(index, item) {
                                // Eğer color_name daha önce eklenmemişse
                                if (!addedColors.includes(item.color_code)) {
                                    var colorDivsHtml = `
                                        <div class="box_custom" data-toggle="tooltip" data-placement="top" title="${item.color_name}" style="background-color: ${item.color_code};" data-original-color="${item.color_code}"></div>
                                    `;                            
                                    $('#colorContainer').append(colorDivsHtml);
                            
                                    // Eklenen color_name değerini diziye ekle
                                    addedColors.push(item.color_code);
                                }
                            });

                            $('#thickness_roof').html(radioButtonsHtml); // radioButtonsContainer, HTML'de tanımladığınız bir id olmalıdır
                          

                        });                     
                    });
              
                } else if (response.error) {
                    console.log(response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX hatası: " + error);
            }
        });
    

        });
        


