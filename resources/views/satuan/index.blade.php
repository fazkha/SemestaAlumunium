@section('title', __('messages.unit'))

<x-app-layout>
    <div class="flex items-center justify-between px-4 py-4 border-b border-primary-100 lg:py-6">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('units.index') }}" class="flex items-center justify-center">
                <svg fill="currentColor" class="size-7" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path
                        d="M17 2C16.449219 2 16 2.449219 16 3L16 11C16 11.550781 16.449219 12 17 12L33 12C33.554688 12 34 11.550781 34 11L34 3C34 2.449219 33.554688 2 33 2 Z M 29 7L31 7L31 9L29 9 Z M 22 14L22 30L10 30C9.675781 30 9.375 30.167969 9.1875 30.4375L2.46875 40L47.53125 40L40.8125 30.4375C40.625 30.167969 40.324219 30 40 30L28 30L28 14 Z M 2 42L2 45C2 45.554688 2.449219 46 3 46L4 46L4 47L6 47L6 46L44 46L44 47L46 47L46 46L47 46C47.554688 46 48 45.554688 48 45L48 42Z" />
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
