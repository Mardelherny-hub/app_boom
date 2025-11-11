import './bootstrap';

// Alpine.js
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';

Alpine.plugin(collapse);
Alpine.plugin(focus);

window.Alpine = Alpine;
Alpine.start();

// Trix Editor
import 'trix';
import 'trix/dist/trix.css';

// Configurar upload de imágenes en Trix
document.addEventListener('trix-attachment-add', function(event) {
    if (event.attachment.file) {
        uploadFileAttachment(event.attachment);
    }
});

function uploadFileAttachment(attachment) {
    const file = attachment.file;
    const formData = new FormData();
    formData.append('file', file);
    
    // Obtener el token CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    fetch('/admin/posts/upload-image', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        attachment.setAttributes({
            url: data.url,
            href: data.url
        });
    })
    .catch(error => {
        console.error('Error uploading image:', error);
    });
}

// Prevenir que Trix abra otros tipos de archivos adjuntos
document.addEventListener('trix-file-accept', function(e) {
    const acceptedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp', 'image/gif'];
    const file = e.file;
    
    if (!acceptedTypes.includes(file.type)) {
        e.preventDefault();
        alert('Solo se permiten imágenes (JPEG, PNG, JPG, WEBP, GIF)');
    }
});