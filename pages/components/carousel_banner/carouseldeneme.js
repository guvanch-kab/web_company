$(document).ready(function () {
  $.ajax({
    url: 'pages/components/carousel_banner/fetch_carousel.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      if (data && data.titles.length > 0) {
        // Başlangıçta ilk resmi ve açıklamayı göster
        var currentIndex = 0;
        updateContent(currentIndex);

        // Slider'ı dinamik olarak oluşturmak için
        var carouselContent = '';
        for (var i = 0; i < data.images.length; i++) {
          carouselContent += '<div class="item"><img src="pages/images/banner_img/' + data.images[i] + '" alt="' + data.titles[i] + '"></div>';
          carouselContent += '<div class="">' + data.titles[i] + '</div>';
          carouselContent += '<div class="">' + data.descriptions[i] + '</div>';
        }

        $('#select_owl').html(carouselContent);

        // OwlCarousel başlatma kodu
        $("#owl-demo").owlCarousel({
          nav: true,
          navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
          ],
          dots: false,
          slideSpeed: 300,
          paginationSpeed: 400,
          items: 1,
          autoplay: true,
          autoplayTimeout: 3000,
          autoplayHoverPause: true,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',
          loop: true
        });

        // Belirli bir süre sonra resim ve yazıyı değiştirmek için interval ayarlama
        setInterval(function() {
          currentIndex++;
          if (currentIndex >= data.images.length) {
            currentIndex = 0; // Sona gelindiğinde başa dön
          }
          updateContent(currentIndex);
        }, 5000); // Her 5 saniyede bir değiştir (5000 milisaniye)
      }
    },
    error: function(xhr, status, error) {
      console.error('Veri yükleme hatası:', error);
    }
  });

  // Verileri güncellemek için fonksiyon
  function updateContent(index) {
    $('#title_carousel').text(data.titles[index]);
    $('#content_carousel').text(data.descriptions[index]);
    // Eğer OwlCarousel'in de değişmesini istiyorsanız, buraya ekleme yapabilirsiniz.
  }
});
