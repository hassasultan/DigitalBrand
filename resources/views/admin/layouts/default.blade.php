<!doctype html>
<html class="modern fixed has-top-menu has-left-sidebar-half">
    <head>
        @include('.admin.includes.head')
    </head>
    <body>
        <section class="body">
            <header class="header header-nav-menu header-nav-links">

                @include('.admin.includes.topbar')
            </header>
            <div class="inner-wrapper">
                @include('.admin.includes.sidebar')

                <section role="main" class="content-body content-body-modern">
                    @yield('content')
                </section>
            </div>
        </section>
        <footer class="row">
            @include('.admin.includes.footer')
        </footer>
    </body>
</html>
