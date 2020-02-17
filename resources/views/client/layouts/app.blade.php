@include('client.layouts.partials.header')
<div class="pageWrap">
    @include('client.layouts.partials.topbar')
    @yield('content')
</div>
<!-- /pageWrap -->
@yield('advertisement')
@include('client.layouts.partials.footer')