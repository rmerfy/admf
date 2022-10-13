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

  // cart counter

  function updateCounter() {
    $.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      dataType: "html",
      data: {
        action: "update_cart_counter",
      },
      success: function (res) {
        $(".cart-btn").html(res);
      },
    });
  }

  $(document.body).on("added_to_cart", function () {
    updateCounter();
  });
  $(document.body).on("updated_cart_totals", function () {
    updateCounter();
  });

  updateCounter();

  // front page products

  let moreBtn = document.querySelector(".flooring__show-more");
  if (moreBtn) {
    let page = 1;
    moreBtn.addEventListener("click", () => {
      page++;
      frontpageAjax(page);
    });

    let flooringFooter = document.querySelector(".flooring__footer").offsetTop;

    document.addEventListener("scroll", ajaxScroll);

    function ajaxScroll() {
      let currentScroll = window.innerHeight + window.pageYOffset;

      if (
        currentScroll >= flooringFooter &&
        !document.querySelector(".flooring").classList.contains("loading")
      ) {
        page++;
        frontpageAjax(page);
      }
    }

    function frontpageAjax(page) {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "frontpage_posts",
          page: page,
        },
        beforeSend: function (xhr) {
          $(".flooring").addClass("loading");
          $(".flooring__show-more").text("loading");
        },
        success: function (res) {
          if (res) {
            $(".flooring__list").append(res);
            $(".flooring").removeClass("loading");
            $(".flooring__show-more").text("Show more");
          } else {
            document.removeEventListener("scroll", ajaxScroll);
            $(".flooring__show-more").addClass("d-none");
            $(".flooring").removeClass("loading");
          }
        },
      });
    }
  }

  // catalog products

  let moreBtns = document.querySelectorAll(".product-items__btn");
  let productLists = document.querySelectorAll(".product-items__list");
  if (moreBtns[0]) {
    moreBtns.forEach((btn, i) => {
      let page = 1;
      let category;
      btn.addEventListener("click", () => {
        page++;
        category = productLists[i].dataset.category;
        catalogAjax(category, page, i);
      });
    });
    function catalogAjax(category, page, i) {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "json",
        data: {
          action: "catalog_posts",
          page: page,
          category: category,
        },
        beforeSend: function (xhr) {
          $(".product-items__btn").eq(i).text("loading");
          $(".product-items__btn").eq(i).prop("disabled", true);
        },
        success: function (res) {
          console.log("page " + page);
          console.log("max page " + res.max_page);
          if (page == res.max_page) {
            $(".product-items__btn").eq(i).addClass("d-none");
            $(".product-items__list").eq(i).append(res.content);
          } else {
            $(".product-items__list").eq(i).append(res.content);
            $(".product-items__btn").eq(i).prop("disabled", false);
            $(".product-items__btn").eq(i).text("Show more");
          }
        },
      });
    }
  }
});
