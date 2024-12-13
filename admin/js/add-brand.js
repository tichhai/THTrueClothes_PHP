const fileInput = document.getElementById("myFile");
fileInput.addEventListener("change", function (event) {
  const fileInput = event.target;
  const preview = document.getElementById("previewImage");
  const previewContainer = document.getElementById("imgpreview");

  if (fileInput.files && fileInput.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      previewContainer.style.display = "block";
    };
    reader.readAsDataURL(fileInput.files[0]);
  }
});
