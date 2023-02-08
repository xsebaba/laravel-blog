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
                    <a href="/user/avatar/{{$user->username}}" class="text-blue-500 mt-2">Change your avatar  </a>
                </li>
                <li>
                <span id="deletebutton" onclick="display()" class="text-red-400 hover:text-indigo-900 cursor-pointer">Delete your profile</span>
                    
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
    <div class="fixed right-1/3 left-1/3 top-1/2 bottom-1/2 content-center">
    <div id="confirm" style="display: none;"class="shadow-2xl border-solid border-2 border-red-600 max-w-sm max-h-fit p-1 bg-indigo-200 rounded-lg text-center">
        <div class=" mt-2"> Are you sure you want to delete your profile?</div>
            <div class="grid grid-cols-2 grid-rows-1 mb-10 mt-10">
                <div>
                    <form method="POST" id="form" action="/user/{{$user->username}}">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="bg-red-400 text-white rounded py-3 px-8 hover:bg-red-500"> Yes  </button>
                    </form>
                </div>
                <div>
                    <button onclick="document.getElementById('confirm').style.display='none'" class="bg-blue-400 text-white rounded py-3 px-8 hover:bg-blue-500">  No </button>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
    </x-panel> 


</x-layout>

<script>
    function display(){
            var confirmdiv = document.getElementById('confirm');
        if(confirmdiv.style.display === "none"){
            confirmdiv.style.display = "block";
        } else{
            confirmdiv.style.display = "none";
        }
    }
    function confirmDelete(){
        let result = confirm("Do you want to delete post?");
        if(result){
        document.getElementById('form').submit();
            }
        else{
            return false;
        }
    }
</script>