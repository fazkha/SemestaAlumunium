@section('title', __('messages.report'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('cashflow.index') }}" class="flex items-center justify-center">
                <svg class="size-7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 32 32" xml:space="preserve">
                    <path fill="currentColor"
                        d="M5,9h18v1H5V9z M5,13h8v9H5V13z M6,21h6v-7H6V21z M16,14h7v-1h-7V14z M16,16h7v-1h-7V16z M16,20h7v-1 h-7V20z M16,18h7v-1h-7V18z M16,22h7v-1h-7V22z M32,7v17c0,2.206-1.794,4-4,4H4c-2.206,0-4-1.794-4-4V5c0-0.552,0.448-1,1-1h26 c0.552,0,1,0.448,1,1v1h3C31.552,6,32,6.448,32,7z M30,8h-3v14h-1V7V6H2v18c0,1.103,0.897,2,2,2h24c1.103,0,2-0.897,2-2V8z" />
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.report')</span>
                    <span>@lang('messages.cashflow')</span>
                </div>
            </a>
        </h1>
    </div>

    <div class="mx-auto px-4 py-2">
        <div class="flex flex-col items-center">

            <div class="w-full" role="alert">
                @include('cashflow.partials.feedback')
            </div>

            <div class="w-full overflow-x-auto">
                @include('cashflow.partials.filter')
            </div>

            <div id="table-container" class="w-full">
                @include('cashflow.partials.table')
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $("#pp-dropdown, #bulan-dropdown, #search-tahun")
                .on(
                    "change keyup paste",
                    function() {
                        var xpp = $('#pp-dropdown option:selected').val();
                        var xbulan = $('#bulan-dropdown option:selected').val();
                        var xtahun = $('#search-tahun').val();
                        if (!xtahun.trim()) {
                            xtahun = '_';
                            xbulan = 'all';
                            $("#bulan-dropdown").val("all");
                        }

                        $('#filter-loading').show();

                        var newURL = '{{ url('/report/cashflow') }}';
                        var newState = {
                            page: 'index-cashflow'
                        };
                        var newTitle = '{{ __('messages.stockopname') }}';

                        window.history.pushState(newState, newTitle, newURL);

                        $.ajax({
                            url: '{{ url('/report/cashflow/fetchdb') }}' + "/" + xpp + "/" + xtahun + "/" + xbulan,
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
