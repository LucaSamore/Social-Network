<input type="checkbox" id="post/{{ $post->id }}/update" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3">
    <label for="post/{{ $post->id }}/update" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section class="flex flex-col gap-8">
        <header>
            <h3 class="text-xl font-bold text-white font-montserrat">Modifica post ✍🏻</h3>
        </header>
        <div class="w-full flex flex-col items-center gap-4">
            @csrf
            <textarea id="textual-content-{{$post->id}}" name="textual_content" onfocus="this.oldValue = this.value;"
                class="w-full h-32 rounded-xl text-white font-xl font-quicksand px-4 py-4" placeholder="Scrivi qualcosa...">{{ $post->textual_content }}</textarea>
            @error('textual_content')
                <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
            @enderror
            <textarea id="tags-{{$post->id}}" name="tags" onfocus="this.oldValue = this.value;" 
                class="w-full h-16 rounded-xl text-white font-xl font-quicksand px-4 py-4">{{ implode(" ", $post->tags->map->name->toArray()) }}</textarea>
            @error('tags')
                <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
            @enderror
            <input type="hidden" class="post-update-hidden" name="post_id" value="{{ $post->id }}">
            <button id="update-post-{{$post->id}}" name="create" value="Aggiorna" disabled
                class="btn w-1/2 bg-lavanda hover:bg-dark-lavanda text-white font-montserrat normal-case font-bold border-none mt-4">
                Aggiorna
            </button>
        </div>
    </section>
  </div>
</div>