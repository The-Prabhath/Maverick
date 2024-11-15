const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () =>{
        nav.classList.add('active');
    })
}

if (close) {
    close.addEventListener('click', () =>{
        nav.classList.remove('active');
    })
}


document.addEventListener("DOMContentLoaded", function() {
    const signUpButton = document.getElementById('signUpButton');
    const signInButton = document.getElementById('signInButton');
    const signInForm = document.getElementById('sigIn'); 
    const signUpForm = document.getElementById('signUp');

    signUpButton.addEventListener('click', function() {
        signInForm.style.display = "none";
        signUpForm.style.display = "block";
    });

    signInButton.addEventListener('click', function() {
        signInForm.style.display = "block";
        signUpForm.style.display = "none"; 
    });
});