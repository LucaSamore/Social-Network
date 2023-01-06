// ! TODO Fix this ****

const postIds = Array.from(document.getElementsByClassName('post-update-hidden')).map(input => input.value);

postIds.forEach(postId => {
    const textArea = document.getElementById(`textual-content-${postId}`);
    const sendButton = document.getElementById(`update-post-${postId}`);
    const file = document.getElementById(`file-upload-${postId}`);
    const mediaContainer = document.getElementById(`media-content-${postId}`);
    const oldMedia = document.getElementById(`media-${postId}`);
    const dropzone = document.getElementById(`dropzone-${postId}`);

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
        deleteButton.id = `delete-media-${postId}`;
        ["px-4", "py-2", "text-white", "font-bold", "font-quicksand", "rounded-xl", "bg-red-500", "mb-8", "hover:bg-red-700"]
            .forEach(c => deleteButton.classList.add(c));
        deleteButton.addEventListener('click', deleteMedia, false);
        dropzone.prepend(deleteButton);
    }

    const removeDeleteButton = () => {
        if (document.contains(document.getElementById(`delete-media-${postId}`))) {
            document.getElementById(`delete-media-${postId}`).remove();
        }
    }

    const removeMedia = () => {
        if (document.contains(document.getElementById(`post-new-video-${postId}`))) {
            document.getElementById(`post-new-video-${postId}`).remove();
        }

        if (document.contains(document.getElementById(`post-new-image-${postId}`))) {
            document.getElementById(`post-new-image-${postId}`).remove();
        }
    }

    const deleteMedia = (e) => {
        e.preventDefault();

        if (document.contains(document.getElementById(`post-new-image-${postId}`))) {
            document.getElementById(`post-new-image-${postId}`).remove();
        } else if (document.contains(document.getElementById(`post-new-video-${postId}`))) {
            document.getElementById(`post-new-video-${postId}`).remove();
        }

        document.getElementById(`delete-media-${postId}`).remove();
        sendButton.disabled = textArea.value === "";
        file.value = "";
    }

    const createPreview = (uploaded) => {
        if (isFileOfType(uploaded, 'image')) {
            const image = document.createElement('img');
            image.id = `post-new-image-${postId}`;
            image.src = URL.createObjectURL(uploaded);
            image.alt = 'new post image preview';
            image.classList.add("rounded-md");
            image.classList.add("object-cover");
            mediaContainer.appendChild(image);
        } else if (isFileOfType(uploaded, 'video')) {
            const video = document.createElement('video');
            video.id = `post-new-video-${postId}`;
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
    }

    const handleFile = (uploaded) => {
        removeDeleteButton();
        removeMedia();
        createPreview(uploaded);
        sendButton.disabled = false;
    }

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
    })

    dropzone.addEventListener('drop', handleDrop, false);

    textArea.onkeyup = e => {
        sendButton.disabled = (e.target.value === "" && file.files.length === 0) || 
            (textArea.oldValue === e.target.value);
    }

    file.onchange = e => {
        const [uploaded] = file.files;
        handleFile(uploaded);
    }
});

const isFileOfType = (file, type) => {
    return file && file['type'].split('/')[0] === type;
}