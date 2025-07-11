<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-[#ffff]  px-5 duration-300 ease-linear dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false">

    <!-- SIDEBAR HEADER -->
    <div :class="[
            'flex items-center gap-2 pt-8 sidebar-header pb-7',
            sidebarToggle ? 'justify-center' : 'justify-between'
        ]">
        <a href="index.html">
            <span class="logo" :class="{ 'hidden': sidebarToggle }">
                <img class="dark:hidden" src="./images/logo/logo.svg" alt="Logo" />
                <img class="hidden dark:block" src="./images/logo/logo-dark.svg" alt="Logo" />
            </span>

            <img class="logo-icon" :class="{ 'lg:block': sidebarToggle, 'hidden': !sidebarToggle }"
                src="./images/logo/logo-icon.svg" />
        </a>
    </div>

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav>
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                    <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                        MENU
                    </span>

                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                        class="mx-auto fill-current menu-group-icon" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                            fill="" />
                    </svg>
                </h3>

                @php
                $isDashboardActive = request()->is('dashboard*');
                @endphp

                <ul class="mb-6 flex flex-col gap-4">
                    <!-- Menu Item Dashboard -->
                    @php
                    $isDashboardActive = request()->is('dashboard*') || request()->is('report_produksi*');
                    $isModalActive = request()->is('modal*') || request()->is('datatable*');
                    @endphp

                    <li x-data="{ open: {{ $isDashboardActive ? 'true' : 'false' }} }">
                        <!-- Trigger Menu -->
                        <a href="#" @click.prevent="open = !open"
                            class="menu-item group {{ $isDashboardActive ? 'menu-item-active' : 'menu-item-inactive' }}">

                            <!-- Icon Menu -->
                            <svg class="{{ request()->is('dashboard') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <!-- Icon path -->
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                    fill="currentColor" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Dashboard
                            </span>

                            <!-- Panah Rotasi -->
                            <svg class="menu-item-arrow"
                                :class="open ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive'" width="20"
                                height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-collapse>
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="menu-dropdown-item group {{ request()->is('dashboard') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Report Harian
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('report_produksi') }}"
                                        class="menu-dropdown-item group {{ request()->is('report_produksi') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Report Produksi
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ open: {{ $isModalActive ? 'true' : 'false' }} }">
                        <!-- Trigger Menu -->
                        <a href="#" @click.prevent="open = !open"
                            class="menu-item group {{ $isModalActive ? 'menu-item-active' : 'menu-item-inactive' }}">

                            <!-- Icon Menu -->
                            <svg class="{{ request()->is('modal_dan_datatable') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                                width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <!-- Icon path -->
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.665 3.75618C11.8762 3.65061 12.1247 3.65061 12.3358 3.75618L18.7807 6.97853L12.3358 10.2009C12.1247 10.3064 11.8762 10.3064 11.665 10.2009L5.22014 6.97853L11.665 3.75618ZM4.29297 8.19199V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0365V11.6512C11.1631 11.6205 11.0777 11.5843 10.9942 11.5425L4.29297 8.19199ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19199L13.0066 11.5425C12.9229 11.5844 12.8372 11.6207 12.75 11.6515V20.037ZM13.0066 2.41453C12.3732 2.09783 11.6277 2.09783 10.9942 2.41453L4.03676 5.89316C3.27449 6.27429 2.79297 7.05339 2.79297 7.90563V16.0946C2.79297 16.9468 3.27448 17.7259 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.7259 21.2079 16.9468 21.2079 16.0946V7.90563C21.2079 7.05339 20.7264 6.27429 19.9641 5.89316L13.0066 2.41453Z"
                                    fill="currentColor" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Modal dan Datatable
                            </span>

                            <!-- Panah Rotasi -->
                            <svg class="menu-item-arrow"
                                :class="open ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive'" width="20"
                                height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-collapse>
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                <li>
                                    <a href="{{ route('modal') }}"
                                        class="menu-dropdown-item group {{ request()->is('modal') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Modal
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('datatable') }}"
                                        class="menu-dropdown-item group {{ request()->is('datatable') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                        Datatable
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>