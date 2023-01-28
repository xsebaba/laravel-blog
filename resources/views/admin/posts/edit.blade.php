<x-layout>
  <x-panel>
    <section class="py-8 max-w-md mx-auto">
      <h1 class="text-xl font-bold mb-2">
        Edit your post: {{$post->title}} 
      </h1>

      <main class="mt-10 lg:mt-10 space-y-6">
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
          @csrf 
          @method('PATCH')
            <div class="mb-6">
              <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                  Title 
              </label>
              <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{old('title')? old('title') : $post->title }}" required>
                  @error('title')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                  @enderror
            </div>
            <div class="mb-6">
              <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                  slug 
              </label>
              <input class="border border-gray-400 p-2 w-full" type="slug" name="slug" id="slug" value="{{old('title')? old('slug') : $post->slug }}" required>
                  @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                  @enderror
            </div>

            <div class="mb-6">
              <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                  Excerpt 
              </label>
              <textarea class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt" required>{{old('excerpt')? old('excerpt') : $post->excerpt }}</textarea>
                  @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                  @enderror
            </div>

            <div class="mb-6">
              <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                  body 
              </label>
              <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" id="body"  required> {{old('body')? old('body') : $post->body }} </textarea>
                  @error('body')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                  @enderror
            </div>

            <div class="mb-6">
            <img src="{{asset('storage/' . $post->thumbnail)}}" alt="" class="rounded-xl">
              <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                Thumbnail
              </label>
              <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail" value="{{$post->thumbnail ? $post->thumbnail : ''}}" >
              
                  @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                  @enderror
            </div>

  

            <div class="mb-6">
              <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                  Category 
              </label>
              <select name="category_id" id="category_id">
                @php
                  $categories = \App\Models\Category::all();
                @endphp
                @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{$post->category_id==$category->id ? 'selected' : ''}}>{{ ucwords($category->name)}}</option>
                @endforeach
              </select>

                  @error('category')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                  @enderror
            </div>
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>    
        </form>
      </main>
    </section>
  </x-panel>
</x-layout>
