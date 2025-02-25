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
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                    <i class="bi bi-clipboard-x fs-1 text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Not Completed</p>
                        <h6 class="mb-0 text-center">{{ $tasks->where('is_completed', false)->count() }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <div class="container-fluid pt-4 px-4 overflow-y-hidden">
        <div class="row">
            @if ($lists->count() == 0)
                <p class="text-center">Please add your assignment</p>
            @endif

            <div class="d-flex gap-3 flex-nowrap overflow-y-scroll" style="height: 100vh;">
                @foreach ($lists as $list)
                    <div class="card overflow-auto bg-secondary flex-shrink-0" style="width: 18rem; max-height: 95vh;">
                        <div
                            class="card-header overflow-y-hidden bg-primary d-flex align-items-center justify-content-between">
                            <h4 class="card-title">{{ $list->name }}</h4>
                            <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="bi bi-trash fs-5 text-dark"></i>
                                </button>
                            </form>
                        </div>
                        <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                            @foreach ($tasks as $task)
                                @if ($task->list_id == $list->id)
                                    <div class="card bg-dark my-2">
                                        <div class="card-header pt-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex flex-column justify-content-center gap-2">
                                                    <a href="{{ route('tasks.show', $task->id) }}"
                                                        class="fw-bold lh-1 m-0 text-decoration-none text-{{ $task->priorityClass }} {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                        {{ $task->name }}
                                                    </a>
                                                    <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                        style="width: fit-content">
                                                        {{ $task->priority }}
                                                    </span>
                                                </div>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm p-0">
                                                        <i class="bi bi-x-circle text-danger fs-5"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body bg-secondary">
                                            <p class="card-text text-truncate">
                                                {{ $task->description }}
                                            </p>
                                        </div>
                                        @if (!$task->is_completed)
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-outline-success w-100">
                                                    <i class="bi bi-check2-circle"></i>
                                                    Selesai
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                                <span class="d-flex align-items-center justify-content-center">
                                    <i class="bi bi-plus fs-5"></i>
                                    Tambah
                                </span>
                            </button>
                        </div>
                        <div class="card-footer bg-primary text-dark d-flex justify-content-between align-items-center">
                            <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-outline-primary flex-shrink-0" style="height: fit-content;" data-bs-toggle="modal"
                    data-bs-target="#addListModal">
                    <span class="d-flex align-items-center justify-content-center">
                        <i class="bi bi-plus fs-5"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
@endsection
