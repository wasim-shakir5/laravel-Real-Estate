@include('layouts.head')

    <div id="app" style="margin-top: -25px;">

        @include('layouts.header')


        <main class="py-4">
            @yield('content')
        </main>

    </div>

    @include('layouts.footer')

</body>
</html>
