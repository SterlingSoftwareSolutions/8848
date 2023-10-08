import "./bootstrap";

 function decrement(e) {
     const btn = e.target.parentNode.parentElement.querySelector(
         'button[data-action="decrement"]'
     );
     const target = btn.nextElementSibling;
     let value = Number(target.value);
     value--;
     target.value = value;
 }

 function increment(e) {
     const btn = e.target.parentNode.parentElement.querySelector(
         'button[data-action="decrement"]'
     );
     const target = btn.nextElementSibling;
     let value = Number(target.value);
     value++;
     target.value = value;
 }

 const decrementButtons = document.querySelectorAll(
     `button[data-action="decrement"]`
 );

 const incrementButtons = document.querySelectorAll(
     `button[data-action="increment"]`
 );

 decrementButtons.forEach((btn) => {
     btn.addEventListener("click", decrement);
 });

 incrementButtons.forEach((btn) => {
     btn.addEventListener("click", increment);
 });

//  Image Upload part in add product
  const uploadInput = document.getElementById("upload");
  const filenameLabel = document.getElementById("filename");
  const imagePreview = document.getElementById("image-preview");

  // Check if the event listener has been added before
  let isEventListenerAdded = false;

  uploadInput.addEventListener("change", (event) => {
      const file = event.target.files[0];

      if (file) {
          filenameLabel.textContent = file.name;

          const reader = new FileReader();
          reader.onload = (e) => {
              imagePreview.innerHTML = `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
              imagePreview.classList.remove(
                  "border-dashed",
                  "border-2",
                  "border-gray-400"
              );

              // Add event listener for image preview only once
              if (!isEventListenerAdded) {
                  imagePreview.addEventListener("click", () => {
                      uploadInput.click();
                  });

                  isEventListenerAdded = true;
              }
          };
          reader.readAsDataURL(file);
      } else {
          filenameLabel.textContent = "";
          imagePreview.innerHTML = `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
          imagePreview.classList.add(
              "border-dashed",
              "border-2",
              "border-gray-400"
          );

          // Remove the event listener when there's no image
          imagePreview.removeEventListener("click", () => {
              uploadInput.click();
          });

          isEventListenerAdded = false;
      }
  });

  uploadInput.addEventListener("click", (event) => {
      event.stopPropagation();
  });