<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>

            @can('create users')
                <a href="{{ route('users.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- gọi components/message --}}
            <x-message></x-message>

            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left" width="60">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Roles</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Age</th>
                        <th class="px-6 py-3 text-left" width="180">Created</th>
                        <th class="px-6 py-3 text-center" width="180">Action</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @if ($users->isNotEmpty())
                        @foreach ($users as $user)
                            <tr id="row-" class="border-b">
                                <td class="px-6 py-3 text-left"> {{ $user->id }} </td>
                                <td class="px-6 py-3 text-left"> {{ $user->name }} </td>
                                <td class="px-6 py-3 text-left"> {{ $user->roles->pluck('name')->implode(', ') }} </td>
                                <td class="px-6 py-3 text-left"> {{ $user->email }} </td>
                                <td class="px-6 py-3 text-left"> {{ $user->age }} </td>
                                <td class="px-6 py-3 text-left">
                                    {{-- \Carbon\Carbon::parse => format datetime --}}
                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</td>
                                <td class="px-6 py-3 text-center">

                                    @can('edit users')
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600 ">Edit</a>
                                    @endcan

                                    @can('delete users')
                                        {{-- onclick="deletePermission({{ $permission->id }})"     --}}
                                        <a href="javascript:void(0);" data-id="{{ $user->id }}"
                                            class="bg-red-700 text-sm rounded-md text-white px-3 py-2 hover:bg-red-600 deleteBtn">Delete</a>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div id="pagination" class="my-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <x-slot name="script">

        <script>
            $(document).on('click', '.deleteBtn', function(e) {
                e.preventDefault();
                if (!confirm('Ban co chac muon xoa khong?')) return;
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('articles.destroy', ':id') }}".replace(':id', id),
                    method: 'DELETE',
                    headers: {
                        'x-csrf-token': '{{ csrf_token() }}'
                    },
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#row-' + id).remove();
                        window.location.href = "{{ route('articles.index') }}";
                    }
                });
            });
        </script>
    </x-slot>

</x-app-layout>

<style>
    #pagination {
        display: flex !important;
        flex-wrap: nowrap !important;
        overflow-x: auto !important;
        -webkit-overflow-scrolling: touch;
        gap: 0.5rem;
        padding-bottom: 0.5rem;
    }

    #pagination li,
    #pagination .page-item {
        display: inline-block !important;
        /* hoặc flex-shrink: 0 */
        flex-shrink: 0 !important;
        white-space: nowrap !important;
    }
</style>
