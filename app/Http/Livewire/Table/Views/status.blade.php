<td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
    <span class="relative inline-block px-3 py-1 font-semibold text-{{ check_status($model->status) }}-900 leading-tight">
        <span aria-hidden class="absolute inset-0 bg-{{ check_status($model->status) }}-200 opacity-50 rounded-full"></span>
        <span class="relative text-xs">{{ $model->status }}</span>
    </span>
</td>
