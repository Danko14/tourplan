var hotelSlider = new Swiper(".hotel-slider", {
  // Optional parameters
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: ".hotel-slider__button--next",
    prevEl: ".hotel-slider__button--prev",
  },
  effect: "coverflow",
});
var reviewSlider = new Swiper(".review-slider", {
  // Optional parameters
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: ".review-slider__button--next",
    prevEl: ".review-slider__button--prev",
  },
});

var menuButton = document.querySelector(".menu-button");
menuButton.addEventListener("click", function () {
  console.log('Клик по кнопке "меню"');
  document
    .querySelector(".navbar-bottom")
    .classList.toggle("navbar-bottom--visible");
});
