@extends('layouts.app')

@section('content')
    <div id="content" class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}" class="btn btn-sm">
                <i class="bi bi-arrow-left-short fs-4"></i>
                <span class="fw-bold fs-5">Kembali</span>
            </a>
        </div>
    </div>
@endsection
