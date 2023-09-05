@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('success'))
                <script>
                    setTimeout(function() {
                            $('.message').fadeOut('slow');}, 1000,
                        $('.message').css('display', 'none')
                    );
                </script>
                <div class="text-center position-absolute card alert alert-danger alert-dismissible fade show message" role="alert">
                    <div class="">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
