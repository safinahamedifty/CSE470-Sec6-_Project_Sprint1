<!DOCTYPE html>
       <html>
       <head>
           <title>User Dashboard</title>
           <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       </head>
       <body class="bg-gray-100 font-sans">
           <div class="min-h-screen flex">
               <aside class="w-64 bg-white shadow-lg">
                   <div class="p-6">
                       <h2 class="text-2xl font-bold text-gray-800">User Menu</h2>
                   </div>
                   <nav class="mt-6">
                       <a href="#" class="block px-6 py-2 text-gray-700 hover:bg-gray-200">Profile</a>
                       <a href="#" class="block px-6 py-2 text-gray-700 hover:bg-gray-200">Settings</a>
                       <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-6 py-2 text-gray-700 hover:bg-gray-200">Logout</a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                   </nav>
               </aside>
               <main class="flex-1 p-8">
                   <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}!</h1>
                   <p class="mt-4 text-gray-600">Your personalized dashboard is under construction. Check back soon!</p>
               </main>
           </div>
       </body>
       </html>