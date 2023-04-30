<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="grid grid-cols-5 gap-4">
                        @foreach($books as $book)
                            <div class="bg-white shadow p-3">
                                <a href="{{route('books.show',$book->slug)}}">
                                    <img class="rounded"
                                         src="{{$book->cover}}"
                                         alt="image"/>
                                </a>

                                <div>
                                    <p class="text-gray-400">{{$book->author}}</p>
                                    <a href="{{route('books.show',$book->slug)}}"
                                       class="font-semibold text-lg">{{$book->title}}</a>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    {!! $books->links() !!}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
