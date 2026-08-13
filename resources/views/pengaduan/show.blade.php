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
            <span class="px-2">💠</span>
            <span class="px-2 font-semibold">@lang('messages.view')</span>
        </h1>
    </div>

    <div class="py-2 flex flex-col">

        <div class="w-full px-4 py-2">
            <div class="flex flex-col items-center">

                <div class="w-full" role="alert">
                    @include('pengaduan.partials.feedback')
                </div>

                <div
                    class="w-full shadow-lg bg-primary-50 rounded-md border border-primary-100 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                    <div class="p-4 space-y-2">

                        <div class="flex flex-col lg:flex-row">
                            <div class="w-full lg:w-1/2 px-2">

                                <div class="w-auto pb-4">
                                    <span for="user_id"
                                        class="block mb-2 font-medium text-primary-600">@lang('messages.user')</span>
                                    <x-text-span>{{ $datas->user->name }}</x-text-span>
                                </div>

                                <div class="w-auto pb-4">
                                    <span for="tanggal"
                                        class="block mb-2 font-medium text-primary-600">@lang('messages.date')</span>
                                    <x-text-span>{{ $datas->tanggal }}</x-text-span>
                                </div>

                                <div class="w-auto pb-4">
                                    <span for="keterangan"
                                        class="block mb-2 font-medium text-primary-600">@lang('messages.complaint')</span>
                                    <x-text-span>{{ $datas->aduan }}</x-text-span>
                                </div>
                            </div>

                            <div class="w-full lg:w-1/2 px-2 flex flex-col justify-start">
                                <div class="w-auto pb-4 lg:pb-12">
                                    <label for="gambar"
                                        class="text-center block mb-2 font-medium text-primary-600">@lang('messages.picture')</label>
                                    <div class="mt-2 flex justify-center">
                                        <img id="image-preview" class="w-full lg:w-3/5 h-auto border rounded-lg"
                                            @if ($datas->gambar) src="{{ asset($datas->lokasi . '/' . $datas->gambar) }}" @else src="{{ url('/') }}/images/0cd6be830e32f80192d496e50cfa9dbc.jpg" @endif
                                            alt="o.o" />
                                    </div>
                                </div>

                                <div class="flex flex-row flex-wrap items-center justify-end gap-2 md:gap-4">
                                    <div class="pr-2">
                                        <div class="inline-flex items-center">
                                            @if ($datas->isactive == '1')
                                                <span>✔️</span>
                                            @endif
                                            @if ($datas->isactive == '0')
                                                <span>❌</span>
                                            @endif
                                            <span class='pl-2'>@lang('messages.active')</span>
                                        </div>
                                    </div>

                                    @role('Kepala Departemen Pelayanan')
                                        <x-anchor-primary
                                            href="{{ route('complaint.forward-action', Crypt::encrypt($datas->id)) }}"
                                            tabindex="1">
                                            <svg class="size-5" viewBox="0 0 1024 1024" class="icon" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M219.51 475.38h219.43v73.14H219.51z" fill="currentColor" />
                                                <path
                                                    d="M182.61 366.27h585.62v179.48h73.14V145.62c0-39.96-32.5-72.48-72.46-72.48h-27.36c-29.2 0-55.05 16.73-65.88 42.59-5.71 13.61-27.84 13.64-33.55 0-10.86-25.88-36.71-42.59-65.89-42.59h-18.16c-29.2 0-55.05 16.73-65.88 42.59-5.71 13.61-27.84 13.64-33.55 0-10.86-25.88-36.71-42.59-65.89-42.59h-17.43c-29.2 0-55.05 16.73-65.88 42.59-5.71 13.61-27.84 13.64-33.55 0-10.86-25.88-36.71-42.59-65.89-42.59h-27.57c-39.96 0-72.48 32.52-72.48 72.48v805.12h437.79V877.6h-364.7l-0.43-511.33zM208.42 144c14.27 34.07 47.32 56.09 84.23 56.09 36.89 0 69.95-22 82.66-53.8l15.86-2.29c14.27 34.07 47.32 56.09 84.23 56.09 36.89 0 69.95-22 82.66-53.8l16.59-2.29c14.27 34.07 47.32 56.09 84.23 56.09 36.89 0 69.95-22 82.66-53.8l26.68-0.66v147.5H182.54l-0.12-146.84 26-2.29z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M905.81 897.5l-56.19-56.19c17.6-26.2 27.91-57.71 27.91-91.65 0-90.89-73.68-164.57-164.57-164.57s-164.57 73.68-164.57 164.57 73.68 164.57 164.57 164.57c30.4 0 58.52-8.82 82.96-23.19l58.18 58.18 51.71-51.72zM621.53 749.66c0-50.41 41.02-91.43 91.43-91.43 50.42 0 91.43 41.02 91.43 91.43 0 50.41-41.01 91.43-91.43 91.43-50.41 0-91.43-41.02-91.43-91.43z"
                                                    fill="currentColor" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.inspect')</span>
                                        </x-anchor-primary>

                                        <x-anchor-danger href="{{ route('complaint.delete', Crypt::encrypt($datas->id)) }}"
                                            tabindex="1">
                                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.delete')</span>
                                        </x-anchor-danger>
                                    @endrole

                                    <x-anchor-secondary href="{{ route('complaint.index') }}" tabindex="2">
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
</x-app-layout>
