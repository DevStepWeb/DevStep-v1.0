 const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
 const toggleLogo = document.querySelector('.custom-logo');
 const currentTheme = localStorage.getItem('theme');

 if (currentTheme) {
     document.documentElement.setAttribute('data-theme', currentTheme);

     if (currentTheme === 'dark') {
         toggleSwitch.checked = true;
     }
 }

 function switchTheme(e) {
     if (e.target.checked) {
         document.documentElement.setAttribute('data-theme', 'dark');
         localStorage.setItem('theme', 'dark');


     } else {
         document.documentElement.setAttribute('data-theme', 'light');
         localStorage.setItem('theme', 'light');
     }
 }

 toggleSwitch.addEventListener('change', switchTheme, false);


 var swiper = new Swiper(".mySwiper", {
     slidesPerView: 4,
     spaceBetween: 30,
     rewind: true, 
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      },
 });


 new Swiper(".depoiments_slider", {
     slidesPerView: 1,
     spaceBetween: 30,
     rewind: true,
     navigation: {
         nextEl: ".swiper-button-next",
     },
     pagination: {
         el: ".swiper-pagination",
     },
 });
 window.onload = function () {
    setTimeout(function () { 
      AOS.init({
        once: true,
        duration: 800,
      });
      $(".parallax").parallax({
        scalarX: 10.0,
        scalarY: 10.0,
      });
    }, 1500);
  }; 
  var image = document.querySelectorAll('.hero_objects span'); 
  var instance = new simpleParallax(image, {  
    orientation: 'down', 
    overflow: true,
});  
instance.refresh();
let toggles = document.getElementsByClassName('faq-toggle');
let contentDiv = document.getElementsByClassName('faq-description');
let icons = document.getElementsByClassName('faq-icon');

for (let i = 0; i < toggles.length; i++) {
    toggles[i].addEventListener('click', () => {
        if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
            contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
            contentDiv[i].style.marginBottom = "22px";
            icons[i].classList.add('active');
        } else {
            contentDiv[i].style.height = "0px";
            contentDiv[i].style.marginBottom = "0px";
            icons[i].classList.remove('active');
        }
        for (let j = 0; j < contentDiv.length; j++) {
            if (j !== i) {
                contentDiv[j].style.height = "0px";
                contentDiv[j].style.marginBottom = "0";
                icons[j].classList.remove('active');
            }
        }
    });
}
