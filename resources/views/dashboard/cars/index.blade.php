<x-app-layout>
    <x-table.alert-status></x-table.alert-status>
    <div class="flex justify-between mb-4">
        <x-table.title>Cars</x-table.title>
        <x-primary-button as="a" href="{{ route('cars.create') }}">Add Car</x-primary-button>
    </div>
    <x-table.table>
        <x-table.thead>
            <tr>
                <x-table.th>No</x-table.th>
                <x-table.th>Image</x-table.th>
                <x-table.th>Nopol</x-table.th>
                <x-table.th>Brand</x-table.th>
                <x-table.th>Type</x-table.th>
                <x-table.th>Tahun</x-table.th>
                <x-table.th>Harga</x-table.th>
                <x-table.th>Status</x-table.th>
                <x-table.th>Aksi</x-table.th>
            </tr>
        </x-table.thead>
        <x-table.tbody>
            @foreach ($cars as $car)
                <tr>
                    <x-table.td>{{ $loop->iteration }}</x-table.td>
                    <x-table.td>
                        <img src="{{ asset('storage/' . $car->image) }}" alt="Cover" class="w-16 h-16 object-cover">
                    </x-table.td>
                    <x-table.td>{{ $car->license_plate }}</x-table.td>
                    <x-table.td>{{ $car->brand }}</x-table.td>
                    <x-table.td>{{ $car->type }}</x-table.td>
                    <x-table.td>{{ $car->year }}</x-table.td>
                    <x-table.td>Rp{{ $car->price }}</x-table.td>
                    <x-table.td>
                        <x-badge :color="$car->status === 'available' ? 'teal' : 'red'">{{ $car->status }}</x-badge>
                    </x-table.td>
                    <x-table.td>
                        <div class="flex items-center space-x-2">
                            <x-primary-button as="a"
                                href="{{ route('cars.edit', $car->id_car) }}">Edit</x-primary-button>
                            <x-table.destroy-button action="{{ route('cars.destroy', $car->id_car) }}"/>
                        </div>
                    </x-table.td>
                </tr>
            @endforeach
        </x-table.tbody>
    </x-table.table>
</x-app-layout>
