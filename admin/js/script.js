const form = document.querySelector(".formsearch");
const btnDisplay = document.querySelector(".buttondisplaysearch");
// console.log(form);
// console.log(btnDisplay);
// const form = document.querySelectorAll(".formsearch");
// const btnDisplay = document.querySelectorAll(".buttondisplaysearch");
// console.log(Array.from(form)[0]);
// console.log(Array.from(btnDisplay));

const disPlayForm = btnDisplay.addEventListener("click", function (e) {
    // console.log(form.classList);
    if (form.classList.contains('nondisplay')) {
        form.classList.remove('nondisplay');
    } else {
        form.classList.add('nondisplay');
    }
});
