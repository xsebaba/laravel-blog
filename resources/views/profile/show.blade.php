<x-layout>
  <x-panel>
    <section class="py-8 max-w-lg mx-auto">
      <h1 class="text-xl font-bold mb-2">
        Check your profile {{$user->name}}
      </h1>
    
    <div class="flex">
        <aside class="w-48 m-4 flex-shrink-0">
            <h4 class="font-semibold mb-4"> Profile avatar </h4>
            <div class="m-2 w-24">
                <a href="/user/avatar/{{$user->username}}">
                    <img class="rounded-3xl" src="{{asset('storage/' . $user->avatar)}}" />
                </a>
            </div>
            <ul>
                <li>
                    <a href="/user/avatar/{{$user->username}}" class="{{ request()->is('user/avatar') ? 'text-blue-500' : '' }} mt-2">Change your avatar  </a>
                </li>
                <li>
                    <a href="/user/delete"> Delete your profile </a>
                </li>
            </ul>
        </aside>
        <main class=" flex-1 mt-10 lg:mt-10 space-y-6">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <h2 class="text-l font-medium">Check all your comments: </h2>
                        <table class="min-w-full">
                        @if(count($user->comments) > 0)
                            @foreach($user->comments as $comment)
                                <tbody>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$comment->body}}    
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="/posts/{{$comment->post->slug}}" class="text-blue-500 hover:text-indigo-900"> View post </a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <span id="deletebutton" class="text-blue-500">Post title: {{$comment->post->title}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <h3>No comments yet! </h3>
                        @endif
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    </section>
    </x-panel> 


</x-layout>

