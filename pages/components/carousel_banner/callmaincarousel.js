$(document).ready(function () {
  $('#select_owl').load('pages/components/carousel_banner/owl.php', function () {
   
    var owl = $("#owl-demo");
    $("#owl-demo").css({"overflow":"hidden"}); 
    owl.owlCarousel({
        nav: true, // İleri ve geri düğmeleri göster
        navText: [
            '<i class="fas fa-chevron-left"></i>', // Sol navigasyon ikonu
            '<i class="fas fa-chevron-right"></i>' // Sağ navigasyon ikonu
        ],
        dots: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 1,
        itemsDesktop: false,
        itemsDesktopSmall: false,
        itemsTablet: false,
        itemsMobile: false,
        autoplay: true, // Otomatik kaydırma etkinleştir
        autoplayTimeout: 3000, // 3 saniyede bir kaydır (3000 milisaniye)
        autoplayHoverPause: true, // Fareyle üzerine gelindiğinde kaydırmayı durdur
        animateOut: 'fadeOut', // Çıkış animasyonu
        animateIn: 'fadeIn', // Giriş animasyonu
        loop: true, // Tekrar döngüsü etkinleştir
        onTranslated: function (event) {
            // Geçerli kaydırılan öğeyi alın
            var currentItem = owl.find(".owl-item.active .item img");
            // Verileri alın ve HTML elemanlarına yerleştirin
            var title = currentItem.data("title");
            var description = currentItem.data("description");
            $('#title_carousel').text(title);
            $('#content_carousel').text(description);
        }
    });

    // İlk resim yükleme işlemi
    var firstItem = owl.find(".owl-item.active .item img");
    $('#title_carousel').text(firstItem.data("title"));
    $('#content_carousel').text(firstItem.data("description"));
});
});
