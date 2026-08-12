@section('title', __('messages.complaint'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('complaint.index') }}" class="flex items-center justify-center">
                <svg fill="currentColor" class="size-7" viewBox="-1 0 19 19" xmlns="http://www.w3.org/2000/svg"
                    class="cf-icon-svg">
                    <path
                        d="M16.417 9.583A7.917 7.917 0 1 1 8.5 1.666a7.917 7.917 0 0 1 7.917 7.917zM13.18 6.811a.794.794 0 0 0-.791-.792H4.654a.794.794 0 0 0-.791.792v5.187a.794.794 0 0 0 .791.791h2.93L8.338 14a.182.182 0 0 0 .335 0l.755-1.21h2.96a.794.794 0 0 0 .791-.792zM9.025 11.1a.503.503 0 1 1-.503-.503.503.503 0 0 1 .503.503zm-.9-1.278V7.515a.396.396 0 0 1 .793 0v2.307a.396.396 0 1 1-.792 0z" />
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.services')</span>
                    <span>@lang('messages.complaint')</span>
                </div>
            </a>
        </h1>
    </div>

    <div class="mx-auto px-4 py-2">
        <div class="flex flex-col items-center">

            <div class="w-full" role="alert">
                @include('pengaduan.partials.feedback')
            </div>

            <div class="w-full overflow-x-auto">
                @include('pengaduan.partials.filter')
            </div>

            <div id="table-container" class="w-full">
                @include('pengaduan.partials.table')
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#pp-dropdown, #isactive-dropdown, #user-dropdown, #search-aduan")
                    .on("change keyup paste", function() {
                        var xpp = $('#pp-dropdown option:selected').val();
                        var xisactive = $('#isactive-dropdown option:selected').val();
                        var xpg = $('#user-dropdown option:selected').val();
                        var xaduan = $('#search-aduan').val();
                        if (!xaduan.trim()) {
                            xaduan = '_';
                        }

                        $('#filter-loading').show();

                        var newURL = '{{ url('/service/complaint') }}';
                        var newState = {
                            page: 'index-complaint'
                        };
                        var newTitle = '{{ __('messages.complaint') }}';

                        window.history.pushState(newState, newTitle, newURL);

                        $.ajax({
                            url: "{{ url('/service/complaint/fetchdb') }}" + "/" + xpp + "/" +
                                xisactive + "/" + "/" + xpg + "/" + xaduan,
                            type: "GET",
                            dataType: 'json',
                            success: function(result) {
                                $('#table-container').html(result);
                                $("#table-container").focus();
                                $('#filter-loading').hide();
                            }
                        });
                    });

            });
        </script>
    @endpush
</x-app-layout>
