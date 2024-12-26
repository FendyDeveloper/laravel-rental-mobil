<x-app-layout>
    <div class="flex justify-between mb-4">
        <x-table.title>Users Management</x-table.title>
        <x-primary-button as="a" href="{{ route('users.create') }}">Add User</x-primary-button>
    </div>

    <x-tabs.index>
        <x-tabs.tab-button id="1" :active="true" :count="$users->count()" value="Users"/>
        <x-tabs.tab-button id="2" :active="false" :count="$petugas->count()" value="Petugas"/>
        <x-tabs.tab-button id="3" :active="false" :count="$admin->count()" value="Admin"/>
    </x-tabs.index>

    <x-table.alert-status></x-table.alert-status>

    <!-- Users Tab -->
    <x-tabs.show-tab id="1" from="users" :users="$users" />
    <x-tabs.show-tab id="2" from="users" class="hidden" :users="$petugas" />
    <x-tabs.show-tab id="3" from="users" class="hidden" :users="$admin" />

</x-app-layout>