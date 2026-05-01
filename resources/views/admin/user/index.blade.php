@extends('layouts.admin')

@section('title', 'Users')

@section('content')

<div class="main-wrapper py-4">
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Users</h3>
            <small class="text-muted">Manage all registered users</small>
        </div>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow rounded-3">
        <div class="card-body p-0">

            <table class="table align-middle table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4">#</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr>

                            <td class="px-4">{{ $loop->iteration }}</td>

                            <!-- User Info -->
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                            style="width:45px;height:45px;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="fw-semibold">{{ $user->name }}</div>
                                        <small class="text-muted">ID: #{{ $user->id }}</small>
                                    </div>
                                </div>
                            </td>

                            <!-- Email -->
                            <td>{{ $user->email }}</td>

                            <!-- Role -->
                            <td>
                                @if($user->role == 'admin')
                                    <span class="badge bg-dark">Admin</span>
                                @else
                                    <span class="badge bg-info">User</span>
                                @endif
                            </td>

                            <!-- Status -->
                            <td>
                                @if($user->status ?? 1)
                                    <span class="badge bg-success-subtle text-success">Active</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger">Blocked</span>
                                @endif
                            </td>

                            <!-- Joined -->
                            <td>
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                            <!-- Actions -->
                            <td class="text-end pe-4">
                                <a href="#" class="btn btn-sm btn-light border me-2">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="#" class="btn btn-sm btn-light border me-2">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this user?')"
                                        class="btn btn-sm btn-light border text-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-users fa-2x mb-3"></i>
                                    <p class="mb-1">No users found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
</div>

@endsection