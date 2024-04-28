<script src="{{ asset('dist/js/scripts.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>
<!-- Optional: jQuery, if you're using plugins that depend on it -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


@if($errors->any())
    <script>
        @foreach($errors->all() as $error)
            iziToast.error({
                title: '',
                message: '{{ $error }}',
                position: 'topRight'
            });
        @endforeach
    </script>
@endif

@if(session()->get('error'))
    <script>
        iziToast.success({
            title: '',
            message: '{{ session()->get('error') }}',
            position: 'center'
        });
    </script>
@endif

@if(session()->get('success'))
<script>
    iziToast.success({
        title: '',
        message: '{{ session()->get('success') }}',
        position: 'topRight'
    });
</script>
@endif