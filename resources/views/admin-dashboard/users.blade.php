<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Pending Users</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Role</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="p-2 border">{{ $user->name }}</td>
                    <td class="p-2 border">{{ $user->email }}</td>
                    <td class="p-2 border">{{ $user->is_admin ? 'Admin' : 'Author' }}</td>
                    <td class="p-2 border text-center">
                        <form method="POST" action="{{ route('admin.users.approve', $user->id) }}">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Approve
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
