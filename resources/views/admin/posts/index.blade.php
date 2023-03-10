<x-layout>
<x-panel>
    <section class="py-8 max-w-lg mx-auto">
      <h1 class="text-xl font-bold mb-2">
        Manage all your posts
      </h1>
    
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            
            <x-admin-aside />

        </aside>
        <main class=" flex-1 mt-10 lg:mt-10 space-y-6">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                        @foreach($posts as $post)
                            <tbody>
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/posts/{{$post->slug}}">{{$post->title}} </a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs landing-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Published </span>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <a href="/admin/posts/{{$post->slug}}/edit" class="text-blue-500 hover:text-indigo-900"> Edit </a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        
                                      
                                        <span id="deletebutton" onclick="display()" class="text-red-400 hover:text-indigo-900 cursor-pointer">Delete</span>
                                       
                                    </td>
                                
                                </tr>
                            </tbody>
                        @endforeach
                        </table>    
                    </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="fixed right-1/3 left-1/3 top-1/2 bottom-1/2 content-center">
        <div id="confirm" style="display: none;"class="shadow-2xl border-solid border-2 border-red-600 max-w-sm max-h-fit p-1 bg-indigo-200 rounded-lg text-center">
            <div class=" mt-2"> Do you want to delete the post {{$post->title}}?</div>
                <div class="grid grid-cols-2 grid-rows-1 mb-10 mt-10">
                    <div>
                        <form method="POST" id="form" action="/admin/posts/{{$post->id}}">
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
