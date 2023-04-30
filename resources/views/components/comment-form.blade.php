@auth
    <form class="mb-6 max-w-xl" method="POST" action="{{route('books.comment',$book)}}">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="text-red-400 text-sm">* {{$error}}</div>
            @endforeach
        @endif

        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="4"
                      name="body"
                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                      placeholder="Write a comment..." required></textarea>
        </div>
        <button type="submit"
                class="bg-blue-500 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Post comment
        </button>
    </form>
@endauth

@guest
    <p class="mb-5">Please <a class="text-blue-400" href="{{route('login')}}">login</a> to post a comment!</p>
@endguest
