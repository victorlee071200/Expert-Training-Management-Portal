<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('css')



</head>

<body class="">

    <style>
        /* This example part of kwd-dashboard see https://kamona-wd.github.io/kwd-dashboard/ */
    /* So here we will write some classes to simulate dark mode and some of tailwind css config in our project */
    :root {
      --light: #E1E2F0;
      --dark: #202033;
      --darker: #1e1e30;

      --color-red: #dc2626;
      --color-green: #16a34a;
      --color-indigo: #2563eb;
      --color-cyan: #0891b2;
      --color-teal: #0d9488;
      --color-fuchsia: #c026d3;
      --color-orange: #ea580c;
      --color-yellow: #ca8a04;
      --color-violet: #7c3aed;
    }

    [x-cloak] { display: none; }

    .dark .dark\:text-light {
      color: var(--light);
    }

    .dark .dark\:bg-dark {
      background-color: var(--dark);
    }

    .dark .dark\:bg-darker {
      background-color: var(--darker);
    }

    .dark .dark\:text-gray-300 {
      color: #D1D5DB;
    }

    .dark .dark\:text-indigo-500 {
      color: #6366F1;
    }

    .dark .dark\:text-indigo-100 {
      color: #E0E7FF;
    }

    .dark .dark\:hover\:text-light:hover {
      color: var(--light);
    }

    .dark .dark\:border-indigo-800 {
      border-color: #3730A3;
    }

    .dark .dark\:border-indigo-700 {
      border-color: #4338CA;
    }

    .dark .dark\:bg-indigo-600 {
        background-color: #4F46E5;
    }

    .dark .dark\:hover\:bg-indigo-600:hover {
      background-color: #4F46E5;
    }

    .hover\:overflow-y-auto:hover {
        overflow-y: auto;
    }

    </style>

    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" :class="{ 'dark': isDark}">
          <!--  -->
          <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->
            <div
              x-ref="loading"
              class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-opacity-90 bg-indigo-800"
            >
              Loading.....
            </div>

            <!-- Sidebar -->
            <aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-indigo-800 dark:bg-darker md:block">
              <div class="flex flex-col h-full">
                <!-- Sidebar links -->
                <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">

                  <!-- Dashboards links -->
                  <div x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                    <a
                      href="#"
                      @click="$event.preventDefault(); open = !open"
                      class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                      :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}"
                      role="button"
                      aria-haspopup="true"
                      :aria-expanded="(open || isActive) ? 'true' : 'false'"
                    >
                      <span class="ml-2 text-sm"> Dashboards </span>
                      <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg
                          class="w-4 h-4 transition-transform transform"
                          :class="{ 'rotate-180': open }"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                      <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                      <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                      >
                        Default
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Project Mangement
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        E-Commerce
                      </a>
                    </div>
                  </div>

                  <!-- Components links -->
                  <div x-data="{ isActive: false, open: false }">
                    <!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
                    <a
                      href="#"
                      @click="$event.preventDefault(); open = !open"
                      class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                      :class="{ 'bg-indigo-100 dark:bg-indigo-600': isActive || open }"
                      role="button"
                      aria-haspopup="true"
                      :aria-expanded="(open || isActive) ? 'true' : 'false'"
                    >
                      <span class="ml-2 text-sm"> Components </span>
                      <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                          class="w-4 h-4 transition-transform transform"
                          :class="{ 'rotate-180': open }"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                      <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                      <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                      >
                        Alerts
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                      >
                        Buttons
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Cards
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Dropdowns
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Forms
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Lists
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Modals
                      </a>
                    </div>
                  </div>

                  <!-- Pages links -->
                  <div x-data="{ isActive: false, open: false }">
                    <!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
                    <a
                      href="#"
                      @click="$event.preventDefault(); open = !open"
                      class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                      :class="{ 'bg-indigo-100 dark:bg-indigo-600': isActive || open }"
                      role="button"
                      aria-haspopup="true"
                      :aria-expanded="(open || isActive) ? 'true' : 'false'"
                    >
                      <span class="ml-2 text-sm"> Pages </span>
                      <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                          class="w-4 h-4 transition-transform transform"
                          :class="{ 'rotate-180': open }"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                      <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                      <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                      >
                        Alerts
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                      >
                        Buttons
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Cards
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Dropdowns
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Forms
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Lists
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Modals
                      </a>
                    </div>
                  </div>

                  <!-- Authentication links -->
                  <div x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                    <a
                      href="#"
                      @click="$event.preventDefault(); open = !open"
                      class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                      :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}"
                      role="button"
                      aria-haspopup="true"
                      :aria-expanded="(open || isActive) ? 'true' : 'false'"
                    >
                      <span class="ml-2 text-sm"> Authentication </span>
                      <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                          class="w-4 h-4 transition-transform transform"
                          :class="{ 'rotate-180': open }"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                      <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                      <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Register
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Login
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                      >
                        Password Reset
                      </a>
                    </div>
                  </div>
                </nav>
              </div>
            </aside>

            {{-- Mobile Version --}}
            <div class="flex flex-col flex-1 min-h-screen overflow-x-hidden overflow-y-auto">
              <!-- Navbar -->
              <header class="relative bg-white dark:bg-darker">
                <div class="flex items-center justify-between p-2 border-b dark:border-indigo-800">
                  <!-- Mobile menu button -->
                  <button
                    @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
                    class="p-1 text-indigo-400 transition-colors duration-200 rounded-md bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark md:hidden focus:outline-none focus:ring"
                  >
                    <span class="sr-only">Open main manu</span>
                    <span aria-hidden="true">
                      <svg
                        class="w-8 h-8"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                    </span>
                  </button>

                  <!-- Brand -->
                  <a
                    href="#"
                    class="inline-block text-2xl font-bold tracking-wider text-indigo-700 uppercase dark:text-light"
                  >
                    EMTP
                  </a>

                  <!-- Mobile sub menu button -->
                  <button
                    @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
                    class="p-1 text-indigo-400 transition-colors duration-200 rounded-md bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark md:hidden focus:outline-none focus:ring"
                  >
                    <span class="sr-only">Open sub manu</span>
                    <span aria-hidden="true">
                      <svg
                        class="w-8 h-8"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                        />
                      </svg>
                    </span>
                  </button>

                  <!-- Desktop Right buttons -->
                  <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                    <!-- Toggle dark theme button -->
                    <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                      <div
                        class="w-12 h-6 transition bg-indigo-100 rounded-full outline-none dark:bg-indigo-400"
                      ></div>
                      <div
                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                        :class="{ 'translate-x-0 -translate-y-px  bg-white text-indigo-700': !isDark, 'translate-x-6 text-indigo-100 bg-indigo-800': isDark }"
                      >
                        <svg
                          x-show="!isDark"
                          class="w-4 h-4"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                          />
                        </svg>
                        <svg
                          x-show="isDark"
                          class="w-4 h-4"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                          />
                        </svg>
                      </div>
                    </button>

                    <!-- Notification button -->
                    <button
                      @click="openNotificationsPanel"
                      class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
                    >
                      <span class="sr-only">Open Notification panel</span>
                      <svg
                        class="w-7 h-7"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                        />
                      </svg>
                    </button>

                    <!-- Search button -->
                    <button
                      @click="openSearchPanel"
                      class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
                    >
                      <span class="sr-only">Open search panel</span>
                      <svg
                        class="w-7 h-7"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                      </svg>
                    </button>

                    <!-- User avatar button -->
                    <div class="relative" x-data="{ open: false }">
                      <button
                        @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
                        type="button"
                        aria-haspopup="true"
                        :aria-expanded="open ? 'true' : 'false'"
                        class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100"
                      >
                        <span class="sr-only">User menu</span>

                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" />
                      </button>

                      <!-- User dropdown menu -->
                      <div
                        x-show="open"
                        x-ref="userMenu"
                        x-transition:enter="transition-all transform ease-out"
                        x-transition:enter-start="translate-y-1/2 opacity-0"
                        x-transition:enter-end="translate-y-0 opacity-100"
                        x-transition:leave="transition-all transform ease-in"
                        x-transition:leave-start="translate-y-0 opacity-100"
                        x-transition:leave-end="translate-y-1/2 opacity-0"
                        @click.away="open = false"
                        @keydown.escape="open = false"
                        class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                        tabindex="-1"
                        role="menu"
                        aria-orientation="vertical"
                        aria-label="User menu"
                      >

                        <a
                        role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600"
                        href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </a>
                        <form
                        method="POST"
                        action="{{ route('logout') }}"
                        role="menuitem"

                        >
                        @csrf
                        <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                        </a>



                        </form>
                      </div>
                    </div>
                  </nav>

                  <!-- Mobile sub menu -->
                  <nav
                    x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
                    x-transition:enter-start="-translate-y-full opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="-translate-y-full opacity-0"
                    x-show="isMobileSubMenuOpen"
                    @click.away="isMobileSubMenuOpen = false"
                    class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
                    aria-label="Secondary"
                  >
                    <div class="space-x-2">
                      <!-- Toggle dark theme button -->
                      <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                        <div
                          class="w-12 h-6 transition bg-indigo-100 rounded-full outline-none dark:bg-indigo-400"
                        ></div>
                        <div
                          class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm"
                          :class="{ 'translate-x-0 -translate-y-px  bg-white text-indigo-700': !isDark, 'translate-x-6 text-indigo-100 bg-indigo-800': isDark }"
                        >
                          <svg
                            x-show="!isDark"
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                            />
                          </svg>
                          <svg
                            x-show="isDark"
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                            />
                          </svg>
                        </div>
                      </button>

                      <!-- Notification button -->
                      <button
                        @click="openNotificationsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                        class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
                      >
                        <span class="sr-only">Open notifications panel</span>
                        <svg
                          class="w-7 h-7"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          aria-hidden="true"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                          />
                        </svg>
                      </button>

                      <!-- Search button -->
                      <button
                        @click="openSearchPanel(); $nextTick(() => { $refs.searchInput.focus(); setTimeout(() => {isMobileSubMenuOpen= false}, 100) })"
                        class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
                      >
                        <span class="sr-only">Open search panel</span>
                        <svg
                          class="w-7 h-7"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          aria-hidden="true"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                          />
                        </svg>
                      </button>
                    </div>

                    <!-- User avatar button -->
                    <div class="relative ml-auto" x-data="{ open: false }">
                      <button
                        @click="open = !open"
                        type="button"
                        aria-haspopup="true"
                        :aria-expanded="open ? 'true' : 'false'"
                        class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100"
                      >
                        <span class="sr-only">User menu</span>
                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" />
                      </button>

                      <!-- User dropdown menu -->
                      <div
                        x-show="open"
                        x-transition:enter="transition-all transform ease-out"
                        x-transition:enter-start="translate-y-1/2 opacity-0"
                        x-transition:enter-end="translate-y-0 opacity-100"
                        x-transition:leave="transition-all transform ease-in"
                        x-transition:leave-start="translate-y-0 opacity-100"
                        x-transition:leave-end="translate-y-1/2 opacity-0"
                        @click.away="open = false"
                        class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
                        role="menu"
                        aria-orientation="vertical"
                        aria-label="User menu"
                      >

                      <a
                        role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600"
                        href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </a>
                        <form
                        method="POST"
                        action="{{ route('logout') }}"
                        role="menuitem"

                        >
                        @csrf
                        <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                        </a>
                      </div>
                    </div>
                  </nav>
                </div>


                <!-- Mobile main menu -->
                <div
                  class="border-b md:hidden dark:border-indigo-800"
                  x-show="isMobileMainMenuOpen"
                  @click.away="isMobileMainMenuOpen = false"
                >
                  <nav aria-label="Main" class="px-2 py-4 space-y-2">
                    <!-- Dashboards links -->
                    <div x-data="{ isActive: false, open: false}">
                      <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                      <a
                        href="#"
                        @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                        :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}"
                        role="button"
                        aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'"
                      >
                        <span class="ml-2 text-sm"> Dashboards </span>
                        <span class="ml-auto" aria-hidden="true">
                          <!-- active class 'rotate-180' -->
                          <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                        </span>
                      </a>
                      <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                        >
                          Default
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Project Mangement
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          E-Commerce
                        </a>
                      </div>
                    </div>

                    {{-- Pages Link --}}
                    <div x-data="{ isActive: false, open: false }">
                        <!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
                        <a
                          href="#"
                          @click="$event.preventDefault(); open = !open"
                          class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                          :class="{ 'bg-indigo-100 dark:bg-indigo-600': isActive || open }"
                          role="button"
                          aria-haspopup="true"
                          :aria-expanded="(open || isActive) ? 'true' : 'false'"
                        >
                          <span class="ml-2 text-sm"> Pages </span>
                          <span aria-hidden="true" class="ml-auto">
                            <!-- active class 'rotate-180' -->
                            <svg
                              class="w-4 h-4 transition-transform transform"
                              :class="{ 'rotate-180': open }"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                          </span>
                        </a>
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                          <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                          <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                          <a
                            href="#"
                            role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                          >
                            Alerts
                          </a>
                          <a
                            href="#"
                            role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                          >
                            Buttons
                          </a>
                          <a
                            href="#"
                            role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                          >
                            Cards
                          </a>
                          <a
                            href="#"
                            role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                          >
                            Dropdowns
                          </a>
                          <a
                            href="#"
                            role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                          >
                            Forms
                          </a>
                          <a
                            href="#"
                            role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                          >
                            Lists
                          </a>
                          <a
                            href="#"
                            role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                          >
                            Modals
                          </a>
                        </div>
                      </div>



                    {{-- <!-- Components links --> --}}
                    <div x-data="{ isActive: false, open: false }">
                      <!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
                      <a
                        href="#"
                        @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                        :class="{ 'bg-indigo-100 dark:bg-indigo-600': isActive || open }"
                        role="button"
                        aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'"
                      >
                        <span class="ml-2 text-sm"> Components </span>
                        <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
                          <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                        </span>
                      </a>
                      <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                        >
                          Alerts
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                        >
                          Buttons
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Cards
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Dropdowns
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Forms
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Lists
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Modals
                        </a>
                      </div>
                    </div>

                    <!-- Authentication links -->
                    <div x-data="{ isActive: false, open: false}">
                      <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                      <a
                        href="#"
                        @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
                        :class="{'bg-indigo-100 dark:bg-indigo-600': isActive || open}"
                        role="button"
                        aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'"
                      >
                        <span class="ml-2 text-sm"> Authentication </span>
                        <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
                          <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                        </span>
                      </a>
                      <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Register (soon)
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Login (soon)
                        </a>
                        <a
                          href="#"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Password Reset (soon)
                        </a>
                      </div>
                    </div>
                  </nav>
                </div>
              </header>

              <!-- Main content -->
              <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
                <!-- Main content header -->
                <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
                  <h1 class="text-2xl font-semibold whitespace-nowrap">
                      @yield('content-header-title')
                  </h1>
                </div>

                <!-- Start Content Card -->
                <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
                    @yield('top-content-card')
                </div>

                <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
                <h3 class="mt-6 text-xl">
                    @yield('table-title')
                </h3>
                <div class="flex flex-col mt-6">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                      <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                          @yield('container')

                      </div>
                    </div>
                  </div>
                </div>
              </main>

              <!-- Main footer -->
            <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
                @yield('footer')
            </footer>

            </div>

            <!-- Panels -->

            <!-- Settings Panel -->
            <!-- Backdrop -->
            <div
              x-transition:enter="transition duration-300 ease-in-out"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition duration-300 ease-in-out"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              x-show="isSettingsPanelOpen"
              @click="isSettingsPanelOpen = false"
              class="fixed inset-0 z-10 bg-indigo-800"
              style="opacity: 0.5"
              aria-hidden="true"
            ></div>
            <!-- Panel -->
            <section
              x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
              x-transition:enter-start="translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="translate-x-full"
              x-ref="settingsPanel"
              tabindex="-1"
              x-show="isSettingsPanelOpen"
              @keydown.escape="isSettingsPanelOpen = false"
              class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
              aria-labelledby="settinsPanelLabel"
            >
              <div class="absolute left-0 p-2 transform -translate-x-full">
                <!-- Close button -->
                <button
                  @click="isSettingsPanelOpen = false"
                  class="p-2 text-white rounded-md focus:outline-none focus:ring"
                >
                  <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </section>

            <!-- Notification panel -->
            <!-- Backdrop -->
            <div
              x-transition:enter="transition duration-300 ease-in-out"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition duration-300 ease-in-out"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              x-show="isNotificationsPanelOpen"
              @click="isNotificationsPanelOpen = false"
              class="fixed inset-0 z-10 bg-indigo-800 bg-opacity-25"
              style="opacity: .5;"
              aria-hidden="true"
            ></div>
            <!-- Panel -->
            <section
              x-cloak
              x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
              x-transition:enter-start="-translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="-translate-x-full"
              x-ref="notificationsPanel"
              x-show="isNotificationsPanelOpen"
              @keydown.escape="isNotificationsPanelOpen = false"
              tabindex="-1"
              aria-labelledby="notificationPanelLabel"
              class="fixed inset-y-0 z-20 w-full max-w-xs bg-white dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
            >
              <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
                <!-- Panel header -->
                <div class="flex-shrink-0">
                  <div class="flex items-center justify-between px-4 pt-4 border-b dark:border-indigo-800">
                    <h2 id="notificationPanelLabel" class="pb-4 font-semibold">Notifications</h2>
                    <div class="space-x-2">
                      <button
                        @click.prevent="activeTabe = 'action'"
                        class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                        :class="{'border-indigo-700 dark:border-indigo-600': activeTabe == 'action', 'border-transparent': activeTabe != 'action'}"
                      >
                        Action
                      </button>
                      <button
                        @click.prevent="activeTabe = 'user'"
                        class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                        :class="{'border-indigo-700 dark:border-indigo-600': activeTabe == 'user', 'border-transparent': activeTabe != 'user'}"
                      >
                        User
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Panel content (tabs) -->
                <div class="flex-1 pt-4 overflow-y-hidden hover:overflow-y-auto">
                  <!-- Action tab -->
                  <div class="space-y-4" x-show.transition.in="activeTabe == 'action'">
                    <a href="#" class="block">
                      <div class="flex px-4 space-x-4">
                        <div class="relative flex-shrink-0">
                          <span
                            class="z-10 inline-block p-2 overflow-visible text-indigo-500 rounded-full bg-indigo-50 dark:bg-indigo-800"
                          >
                            <svg
                              class="w-7 h-7"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                              />
                            </svg>
                          </span>
                          <div class="absolute h-24 p-px -mt-3 -ml-px bg-indigo-50 left-1/2 dark:bg-indigo-800"></div>
                        </div>
                        <div class="flex-1 overflow-hidden">
                          <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                            New project "KWD Dashboard" created
                          </h5>
                          <p class="text-sm font-normal text-gray-400 truncate dark:text-indigo-400">
                            Looks like there might be a new theme soon
                          </p>
                          <span class="text-sm font-normal text-gray-400 dark:text-indigo-500"> 9h ago </span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- User tab -->
                  <div class="space-y-4" x-show.transition.in="activeTabe == 'user'">
                    <a href="#" class="block">
                      <div class="flex px-4 space-x-4">
                        <div class="relative flex-shrink-0">
                          <span class="relative z-10 inline-block overflow-visible rounded-ful">
                            <img
                              class="object-cover rounded-full w-9 h-9"
                              src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                              alt="Ahmed kamel"
                            />
                          </span>
                          <div class="absolute h-24 p-px -mt-3 -ml-px bg-indigo-50 left-1/2 dark:bg-indigo-800"></div>
                        </div>
                        <div class="flex-1 overflow-hidden">
                          <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                          <p class="text-sm font-normal text-gray-400 truncate dark:text-indigo-400">
                            Shared new project "K-WD Dashboard"
                          </p>
                          <span class="text-sm font-normal text-gray-400 dark:text-indigo-500"> 1d ago </span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
            </section>

            <!-- Search panel -->
            <!-- Backdrop -->
            <div
              x-transition:enter="transition duration-300 ease-in-out"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition duration-300 ease-in-out"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              x-show="isSearchPanelOpen"
              @click="isSearchPanelOpen = false"
              class="fixed inset-0 z-10 bg-indigo-800 bg-opacity-25"
              style="opacity: .5;"
              aria-hidden="ture"
            ></div>
            <!-- Panel -->
            <section
              x-cloak
              x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
              x-transition:enter-start="-translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="-translate-x-full"
              x-show="isSearchPanelOpen"
              @keydown.escape="isSearchPanelOpen = false"
              class="fixed inset-y-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
            >

              <h2 class="sr-only">Search panel</h2>
              <!-- Panel content -->
              <div class="flex flex-col h-screen">
                <!-- Panel header (Search input) -->
                <div
                  class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-indigo-800 dark:focus-within:text-light focus-within:text-gray-700"
                >
                  <span class="absolute inset-y-0 inline-flex items-center px-4">
                    <svg
                      class="w-5 h-5"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </span>
                  <input
                    x-ref="searchInput"
                    type="text"
                    class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
                    placeholder="Search..."
                  />
                </div>

                <!-- Panel content (Search result) -->
                <div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden font-sans h hover:overflow-y-auto">
                  <h3 class="py-2 text-sm font-semibold text-gray-600 dark:text-light">History</h3>
                  <a href="#" class="flex space-x-4">
                    <div class="flex-shrink-0">
                      <img class="w-10 h-10 rounded-lg" src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4" alt="Post cover" />
                    </div>
                    <div class="flex-1 max-w-xs overflow-hidden">
                      <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Header</h4>
                      <p class="text-sm font-normal text-gray-400 truncate dark:text-indigo-400">
                        Lorem ipsum dolor, sit amet consectetur.
                      </p>
                      <span class="text-sm font-normal text-gray-400 dark:text-indigo-500"> Post </span>
                    </div>
                  </a>
                </div>
              </div>
            </section>
          </div>
        </div>

    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.6.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    <script>
          const setup = () => {
            const getTheme = () => {
              if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
              }
              return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
              window.localStorage.setItem('dark', value)
            }

            return {
              loading: true,
              isDark: getTheme(),
              toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
              },
              setLightTheme() {
                this.isDark = false
                setTheme(this.isDark)
              },
              setDarkTheme() {
                this.isDark = true
                setTheme(this.isDark)
              },
              isSettingsPanelOpen: false,
              openSettingsPanel() {
                this.isSettingsPanelOpen = true
                this.$nextTick(() => {
                  this.$refs.settingsPanel.focus()
                })
              },
              isNotificationsPanelOpen: false,
              openNotificationsPanel() {
                this.isNotificationsPanelOpen = true
                this.$nextTick(() => {
                  this.$refs.notificationsPanel.focus()
                })
              },
              isSearchPanelOpen: false,
              openSearchPanel() {
                this.isSearchPanelOpen = true
                this.$nextTick(() => {
                  this.$refs.searchInput.focus()
                })
              },
              isMobileSubMenuOpen: false,
              openMobileSubMenu() {
                this.isMobileSubMenuOpen = true
                this.$nextTick(() => {
                  this.$refs.mobileSubMenu.focus()
                })
              },
              isMobileMainMenuOpen: false,
              openMobileMainMenu() {
                this.isMobileMainMenuOpen = true
                this.$nextTick(() => {
                  this.$refs.mobileMainMenu.focus()
                })
              },
            }
          }
    </script>

</body>

</html>



