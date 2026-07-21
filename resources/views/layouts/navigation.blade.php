<header class="relative bg-primary-20 dark:bg-primary-900">
    <div class="flex items-center justify-between p-2 border-b border-primary-100 dark:border-primary-800">

        <!-- Mobile (Hamburger) menu button -->
        <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
            class="p-1 transition-colors duration-200 rounded-md text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 md:hidden focus:outline-none focus:ring">
            <span class="sr-only">Open main manu</span>
            <span aria-hidden="true">
                <svg class="size-8" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 496 496"
                    style="enable-background:new 0 0 496 496;" xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <path
                                    d="M80,200c-32.576,0-59.488,24.48-63.448,56H0v16h19.056L32,297.888v18.976l-17.48,3.28l2.952,15.72L32,333.136v23.728
    l-17.48,3.28l2.952,15.72L32,373.136v23.728l-17.48,3.28l2.952,15.72L32,413.136v21.76l48,57.6l47.768-57.32l17.712-3.32
    l-2.952-15.72L128,418.864v-23.728l17.48-3.28l-2.952-15.72L128,378.864v-23.728l17.48-3.28l-2.952-15.72L128,338.864v-23.728
    l17.48-3.28l-2.952-15.72L128,298.864v-0.976L140.944,272H160v-16h-16.56C139.488,224.48,112.576,200,80,200z M80,467.504
    l-16.84-20.208l39.92-7.488L80,467.504z M112,421.864l-60.568,11.352L48,429.104v-18.968l64-12V421.864z M112,381.864l-64,12
    v-23.728l64-12V381.864z M112,341.864l-64,12v-23.728l64-12V341.864z M112,294.112v7.752l-64,12v-19.752L36.944,272h86.112
    L112,294.112z M32.72,256c3.392-20.056,19.224-35.888,39.28-39.28V240h16v-23.28c20.056,3.384,35.888,19.224,39.28,39.28H32.72z" />
                                <path d="M352,408c0,30.872,25.128,56,56,56s56-25.128,56-56s-25.128-56-56-56S352,377.128,352,408z M416,368.808
    C431.648,372,444,384.352,447.192,400H432v16h15.192C444,431.648,431.648,444,416,447.192V432h-16v15.192
    C384.352,444,372,431.648,368.808,416H384v-16h-15.192C372,384.352,384.352,372,400,368.808V384h16V368.808z" />
                                <path d="M496,32V16h-16V0H336v16h-16v16h16v16h-16v16h16v16h-64V51.312l8.856-8.864L270.248,0h-44.504l-10.608,42.456L224,51.312
    V80H72v104h16V96h136v160h-32v16h16v184c0,22.056,17.944,40,40,40c22.056,0,40-17.944,40-40V272h16v-16h-32V96h64v16h-16v16h16
    v16h-16v16h16v16h64v49.136c-13.768,3.576-24,15.992-24,30.864s10.232,27.288,24,30.864v33.544
    c-44.784,4.056-80,41.768-80,87.592c0,48.52,39.48,88,88,88c48.52,0,88-39.48,88-88c0-45.824-35.216-83.536-80-87.592v-33.544
    c13.76-3.576,24-15.992,24-30.864s-10.24-27.288-24-30.864V176h64v-16h16v-16h-16v-16h16v-16h-16V96h16V80h-16V64h16V48h-16V32
    H496z M238.248,16h19.504l5.392,21.544L256,44.688V256h-16V44.688l-7.144-7.136L238.248,16z M272,288h-16v16h16v16h-16v16h16v16
    h-16v16h16v16h-16v16h16v16h-16v16h16v16h-16v16h14.528c-3.312,9.288-12.112,16-22.528,16s-19.216-6.712-22.528-16H240v-16h-16
    v-16h16v-16h-16v-16h16v-16h-16v-16h16v-16h-16v-16h16v-16h-16v-16h16v-16h-16v-16h48V288z M480,408c0,39.704-32.296,72-72,72
    c-39.704,0-72-32.296-72-72c0-39.704,32.296-72,72-72C447.704,336,480,368.296,480,408z M424,256c0,8.824-7.184,16-16,16
    c-8.824,0-16-7.176-16-16c0-8.824,7.176-16,16-16C416.816,240,424,247.176,424,256z M464,160H352V16h112V160z" />
                                <rect x="384" y="32" width="16" height="16" />
                                <rect x="384" y="64" width="16" height="80" />
                                <rect x="416" y="32" width="16" height="112" />
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
        </button>

        <!-- Brand -->
        <div class="flex justify-start items-center">
            <button @click="isSideBarOpen = !isSideBarOpen"
                class="hidden md:block p-2 h-11 transition-colors duration-200 rounded-full text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-600 focus:ring-primary-700">
                <span class="sr-only">Open/Close Side panel</span>
                <span aria-hidden="true">
                    <svg class="size-7" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 496 496"
                        style="enable-background:new 0 0 496 496;" xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path
                                        d="M80,200c-32.576,0-59.488,24.48-63.448,56H0v16h19.056L32,297.888v18.976l-17.48,3.28l2.952,15.72L32,333.136v23.728
    l-17.48,3.28l2.952,15.72L32,373.136v23.728l-17.48,3.28l2.952,15.72L32,413.136v21.76l48,57.6l47.768-57.32l17.712-3.32
    l-2.952-15.72L128,418.864v-23.728l17.48-3.28l-2.952-15.72L128,378.864v-23.728l17.48-3.28l-2.952-15.72L128,338.864v-23.728
    l17.48-3.28l-2.952-15.72L128,298.864v-0.976L140.944,272H160v-16h-16.56C139.488,224.48,112.576,200,80,200z M80,467.504
    l-16.84-20.208l39.92-7.488L80,467.504z M112,421.864l-60.568,11.352L48,429.104v-18.968l64-12V421.864z M112,381.864l-64,12
    v-23.728l64-12V381.864z M112,341.864l-64,12v-23.728l64-12V341.864z M112,294.112v7.752l-64,12v-19.752L36.944,272h86.112
    L112,294.112z M32.72,256c3.392-20.056,19.224-35.888,39.28-39.28V240h16v-23.28c20.056,3.384,35.888,19.224,39.28,39.28H32.72z" />
                                    <path d="M352,408c0,30.872,25.128,56,56,56s56-25.128,56-56s-25.128-56-56-56S352,377.128,352,408z M416,368.808
    C431.648,372,444,384.352,447.192,400H432v16h15.192C444,431.648,431.648,444,416,447.192V432h-16v15.192
    C384.352,444,372,431.648,368.808,416H384v-16h-15.192C372,384.352,384.352,372,400,368.808V384h16V368.808z" />
                                    <path d="M496,32V16h-16V0H336v16h-16v16h16v16h-16v16h16v16h-64V51.312l8.856-8.864L270.248,0h-44.504l-10.608,42.456L224,51.312
    V80H72v104h16V96h136v160h-32v16h16v184c0,22.056,17.944,40,40,40c22.056,0,40-17.944,40-40V272h16v-16h-32V96h64v16h-16v16h16
    v16h-16v16h16v16h64v49.136c-13.768,3.576-24,15.992-24,30.864s10.232,27.288,24,30.864v33.544
    c-44.784,4.056-80,41.768-80,87.592c0,48.52,39.48,88,88,88c48.52,0,88-39.48,88-88c0-45.824-35.216-83.536-80-87.592v-33.544
    c13.76-3.576,24-15.992,24-30.864s-10.24-27.288-24-30.864V176h64v-16h16v-16h-16v-16h16v-16h-16V96h16V80h-16V64h16V48h-16V32
    H496z M238.248,16h19.504l5.392,21.544L256,44.688V256h-16V44.688l-7.144-7.136L238.248,16z M272,288h-16v16h16v16h-16v16h16v16
    h-16v16h16v16h-16v16h16v16h-16v16h16v16h-16v16h14.528c-3.312,9.288-12.112,16-22.528,16s-19.216-6.712-22.528-16H240v-16h-16
    v-16h16v-16h-16v-16h16v-16h-16v-16h16v-16h-16v-16h16v-16h-16v-16h16v-16h-16v-16h48V288z M480,408c0,39.704-32.296,72-72,72
    c-39.704,0-72-32.296-72-72c0-39.704,32.296-72,72-72C447.704,336,480,368.296,480,408z M424,256c0,8.824-7.184,16-16,16
    c-8.824,0-16-7.176-16-16c0-8.824,7.176-16,16-16C416.816,240,424,247.176,424,256z M464,160H352V16h112V160z" />
                                    <rect x="384" y="32" width="16" height="16" />
                                    <rect x="384" y="64" width="16" height="80" />
                                    <rect x="416" y="32" width="16" height="112" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
            </button>
            <div class="pl-2 pr-4 py-2">
                {{ auth()->user()->profile->site == 'KP' ? 'Kantor Pusat' : config('custom.product_name') }}</div>
        </div>

        <!-- Mobile (3 vertical dot) sub menu button -->
        <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
            class="p-1 transition-colors duration-200 rounded-md text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 md:hidden focus:outline-none focus:ring">
            <span class="sr-only">Open sub manu</span>
            <span aria-hidden="true">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </span>
        </button>

        <!-- Desktop Right buttons -->
        <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">

            <!-- Toggle dark theme button -->
            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                <div class="w-12 h-6 transition rounded-full outline-none bg-primary-600 dark:bg-primary-500">
                </div>
                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm border border-primary-100"
                    :class="{
                        'translate-x-0 -translate-y-px  bg-white text-primary-600': !
                            isDark,
                        'translate-x-6 text-primary-100 bg-primary-700': isDark
                    }">
                    <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </button>

            <!-- Notification button -->
            <button @click="openNotificationsPanel"
                class="relative p-2 transition-colors duration-200 rounded-full text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-600 focus:ring-primary-700">
                <span class="sr-only">Open Notification panel</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                @if (notif_count() > 0)
                    <div class="absolute -top-2 -right-1">
                        <span class="px-[0.45rem] py-1 rounded-xl text-[10px] text-white bg-red-600">
                            {{ notif_count() }}
                        </span>
                    </div>
                @endif
            </button>

            <!-- Search button
            <button @click="openSearchPanel"
                class="p-2 transition-colors duration-200 rounded-full text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-600 focus:ring-primary-700">
                <span class="sr-only">Open search panel</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button> -->

            <!-- Settings button -->
            <button @click="openSettingsPanel"
                class="p-2 transition-colors duration-200 rounded-full text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-600 focus:ring-primary-700">
                <span class="sr-only">Open settings panel</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>

            <!-- User avatar button -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button"
                    aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                    class="px-5 transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                    <span class="sr-only">User menu</span>
                    <div>{{ Auth::user()->name }}</div>
                </button>

                <!-- User dropdown menu -->
                <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    @keydown.escape="open = false"
                    class="absolute right-0 w-48 py-1 bg-primary-20 rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-primary-700 focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                    <a href="{{ route('profile.edit') }}" role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        @lang('messages.yourprofile')
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" role="menuitem"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Mobile sub menu -->
        <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
            x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0"
            x-show="isMobileSubMenuOpen" @click.away="isMobileSubMenuOpen = false"
            class="absolute flex items-center p-4 bg-primary-20 rounded-md shadow-lg dark:bg-primary-900 top-16 inset-x-4 z-40 md:hidden"
            aria-label="Secondary">
            <div class="space-x-2">

                <!-- Toggle dark theme button -->
                <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                    <div class="w-12 h-6 transition rounded-full outline-none bg-primary-600 dark:bg-primary-500">
                    </div>
                    <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm border border-primary-100"
                        :class="{
                            'translate-x-0 -translate-y-px  bg-white text-primary-600': !
                                isDark,
                            'translate-x-6 text-primary-100 bg-primary-700': isDark
                        }">
                        <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                </button>

                <!-- Notification button -->
                <button @click="openNotificationsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                    class="relative p-2 transition-colors duration-200 rounded-full text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-600 focus:ring-primary-700">
                    <span class="sr-only">Open notifications panel</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @if (notif_count() > 0)
                        <div class="absolute -top-2 -right-1">
                            <span class="px-[0.45rem] py-1 rounded-xl text-[10px] text-white bg-red-600">
                                {{ notif_count() }}
                            </span>
                        </div>
                    @endif
                </button>

                <!-- Search button
                <button
                    @click="openSearchPanel(); $nextTick(() => { $refs.searchInput.focus(); setTimeout(() => {isMobileSubMenuOpen= false}, 100) })"
                    class="p-2 transition-colors duration-200 rounded-full text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-600 focus:ring-primary-700">
                    <span class="sr-only">Open search panel</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button> -->

                <!-- Settings button -->
                <button @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                    class="p-2 transition-colors duration-200 rounded-full text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-600 focus:ring-primary-700">
                    <span class="sr-only">Open settings panel</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>

            <!-- User avatar button -->
            <div class="relative ml-auto" x-data="{ open: false }">
                <button @click="open = !open" type="button" aria-haspopup="true"
                    :aria-expanded="open ? 'true' : 'false'"
                    class="p-2 transition-color duration-200 rounded-full text-primary bg-primary-50 hover:text-primary hover:bg-primary-100 dark:text-primary-500 dark:hover:text-light dark:hover:bg-primary-600 dark:bg-primary-700 focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-600 focus:ring-primary-700">
                    <span class="sr-only">User menu</span>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" />
                    </svg>
                </button>

                <!-- User dropdown menu -->
                <div x-show="open" x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    class="absolute right-0 w-48 py-1 origin-top-right bg-primary-20 rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-primary-700"
                    role="menu" aria-orientation="vertical" aria-label="User menu">
                    <a href="{{ route('profile.edit') }}" role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        @lang('messages.yourprofile')
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" role="menuitem"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>

                </div>
            </div>
        </nav>
    </div>

    <!-- Mobile main manu -->
    <div class="border-b border-primary-100 md:hidden dark:border-primary-800" x-show="isMobileMainMenuOpen"
        @click.away="isMobileMainMenuOpen = false">
        <nav aria-label="Main" class="px-2 py-4 space-y-2">

            <div x-data="{{ request()->getRequestUri() == '/admin/dashboard' ? '{isActive: true, open: true}' : '{isActive: false, open: false}' }}">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                    aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="currentColor" d="M0 15h16v1h-16v-1z"></path>
                            <path fill="currentColor" d="M0 0h1v16h-1v-16z"></path>
                            <path fill="currentColor" d="M9 8l-2.9-3-4.1 4v5h14v-13.1z"></path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Dashboards </span>
                </a>
            </div>

            @can('branch-list')
                @if (config('custom.menu_urusanumum') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 22) == '/general-affair/branch' ||
                    substr(request()->getRequestUri(), 0, 24) == '/general-affair/division' ||
                    substr(request()->getRequestUri(), 0, 23) == '/general-affair/jabatan' ||
                    substr(request()->getRequestUri(), 0, 26) == '/general-affair/brandivjab'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg fill="currentColor" class="size-5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                                    <path
                                        d="M14,8h1a1,1,0,0,0,0-2H14a1,1,0,0,0,0,2Zm0,4h1a1,1,0,0,0,0-2H14a1,1,0,0,0,0,2ZM9,8h1a1,1,0,0,0,0-2H9A1,1,0,0,0,9,8Zm0,4h1a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm12,8H20V3a1,1,0,0,0-1-1H5A1,1,0,0,0,4,3V20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Zm-8,0H11V16h2Zm5,0H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v5H6V4H18Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.generalaffair')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('branch-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="generalaffair">
                                <a href="{{ route('branch.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" viewBox="0 0 1024 1024"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M815 576h145c35 0 64 29 64 64v320c0 35-29 64-64 64H640c-35 0-64-29-64-64V640c0-35 29-64 64-64h113v-38H270v38h114c35 0 64 29 64 64v320c0 35-29 64-64 64H64c-35 0-64-29-64-64V640c0-35 29-64 64-64h144v-60c0-22 28-33 53-33h220v-36H343c-35 0-64-29-64-64V63c0-35 29-64 64-64h320c35 0 64 29 64 64v320c0 35-29 64-64 64H545v37c83 0 134-1 217-1 25 0 53 10 53 33v60zm145 64H640v320h320V640zM663 63H343v320h320V63zM384 640H64v320h320V640z" />
                                        </svg>
                                        @lang('messages.branch')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('division-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="generalaffair">
                                <a href="{{ route('division.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                                            <g id="chart-partition">
                                                <path
                                                    d="M24,23H0V0h24V23z M18,21h4v-5h-4V21z M12,21h4v-5h-4V21z M2,21h8v-5H2V21z M15,14h7V9h-7V14z M2,14h11V9H2V14z M13,7h9V2 H2v5H13z" />
                                            </g>
                                        </svg>
                                        @lang('messages.division')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('jabatan-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="generalaffair">
                                <a href="{{ route('jabatan.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.435,11.5h-.38V8.12a1.626,1.626,0,0,0-1.62-1.62h-.63V6.12a1.625,1.625,0,0,0-3.25,0V11.5H8.445V6.12a1.625,1.625,0,0,0-3.25,0V6.5h-.63a1.62,1.62,0,0,0-1.62,1.62V11.5h-.38a.5.5,0,1,0,0,1h.38v3.37a1.622,1.622,0,0,0,1.62,1.63H5.2v.37a1.625,1.625,0,1,0,3.25,0V12.5h7.11v5.37a1.625,1.625,0,1,0,3.25,0V17.5h.63a1.628,1.628,0,0,0,1.62-1.63V12.5h.38a.5.5,0,1,0,0-1ZM5.2,16.5h-.63a.625.625,0,0,1-.62-.63V8.12a.623.623,0,0,1,.62-.62H5.2Zm2.25,1.37a.634.634,0,0,1-.63.63.625.625,0,0,1-.62-.63V6.12a.623.623,0,0,1,.62-.62.632.632,0,0,1,.63.62Zm10.36,0a.625.625,0,1,1-1.25,0V6.12a.625.625,0,0,1,1.25,0Zm2.25-2a.625.625,0,0,1-.62.63h-.63v-9h.63a.623.623,0,0,1,.62.62Z" />
                                        </svg>
                                        @lang('messages.jobposition')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('brandivjab-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="generalaffair">
                                <a href="{{ route('brandivjab.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="size-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.4501 14.4V8.5C16.4501 7.95 16.0001 7.5 15.4501 7.5H12.55"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M14.05 6L12.25 7.5L14.05 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7.55005 10.2V14.3999" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M7.70001 9.89999C8.77697 9.89999 9.65002 9.02697 9.65002 7.95001C9.65002 6.87306 8.77697 6 7.70001 6C6.62306 6 5.75 6.87306 5.75 7.95001C5.75 9.02697 6.62306 9.89999 7.70001 9.89999Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M7.54999 17.9999C8.5441 17.9999 9.34998 17.194 9.34998 16.1999C9.34998 15.2058 8.5441 14.3999 7.54999 14.3999C6.55588 14.3999 5.75 15.2058 5.75 16.1999C5.75 17.194 6.55588 17.9999 7.54999 17.9999Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M16.45 17.9999C17.4441 17.9999 18.25 17.194 18.25 16.1999C18.25 15.2058 17.4441 14.3999 16.45 14.3999C15.4559 14.3999 14.65 15.2058 14.65 16.1999C14.65 17.194 15.4559 17.9999 16.45 17.9999Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        @lang('messages.brandivjab')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @canany(['pegawai-list', 'pengumuman-list', 'kritiksaran-list', 'mitraizin-list', 'pcizin-list',
                'resign-list'])
                @if (config('custom.menu_kepegawaian') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 24) == '/human-resource/employee' ||
                    substr(request()->getRequestUri(), 0, 21) == '/human-resource/mitra' ||
                    substr(request()->getRequestUri(), 0, 28) == '/human-resource/announcement' ||
                    substr(request()->getRequestUri(), 0, 25) == '/human-resource/criticism' ||
                    substr(request()->getRequestUri(), 0, 22) == '/human-resource/pcizin' ||
                    substr(request()->getRequestUri(), 0, 22) == '/human-resource/resign' ||
                    substr(request()->getRequestUri(), 0, 25) == '/human-resource/mitraubah' ||
                    substr(request()->getRequestUri(), 0, 25) == '/human-resource/mitraizin'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                    y="0px" viewBox="0 0 800 800" style="enable-background:new 0 0 800 800;"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M700,422.622c0,17.149-13.846,31.06-30.945,31.06h-55.144V574.53c30.924,9.713,53.558,38.37,53.558,72.604 c0,42.22-34.092,76.435-76.192,76.435c-42.058,0-76.216-34.215-76.216-76.435c0-33.366,21.484-61.444,51.217-71.875V453.682 H411.501v197.281c30.946,9.7,53.603,38.357,53.603,72.604c0,42.208-34.137,76.433-76.215,76.433 c-42.058,0-76.192-34.225-76.192-76.433c0-33.377,21.462-61.445,51.192-71.876V453.681H217.469v120.849 c30.947,9.713,53.538,38.37,53.538,72.604c0,42.219-34.093,76.435-76.172,76.435c-42.058,0-76.173-34.216-76.173-76.435 c0-33.366,21.442-61.444,51.172-71.875V453.682h-38.888c-17.102,0-30.946-13.909-30.946-31.06c0-17.14,13.845-31.05,30.946-31.05 h538.108C686.154,391.572,700,405.482,700,422.622z M410.548,178.586l20.397,212.985h50.543 c-2.453-42.077-6.1-88.538-8.485-117.347c18.968,25.22,30.707,64.905,34.376,117.347h60.177 c-5.358-86.743-29.927-148.005-73.589-181.631c-7.249-5.59-15.276-11.235-23.328-15.596c-5.578-3.011-11.459-5.437-17.447-7.482 C439.452,182.196,424.999,179.565,410.548,178.586z M400,169.896c47.157,0,85.416-37.998,85.416-84.948 C485.416,38.021,447.157,0,400,0c-47.18,0-85.417,38.021-85.417,84.948C314.583,131.898,352.82,169.896,400,169.896z M291.102,391.572c5.122-52.496,17.34-92.321,35.83-117.39c-1.302,25.96-3.493,70.016-5.621,117.39h45.14l25.563-213.312 c-15.581,0.522-31.229,2.969-45.984,8.046c-6.057,2.088-12.001,4.633-17.601,7.766c-19.098,10.669-35.157,24.742-48.416,41.925 c-6.793,8.798-12.608,18.281-17.665,28.167c-19.987,39.261-27.887,83.948-31.619,127.406L291.102,391.572L291.102,391.572z" />
                                    </g>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.humanresource')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('pegawai-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="humanresource">
                                <a href="{{ route('employee.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" viewBox="0 0 32 32" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <title>users</title>
                                            <path
                                                d="M16 21.416c-5.035 0.022-9.243 3.537-10.326 8.247l-0.014 0.072c-0.018 0.080-0.029 0.172-0.029 0.266 0 0.69 0.56 1.25 1.25 1.25 0.596 0 1.095-0.418 1.22-0.976l0.002-0.008c0.825-3.658 4.047-6.35 7.897-6.35s7.073 2.692 7.887 6.297l0.010 0.054c0.127 0.566 0.625 0.982 1.221 0.982 0.69 0 1.25-0.559 1.25-1.25 0-0.095-0.011-0.187-0.031-0.276l0.002 0.008c-1.098-4.78-5.305-8.295-10.337-8.316h-0.002zM9.164 11.102c0 0 0 0 0 0 2.858 0 5.176-2.317 5.176-5.176s-2.317-5.176-5.176-5.176c-2.858 0-5.176 2.317-5.176 5.176v0c0.004 2.857 2.319 5.172 5.175 5.176h0zM9.164 3.25c0 0 0 0 0 0 1.478 0 2.676 1.198 2.676 2.676s-1.198 2.676-2.676 2.676c-1.478 0-2.676-1.198-2.676-2.676v0c0.002-1.477 1.199-2.674 2.676-2.676h0zM22.926 11.102c2.858 0 5.176-2.317 5.176-5.176s-2.317-5.176-5.176-5.176c-2.858 0-5.176 2.317-5.176 5.176v0c0.004 2.857 2.319 5.172 5.175 5.176h0zM22.926 3.25c1.478 0 2.676 1.198 2.676 2.676s-1.198 2.676-2.676 2.676c-1.478 0-2.676-1.198-2.676-2.676v0c0.002-1.477 1.199-2.674 2.676-2.676h0zM31.311 19.734c-0.864-4.111-4.46-7.154-8.767-7.154-0.395 0-0.784 0.026-1.165 0.075l0.045-0.005c-0.93-2.116-3.007-3.568-5.424-3.568-2.414 0-4.49 1.448-5.407 3.524l-0.015 0.038c-0.266-0.034-0.58-0.057-0.898-0.063l-0.009-0c-4.33 0.019-7.948 3.041-8.881 7.090l-0.012 0.062c-0.018 0.080-0.029 0.173-0.029 0.268 0 0.691 0.56 1.251 1.251 1.251 0.596 0 1.094-0.417 1.22-0.975l0.002-0.008c0.684-2.981 3.309-5.174 6.448-5.186h0.001c0.144 0 0.282 0.020 0.423 0.029 0.056 3.218 2.679 5.805 5.905 5.805 3.224 0 5.845-2.584 5.905-5.794l0-0.006c0.171-0.013 0.339-0.035 0.514-0.035 3.14 0.012 5.765 2.204 6.442 5.14l0.009 0.045c0.126 0.567 0.625 0.984 1.221 0.984 0.69 0 1.249-0.559 1.249-1.249 0-0.094-0.010-0.186-0.030-0.274l0.002 0.008zM16 18.416c-0 0-0 0-0.001 0-1.887 0-3.417-1.53-3.417-3.417s1.53-3.417 3.417-3.417c1.887 0 3.417 1.53 3.417 3.417 0 0 0 0 0 0.001v-0c-0.003 1.886-1.53 3.413-3.416 3.416h-0z" />
                                        </svg>
                                        @lang('messages.employee')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('kritiksaran-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="humanresource">
                                <a href="{{ route('criticism.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="size-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2h-4.586l-2.707 2.707a1 1 0 0 1-1.414 0L8.586 19H4a2 2 0 0 1-2-2V6zm18 0H4v11h5a1 1 0 0 1 .707.293L12 19.586l2.293-2.293A1 1 0 0 1 15 17h5V6zM6 9.5a1 1 0 0 1 1-1h10a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1zm0 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1z"
                                                fill="currentColor" />
                                        </svg>
                                        @lang('messages.criticism')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('pcizin-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="humanresource">
                                <a href="{{ route('pcizin.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" viewBox="0 0 16 16" id="request-16px"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path id="Path_49" data-name="Path 49"
                                                d="M30.5,16a.489.489,0,0,1-.191-.038A.5.5,0,0,1,30,15.5V13h-.5A2.5,2.5,0,0,1,27,10.5v-8A2.5,2.5,0,0,1,29.5,0h11A2.5,2.5,0,0,1,43,2.5v8A2.5,2.5,0,0,1,40.5,13H33.707l-2.853,2.854A.5.5,0,0,1,30.5,16Zm-1-15A1.5,1.5,0,0,0,28,2.5v8A1.5,1.5,0,0,0,29.5,12h1a.5.5,0,0,1,.5.5v1.793l2.146-2.147A.5.5,0,0,1,33.5,12h7A1.5,1.5,0,0,0,42,10.5v-8A1.5,1.5,0,0,0,40.5,1ZM36,9a1,1,0,1,0-1,1A1,1,0,0,0,36,9Zm1-4a2,2,0,0,0-4,0,.5.5,0,0,0,1,0,1,1,0,1,1,1,1,.5.5,0,0,0,0,1A2,2,0,0,0,37,5Z"
                                                transform="translate(-27)" />
                                        </svg>
                                        @lang('messages.pcizin')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('resign-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="humanresource">
                                <a href="{{ route('resign.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" viewBox="0 0 24 24"
                                            id="sign-out-double-arrow-left" data-name="Line Color"
                                            xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                                            <polyline id="secondary" points="6 15 3 12 6 9"
                                                style="fill: none; stroke: rgb(44, 169, 188); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                            </polyline>
                                            <polyline id="secondary-2" data-name="secondary" points="11 15 8 12 11 9"
                                                style="fill: none; stroke: rgb(44, 169, 188); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                            </polyline>
                                            <line id="secondary-3" data-name="secondary" x1="8" y1="12"
                                                x2="17" y2="12"
                                                style="fill: none; stroke: rgb(44, 169, 188); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                            </line>
                                            <path id="primary"
                                                d="M10,5V4a1,1,0,0,1,1-1h9a1,1,0,0,1,1,1V20a1,1,0,0,1-1,1H11a1,1,0,0,1-1-1V19"
                                                style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                            </path>
                                        </svg>
                                        @lang('messages.resign')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @canany(['coa-list', 'pcpettycash-list', 'pcbiaya-list'])
                @if (config('custom.menu_keuangan') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 12) == '/finance/coa' ||
                    substr(request()->getRequestUri(), 0, 20) == '/finance/pcpettycash' ||
                    substr(request()->getRequestUri(), 0, 16) == '/finance/pcbiaya'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="size-5" version="1.1" id="Capa_1" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                    y="0px" viewBox="0 0 490 490" style="enable-background:new 0 0 490 490;"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M490,30.625V15.313H0v15.313h45.908V336.92H0v15.313h197.041l-54.339,115.965l13.877,6.49l33.577-71.658h109.672 l33.577,71.658l13.877-6.49l-54.339-115.965H490V336.92h-45.908V30.625H490z M292.653,387.717h-95.322l16.627-35.485h62.067 L292.653,387.717z M428.78,336.92H61.22V30.625h367.56V336.92z" />
                                        <path
                                            d="M240.454,273.262l-31.417-86.118h-95.524l-31.418,86.118H240.454z M124.22,202.457h74.11l20.232,55.493H103.987 L124.22,202.457z" />
                                        <path
                                            d="M249.531,273.262H407.89l-31.418-86.118h-95.524L249.531,273.262z M365.765,202.457l20.232,55.493H271.423l20.232-55.493 H365.765z" />
                                        <path
                                            d="M292.762,88.316h-95.524l-31.433,86.103h158.374L292.762,88.316z M207.945,103.629h74.11l20.232,55.478h-114.59 L207.945,103.629z" />
                                    </g>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.finance')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('coa-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="finance">
                                <a href="{{ route('coa.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.32,5.05l-6-2h-.07a.7.7,0,0,0-.14,0h-.23l-.13,0h-.07L9,5,3.32,3.05a1,1,0,0,0-.9.14A1,1,0,0,0,2,4V18a1,1,0,0,0,.68.95l6,2h0a1,1,0,0,0,.62,0h0L15,19.05,20.68,21A1.19,1.19,0,0,0,21,21a.94.94,0,0,0,.58-.19A1,1,0,0,0,22,20V6A1,1,0,0,0,21.32,5.05ZM8,18.61,4,17.28V5.39L8,6.72Zm6-1.33-4,1.33V6.72l4-1.33Zm6,1.33-4-1.33V5.39l4,1.33Z" />
                                        </svg>
                                        @lang('messages.chartofaccount')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('pcpettycash-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="finance">
                                <a href="{{ route('pcpettycash.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="size-5" version="1.1" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px" y="0px" viewBox="0 0 200.158 200.158"
                                            style="enable-background:new 0 0 200.158 200.158;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <g>
                                                        <path style="fill:currentColor;"
                                                            d="M136.222,42.807c0-17.454-14.19-31.655-31.633-31.655c-17.45,0-31.651,14.201-31.651,31.655 c0,17.443,14.197,31.641,31.651,31.641C122.032,74.447,136.222,60.246,136.222,42.807z M104.588,69.397 c-14.677,0-26.602-11.928-26.602-26.594c0-14.67,11.925-26.605,26.602-26.605c14.67,0,26.598,11.935,26.598,26.605 C131.183,57.473,119.254,69.397,104.588,69.397z" />
                                                        <path style="fill:currentColor;"
                                                            d="M106.46,39.693c-4.166-1.775-4.842-2.731-4.842-4.341c0-1.371,0.619-3.003,3.6-3.003 c2.745,0,4.495,1.002,5.343,1.492l1.066,0.608l1.915-5.071l-0.784-0.447c-1.689-0.948-3.497-1.503-5.519-1.7v-4.581h-5.035v4.842 c-4.277,1.045-6.986,4.245-6.986,8.367c-0.011,5.103,4.212,7.455,8.335,9.076c3.579,1.446,4.32,2.874,4.32,4.57 c0,0.959-0.319,1.786-0.927,2.394c-1.818,1.829-6.442,1.22-9.359-0.709l-1.12-0.73l-1.84,5.125l0.651,0.458 c1.643,1.174,4.112,1.979,6.639,2.197v4.699h5.035v-5.025c4.427-1.034,7.358-4.474,7.358-8.783 C114.319,44.761,111.964,41.933,106.46,39.693z" />
                                                        <path style="fill:currentColor;"
                                                            d="M145.731,59.158c-13.439,0-24.383,10.937-24.383,24.365c0,13.439,10.948,24.361,24.383,24.361 s24.365-10.923,24.365-24.361C170.092,70.095,159.169,59.158,145.731,59.158z M145.731,103.554 c-11.055,0-20.045-8.986-20.045-20.031s8.99-20.031,20.045-20.031c11.044,0,20.024,8.986,20.024,20.031 S156.775,103.554,145.731,103.554z" />
                                                        <path style="fill:currentColor;"
                                                            d="M147.245,80.932c-3.038-1.296-3.525-1.968-3.525-3.089c0-1.36,0.837-2.047,2.48-2.047 c2.022,0,3.285,0.719,3.958,1.109l1.066,0.598l1.621-4.32l-0.773-0.447c-1.242-0.705-2.58-1.142-4.069-1.306v-3.522h-4.355v3.765 c-3.207,0.859-5.307,3.407-5.307,6.56c0,4.037,3.296,5.887,6.506,7.158c2.609,1.045,3.135,2.022,3.121,3.253 c0,0.651-0.208,1.217-0.608,1.632c-1.292,1.281-4.681,0.848-6.832-0.565l-1.113-0.73l-1.585,4.373l0.641,0.455 c1.242,0.884,3.081,1.503,4.975,1.711v3.611h4.32l0.021-3.883c3.386-0.87,5.604-3.547,5.604-6.896 C153.39,83.978,150.093,82.085,147.245,80.932z" />
                                                    </g>
                                                    <path style="fill:currentColor;"
                                                        d="M0,172.647h31.555v-62.576H0V172.647z M6.288,116.363h18.975v49.997H6.288V116.363z" />
                                                    <path style="fill:currentColor;"
                                                        d="M199.299,148.733c-1.142-2.416-12.154-24.558-25.091-22.253c-3.572,0.655-6.682,3.919-10.991,8.432 c-7.333,7.712-17.386,18.288-33.426,18.288c-9.781,0-20.825-3.969-32.936-11.828l25.113-0.011c0,0,0.251,0.021,0.666,0.021 c6.585,0,10.837-3.579,10.837-9.13v-10.411l-0.064-0.623c-0.73-3.686-4.037-10.654-11.23-10.654H37.191v60.239l2.197,0.694 c2.283,0.705,55.973,17.476,75.603,17.476l0,0c0,0,0.565,0.032,1.621,0.032c8.453,0,52.13-1.782,82.228-36.898l1.317-1.546 L199.299,148.733z M116.613,182.725c-0.837,0-1.306-0.021-1.482-0.021c-16.634,0-61.216-13.331-71.652-16.516V116.86h78.692 c3.361,0,4.71,4.262,5.003,5.354v10.042c0,2.351-2.469,2.842-4.549,2.842l-45.022-0.011l7.444,5.644 c16.388,12.451,31.444,18.76,44.743,18.76c18.725,0,30.327-12.175,37.986-20.238c2.806-2.96,5.995-6.302,7.559-6.596 c6.106-0.998,13.417,9.323,17.368,16.924C164.445,181.104,124.447,182.725,116.613,182.725z" />
                                                </g>
                                            </g>
                                        </svg>
                                        @lang('messages.pcpettycash')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('pcbiaya-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="finance">
                                <a href="{{ route('pcbiaya.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="size-5" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_901_1341)">
                                                <path
                                                    d="M15 17C15 15.343 13.657 14 12 14M12 14C10.343 14 9 15.343 9 17C9 18.657 10.343 20 12 20C13.657 20 15 21.343 15 23C15 24.657 13.657 26 12 26M12 14V13M12 26C10.343 26 9 24.657 9 23M12 26V27M22 31H31V29M25 26H31V24M26 21H31V19M26 16H31V14M23 11H31V9M10 6H31V1H7V6M23 20C23 13.926 18.074 9 12 9C5.926 9 1 13.926 1 20C1 26.074 5.926 31 12 31C18.074 31 23 26.074 23 20Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_901_1341">
                                                    <rect width="32" height="32" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        @lang('messages.pcbiaya')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @can('propinsi-list')
                @if (config('custom.menu_pemasaran') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 19) == '/marketing/propinsi' ||
                    substr(request()->getRequestUri(), 0, 20) == '/marketing/kabupaten' ||
                    substr(request()->getRequestUri(), 0, 20) == '/marketing/kecamatan' ||
                    substr(request()->getRequestUri(), 0, 24) == '/marketing/brandivjabkec'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg fill="currentColor" class="size-5" viewBox="0 0 1000 1000"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M897 198q-24-6-87-14-81-10-164-15-13-33-47-56-42-29-99-29t-99 29q-34 23-48 56-82 5-163 15-63 8-87 14-23 5-35 18-10 11-14 27-2 12-1 25l2 10 32 296q32 298 33 306l1 6q3 14 7 20 8 10 27.5 10t25.5-14q3-7 3-24l2-100q0-21 15-36t36-16q184-4 263-4t263 4q21 1 36 15.5t15 35.5l2 101q0 17 3 24 6 14 25.5 14t27.5-10q4-6 7-20l1-6q1-8 33-306l32-296 2-10q1-13-1-25-4-16-14-27-12-13-35-18zm-43 111q-3 28-19 189l-15 156-113-3q-128-3-206-3h-1q-78 0-207 3l-112 3-15-156q-16-161-20-189-2-20 2-30t15-14q7-3 29-6h3q164-25 305-25h1q142 0 305 24l3 1q21 3 29 6 11 4 15 13.5t1 30.5zm-457 24h162q4 0 7 3t3 7v227q0 4-3 6.5t-7 2.5H397q-4 0-7-2.5t-3-6.5V343q0-4 3-7t7-3zm409 11l-122-20q-4 0-7.5 2.5T672 333l-25 158q-1 4 1.5 7t6.5 4l122 20q4 0 7.5-2t4.5-6l25-159q1-4-1.5-7t-6.5-4zm-469 17q0-4-3.5-6.5T326 353l-122 20q-4 0-6.5 3.5T196 384l25 158q1 4 4 6.5t7 1.5l123-20q4 0 6.5-3.5t1.5-7.5z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.marketing')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('propinsi-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="marketing">
                                <a href="{{ route('propinsi.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.32,5.05l-6-2h-.07a.7.7,0,0,0-.14,0h-.23l-.13,0h-.07L9,5,3.32,3.05a1,1,0,0,0-.9.14A1,1,0,0,0,2,4V18a1,1,0,0,0,.68.95l6,2h0a1,1,0,0,0,.62,0h0L15,19.05,20.68,21A1.19,1.19,0,0,0,21,21a.94.94,0,0,0,.58-.19A1,1,0,0,0,22,20V6A1,1,0,0,0,21.32,5.05ZM8,18.61,4,17.28V5.39L8,6.72Zm6-1.33-4,1.33V6.72l4-1.33Zm6,1.33-4-1.33V5.39l4,1.33Z" />
                                        </svg>
                                        @lang('messages.propinsi')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('kabupaten-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="marketing">
                                <a href="{{ route('kabupaten.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="size-5" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <g transform="matrix(1.1485 0 0 1.2471 -1.233 -1.917)" fill="currentColor"
                                                stroke-width=".82858px">
                                                <rect x="1.0737" y="1.5368" width="13.931" height="12.83"
                                                    fill-opacity=".25" />
                                                <path
                                                    d="M1.074 1.537v12.83h13.93V1.538H1.075zm.835.836h2.41c-.28 1.934.04 3.95 1.045 5.678.803 1.428 1.797 2.841 1.932 4.49-.05.342.328 1.14-.312.99H1.908V2.374zm3.253 0h9.006v2.854L6.434 8.24c-.86-1.37-1.42-2.926-1.37-4.523.001-.45.035-.899.098-1.344zm9.006 3.753v7.406H8.173c.072-1.603-.46-3.177-1.312-4.56 2.435-.95 4.87-1.898 7.307-2.846z"
                                                    color="currentColor" style="-inkscape-stroke:none" />
                                            </g>
                                        </svg>
                                        @lang('messages.kabupaten')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('kabupaten-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="marketing">
                                <a href="{{ route('kecamatan.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="size-5" viewBox="-1.5 0 19 19"
                                            xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg">
                                            <path
                                                d="M15.084 15.2H.916a.264.264 0 0 1-.254-.42l2.36-4.492a.865.865 0 0 1 .696-.42h.827a9.51 9.51 0 0 0 .943 1.108H3.912l-1.637 3.116h11.45l-1.637-3.116h-1.34a9.481 9.481 0 0 0 .943-1.109h.591a.866.866 0 0 1 .696.421l2.36 4.492a.264.264 0 0 1-.254.42zM11.4 7.189c0 2.64-2.176 2.888-3.103 5.46a.182.182 0 0 1-.356 0c-.928-2.572-3.104-2.82-3.104-5.46a3.282 3.282 0 0 1 6.563 0zm-1.86-.005a1.425 1.425 0 1 0-1.425 1.425A1.425 1.425 0 0 0 9.54 7.184z" />
                                        </svg>
                                        @lang('messages.kecamatan')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('kabupaten-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="marketing">
                                <a href="{{ route('brandivjabkec.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="size-5" version="1.1" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px" y="0px" viewBox="0 0 329.966 329.966"
                                            style="enable-background:new 0 0 329.966 329.966;" xml:space="preserve">
                                            <path id="XMLID_822_"
                                                d="M218.317,139.966h-38.334v-45V15c0-8.284-6.716-15-15-15h-120c-8.284,0-15,6.716-15,15v79.966 c0,8.284,6.716,15,15,15h105v30h-38.334c-52.383,0-95,42.617-95,95s42.617,95,95,95h106.668c52.383,0,95-42.617,95-95 S270.7,139.966,218.317,139.966z M59.983,79.966V30h90v49.966H59.983z M218.317,299.966H111.649c-35.841,0-65-29.159-65-65 s29.159-65,65-65h38.334v65c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15v-65h38.334c35.841,0,65,29.159,65,65 S254.158,299.966,218.317,299.966z" />
                                        </svg>
                                        @lang('messages.brandivjabkec')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @can('satuan-list')
                @if (config('custom.menu_gudang') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 17) == '/warehouse/satuan' ||
                    substr(request()->getRequestUri(), 0, 17) == '/warehouse/gudang' ||
                    substr(request()->getRequestUri(), 0, 17) == '/warehouse/goods' ||
                    substr(request()->getRequestUri(), 0, 23) == '/warehouse/stock-opname' ||
                    substr(request()->getRequestUri(), 0, 27) == '/warehouse/stock-adjustment' ||
                    substr(request()->getRequestUri(), 0, 27) == '/warehouse/purchase-receipt'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 1024 1024"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M948.828 837.618c16.962 0 30.72-13.758 30.72-30.72V390.693c0-8.603-7.779-20.23-15.735-23.516L529.105 187.588c-10.592-4.376-30.496-4.351-41.074.052L56.711 367.086c-7.967 3.315-15.751 14.982-15.751 23.607v416.205c0 16.962 13.758 30.72 30.72 30.72h877.148zm0 40.96H71.68c-39.583 0-71.68-32.097-71.68-71.68V390.693c0-25.169 17.737-51.757 40.978-61.425l431.315-179.444c20.615-8.582 51.809-8.62 72.451-.093L979.452 329.32c23.279 9.617 41.056 36.187 41.056 61.373v416.205c0 39.583-32.097 71.68-71.68 71.68z" />
                                    <path
                                        d="M223.534 851.277V562.386c0-16.962 13.758-30.72 30.72-30.72h512c16.962 0 30.72 13.758 30.72 30.72v288.891c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V562.386c0-39.583-32.097-71.68-71.68-71.68h-512c-39.583 0-71.68 32.097-71.68 71.68v288.891c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.warehouse')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('gudang-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="warehouse">
                                <a href="{{ route('gudang.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1"
                                        :class="{
                                            'border-b border-b-1 border-primary-100 dark:border-primary-700': currentlyOpen ==
                                                'gudang'
                                        }">
                                        <span aria-hidden="true">
                                            <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 15 15" version="1.1"
                                                id="warehouse" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.5,5c-0.0762,0.0003-0.1514-0.0168-0.22-0.05L7.5,2L1.72,4.93C1.4632,5.0515,1.1565,4.9418,1.035,4.685&#xA;&#x9;S1.0232,4.1215,1.28,4L7.5,0.92L13.72,4c0.2761,0.0608,0.4508,0.3339,0.39,0.61C14.0492,4.8861,13.7761,5.0608,13.5,5z M5,10H2v3h3&#xA;&#x9;V10z M9,10H6v3h3V10z M13,10h-3v3h3V10z M11,6H8v3h3V6z M7,6H4v3h3V6z" />
                                            </svg>
                                        </span>
                                        @lang('messages.location')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('satuan-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="warehouse">
                                <a href="{{ route('units.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <span aria-hidden="true">
                                            <svg fill="currentColor" class="size-5" viewBox="0 0 50 50"
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path
                                                    d="M17 2C16.449219 2 16 2.449219 16 3L16 11C16 11.550781 16.449219 12 17 12L33 12C33.554688 12 34 11.550781 34 11L34 3C34 2.449219 33.554688 2 33 2 Z M 29 7L31 7L31 9L29 9 Z M 22 14L22 30L10 30C9.675781 30 9.375 30.167969 9.1875 30.4375L2.46875 40L47.53125 40L40.8125 30.4375C40.625 30.167969 40.324219 30 40 30L28 30L28 14 Z M 2 42L2 45C2 45.554688 2.449219 46 3 46L4 46L4 47L6 47L6 46L44 46L44 47L46 47L46 46L47 46C47.554688 46 48 45.554688 48 45L48 42Z" />
                                            </svg>
                                        </span>
                                        @lang('messages.unit')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('barang-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="warehouse">
                                <a href="{{ route('goods.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <span aria-hidden="true">
                                            <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 52 52"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m45.2 19.6a1.6 1.6 0 0 1 1.59 1.45v22.55a4.82 4.82 0 0 1 -4.59 4.8h-32.2a4.82 4.82 0 0 1 -4.8-4.59v-22.61a1.6 1.6 0 0 1 1.45-1.59h38.55zm-12.39 6.67-.11.08-9.16 9.93-4.15-4a1.2 1.2 0 0 0 -1.61-.08l-.1.08-1.68 1.52a1 1 0 0 0 -.09 1.44l.09.1 5.86 5.55a2.47 2.47 0 0 0 1.71.71 2.27 2.27 0 0 0 1.71-.71l4.9-5.16.39-.41.52-.55 5-5.3a1.25 1.25 0 0 0 .11-1.47l-.07-.09-1.72-1.54a1.19 1.19 0 0 0 -1.6-.1zm12.39-22.67a4.81 4.81 0 0 1 4.8 4.8v4.8a1.6 1.6 0 0 1 -1.6 1.6h-44.8a1.6 1.6 0 0 1 -1.6-1.6v-4.8a4.81 4.81 0 0 1 4.8-4.8z" />
                                            </svg>
                                        </span>
                                        @lang('messages.goods')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('stopname-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="warehouse">
                                <a href="{{ route('stock-opname.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <span aria-hidden="true">
                                            <svg class="w-5 h-5" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path fill="currentColor"
                                                    d="M12 6v-6h-8v6h-4v7h16v-7h-4zM7 12h-6v-5h2v1h2v-1h2v5zM5 6v-5h2v1h2v-1h2v5h-6zM15 12h-6v-5h2v1h2v-1h2v5z">
                                                </path>
                                                <path fill="currentColor" d="M0 16h3v-1h10v1h3v-2h-16v2z"></path>
                                            </svg>
                                        </span>
                                        @lang('messages.stockopname')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('stopname-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="warehouse">
                                <a href="{{ route('stock-adjustment.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <span aria-hidden="true">
                                            <svg class="w-5 h-5" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path fill="currentColor"
                                                    d="M12 6v-6h-8v6h-4v7h16v-7h-4zM7 12h-6v-5h2v1h2v-1h2v5zM5 6v-5h2v1h2v-1h2v5h-6zM15 12h-6v-5h2v1h2v-1h2v5z">
                                                </path>
                                                <path fill="currentColor" d="M0 16h3v-1h10v1h3v-2h-16v2z"></path>
                                            </svg>
                                        </span>
                                        @lang('messages.stockadjustment')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('purchasereceipt-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="warehouse">
                                <a href="{{ route('purchase-receipt.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <span aria-hidden="true">
                                            <svg class="size-5" version="1.1" id="_x32_"
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                viewBox="0 0 512 512" xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: currentColor;
                                                    }
                                                </style>
                                                <g>
                                                    <path class="st0"
                                                        d="M447.77,33.653c-36.385-5.566-70.629,15.824-82.588,49.228h-44.038v37.899h40.902 c5.212,31.372,29.694,57.355,62.855,62.436c41.278,6.316,79.882-22.042,86.222-63.341C517.428,78.575,489.07,39.969,447.77,33.653z" />
                                                    <path class="st0"
                                                        d="M162.615,338.222c0-6.88-5.577-12.468-12.468-12.468H96.16c-6.891,0-12.467,5.588-12.467,12.468 c0,6.868,5.576,12.467,12.467,12.467h53.988C157.038,350.689,162.615,345.091,162.615,338.222z" />
                                                    <path class="st0"
                                                        d="M392.999,237.965L284.273,340.452l-37.966,9.398v-86.619H0v215.996h246.307v-59.454l35.547-5.732 c16.95-2.418,29.396-6.692,44.336-15.018l46.302-24.228v104.432h132.435V270.828C504.927,202.618,428.016,202.43,392.999,237.965z M215.996,448.913H30.313v-155.37h185.683v63.805l-36.419,9.01c-15.968,4.395-25.708,20.518-22.174,36.696l0.298,1.247 c3.478,15.912,18.651,26.436,34.785,24.14l23.51-3.788V448.913z" />
                                                </g>
                                            </svg>
                                        </span>
                                        @lang('messages.goodsreceipt')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @can('supplier-list')
                @if (config('custom.menu_pembelian') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 18) == '/purchase/supplier' ||
                    substr(request()->getRequestUri(), 0, 15) == '/purchase/order' ||
                    substr(request()->getRequestUri(), 0, 14) == '/purchase/plan'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 1000 1000"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M891 308H340q-6 0-10.5-4t-5.5-10l-32-164q-2-14-12-22.5T256 99H110q-15 0-25.5 10.5T74 135v5q0 15 10.5 26t25.5 11h102q4 0 7 2.5t4 6.5l102 544q3 19 20 28 8 5 18 5h17q-22 25-21 58.5t25 56.5 57.5 23 58-23 25.5-56.5-22-58.5h186q-23 25-21.5 58.5T693 878t57.5 23 57.5-23 25-56.5-21-58.5h17q15 0 25.5-10.5T865 727v-8q0-15-11-25.5T828 683H409q-6 0-10.5-4t-5.5-9l-10-54q-1-8 4-14t12-5h460q13 0 22.5-8t11.5-21l33-219q3-16-7.5-28.5T891 308z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.purchase')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('supplier-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="purchase">
                                <a href="{{ route('supplier.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22,7.82a1.25,1.25,0,0,0,0-.19v0h0l-2-5A1,1,0,0,0,19,2H5a1,1,0,0,0-.93.63l-2,5h0v0a1.25,1.25,0,0,0,0,.19A.58.58,0,0,0,2,8H2V8a4,4,0,0,0,2,3.4V21a1,1,0,0,0,1,1H19a1,1,0,0,0,1-1V11.44A4,4,0,0,0,22,8V8h0A.58.58,0,0,0,22,7.82ZM13,20H11V16h2Zm5,0H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v5H6V12a4,4,0,0,0,3-1.38,4,4,0,0,0,6,0A4,4,0,0,0,18,12Zm0-10a2,2,0,0,1-2-2,1,1,0,0,0-2,0,2,2,0,0,1-4,0A1,1,0,0,0,8,8a2,2,0,0,1-4,.15L5.68,4H18.32L20,8.15A2,2,0,0,1,18,10Z" />
                                        </svg>
                                        @lang('messages.supplier')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('po-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="purchase">
                                <a href="{{ route('purchase-order.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 1024 1024"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M533.959 424.126v242.812c0 12.162-9.773 22.022-21.829 22.022s-21.829-9.859-21.829-22.022V424.126h-6.654c-1.886.2-3.8.303-5.737.303h-82.373c-156.731 0-283.783-128.17-283.783-286.28 0-76.3 61.313-138.152 136.947-138.152 118.246 0 219.599 72.954 262.243 176.679C553.588 72.951 654.941-.003 773.187-.003c75.634 0 136.947 61.852 136.947 138.152 0 158.11-127.052 286.28-283.783 286.28h-82.373a54.39 54.39 0 01-5.737-.303h-4.28zm-53.538-44.043c4.774-1.168 8.403-5.572 8.403-10.708v-83.098c0-133.785-107.505-242.237-240.124-242.237-51.522 0-93.288 42.133-93.288 94.109 0 132.025 104.695 239.379 234.903 242.18a21.87 21.87 0 013.278-.247h86.828zm145.322.303h.608c132.619 0 240.124-108.451 240.124-242.237 0-51.975-41.766-94.109-93.288-94.109-132.619 0-240.124 108.451-240.124 242.237v83.098c0 5.136 3.628 9.54 8.403 10.708h80.65c1.236 0 2.448.104 3.628.303zM937.456 751.78c-74.665 64.718-237.417 105.999-425.511 105.999-188.128 0-350.904-41.296-425.551-106.034v76.504c0 .55-.02 1.095-.059 1.634.087.801.132 1.614.132 2.439 0 74.167 189.814 145.089 425.423 145.089s425.423-70.922 425.423-145.089c0-.854.048-1.696.142-2.525V751.78zm43.452-85.135c.137.996.207 2.014.207 3.048v162.959c0 1.036-.071 2.055-.208 3.053-4.256 108.638-213.251 185.747-469.016 185.747-258.413 0-469.082-78.714-469.082-189.132 0-.55.02-1.095.059-1.634a22.571 22.571 0 01-.132-2.439V672.992a86 86 0 010-6.614v-3.293c0-2.187.316-4.3.905-6.295 12.455-82.401 143.918-144.902 327.226-166.509a21.682 21.682 0 015.379.034c22.28-2.544 45.28-4.477 68.873-5.761 12.039-.655 22.324 8.659 22.974 20.803s-8.583 22.521-20.622 23.176C240.48 539.799 86.567 605.201 86.567 670.262c0 7.083 1.777 14.139 5.2 21.106 32.344 64.67 205.219 121.467 414.783 121.467 232.727 0 420.217-70.052 420.217-143.14 0-56.645-118.34-115.768-291.269-135.863a21.762 21.762 0 01-4.332-.956 1097.148 1097.148 0 00-54.572-4.332c-12.038-.657-21.269-11.035-20.618-23.179s10.939-21.456 22.977-20.799c226.148 12.347 397.817 84.304 401.956 182.077z" />
                                        </svg>
                                        @lang('messages.order')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @canany(['perawatan-list', 'perbaikan-list'])
                @if (config('custom.menu_pelayanan') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 20) == '/service/maintenance' ||
                    substr(request()->getRequestUri(), 0, 15) == '/service/repair'
                        ? '{isActive: true, open: true, currentlyOpen: "' . $controllerName . '"}'
                        : '{isActive: false, open: false, currentlyOpen: ""}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="size-5" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                                    fill="none">
                                    <g fill="currentColor">
                                        <path
                                            d="M6.834.33a2.25 2.25 0 012.332 0l5.25 3.182A2.25 2.25 0 0115.5 5.436V6A.75.75 0 0114 6v-.564a.75.75 0 00-.361-.642l-5.25-3.181a.75.75 0 00-.778 0l-5.25 3.181A.75.75 0 002 5.436v5.128a.75.75 0 00.361.642l4.028 2.44a.75.75 0 11-.778 1.283l-4.027-2.44A2.25 2.25 0 01.5 10.563V5.436a2.25 2.25 0 011.084-1.924L6.834.33z" />
                                        <path fill-rule="evenodd"
                                            d="M11.749 7.325l.001-.042v-.286a.75.75 0 00-1.5 0v.286l.001.042a3.73 3.73 0 00-1.318.546.76.76 0 00-.03-.03l-.201-.203a.75.75 0 00-1.06 1.06l.201.203.03.028c-.26.394-.45.84-.547 1.319a.878.878 0 00-.04-.001H7a.75.75 0 000 1.5h.286l.038-.001c.097.48.286.926.547 1.32a.71.71 0 00-.028.027l-.202.202a.75.75 0 001.06 1.06l.203-.202a.695.695 0 00.025-.026c.395.261.842.45 1.322.548l-.001.036v.286a.75.75 0 001.5 0v-.286-.036c.48-.097.926-.287 1.32-.548l.026.026.202.203a.75.75 0 001.06-1.061l-.201-.202a.667.667 0 00-.028-.026c.261-.395.45-.842.547-1.321H15a.75.75 0 000-1.5h-.286l-.04.002a3.734 3.734 0 00-.547-1.319l.03-.028.202-.202a.75.75 0 00-1.06-1.061l-.203.202-.029.03a3.73 3.73 0 00-1.318-.545zM11 8.75A2.247 2.247 0 008.75 11 2.247 2.247 0 0011 13.25 2.247 2.247 0 0013.25 11 2.247 2.247 0 0011 8.75z"
                                            clip-rule="evenodd" />
                                    </g>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.services')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('perawatan-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="sale">
                                <a href="{{ route('customer.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1"
                                        :class="{
                                            'border-b border-b-1 border-primary-100 dark:border-primary-700': currentlyOpen ==
                                                'customer'
                                        }">
                                        <svg fill="currentColor" class="size-5" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 297.197 297.197" style="enable-background:new 0 0 297.197 297.197;"
                                            xml:space="preserve">
                                            <g id="XMLID_125_">
                                                <path id="XMLID_127_"
                                                    d="M284.21,145.081c-1.382-3.878-5.017-6.504-9.13-6.6l-69.414-1.662l-45.85-17.092l6.378-17.102l0.38,0.142
                                                                                                                        c1.148,0.427,2.323,0.631,3.48,0.631c4.036,0,7.836-2.479,9.334-6.484c1.915-5.151-0.7-10.884-5.853-12.804l-38.479-14.34
                                                                                                                        c-5.143-1.92-10.88,0.7-12.815,5.852c-1.914,5.153,0.701,10.885,5.852,12.804l0.789,0.293l-6.368,17.1L76.549,88.691l-22.36-41.527
                                                                                                                        c-2.479-4.613-8.137-6.523-12.901-4.337L5.821,59.029c-2.712,1.24-4.725,3.622-5.492,6.499c-0.757,2.873-0.194,5.94,1.537,8.361
                                                                                                                        l44.682,62.288l-18.754,50.319c-0.924,2.475-0.826,5.212,0.273,7.612c1.089,2.402,3.101,4.27,5.57,5.192l132.159,49.261
                                                                                                                        c1.137,0.424,2.314,0.627,3.48,0.627c2.344,0,4.657-0.831,6.494-2.406l105.562-90.803
                                                                                                                        C284.451,153.291,285.599,148.961,284.21,145.081z M25.092,72.114l15.983-7.302l18.947,35.193l-5.095,13.688L25.092,72.114z" />
                                                <path id="XMLID_126_"
                                                    d="M282.197,195.873c-0.575-1.268-1.848-2.084-3.248-2.091c-1.399,0-2.674,0.818-3.247,2.091
                                                                                                                        c-5.248,11.468-15.01,33.78-15.01,41.149c0,10.081,8.176,18.252,18.257,18.252c10.073,0,18.248-8.171,18.248-18.252
                                                                                                                        C297.197,229.654,287.447,207.345,282.197,195.873z" />
                                            </g>
                                        </svg>
                                        @lang('messages.maintenance_2')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('perbaikan-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="sale">
                                <a href="{{ route('sale-order.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1"
                                        :class="{
                                            'border-b border-b-1 border-primary-100 dark:border-primary-700': currentlyOpen ==
                                                'saleorder'
                                        }">
                                        <svg class="size-5" version="1.1" id="REPAIR" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800"
                                            enable-background="new 0 0 1800 1800" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path fill="currentColor"
                                                        d="M803.722,820.892l-247.878-247.87l71.705-71.702l247.875,247.871l40.808-40.802L655.949,448.104
                                                                   l74.925-74.921c0.596-0.596,1.147-1.216,1.682-1.86c0.592-0.499,1.175-1.006,1.735-1.562l135.512-135.512
                                                                   c11.126-11.12,11.292-29.106,0.366-40.43l-1.538-1.606c-1.284-1.349-2.572-2.693-3.893-4.018
                                                                   C796.995,120.454,709.056,80.01,629.497,80.01c-53.655,0-99.814,17.796-133.483,51.468c-0.733,0.73-1.409,1.503-2.053,2.3
                                                                   c-0.443,0.388-0.89,0.765-1.309,1.183L185.294,442.324c-11.267,11.271-11.267,29.539,0,40.81l45.403,45.399l-37.493,37.493
                                                                   l-45.403-45.408c-5.414-5.41-12.752-8.453-20.405-8.453c-7.652,0-14.99,3.043-20.404,8.453L12.869,614.75
                                                                   c-11.268,11.271-11.268,29.538,0,40.802l197.415,197.416c5.414,5.41,12.752,8.454,20.404,8.454c7.653,0,14.995-3.043,20.405-8.454
                                                                   l94.115-94.13c11.268-11.264,11.268-29.531,0-40.802l-45.395-45.399l37.493-37.493l45.395,45.399
                                                                   c5.636,5.636,13.019,8.446,20.405,8.446c7.383,0,14.77-2.818,20.401-8.446l79.124-79.124l260.285,260.285L803.722,820.892z
                                                                   M629.497,137.719c58.812,0,124.33,28.287,178.733,76.497l-94.34,94.334L559.981,154.64
                                                                   C579.485,143.503,603.046,137.719,629.497,137.719z M230.688,791.756L74.079,635.15l53.317-53.321l156.602,156.605
                                                                   L230.688,791.756z M261.089,629.749l-24.999-24.999l35.408-35.408l24.998,24.998L261.089,629.749z M403.106,619.331
                                                                   L246.505,462.725L513.058,196.17l156.609,156.612L403.106,619.331z" />
                                                    <path fill="currentColor" d="M1763.996,1556.146l-593.695-593.688l-40.803,40.801l573.296,573.296l-71.701,71.709l-573.303-573.303
                                                                   l-40.803,40.81l593.704,593.705c5.41,5.408,12.752,8.452,20.401,8.452c7.657,0,14.999-3.044,20.409-8.452l112.502-112.521
                                                                   C1775.268,1585.686,1775.268,1567.418,1763.996,1556.146z" />
                                                </g>
                                                <path fill="currentColor"
                                                    d="M1780.444,264.271c-3.269-9.372-11.135-16.4-20.812-18.614c-9.67-2.206-19.806,0.708-26.825,7.729
                                                                  l-116.585,116.576l-109.307-109.315l116.585-116.57c7.02-7.021,9.942-17.156,7.729-26.833c-2.214-9.679-9.243-17.541-18.614-20.814
                                                                  c-29.071-10.149-59.48-15.298-90.379-15.298c-73.062,0-141.743,28.449-193.397,80.104c-51.671,51.66-80.123,120.344-80.123,193.406
                                                                  c0,35.343,6.723,69.648,19.442,101.514l-736.242,736.236c-31.861-12.721-66.158-19.435-101.497-19.435
                                                                  c-73.058,0-141.744,28.452-193.407,80.115c-73.802,73.801-99.243,185.193-64.809,283.775c3.272,9.372,11.134,16.4,20.812,18.614
                                                                  c9.673,2.206,19.809-0.7,26.833-7.72l116.581-116.586l109.315,109.299l-116.585,116.586c-7.021,7.02-9.938,17.155-7.729,26.833
                                                                  c2.214,9.677,9.242,17.534,18.613,20.812c29.064,10.152,59.468,15.296,90.372,15.304c0.008,0,0.008,0,0.016,0
                                                                  c73.042,0,141.728-28.46,193.39-80.122c79.559-79.566,99.726-196.352,60.563-294.822l736.347-736.333
                                                                  c31.865,12.728,66.162,19.443,101.506,19.443c0.008,0,0,0,0.008,0c73.046,0,141.736-28.444,193.391-80.106
                                                                  C1789.438,474.246,1814.878,362.854,1780.444,264.271z M583.011,1599.065c-40.762,40.763-94.948,63.216-152.58,63.216
                                                                  c0,0-0.012,0-0.016,0c-7.915-0.008-15.792-0.436-23.602-1.28l100.137-100.138c5.414-5.417,8.454-12.752,8.454-20.408
                                                                  c0-7.648-3.04-14.99-8.454-20.4L356.83,1369.946c-11.263-11.264-29.535-11.264-40.806,0l-100.072,100.072
                                                                  c-6.835-64.134,15.333-129.603,61.871-176.146c40.762-40.762,94.952-63.207,152.597-63.207c57.64,0,111.83,22.445,152.588,63.215
                                                                  C667.146,1378.013,667.146,1514.926,583.011,1599.065z M659.282,1288.535l-70.945-70.951l702.501-702.488l70.953,70.944
                                                                  L659.282,1288.535z M1674.832,507.246c-40.761,40.753-94.951,63.199-152.596,63.199S1410.394,548,1369.632,507.238
                                                                  c-40.753-40.762-63.207-94.953-63.207-152.597s22.454-111.834,63.216-152.598c40.753-40.758,94.951-63.204,152.596-63.204
                                                                  c7.922,0,15.796,0.429,23.605,1.28l-100.137,100.127c-5.411,5.41-8.453,12.752-8.453,20.4c0,7.657,3.042,14.991,8.453,20.401
                                                                  l150.108,150.117c11.271,11.271,29.547,11.271,40.81,0.008l100.072-100.073C1743.531,395.234,1721.367,460.704,1674.832,507.246z" />
                                            </g>
                                        </svg>
                                        @lang('messages.repair')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @can('customer-list')
                @if (config('custom.menu_penjualan') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 14) == '/sale/customer' ||
                    substr(request()->getRequestUri(), 0, 11) == '/sale/order' ||
                    substr(request()->getRequestUri(), 0, 13) == '/sale/invoice'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.00999 11.22V15.71C3.00999 20.2 4.80999 22 9.29999 22H14.69C19.18 22 20.98 20.2 20.98 15.71V11.22"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12 12C13.83 12 15.18 10.51 15 8.68L14.34 2H9.67L9 8.68C8.82 10.51 10.17 12 12 12Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M18.31 12C20.33 12 21.81 10.36 21.61 8.35L21.33 5.6C20.97 3 19.97 2 17.35 2H14.3L15 9.01C15.17 10.66 16.66 12 18.31 12Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M5.64 12C7.29 12 8.78 10.66 8.94 9.01L9.16 6.8L9.64001 2H6.59C3.97001 2 2.97 3 2.61 5.6L2.34 8.35C2.14 10.36 3.62 12 5.64 12Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 17C10.33 17 9.5 17.83 9.5 19.5V22H14.5V19.5C14.5 17.83 13.67 17 12 17Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.sale')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('customer-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="sale">
                                <a href="{{ route('customer.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 1024 1024"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M106.544 501.695l385.403-380.262c11.913-11.754 31.079-11.722 42.955.075l382.71 380.14c8.025 7.971 20.992 7.927 28.963-.098s7.927-20.992-.098-28.963l-382.71-380.14c-27.811-27.625-72.687-27.7-100.589-.171L77.775 472.539c-8.051 7.944-8.139 20.911-.194 28.962s20.911 8.139 28.962.194z" />
                                            <path
                                                d="M783.464 362.551v517.12c0 16.962-13.758 30.72-30.72 30.72h-481.28c-16.962 0-30.72-13.758-30.72-30.72v-517.12c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48v517.12c0 39.583 32.097 71.68 71.68 71.68h481.28c39.583 0 71.68-32.097 71.68-71.68v-517.12c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48z" />
                                            <path
                                                d="M551.175 473.257l-27.341 53.8c-5.124 10.083-1.104 22.412 8.979 27.536s22.412 1.104 27.536-8.979l28.549-56.177c14.571-28.693-2.885-57.14-35.061-57.14h-83.466c-32.176 0-49.632 28.447-35.064 57.135l28.552 56.182c5.124 10.083 17.453 14.103 27.536 8.979s14.103-17.453 8.979-27.536l-27.341-53.8h78.143z" />
                                            <path
                                                d="M594.039 777.562c38.726 0 70.124-31.395 70.124-70.124 0-80.871-66.26-147.128-147.139-147.128h-9.841c-80.879 0-147.139 66.257-147.139 147.128 0 38.728 31.398 70.124 70.124 70.124h163.871zm0 40.96H430.168c-61.347 0-111.084-49.733-111.084-111.084 0-103.493 84.599-188.088 188.099-188.088h9.841c103.5 0 188.099 84.595 188.099 188.088 0 61.35-49.737 111.084-111.084 111.084z" />
                                        </svg>
                                        @lang('messages.customer')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('so-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="sale">
                                <a href="{{ route('sale-order.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                                            <path
                                                d="M21.22,12A3,3,0,0,0,22,10a3,3,0,0,0-3-3H13.82A3,3,0,0,0,11,3H5A3,3,0,0,0,2,6a3,3,0,0,0,.78,2,3,3,0,0,0,0,4,3,3,0,0,0,0,4A3,3,0,0,0,2,18a3,3,0,0,0,3,3H19a3,3,0,0,0,2.22-5,3,3,0,0,0,0-4ZM11,19H5a1,1,0,0,1,0-2h6a1,1,0,0,1,0,2Zm0-4H5a1,1,0,0,1,0-2h6a1,1,0,0,1,0,2Zm0-4H5A1,1,0,0,1,5,9h6a1,1,0,0,1,0,2Zm0-4H5A1,1,0,0,1,5,5h6a1,1,0,0,1,0,2Zm8.69,11.71A.93.93,0,0,1,19,19H13.82a2.87,2.87,0,0,0,0-2H19a1,1,0,0,1,1,1A1,1,0,0,1,19.69,18.71Zm0-4A.93.93,0,0,1,19,15H13.82a2.87,2.87,0,0,0,0-2H19a1,1,0,0,1,1,1A1,1,0,0,1,19.69,14.71Zm0-4A.93.93,0,0,1,19,11H13.82a2.87,2.87,0,0,0,0-2H19a1,1,0,0,1,1,1A1,1,0,0,1,19.69,10.71Z" />
                                        </svg>
                                        @lang('messages.order')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('so-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="sale">
                                <a href="{{ route('sale-invoice.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="size-5" viewBox="0 0 15 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.5 12.5H1.5C0.947715 12.5 0.5 12.0523 0.5 11.5V7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H13.5C14.0523 6.5 14.5 6.94772 14.5 7.5V11.5C14.5 12.0523 14.0523 12.5 13.5 12.5H11.5M3.5 6.5V1.5C3.5 0.947715 3.94772 0.5 4.5 0.5H10.5C11.0523 0.5 11.5 0.947715 11.5 1.5V6.5M3.5 10.5H11.5V14.5H3.5V10.5Z"
                                                stroke="currentColor" />
                                        </svg>
                                        @lang('messages.invoice')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @can('recipe-list')
                @if (config('custom.menu_produksi') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 18) == '/production/recipe' ||
                    substr(request()->getRequestUri(), 0, 17) == '/production/order'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                    y="0px" viewBox="0 0 491.1 491.1" style="enable-background:new 0 0 491.1 491.1;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M469.2,309.15H20.9c-11.5,0-20.9-9.4-20.9-20.9s9.4-20.9,20.9-20.9h449.3c11.5,0,20.9,9.4,20.9,20.9 C491.1,299.75,480.7,309.15,469.2,309.15z" />
                                                </g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M382.7,490.55c-39.6,0-71.9-32.3-71.9-71.9s32.3-71.9,71.9-71.9s71.9,32.3,71.9,71.9 C453.6,458.25,421.3,490.55,382.7,490.55z M382.7,388.35c-16.7,0-30.2,13.6-30.2,31.3c0,16.7,13.6,31.3,30.2,31.3 s30.2-13.6,30.2-31.3C412.9,401.95,399.4,388.35,382.7,388.35z" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="M107.5,490.55c-39.6,0-71.9-32.3-71.9-71.9s32.3-71.9,71.9-71.9s71.9,32.3,71.9,71.9S147.1,490.55,107.5,490.55z M107.5,388.35c-16.7,0-30.2,13.6-30.2,31.3c0,16.7,13.6,31.3,30.2,31.3s30.2-13.6,30.2-31.3 C138.7,401.95,125.2,388.35,107.5,388.35z" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <path
                                                        d="M351.4,221.55H138.7c-11.5,0-20.9-9.4-20.9-20.9V21.45c0-11.5,9.4-20.9,20.9-20.9h211.6c11.5,0,20.9,9.4,20.9,20.9 v180.4C371.2,212.15,361.8,221.55,351.4,221.55z M159.6,180.95h171V41.25h-171V180.95z" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.production')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('recipe-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="production">
                                <a href="{{ route('recipe.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <span aria-hidden="true">
                                            <svg class="w-5 h-5" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor"
                                                    d="M468.166 24.156c-13.8-.31-30.977 9.192-42.46 16.883-22.597 15.13-45.255 67.882-45.255 67.882s-17.292-5.333-22.626 0c-5.333 5.333 0 22.627 0 22.627l-4.95 4.948 22.628 22.63 4.95-4.952s17.293 5.333 22.626 0c5.333-5.334 0-22.627 0-22.627s52.75-22.66 67.883-45.255c10.7-15.978 24.91-42.97 11.313-56.568-3.824-3.825-8.707-5.45-14.107-5.57zM312.568 121.65L121.65 312.568l77.782 77.782L390.35 199.432l-77.782-77.782zm-176.07 231.223l-4.95 4.95s-17.293-5.332-22.626 0c-5.333 5.335 0 22.628 0 22.628s-52.75 22.66-67.883 45.255c-10.7 15.978-24.91 42.97-11.313 56.568 13.597 13.598 40.59-.612 56.568-11.312 22.596-15.13 45.254-67.882 45.254-67.882s17.292 5.333 22.626 0c5.333-5.333 0-22.627 0-22.627l4.95-4.948-22.628-22.63z" />
                                            </svg>
                                        </span>
                                        @lang('messages.recipe')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('prodo-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="production">
                                <a href="{{ route('production-order.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <span aria-hidden="true">
                                            <svg class="size-5" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"
                                                version="1.1">
                                                <path style="fill:#555555;stroke:#000000;stroke-width:1.5px;"
                                                    d="m 40,2 -2,9 -10,5 -8,-6 -9,9 6,9 -4,10 -10,2 0,12 10,1 4,10 -6,9 9,9 9,-6 9,4 2,10 13,0 1,-11 8,-4 9,7 9,-8 -6,-10 4,-9 11,-2 0,-12 -11,-2 -3,-9 6,-10 -9,-9 -8,6 -11,-5 -1,-9 z m 5,18 C 58,20 69,31 69,44 69,58 58,68 45,68 32,68 21,58 21,44 21,31 32,20 45,20 z" />
                                                <circle style="fill:none;stroke:#eeeeee;stroke-width:3" cx="65"
                                                    cy="65" r="34" />
                                                <circle style="fill:#444444;fill-opacity:0.7" cx="65"
                                                    cy="65" r="32" />
                                                <path style="stroke:none;fill:#00C60A;fill-opacity:0.7"
                                                    d="m 58,33 7,34 32,-7 C 97,60 92,29 58,33" />
                                                <circle style=";stroke-width:5pt;stroke:#222222;fill:none;" cx="65"
                                                    cy="65" r="30" />
                                                <g style="fill:#aaaaaa;">
                                                    <circle cx="65" cy="35" r="2.5" />
                                                    <circle cx="95" cy="65" r="2.5" />
                                                    <circle cx="65" cy="95" r="2.5" />
                                                    <circle cx="35" cy="65" r="2.5" />
                                                </g>
                                                <path style="stroke:#ffffff;stroke-width:4;fill:none;" d="M 65,65 60,42" />
                                                <path style="stroke:#ffffff;stroke-width:3;fill:none;" d="M 65,65 44,87" />
                                                <circle style="fill:#ffffff;" cx="65" cy="65" r="3.5" />
                                            </svg>
                                        </span>
                                        @lang('messages.productionorder')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @can('delivery-list')
                @if (config('custom.menu_pengiriman') == true)
                    <div x-data="{{ substr(request()->getRequestUri(), 0, 15) == '/delivery/order' ||
                    substr(request()->getRequestUri(), 0, 17) == '/delivery/officer'
                        ? '{isActive: true, open: true}'
                        : '{isActive: false, open: false}' }}">
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span aria-hidden="true">
                                <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1,12.5v5a1,1,0,0,0,1,1H3a3,3,0,0,0,6,0h6a3,3,0,0,0,6,0h1a1,1,0,0,0,1-1V5.5a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v2H6A3,3,0,0,0,3.6,8.7L1.2,11.9a.61.61,0,0,0-.07.14l-.06.11A1,1,0,0,0,1,12.5Zm16,6a1,1,0,1,1,1,1A1,1,0,0,1,17,18.5Zm-7-13a1,1,0,0,1,1-1h9a1,1,0,0,1,1,1v11h-.78a3,3,0,0,0-4.44,0H10Zm-2,6H4L5.2,9.9A1,1,0,0,1,6,9.5H8Zm-3,7a1,1,0,1,1,1,1A1,1,0,0,1,5,18.5Zm-2-5H8v2.78a3,3,0,0,0-4.22.22H3Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm">@lang('messages.delivery')</span>
                            <span aria-hidden="true" class="ml-auto">
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        @can('delivery-edit')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="delivery">
                                <a href="{{ route('area-officer.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="size-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="style=linear">
                                                <g id="notification-direct">
                                                    <path id="vector"
                                                        d="M2.99219 14L6.49219 14C7.1217 14 7.71448 14.2964 8.09219 14.8L9.14219 16.2C9.5199 16.7036 10.1127 17 10.7422 17L11.9922 17L13.2422 17C13.8717 17 14.4645 16.7036 14.8422 16.2L15.8922 14.8C16.2699 14.2964 16.8627 14 17.4922 14L20.9922 14"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path id="vector_2"
                                                        d="M13.8469 2.75L8.74219 2.75C5.42848 2.75 2.74219 5.43629 2.74219 8.75L2.74219 15.2578C2.74219 18.5715 5.42848 21.2578 8.74218 21.2578L15.25 21.2578C18.5637 21.2578 21.25 18.5715 21.25 15.2578L21.25 10.1531"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <circle id="vector_3" cx="18.4738" cy="5.52617" r="2.77617"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                        @lang('messages.brandivjabkec')
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can('delivery-list')
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="delivery">
                                <a href="{{ route('delivery-order.index') }}" role="menuitem"
                                    class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                    <span class="flex flex-row gap-1">
                                        <svg class="w-5 h-5" viewBox="0 0 48 48" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20 33L26 35C26 35 41 32 43 32C45 32 45 34 43 36C41 38 34 44 28 44C22 44 18 41 14 41C10 41 4 41 4 41"
                                                stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4 29C6 27 10 24 14 24C18 24 27.5 28 29 30C30.5 32 26 35 26 35"
                                                stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M16 18V10C16 8.89543 16.8954 8 18 8H42C43.1046 8 44 8.89543 44 10V26"
                                                stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <rect x="25" y="8" width="10" height="9" fill="#2F88FF"
                                                stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        @lang('messages.order')
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            @endcan

            @can('user-list')
                <div x-data="{{ substr(request()->getRequestUri(), 0, 12) == '/admin/users' ||
                substr(request()->getRequestUri(), 0, 12) == '/admin/roles' ||
                substr(request()->getRequestUri(), 0, 13) == '/admin/qrcode'
                    ? '{isActive: true, open: true}'
                    : '{isActive: false, open: false}' }}">
                    <a href="#" @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-600 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                        :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                        aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span aria-hidden="true">
                            <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.32,9.55l-1.89-.63.89-1.78A1,1,0,0,0,20.13,6L18,3.87a1,1,0,0,0-1.15-.19l-1.78.89-.63-1.89A1,1,0,0,0,13.5,2h-3a1,1,0,0,0-.95.68L8.92,4.57,7.14,3.68A1,1,0,0,0,6,3.87L3.87,6a1,1,0,0,0-.19,1.15l.89,1.78-1.89.63A1,1,0,0,0,2,10.5v3a1,1,0,0,0,.68.95l1.89.63-.89,1.78A1,1,0,0,0,3.87,18L6,20.13a1,1,0,0,0,1.15.19l1.78-.89.63,1.89a1,1,0,0,0,.95.68h3a1,1,0,0,0,.95-.68l.63-1.89,1.78.89A1,1,0,0,0,18,20.13L20.13,18a1,1,0,0,0,.19-1.15l-.89-1.78,1.89-.63A1,1,0,0,0,22,13.5v-3A1,1,0,0,0,21.32,9.55ZM20,12.78l-1.2.4A2,2,0,0,0,17.64,16l.57,1.14-1.1,1.1L16,17.64a2,2,0,0,0-2.79,1.16l-.4,1.2H11.22l-.4-1.2A2,2,0,0,0,8,17.64l-1.14.57-1.1-1.1L6.36,16A2,2,0,0,0,5.2,13.18L4,12.78V11.22l1.2-.4A2,2,0,0,0,6.36,8L5.79,6.89l1.1-1.1L8,6.36A2,2,0,0,0,10.82,5.2l.4-1.2h1.56l.4,1.2A2,2,0,0,0,16,6.36l1.14-.57,1.1,1.1L17.64,8a2,2,0,0,0,1.16,2.79l1.2.4ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-sm">@lang('messages.setting')</span>
                        <span aria-hidden="true" class="ml-auto">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    @can('user-list')
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="setting">
                            <a href="{{ route('users.index') }}" role="menuitem"
                                class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                <span class="flex flex-row gap-1">
                                    <span aria-hidden="true">
                                        <svg fill="currentColor" class="w-5 h-5" viewBox="-2 -1.5 24 24"
                                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin"
                                            class="jam jam-users">
                                            <path
                                                d='M3.534 11.07a1 1 0 1 1 .733 1.86A3.579 3.579 0 0 0 2 16.26V18a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1.647a3.658 3.658 0 0 0-2.356-3.419 1 1 0 1 1 .712-1.868A5.658 5.658 0 0 1 14 16.353V18a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3v-1.74a5.579 5.579 0 0 1 3.534-5.19zM7 1a4 4 0 0 1 4 4v2a4 4 0 1 1-8 0V5a4 4 0 0 1 4-4zm0 2a2 2 0 0 0-2 2v2a2 2 0 1 0 4 0V5a2 2 0 0 0-2-2zm9 17a1 1 0 0 1 0-2h1a1 1 0 0 0 1-1v-1.838a3.387 3.387 0 0 0-2.316-3.213 1 1 0 1 1 .632-1.898A5.387 5.387 0 0 1 20 15.162V17a3 3 0 0 1-3 3h-1zM13 2a1 1 0 0 1 0-2 4 4 0 0 1 4 4v2a4 4 0 0 1-4 4 1 1 0 0 1 0-2 2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z' />
                                        </svg>
                                    </span>
                                    @lang('messages.user')
                                </span>
                            </a>
                        </div>
                    @endcan
                    @can('role-list')
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="setting">
                            <a href="{{ route('roles.index') }}" role="menuitem"
                                class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                <span class="flex flex-row gap-1">
                                    <span aria-hidden="true">
                                        <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 52 52" data-name="Layer 1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M38.3,27.2A11.4,11.4,0,1,0,49.7,38.6,11.46,11.46,0,0,0,38.3,27.2Zm2,12.4a2.39,2.39,0,0,1-.9-.2l-4.3,4.3a1.39,1.39,0,0,1-.9.4,1,1,0,0,1-.9-.4,1.39,1.39,0,0,1,0-1.9l4.3-4.3a2.92,2.92,0,0,1-.2-.9,3.47,3.47,0,0,1,3.4-3.8,2.39,2.39,0,0,1,.9.2c.2,0,.2.2.1.3l-2,1.9a.28.28,0,0,0,0,.5L41.1,37a.38.38,0,0,0,.6,0l1.9-1.9c.1-.1.4-.1.4.1a3.71,3.71,0,0,1,.2.9A3.57,3.57,0,0,1,40.3,39.6Z" />
                                            <circle cx="21.7" cy="14.9" r="12.9" />
                                            <path
                                                d="M25.2,49.8c2.2,0,1-1.5,1-1.5h0a15.44,15.44,0,0,1-3.4-9.7,15,15,0,0,1,1.4-6.4.77.77,0,0,1,.2-.3c.7-1.4-.7-1.5-.7-1.5h0a12.1,12.1,0,0,0-1.9-.1A19.69,19.69,0,0,0,2.4,47.1c0,1,.3,2.8,3.4,2.8H24.9C25.1,49.8,25.1,49.8,25.2,49.8Z" />
                                        </svg>
                                    </span>
                                    @lang('messages.role')
                                </span>
                            </a>
                        </div>
                    @endcan
                    @can('coa-list')
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="setting">
                            <a href="{{ route('coa.index') }}" role="menuitem"
                                class="block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                                <span class="flex flex-row gap-1">
                                    <span aria-hidden="true">
                                        <svg class="w-5 h-5" viewBox="0 0 1024 1024" fill="currentColor" class="icon"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M53.6 1023.2c-6.4 0-12.8-2.4-17.6-8-4.8-4.8-7.2-11.2-6.4-18.4L80 222.4c0.8-12.8 11.2-22.4 24-22.4h211.2v-3.2c0-52.8 20.8-101.6 57.6-139.2C410.4 21.6 459.2 0.8 512 0.8c108 0 196.8 88 196.8 196.8 0 0.8-0.8 1.6-0.8 2.4v0.8H920c12.8 0 23.2 9.6 24 22.4l49.6 768.8c0.8 2.4 0.8 4 0.8 6.4-0.8 13.6-11.2 24.8-24.8 24.8H53.6z m25.6-48H944l-46.4-726.4H708v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8s-44.8-20-44.8-44.8c0-14.4 7.2-27.2 20-36h0.8v-57.6H363.2v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8-24.8 0-44.8-20-44.8-44.8 0-14.4 7.2-27.2 20-36h0.8v-57.6H125.6l-46.4 726.4zM512 49.6c-81.6 0-148.8 66.4-148.8 148.8v3.2h298.4l-0.8-1.6v-1.6c0-82.4-67.2-148.8-148.8-148.8z"
                                                fill="" />
                                        </svg>
                                    </span>
                                    @lang('messages.chartofaccount')
                                </span>
                            </a>
                        </div>
                    @endcan
                </div>
            @endcan

        </nav>
    </div>
</header>
