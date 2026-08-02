@section('title', __('messages.unit'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('units.index') }}" class="flex items-center justify-center">
                <svg class="size-7" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.75 4.48h-.71L2 3.43l.71-.7.69.68L4.81 2l.71.71-1.77 1.77zM6.99 3h8v1h-8V3zm0 3h8v1h-8V6zm8 3h-8v1h8V9zm-8 3h8v1h-8v-1zM3.04 7.48h.71l1.77-1.77-.71-.7L3.4 6.42l-.69-.69-.71.71 1.04 1.04zm.71 3.01h-.71L2 9.45l.71-.71.69.69 1.41-1.42.71.71-1.77 1.77zm-.71 3.01h.71l1.77-1.77-.71-.71-1.41 1.42-.69-.69-.71.7 1.04 1.05z" />
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.warehouse')</span>
                    <span>@lang('messages.unit')</span>
                </div>
            </a>
        </h1>
    </div>

    <div class="mx-auto px-4 py-2">
        <div class="flex flex-col items-center">

            <div class="w-full" role="alert">
                @include('satuan.partials.feedback')
            </div>

            <div class="w-full">
                @include('satuan.partials.filter')
            </div>

            <div id="table-container" class="w-full">
                @include('satuan.partials.table')
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $("#pp-dropdown, #isactive-dropdown, #search-singkatan, #search-nama_lengkap").on(
                "change keyup paste",
                function() {
                    var xpp = $('#pp-dropdown option:selected').val();
                    var xisactive = $('#isactive-dropdown option:selected').val();
                    var xsingkatan = $('#search-singkatan').val();
                    var xnama_lengkap = $('#search-nama_lengkap').val();
                    if (!xsingkatan.trim()) {
                        xsingkatan = '_';
                    }
                    if (!xnama_lengkap.trim()) {
                        xnama_lengkap = '_';
                    }

                    $('#filter-loading').show();

                    var newURL = '{{ url('/warehouse/units') }}';
                    var newState = {
                        page: 'index-satuan'
                    };
                    var newTitle = '{{ __('messages.unit') }}';

                    window.history.pushState(newState, newTitle, newURL);

                    $.ajax({
                        url: '{{ url('/warehouse/units/fetchdb') }}' + "/" + xpp + "/" + xisactive + "/" +
                            xsingkatan + "/" + xnama_lengkap,
                        type: "GET",
                        dataType: 'json',
                        success: function(result) {
                            $('#table-container').html(result);
                            $("#table-container").focus();
                            $('#filter-loading').hide();
                        }
                    });
                });
        </script>
    @endpush
</x-app-layout>
