<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl uppercase leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid-cols-3 grid gap-4">
                <article class="rounded-lg border border-gray-100 bg-white p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">EQUIPMENTS</p>

                            <p class="text-2xl mt-3 font-medium text-gray-900">{{ \App\Models\Equipment::count() }}</p>
                        </div>

                        <span class="rounded-full bg-green-100 p-3 text-green-600">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg> --}}
                            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"
                                fill="currentColor">
                                <path
                                    d="M96,64V192a8,8,0,0,1-8,8H64a8,8,0,0,1-8-8V64a8,8,0,0,1,8-8H88A8,8,0,0,1,96,64Zm96-8H168a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8h24a8,8,0,0,0,8-8V64A8,8,0,0,0,192,56Z"
                                    opacity="0.2"></path>
                                <path
                                    d="M248,120h-8V88a16,16,0,0,0-16-16H208V64a16,16,0,0,0-16-16H168a16,16,0,0,0-16,16v56H104V64A16,16,0,0,0,88,48H64A16,16,0,0,0,48,64v8H32A16,16,0,0,0,16,88v32H8a8,8,0,0,0,0,16h8v32a16,16,0,0,0,16,16H48v8a16,16,0,0,0,16,16H88a16,16,0,0,0,16-16V136h48v56a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16v-8h16a16,16,0,0,0,16-16V136h8a8,8,0,0,0,0-16ZM32,168V88H48v80Zm56,24H64V64H88V192Zm104,0H168V64h24V175.83c0,.06,0,.11,0,.17s0,.12,0,.17V192Zm32-24H208V88h16Z">
                                </path>
                            </svg>
                        </span>
                    </div>
                </article>
                <article class="rounded-lg border border-gray-100 bg-white p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">MEMBERS</p>

                            <p class="text-2xl mt-3 font-medium text-gray-900">{{ \App\Models\MemberList::count() }}</p>
                        </div>

                        <span class="rounded-full bg-green-100 p-3 text-green-600">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg> --}}
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <g id="User / User_Card_ID">
                                    <path id="Vector"
                                        d="M6 18C6.06366 18 6.12926 18 6.19691 18H12M6 18C5.01173 17.9992 4.49334 17.9868 4.0918 17.7822C3.71547 17.5905 3.40973 17.2837 3.21799 16.9074C3 16.4796 3 15.9203 3 14.8002V9.2002C3 8.08009 3 7.51962 3.21799 7.0918C3.40973 6.71547 3.71547 6.40973 4.0918 6.21799C4.51962 6 5.08009 6 6.2002 6H17.8002C18.9203 6 19.4796 6 19.9074 6.21799C20.2837 6.40973 20.5905 6.71547 20.7822 7.0918C21 7.5192 21 8.07899 21 9.19691V14.8031C21 15.921 21 16.48 20.7822 16.9074C20.5905 17.2837 20.2837 17.5905 19.9074 17.7822C19.48 18 18.921 18 17.8031 18H12M6 18C6.00004 16.8954 7.34317 16 9 16C10.6569 16 12 16.8954 12 18M6 18C6 18 6 17.9999 6 18ZM18 14H14M18 11H15M9 13C7.89543 13 7 12.1046 7 11C7 9.89543 7.89543 9 9 9C10.1046 9 11 9.89543 11 11C11 12.1046 10.1046 13 9 13Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </span>
                    </div>
                </article>
                <article class="rounded-lg border border-gray-100 bg-white p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">ATTENDANCE TODAY</p>

                            <p class="text-2xl mt-3 font-medium text-gray-900">
                                {{ \App\Models\Attendance::whereDate('created_at', now())->count() }}</p>
                        </div>

                        <span class="rounded-full bg-green-100 p-3 text-green-600">

                            <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 21C10.8954 21 10 21.8954 10 23V25C10 26.1046 10.8954 27 12 27H14C15.1046 27 16 26.1046 16 25V23C16 21.8954 15.1046 21 14 21H12ZM12 23V25H14V23H12Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 23C18 21.8954 18.8954 21 20 21H22C23.1046 21 24 21.8954 24 23V25C24 26.1046 23.1046 27 22 27H20C18.8954 27 18 26.1046 18 25V23ZM20 23H22V25H20V23Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M28 21C26.8954 21 26 21.8954 26 23V25C26 26.1046 26.8954 27 28 27H30C31.1046 27 32 26.1046 32 25V23C32 21.8954 31.1046 21 30 21H28ZM28 23V25H30V23H28Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10 31C10 29.8954 10.8954 29 12 29H14C15.1046 29 16 29.8954 16 31V33C16 34.1046 15.1046 35 14 35H12C10.8954 35 10 34.1046 10 33V31ZM14 31V33H12V31H14Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20 29C18.8954 29 18 29.8954 18 31V33C18 34.1046 18.8954 35 20 35H22C23.1046 35 24 34.1046 24 33V31C24 29.8954 23.1046 29 22 29H20ZM22 31H20V33H22V31Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M36 32.5C36 31.9477 35.5523 31.5 35 31.5C34.4477 31.5 34 31.9477 34 32.5V35.4142L35.2929 36.7071C35.6834 37.0976 36.3166 37.0976 36.7071 36.7071C37.0976 36.3166 37.0976 35.6834 36.7071 35.2929L36 34.5858V32.5Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 7C12 6.44772 12.4477 6 13 6C13.5523 6 14 6.44772 14 7V12C14 12.5523 14.4477 13 15 13C15.5523 13 16 12.5523 16 12V9H26V7C26 6.44772 26.4477 6 27 6C27.5523 6 28 6.44772 28 7V12C28 12.5523 28.4477 13 29 13C29.5523 13 30 12.5523 30 12V9H33C34.6569 9 36 10.3432 36 12V28.0709C39.3923 28.5561 42 31.4735 42 35C42 38.866 38.866 42 35 42C32.6213 42 30.5196 40.8135 29.2547 39H9C7.34315 39 6 37.6569 6 36V12C6 10.3431 7.34315 9 9 9H12V7ZM28 35C28 31.4735 30.6077 28.5561 34 28.0709V18H8V36C8 36.5523 8.44772 37 9 37H28.2899C28.1013 36.3663 28 35.695 28 35ZM40 35C40 37.7614 37.7614 40 35 40C32.2386 40 30 37.7614 30 35C30 32.2386 32.2386 30 35 30C37.7614 30 40 32.2386 40 35Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                </article>
                <article class="rounded-lg border border-gray-100 bg-white p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">SALES TODAY</p>

                            <p class="text-2xl mt-3 font-medium text-gray-900">
                                &#8369;{{ number_format(\App\Models\Sale::whereDate('created_at', now())->sum('total_amount'), 2) }}
                            </p>
                        </div>

                        <span class="rounded-full bg-green-100 p-3 text-green-600">

                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                fill="currentColor">
                                <path
                                    d="M 22.853516 6.0078125 C 20.164121 6.0816133 18.078828 6.8123281 16.048828 7.5175781 C 13.877828 8.2715781 11.828234 8.9827188 8.9902344 9.0117188 C 7.0932344 9.0417187 5.1931719 8.7143594 3.3261719 8.0683594 L 2 7.609375 L 2 24.691406 L 2.6660156 24.927734 C 4.4050156 25.542734 6.183125 25.897422 7.953125 25.982422 C 8.234125 25.995422 8.5092969 26.001953 8.7792969 26.001953 C 11.792297 26.001953 14.098938 25.202687 16.335938 24.429688 C 18.693937 23.613688 20.918125 22.843328 23.953125 22.986328 C 25.527125 23.061328 27.112016 23.379687 28.666016 23.929688 L 30 24.402344 L 30 7.3144531 L 29.341797 7.0742188 C 27.616797 6.4492188 25.834922 6.0945781 24.044922 6.0175781 C 23.634422 5.9993281 23.237715 5.9972695 22.853516 6.0078125 z M 22.908203 7.9941406 C 23.247131 7.9836484 23.595781 7.9837969 23.957031 7.9980469 C 24.330995 8.0142703 24.705197 8.0481553 25.078125 8.0917969 C 25.344924 9.1855072 26.323979 10 27.5 10 C 27.671 10 27.838 9.9812188 28 9.9492188 L 28 19.050781 C 27.838 19.018781 27.671 19 27.5 19 C 26.264201 19 25.245058 19.898153 25.042969 21.076172 C 24.710892 21.041393 24.378543 21.017795 24.046875 21.001953 C 20.631875 20.851953 18.113688 21.710687 15.679688 22.554688 C 13.318688 23.372687 11.081828 24.145953 8.0488281 24.001953 C 7.6729998 23.983858 7.2965195 23.94781 6.9199219 23.902344 C 6.650967 22.811694 5.67385 22 4.5 22 C 4.329 22 4.162 22.018781 4 22.050781 L 4 12.949219 C 4.162 12.981219 4.329 13 4.5 13 C 5.7444763 13 6.7671584 12.088686 6.9589844 10.898438 C 7.6438975 10.970039 8.3294829 11.011452 9.0117188 11 C 12.176719 10.968 14.478078 10.166578 16.705078 9.3925781 C 18.665953 8.7100781 20.535709 8.0675859 22.908203 7.9941406 z M 16 11 C 13.794 11 12 13.243 12 16 C 12 18.757 13.794 21 16 21 C 18.206 21 20 18.757 20 16 C 20 13.243 18.206 11 16 11 z M 16 13 C 17.084 13 18 14.374 18 16 C 18 17.626 17.084 19 16 19 C 14.916 19 14 17.626 14 16 C 14 14.374 14.916 13 16 13 z M 23.5 13 A 1.5 1.5 0 0 0 23.5 16 A 1.5 1.5 0 0 0 23.5 13 z M 8.5 16 A 1.5 1.5 0 0 0 8.5 19 A 1.5 1.5 0 0 0 8.5 16 z">
                                </path>
                            </svg>
                        </span>
                    </div>
                </article>
            </div>

        </div>
    </div>
</x-app-layout>
