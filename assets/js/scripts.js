(function ($) {
  // Défilement fluide avec anime.js
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').on("click", function () {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        anime({
          targets: "html, body",
          scrollTop: target.offset().top,
          duration: 1000,
          easing: "easeInOutExpo",
        });
        return false;
      }
    }
  });
})(jQuery);
