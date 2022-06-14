<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('user.layout.head')
    <body>
        <div id="app">
           <trang-chu></trang-chu>
        </div> 
        <script src="{{ asset('js/app.js') }}"></script>
        @include('user.layout.scripts')
    </body>
</html>