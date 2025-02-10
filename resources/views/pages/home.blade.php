@extends('layouts.app')

@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                    <i class="bi bi-clipboard-data fs-1 text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-1">Total Lists</p>
                        <h6 class="mb-0 text-center">{{ $lists->count() }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                    <i class="bi bi-clipboard-heart fs-1 text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Tasks</p>
                        <h6 class="mb-0 text-center">{{ $tasks->count() }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                    <i class="bi bi-clipboard-check fs-1 text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Task Completed</p>
                        <h6 class="mb-0 text-center">{{ $tasks->where('is_completed', true)->count() }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
