<script src="{{ asset ('dist-front/js/custom.js') }}"></script>

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