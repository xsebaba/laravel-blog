<x-layout>
  <x-panel>
    <section class="py-8 max-w-lg mx-auto">
      <h1 class="text-xl font-bold mb-2">
        Change your avatar {{$user->name}}
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
                    <a href="/user/avatar/{{$user->username}}" class="text-blue-600 mt-2">Change your avatar  </a>
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
                        <h2 class="text-l font-medium mb-6">Change your avatar </h2>
                            <form method="POST" action="/user/avatar/{{$user->username}}" enctype="multipart/form-data">
                                @csrf 
                                @method('patch')
                                <div class="mb-6">
                                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">
                                        Choose new avatar from your disk
                                    </label>
                                    <input class="border border-gray-400 p-2 w-full" type="file" name="avatar" id="avatar" value="{{$user->avatar ? $user->avatar : ''}}" >
                                    
                                        @error('avatar')
                                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                                        @enderror
                                </div>
                                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                                Submit
                                </button>   
                            </form>
                        </div>       
                    </div>
                </div>
            </div>
        </main>
    </div>

    </section>
    </x-panel> 


</x-layout>

