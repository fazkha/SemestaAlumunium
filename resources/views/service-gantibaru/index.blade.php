@section('title', __('messages.gantibaru'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('replacement.index') }}" class="flex items-center justify-center">
                <svg class="size-7" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.221 3.739l2.261 2.269L7.7 3.784l-.7-.7-1.012 1.007-.008-1.6a.523.523 0 0 1 .5-.526H8V1H6.48A1.482 1.482 0 0 0 5 2.489V4.1L3.927 3.033l-.706.706zm6.67 1.794h.01c.183.311.451.467.806.467.393 0 .706-.168.94-.503.236-.335.353-.78.353-1.333 0-.511-.1-.913-.301-1.207-.201-.295-.488-.442-.86-.442-.405 0-.718.194-.938.581h-.01V1H9v4.919h.89v-.386zm-.015-1.061v-.34c0-.248.058-.448.175-.601a.54.54 0 0 1 .445-.23.49.49 0 0 1 .436.233c.104.154.155.368.155.643 0 .33-.056.587-.169.768a.524.524 0 0 1-.47.27.495.495 0 0 1-.411-.211.853.853 0 0 1-.16-.532zM9 12.769c-.256.154-.625.231-1.108.231-.563 0-1.02-.178-1.369-.533-.349-.355-.523-.813-.523-1.374 0-.648.186-1.158.56-1.53.374-.376.875-.563 1.5-.563.433 0 .746.06.94.179v.998a1.26 1.26 0 0 0-.792-.276c-.325 0-.583.1-.774.298-.19.196-.283.468-.283.816 0 .338.09.603.272.797.182.191.431.287.749.287.282 0 .558-.092.828-.276v.946zM4 7L3 8v6l1 1h7l1-1V8l-1-1H4zm0 1h7v6H4V8z" />
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.services')</span>
                    <span>@lang('messages.gantibaru')</span>
                </div>
            </a>
        </h1>
    </div>

    <div class="mx-auto px-4 py-2">
        <div class="flex flex-col items-center">

            <div class="w-full" role="alert">
                @include('service-gantibaru.partials.feedback')
            </div>

            <div class="w-full overflow-x-auto">
                @include('service-gantibaru.partials.filter')
            </div>

            <div id="table-container" class="w-full">
                @include('service-gantibaru.partials.table')
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

                        var newURL = '{{ url('/service/replacement') }}';
                        var newState = {
                            page: 'index-service-replacement'
                        };
                        var newTitle = '{{ __('messages.services') }}';

                        window.history.pushState(newState, newTitle, newURL);

                        $.ajax({
                            url: '{{ url('/service/replacement/fetchdb') }}' + "/" + xpp + "/" + xisactive + "/" +
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
