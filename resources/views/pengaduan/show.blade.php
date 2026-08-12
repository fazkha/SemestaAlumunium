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

                                    <x-anchor-secondary href="{{ route('complaint.index') }}" tabindex="1" autofocus>
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
