<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Permissions') }}
            </h2>
            @can('create permissions')
                <a href="{{ route('permissions.create') }}"
                    class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
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
                        <th class="px-6 py-3 text-left" width="180">Created</th>
                        <th class="px-6 py-3 text-center" width="180">Action</th>
                    </tr>
                </thead>

                <tbody id="table-body" class="bg-white">
                    @include('permissions.permission-data')
                </tbody>

            </table>
            <div id="pagination" class="my-3">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>

    <x-slot name="script">
        {{-- <script type="text/javascript">
            function deletePermission(id) {
                if (confirm('Ban chac chan muon xoa khong?')) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: "{{ route('permissions.destroy', ':id') }}".replace(':id', id),
                        type: 'delete',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        headers: {
                            'x-csrf-token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // window.location.href = "{{ route('permissions.destroy') }}";
                            alert('xoa thanh cong.');
                        }
                    })
                }
            }
        </script> --}}

        <script>
            $(document).on('click', '.deleteBtn', function(e) {
                e.preventDefault();
                if (!confirm('Bạn có chắc muốn xóa không?')) return;
                let id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: "{{ route('permissions.destroy', ':id') }}".replace(':id', id),
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        $('#row' + id).remove();
                        //fetchPermissions();
                        //window.location.href = "{{ route('permissions.index') }}";
                        //alert(res.message);
                    },
                    error: function() {
                        alert("Lỗi, Không thể xóa sản phẩm.");
                    }
                });
            });

            function fetchPermissions() {
                $.ajax({
                    url: "{{ route('permissions.fetch') }}",
                    method: 'GET',
                    headers: {
                        "x-csrf-token": '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#table-body').html(response);
                    }
                });
            }
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
