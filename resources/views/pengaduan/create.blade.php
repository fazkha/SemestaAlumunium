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
            <span class="px-2 font-semibold">@lang('messages.new')</span>
        </h1>
    </div>

    <form action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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
                                        <input type="hidden" name="branch_id" value="{{ $branch_id }}" />
                                        <input type="hidden" name="user_id" value="{{ $user_id }}" />
                                        <span for="user_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.user')</span>
                                        <x-text-span>{{ $user_name }}</x-text-span>

                                        <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="tanggal"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.date')</label>
                                        <x-text-input type="date" name="tanggal" id="tanggal"
                                            data-date-format="dd-mm-yyyy" tabindex="1" placeholder="Enter date"
                                            required value="{{ old('tanggal') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="judul"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.complaint')</label>
                                        <x-textarea-input name="aduan" id="aduan" tabindex="2" rows="2"
                                            required maxlength="200"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.complaint') }}">{{ old('aduan') }}</x-textarea-input>

                                        <x-input-error class="mt-2" :messages="$errors->get('aduan')" />
                                    </div>
                                </div>

                                <div class="w-full lg:w-1/2 px-2 flex flex-col justify-start">
                                    <div class="w-auto pb-4 lg:pb-12">
                                        <label for="gambar"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.picture')</label>
                                        <x-text-input type="file" name="gambar" id="gambar" tabindex="3"
                                            accept=".jpg,.jpeg" placeholder="@lang('messages.choose')"
                                            class="!rounded-none border" />

                                        <x-input-error class="mt-2" :messages="$errors->get('gambar')" />

                                        <div class="mt-2 flex justify-center">
                                            <img id="image-preview" class="w-full lg:w-3/5 h-auto border rounded-lg"
                                                src="{{ url('/') }}/images/0cd6be830e32f80192d496e50cfa9dbc.jpg"
                                                alt="o.o">
                                        </div>
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

                                        <x-primary-button type="submit" class="block" tabindex="5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.save')</span>
                                        </x-primary-button>
                                        <x-anchor-secondary href="{{ route('complaint.index') }}" tabindex="6">
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

    @push('styles')
        <style>
            .dark input[type="date"]::-webkit-calendar-picker-indicator {
                filter: invert(1);
            }
        </style>
    @endpush

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function(e) {
                $(function() {
                    $('#gambar').change(function() {
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            $('#image-preview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    });
                })
            });
        </script>
    @endpush
</x-app-layout>
