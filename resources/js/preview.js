const image = document.getElementById('input-preview');
const preview = document.getElementById('preview');
const deletePreviewButton = document.getElementById('delete-preview');
const dropzone = document.getElementById('dropzone-profile');

const removePreview = e => {
    e.preventDefault();
    image.value = "";
    preview.classList.add('invisible');
    deletePreviewButton.classList.add('invisible');
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

const handleFile = (uploaded) => {
    if (uploaded) {
        preview.classList.remove('invisible');
        preview.src = URL.createObjectURL(uploaded);
        deletePreviewButton.classList.remove('invisible');
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(uploaded);
        image.files = dataTransfer.files;
    }
}

image.onchange = e => {
    const [file] = image.files;
    handleFile(file);
}

deletePreviewButton.addEventListener("click", removePreview, false);

if (dropzone) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
    })
    
    dropzone.addEventListener('drop', handleDrop, false);
}
