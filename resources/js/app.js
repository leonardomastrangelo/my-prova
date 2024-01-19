import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const btns = document.querySelectorAll(".btn-danger");
btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        // preventing to send form
        e.preventDefault();

        // take title from attribute in modal
        const dataTitle = btn.getAttribute("data-item-title");

        // take modal
        const modal = document.getElementById("deleteModal");
        // create new bs modal
        const bootstrapModal = new bootstrap.Modal(modal);

        // show the modal
        bootstrapModal.show();

        // take and set title
        const title = modal.querySelector("#modal-item-title");
        title.textContent = dataTitle;

        // take from modal the final delete btn
        const btnDelete = document.getElementById("modal_delete_btn");
        // send the actual form
        btnDelete.addEventListener("click", (e) => {
            btn.parentElement.submit();
        });
    });
});

const sidebar = document.getElementById("sidebar");
const mainContent = document.querySelector("#main-content");
const btnForSideMinimize = document.querySelector(".fa-circle-chevron-left");
const btnForSideExpand = document.querySelector(".fa-circle-chevron-right");
const left = document.querySelector(".left");
const right = document.querySelector(".right");
btnForSideMinimize.addEventListener("click", () => {
    // toggle sidebar
    sidebar.classList.toggle("d-none");
    // hide btnForSideMinimize
    left.classList.add("d-none");
    // show btnForSideExpand
    right.classList.remove("d-none");
    // making 100% width of main-content
    mainContent.classList.remove("wd-90");
    mainContent.classList.add("wd-100");
});
btnForSideExpand.addEventListener("click", () => {
    // toggle sidebar
    document.querySelector("#sidebar").classList.toggle("d-none");
    // hide btnForSideExpand
    right.classList.add("d-none");
    // show btnForSideMinimize
    left.classList.remove("d-none");
    mainContent.classList.remove("wd-100");
    mainContent.classList.add("wd-90");
});

const previewImage = document.getElementById("image");
previewImage.addEventListener("change", (e) => {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(previewImage.files[0]);
    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
});
