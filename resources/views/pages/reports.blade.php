<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl uppercase leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <livewire:reports />
                </div>
            </div>
        </div>
        <script>
            function printOut(data) {
                var mywindow = window.open('', '', 'height=1000,width=1000');
                mywindow.document.head.innerHTML =
                    '<title></title><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />';
                mywindow.document.body.innerHTML = '<div>' + data +
                    '</div><script src="{{ Vite::asset('resources/js/app.js') }}"/>';

                mywindow.document.close();
                mywindow.focus(); // necessary for IE >= 10
                setTimeout(() => {
                    mywindow.print();
                    return true;
                }, 1000);
            }
        </script>
    </div>
</x-app-layout>
