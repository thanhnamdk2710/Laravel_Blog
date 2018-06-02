<!DOCTYPE html>
<html lang="en">
    <head>
        @include('user.layouts.head')
    </head>

    <body>
        @include('user.layouts.nav')

        <div class="container">
            @yield('content')
        </div>
        
        @include('user.layouts.footer')

        @yield('scripts')
    </body>
</html>
