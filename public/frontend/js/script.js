$(window).scroll(function () {
  if ($(document).scrollTop() > 50) {
    $("#Header").addClass("shrink");
  } else {
    $("#Header").removeClass("shrink");
  }
});

$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $("#scroll").fadeIn();
    } else {
      $("#scroll").fadeOut();
    }
  });
  $("#scroll").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
  // custom accordion

  $('.playerVideos .video-list').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow: " ",
    nextArrow: " ",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  // play video  === 
  $(".video-box .play-btn").click(function () {
    $(this).parents(".video-box").find("video").show().trigger('play');
    // $(this).parents(".video-box").find("video").play();
    $(this).parents(".video-box").find(".overlay").hide();
    $(this).parents(".video-box").find(".video-thumbnail").hide();
  })




});
