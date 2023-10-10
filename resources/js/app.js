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

// Variyan
const formContainer = document.getElementById("form-container");
const addButton = document.getElementById("add-fields");
let inputIndex = 2; // Starting index for additional input fields

addButton.addEventListener("click", () => {
    // Create a new div for the input and image upload fields
    const fieldDiv = document.createElement("div");
    fieldDiv.classList.add("mb-4", "flex", "gap-5");

    // Create a new input field 1
    const inputField1 = document.createElement("input");
    inputField1.type = "text";
    inputField1.id = `input${inputIndex}`;
    inputField1.name = `variant_name_0${inputIndex}`;
    inputField1.classList.add("w-96", "px-4", "py-2", "border", "rounded-md");
    inputField1.placeholder = "Variant Name";

    // Create a new input field 2
    const inputField2 = document.createElement("input");
    inputField2.type = "number";
    inputField2.id = `input${inputIndex}`;
    inputField2.name = `variant_name_0${inputIndex}`;
    inputField2.classList.add("w-96", "px-4", "py-2", "border", "rounded-md");
    inputField2.placeholder = "$ 0.00";

    // Create a "Remove" button
    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.classList.add(
        "bg-red-500",
        "text-white",
        "px-2",
        "py-1",
        "rounded-md",
        "hover:bg-red-600"
    );
    removeButton.addEventListener("click", () => {
        formContainer.removeChild(fieldDiv); // Remove the field when the "Remove" button is clicked
    });

    // Append the label, input, and image upload fields to the div
    fieldDiv.appendChild(inputField1);
    fieldDiv.appendChild(inputField2);
    fieldDiv.appendChild(removeButton);

    // Append the div to the form container
    formContainer.appendChild(fieldDiv);

    // Increment the input index
    inputIndex++;
});
