<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('admin.layouts.head')
    <body class="antialiased">
        <div id="app">
            <nav-admin></nav-admin>
            <main-app></main-app>
            <main class="content">
                <account-admin></account-admin>

            </main>
        </div>  
        <script src="{{ asset('js/app.js') }}"></script>
        @include('admin.layouts.scripts')
        
    </body>
</html>
