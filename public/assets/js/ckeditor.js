$(function () {
    CKEDITOR.replace('post_body', {
        height: '200',
        filebrowserUploadMethod: 'form',
        filebrowserUploadUrl: '/upload-image',
        filebrowserImageUploadUrl: '/upload-image'
    });
});
