const image = document.getElementById('input-preview');
const preview = document.getElementById('preview');
const deletePreviewButton = document.getElementById('delete-preview');

const removePreview = e => {
    e.preventDefault();
    image.value = "";
    preview.classList.add('invisible');
    deletePreviewButton.classList.add('invisible');
}

image.onchange = e => {
    const [file] = image.files;

    if (file) {
        preview.classList.remove('invisible');
        preview.src = URL.createObjectURL(file);
        deletePreviewButton.classList.remove('invisible');
    }
}

deletePreviewButton.addEventListener("click", removePreview, false);
