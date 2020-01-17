@extends('layouts.app')

@section('content')
<ul class="list-unstyled">
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @include('microposts.microposts', ['microposts' => $microposts])
        </div>
    </div>
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}
@endsection