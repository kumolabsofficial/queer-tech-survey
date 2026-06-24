@include('frontend.includes.head')

<body>

    @include('frontend.includes.header')


    @yield('content')

    @include('frontend.includes.footer')

    
    @yield('scripts')

</body>

</html>
