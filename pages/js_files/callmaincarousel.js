$(document).ready(function () {
  $('#select_owl').load('pages/components/carousel_banner/owl.php', function () {
    // OwlCarousel başlatma kodu, içerik yüklendikten sonra
    $("#owl-demo").owlCarousel({
      nav: true, // Show next and prev buttons
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
      autoplayTimeout: 3000, // 5 saniyede bir kaydır (5000 milisaniye)
      autoplayHoverPause: true, // Fareyle üzerine gelindiğinde kaydırmayı durdur
      animateOut: 'fadeOut', // Çıkış animasyonu
      animateIn: 'fadeIn', // Giriş animasyonu
      loop: true // Tekrar döngüsü etkinleştir
    });
  });
////////////////////////********************* yeni kod  ******************************//////////////////////////////////////
/*
$('#owl_reklam').load('pages/components/owl_reklam_banner.html', function () {
  // OwlCarousel başlatma kodu, içerik yüklendikten sonra
  $("#reklam_owl").owlCarousel({  
    slideSpeed: 300,
    paginationSpeed: 400, 
    autoplay: true, // Otomatik kaydırma etkinleştir
    autoplayTimeout: 3000, // 5 saniyede bir kaydır (5000 milisaniye)   
    animateOut: 'fadeOut', // Çıkış animasyonu
    animateIn: 'fadeIn', // Giriş animasyonu
    loop: true // Tekrar döngüsü etkinleştir
  });
});

*/





});
