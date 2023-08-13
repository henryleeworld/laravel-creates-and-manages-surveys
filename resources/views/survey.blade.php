@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('survey.store') }}">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                        @endif
                        @include('survey::standard', ['survey' => $survey])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
