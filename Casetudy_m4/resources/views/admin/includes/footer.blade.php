<footer class="footer py-4  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <i class="fa fa-heart"></i>
                    <a href="{{asset('Usershop/https://www.creative-tim.com')}}" class="font-weight-bold"
                        target="_blank"></a>
                   
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="{{asset('Usershop/https://www.creative-tim.com')}}" class="nav-link text-muted"
                            target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{asset('Usershop/https://www.creative-tim.com/presentation')}}" class="nav-link text-muted"
                            target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{asset('Usershop/https://www.creative-tim.com/blog')}}" class="nav-link text-muted"
                            target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{asset('Usershop/https://www.creative-tim.com/license" class="nav-link pe-0 text-muted')}}"
                            target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('Usershop/https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('decscription', {
        customConfig: '/path/to/your/custom-config.js',
        contentsCss: '/path/to/your/custom-styles.css'
    });
</script>
