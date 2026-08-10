@section('title', __('messages.services'))

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
            <span class="px-2">💠</span>
            <span class="px-2 font-semibold">@lang('messages.new')</span>
        </h1>
    </div>

    <form action="{{ route('inspect.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="py-2 flex flex-col">

            <div class="w-full px-4 py-2">
                <div class="flex flex-col items-center">

                    <div class="w-full" role="alert">
                        @include('service-order.partials.feedback')
                    </div>

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
                                                data-date-format="dd-mm-yyyy" tabindex="3" placeholder="Enter date"
                                                required value="{{ old('tanggal') }}" />

                                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                                        </div>
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="petugas_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.officer')</label>
                                        <select name="petugas_id" id="petugas_id" tabindex="4" required
                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                            <option value="">@lang('messages.choose')...</option>
                                            @foreach ($petugass as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ old('petugas_id') == $id ? 'selected' : ($petugass->count() == 1 ? 'selected' : '') }}>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('petugas_id')" />
                                    </div>
                                </div>

                                <div class="w-full lg:w-1/2 px-2 flex flex-col justify-start">
                                    <div class="w-auto pb-4">
                                        <label for="keterangan"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.description')</label>
                                        <x-text-input type="text" maxlength="200" name="keterangan" id="keterangan"
                                            tabindex="5"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.description') }}"
                                            value="{{ old('keterangan') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                                    </div>

                                    <div class="w-auto pb-4 lg:pb-12">
                                        <span for="no_order"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.ordernumber')</span>
                                        <x-text-span
                                            id="disp-no_order">{{ old('no_order', $sro_prefix . '/---/---/----/--/---') }}</x-text-span>
                                        <x-text-input type="hidden" name="no_order" id="no_order"
                                            placeholder="Enter order number"
                                            value="{{ old('no_order', $sro_prefix . '/---/---/----/--/---') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('no_order')" />
                                    </div>

                                    <div class="flex flex-row flex-wrap items-center justify-end gap-2 md:gap-4">
                                        <div class="w-auto">
                                            <label
                                                class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                <input type="checkbox" id="isactive" name="isactive" tabindex="6"
                                                    class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                                                    checked>
                                                <span
                                                    class="pr-4 group-hover:text-blue-500 transition-colors duration-300 text-right w-1/2 md:w-full">
                                                    @lang('messages.active')
                                                </span>
                                            </label>
                                        </div>

                                        <x-primary-button type="submit" class="block" tabindex="7">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.save')</span>
                                        </x-primary-button>
                                        <x-anchor-secondary href="{{ route('inspect.index') }}" tabindex="7">
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
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-4 px-4 py-2">
                <div class="w-full overflow-x-auto">
                    <div class="flex flex-col items-center">

                        <div class="w-full" role="alert">
                            @include('service-order.partials.feedback')
                        </div>

                        {{-- Detail --}}
                        <div
                            class="w-full shadow-lg rounded-md border bg-primary-50 border-primary-100 dark:bg-primary-900 dark:border-primary-800">
                            <div class="p-4 space-y-2">
                                <div class="flex flex-row items-center gap-2">
                                    <svg class="size-5" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.75 4.48h-.71L2 3.43l.71-.7.69.68L4.81 2l.71.71-1.77 1.77zM6.99 3h8v1h-8V3zm0 3h8v1h-8V6zm8 3h-8v1h8V9zm-8 3h8v1h-8v-1zM3.04 7.48h.71l1.77-1.77-.71-.7L3.4 6.42l-.69-.69-.71.71 1.04 1.04zm.71 3.01h-.71L2 9.45l.71-.71.69.69 1.41-1.42.71.71-1.77 1.77zm-.71 3.01h.71l1.77-1.77-.71-.71-1.41 1.42-.69-.69-.71.7 1.04 1.05z" />
                                    </svg>
                                    <span class="block font-medium text-primary-600">
                                        @lang('messages.inspect')
                                    </span>
                                </div>

                                <div
                                    class="border rounded-md border-primary-100 bg-primary-100 dark:bg-primary-850 dark:border-primary-800 dark:text-gray-400">
                                    <div class="p-2 overflow-scroll md:overflow-auto lg:overflow-hidden">
                                        <table id="order_table" class="w-full border-separate border-spacing-2">
                                            <thead>
                                                <tr>
                                                    <th class="w-1/6">@lang('messages.sequence')</th>
                                                    <th class="w-1/3">@lang('messages.inspect')</th>
                                                    <th class="w-auto">@lang('messages.check')</th>
                                                    <th class="w-auto">@lang('messages.description')</th>
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
    @endpush
</x-app-layout>
