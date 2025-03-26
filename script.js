// Smooth scrolling untuk navigasi
const navSectionMap = {
    'HOME': 'HOME',
    'ABOUT': 'ABOUT',
    'KEAHLIAN': 'KEAHLIAN',
    'MENGAPA MEMPERKERJAKAN SAYA': 'MENGAPA',
    'KONTAK': 'KONTAK'
  };
  
  document.querySelectorAll('.navbar > div').forEach(navItem => {
    navItem.addEventListener('click', function() {
      const navText = this.textContent.replace(/\s+/g, ' ').trim();
      const sectionClass = navSectionMap[navText];
      
      if (sectionClass) {
        const section = document.querySelector(`.${sectionClass}`);
        if (section) {
          section.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    });
  });
  
  // Scroll ke portfolio dari button "Jelajahi Portofolio"
  document.querySelector('.jelajahi-portofolio').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.PORTFOLIO').scrollIntoView({ 
      behavior: 'smooth',
      block: 'start'
    });
  });
  
  // Scroll ke kontak dari button "Jadwalkan Konsultasi"
  document.querySelector('.frame-6').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.KONTAK').scrollIntoView({ 
      behavior: 'smooth',
      block: 'start'
    });
  });
  
  // Highlight navigasi aktif saat scroll
  const sections = document.querySelectorAll('.HOME, .ABOUT, .KEAHLIAN, .MENGAPA, .KONTAK');
  const navItems = document.querySelectorAll('.navbar > div');
  
  const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const sectionClass = entry.target.classList[0];
        Object.entries(navSectionMap).forEach(([navText, sectionName]) => {
          if (sectionName === sectionClass) {
            navItems.forEach(navItem => {
              const itemText = navItem.textContent.replace(/\s+/g, ' ').trim();
              navItem.classList.toggle('active', itemText === navText);
            });
          }
        });
      }
    });
  }, observerOptions);
  
  sections.forEach(section => observer.observe(section));
  
  // Interaksi button portfolio
  document.querySelectorAll('.div-wrapper, .frame-11, .frame-13').forEach(button => {
    button.addEventListener('click', function() {
      alert('Projek akan ditampilkan di sini!');
    });
  });
  
  // Form handling (memerlukan penyesuaian HTML untuk input yang valid)
  document.querySelector('.frame-15').addEventListener('click', function(e) {
    e.preventDefault();
    
    // Dapatkan nilai input (asumsi HTML menggunakan elemen input yang valid)
    const name = document.querySelector('.rectangle-11').value;
    const email = document.querySelector('.rectangle-12').value;
    const subject = document.querySelector('.rectangle-13').value;
    const message = document.querySelector('.rectangle-14').value;
  
    if (name && email && subject && message) {
      alert('Terima kasih! Pesan Anda telah terkirim.');
      // Reset form
      document.querySelectorAll('.rectangle-11, .rectangle-12, .rectangle-13, .rectangle-14').forEach(input => {
        input.value = '';
      });
    } else {
      alert('Harap lengkapi semua field!');
    }
  });