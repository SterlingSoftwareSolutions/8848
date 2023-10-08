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

//   add subcategory firlsd using input
const formContainer = document.getElementById("form-container");
const addButton = document.getElementById("add-fields");
let inputIndex = 2; // Starting index for additional input fields

addButton.addEventListener("click", () => {
    // Create a new div for the input and image upload fields
    const fieldDiv = document.createElement("div");
    fieldDiv.classList.add("mb-4");

    // Create a new image upload field
    const imageInput = document.createElement("input");
    imageInput.type = "file";
    imageInput.classList.add(
        "bg-gray-50",
        "border",
        "border-gray-300",
        "text-gray-900",
        "text-sm",
        "rounded-lg",
        "focus:ring-blue-500",
        "focus:border-blue-500",
        "block",
        "w-full",
        "p-2.5"
    );

    // Create a new input field
    const inputField = document.createElement("input");
    inputField.type = "text";
    inputField.classList.add(
        "mt-5",
        "bg-gray-50",
        "border",
        "border-gray-300",
        "text-gray-900",
        "text-sm",
        "rounded-lg",
        "focus:ring-blue-500",
        "focus:border-blue-500",
        "block",
        "w-full",
        "p-2.5"
    );
    inputField.placeholder = "Enter something...";

    // Create a remove button
    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.classList.add(
        "mt-5",
        "bg-red-500",
        "text-white",
        "px-2",
        "py-1",
        "hover:bg-red-600"
    );
    removeButton.addEventListener("click", () => {
        // Remove the entire field when the remove button is clicked
        formContainer.removeChild(fieldDiv);
    });

    // Append the input and image upload fields to the div

    fieldDiv.appendChild(imageInput);
    fieldDiv.appendChild(inputField);
    fieldDiv.appendChild(removeButton);

    // Append the div to the form container
    formContainer.appendChild(fieldDiv);

    // Increment the input index
    inputIndex++;
});
