@section('title', __('messages.services'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('sale-order.index') }}" class="flex items-center justify-center">
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
            <span class="px-2">&raquo;</span>
            <span class="px-2 font-semibold">@lang('messages.new')</span>
        </h1>
    </div>

    <form action="{{ route('inspect.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="py-2 flex flex-col">

            <div class="w-full px-4 py-2">
                <div class="flex flex-col items-center">

                    <div class="w-full" role="alert">
                        @include('sale-order.partials.feedback')
                    </div>

                    {{-- Master --}}
                    <div
                        class="w-full shadow-lg bg-primary-50 rounded-md border border-primary-100 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                        <div class="p-4 space-y-2">

                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-1/2 px-2">

                                    <div class="w-auto pb-4">
                                        <input type="hidden" name="branch_id" value="{{ $branch_id }}" />
                                        <label for="customer_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.customer')</label>
                                        <select id="customer_id" name="customer_id" required autofocus tabindex="1"
                                            data-hs-select='{
  "hasSearch": true,
  "searchPlaceholder": "{!! __('messages.search') . '...' !!}",
  "searchClasses": "block w-full py-1.5 sm:py-2 px-3 sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 text-gray-700 dark:text-gray-400 border-primary-100 bg-primary-50 dark:bg-primary-900 before:absolute before:inset-0 before:z-1",
  "searchWrapperClasses": "sticky -top-1 p-2 -mx-1 bg-primary-20 dark:bg-primary-700",
  "placeholder": "{!! __('messages.choose') . '...' !!}",
  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-3 pe-9 flex text-nowrap w-full cursor-pointer bg-primary-20 dark:bg-primary-700 border shadow-md border-primary-100 dark:border-primary-800 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1",
  "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 border bg-primary-20 dark:bg-primary-700 border-primary-500 dark:border-primary-800 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-primary-500 [&::-webkit-scrollbar-thumb]:bg-gray-300",
  "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 dark:text-gray-400 cursor-pointer hover:bg-primary-50 dark:hover:bg-primary-800 rounded-lg focus:outline-hidden focus:bg-primary-50 dark:focus:bg-primary-800",
  "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
  "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
}'
                                            class="hidden">
                                            <option value="">@lang('messages.choose')...</option>
                                            @foreach ($customers as $id => $name)
                                                <option value="{{ $id }}">
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('customer_id')" />
                                    </div>

                                    <div class="flex flex-row gap-2">
                                        <div class="w-1/3 pb-4">
                                            <label for="hke"
                                                class="block mb-2 font-medium text-primary-600">@lang('messages.hke')</label>
                                            <x-text-input type="number" min="0" name="hke" id="hke"
                                                tabindex="2" required value="{{ old('hke', $hke) }}" />

                                            <x-input-error class="mt-2" :messages="$errors->get('hke')" />
                                        </div>

                                        <div class="w-2/3 pb-4">
                                            <label for="tanggal"
                                                class="block mb-2 font-medium text-primary-600">@lang('messages.transactiondate')</label>
                                            <x-text-input type="date" name="tanggal" id="tanggal"
                                                data-date-format="dd-mm-yyyy" tabindex="2" placeholder="Enter date"
                                                required value="{{ old('tanggal') }}" />

                                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full lg:w-1/2 px-2 flex flex-col justify-start">
                                    <div class="w-auto pb-4 lg:pb-12">
                                        <span for="no_order"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.ordernumber')</span>
                                        <x-text-span
                                            id="disp-no_order">{{ old('no_order', config('custom.so_prefix') . '/---/---/----/--/---') }}</x-text-span>
                                        <x-text-input type="hidden" name="no_order" id="no_order"
                                            placeholder="Enter order number"
                                            value="{{ old('no_order', config('custom.so_prefix') . '/---/---/----/--/---') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('no_order')" />
                                    </div>

                                    <div class="flex flex-row flex-wrap items-center justify-end gap-2 md:gap-4">
                                        <div class="w-auto">
                                            <label
                                                class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                <input type="checkbox" id="isactive" name="isactive"
                                                    class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                                                    checked>
                                                <span
                                                    class="pr-4 group-hover:text-blue-500 transition-colors duration-300 text-right w-1/2 md:w-full">
                                                    @lang('messages.active')
                                                </span>
                                            </label>
                                        </div>

                                        <x-primary-button type="submit" class="block" tabindex="6">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.save')</span>
                                        </x-primary-button>
                                        <x-anchor-secondary href="{{ route('sale-order.index') }}" tabindex="7">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.close')</span>
                                        </x-anchor-secondary>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-4 px-4 py-2">
                <div class="w-full">
                    <div class="flex flex-col items-center">

                        <div class="w-full" role="alert">
                            @include('sale-order.partials.feedback')
                        </div>

                        {{-- Detail --}}
                        <div
                            class="w-full shadow-lg rounded-md border bg-primary-50 border-primary-100 dark:bg-primary-900 dark:border-primary-800">
                            <div class="p-4 space-y-2">
                                <div class="flex flex-row items-center gap-2">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                        viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve">
                                        <g>
                                            <path
                                                d="M24.3,36.5c0.7,0,1.4,0.1,2,0.3L15.5,6.2c0,0,0,0,0,0l-1-3c-0.3-0.9-1.2-1.3-2-1L3.1,5.3 c-0.9,0.3-1.3,1.2-1,2l1,3c0.3,0.9,1.2,1.3,2,1L10,9.7l9.9,28.1C21.2,37,22.7,36.5,24.3,36.5z" />
                                            <path
                                                d="M41.2,29.2l-9.9,3.5c-1,0.4-2.2-0.2-2.5-1.2l-3.5-9.9c-0.4-1,0.2-2.2,1.2-2.5l9.9-3.5 c1-0.4,2.2,0.2,2.5,1.2l3.5,9.9C42.8,27.7,42.2,28.8,41.2,29.2z" />
                                            <path
                                                d="M31.8,12.9l-6.7,2.3c-1,0.4-2.2-0.2-2.5-1.2l-2.3-6.7c-0.4-1,0.2-2.2,1.2-2.5l6.7-2.3 c1-0.4,2.2,0.2,2.5,1.2l2.3,6.7C33.4,11.3,32.9,12.5,31.8,12.9z" />
                                            <path
                                                d="M49.9,35.5l-1-3c-0.3-0.9-1.2-1.3-2-1l-18.2,6.3c1.9,1.2,3.2,3.2,3.6,5.5l16.7-5.7 C49.8,37.3,50.2,36.4,49.9,35.5z" />
                                            <path
                                                d="M24.3,39.1c-3,0-5.5,2.5-5.5,5.5c0,3,2.5,5.5,5.5,5.5s5.5-2.5,5.5-5.5C29.8,41.5,27.3,39.1,24.3,39.1z" />
                                        </g>
                                    </svg>
                                    <span class="block font-medium text-primary-600">
                                        @lang('messages.solditem')
                                    </span>
                                </div>

                                <div
                                    class="border rounded-md border-primary-100 bg-primary-100 dark:bg-primary-850 dark:border-primary-800 dark:text-gray-400">
                                    <div class="p-2 overflow-scroll md:overflow-auto lg:overflow-hidden">
                                        <table id="order_table" class="w-full border-separate border-spacing-2">
                                            <thead>
                                                <tr>
                                                    <th class="w-1/4">@lang('messages.goods')</th>
                                                    <th class="w-1/6">@lang('messages.unitprice') (@lang('messages.currencysymbol'))</th>
                                                    <th class="w-auto">@lang('messages.unit')</th>
                                                    <th class="w-auto">@lang('messages.quantity') &amp; @lang('messages.stock')</th>
                                                    {{-- <th class="w-auto">@lang('messages.tax') (%)</th> --}}
                                                    <th class="w-auto">@lang('messages.description')</th>
                                                    <th class="w-1/6">@lang('messages.subtotalprice') (@lang('messages.currencysymbol'))</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('styles')
        <style>
            .dark input[type="date"]::-webkit-calendar-picker-indicator {
                filter: invert(1);
            }
        </style>
    @endpush

    @push('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.maskMoney.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $(function() {
                    $('#total_harga').maskMoney({
                        prefix: 'Rp. ',
                        allowNegative: false,
                        thousands: '.',
                        decimal: ',',
                        precision: 0,
                        affixesStay: false
                    });
                    $('#biaya_angkutan').maskMoney({
                        prefix: 'Rp. ',
                        allowNegative: false,
                        thousands: '.',
                        decimal: ',',
                        precision: 0,
                        affixesStay: false
                    });
                    $('#pajak').maskMoney({
                        prefix: '% ',
                        allowNegative: false,
                        thousands: '.',
                        decimal: ',',
                        precision: 2,
                        affixesStay: false
                    });

                    $('#gambar').change(function() {
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            $('#image-preview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    });
                })

                $("#tunai").on("change keyup paste", function() {
                    var _xtunai = $('#tunai').val();

                    if (_xtunai === '2') {
                        var now = new Date();
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var year = now.getFullYear();
                        var today = year + "-" + month + "-" + day;
                        $("#div-jatuhtempo").show();
                        $("#jatuhtempo").val(today);
                    } else {
                        $("#jatuhtempo").val("");
                        $("#div-jatuhtempo").hide();
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
