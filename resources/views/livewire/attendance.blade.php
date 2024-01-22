<div>
    @if ($qr_code == null)
        <div class="w-96">
            <div id="reader"></div>
        </div>
    @endif
    <script>
        const scanner = new Html5QrcodeScanner('reader', {
            // Scanner will be initialized in DOM inside element with id of 'reader'
            qrbox: {
                width: 250,
                height: 250,
            }, // Sets dimensions of scanning box (set relative to reader element width)
            fps: 20, // Frames per second to attempt a scan
        });


        scanner.render(success, error);
        // Starts scanner

        function success(result) {
            Livewire.dispatch('qrScanned', {
                newScan: result
            });
            // document.getElementById('result').innerHTML = `
        // <h2>Success!</h2>
        // <p><a href="${result}">${result}</a></p>
        // `;
            // Prints result as a link inside result element

            // scanner.clear();
            // // Clears scanning instance

            // document.getElementById('reader').remove();
            // Removes reader element from DOM since no longer needed

        }

        function error(err) {
            console.error(err);
            // Prints any errors to the console
        }
    </script>

    <div class="flex justify-between items-center">
        <div class="flex space-x-2 items-end">
            <div class="w-96">{{ $this->form }}</div>
            <x-button label="SCAN QR" wire:click.prevent="scanNow" sm positive right-icon="qrcode" />
        </div>
        <x-button label="ATTENDANCE LISTS" href="{{ route('attendance-list') }}" icon="document-text" slate
            class="font-medium" />
    </div>
    @if ($show_panel)
        <div class="mt-5 bg-gray-100 p-5 rounded-lg">
            <div class="flex justify-between items-end">
                <div class="flex items-end space-x-4">
                    {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $get_qr->identification_code }}"
                        alt="QRCODE :{{ $get_qr->identification_code }}"> --}}
                    {!! QrCode::size(80)->generate($get_qr->identification_code) !!}
                    <div class="flex flex-col space-y-3">
                        <div>
                            <h1 class="text-sm text-gray-500">Name</h1>
                            <h1 class="font-medium leading-3 uppercase">
                                {{ $get_qr->firstname . ' ' . $get_qr->lastname }} | <x-badge
                                    label="{{ $get_qr->member_type }}" slate sm /></h1>
                        </div>
                        <div>
                            <h1 class="text-sm text-gray-500">Membership Plan</h1>
                            <div class="flex space-x-2 items-center">
                                <x-badge label="{{ $get_qr->membership_plan }}" positive rounded
                                    icon="identification" />
                                @if ($get_qr->is_expired)
                                    <span class="text-sm text-red-500">Expired</span>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    @if ($get_qr->is_expired)
                        <div class="flex flex-col items-end">
                            <x-native-select label="Membership Plan" wire:model="plan">
                                <option>Select an Option</option>
                                <option value="Daily">Daily</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Annual">Annual</option>
                            </x-native-select>
                            <x-button label="Renew Now" right-icon="arrow-right"
                                wire:click="renewPlan({{ $get_qr->id }})" spinner="renewPlan({{ $get_qr->id }})"
                                dark class="mt-2 " xs />
                        </div>
                    @else
                        <x-input label="Pay Amount" wire:model="amount" prefix="₱" placeholder="0.00" />
                        <div class="mt-3">
                            <x-button label="Submit" right-icon="cash" xs positive wire:click="submit"
                                spinner="submit" />
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-5">
                <div class="border-t py-5">
                    <table id="example" class="table-auto mt-5 bg-white" style="width:100%">
                        <thead class="font-normal">
                            <tr>
                                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">MEMBER NAME
                                </th>
                                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                    TIME IN
                                </th>
                                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                    TIME OUT
                                </th>
                                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                    DATE
                                </th>
                                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                    STATUS
                                </th>
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

                                        @if ($item->time_out == null)
                                            <span class="text-red-500">---</span>
                                        @else
                                            {{ \Carbon\Carbon::parse($item->time_out)->format('h:i A') }}
                                        @endif
                                    </td>
                                    <td class="border-2  text-gray-700  px-3 py-1">
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                                    </td>
                                    <td class="border-2  text-gray-700  px-3 py-1">
                                        @if ($item->is_paid)
                                            <x-badge label="PAID" positive icon="cash" />
                                        @else
                                            <x-badge label="PENDING" warning icon="cash" />
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border-2 p-2">
                                        <span>No data Available...</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

</div>
