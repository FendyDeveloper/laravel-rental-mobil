<x-table.table>
    <x-table.thead>
        <tr>
            <x-table.th>No</x-table.th>
            <x-table.th>Name</x-table.th>
            <x-table.th>Gender</x-table.th>
            <x-table.th>Phone</x-table.th>
            <x-table.th>Address</x-table.th>
            <x-table.th>Email</x-table.th>
            <x-table.th>Role</x-table.th>
            <x-table.th>Action</x-table.th>
        </tr>
    </x-table.thead>
    <x-table.tbody>
        @foreach ($users as $user)
            <tr>
                <x-table.td>{{ $loop->iteration }}</x-table.td>
                <x-table.td>{{ $user->name }}</x-table.td>
                <x-table.td>{{ ucfirst($user->gender) }}</x-table.td>
                <x-table.td>{{ $user->telp }}</x-table.td>
                <x-table.td>{{ $user->address }}</x-table.td>
                <x-table.td>{{ $user->email }}</x-table.td>
                <x-table.td>{{ ucfirst($user->role) }}</x-table.td>
                <x-table.td>
                    <div class="flex items-center space-x-2">
                        <x-primary-button as="a" href="{{ route('users.edit', $user->id) }}">Edit</x-primary-button>
                        <x-table.destroy-button action="{{ route('users.destroy', $user->id) }}"/>
                    </div>
                </x-table.td>
            </tr>
        @endforeach
    </x-table.tbody>
</x-table.table>