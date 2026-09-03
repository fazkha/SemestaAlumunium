<tr class="cursor-pointer" onclick="toggleAccordion('{{ $accordionPerbaikan }}')">
    <td colspan="5"
        class="pl-[32px] px-3 py-1 text-sm border-b-0 border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
        <div class="flex items-center justify-start space-x-2 pl-[200px]">
            <span class="w-[7em] text-gray-900 dark:text-gray-400">
                @lang('messages.repair')
            </span>
            <span id="icon-{{ $accordionPerbaikan }}" class="inline-block transition-transform duration-200">
                <svg fill="currentColor" class="size-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="M 6 1.2929688 L 5.2929688 2 L 13.292969 10 L 5.2929688 18 L 6 18.707031 L 14.707031 10 L 6 1.2929688 z "
                            style="fill:currentColor; fill-opacity:1; stroke:none; stroke-width:0px;" />
                    </g>
                </svg>
            </span>
        </div>
    </td>
</tr>

<tbody id="{{ $accordionPerbaikan }}" class="hidden">
    @foreach ($perbaikans as $perbaikan)
        <tr>
            <td
                class="px-3 py-1 text-sm border-y border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                <span class="text-gray-900 dark:text-gray-400">&nbsp;</span>
            </td>
            <td
                class="px-3 py-1 text-sm border-y border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                <p class="text-center text-gray-900 whitespace-no-wrap dark:text-gray-400">
                    {{ ++$i2 }}
                </p>
            </td>
            <td
                class="px-3 py-1 text-sm border-y border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                <span class="text-gray-900 dark:text-gray-400">{{ $perbaikan->nama_perbaikan }}</span>
            </td>
            <td
                class="px-3 py-1 text-sm border-y border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                <span class="text-gray-900 dark:text-gray-400">&nbsp;</span>
            </td>
            <td
                class="px-3 py-1 text-sm border-y border-primary-100 bg-primary-20 text-gray-700 dark:bg-primary-900 dark:border-primary-800 dark:text-gray-400">
                <span class="text-gray-900 dark:text-gray-400">&nbsp;</span>
            </td>
        </tr>
    @endforeach
</tbody>
