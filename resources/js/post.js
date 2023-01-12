import { deletePost } from "./ajax/delete-post";
import { updateBookmark } from "./ajax/bookmark";

const textArea = document.getElementById('textual-content');
const sendButton = document.getElementById('send-new-post');
const file = document.getElementById('file-upload');
const mediaContainer = document.getElementById('media-content');
const dropzone = document.getElementById('dropzone');

const updateBookmarkEvent = async e => {
    const result = await updateBookmark(e.target.postId);
    const el = e.target.lastElementChild;

    if (el) {
        el.innerHTML = result.data; 
    } else {
        e.target.parentNode.lastElementChild.innerHTML = result.data;
    }
}

const isFileOfType = (file, type) => {
    return file && file['type'].split('/')[0] === type;
}

const deletePostEvent = async e => {
    const result = await deletePost(e.target.postId);
    if (result.data > 0) {
        window.location.reload();
    }
}

const preventDefaults = (e) => {
    e.preventDefault();
    e.stopPropagation();
}

const handleDrop = (e) => {
    const dt = e.dataTransfer;
    const file = dt.files[0];
    handleFile(file);
}

const createDeleteButton = () => {
    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = 'Elimina';
    deleteButton.id = "delete-media";
    ["px-4", "py-2", "text-white", "font-bold", "font-quicksand", "rounded-xl", "bg-red-500", "mb-8", "hover:bg-red-700"]
        .forEach(c => deleteButton.classList.add(c));
    deleteButton.addEventListener('click', deleteMedia, false);
    dropzone.prepend(deleteButton);
}

const removeDeleteButton = () => {
    if (document.contains(document.getElementById('delete-media'))) {
        document.getElementById('delete-media').remove();
    }
}

const removeMedia = () => {
    if (document.contains(document.getElementById("post-new-video"))) {
        document.getElementById("post-new-video").remove();
    }

    if (document.contains(document.getElementById("post-new-image"))) {
        document.getElementById("post-new-image").remove();
    }
}

const deleteMedia = (e) => {
    e.preventDefault();
    if (document.contains(document.getElementById("post-new-image"))) {
        document.getElementById("post-new-image").remove();
    } else if (document.contains(document.getElementById("post-new-video"))) {
        document.getElementById("post-new-video").remove();
    }

    document.getElementById('delete-media').remove();
    sendButton.disabled = textArea.value === "";
    file.value = "";
}

const handleFile = (uploaded) => {
    removeDeleteButton();
    removeMedia();

    if (isFileOfType(uploaded, 'image')) {
        const image = document.createElement('img');
        image.id = "post-new-image";
        image.src = URL.createObjectURL(uploaded);
        image.alt = 'new post image preview';
        image.classList.add("rounded-md");
        image.classList.add("object-cover");
        mediaContainer.appendChild(image);
    } else if (isFileOfType(uploaded, 'video')) {
        const video = document.createElement('video');
        video.id = "post-new-video";
        video.controls = true;
        video.muted = true;
        video.autoplay = true;
        video.width = 640;
        video.height = 480;
        video.classList.add("rounded-xl");
        video.src = URL.createObjectURL(uploaded);
        mediaContainer.appendChild(video);
    } else {
        console.log('File non accettabile');
    }

    createDeleteButton();
    sendButton.disabled = false;
}

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropzone.addEventListener(eventName, preventDefaults, false);
})

dropzone.addEventListener('drop', handleDrop, false);

textArea.onkeyup = e => {
    sendButton.disabled = e.target.value === "" && file.files.length == 0;
}

file.onchange = e => {
    const [uploaded] = file.files;
    handleFile(uploaded);
}

Array.from(document.getElementsByClassName('delete-btn')).forEach(btn => {
    btn.postId = btn.lastElementChild.value;
    btn.addEventListener("click", deletePostEvent, false);
});

Array.from(document.getElementsByClassName('bookmark')).forEach(ith => {
    const button = ith.closest('.bookmark-btn');
    button.postId = ith.value;
    Array.from(button.children).forEach(c => c.postId = ith.value);
    button.addEventListener("click", updateBookmarkEvent, false);
});