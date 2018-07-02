/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'bootstrap'

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

// Social butons share
const share = function () {
  function popupCenter (url, title, width, height) {
    let popupWidth = width || 640
    let popupHeight = height || 440
    let windowLeft = window.screenLeft || window.screenX
    let windowTop = window.screenTop || window.screenY
    let windowWidth = window.innerWidth || document.documentElement.clientWidth
    let windowHeight = window.innerHeight || document.documentElement.clientHeight
    let popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2
    let popupTop = windowTop + windowHeight / 2 - popupHeight / 2
    window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft)
  }

  let twitter = document.querySelector('.share_twitter')
  if (twitter) {
    twitter.addEventListener('click', function (e) {
      e.preventDefault()
      let url = this.getAttribute('data-url')
      let shareUrl = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + '&via=laravelcm' + '&url=' + encodeURIComponent(url)
      popupCenter(shareUrl, 'Partager sur Twitter')
    })
  }

  let facebook = document.querySelector('.share_facebook')
  if (facebook) {
    facebook.addEventListener('click', function (e) {
      e.preventDefault()
      let url = this.getAttribute('data-url')
      let shareUrl = 'https://facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url)
      popupCenter(shareUrl, 'Partager sur Facebook')
    })
  }

  let linkedin = document.querySelector('.share_linkedin')
  if (linkedin) {
    linkedin.addEventListener('click', function (e) {
      e.preventDefault()
      let url = this.getAttribute('data-url')
      let shareUrl = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(url)
      popupCenter(shareUrl, 'Partager sur LinkedIn')
    })
  }
}
share()
