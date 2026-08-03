@section('title', __('messages.inspect'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('inspect.index') }}" class="flex items-center justify-center">
                <svg class="size-7" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M219.51 475.38h219.43v73.14H219.51z" fill="currentColor" />
                    <path
                        d="M182.61 366.27h585.62v179.48h73.14V145.62c0-39.96-32.5-72.48-72.46-72.48h-27.36c-29.2 0-55.05 16.73-65.88 42.59-5.71 13.61-27.84 13.64-33.55 0-10.86-25.88-36.71-42.59-65.89-42.59h-18.16c-29.2 0-55.05 16.73-65.88 42.59-5.71 13.61-27.84 13.64-33.55 0-10.86-25.88-36.71-42.59-65.89-42.59h-17.43c-29.2 0-55.05 16.73-65.88 42.59-5.71 13.61-27.84 13.64-33.55 0-10.86-25.88-36.71-42.59-65.89-42.59h-27.57c-39.96 0-72.48 32.52-72.48 72.48v805.12h437.79V877.6h-364.7l-0.43-511.33zM208.42 144c14.27 34.07 47.32 56.09 84.23 56.09 36.89 0 69.95-22 82.66-53.8l15.86-2.29c14.27 34.07 47.32 56.09 84.23 56.09 36.89 0 69.95-22 82.66-53.8l16.59-2.29c14.27 34.07 47.32 56.09 84.23 56.09 36.89 0 69.95-22 82.66-53.8l26.68-0.66v147.5H182.54l-0.12-146.84 26-2.29z"
                        fill="currentColor" />
                    <path
                        d="M905.81 897.5l-56.19-56.19c17.6-26.2 27.91-57.71 27.91-91.65 0-90.89-73.68-164.57-164.57-164.57s-164.57 73.68-164.57 164.57 73.68 164.57 164.57 164.57c30.4 0 58.52-8.82 82.96-23.19l58.18 58.18 51.71-51.72zM621.53 749.66c0-50.41 41.02-91.43 91.43-91.43 50.42 0 91.43 41.02 91.43 91.43 0 50.41-41.01 91.43-91.43 91.43-50.41 0-91.43-41.02-91.43-91.43z"
                        fill="currentColor" />
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.services')</span>
                    <span>@lang('messages.inspect')</span>
                </div>
            </a>
        </h1>
    </div>

    <div class="mx-auto px-4 py-2">
        <div class="flex flex-col items-center">

            <div class="w-full" role="alert">
                @include('service-order.partials.feedback')
            </div>

            <div class="w-full">
                @include('service-order.partials.filter')
            </div>

            <div id="table-container" class="w-full">
                @include('service-order.partials.table')
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $("#pp-dropdown, #isactive-dropdown, #customer-dropdown, #pegawai-dropdown, #search-tanggal")
                .on(
                    "change keyup paste",
                    function() {
                        var xpp = $('#pp-dropdown option:selected').val();
                        var xisactive = $('#isactive-dropdown option:selected').val();
                        var xcustomer = $('#customer-dropdown option:selected').val();
                        var xpegawai = $('#pegawai-dropdown option:selected').val();
                        var xtanggal = $('#search-tanggal').val();
                        if (!xtanggal.trim()) {
                            xtanggal = '_';
                        }

                        $('#filter-loading').show();

                        var newURL = '{{ url('/service/order') }}';
                        var newState = {
                            page: 'index-service-order'
                        };
                        var newTitle = '{{ __('messages.services') }}';

                        window.history.pushState(newState, newTitle, newURL);

                        $.ajax({
                            url: '{{ url('/service/order/fetchdb') }}' + "/" + xpp + "/" + xisactive + "/" + xtanggal +
                                "/" + xcustomer + "/" + xpegawai,
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
