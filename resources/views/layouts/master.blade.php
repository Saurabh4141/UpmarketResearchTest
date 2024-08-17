@include('layouts.header')
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
    <div id="loader" class="d-none">
        <img id="loading-image" src="{{ asset('public/backend/custom/images/loading.gif') }}" />
    </div>
@include('layouts.sidebar')
<div class="main">
@include('layouts.navbar')
@yield('content')
@include('layouts.footer')
@yield('scripts')
</body>

</html>