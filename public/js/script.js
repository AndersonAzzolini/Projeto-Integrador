$(document).ready(function () {




  $(".carrousel").slick({

    slidesToShow: 3,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
    prevArrow: $("#btn-previus-slide"),
    nextArrow: $("#btn-next-slide"),
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          centerMode:true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          centerMode:true

          }
      },
      {
        breakpoint: 425,
        settings: {
          slidesToShow: 1,

          }
      }
    ]

  })
  AOS.init();



});