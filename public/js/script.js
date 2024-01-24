const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confPasswordInput = form.querySelector('input[name="password_repeat"]');


function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsEqual(password, password_repeat) {
    return password === password_repeat;
}

function markValidation(elementInput, condition) {
    !condition ? elementInput.classList.add('no-valid') : elementInput.classList.remove('no-valid');
}

emailInput.addEventListener('keyup', function() {
    setTimeout(function () {
        markValidation(emailInput, isEmail(emailInput.value))
    }, 1000);
});

confPasswordInput.addEventListener('keyup', function() {
    markValidation(confPasswordInput, arePasswordsEqual(confPasswordInput.previousElementSibling.value ,confPasswordInput.value))
});