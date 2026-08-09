@section('title', __('messages.maintenance_2'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('maintenance.index') }}" class="flex items-center justify-center">
                <svg fill="currentColor" class="size-7" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 297.197 297.197"
                    style="enable-background:new 0 0 297.197 297.197;" xml:space="preserve">
                    <g id="XMLID_125_">
                        <path id="XMLID_127_"
                            d="M284.21,145.081c-1.382-3.878-5.017-6.504-9.13-6.6l-69.414-1.662l-45.85-17.092l6.378-17.102l0.38,0.142 c1.148,0.427,2.323,0.631,3.48,0.631c4.036,0,7.836-2.479,9.334-6.484c1.915-5.151-0.7-10.884-5.853-12.804l-38.479-14.34 c-5.143-1.92-10.88,0.7-12.815,5.852c-1.914,5.153,0.701,10.885,5.852,12.804l0.789,0.293l-6.368,17.1L76.549,88.691l-22.36-41.527 c-2.479-4.613-8.137-6.523-12.901-4.337L5.821,59.029c-2.712,1.24-4.725,3.622-5.492,6.499c-0.757,2.873-0.194,5.94,1.537,8.361 l44.682,62.288l-18.754,50.319c-0.924,2.475-0.826,5.212,0.273,7.612c1.089,2.402,3.101,4.27,5.57,5.192l132.159,49.261 c1.137,0.424,2.314,0.627,3.48,0.627c2.344,0,4.657-0.831,6.494-2.406l105.562-90.803 C284.451,153.291,285.599,148.961,284.21,145.081z M25.092,72.114l15.983-7.302l18.947,35.193l-5.095,13.688L25.092,72.114z" />
                        <path id="XMLID_126_"
                            d="M282.197,195.873c-0.575-1.268-1.848-2.084-3.248-2.091c-1.399,0-2.674,0.818-3.247,2.091 c-5.248,11.468-15.01,33.78-15.01,41.149c0,10.081,8.176,18.252,18.257,18.252c10.073,0,18.248-8.171,18.248-18.252 C297.197,229.654,287.447,207.345,282.197,195.873z" />
                    </g>
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.services')</span>
                    <span>@lang('messages.maintenance_2')</span>
                </div>
            </a>
        </h1>
    </div>

    <div class="mx-auto px-4 py-2">
        <div class="flex flex-col items-center">

            <div class="w-full" role="alert">
                @include('service-perawatan.partials.feedback')
            </div>

            <div class="w-full overflow-x-auto">
                @include('service-perawatan.partials.filter')
            </div>

            <div id="table-container" class="w-full">
                @include('service-perawatan.partials.table')
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $("#pp-dropdown, #isactive-dropdown, #customer-dropdown, #petugas-dropdown, #search-tanggal")
                .on(
                    "change keyup paste",
                    function() {
                        var xpp = $('#pp-dropdown option:selected').val();
                        var xisactive = $('#isactive-dropdown option:selected').val();
                        var xcustomer = $('#customer-dropdown option:selected').val();
                        var xpetugas = $('#petugas-dropdown option:selected').val();
                        var xtanggal = $('#search-tanggal').val();
                        if (!xtanggal.trim()) {
                            xtanggal = '_';
                        }

                        $('#filter-loading').show();

                        var newURL = '{{ url('/service/maintenance') }}';
                        var newState = {
                            page: 'index-service-maintenance'
                        };
                        var newTitle = '{{ __('messages.services') }}';

                        window.history.pushState(newState, newTitle, newURL);

                        $.ajax({
                            url: '{{ url('/service/maintenance/fetchdb') }}' + "/" + xpp + "/" + xisactive + "/" +
                                xtanggal + "/" + xcustomer + "/" + xpetugas,
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
