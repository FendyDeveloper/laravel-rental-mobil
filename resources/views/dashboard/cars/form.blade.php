<x-app-layout>
    <x-form.index>
        <x-form.title>{{ $page_meta['title'] }}</x-form.title>
        <x-form.alert-error/>
        <form method="POST" action="{{ $page_meta['url'] }}" class="mt-4" enctype="multipart/form-data">
            @csrf
            @method($page_meta['method'])
            <x-form.content as="file" label="Image" name="image" />
            <x-form.content as="text" label="Nopol" name="license_plate" value="{{ old('license_plate', $car->license_plate ?? '') }}"/>
            <x-form.content as="text" label="Brand" name="brand" required="required" value="{{ old('brand', $car->brand ?? '') }}"/>
            <x-form.content as="text" label="Type" name="type" required="required" value="{{ old('type', $car->type ?? '') }}"/>
            <x-form.content as="number" label="Tahun" name="year" required="required" value="{{ old('year', $car->year ?? '') }}"/>
            <x-form.content as="number" label="Price /day" name="price" required="required" value="{{ old('price', $car->price ?? '') }}"/>
            <x-form.content as="select" label="Status" name="status" required="required" 
                :options="[
                    'available' => 'Available',
                    'unavailable' => 'Unavailable',
                ]" :selected="$car->status ?? null">
            </x-form.content>
            <x-primary-button>Save</x-primary-button>
        </form>
    </x-form.index>
</x-app-layout>
