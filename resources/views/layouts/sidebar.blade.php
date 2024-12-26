<!-- Sidebar -->
<div id="hs-offcanvas-example" class="hs-overlay rounded-lg [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-20 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
   <div class="px-6">
     <h2>Welcome!</h2>
     <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 dark:text-white" aria-label="Brand">{{ Auth::user()->name }}</a>
   </div>
   <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
     <ul class="space-y-1.5">
       <li>
         <a href="{{ route('dashboard') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-blue-600 dark:bg-neutral-700 dark:text-white' : 'text-gray-700 dark:text-neutral-400' }}">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house">
             <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/>
             <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
           </svg> Dashboard
         </a>
       </li>
 
       <li>
         <a href="{{ route('orders.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->routeIs('orders.*') ? 'bg-gray-100 text-blue-600 dark:bg-neutral-700 dark:text-white' : 'text-gray-700 dark:text-neutral-400' }}">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-baggage-claim">
             <path d="M22 18H6a2 2 0 0 1-2-2V7a2 2 0 0 0-2-2"/>
             <path d="M17 14V4a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v10"/>
             <rect width="13" height="8" x="8" y="6" rx="1"/>
             <circle cx="18" cy="20" r="2"/>
             <circle cx="9" cy="20" r="2"/>
           </svg> Products
         </a>
       </li>
 
       <!-- Repeat the same pattern for other menu items -->
       <li>
         <a href="{{ route('transactions.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->routeIs('transactions.*') ? 'bg-gray-100 text-blue-600 dark:bg-neutral-700 dark:text-white' : 'text-gray-700 dark:text-neutral-400' }}">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hand-coins">
             <path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"/>
             <path d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"/>
             <path d="m2 16 6 6"/>
             <circle cx="16" cy="9" r="2.9"/>
             <circle cx="6" cy="5" r="3"/>
           </svg> Transactions
         </a>
       </li>
       @if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
       <li>
         <a href="{{ route('cars.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->routeIs('cars.*') ? 'bg-gray-100 text-blue-600 dark:bg-neutral-700 dark:text-white' : 'text-gray-700 dark:text-neutral-400' }}">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car">
             <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
             <circle cx="7" cy="17" r="2"/>
             <path d="M9 17h6"/>
             <circle cx="17" cy="17" r="2"/>
           </svg> Cars
         </a>
       </li>
       @if (Auth::user()->role == 'admin')
       <li>
         <a href="{{ route('users.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->routeIs('users.*') ? 'bg-gray-100 text-blue-600 dark:bg-neutral-700 dark:text-white' : 'text-gray-700 dark:text-neutral-400' }}">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
             <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
             <circle cx="9" cy="7" r="4"/>
             <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
             <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
           </svg>
           Users
         </a>
       </li>
       @endif
       <li>
         <a href="{{ route('returns.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->routeIs('returns.*') ? 'bg-gray-100 text-blue-600 dark:bg-neutral-700 dark:text-white' : 'text-gray-700 dark:text-neutral-400' }}">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-restore">
             <rect width="20" height="5" x="2" y="3" rx="1"/>
             <path d="M4 8v11a2 2 0 0 0 2 2h2"/>
             <path d="M20 8v11a2 2 0 0 1-2 2h-2"/>
             <path d="m9 15 3-3 3 3"/>
             <path d="M12 12v9"/>
           </svg>
           Returns
         </a>
       </li>
       
       <li>
         <a href="{{ route('payments.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->routeIs('payments.*') ? 'bg-gray-100 text-blue-600 dark:bg-neutral-700 dark:text-white' : 'text-gray-700 dark:text-neutral-400' }}">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card">
             <rect width="20" height="14" x="2" y="5" rx="2"/>
             <line x1="2" x2="22" y1="10" y2="10"/>
           </svg>
           Payments
         </a>
       </li>
         @endif
       
       <hr class="my-2 border-gray-200 dark:border-gray-700">
       
       <li>
         <a href="{{ route('profile.edit') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->routeIs('profile.edit') ? 'bg-gray-100 text-blue-600 dark:bg-neutral-700 dark:text-white' : 'text-gray-700 dark:text-neutral-400' }}">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings">
             <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/>
             <circle cx="12" cy="12" r="3"/>
           </svg>
           Settings
         </a>
       </li>
       
       <li>
         <!-- Assuming you have a logout route -->
         <form method="POST" action="{{ route('logout') }}">
           @csrf
           <button type="submit" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
               <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
               <polyline points="16 17 21 12 16 7"/>
               <line x1="21" x2="9" y1="12" y2="12"/>
             </svg>
             Logout
           </button>
         </form>
       </li>
     </ul>
   </nav>
 </div>
 <!-- End Sidebar -->

<script src="../scripts/js/open-modals-on-init.js"></script>