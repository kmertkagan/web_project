tinymce.init({
    selector: "textarea",
    plugins:
      "advlist anchor autosave autolink charmap code codesample directionality emoticons help image insertdatetime link lists media nonbreaking pagebreak save searchreplace table visualblocks visualchars wordcount",
    toolbar:
      "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat",
    height: "500px",
    width:"1000px",
    language:"tr",
    spellchecker_language: "tr",
    spellchecker_active: false,
    skin: "oxide-dark",
    content_css: "dark"
  });