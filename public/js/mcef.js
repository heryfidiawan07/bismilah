tinymce.init({
  selector: '.comment',
  menubar: false,
  theme: 'modern',
  image_description: false,
  link_title: false,
  plugins: [
    'image','autolink link',
  ],
  toolbar: 'image | link ',
});