$(document).ready(function () {

  $(".carrousel").slick({
    infinite: true,
    slidesToShow: 3,
    centerMode: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    prevArrow: $("#previus-carrousel-categorias"),
    nextArrow: $("#next-carrousel-categorias"),
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },

      {
        breakpoint: 360,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1

        }
      }
    ]

  })
  AOS.init();



});