<input type="checkbox" id="new-post" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3">
    <label for="new-post" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section class="flex flex-col gap-8">
        <header>
            <h3 class="text-xl font-bold text-white font-montserrat">Crea un post ✍🏻</h3>
        </header>
        <form action="/posts/store" method="post" enctype="multipart/form-data" class="w-full flex flex-col items-center gap-4">
            @csrf
            <textarea id="textual-content" name="textual_content" class="w-full h-32 rounded-xl text-white font-xl font-quicksand px-4 py-4" placeholder="Scrivi qualcosa..."></textarea>
            @error('textual_content')
                <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
            @enderror
            <textarea id="tags" name="tags" class="w-full h-16 rounded-xl text-white font-xl font-quicksand px-4 py-4" placeholder="Aggiungi tag (esempio: #dogs)"></textarea>
            <fieldset id="media-content"></fieldset>
            <fieldset id="dropzone" class="w-full">
                <label
                    class="flex justify-center w-full h-32 px-4 transition border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">
                    <span class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <span class="font-medium text-white">
                            Allega immagine o video, oppure
                            <span class="text-white underline">seleziona</span>
                        </span>
                    </span>
                    <div>
                        <input type="file" id="file-upload" accept="image/*, video/*" name="media" class="hidden" />
                    </div>
                </label>
                @error('media')
                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                @enderror
            </fieldset>
            <input id="send-new-post" type="submit" name="create" value="Crea" disabled
                class="btn w-1/2 bg-lavanda hover:bg-dark-lavanda text-white font-montserrat font-bold border-none mt-4" />
        </form>
    </section>
  </div>
</div>