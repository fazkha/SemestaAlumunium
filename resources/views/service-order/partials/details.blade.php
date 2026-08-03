@if ($details->count() > 0)
    @php
        $di = 0;
    @endphp

    @foreach ($details as $detail)
        <tr>
            <td class="align-top text-center">
                <input type="hidden" name="standars[{{ $di }}][id]" value="{{ $detail->id }}" />
                <x-text-span>{{ $detail->urutan }}</x-text-span>
            </td>
            <td class="align-top">
                <x-text-span>{{ $detail->std_inspect_nama }}</x-text-span>
            </td>
            @if ($viewMode)
                <td class="align-middle text-center">
                    <x-text-span>{{ $detail->ischeck == 1 ? '☑️' : '❓' }}</x-text-span>
                </td>
                <td class="align-top">
                    <x-text-span>{{ $detail->keterangan ? $detail->keterangan : '-' }}</x-text-span>
                </td>
            @else
                <td class="align-middle text-center">
                    <input type="checkbox" name="standars[{{ $di }}][ischeck]" required tabindex="9"
                        class="dark:border-white-400/20 transition-all duration-500 ease-in-out w-7 h-7 rounded-lg shadow-md dark:bg-primary-700 dark:border-primary-800 dark:text-gray-400"
                        {{ $detail->ischeck == '1' ? 'checked' : '' }}>
                </td>
                <td class="align-top">
                    <x-text-input type="text" name="standars[{{ $di }}][keterangan]" tabindex="10"
                        value="{{ $detail->keterangan }}" />
                </td>
            @endif
        </tr>

        @php
            $di++;
        @endphp
    @endforeach
@endif
