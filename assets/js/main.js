"use strict";

document.addEventListener("DOMContentLoaded", () => {
  const body = document.body;

  // wow init

  new WOW().init();

  // inputmask

  let phone = document.querySelectorAll("input[type='tel']"),
    im = new Inputmask("(999) 999-99-99");
  im.mask(phone);

  // Replace img.svg  svg

  document.querySelectorAll("img.svg").forEach(function (img) {
    var imgID = img.id;
    var imgClass = img.className;
    var imgURL = img.src;

    fetch(imgURL)
      .then(function (response) {
        return response.text();
      })
      .then(function (text) {
        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(text, "text/xml");

        // Get the SVG tag, ignore the rest
        var svg = xmlDoc.getElementsByTagName("svg")[0];

        // Add replaced image's ID to the new SVG
        if (typeof imgID !== "undefined") {
          svg.setAttribute("id", imgID);
        }
        // Add replaced image's classes to the new SVG
        if (typeof imgClass !== "undefined") {
          svg.setAttribute("class", imgClass + " replaced-svg");
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        svg.removeAttribute("xmlns:a");

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
        if (
          !svg.getAttribute("viewBox") &&
          svg.getAttribute("height") &&
          svg.getAttribute("width")
        ) {
          svg.setAttribute(
            "viewBox",
            "0 0 " +
              svg.getAttribute("height") +
              " " +
              svg.getAttribute("width")
          );
        }

        // Replace image with new SVG
        img.parentNode.replaceChild(svg, img);
      });
  });

  const infoSlider = new Swiper(".info-slider", {
    speed: 800,
    loop: true,
    autoplay: {
      delay: 5000,
    },
  });

  const mainSlider = new Swiper(".main-slider", {
    speed: 800,
    loop: true,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    pagination: {
      el: ".swiper-pagination",
      type: "bullets",
      clickable: true,
    },
    autoplay: {
      delay: 5000,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  const productThumbs = new Swiper(".product-thumbs", {
    speed: 400,
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
    threshold: 2,
    breakpoints: {
      374: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
      550: {
        slidesPerView: 8,
        spaceBetween: 10,
      },
    },
  });
  const productSlider = new Swiper(".product-slider", {
    speed: 400,
    slidesPerView: 1,
    effect: "fade",
    allowTouchMove:false,
    fadeEffect: {
      crossFade: true,
    },
    thumbs: {
      swiper: productThumbs,
    },
    navigation: {
      nextEl: ".product-thumbs-next",
      prevEl: ".product-thumbs-prev",
    },
  });

  // sub menu

  const subMenuBtn = document.querySelector(".mega-menu-btn");
  const subMenu = document.querySelector(".mega-menu");

  subMenuBtn.addEventListener("mouseover", () => {
    if (!subMenu.classList.contains("mega-menu--active")) {
      subMenu.classList.add("mega-menu--active");
    }
  });

  subMenuBtn.addEventListener("mouseleave", () => {
    setTimeout(() => {
      if (subMenu.classList.contains("mega-menu--active")) {
        subMenu.classList.remove("mega-menu--active");
      }
    }, 500);
  });

  // fixed menu

  const menuBlock = document.querySelector(".header"),
    main = document.querySelector(".main");
  let menuBlockHeight = menuBlock.offsetHeight;

  window.addEventListener("scroll", function () {
    if (window.pageYOffset >= 150) {
      menuBlock.classList.add("header--fixed");
      main.style.marginTop = `${menuBlockHeight}px`;
    } else if (window.pageYOffset < 150) {
      menuBlock.classList.remove("header--fixed");
      main.style.marginTop = 0;
    }
  });

  // mobile menu

  const menuBtn = document.querySelector(".menu-btn"),
    menuClose = document.querySelector(".menu__close"),
    menu = document.querySelector(".menu__inner");

  menuBtn.addEventListener("click", () => {
    menu.classList.toggle("active");
    body.classList.toggle("lock");
  });

  document.addEventListener("click", function (e) {
    const target = e.target;
    const its_menu = target == menu || menu.contains(target);
    const its_btnMenu = target == menuBtn;
    const menu_is_active = menu.classList.contains("active");
    const its_closeBtn = target == menuClose;

    if ((!its_menu && !its_btnMenu && menu_is_active) || its_closeBtn) {
      menu.classList.remove("active");
      body.classList.remove("lock");
    }
  });

  const myHash = location.hash; //get hash

  document.addEventListener("click", (e) => {
    if (myHash != undefined) {
      let hash = e.target.hash;
      if (hash && document.querySelector(hash)) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: $(hash).offset().top - 200 }, 500);
      }
    }
  });
  if (myHash[1] != undefined) {
    // check hash value
    $("html, body").animate({ scrollTop: $(myHash).offset().top - 200 }, 500);
  }

  // filter

  const filterBtn = document.querySelector(".filter-btn"),
    filter = document.querySelector(".filter-wrapper");

  if (filter) {
    filterBtn.addEventListener("click", () => {
      filter.classList.toggle("active");
      filter.classList.contains("active")
        ? (filterBtn.textContent = "Hide filter")
        : (filterBtn.textContent = "Show filter");
    });
  }

  // search

  let searchBar = document.querySelector(".search-bar");
  let searchOpen = document.querySelector(".nav-bar__search-btn button");
  let searchLayout = document.querySelector(".search-bar-layout");

  searchOpen.addEventListener("click", () => {
    searchBar.classList.add("search-bar--active");
    searchLayout.classList.add("search-bar-layout--active");
    body.classList.add("lock");
  });
  searchLayout.addEventListener("click", () => {
    searchBar.classList.remove("search-bar--active");
    searchLayout.classList.remove("search-bar-layout--active");
    body.classList.remove("lock");
  });
});