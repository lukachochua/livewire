<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Livewire</title>
        <script src="https://unpkg.com/taggle/src/taggle.js" defer></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        @livewireStyles


        <style>
            .taggle_list {
                padding: 0;
                margin: 0;
                line-height: 2.5;
                width: 100%;
            }

            .taggle_input {
                border: none;
                outline: none;
                font-size: 16px;
                font-weight: 300;
            }

            .taggle_list li {
                display: inline;
                vertical-align: baseline;
                white-space: nowrap;
                font-weight: 500;
                margin-bottom: 5px;
            }

            .taggle_list .taggle {
                margin-right: 8px;
                background: #E2E1DF;
                padding: 5px 10px;
                border-radius: 3px;
                position: relative;
                cursor: pointer;
                transition: all .3s;
                -webkit-animation-duration: 1s;
                        animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                        animation-fill-mode: both;
            }

            .taggle_list .taggle_hot {
                background: #cac8c4;
            }

            .taggle_list .taggle .close {
                font-size: 1.1rem;
                position: absolute;
                top: 10px;
                right: 3px;
                text-decoration: none;
                padding: 0;
                line-height: 0.5;
                color: #ccc;
                color: rgba(0, 0, 0, 0.2);
                padding-bottom: 4px;
                display: inline-block;
                opacity: 0;
                pointer-events: none;
                border: 0;
                background: none;
                cursor: pointer;
            }

            .taggle_list .taggle:hover {
                padding: 5px;
                padding-right: 15px;
                background: #ccc;
                transition: all .3s;
            }

            .taggle_list .taggle:hover > .close {
                opacity: 1;
                pointer-events: auto;
            }

            .taggle_list .taggle .close:hover {
                color: #990033;
            }

            .taggle_placeholder {
                position: absolute;
                color: #CCC;
                top: 24px;
                left: 16px;
                transition: opacity, .25s;
                -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                        user-select: none;
            }

            .taggle_input {
                padding: 8px;
                padding-left: 0;
                margin-top: -5px;
                background: none;
                max-width: 100%;
            }

            .taggle_sizer {
                padding: 0;
                margin: 0;
                position: absolute;
                top: -500px;
                z-index: -1;
                visibility: hidden;
            }
        </style>
    </head>
    <body>
        <header>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="https://www.facebook.com/people/Chardin-Art-Gallery-გალერეა-შარდენი/100064921832597/" class="flex items-center">
                        <img src="https://scontent.ftbs3-1.fna.fbcdn.net/v/t39.30808-6/308801484_480666380774086_9170226647817621849_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=JXzr_ZPb4BcAX8Gq_zt&_nc_ht=scontent.ftbs3-1.fna&oh=00_AT-GmpyZZVX_m_ySQHIu4SW7IKpAUVvy9cqhxq34ECI-pQ&oe=634C7EFC" class="mr-3 h-6 sm:h-9" alt="logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Chardin Art Gallery</span>
                    </a>
                    <div class="flex items-center lg:order-2">
                        <a href="#" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                        <a href="#" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</a>
                        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="{{ route('search-dropdown')}}" 
                                class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 
                                lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent
                                 dark:border-gray-700">Search Dropown</a>
                            </li>
                            <li>
                                <a href="{{ route('users-table')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Users Table</a>
                            </li>
                            <li>
                                <a href="/posts" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white 
                                dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Posts</a>
                            </li>

                            <li>
                                <a href="{{ route('contact.show')}}" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Contact Form</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


    
        
        @livewireScripts
    </body> 
</html>
