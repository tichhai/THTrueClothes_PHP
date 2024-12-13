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

document.getElementById("gFile").addEventListener("change", function (event) {
  const files = event.target.files;
  const galleryPreview = document.getElementById("galleryPreview");

  Array.from(files).forEach((file) => {
    if (file.type.startsWith("image/")) {
      const reader = new FileReader();

      reader.onload = function (e) {
        const imgElement = document.createElement("img");
        imgElement.src = e.target.result;
        imgElement.alt = file.name;
        imgElement.classList.add("uploaded-img");

        const divElement = document.createElement("div");
        divElement.classList.add("item");
        divElement.appendChild(imgElement);

        galleryPreview.appendChild(divElement);
      };

      reader.readAsDataURL(file);
    }
  });
});
