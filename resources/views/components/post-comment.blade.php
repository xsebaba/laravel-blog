
@props(['comment'])
<article class="flex bg-gray-100 space-x-4">
    <x-panel>
        <div class="flex-shrink-0">
            <img src="{{asset('storage/' . $comment->author->avatar)}}" alt="as" class="rounded-xl" width="60" height="60" >
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{$comment->author->username;}}</h3>
            </header>
            <p class="text-xs">Posted 
                <time> {{$comment->created_at->diffForHumans()}} </time>
            </p>
            <p>
                {{$comment->body}}
            </p>

        </div>
    </x-panel>
</article>
