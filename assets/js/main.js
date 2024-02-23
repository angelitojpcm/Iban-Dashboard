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
      page.theme();
      page.logout();
      page.redirect();
      page.users();
    },

    theme: function () {
      let userPrefersDark =
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches;

      const $theme = page.$html.attr(
        "data-theme",
        userPrefersDark ? "dark" : "light"
      );
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
          success: function (resp) {
            if (!resp.success) {
              alert(resp.message);
              return;
            }

            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "¡Bienvenido!",
              text: "Iniciando sesión...",
              showConfirmButton: false,
              timer: 1500,
              toast: true,
              timerProgressBar: true,
              didOpen: () => {
                $form.trigger("reset");
                setTimeout(() => {
                  window.location.href = page.BASE_URL + "dashboard";
                }, 1500);
              },
            });
          },
        });
      });
    },

    logout: function () {
      const $logout = $("#logout");

      $logout.on("click", function (e) {
        e.preventDefault();
        Swal.fire({
          title: "¿Estás seguro?",
          text: "¿Quieres cerrar sesión?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sí, cerrar sesión",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "¡Hasta luego!",
              text: "Cerrando sesión...",
              showConfirmButton: false,
              timer: 1500,
              toast: true,
              timerProgressBar: true,
              didOpen: () => {
                setTimeout(() => {
                  window.location.href = page.BASE_URL + "auth/logout";
                }, 1500);
              },
            });
          }
        });
      });
    },

    redirect: function () {
      const btn = $(".redirect");
      const url = btn.data("url")
        ? btn.data("url")
        : page.BASE_URL + "dashboard";
      const move = btn.data("move") ? btn.data("move") : "replace";

      btn.on("click", function () {
        console.log("click");
        if (move != "replace") {
          page.$window[0].location = url;
        }

        if (move == "back") {
          window.history.back();
        }
      });
    },

    users: function () {
      const btn = $(".delete-user");
      const edit = $("#edit-user");
      let photoFile = null;

      $('.file-input').on('change', function () {
        photoFile = this.files[0];
      });


      btn.on('click', function () {
        const id = $(this).data("id");
        const row = $(this).closest('tr'); // Selecciona la fila que contiene el botón de eliminar

        Swal.fire({
          title: "¿Estás seguro?",
          text: "¿Quieres eliminar este usuario?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sí, eliminar",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "¡Usuario eliminado!",
              text: "Eliminando usuario...",
              showConfirmButton: false,
              timer: 1500,
              toast: true,
              timerProgressBar: true,
              didOpen: () => {
                setTimeout(() => {
                  $.ajax({
                    url: page.BASE_URL + "users/delete",
                    type: "POST",
                    data: { id },
                    dataType: "json",
                    success: function (resp) {
                      if (resp.status != 200) {
                        Swal.fire({
                          position: "top-end",
                          icon: "error",
                          title: "¡Error!",
                          text: resp.message,
                          showConfirmButton: false,
                          timer: 1500,
                          toast: true,
                          timerProgressBar: true,
                        });
                        return;
                      }

                      Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "¡Usuario eliminado!",
                        text: "Actualizando...",
                        showConfirmButton: false,
                        timer: 500,
                        toast: true,
                        timerProgressBar: true,
                        didOpen: () => {
                          //Delete for table
                          row.remove(); // Elimina la fila seleccionada
                        },
                      });
                    },
                  });
                }, 1500);
              },
            });
          }
        });
      })

      // Edit user
      edit.on('submit', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        let data = new FormData();
        // Agregar solo los campos que tienen valor
        $(this).serializeArray().forEach(({ name, value }) => {
          if (value) {
            data.append(name, value);
          }
        });

        if (photoFile) {
          data.append('photo', photoFile);
        }

        $.ajax({
          url: page.BASE_URL + 'users/update/' + id,
          type: "POST",
          data: data,
          dataType: "json",
          contentType: false,
          processData: false,
          success: function (resp) {
            if (resp.status != 200) {
              Swal.fire({
                position: "top-end",
                icon: "error",
                title: "¡Error!",
                text: resp.message,
                showConfirmButton: false,
                timer: 1500,
                toast: true,
                timerProgressBar: true,
              });
              return;
            }

            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "¡Usuario actualizado!",
              text: "Actualizando...",
              showConfirmButton: false,
              timer: 1500,
              toast: true,
              timerProgressBar: true,
              didOpen: () => {
                // setTimeout(() => {
                //   window.location.href = page.BASE_URL + 'users/list';
                // }, 1500);
              },
            });
          },
        });
      });
    },
  };

  page.i();
})(window, document, jQuery);
