@section('title', __('messages.customer'))

<x-app-layout>
    <div
        class="flex items-center justify-between px-4 py-4 border-b border-primary-100 dark:border-primary-700 lg:py-6 text-primary-700 dark:text-primary-500">
        <h1 class="text-xl flex items-center justify-center">
            <a href="{{ route('customer.index') }}" class="flex items-center justify-center">
                <svg fill="currentColor" class="size-7" viewBox="0 0 64 64" id="Layer_1_1_" version="1.1"
                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g>
                        <path
                            d="M20.024,27.396l8.333,7.354l1.324-1.5l-8.334-7.354C20.517,25.164,20.04,24.108,20.04,23h-2 C18.04,24.682,18.764,26.284,20.024,27.396z" />
                        <path
                            d="M17.378,30.396l14.663,12.938l14.634-12.956c2.101-1.861,3.312-4.537,3.324-7.338L50,22.909 c0.012-2.644-1.008-5.131-2.873-7.004c-0.353-0.354-0.733-0.668-1.127-0.96v-3.721l-2.893-0.739 c-0.02-0.049-0.04-0.098-0.061-0.146l1.523-2.567L39.229,2.43l-2.567,1.523c-0.049-0.021-0.098-0.041-0.146-0.061L35.776,1h-7.553 l-0.739,2.893c-0.049,0.02-0.098,0.04-0.146,0.061L24.771,2.43L19.43,7.771l1.523,2.567c-0.021,0.049-0.041,0.098-0.061,0.146 L18,11.224v3.757c-2.399,1.801-3.96,4.66-3.96,7.883V23C14.04,25.829,15.257,28.524,17.378,30.396z M20,12.776l2.407-0.614 l0.179-0.504c0.114-0.326,0.247-0.644,0.395-0.953l0.23-0.481l-1.268-2.137l3.144-3.144l2.137,1.268l0.481-0.23 c0.31-0.147,0.627-0.28,0.953-0.395l0.504-0.179L29.776,3h4.447l0.614,2.407l0.504,0.179c0.326,0.114,0.644,0.247,0.953,0.395 l0.481,0.23l2.137-1.268l3.144,3.144l-1.268,2.137l0.23,0.481c0.147,0.31,0.28,0.627,0.395,0.953l0.179,0.504L44,12.776v1.01 C42.794,13.273,41.487,13,40.136,13c-0.131,0-0.261,0.011-0.391,0.017C38.853,9.529,35.681,7,32,7 c-3.678,0-6.852,2.529-7.744,6.015C24.138,13.011,24.022,13,23.904,13c-1.387,0-2.706,0.291-3.904,0.809V12.776z M30.013,15.115 C30.01,15.076,30,15.039,30,15c0-1.103,0.897-2,2-2s2,0.897,2,2c0,0.052-0.014,0.103-0.018,0.155l-1.967,1.565l-1.914-1.54 C30.072,15.157,30.041,15.137,30.013,15.115z M35.854,13.988C35.403,12.274,33.854,11,32,11c-1.846,0-3.388,1.263-3.847,2.966 c-0.606-0.288-1.239-0.515-1.892-0.675C27.005,10.792,29.32,9,32,9c2.685,0,5.001,1.796,5.743,4.299 C37.091,13.463,36.46,13.697,35.854,13.988z M16.04,22.864c0-4.336,3.528-7.864,7.876-7.864c1.788,0,3.539,0.617,4.931,1.738 l3.16,2.542l3.234-2.571C36.626,15.607,38.364,15,40.136,15c2.107,0,4.087,0.822,5.574,2.316c1.486,1.493,2.3,3.477,2.29,5.58 l-0.001,0.133c-0.01,2.235-0.976,4.368-2.65,5.852l-13.31,11.784L18.701,28.896C17.01,27.404,16.04,25.255,16.04,23V22.864z" />
                        <path
                            d="M59.879,34c-0.822,0-1.626,0.333-2.207,0.914L51.586,41h-3.384l1.274-1.911C49.818,38.574,50,37.976,50,37.357v-0.236 C50,35.4,48.6,34,46.879,34c-0.822,0-1.626,0.333-2.207,0.914l-9.621,9.621C33.729,45.857,33,47.615,33,49.485V55h-2v-5.515 c0-1.87-0.729-3.628-2.051-4.95l-9.621-9.621C18.747,34.333,17.943,34,17.121,34C15.4,34,14,35.4,14,37.121v0.236 c0,0.618,0.182,1.217,0.524,1.731L15.798,41h-3.384l-6.086-6.086C5.747,34.333,4.943,34,4.121,34C2.4,34,1,35.4,1,37.121v0.236 c0,0.618,0.182,1.217,0.524,1.731l5.862,8.794C8.688,49.835,10.866,51,13.211,51H19c0.552,0,1,0.448,1,1v3h-2v8h13h2h13v-8h-2v-3 c0-0.552,0.448-1,1-1h5.789c2.345,0,4.522-1.165,5.824-3.117l5.862-8.794C62.818,38.574,63,37.976,63,37.357v-0.236 C63,35.4,61.6,34,59.879,34z M19,49h-5.789c-1.675,0-3.23-0.832-4.16-2.227l-5.862-8.794C3.065,37.795,3,37.579,3,37.357v-0.236 C3,36.503,3.503,36,4.121,36c0.295,0,0.584,0.119,0.793,0.328L11.586,43h5.546l1.036,1.555l1.664-1.109l-3.644-5.466 C16.065,37.795,16,37.579,16,37.357v-0.236C16,36.503,16.503,36,17.121,36c0.295,0,0.584,0.119,0.793,0.328l9.621,9.621 c0.944,0.944,1.465,2.2,1.465,3.536V55h-7v-3C22,50.346,20.654,49,19,49z M31,61H20v-4h11V61z M44,61H33v-4h11V61z M61,37.357 c0,0.222-0.065,0.438-0.188,0.622l-5.862,8.794C54.02,48.168,52.464,49,50.789,49H45c-1.654,0-3,1.346-3,3v3h-7v-5.515 c0-1.336,0.521-2.592,1.465-3.536l9.621-9.621C46.295,36.119,46.584,36,46.879,36C47.497,36,48,36.503,48,37.121v0.236 c0,0.222-0.065,0.438-0.188,0.622l-3.644,5.466l1.664,1.109L46.868,43h5.546l6.672-6.672C59.295,36.119,59.584,36,59.879,36 C60.497,36,61,36.503,61,37.121V37.357z" />
                    </g>
                </svg>
                <div class="relative px-2 pt-2">
                    <span class="absolute top-0 left-2 text-xs w-40">@lang('messages.sale')</span>
                    <span>@lang('messages.customer')</span>
                </div>
            </a>
            <span class="px-2">💠</span>
            <span class="px-2 font-semibold">@lang('messages.new')</span>
        </h1>
    </div>

    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="py-2 flex flex-col">

            <div class="w-full px-4 py-2">
                <div class="flex flex-col items-center">

                    <div class="w-full" role="alert">
                        @include('customer.partials.feedback')
                    </div>

                    <div
                        class="w-full shadow-lg bg-primary-50 rounded-md border border-primary-100 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                        <div class="p-4 space-y-2">

                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-1/2 px-2">

                                    <div class="w-auto pb-4">
                                        <span for="branch_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.branch')</span>
                                        <input type="hidden" name="branch_id" value="{{ $branch_id }}" />
                                        <x-text-span>{{ $branch->nama }}</x-text-span>
                                    </div>

                                    <div class="flex flex-row gap-2">
                                        <div class="w-1/3 pb-4">
                                            <label for="customer_group_id"
                                                class="block mb-2 font-medium text-primary-600">@lang('messages.group')</label>
                                            <select name="customer_group_id" id="customer_group_id" tabindex="1"
                                                autofocus
                                                class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                                <option value="">@lang('messages.choose')...</option>
                                                @foreach ($groups as $id => $name)
                                                    <option value="{{ $id }}"
                                                        {{ old('customer_group_id') == $id ? 'selected' : '' }}>
                                                        {{ $name }}</option>
                                                @endforeach
                                            </select>

                                            <x-input-error class="mt-2" :messages="$errors->get('customer_group_id')" />
                                        </div>

                                        <div class="w-2/3 pb-4">
                                            <label for="branch_link_id"
                                                class="block mb-2 font-medium text-primary-600">@lang('messages.relatedbranch')</label>
                                            <select name="branch_link_id" id="branch_link_id" tabindex="1"
                                                class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                                <option value="">@lang('messages.choose')...</option>
                                                @foreach ($branches as $id => $name)
                                                    <option value="{{ $id }}"
                                                        {{ old('branch_link_id') == $id ? 'selected' : '' }}>
                                                        {{ $name }}</option>
                                                @endforeach
                                            </select>

                                            <x-input-error class="mt-2" :messages="$errors->get('branch_link_id')" />
                                        </div>
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="kode"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.customercode')</label>
                                        <x-text-input type="text" name="kode" id="kode" tabindex="2"
                                            autofocus
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.customercode') }}"
                                            required value="{{ old('kode') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('kode')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="nama"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.customername')</label>
                                        <x-text-input type="text" name="nama" id="nama" tabindex="3"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.customername') }}"
                                            required value="{{ old('nama') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="alamat"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.customeraddress')</label>
                                        <x-text-input type="text" name="alamat" id="alamat" tabindex="4"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.customeraddress') }}"
                                            required value="{{ old('alamat') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="propinsi_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.propinsi')</label>
                                        <select name="propinsi_id" id="propinsi_id" tabindex="5" required
                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                            <option value="">@lang('messages.choose')...</option>
                                            @foreach ($propinsis as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ old('propinsi_id') == $id ? 'selected' : '' }}>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('propinsi_id')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="kabupaten_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.kabupaten')</label>
                                        <select name="kabupaten_id" id="kabupaten_id" tabindex="6" required
                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                            <option value="">@lang('messages.choose')...</option>
                                            @foreach ($kabupatens as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ old('kabupaten_id') == $id ? 'selected' : '' }}>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('kabupaten_id')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="kecamatan_id"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.kecamatan')</label>
                                        <select name="kecamatan_id" id="kecamatan_id" tabindex="6" required
                                            class="w-full block text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 border-primary-100 bg-primary-20 dark:placeholder-gray-600 dark:border-primary-800 dark:bg-primary-700 dark:text-gray-400">
                                            <option value="">@lang('messages.choose')...</option>
                                            @foreach ($kecamatans as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ old('kecamatan_id') == $id ? 'selected' : '' }}>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('kecamatan_id')" />
                                    </div>
                                </div>

                                <div class="w-full lg:w-1/2 px-2 flex flex-col justify-start">
                                    <div class="w-auto pb-4">
                                        <label for="tanggal_gabung"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.joindate')</label>
                                        <x-text-input type="date" name="tanggal_gabung" id="tanggal_gabung"
                                            tabindex="5" value="{{ date('Y-m-d') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('tanggal_gabung')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="kontak_nama"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.contactname')</label>
                                        <x-text-input type="text" name="kontak_nama" id="kontak_nama"
                                            tabindex="6"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.contactname') }}"
                                            value="{{ old('kontak_nama') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('kontak_nama')" />
                                    </div>

                                    <div class="w-auto pb-4">
                                        <label for="kontak_telpon"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.contactphone')</label>
                                        <x-text-input type="text" name="kontak_telpon" id="kontak_telpon"
                                            tabindex="7"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.contactphone') }}"
                                            value="{{ old('kontak_telpon') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('kontak_telpon')" />
                                    </div>

                                    <div class="w-auto pb-4 lg:pb-12">
                                        <label for="keterangan"
                                            class="block mb-2 font-medium text-primary-600">@lang('messages.description')</label>
                                        <x-text-input type="text" name="keterangan" id="keterangan"
                                            tabindex="8"
                                            placeholder="{{ __('messages.enter') }} {{ __('messages.description') }}"
                                            value="{{ old('keterangan') }}" />

                                        <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                                    </div>

                                    <div class="flex flex-row flex-wrap items-center justify-end gap-2 md:gap-4">
                                        <div class="w-auto">
                                            <label
                                                class="cursor-pointer flex flex-col items-center md:flex-row md:gap-2">
                                                <input type="checkbox" id="isactive" name="isactive" tabindex="9"
                                                    class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                                                    checked>
                                                <span
                                                    class="pr-4 group-hover:text-blue-500 transition-colors duration-300 text-right w-1/2 md:w-full">
                                                    @lang('messages.active')
                                                </span>
                                            </label>
                                        </div>

                                        <x-primary-button type="submit" class="block" tabindex="10">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                            </svg>
                                            <span class="pl-1">@lang('messages.save')</span>
                                        </x-primary-button>
                                        <x-anchor-secondary href="{{ route('customer.index') }}" tabindex="11">
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
                $("#propinsi_id").on("change keyup paste", function() {
                    var xpr = $('#propinsi_id option:selected').val();
                    if (xpr.trim()) {
                        xprop = xpr;
                    } else {
                        xprop = '_';
                    }

                    $.ajax({
                        url: '{{ url('/marketing/kecamatan/depend-drop-kab') }}' + "/" + xprop,
                        type: "GET",
                        dataType: 'json',
                        success: function(result) {
                            $('#kabupaten_id').empty();
                            $('#kecamatan_id').empty();
                            $('#kabupaten_id').append($('<option>', {
                                value: null,
                                text: "{{ __('messages.choose') }}..."
                            }));
                            var data = result.kabs;
                            $.each(data, function(item, index) {
                                $('#kabupaten_id').append($('<option>', {
                                    value: index,
                                    text: item
                                }));
                            });
                            $("#kabupaten_id").focus();
                        }
                    });
                });

                $("#kabupaten_id").on("change keyup paste", function() {
                    var xpr = $('#propinsi_id option:selected').val();
                    if (xpr.trim()) {
                        xprop = xpr;
                    } else {
                        xprop = '_';
                    }
                    var xkb = $('#kabupaten_id option:selected').val();
                    if (xkb.trim()) {
                        xkab = xkb;
                    } else {
                        xkab = '_';
                    }

                    $.ajax({
                        url: '{{ url('/marketing/kecamatan/depend-drop-kec') }}' + "/" + xprop + "/" +
                            xkab,
                        type: "GET",
                        dataType: 'json',
                        success: function(result) {
                            $('#kecamatan_id').empty();
                            $('#kecamatan_id').append($('<option>', {
                                value: null,
                                text: "{{ __('messages.choose') }}..."
                            }));
                            var data = result.kecs;
                            $.each(data, function(item, index) {
                                $('#kecamatan_id').append($('<option>', {
                                    value: index,
                                    text: item
                                }));
                            });
                            $("#kecamatan_id").focus();
                        }
                    });
                });

                $("#branch_link_id").on("change keyup paste", function() {
                    var xbr = $('#branch_link_id option:selected').val();
                    if (xbr.trim()) {
                        xbrl = xbr;
                    } else {
                        xbrl = '_';
                    }

                    $.ajax({
                        url: '{{ url('/general-affair/branch/get-attribute') }}' + "/" + xbrl,
                        type: "GET",
                        dataType: 'json',
                        success: function(result) {
                            $('#kode').val(result.kode);
                            $('#nama').val(result.nama);
                            $('#alamat').val(result.alamat);
                            $('#propinsi_id').val(result.propinsi_id);
                            $("#propinsi_id").trigger("change");
                            $('#kabupaten_id').val(result.kabupaten_id);
                            $("#kabupaten_id").trigger("change");
                            $('#kecamatan_id').val(result.kecamatan_id);
                        }
                    });
                });

            });
        </script>
    @endpush
</x-app-layout>
