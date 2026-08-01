<div class="w-full overflow-x-auto">
    <div
        class="inline-block min-w-full shadow-md overflow-hidden rounded-md border border-solid border-primary-100 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-3 py-3 text-center text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        #
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.warehouse')
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.orderdate')
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.adjustmentdate')
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.datacount')
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($datas->count() == 0)
                    <tr>
                        <td colspan="5"
                            class="text-sm bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <div class="flex items-center justify-center p-5">@lang('messages.datanotavailable')</div>
                        </td>
                    </tr>
                @endif

                @foreach ($datas as $data)
                    <tr>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <p class="text-center text-gray-900 whitespace-no-wrap dark:text-gray-400">
                                {{ ++$i }}
                            </p>
                        </td>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span class="text-gray-900 dark:text-gray-400">{{ $data->gudang->nama }}</span>
                        </td>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span
                                class="text-gray-900 dark:text-gray-400">{{ date_format(date_create($data->tanggal), 'd/m/Y') }}</span>
                        </td>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span
                                class="text-gray-900 dark:text-gray-400">{{ $data->tanggal_adjustment ? date_format(date_create($data->tanggal_adjustment), 'd/m/Y') : '-' }}</span>
                        </td>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span
                                class="text-gray-900 dark:text-gray-400">{{ $data->stock_opname_details_count }}</span>
                        </td>
                        <td class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400"
                            style="vertical-align: middle;">
                            <div class="flex items-center justify-center">
                                @can('stopname-create')
                                    <x-anchor-transparent id="print_one_adjust-anchor-{{ $data->id }}"
                                        onclick="print_one_adjust('{{ $data->id }}')" title="{{ __('messages.print') }}"
                                        class="ml-2 p-2">
                                        <span
                                            class="relative inline-block px-2 py-2 font-semibold text-purple-800 leading-tight dark:text-purple-300">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-purple-200 hover:bg-purple-400 hover:dark:bg-purple-700 opacity-50 rounded-full dark:bg-purple-700"></span>
                                            <svg class="size-5" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.5 12.5H1.5C0.947715 12.5 0.5 12.0523 0.5 11.5V7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H13.5C14.0523 6.5 14.5 6.94772 14.5 7.5V11.5C14.5 12.0523 14.0523 12.5 13.5 12.5H11.5M3.5 6.5V1.5C3.5 0.947715 3.94772 0.5 4.5 0.5H10.5C11.0523 0.5 11.5 0.947715 11.5 1.5V6.5M3.5 10.5H11.5V14.5H3.5V10.5Z"
                                                    stroke="currentColor" />
                                            </svg>
                                        </span>
                                    </x-anchor-transparent>
                                    <svg id="print_one-icon-{{ $data->id }}" class="hidden size-5 mx-5 mt-4 mb-5"
                                        viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.5 12.5H1.5C0.947715 12.5 0.5 12.0523 0.5 11.5V7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H13.5C14.0523 6.5 14.5 6.94772 14.5 7.5V11.5C14.5 12.0523 14.0523 12.5 13.5 12.5H11.5M3.5 6.5V1.5C3.5 0.947715 3.94772 0.5 4.5 0.5H10.5C11.0523 0.5 11.5 0.947715 11.5 1.5V6.5M3.5 10.5H11.5V14.5H3.5V10.5Z"
                                            stroke="currentColor" />
                                    </svg>
                                @endcan

                                @can('stopname-show')
                                    <a href="{{ route('stock-adjustment.show', Crypt::Encrypt($data->id)) }}"
                                        title="{{ __('messages.view') }}" class="ml-2">
                                        <span
                                            class="relative inline-block px-2 py-2 font-semibold text-blue-800 leading-tight dark:text-blue-300">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-blue-200 hover:bg-blue-400 hover:dark:bg-blue-700 opacity-50 rounded-full dark:bg-blue-700"></span>
                                            <svg class="size-5" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z" />
                                            </svg>
                                        </span>
                                    </a>
                                @endcan

                                @can('stopname-edit')
                                    @if ($data->adjusted == 0)
                                        <a href="{{ route('stock-adjustment.edit', Crypt::Encrypt($data->id)) }}"
                                            title="{{ __('messages.edit') }}" class="ml-2">
                                            <span
                                                class="relative inline-block px-2 py-2 font-semibold text-green-800 leading-tight dark:text-green-300">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 hover:bg-green-400 hover:dark:bg-green-700 opacity-50 rounded-full dark:bg-green-700"></span>
                                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>
                                            </span>
                                        </a>
                                    @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div
            class="px-3 py-3 bg-primary-50 items-center xs:justify-between border-t border-primary-100 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
            <div class="mt-2 xs:mt-0">
                {{ $datas->links() }}
            </div>
        </div>
    </div>

</div>
