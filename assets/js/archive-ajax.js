document.addEventListener("DOMContentLoaded", () => {
  $(".archive-posts__inner").addClass("loading");
  onload = () => {
    $(".archive-posts__inner").removeClass("loading");
  };

  let currentUrl = window.location.href;

  // next/prev event
  window.addEventListener(
    "popstate",
    function (e) {
      let clickedPage = parseInt(location.href.match(/\d+/));
      Number.isInteger(clickedPage) ? clickedPage : (clickedPage = 1);
      sendAjax(clickedPage, currentUrl);
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
        sendAjax(clickedPage, currentUrl);
      });
    });
  }

  updateLinks();

  function sendAjax(page, link) {
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
});
