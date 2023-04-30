<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="flex">
                        <div class="mr-5">
                            <img src="{{$book->cover}}" alt="cover">
                        </div>

                        <div class="bg-white shadow w-full p-3 ">
                            <div class="mb-6">
                                <p class="text-gray-400">{{$book->author}}</p>
                                <p class="text-2xl font-bold">{{$book->title}}</p>

                                <div class="flex items-center">
                                    @foreach(range(1,5) as $rating)
                                        @if($rating <= $book->rating)
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First
                                                    star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @else
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                 fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <title>Fifth star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endif

                                    @endforeach

                                    <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">{{$book->rating}}
                                        out of 5</p>
                                </div>
                            </div>

                            <div>
                                {!! $book->description !!}
                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-5">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments ({{$book->comments_count}})</h2>
                </div>

                @include('components.comment-form')

                @foreach($book->comments as $comment)
                    @include('components.comment')
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>
