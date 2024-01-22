<div x-data>
    <div class="">
        {{ $this->form }}
    </div>

    @if ($selected == 'Equipments')
        <div class="mt-10" x-ref="printContainer">
            <h1 class="font-bold uppercase text-xl"> EQUIPMENT Report</h1>
            <h1 class="border-t">{{ now()->format('F d, Y') }}</h1>
            <div class="mt-5">
                <table id="example" class="table-auto" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">NAME</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($equipments as $item)
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
        </div>
    @endif
    @if ($selected == 'Income')
        <div class="mt-10" x-ref="printContainer">
            <h1 class="font-bold uppercase text-xl"> INCOME Report</h1>
            <h1 class="border-t">
            </h1>
            <div class="mt-5">
                <table id="example" class="table-auto" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">NAME</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">AMOUNT</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">PAID AT</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($sales as $item)
                            <tr>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->member_name }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    &#8369;{{ number_format($item->total_amount, 2) }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td class="  text-gray-700  px-3 py-1">

                            </td>
                            <td class="  text-gray-700  px-3 py-1">

                            </td>

                            <td class="border-2  text-gray-700  px-3 py-1">
                                TOTAL INCOME: &#8369;{{number_format($sales->sum('total_amount'),2)}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    @endif
    @if ($selected == 'Attendance')
        <div class="mt-10" x-ref="printContainer">
            <h1 class="font-bold uppercase text-xl"> Attendance Report</h1>
            <h1 class="border-t">
            </h1>
            <div class="mt-5">
                <table id="example" class="table-auto" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">NAME</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">TIME IN</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">TIME OUT</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">CREATED AT</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($attendances as $item)
                            <tr>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->memberList->firstname . ' ' . $item->memberList->lastname }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ \Carbon\Carbon::parse($item->time_in)->format('h:i A') }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ \Carbon\Carbon::parse($item->time_out)->format('h:i A') }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                                </td>
                            </tr>

                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    @endif

    @if ($selected)
        <div class="mt-10 flex justify-end">
            <x-button label="Print Report" dark icon="printer" @click="printOut($refs.printContainer.outerHTML);" />
        </div>
    @endif

</div>
