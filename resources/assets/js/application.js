/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

let carousel = document.querySelector('#partners_carousel')

if (carousel) {
  import('./libs/owl.carousel.min').then((owlCarousel) => {
    $("#partners_carousel").owlCarousel({
      navigation: false, // Show next and prev buttons
      slideSpeed: 500,
      paginationSpeed: 400,
      autoplay: true,
      dots: false,
      loop: true,
      responsive: {
        600: {
          items: 2,
          nav: false
        },
        1024: {
          items: 4,
          nav: false
        }
      }
    })
  })
}

// Add return on top button
let div = document.createElement('div')
div.setAttribute('id', 'returnOnTop')
div.setAttribute('title', 'Return on top page')
div.innerHTML = '<i class="icon ion-ios-arrow-up"></i>'
document.body.appendChild(div)
// On button click, let's scroll up to top
div.addEventListener('click', function (e) {
  e.stopPropagation()
  $('html,body').animate({scrollTop: 0}, 'slow')
})
/* Action during windows scroll */
$(window).scroll(function () {
  if ($(window).scrollTop() === 0) {
    $('#returnOnTop').fadeOut()
  } else {
    $('#returnOnTop').fadeIn()
  }
})

// Menu slide mobile
$('#menu-drawer').on('click tap', function (e) {
  e.preventDefault()
  $('body span.overlay').show()
  $('#slide-menu').css({
    'right': '0'
  })
})
// Hide menu on body click
$('body span.overlay').on('click tap', function (e) {
  e.preventDefault()
  $('#slide-menu').css({
    'right': '-600px'
  })
  $('body .overlay').hide()
})
