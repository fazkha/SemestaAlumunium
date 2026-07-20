@php
    use Illuminate\Support\Facades\Crypt;
@endphp
@section('title', __('messages.unit'))

<x-app-layout>
    <div class="flex items-center justify-between px-4 py-4 border-b border-primary-100 lg:py-6">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('units.index') }}" class="flex items-center justify-center">
                <svg fill="currentColor" class="size-7" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path
                        d="M17 2C16.449219 2 16 2.449219 16 3L16 11C16 11.550781 16.449219 12 17 12L33 12C33.554688 12 34 11.550781 34 11L34 3C34 2.449219 33.554688 2 33 2 Z M 29 7L31 7L31 9L29 9 Z M 22 14L22 30L10 30C9.675781 30 9.375 30.167969 9.1875 30.4375L2.46875 40L47.53125 40L40.8125 30.4375C40.625 30.167969 40.324219 30 40 30L28 30L28 14 Z M 2 42L2 45C2 45.554688 2.449219 46 3 46L4 46L4 47L6 47L6 46L44 46L44 47L46 47L46 46L47 46C47.554688 46 48 45.554688 48 45L48 42Z" />
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.warehouse')</span>
                    <span>@lang('messages.unit')</span>
                </div>
            </a>
            <span class="px-2">&raquo;</span>
            <span class="px-2 font-semibold">@lang('messages.edit')</span>
        </h1>
    </div>

    <form id="satuan-form" action="{{ route('units.update', Crypt::Encrypt($datas->id)) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="py-2 flex flex-col">

            <div class="w-full px-4 py-2">
                <div class="flex flex-col items-center">

                    <div class="w-full" role="alert">
                        @include('satuan.partials.feedback')
                    </div>

                    <div class="w-full shadow-lg bg-primary-50 rounded-md border border-primary-100">
                        <div class="p-4 space-y-2">

                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-1/2 px-2">

                                    <div class="w-auto pb-4">
                                        <label for="singkatan"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.abbreviation')</label>
                                        <x-text-input type="text" name="singkatan" id="singkatan" tabindex="1"
                                            autofocus
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.abbreviation') }}"
                                            required value="{{ old('singkatan', $datas->singkatan) }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('singkatan')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="nama_lengkap"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.unitname')</label>
                                        <x-text-input type="text" name="nama_lengkap" id="nama_lengkap"
                                            tabindex="2"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.unitname') }}"
                                            required value="{{ old('nama_lengkap', $datas->nama_lengkap) }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />
                                    </div>

                                </div>

                                <div class="w-full lg:w-1/2 px-2 flex flex-col justify-start">
                                    <div class="w-auto pb-4 lg:pb-12">
                                        <label for="keterangan"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.description')</label>
                                        <x-text-input type="text" name="keterangan" id="keterangan" tabindex="3"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.description') }}"
                                            required value="{{ old('keterangan', $datas->keterangan) }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                                    </div>

                                    <div class="flex flex-row flex-wrap items-center justify-end gap-2 md:gap-4">
                                        <div class="w-auto">
                                            <label
                                                class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                <input type="checkbox" id="isactive" name="isactive"
                                                    class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md"
                                                    {{ $datas->isactive == '1' ? 'checked' : '' }}>
                                                <span
                                                    class="pr-4 group-hover:text-blue-500 transition-colors duration-300 text-right w-1/2 md:w-full">
                                                    @lang('messages.active')
                                                </span>
                                            </label>
                                        </div>

                                        <x-primary-button type="submit" class="block" tabindex="5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.save')</span>
                                        </x-primary-button>
                                        <x-anchor-secondary href="{{ route('units.index') }}" tabindex="6">
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

        </div>
    </form>

    @push('scripts')
    @endpush
</x-app-layout>
