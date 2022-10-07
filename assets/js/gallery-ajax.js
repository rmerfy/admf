document.addEventListener("DOMContentLoaded", () => {
  if (document.querySelector(".gallery-wrapper")) {
    // check is mobile

    const isMobile = {
      Android: function () {
        return navigator.userAgent.match(/Android/i);
      },
      BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
      },
      iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
      },
      Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
      },
      Windows: function () {
        return navigator.userAgent.match(/IEMobile/i);
      },
      any: function () {
        return (
          isMobile.Android() ||
          isMobile.BlackBerry() ||
          isMobile.iOS() ||
          isMobile.Opera() ||
          isMobile.Windows()
        );
      },
    };

    $(".single-page").addClass("loading");
    onload = () => {
      $(".single-page").removeClass("loading");
    };

    const galleryBtns = document.querySelectorAll(".gallery-btn");
    for (let i = 0; i < galleryBtns.length; i++) {
      galleryBtns[i].addEventListener("click", (e) => {
        sendAjax(i);
        $('.gallery-btn').removeClass('gallery-btn--act');
        $('.gallery-btn').eq(i).addClass('gallery-btn--act');
      });
    }

    function sendAjax(page) {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "gallery_posts",
          page: page,
        },
        beforeSend: function (xhr) {
          $(".single-page").addClass("loading");
          window.scrollTo({
            top: 0,
          });
        },
        success: function (res) {
          $(".gallery-wrapper").html(res);
          setTimeout(() => {
            $(".single-page").removeClass("loading");
          }, 500);
          if (isMobile.any()) {
            $("html, body").animate(
              { scrollTop: $(".gallery-wrapper").offset().top - 350 },
              500
            );
          }
        },
      });
    }
  }
});
