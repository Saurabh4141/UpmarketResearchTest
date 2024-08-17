</div>
    </div>
    <script src="{{ asset('backend/template/js/settings.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q3ZYEKLQ68');
    </script>
    <script src="{{ asset('backend/template/js/app.js')}}"></script>
    <script src="{{ asset('backend/template/js/sweetalert2@11.js')}}"></script>
    <script src="{{ asset('backend/template/js/toastr.min.js')}}"></script>
    <script src="{{ asset('backend/custom/js/custom.js')}}"></script>
    <script>
  const baseUrl = "{{ url('/') }}";
</script>
<div id="IncludeModal"></div>
</body>
</html>