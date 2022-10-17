@if(Session::has('error'))
    <script>
        toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true,
                "positionClass": 'toast-top-right',
            }
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif


