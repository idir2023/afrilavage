 <!DOCTYPE html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>@yield('title')</title>
     <!-- plugins:css -->
     <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
     <link rel="stylesheet" href="{{ asset('admin/assets/vendors/ti-icons/css/themify-icons.css') }}">
     <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
     <link rel="stylesheet" href="{{ asset('admin/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
     <!-- endinject -->
     <!-- Plugin css for this page -->
     <link rel="stylesheet" href="{{ asset('admin/assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
     <link rel="stylesheet"
         href="{{ asset('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
     <!-- End plugin css for this page -->
     <!-- inject:css -->
     <!-- endinject -->
     <!-- Layout styles -->
     <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
     <!-- End layout styles -->
     <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />
 </head>

 <body>
     <div class="container-scroller">

         <!-- partial:partials/_navbar.html -->
         @include('admins.layouts.header')
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
             <!-- partial:partials/_sidebar.html -->
             @include('admins.layouts.sidebar')
             <!-- partial -->
             <div class="main-panel">
                 <div class="content-wrapper">

                     @yield('content')
                 </div>
                 <!-- content-wrapper ends -->
                 <!-- partial:partials/_footer.html -->
                 @include('admins.layouts.footer')
                 <!-- partial -->
             </div>
             <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
     </div>
     <!-- container-scroller -->
     <!-- plugins:js -->
     <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
     <!-- endinject -->
     <!-- Plugin js for this page -->
     <script src="{{ asset('admin/assets/vendors/chart.js/chart.umd.js') }}"></script>
     <script src="{{ asset('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
     <!-- End plugin js for this page -->
     <!-- inject:js -->
     <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
     <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
     <script src="{{ asset('admin/assets/js/settings.js') }}"></script>
     <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
     <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}"></script>
     <!-- endinject -->
     <!-- Custom js for this page -->
     <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
     <!-- End custom js for this page -->
<script>
    $(document).ready(function () {
        $('.btn-read-notification').click(function (e) {
            e.preventDefault();

            let btn = $(this);
            let notificationId = btn.data('id');

            $.ajax({
                url: `/notifications/${notificationId}/read`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        // Retirer la notification de l'affichage
                        btn.closest('.dropdown-item.preview-item').fadeOut(300, function () {
                            $(this).remove();

                            // Mettre à jour le compteur
                            let countElem = $('.count-symbol.bg-danger');
                            let count = parseInt(countElem.text());
                            if (count > 1) {
                                countElem.text(count - 1);
                            } else {
                                countElem.remove();
                                $('.dropdown-menu .dropdown-divider').remove(); // Supprimer la ligne s’il n’y a plus de notifications
                                $('.dropdown-menu').append('<p class="text-center p-3 mb-0">Aucune notification</p>');
                            }
                        });
                    }
                },
                error: function () {
                    alert('Erreur lors de la mise à jour de la notification.');
                }
            });
        });
    });
</script>


     @yield('scripts')
 </body>

 </html>
