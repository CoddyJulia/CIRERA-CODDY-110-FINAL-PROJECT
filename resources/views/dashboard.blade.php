<x-app-layout>      
    @if(Session::has('success'))
        <div id="flash-message" class="bg-green-500 text-white px-4 py-2 my-4 rounded-md w-64 mx-10">
            {{ Session::get('success') }}
        </div>
        <script>
            // Automatically hide the flash message after 5 seconds
            setTimeout(function() {
                document.getElementById('flash-message').style.display = 'none';
            }, 5000);
        </script>
    @endif      
    <div class="main-container h-auto mx-[2.5rem] flex gap-4 mt-[5rem]">   
        <div class="grid grid-cols-1 md:w-[70rem] gap-2 ">     
            @foreach ($posts as $post)
                <div class="card">
                    <a  href="{{ route('viewpost', ['id' => $post->id ]) }}" class=" flex flex-col items-start bg-white border-4 border-gray-200 rounded-lg shadow md:flex-row mb-3  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('storage/' . $post->image) }}" alt="">
                        <div class="flex w-full flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->user->name }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
                            <div class="flex w-full justify-between mt-[3.5rem]">
                                <h1 class="text-gray-300">Author: {{ $post->author }}</h1>
                                <h1 class="text-gray-300">{{ $post->created_at->format('F d, Y') }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach   
            {{ $posts->links() }}       
        </div>     
        <ul class="hidden md:block space-y-4 text-left text-gray-500 dark:text-gray-400">
           
        </ul>
    </div>
    
</x-app-layout>





<style>
    #card {
        height: 170px;
        width: 300px;
    }
</style>

