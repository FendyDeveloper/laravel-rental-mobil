<x-app-layout>
    <x-form.index>
        <x-form.title>Add Car</x-form.title>
        <x-form.alert-error></x-form.alert-error>
        <form method="POST" action="{{ route('cars.store') }}" class="mt-4" enctype="multipart/form-data">
            @csrf
            <x-form.content as="file" label="Image" name="image" />
            <x-form.content as="text" label="Nopol" name="license_plate" />
            <x-form.content as="text" label="Brand" name="brand" required="required" />
            <x-form.content as="text" label="Type" name="type" required="required" />
            <x-form.content as="number" label="Tahun" name="year" required="required" />
            <x-form.content as="number" label="Price /day" name="price" required="required" />
            <x-form.content as="select" label="Status" name="status" required="required" 
            :options="[
                'available' => 'Available',
                'unavailable' => 'Unavailable',
            ]">
            </x-form.content>
            <x-primary-button>Create Car</x-primary-button>
        </form>
    </x-form.index>
</x-app-layout>

<x-app-layout>
    <x-form.index>
        <x-form.title>Add Car</x-form.title>
        <x-form.alert-error></x-form.alert-error>
        <form method="POST" action="{{ route('cars.update', $car->id_car) }}" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')
            <x-form.content as="file" label="Image" name="image" />
            <x-form.content as="text" label="Nopol" name="license_plate" required="required" value="{{ old('license_plate', $car->license_plate) }}"/>
            <x-form.content as="text" label="Brand" name="brand" required="required" value="{{ old('brand', $car->brand) }}"/>
            <x-form.content as="text" label="Type" name="type" required="required" value="{{ old('type', $car->type) }}"/>
            <x-form.content as="number" label="Tahun" name="year" required="required" value="{{ old('year', $car->year) }}"/>
            <x-form.content as="number" label="Price /day" name="price" required="required" value="{{ old('price', $car->price) }}"/>
                <x-form.content as="select" label="Status" name="status" required="required" 
                :options="[
                    'available' => 'Available',
                    'unavailable' => 'Unavailable',
                ]" 
                :selected="$car->status">
            </x-form.content>
            
            <x-primary-button>Edit Car</x-primary-button>
        </form>
    </x-form.index>
</x-app-layout>

