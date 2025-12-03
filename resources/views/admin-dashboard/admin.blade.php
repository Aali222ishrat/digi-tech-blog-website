@extends('admin-dashboard.layout')

@section('title', 'Admin Dashboard')

@section('content')

{{-- Dashboard Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Admin Dashboard</h1>
    <input type="text" id="searchInput" class="form-control w-25" placeholder="Search Blogs, Users...">
</div>

{{-- Dashboard Statistics Cards --}}
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm text-center border-0 rounded-4 p-3"
            style="background: linear-gradient(135deg, #6e8efb, #a777e3); color: white;">
            <div class="card-body">
                <h6 class="card-title">Total Blogs</h6>
                <h3 class="card-text">25</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center border-0 rounded-4 p-3"
            style="background: linear-gradient(135deg, #42e695, #3bb2b8); color: white;">
            <div class="card-body">
                <h6 class="card-title">Total Authors</h6>
                <h3 class="card-text">{{ $totalAuthors }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center border-0 rounded-4 p-3"
            style="background: linear-gradient(135deg, #f7971e, #ffd200); color: white;">
            <div class="card-body">
                <h6 class="card-title">Pending Blogs</h6>
                <h3 class="card-text">3</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center border-0 rounded-4 p-3"
            style="background: linear-gradient(135deg, #ff6a88, #ff99ac); color: white;">
            <div class="card-body">
                <h6 class="card-title">Total Categories</h6>
                <h3 class="card-text">8</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center border-0 rounded-4 p-3"
            style="background: linear-gradient(135deg, #36d1dc, #5b86e5); color: white;">
            <div class="card-body">
                <h6 class="card-title">Total Tags</h6>
                <h3 class="card-text">20</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center border-0 rounded-4 p-3"
            style="background: linear-gradient(135deg, #ff512f, #dd2476); color: white;">
            <div class="card-body">
                <h6 class="card-title">Pending Comments</h6>
                <h3 class="card-text">5</h3>
            </div>
        </div>
    </div>
</div>

{{-- Pending / All Users Table --}}
<div class="card mb-4 shadow-sm rounded-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">User Approvals</h5>
            <div>
                <span class="badge bg-info text-dark me-2">Pending:</span>
                <span class="badge bg-success me-2">Approved:</span>
                <span class="badge bg-secondary">Total Authors: {{ $totalAuthors }}</span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($users))
                    @forelse($users as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->role }}</td>
                        <td>
                            @if($u->is_approved)
                            <span class="badge bg-success">Approved</span>
                            @else
                            <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(!$u->is_approved)
                            <form method="POST" action="{{ route('admin.users.approve', $u->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-success">Approve</button>
                            </form>

                            <form method="POST" action="{{ route('admin.users.reject', $u->id) }}"
                                class="d-inline ms-1">
                                @csrf
                                <button class="btn btn-sm btn-danger">Reject</button>
                            </form>
                            @else
                            <form method="POST" action="{{ route('admin.users.reject', $u->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-danger">Revoke</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No users found.</td>
                    </tr>
                    @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('blogChart').getContext('2d');
const blogChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Blogs Published',
            data: [2, 3, 1, 5, 2, 4, 3, 1, 0, 2, 3, 1],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Simple search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    const value = this.value.toLowerCase();
    document.querySelectorAll('table tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
    });
});
</script>
@endsection