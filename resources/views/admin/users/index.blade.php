@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold text-dark mb-1">User Management</h2>
                    <p class="text-muted mb-0">Manage and monitor all registered accounts</p>
                </div>
                <div>
                    <a href="{{ route('admin.users.create') }}"
                       class="btn btn-gradient-primary px-4 py-2 shadow-sm border-0">
                        <i class="bi bi-plus-circle me-2"></i>
                        Add New User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 stat-card-gradient-1">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-icon-gradient gradient-1 rounded-3 p-3">
                                <i class="bi bi-people-fill text-white fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1 fw-normal">Total Users</h6>
                            <h3 class="mb-0 fw-bold text-gradient-1">{{ $users->total() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 stat-card-gradient-2">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-icon-gradient gradient-2 rounded-3 p-3">
                                <i class="bi bi-shield-check text-white fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1 fw-normal">Admins</h6>
                            <h3 class="mb-0 fw-bold text-gradient-2">{{ $users->where('role', 'admin')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 stat-card-gradient-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-icon-gradient gradient-3 rounded-3 p-3">
                                <i class="bi bi-person-badge text-white fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1 fw-normal">Regular Users</h6>
                            <h3 class="mb-0 fw-bold text-gradient-3">{{ $users->where('role', 'user')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 stat-card-gradient-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-icon-gradient gradient-4 rounded-3 p-3">
                                <i class="bi bi-clock-history text-white fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1 fw-normal">New Today</h6>
                            <h3 class="mb-0 fw-bold text-gradient-4">0</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-0 fw-semibold">
                        <i class="bi bi-list-ul me-2 text-primary"></i>
                        User List
                    </h5>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end justify-content-start mt-3 mt-md-0 gap-2">
                        <!-- Filter Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                <i class="bi bi-filter me-1"></i>Filter
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">All Users</a></li>
                                <li><a class="dropdown-item" href="#">Admins</a></li>
                                <li><a class="dropdown-item" href="#">Regular Users</a></li>
                            </ul>
                        </div>

                        <!-- Search Box -->
                        <div class="input-group" style="max-width: 280px;">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0"
                                   placeholder="Search users...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3 text-muted fw-semibold">#</th>
                            <th class="px-4 py-3 text-muted fw-semibold">User</th>
                            <th class="px-4 py-3 text-muted fw-semibold">Email</th>
                            <th class="px-4 py-3 text-muted fw-semibold">Role</th>
                            <th class="px-4 py-3 text-muted fw-semibold">Joined Date</th>
                            <th class="px-4 py-3 text-muted fw-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr class="border-bottom">
                                <td class="px-4 py-3">
                                    <span class="text-muted fw-medium">{{ $loop->iteration }}</span>
                                </td>

                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative">
                                            <img src="{{ asset('backend/template/assets/images/avatar/avatar-s-11.png') }}"
                                                 class="rounded-circle border border-2 border-white shadow-sm"
                                                 width="48"
                                                 height="48"
                                                 style="object-fit: cover;">
                                            <span class="status-indicator position-absolute bottom-0 end-0 bg-success border border-2 border-white rounded-circle"
                                                  data-bs-toggle="tooltip"
                                                  title="Online">
                                            </span>
                                        </div>
                                        <div class="ms-4">
                                            <h6 class="mb-0 fw-semibold">{{ $user->username }}</h6>
                                            <small class="text-muted">{{ '@' . $user->username }}</small>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-3">
                                    <span class="text-dark">{{ $user->email }}</span>
                                </td>

                                <td class="px-4 py-3">
                                    @if($user->role == 'admin')
                                        <span class="badge badge-gradient-purple px-3 py-2 rounded-pill">
                                            <i class="bi bi-shield-lock me-1"></i>
                                            Admin
                                        </span>
                                    @else
                                        <span class="badge badge-gradient-blue px-3 py-2 rounded-pill">
                                            <i class="bi bi-person me-1"></i>
                                            User
                                        </span>
                                    @endif
                                </td>

                                <td class="px-4 py-3">
                                    <span class="text-muted">{{ $user->created_at->format('M d, Y') }}</span>
                                </td>

                                <td class="px-4 py-3">
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- View Button -->
                                        <button class="btn btn-sm btn-light border-0 rounded-pill px-3"
                                                data-bs-toggle="tooltip"
                                                title="View Details">
                                            <i class="bi bi-eye text-info"></i>
                                        </button>

                                        <!-- Edit Button -->
                                        <button class="btn btn-sm btn-light border-0 rounded-pill px-3"
                                                data-bs-toggle="tooltip"
                                                title="Edit User">
                                            <i class="bi bi-pencil text-warning"></i>
                                        </button>

                                        <!-- More Options -->
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light border-0 rounded-pill px-3"
                                                    type="button"
                                                    data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots-vertical text-secondary"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                                <li>
                                                    <a class="dropdown-item py-2" href="#">
                                                        <i class="bi bi-eye text-info me-2"></i>
                                                        View Profile
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item py-2" href="#">
                                                        <i class="bi bi-pencil text-warning me-2"></i>
                                                        Edit User
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item py-2" href="#">
                                                        <i class="bi bi-key text-primary me-2"></i>
                                                        Reset Password
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider my-1"></li>
                                                <li>
                                                    <form action="" method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item py-2 text-danger">
                                                            <i class="bi bi-trash3 me-2"></i>
                                                            Delete User
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                                        <h5 class="text-muted">No users found</h5>
                                        <p class="text-muted">Start by adding your first user</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer with Pagination -->
        <div class="card-footer bg-white border-top">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div class="text-muted">
                    Showing <span class="fw-semibold text-dark">{{ $users->firstItem() ?? 0 }}</span>
                    to <span class="fw-semibold text-dark">{{ $users->lastItem() ?? 0 }}</span>
                    of <span class="fw-semibold text-dark">{{ $users->total() }}</span> users
                </div>
                <nav>
                    {{ $users->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </div>

    <style>
        /* Color Palette - Harmonious Modern Colors */
        :root {
            --color-primary: #6366f1;
            --color-primary-dark: #4f46e5;
            --color-secondary: #8b5cf6;
            --color-success: #10b981;
            --color-info: #06b6d4;
            --color-warning: #f59e0b;
            --color-danger: #ef4444;

            /* Gradient Colors */
            --gradient-1-start: #667eea;
            --gradient-1-end: #764ba2;
            --gradient-2-start: #f093fb;
            --gradient-2-end: #f5576c;
            --gradient-3-start: #4facfe;
            --gradient-3-end: #00f2fe;
            --gradient-4-start: #43e97b;
            --gradient-4-end: #38f9d7;
        }

        /* Stat Cards with Gradients */
        .stat-card-gradient-1 {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            border-left: 4px solid var(--gradient-1-start) !important;
        }

        .stat-card-gradient-2 {
            background: linear-gradient(135deg, rgba(240, 147, 251, 0.05) 0%, rgba(245, 87, 108, 0.05) 100%);
            border-left: 4px solid var(--gradient-2-start) !important;
        }

        .stat-card-gradient-3 {
            background: linear-gradient(135deg, rgba(79, 172, 254, 0.05) 0%, rgba(0, 242, 254, 0.05) 100%);
            border-left: 4px solid var(--gradient-3-start) !important;
        }

        .stat-card-gradient-4 {
            background: linear-gradient(135deg, rgba(67, 233, 123, 0.05) 0%, rgba(56, 249, 215, 0.05) 100%);
            border-left: 4px solid var(--gradient-4-start) !important;
        }

        /* Avatar Icon Gradients */
        .avatar-icon-gradient.gradient-1 {
            background: linear-gradient(135deg, var(--gradient-1-start) 0%, var(--gradient-1-end) 100%);
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
        }

        .avatar-icon-gradient.gradient-2 {
            background: linear-gradient(135deg, var(--gradient-2-start) 0%, var(--gradient-2-end) 100%);
            box-shadow: 0 8px 16px rgba(240, 147, 251, 0.3);
        }

        .avatar-icon-gradient.gradient-3 {
            background: linear-gradient(135deg, var(--gradient-3-start) 0%, var(--gradient-3-end) 100%);
            box-shadow: 0 8px 16px rgba(79, 172, 254, 0.3);
        }

        .avatar-icon-gradient.gradient-4 {
            background: linear-gradient(135deg, var(--gradient-4-start) 0%, var(--gradient-4-end) 100%);
            box-shadow: 0 8px 16px rgba(67, 233, 123, 0.3);
        }

        /* Text Gradients */
        .text-gradient-1 {
            background: linear-gradient(135deg, var(--gradient-1-start) 0%, var(--gradient-1-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gradient-2 {
            background: linear-gradient(135deg, var(--gradient-2-start) 0%, var(--gradient-2-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gradient-3 {
            background: linear-gradient(135deg, var(--gradient-3-start) 0%, var(--gradient-3-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gradient-4 {
            background: linear-gradient(135deg, var(--gradient-4-start) 0%, var(--gradient-4-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Button Gradients */
        .btn-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-gradient-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        /* Badge Gradients */
        .badge-gradient-purple {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 500;
            border: none;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .badge-gradient-blue {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            font-weight: 500;
            border: none;
            box-shadow: 0 4px 12px rgba(79, 172, 254, 0.3);
        }

        /* Action Buttons */
        .btn-light {
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            transform: translateY(-2px);
        }

        .btn-light:hover .bi-eye {
            color: #4facfe !important;
        }

        .btn-light:hover .bi-pencil {
            color: #f59e0b !important;
        }

        .btn-light:hover .bi-three-dots-vertical {
            color: #667eea !important;
        }

        .avatar-icon-gradient {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
        }

        .table-hover tbody tr:hover {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.03) 0%, rgba(118, 75, 162, 0.03) 100%);
            transition: background 0.3s ease;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .card {
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1) !important;
        }

        .badge {
            font-weight: 500;
            font-size: 0.8rem;
            letter-spacing: 0.3px;
        }

        .dropdown-menu {
            border-radius: 12px;
            padding: 0.5rem;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            border-radius: 8px;
            transition: all 0.3s ease;
            padding: 0.6rem 1rem;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            transform: translateX(5px);
        }

        /* Online Status Indicator */
        .status-indicator {
            width: 12px;
            height: 12px;
            box-shadow: 0 0 0 3px #fff;
            bottom: 2px !important;
            right: 2px !important;
        }

        /* Table Header */
        thead.bg-light {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%) !important;
        }

        /* Card Header */
        .card-header {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.02) 0%, rgba(118, 75, 162, 0.02) 100%) !important;
        }

        /* Search Input Focus */
        .form-control:focus {
            border-color: var(--gradient-1-start);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }

        /* Empty State */
        .bi-inbox {
            background: linear-gradient(135deg, var(--gradient-1-start) 0%, var(--gradient-1-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Page Title */
        h2.fw-bold {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Smooth Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeInUp 0.5s ease;
        }
    </style>

    <!-- Initialize Tooltips -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
