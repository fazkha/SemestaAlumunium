@php
    use Illuminate\Support\Facades\Crypt;

    use App\Models\ServiceOrderInspections;
    use App\Models\ServiceOrderPerawatan;
    use App\Models\ServiceOrderPerbaikan;
    use App\Models\ServiceOrderGantibaru;

    $grandTotal = 0;
@endphp

<div class="w-full overflow-x-auto">
    <div
        class="inline-block min-w-full shadow-md overflow-hidden rounded-md border border-solid border-primary-100 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="w-1/4 px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.ordernumber')
                    </th>
                    <th
                        class="px-3 py-3 text-center text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        &nbsp;
                    </th>
                    <th
                        class="w-1/4 px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.customer')
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('calendar.date')
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                        @lang('messages.officer')
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
                        $details = ServiceOrderInspections::where('service_order_id', $data->id)->get();
                        $perawatans = ServiceOrderPerawatan::where('service_order_id', $data->id)
                            ->selectRaw('DISTINCT service_order_id, jenis_perawatan_id, nama_perawatan, keterangan')
                            ->get();

                        $perbaikans = ServiceOrderPerbaikan::where('service_order_id', $data->id)->get();
                        $gantibarus = ServiceOrderGantibaru::where('service_order_id', $data->id)->get();
                        $accordionPerawatan = 'perawatan-' . $data->id;
                        $accordionPerbaikan = 'perbaikan-' . $data->id;
                        $accordionGantibaru = 'gantibaru-' . $data->id;
                        $i = 0;
                        $i2 = 0;
                    @endphp
                    <tr>
                        <td
                            class="font-bold px-3 py-1 text-sm border-y-4 border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span class="text-gray-900 dark:text-gray-400">{{ $data->no_order }}</span>
                        </td>
                        <td
                            class="font-bold text-center px-3 py-1 text-sm border-y-4 border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span class="text-gray-900 dark:text-gray-400">&nbsp;</span>
                        </td>
                        <td
                            class="font-bold px-3 py-1 text-sm border-y-4 border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span
                                class="text-gray-900 dark:text-gray-400">{{ ($data->customer->customer_group_id == 1 ? 'Cabang ' : '') . $data->customer->nama }}</span>
                        </td>
                        <td
                            class="font-bold px-3 py-1 text-sm border-y-4 border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span
                                class="text-gray-900 dark:text-gray-400">{{ date_format(date_create($data->tanggal), 'd/m/Y') }}</span>
                        </td>
                        <td
                            class="font-bold px-3 py-3 text-sm border-y-4 border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                            <span class="text-gray-900 dark:text-gray-400">{{ $data->petugas->nama_lengkap }}</span>
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
                            <span class="text-gray-900 dark:text-gray-400">@lang('messages.inspect')</span>
                        </td>
                        <td
                            class="px-3 py-1 text-sm border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                            <span class="text-gray-900 dark:text-gray-400">@lang('messages.check')</span>
                        </td>
                        <td
                            class="px-3 py-3 text-sm border-b border-primary-100 text-gray-600 bg-primary-50 dark:text-gray-400 dark:bg-primary-800 dark:border-primary-800">
                            <span class="text-gray-900 dark:text-gray-400">@lang('messages.description')</span>
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
                                <span class="text-gray-900 dark:text-gray-400">{{ $detail->std_inspect_nama }}</span>
                            </td>
                            <td
                                class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                                @if ($detail->ischeck == '1')
                                    <span>✔️</span>
                                @endif
                                @if ($detail->ischeck == '0')
                                    <span>▪️</span>
                                @endif
                            </td>
                            <td
                                class="px-3 py-1 text-sm border-b border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                                <span class="text-gray-900 dark:text-gray-400">{{ $detail->keterangan }}</span>
                            </td>
                        </tr>
                    @endforeach

                    @php
                        $grandTotal += $data->total_harga;
                    @endphp

                    @if ($perawatans->isNotEmpty())
                        @include('inspect-report.partials.perawatan')
                    @endif
                    @if ($perbaikans->isNotEmpty())
                        @include('inspect-report.partials.perbaikan')
                    @endif
                    @if ($gantibarus->isNotEmpty())
                        @include('inspect-report.partials.gantibaru')
                    @endif
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

@push('scripts')
@endpush
