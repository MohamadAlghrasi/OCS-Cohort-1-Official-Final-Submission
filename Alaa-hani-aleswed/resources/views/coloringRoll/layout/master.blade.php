<!DOCTYPE html>
<html lang="en">
@include('coloringRoll.layout.head')
<body>

    @include('coloringRoll.layout.header')

    <main>
        @yield('content')
    </main>

    @include('coloringRoll.layout.footer')

   @livewireScripts
</body>
</html>
