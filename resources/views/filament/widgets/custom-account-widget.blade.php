<div class="fi-account-widget col-span-full w-full">
    <x-filament-widgets::widget>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 rounded-2xl border border-gray-100 dark:border-white/5 p-6 shadow-sm">

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">

                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <img
                            src="{{ filament()->getUserAvatarUrl(auth()->user()) }}"
                            class="w-14 h-14 rounded-full ring-2 ring-primary-500/20 object-cover shadow-sm"
                        >
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                            مرحباً، {{ auth()->user()->name }}
                        </h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">
                            {{ now()->locale('ar')->isoFormat('dddd، D MMMM YYYY') }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden lg:flex flex-col items-end px-4 border-l border-gray-100 dark:border-white/10">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest my-1">عنوان الدخول</span>
                        <span class="text-xs tracking-wider font-bold text-gray-600 dark:text-gray-400">{{ request()->ip() }}</span>
                    </div>

                    <form action="{{ filament()->getLogoutUrl() }}" method="post" class="m-0">
                        @csrf
                        <button
                            type="submit"
                            class="w-40 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-gray-700 dark:text-gray-200 transition bg-gray-50 dark:bg-white/5 hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-500/10 dark:hover:text-red-400 rounded-xl border border-gray-200/50 dark:border-white/10"
                        >
                            <span>خروج</span>
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="absolute right-0 top-0 -translate-y-12 translate-x-12 transform opacity-[0.03] dark:opacity-[0.05] pointer-events-none">
                <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2z"/></svg>
            </div>
        </div>
    </x-filament-widgets::widget>
</div>
