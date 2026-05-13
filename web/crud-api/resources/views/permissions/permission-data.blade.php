@if ($permissions->isNotEmpty())
    @foreach ($permissions as $permission)
        <tr id="row{{ $permission->id }}" class="border-b">
            <td class="px-6 py-3 text-left"> {{ $permission->id }} </td>
            <td class="px-6 py-3 text-left"> {{ $permission->name }} </td>
            <td class="px-6 py-3 text-left">
                {{-- \Carbon\Carbon::parse => format datetime --}}
                {{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}</td>
            <td class="px-6 py-3 text-center">

                @can('edit permissions')
                    <a href="{{ route('permissions.edit', $permission->id) }}"
                        class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600 ">Edit</a>
                @endcan

                @can('delete permissions')
                    {{-- onclick="deletePermission({{ $permission->id }})"     --}}
                    <a href="#" data-id="{{ $permission->id }}"
                        class="bg-red-700 text-sm rounded-md text-white px-3 py-2 hover:bg-red-600 deleteBtn">Delete</a>
                @endcan

            </td>
        </tr>
    @endforeach
@endif
