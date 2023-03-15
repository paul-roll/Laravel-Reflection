import './bootstrap';

window.previewImage = function (event) {
    
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image img");
        imagePreviewElement.src = imageSrc;
    }
};