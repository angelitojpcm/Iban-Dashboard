(function (window, document, $, undefined) {
  "use strict";

  var page = {
    i: function () {
      this.init();
      this.methods();
    },

    init: function () {
      this.$window = $(window);
      this.$document = $(document);
      this.$body = $("body");
      this.$html = $("html");
      this.$header = $(".header");
      this.$footer = $(".footer");
      this.$main = $(".main");
      this.BASE_URL = this.$document.find("base").attr("href");
    },

    methods: function () {
      page.login();
    },

    login: function () {
      const $form = $("#form-login");

      $form.on("submit", function (e) {
        e.preventDefault();
        const data = $(this).serialize();

        $.ajax({
          url: page.BASE_URL + "auth/validate",
          type: "POST",
          data: data,
          dataType: "json",
          success: function (response) {
            if (response.status) {
              window.location.href = BASE_URL + "dashboard";
            } else {
              alert(response.message);
            }
          },
        });
      });
    },
  };

  page.i();
})(window, document, jQuery);
