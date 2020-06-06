@extends('layouts.app')

@section('content')
<div >
    <div class="row justify-content-center" style="width: 100%;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">messanger</div>

                <div >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                </div>
                
                <chat :user="{{ json_encode(Auth::user()) }}"></chat>
            </div>
        </div>
    </div>
</div>
@endsection
