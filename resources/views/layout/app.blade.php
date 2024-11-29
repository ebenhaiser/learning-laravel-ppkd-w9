<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('title')</title>

    <meta name="description" content="" />

    @include('layout.inc.head')
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('sweetalert::alert')

          <!-- Menu -->

          @include('layout.inc.sidebar')
          <!-- / Menu -->

          <!-- Layout container -->
          <div class="layout-page">
            <!-- Navbar -->

            @include('layout.inc.navbar')

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
              <!-- Content -->

              <div class="container-xxl flex-grow-1 container-p-y">
                @yield('content')
              </div>
              <!-- / Content -->

              <!-- Footer -->

              <!-- / Footer -->

              <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      <!-- / Layout wrapper -->

      {{-- Java Script --}}
      @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
      @include('layout.inc.script')

      <script>
          $('#id_paket').change(function() {
              let id_paket = $(this).val();

              $.ajax({
                  url: '/get-paket/' + id_paket,
                  type: 'GET',
                  dataType: 'json',
                  success: function(response) {
                      $('#price').val(response.price)
                  }
              })
          });

          //   let button = document.querySelector('.add-row');
          //   total_price_result = 0;
          $('.add-row').click(function(e) {
              let nama_paket = $('#id_paket').find('option:selected').text(),
                  id_paket = $('#id_paket').val(),
                  price = $('#price').val(),
                  qty = $(".qty").val(),
                  subtotal = parseInt(price) * parseInt(qty);

              if (id_paket == '') {
                  alert('Please choose which service you want to add');
                  return false;
              }

              if (qty == "") {
                  alert('Please enter the quantity');
                  return false;
              }

              //   let qty_paket = $("#qty_paket").find('input').text();
              e.preventDefault();
              let newRow = "";
              newRow += "<tr>";
              newRow += "<td>" + nama_paket +
                  "<input type='hidden' name='id_paket[]' class='form-control id_paket' value='" + id_paket +
                  "''></td>";
              newRow += "<td>" + price + "<input type='hidden' name='price_service[]' value='" + price +
                  "'></td>";
              newRow += "<td>" + qty + "<input type='hidden' name='qty[]' id='qty' value='" + qty + "'></td>";
              newRow += "<td>" + subtotal +
                  "<input type='hidden' class='subtotal' name='subtotal[]' class='form-control subtotal' value=" +
                  subtotal + "></td>";
              newRow += "</tr>";

              let tbody = $('.tbody-parent');
              tbody.append(newRow);

              let total_price = 0;
              $('.subtotal').each(function() {
                  let total_price_value = parseFloat($(this).val()) || 0;
                  total_price += total_price_value;
              })

              $('.total-price').val(total_price);
              $('#id_paket').val("");
              $('.qty').val("");
          });
      </script>
  </body>
</html>
