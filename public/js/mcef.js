tinymce.init({
  selector: 'textarea',
  menubar: false,
  theme: 'modern',
  image_description: false,
  link_title: false,
  plugins: [
    'image','autolink link',
  ],
  toolbar: 'image | link ',
});