@include('client.layouts.partials.header')

<div class="pageWrap">
    @include('client.layouts.partials.topbar')
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible alert-custom">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible alert-custom">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="mb-0 list-unstyled">
                @foreach ($errors->all() as $error)
                    <li><strong>Warning!</strong> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
</div>
<!-- /pageWrap -->
@yield('advertisement')
@include('client.layouts.partials.footer')