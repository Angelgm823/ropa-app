<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    @include('components.layouts.partials.styles')

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        @include('components.layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('components.layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('components.layouts.partials.content_header')
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        @include('components.layouts.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    @include('components.layouts.partials.scripts')

    <!-- PLUGINS -->
    <script>


        document.addEventListener('livewire:initialized', () => {


            Livewire.on('close-modal', (idModal) => {
                $('#' + idModal).modal('hide');
            })

            Livewire.on('open-modal', (idModal) => {
                $('#' + idModal).modal('show');
            })

            Livewire.on('delete', (e) => {

                alert(e.id+'-'+e.eventName)

                Swal.fire({
                    title: "Estas seguro?",
                    text: "Eliminaras una categoria!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, elimina!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.dispatch(e.eventName,{id: e.id})

                    }
                })
            })
        })
    </script>

</body>

</html>
