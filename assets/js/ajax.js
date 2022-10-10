document.addEventListener("DOMContentLoaded", () => {
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

  // preloader (no ajax)

  // - gallery
  $(".single-page").addClass("loading");
  // - archive
  $(".archive-posts__inner").addClass("loading");
  onload = () => {
    // - gallery
    $(".archive-posts__inner").removeClass("loading");
    // - archive
    $(".single-page").removeClass("loading");
  };

  // gallery
  if (document.querySelector(".gallery-wrapper")) {
    const galleryBtns = document.querySelectorAll(".gallery-btn");
    for (let i = 0; i < galleryBtns.length; i++) {
      galleryBtns[i].addEventListener("click", (e) => {
        galleryAjax(i);
        $(".gallery-btn").removeClass("gallery-btn--act");
        $(".gallery-btn").eq(i).addClass("gallery-btn--act");
      });
    }

    function galleryAjax(page) {
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

  // archive
  if (document.querySelector(".archive.category")) {
    // next/prev event
    let currentUrl = window.location.href;
    window.addEventListener(
      "popstate",
      function (e) {
        let clickedPage = parseInt(location.href.match(/\d+/));
        Number.isInteger(clickedPage) ? clickedPage : (clickedPage = 1);
        archiveAjax(clickedPage, currentUrl);
      },
      false
    );

    function updateLinks() {
      document.querySelectorAll("a.page-numbers").forEach((page) => {
        page.addEventListener("click", (e) => {
          e.preventDefault();
          history.pushState(currentUrl, "", e.target.href);
          let clickedPage = parseInt(e.target.href.match(/\d+/));
          Number.isInteger(clickedPage) ? clickedPage : (clickedPage = 1);
          archiveAjax(clickedPage, currentUrl);
        });
      });
    }

    updateLinks();

    function archiveAjax(page, link) {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "archive_posts",
          page: page,
          link: link,
        },
        beforeSend: function (xhr) {
          $(".archive-posts__inner").addClass("loading");
          window.scrollTo({
            top: 0,
          });
        },
        success: function (res) {
          $(".archive-posts__inner").html(res);
          setTimeout(() => {
            $(".archive-posts__inner").removeClass("loading");
          }, 500);
          updateLinks();
        },
      });
    }
  }

  // archive products
  if (document.querySelector(".archive.tax-product_cat")) {
    // next/prev event
    let currentUrl = window.location.href;
    window.addEventListener(
      "popstate",
      function (e) {
        let clickedPage = parseInt(location.href.match(/\d+/));
        Number.isInteger(clickedPage) ? clickedPage : (clickedPage = 1);
        archiveProductsAjax(clickedPage, currentUrl);
      },
      false
    );

    function updateLinks() {
      document.querySelectorAll("a.page-numbers").forEach((page) => {
        page.addEventListener("click", (e) => {
          e.preventDefault();
          history.pushState(currentUrl, "", e.target.href);
          let clickedPage = parseInt(e.target.href.match(/\d+/));
          Number.isInteger(clickedPage) ? clickedPage : (clickedPage = 1);
          archiveProductsAjax(clickedPage, currentUrl);
        });
      });
    }

    updateLinks();

    function archiveProductsAjax(page, link) {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "archive_products_posts",
          page: page,
          link: link,
        },
        beforeSend: function (xhr) {
          $(".product-items").addClass("loading");
          window.scrollTo({
            top: 0,
          });
        },
        success: function (res) {
          $(".product-items").html(res);
          setTimeout(() => {
            $(".product-items").removeClass("loading");
          }, 500);
          updateLinks();
        },
      });
    }
  }
});
