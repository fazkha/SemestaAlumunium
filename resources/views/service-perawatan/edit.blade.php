@php
    use Illuminate\Support\Facades\Crypt;
@endphp
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
            <span class="px-2">💠</span>
            <span class="px-2 font-semibold">@lang('messages.edit')</span>
        </h1>
    </div>

    <div class="py-2 flex flex-col">

        <div class="w-full px-4 py-2">
            <div class="flex flex-col items-center">

                <div class="w-full" role="alert">
                    @include('service-perawatan.partials.feedback')
                </div>

                <form id="master-form" action="{{ route('maintenance.update', Crypt::Encrypt($datas->id)) }}"
                    method="POST" enctype="multipart/form-data" class="w-full">
                    @csrf
                    @method('PUT')

                    {{-- Master --}}
                    <div
                        class="w-full shadow-lg bg-primary-50 rounded-md border border-primary-100 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                        <div class="p-4 space-y-2">

                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-1/2 px-2">

                                    <div class="w-auto pb-4">
                                        <input type="hidden" name="branch_id" value="{{ $branch_id }}" />
                                        <input type="hidden" name="jenis_pelayanan_id"
                                            value="{{ $jenis_pelayanan_id }}" />
                                        <span for="customer_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.customer')</span>
                                        <x-text-span>{{ $datas->customer->nama }}</x-text-span>
                                        <div class="hidden">
                                            <select name="customer_id" id="customer_id" tabindex="1" required
                                                autofocus
                                                class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                                <option value="">@lang('messages.choose')...</option>
                                                @foreach ($customers as $id => $name)
                                                    <option value="{{ $id }}"
                                                        {{ $datas->customer_id == $id ? 'selected' : '' }}>
                                                        {{ $name }}</option>
                                                @endforeach
                                            </select>

                                            <x-input-error class="mt-2" :messages="$errors->get('customer_id')" />
                                        </div>
                                    </div>

                                    <div class="flex flex-row gap-2">
                                        <div class="w-1/3 pb-4">
                                            <label for="hke"
                                                class="block mb-2 font-medium text-primary-600">@lang('messages.hke')</label>
                                            <x-text-span>{{ $datas->hke }}</x-text-span>
                                            <div class="hidden">
                                                <x-text-input type="number" min="0" name="hke"
                                                    id="hke" tabindex="2" required
                                                    value="{{ old('hke', $datas->hke) }}" />

                                                <x-input-error class="mt-2" :messages="$errors->get('hke')" />
                                            </div>
                                        </div>

                                        <div class="w-2/3 pb-4">
                                            <label for="tanggal"
                                                class="block mb-2 font-medium text-primary-600">@lang('messages.transactiondate')</label>
                                            <x-text-span>{{ date_format(date_create($datas->tanggal), 'd/m/Y') }}</x-text-span>
                                            <div class="hidden">
                                                <x-text-input type="date" name="tanggal" id="tanggal"
                                                    data-date-format="dd-mm-yyyy" tabindex="3" required
                                                    value="{{ old('tanggal', $datas->tanggal) }}" />

                                                <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="petugas_maintenance_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.officer')</label>
                                        <select name="petugas_maintenance_id" id="petugas_maintenance_id" tabindex="4"
                                            required autofocus
                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                            <option value="">@lang('messages.choose')...</option>
                                            @foreach ($petugass as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ $datas->petugas_maintenance_id == $id ? 'selected' : '' }}>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('petugas_maintenance_id')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="tindak_lanjut"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.tindaklanjut')</label>
                                        <x-text-span>
                                            <div class="flex flex-row items-center justify-evenly gap-2">
                                                <label
                                                    class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                    <input type="checkbox" id="isperbaikan" name="isperbaikan"
                                                        tabindex="10"
                                                        class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                                                        {{ $datas->isperbaikan == '1' ? 'checked' : '' }}>
                                                    <span
                                                        class="group-hover:text-blue-500 transition-colors duration-300 text-right w-fit">
                                                        @lang('messages.repair')
                                                    </span>
                                                </label>

                                                <label
                                                    class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                    <input type="checkbox" id="isgantibaru" name="isgantibaru"
                                                        tabindex="11"
                                                        class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                                                        {{ $datas->isgantibaru == '1' ? 'checked' : '' }}>
                                                    <span
                                                        class="group-hover:text-blue-500 transition-colors duration-300 text-right w-fit">
                                                        @lang('messages.gantibaru')
                                                    </span>
                                                </label>
                                            </div>
                                        </x-text-span>
                                    </div>
                                </div>

                                <div class="w-full lg:w-1/2 px-2 flex flex-col justify-start">
                                    <div class="w-auto pb-4">
                                        <label for="keterangan"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.description')</label>
                                        <x-text-input type="text" maxlength="200" name="keterangan"
                                            id="keterangan" tabindex="5"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.description') }}"
                                            value="{{ $datas->keterangan }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="pajak"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.tax')
                                            (%)</label>
                                        <x-text-input type="number" min="0" step="0.01" name="pajak"
                                            id="pajak" tabindex="6"
                                            value="{{ old('pajak', $datas->pajak) }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('pajak')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <span for="total_harga"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.totalprice')
                                            (@lang('messages.currencysymbol'))</span>
                                        <x-text-span
                                            id="disp-total_harga-master">{{ number_format($totals['total_price'], 0, ',', '.') }}</x-text-span>
                                        <x-text-input type="hidden" name="total_harga" id="total_harga"
                                            value="{{ $totals['total_price'] }}" class="sr-only" />

                                        <x-input-error class="mt-2" :messages="$errors->get('total_harga')" />
                                    </div>

                                    <div class="w-auto pb-4 lg:pb-12">
                                        <span for="no_order"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.ordernumber')</span>
                                        <x-text-span
                                            id="disp-no_order">{{ old('no_order', $datas->no_order) }}</x-text-span>
                                        <x-text-input type="hidden" name="no_order" id="no_order"
                                            value="{{ old('no_order', $datas->no_order) }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('no_order')" />
                                    </div>

                                    <div class="flex flex-row flex-wrap items-center justify-end gap-2 md:gap-4">
                                        <div class="w-auto">
                                            <label
                                                class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                <input type="checkbox" id="isactive" name="isactive" tabindex="7"
                                                    class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                                                    {{ $datas->isactive == '1' ? 'checked' : '' }}>
                                                <span
                                                    class="pr-4 group-hover:text-blue-500 transition-colors duration-300 text-right w-1/2 md:w-full">
                                                    @lang('messages.active')
                                                </span>
                                            </label>
                                        </div>

                                        <x-primary-button type="submit" class="block" tabindex="8">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.save')</span>
                                        </x-primary-button>
                                        <x-anchor-secondary href="{{ route('maintenance.index') }}" tabindex="9">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
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
                </form>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-4 px-4 py-2">
            <div class="w-full overflow-x-auto">
                <div class="flex flex-col items-center">

                    <form id="form-order" method="POST" enctype="multipart/form-data" class="w-full">
                        @csrf

                        {{-- Detail --}}
                        <input type="hidden" name="branch_id" value="{{ $branch_id }}" />
                        <input type="hidden" id="order_id" name="order_id"
                            value="{{ Crypt::encrypt($datas->id) }}" />
                        <div
                            class="w-full shadow-lg bg-primary-50 rounded-md border border-primary-100 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <div class="p-4 space-y-2">
                                <div class="flex flex-row items-center gap-2">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 7a1 1 0 0 1 1-1h1a1 1 0 0 1 0 2H5a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h9a1 1 0 1 1 0 2h-9a1 1 0 0 1-1-1zm-5 5a1 1 0 0 1 1-1h1a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h9a1 1 0 1 1 0 2h-9a1 1 0 0 1-1-1zm-5 5a1 1 0 0 1 1-1h1a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h9a1 1 0 1 1 0 2h-9a1 1 0 0 1-1-1z"
                                            fill="currentColor" />
                                    </svg>
                                    <span class="block font-medium text-primary-600">
                                        @lang('messages.maintenance_2')
                                    </span>
                                </div>

                                <div
                                    class="border rounded-md border-primary-100 bg-primary-100 dark:bg-primary-850 dark:border-primary-800 dark:text-gray-400">
                                    <div class="relative p-2 overflow-x-auto overflow-y-visible">
                                        <table id="order_table" class="w-full border-separate border-spacing-2">
                                            <thead>
                                                <tr>
                                                    <th class="w-1/4">@lang('messages.maintenancetype')</th>
                                                    <th class="w-auto field-large-show">@lang('messages.description')</th>
                                                    <th class="w-1/5">@lang('messages.component')</th>
                                                    <th class="w-auto field-large-show">@lang('messages.unitprice')
                                                        (@lang('messages.currencysymbol'))</th>
                                                    <th class="w-auto">@lang('messages.unit')</th>
                                                    <th class="w-auto">@lang('messages.quantity') &amp;
                                                        @lang('messages.stock')</span>
                                                    </th>
                                                    <th class="w-auto field-large-show">@lang('messages.subtotalprice')
                                                        (@lang('messages.currencysymbol'))</th>
                                                    <th class="w-auto">&nbsp;</th>
                                                </tr>
                                            </thead>

                                            <tbody id="detailBody">
                                                @include('service-perawatan.partials.details', [
                                                    $details,
                                                    'viewMode' => false,
                                                ])
                                            </tbody>

                                            <tbody>
                                                <tr>
                                                    <td class="align-top">
                                                        <select id="jenis_perawatan_id" name="jenis_perawatan_id"
                                                            required tabindex="12"
                                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                                            <option value="">@lang('messages.choose')...</option>
                                                            @foreach ($jenis_perawatans as $id => $name)
                                                                <option value="{{ $id }}">
                                                                    {{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="align-top field-large-show">
                                                        <x-text-input type="text" maxlength="200" id="keterangan"
                                                            name="keterangan" tabindex="13" />
                                                    </td>
                                                    <td class="align-top">
                                                        <select id="barang_id" name="barang_id" tabindex="14"
                                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                                            <option value="">@lang('messages.choose')...</option>
                                                            @foreach ($barangs as $id => $name)
                                                                <option value="{{ $id }}">
                                                                    {{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="align-top field-large-show">
                                                        <x-text-input type="number" min="0" id="harga_satuan"
                                                            name="harga_satuan" tabindex="15" readonly />
                                                    </td>
                                                    <td class="align-top">
                                                        <select id="satuan_id" name="satuan_id" tabindex="16"
                                                            class="readonly-select w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                                            <option value="">@lang('messages.choose')...</option>
                                                            @foreach ($satuans as $id => $name)
                                                                <option value="{{ $id }}">
                                                                    {{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="align-top">
                                                        <div class="flex flex-row gap-1">
                                                            <x-text-input type="number" min="0"
                                                                id="kuantiti" name="kuantiti" tabindex="17" />
                                                            <input type="hidden" id="stock" name="stock" />
                                                            <x-text-span id="disp-stock"
                                                                class="text-right text-gray-900 bg-primary-50" />
                                                        </div>
                                                    </td>
                                                    <td class="align-top field-large-show">
                                                        <x-text-span id="disp-sub_harga"
                                                            class="text-right">0</x-text-span>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td class="align-top text-center" colspan="3">
                                                        <x-text-span class="font-extrabold">@lang('messages.totalprice')
                                                            (@lang('messages.currencysymbol'))</x-text-span>
                                                    </td>
                                                    <td class="align-top" colspan="4">
                                                        <x-text-span id="disp-total_harga-detail"
                                                            class="font-extrabold text-right">{{ number_format($totals['sub_price'], 0, ',', '.') }}</x-text-span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="mt-4 mb-4 mr-4 flex flex-row flex-wrap justify-end gap-2 md:gap-4">
                                        <x-primary-button id="submit-detail" tabindex="18">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.save')</span>
                                        </x-primary-button>
                                        <x-anchor-secondary href="{{ route('maintenance.index') }}" tabindex="19">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.close')</span>
                                        </x-anchor-secondary>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .readonly-select {
                cursor: not-allowed;
                opacity: 1;
            }

            @media (max-width: 1268px) {
                .field-large-show {
                    display: none;
                }
            }

            @media (min-width: 1269px) {
                .field-large-show {
                    display: block;
                }
            }

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
                        allowZerro: true,
                        thousands: '.',
                        decimal: ',',
                        precision: 0,
                    });
                })

                $("#satuan_id").on("mousedown", function(e) {
                    e.preventDefault();
                    this.blur();
                    window.focus();
                });

                function getInitialFormValues(formId) {
                    const form = document.getElementById(formId);
                    const initialValues = {};
                    for (let i = 0; i < form.elements.length; i++) {
                        const element = form.elements[i];
                        if (element.name) {
                            if (element.type === 'checkbox' || element.type === 'radio') {
                                initialValues[element.name] = element.checked;
                            } else {
                                initialValues[element.name] = element.value;
                            }
                        }
                    }
                    return initialValues;
                }

                function isFormDirty(formId, initialValues) {
                    const form = document.getElementById(formId);
                    for (let i = 0; i < form.elements.length; i++) {
                        const element = form.elements[i];
                        if (element.name) {
                            let currentValue;
                            if (element.type === 'checkbox' || element.type === 'radio') {
                                currentValue = element.checked;
                            } else {
                                currentValue = element.value;
                            }

                            if (initialValues[element.name] !== currentValue) {
                                return true;
                            }
                        }
                    }
                    return false;
                }

                const myFormInitialValues = getInitialFormValues('master-form');

                $("#print-laporan").on("click", function(e) {
                    e.preventDefault();
                    $('#print-icon').addClass('animate-spin');

                    $.ajax({
                        url: '{{ route('stock-adjustment.print', Crypt::encrypt($datas->id)) }}',
                        type: 'get',
                        success: function(result) {
                            if (result.status !== 'Not Found') {
                                var namafile = result.namafile;
                                window.open(namafile, '_blank');
                            }
                            $('#print-icon').removeClass('animate-spin');
                        }
                    });
                });

                deleteDetail = function(detailId) {
                    let idname = '#a-delete-detail-' + detailId;

                    var confirmation = confirm("Are you sure you want to delete this?");
                    if (confirmation) {
                        $(idname).closest("tr").remove();
                        $.ajax({
                            url: '{{ url('/service/maintenance/delete-detail') }}' + '/' + detailId,
                            type: 'delete',
                            dataType: 'json',
                            data: {
                                '_token': '{{ csrf_token() }}',
                            },
                            success: function(result) {
                                if (result.status !== 'Not Found') {
                                    $('#detailBody').html(result.view);
                                    flasher.error("{{ __('messages.successdeleted') }}!", "Success");
                                }
                                $('#form-order')[0].reset();
                                $('#disp-total_harga-master').html(result.total_harga_master
                                    .toLocaleString('de-DE'));
                                $('#disp-total_harga-detail').html(result.total_harga_detail
                                    .toLocaleString('de-DE'));
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                };

                $("#harga_satuan, #kuantiti, #pajak").on("change keyup paste", function() {
                    var _xhs = $('#harga_satuan').val();
                    var _xku = $('#kuantiti').val();
                    var _xst = $('#stock').val();
                    var _xpj = $('#pajak').val();
                    var xhs = (_xhs > 0) ? _xhs : 0;
                    var xku = (_xku > 0) ? _xku : 0;
                    var xst = (_xst > 0) ? _xst : 0;
                    var xpj = (_xpj > 0) ? _xpj : 0;
                    var xsub = (xhs * (1 + (xpj / 100))) * xku;
                    var formattedNumber = new Intl.NumberFormat('de-DE').format(xsub);

                    $("#disp-sub_harga").html(formattedNumber);

                    if ((xku * 1) > (xst * 1)) {
                        $("#disp-stock")
                            .removeClass("text-gray-900 bg-primary-50")
                            .addClass("text-white bg-red-700");
                    } else {
                        $("#disp-stock")
                            .removeClass("text-white bg-red-700")
                            .addClass("text-gray-900 bg-primary-50");
                    }
                });

                $("#barang_id").on("change keyup paste", function() {
                    var xbar = $('#barang_id option:selected').val();

                    $.ajax({
                        url: '{{ url('/warehouse/goods/get-goods-sell') }}' + "/" + xbar,
                        type: "GET",
                        dataType: 'json',
                        success: function(result) {
                            var p1 = result.p1;
                            var p2 = result.p2;
                            var p3 = result.p3;
                            $('#harga_satuan').val(p1);
                            $('#satuan_id').val(p2);
                            $('#stock').val(p3);
                            $('#disp-stock').html(p3.toLocaleString('de-DE'));
                            $('#kuantiti').focus();
                        }
                    });
                });

                $("#submit-detail").on("click", function(e) {
                    e.preventDefault();
                    let key = $('#order_id').val();

                    $.ajax({
                        url: '{{ url('/service/maintenance/store-detail') }}' + '/' + key,
                        type: 'post',
                        dataType: 'json',
                        data: $('form#form-order').serialize(),
                        success: function(result) {
                            if (result.status !== 'Not Found') {
                                $('#detailBody').html(result.view);
                                $('#disp-total_harga-master').html(result.total_harga_master
                                    .toLocaleString('de-DE'));
                                $('#disp-total_harga-detail').html(result.total_harga_detail
                                    .toLocaleString('de-DE'));
                                $('#form-order')[0].reset();
                                $("span.truncate").text('{{ __('messages.choose') . '...' }}');
                                $("#disp-stock").html(0);
                                $("#stock").val(0);
                                $("#disp-sub_harga").html(0);
                                flasher.success("{{ __('messages.successsaved') }}!", "Success");
                            }
                        }
                    });

                    if (isFormDirty('master-form', myFormInitialValues)) {
                        $('form#master-form').submit();
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
