<div class="pt-16  mx-auto flex">
        <main class="flex-1 p-4">
            <div class="flex flex-col lg:flex-row gap-4 mb-6">
                <div class="flex-1 bg-indigo-100 border border-indigo-200 rounded-xl p-6 animate-fade-in">
                    <h2 class="text-4xl md:text-5xl text-blue-900">
                        Welcome <br><strong>{{ Auth::user()->name }}</strong>
                    </h2>
                    <span id="datetime" class="cursor-default inline-block mt-8 px-8 py-2 rounded-full text-xl font-bold text-white bg-indigo-800">
                      
                    </span>
                </div>

                <div class="flex-1 bg-blue-100 border border-blue-200 rounded-xl p-6 animate-fade-in">
                    <h2 class="text-4xl md:text-5xl text-blue-900">
                        Your Role <br><strong>{{ Auth::user()->role }}</strong>
                    </h2>
                    <div class="inline-block mt-8 px-8 py-2 rounded-full text-xl font-bold text-white bg-blue-800">
                    </div>
                </div>
            </div>

            <div class="m-6">
                <div class="flex flex-wrap -mx-6">
                    <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                        <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-slate-100">
                            <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $ucount }}</h4>
                                <div class="text-gray-500">Total Users</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                        <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-slate-100">
                            <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                                <svg class="h-8 w-8 text-white" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#ffffff;} </style> <g> <path class="st0" d="M145.764,98.011c27.058,0,49.002-21.943,49.002-49.009C194.766,21.935,172.822,0,145.764,0 c-27.066,0-49.009,21.935-49.009,49.002C96.755,76.068,118.698,98.011,145.764,98.011z"></path> <circle class="st0" cx="110.089" cy="377.876" r="48.646"></circle> <path class="st0" d="M110.321,450.209c-33.874-0.248-61.543,27-61.799,60.874L171.195,512 C171.442,478.126,144.195,450.466,110.321,450.209z"></path> <circle class="st0" cx="271.065" cy="377.876" r="48.646"></circle> <path class="st0" d="M271.288,450.209c-33.866-0.248-61.544,27-61.792,60.874L332.17,512 C332.418,478.126,305.162,450.466,271.288,450.209z"></path> <circle class="st0" cx="432.033" cy="377.876" r="48.646"></circle> <path class="st0" d="M432.255,450.209c-33.866-0.248-61.535,27-61.782,60.874L493.138,512 C493.393,478.126,466.129,450.466,432.255,450.209z"></path> <path class="st0" d="M272.66,235.671h-53.513v-39.657c0.264-35.212-24.332-64.79-57.363-72.143l-6.089,18.87h-19.87l-6.072-18.837 c-32.602,7.287-57.115,36.187-57.371,71.011v40.756H18.861v33.635H272.66V235.671z M135.825,153.597h19.87v61.114l-9.932,8.592 l-9.939-8.592V153.597z"></path> </g> </g></svg>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $ucount }}</h4>
                                <div class="text-gray-500">Total Class</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                        <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-slate-100">
                            <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                <svg class="h-8 w-8 text-white" fill="#ffffff" viewBox="-3.5 0 19 19" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M10.05 3.828a1.112 1.112 0 0 1 1.11 1.108v10.562a1.112 1.112 0 0 1-1.11 1.108h-8.1a1.112 1.112 0 0 1-1.11-1.108V4.936a1.112 1.112 0 0 1 1.11-1.108h.415v1.108h-.414l-.002.002v10.558l.002.002h8.098l.002-.002V4.938l-.002-.002h-.414V3.828h.416zm-.98 4.076H2.82v1.108h6.25zm0 2.337H2.82v1.108h6.25zm0 2.337H2.82v1.108h6.25zm-.543-8.935v1.25a.476.476 0 0 1-.475.476H3.948a.476.476 0 0 1-.475-.475v-1.25a.476.476 0 0 1 .475-.476h.697V1.87a.476.476 0 0 1 .475-.475h1.76a.476.476 0 0 1 .475.475v1.3h.697a.476.476 0 0 1 .475.474zM6.55 2.67a.554.554 0 1 0-.554.554.554.554 0 0 0 .554-.554z"></path></g></svg>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $ucount }}</h4>
                                <div class="text-gray-500">Total Activity</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<script>
    // Mobile menu functionality
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.overlay');

    function toggleMobileMenu() {
        sidebar.classList.toggle('translate-x-0');
        overlay.classList.toggle('hidden');
        setTimeout(() => overlay.classList.toggle('opacity-0'), 0);
        document.body.style.overflow = sidebar.classList.contains('translate-x-0') ? 'hidden' : '';
    }

    mobileMenuButton.addEventListener('click', toggleMobileMenu);
    overlay.addEventListener('click', toggleMobileMenu);

    // Close mobile menu on window resize if open
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024 && sidebar.classList.contains('translate-x-0')) {
            toggleMobileMenu();
        }
    });

    // Notification animation
    const notificationIcon = document.querySelector('.material-icons-outlined:nth-child(2)');
    setInterval(() => {
        notificationIcon.classList.add('scale-110');
        setTimeout(() => notificationIcon.classList.remove('scale-110'), 200);
    }, 5000);
</script>

<script>
    function updateDateTime() {
        const now = new Date();
        const formatted = now.toLocaleString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
        document.getElementById('datetime').innerText = formatted;
    }

    setInterval(updateDateTime, 1000); 
    updateDateTime(); 
</script>