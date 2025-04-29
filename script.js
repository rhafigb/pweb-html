$(document).ready(function() {
  // Smooth scrolling for anchor links
  $('a[href*="#"]').on('click', function(e) {
    e.preventDefault();
    
    $('html, body').animate(
      {
        scrollTop: $($(this).attr('href')).offset().top - 70,
      },
      500,
      'linear'
    );
  });

  // Navbar background change on scroll
  $(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
      $('.navbar-custom').addClass('navbar-scrolled');
    } else {
      $('.navbar-custom').removeClass('navbar-scrolled');
    }
  });

  // Testimonial carousel
  $('.testimonial-carousel').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      }
    }
  });

  // Form submission
  $('#contactForm').submit(function(e) {
    e.preventDefault();
    
    const formData = $(this).serialize();
    
    $.ajax({
      type: 'POST',
      url: 'send_email.php', // Replace with your backend endpoint
      data: formData,
      success: function(response) {
        $('#contactForm')[0].reset();
        alert('Pesan Anda telah terkirim! Terima kasih.');
      },
      error: function() {
        alert('Terjadi kesalahan. Silakan coba lagi nanti.');
      }
    });
  });

  // Initialize AOS animation
  AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true
  });
});
