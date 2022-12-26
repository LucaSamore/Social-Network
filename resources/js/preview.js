const image = document.getElementById('input-preview');
const preview = document.getElementById('preview');

image.onchange = e => {
    const [file] = image.files;

    if (file) {
        preview.src = URL.createObjectURL(file);
    }
}