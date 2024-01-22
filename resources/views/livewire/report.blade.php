<div>
    <select name="" id="" wire:model="ss">
        <option value="sdsd">sdsd</option>
    </select>
    <div class="mt-10">
        {{-- @if ($getReport)
            <h1 class="font-bold uppercase text-xl"> EQUIPMENT Report</h1>
            <h1 class="border-t">{{ now()->format('F d, Y') }}</h1>
        @endif

        @if ($getReport == '1')
            <div class="mt-5">
                <table id="example" class="table-auto" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">NAME</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($reports as $item)
                            <tr>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->name }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->description }}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif --}}
    </div>
</div>
