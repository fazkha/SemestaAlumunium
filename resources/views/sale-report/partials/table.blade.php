@php
    use Illuminate\Support\Facades\Crypt;
    use App\Models\SaleOrderDetail;
    $grandTotal = 0;
@endphp

<div class="w-full overflow-x-auto">
    <div
        class="inline-block min-w-full shadow-md overflow-hidden rounded-md border border-solid border-primary-100 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.ordernumber')
                    </th>
                    <th
                        class="px-3 py-3 text-center text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        &nbsp;
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.customer')
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('calendar.date')
                    </th>
                    <th
                        class="px-3 py-3 text-center text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.totalprice') (@lang('messages.currencysymbol'))
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
                    @php
                        $details = SaleOrderDetail::where('sale_order_id', $data->id)->get();
                        $i = 0;
                    @endphp
                    <tr>
                        <td
                            class="font-bold px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span class="text-gray-900 dark:text-gray-400">{{ $data->no_order }}</span>
                        </td>
                        <td
                            class="font-bold text-center px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span class="text-gray-900 dark:text-gray-400">&nbsp;</span>
                        </td>
                        <td
                            class="font-bold px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span class="text-gray-900 dark:text-gray-400">{{ $data->customer->nama }}</span>
                        </td>
                        <td
                            class="font-bold px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span
                                class="text-gray-900 dark:text-gray-400">{{ date_format(date_create($data->tanggal), 'd/m/Y') }}</span>
                        </td>
                        <td
                            class="text-right font-bold px-3 py-3 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <div class="flex flex-row items-center justify-end">
                                @if ($data->biaya_angkutan > 0)
                                    <span class="px-4 font-normal">
                                        (@lang('messages.delivery')
                                        {{ is_int($data->biaya_angkutan) ? Number::forHumans($data->biaya_angkutan, abbreviate: true) : Number::forHumans($data->biaya_angkutan, precision: 1, abbreviate: true) }})
                                    </span>
                                @endif
                                {{ $data->total_harga ? (is_int($data->total_harga) ? Number::forHumans($data->total_harga, abbreviate: true) : Number::forHumans($data->total_harga, precision: 1, abbreviate: true)) : 0 }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                            <span class="text-gray-900 dark:text-gray-400">&nbsp;</span>
                        </td>
                        <td
                            class="text-center px-3 py-1 text-sm border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                            <span class="text-gray-900 dark:text-gray-400">#</span>
                        </td>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                            <span class="text-gray-900 dark:text-gray-400">@lang('messages.item')</span>
                        </td>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                            <span class="text-gray-900 dark:text-gray-400">@lang('messages.quantity')</span>
                        </td>
                        <td
                            class="px-3 py-3 text-sm border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                            <span class="text-gray-900 dark:text-gray-400">@lang('messages.price')</span>
                        </td>
                    </tr>
                    @foreach ($details as $detail)
                        <tr>
                            <td
                                class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                                <span class="text-gray-900 dark:text-gray-400">&nbsp;</span>
                            </td>
                            <td
                                class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                                <p class="text-center text-gray-900 whitespace-no-wrap dark:text-gray-400">
                                    {{ ++$i }}
                                </p>
                            </td>
                            <td
                                class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                                <span class="text-gray-900 dark:text-gray-400">{{ $detail->barang->nama }}</span>
                            </td>
                            <td
                                class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                                <span class="text-gray-900 dark:text-gray-400">{{ $detail->kuantiti }}</span>
                            </td>
                            <td
                                class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                                <span
                                    class="text-gray-900 dark:text-gray-400">{{ Number::forHumans($detail->kuantiti * $detail->harga_satuan, precision: 1, abbreviate: true) }}</span>
                            </td>
                        </tr>
                    @endforeach
                    @php
                        $grandTotal += $data->total_harga;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div
            class="px-3 py-3 bg-primary-50 items-center xs:justify-between border-t border-primary-100 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
            <div class="flex flex-row items-center justify-between">
                <span class="font-bold">@lang('messages.grand_total')</span>
                <span class="font-bold">{{ Number::forHumans($grandTotal, precision: 1, abbreviate: true) }}</span>
            </div>
        </div>
    </div>

</div>
