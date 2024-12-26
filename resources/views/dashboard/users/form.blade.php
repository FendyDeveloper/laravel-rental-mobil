<x-app-layout>
    <x-form.index>
        <x-form.title>{{ $page_meta['title'] }}</x-form.title>
        <form method="POST" action="{{ $page_meta['url'] }}" class="mt-4">
            @csrf
            @method($page_meta['method'])

            <x-form.content as="text" label="Name" name="name" required="required" value="{{ old('name', $user->name ?? '') }}" />
            <x-form.content as="text" label="NIK" name="nik" value="{{ old('nik', $user->nik ?? '') }}" />
            <x-form.content as="select" label="Gender" name="gender" 
                :options="[
                    'male' => 'Male',
                    'female' => 'Female',
                ]" 
                :selected="$user->gender ?? null" />
            <x-form.content as="number" label="Telephone" name="telp" value="{{ old('telp', $user->telp ?? '') }}" />
            <x-form.content as="textarea" label="Address" name="address" value="{{ old('address', $user->address ?? '') }}"></x-form.content>
            <x-form.content as="email" label="Email" name="email" required="required" value="{{ old('email', $user->email ?? '') }}" />
            <x-form.content as="select" label="Role" name="role" 
                :options="[
                    'admin' => 'Admin',
                    'petugas' => 'Petugas',
                    'user' => 'User',
                ]" 
                :selected="$user->role ?? null" />
            @if ($page_meta['page'] == 'create')
            <x-form.content as="password" label="Password" name="password" required="required" />
            <x-form.content as="password" label="Confirm Password" name="password_confirmation" required="required" />
            @else 

            @endif
            
            <x-primary-button>Save</x-primary-button>
        </form>
    </x-form.index>
</x-app-layout>
