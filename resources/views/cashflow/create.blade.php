@section('title', __('messages.cashflow'))

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
            <span class="px-2">💠</span>
            <span class="px-2 font-semibold">@lang('messages.new')</span>
        </h1>
    </div>

    <form action="{{ route('cashflow.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="py-2 flex flex-col">

            <div class="w-full px-4 py-2">
                <div class="flex flex-col items-center">

                    <div class="w-full" role="alert">
                        @include('cashflow.partials.feedback')
                    </div>

                    {{-- Master --}}
                    <div
                        class="w-full shadow-lg bg-primary-50 rounded-md border border-primary-100 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                        <div class="p-4 space-y-2">

                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-1/2 px-2">

                                    <div class="w-auto pb-4">
                                        <label for="bulan"
                                            class="block mb-2 font-medium text-primary-600">@lang('calendar.month')</label>
                                        <select id="bulan" name="bulan" tabindex="1" required
                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                            <option {{ old('bulan') == 'all' ? 'selected' : '' }} value="all">
                                                @lang('messages.all')
                                            </option>
                                            @foreach ($bulans as $id => $name)
                                                <option {{ old('bulan') == $id ? 'selected' : '' }}
                                                    value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('bulan')" />
                                    </div>

                                </div>

                                <div class="w-full lg:w-1/2 px-2 flex flex-col justify-start">
                                    <div class="w-auto pb-4 lg:pb-12">
                                        <label for="tahun"
                                            class="block mb-2 font-medium text-primary-600">@lang('calendar.year')</label>
                                        <x-text-input type="number" min="1" name="tahun" id="tahun"
                                            tabindex="2"
                                            placeholder="{{ __('messages.enter') }} {{ __('calendar.year') }}" required
                                            value="{{ old('tahun') ? old('tahun') : date('Y') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('tahun')" />
                                    </div>

                                    <div class="flex flex-row flex-wrap items-center justify-end gap-2 md:gap-4">
                                        <x-primary-button type="submit" class="block" tabindex="7">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.save')</span>
                                        </x-primary-button>
                                        <x-anchor-secondary href="{{ route('cashflow.index') }}" tabindex="8">
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
                <div class="w-full overflow-x-auto">
                    <div class="flex flex-col items-center">

                        <div class="w-full" role="alert">
                            @include('cashflow.partials.feedback')
                        </div>

                        {{-- Detail --}}
                        <div
                            class="w-full shadow-lg rounded-md border bg-primary-50 border-primary-100 dark:bg-primary-900 dark:border-primary-800">
                            <div class="p-4 space-y-2">
                                <div class="flex flex-row items-center gap-2">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"
                                        xml:space="preserve">
                                        <path fill="currentColor"
                                            d="M5,9h18v1H5V9z M5,13h8v9H5V13z M6,21h6v-7H6V21z M16,14h7v-1h-7V14z M16,16h7v-1h-7V16z M16,20h7v-1 h-7V20z M16,18h7v-1h-7V18z M16,22h7v-1h-7V22z M32,7v17c0,2.206-1.794,4-4,4H4c-2.206,0-4-1.794-4-4V5c0-0.552,0.448-1,1-1h26 c0.552,0,1,0.448,1,1v1h3C31.552,6,32,6.448,32,7z M30,8h-3v14h-1V7V6H2v18c0,1.103,0.897,2,2,2h24c1.103,0,2-0.897,2-2V8z" />
                                    </svg>
                                    <span class="block font-medium text-primary-600">
                                        @lang('messages.cashflow')
                                    </span>
                                </div>

                                <div
                                    class="border rounded-md border-primary-100 bg-primary-100 dark:bg-primary-850 dark:border-primary-800 dark:text-gray-400">
                                    <div class="p-2 overflow-scroll md:overflow-auto lg:overflow-hidden">
                                        <table id="order_table" class="w-full border-separate border-spacing-2">
                                            <thead>
                                                <tr>
                                                    <th class="w-1/12">&nbsp;</th>
                                                    <th class="w-auto">@lang('messages.account')</th>
                                                    <th class="w-1/6">@lang('messages.nominal')</th>
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
