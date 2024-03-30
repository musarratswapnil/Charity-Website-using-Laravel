<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    @include('customer.layouts.styles')

    @include('customer.layouts.scripts')

</head>

<body>
<div id="app">
    <div class="main-wrapper">

        @include('customer.layouts.nav')



        @include('customer.layouts.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1 class="text-primary">@yield('heading')</h1>
                </div>
                
                @yield('main_content')
            </section>
        </div>

    </div>
</div>

@include('customer.layouts.scripts_footer')


</body>
</html>