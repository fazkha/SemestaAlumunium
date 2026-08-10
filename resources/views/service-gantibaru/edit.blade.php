@php
    use Illuminate\Support\Facades\Crypt;
@endphp
@section('title', __('messages.gantibaru'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('replacement.index') }}" class="flex items-center justify-center">
                <svg class="size-7" version="1.1" id="REPAIR" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800"
                    enable-background="new 0 0 1800 1800" xml:space="preserve">
                    <g>
                        <g>
                            <path fill="currentColor"
                                d="M803.722,820.892l-247.878-247.87l71.705-71.702l247.875,247.871l40.808-40.802L655.949,448.104 l74.925-74.921c0.596-0.596,1.147-1.216,1.682-1.86c0.592-0.499,1.175-1.006,1.735-1.562l135.512-135.512 c11.126-11.12,11.292-29.106,0.366-40.43l-1.538-1.606c-1.284-1.349-2.572-2.693-3.893-4.018 C796.995,120.454,709.056,80.01,629.497,80.01c-53.655,0-99.814,17.796-133.483,51.468c-0.733,0.73-1.409,1.503-2.053,2.3 c-0.443,0.388-0.89,0.765-1.309,1.183L185.294,442.324c-11.267,11.271-11.267,29.539,0,40.81l45.403,45.399l-37.493,37.493 l-45.403-45.408c-5.414-5.41-12.752-8.453-20.405-8.453c-7.652,0-14.99,3.043-20.404,8.453L12.869,614.75 c-11.268,11.271-11.268,29.538,0,40.802l197.415,197.416c5.414,5.41,12.752,8.454,20.404,8.454c7.653,0,14.995-3.043,20.405-8.454 l94.115-94.13c11.268-11.264,11.268-29.531,0-40.802l-45.395-45.399l37.493-37.493l45.395,45.399 c5.636,5.636,13.019,8.446,20.405,8.446c7.383,0,14.77-2.818,20.401-8.446l79.124-79.124l260.285,260.285L803.722,820.892z M629.497,137.719c58.812,0,124.33,28.287,178.733,76.497l-94.34,94.334L559.981,154.64 C579.485,143.503,603.046,137.719,629.497,137.719z M230.688,791.756L74.079,635.15l53.317-53.321l156.602,156.605 L230.688,791.756z M261.089,629.749l-24.999-24.999l35.408-35.408l24.998,24.998L261.089,629.749z M403.106,619.331 L246.505,462.725L513.058,196.17l156.609,156.612L403.106,619.331z" />
                            <path fill="currentColor"
                                d="M1763.996,1556.146l-593.695-593.688l-40.803,40.801l573.296,573.296l-71.701,71.709l-573.303-573.303 l-40.803,40.81l593.704,593.705c5.41,5.408,12.752,8.452,20.401,8.452c7.657,0,14.999-3.044,20.409-8.452l112.502-112.521 C1775.268,1585.686,1775.268,1567.418,1763.996,1556.146z" />
                        </g>
                        <path fill="currentColor"
                            d="M1780.444,264.271c-3.269-9.372-11.135-16.4-20.812-18.614c-9.67-2.206-19.806,0.708-26.825,7.729 l-116.585,116.576l-109.307-109.315l116.585-116.57c7.02-7.021,9.942-17.156,7.729-26.833c-2.214-9.679-9.243-17.541-18.614-20.814 c-29.071-10.149-59.48-15.298-90.379-15.298c-73.062,0-141.743,28.449-193.397,80.104c-51.671,51.66-80.123,120.344-80.123,193.406 c0,35.343,6.723,69.648,19.442,101.514l-736.242,736.236c-31.861-12.721-66.158-19.435-101.497-19.435 c-73.058,0-141.744,28.452-193.407,80.115c-73.802,73.801-99.243,185.193-64.809,283.775c3.272,9.372,11.134,16.4,20.812,18.614 c9.673,2.206,19.809-0.7,26.833-7.72l116.581-116.586l109.315,109.299l-116.585,116.586c-7.021,7.02-9.938,17.155-7.729,26.833 c2.214,9.677,9.242,17.534,18.613,20.812c29.064,10.152,59.468,15.296,90.372,15.304c0.008,0,0.008,0,0.016,0 c73.042,0,141.728-28.46,193.39-80.122c79.559-79.566,99.726-196.352,60.563-294.822l736.347-736.333 c31.865,12.728,66.162,19.443,101.506,19.443c0.008,0,0,0,0.008,0c73.046,0,141.736-28.444,193.391-80.106 C1789.438,474.246,1814.878,362.854,1780.444,264.271z M583.011,1599.065c-40.762,40.763-94.948,63.216-152.58,63.216 c0,0-0.012,0-0.016,0c-7.915-0.008-15.792-0.436-23.602-1.28l100.137-100.138c5.414-5.417,8.454-12.752,8.454-20.408 c0-7.648-3.04-14.99-8.454-20.4L356.83,1369.946c-11.263-11.264-29.535-11.264-40.806,0l-100.072,100.072 c-6.835-64.134,15.333-129.603,61.871-176.146c40.762-40.762,94.952-63.207,152.597-63.207c57.64,0,111.83,22.445,152.588,63.215 C667.146,1378.013,667.146,1514.926,583.011,1599.065z M659.282,1288.535l-70.945-70.951l702.501-702.488l70.953,70.944 L659.282,1288.535z M1674.832,507.246c-40.761,40.753-94.951,63.199-152.596,63.199S1410.394,548,1369.632,507.238 c-40.753-40.762-63.207-94.953-63.207-152.597s22.454-111.834,63.216-152.598c40.753-40.758,94.951-63.204,152.596-63.204 c7.922,0,15.796,0.429,23.605,1.28l-100.137,100.127c-5.411,5.41-8.453,12.752-8.453,20.4c0,7.657,3.042,14.991,8.453,20.401 l150.108,150.117c11.271,11.271,29.547,11.271,40.81,0.008l100.072-100.073C1743.531,395.234,1721.367,460.704,1674.832,507.246z" />
                    </g>
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.services')</span>
                    <span>@lang('messages.gantibaru')</span>
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
                    @include('service-gantibaru.partials.feedback')
                </div>

                <form id="master-form" action="{{ route('replacement.update', Crypt::Encrypt($datas->id)) }}"
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
                                        <label for="petugas_replacement_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.officer')</label>
                                        <select name="petugas_replacement_id" id="petugas_replacement_id" tabindex="4"
                                            required autofocus
                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                            <option value="">@lang('messages.choose')...</option>
                                            @foreach ($petugass as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ $datas->petugas_replacement_id == $id ? 'selected' : '' }}>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('petugas_replacement_id')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="tindak_lanjut"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.tindaklanjut')</label>
                                        <x-text-span>
                                            <div class="flex flex-row items-center justify-evenly gap-2">
                                                <label
                                                    class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                    <input type="checkbox" id="isperawatan" name="isperawatan"
                                                        tabindex="10"
                                                        class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                                                        {{ $datas->isperawatan == '1' ? 'checked' : '' }}
                                                        {{ $datas->isperawatan == '1' ? 'disabled' : '' }}>
                                                    <span
                                                        class="group-hover:text-blue-500 transition-colors duration-300 text-right w-fit">
                                                        @lang('messages.maintenance_2')
                                                    </span>
                                                </label>

                                                <label
                                                    class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                    <input type="checkbox" id="isperbaikan" name="isperbaikan"
                                                        tabindex="11"
                                                        class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                                                        {{ $datas->isperbaikan == '1' ? 'checked' : '' }}
                                                        {{ $datas->isperbaikan == '1' ? 'disabled' : '' }}>
                                                    <span
                                                        class="group-hover:text-blue-500 transition-colors duration-300 text-right w-fit">
                                                        @lang('messages.repair')
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
                                        <x-anchor-secondary href="{{ route('replacement.index') }}" tabindex="9">
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
                                        @lang('messages.gantibaru')
                                    </span>
                                </div>

                                <div
                                    class="border rounded-md border-primary-100 bg-primary-100 dark:bg-primary-850 dark:border-primary-800 dark:text-gray-400">
                                    <div class="relative p-2 overflow-x-auto overflow-y-visible">
                                        <table id="order_table" class="w-full border-separate border-spacing-2">
                                            <thead>
                                                <tr>
                                                    <th class="w-1/4">@lang('messages.replacementtype')</th>
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
                                                @include('service-gantibaru.partials.details', [
                                                    $details,
                                                    'viewMode' => false,
                                                ])
                                            </tbody>

                                            <tbody>
                                                <tr>
                                                    <td class="align-top">
                                                        <select id="jenis_gantibaru_id" name="jenis_gantibaru_id"
                                                            required tabindex="12"
                                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                                            <option value="">@lang('messages.choose')...</option>
                                                            @foreach ($jenis_gantibarus as $id => $name)
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
                                        <x-anchor-secondary href="{{ route('replacement.index') }}" tabindex="19">
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

                deleteDetail = function(detailId) {
                    let idname = '#a-delete-detail-' + detailId;

                    var confirmation = confirm("Are you sure you want to delete this?");
                    if (confirmation) {
                        $(idname).closest("tr").remove();
                        $.ajax({
                            url: '{{ url('/service/replacement/delete-detail') }}' + '/' + detailId,
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
                        url: '{{ url('/service/replacement/store-detail') }}' + '/' + key,
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
