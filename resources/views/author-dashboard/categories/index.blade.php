@extends('author-dashboard.author')
@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-4">All Categories</h3>

        <!-- Search Box -->
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search categories...">

        <table class="table table-striped table-bordered" id="categoriesTable">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->cat_id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Simple JS search
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#categoriesTable tbody tr');
        rows.forEach(row => {
            let name = row.cells[1].textContent.toLowerCase();
            if(name.indexOf(filter) > -1){
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
