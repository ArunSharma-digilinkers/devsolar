@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="main-wrapper py-4">
    <div class="container">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Dashboard</h2>
                <small class="text-muted">Overview & statistics</small>
            </div>
            <div class="text-end">
                <span class="badge bg-light text-dark px-3 py-2 shadow-sm">
                    👋 Welcome, <strong>{{ auth()->user()->name }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>

@endsection
