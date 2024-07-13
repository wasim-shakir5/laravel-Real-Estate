@include('layouts.head')

    <div id="app" style="margin-top: -25px;">

        @include('layouts.header')


        <main class="py-4">
            @yield('content')
        </main>

    </div>

<!-- Alert Container -->
<div class="alert-container position-fixed top-0 end-0 p-3" style="z-index: 1050;"></div>

    @include('layouts.footer')

</body>
</html>
