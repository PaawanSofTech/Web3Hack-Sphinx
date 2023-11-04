document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();
        const vid = loginForm.elements.vid.value;
        const aadhar = loginForm.elements.aadhar.value;
        const password = loginForm.elements.password.value;
        const name = loginForm.elements.name.value;

        // You should implement server-side validation and database checking here
        // For this example, I'll just show a generic error message
        if (vid !== "" && aadhar !== "" && password !== "" && name !== "") {
            // Simulate a successful login by redirecting to profile_user_1.php
            window.location.href = "profile_user_1.php";
        } else {
            alert("Invalid login credentials. Please try again.");
        }
    });
});
