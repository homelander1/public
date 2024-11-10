// Open Follow Us modal
const openFollowUsModal = document.getElementById("openFollowUsModal");
if (openFollowUsModal) {
    openFollowUsModal.onclick = function () {
        document.getElementById("myModal").style.display = "block";
    };
}

// Close Follow Us modal on 'X'
const closeFollowUsModal = document.querySelectorAll(".modal .close")[0];
if (closeFollowUsModal) {
    closeFollowUsModal.onclick = function () {
        document.getElementById("myModal").style.display = "none";
    };
}

// Open Log In modal
const openLoginModal = document.getElementById("openLoginModal");
if (openLoginModal) {
    openLoginModal.onclick = function () {
        document.getElementById("myModalLogin").style.display = "block";
    };
}

// Switch to Sign Up modal from Log In
const switchToSignUp = document.getElementById("switchToSignUp");
if (switchToSignUp) {
    switchToSignUp.onclick = function (event) {
        event.preventDefault();
        document.getElementById("myModalLogin").style.display = "none";
        document.getElementById("myModalSignup").style.display = "block";
    };
}

// Switch to Log In modal from Sign Up
const switchToLogin = document.getElementById("switchToLogin");
if (switchToLogin) {
    switchToLogin.onclick = function (event) {
        event.preventDefault();
        document.getElementById("myModalSignup").style.display = "none";
        document.getElementById("myModalLogin").style.display = "block";
    };
}

// Close both modals when clicking on 'X'
document.querySelectorAll(".modalLog .close").forEach(closeBtn => {
    closeBtn.onclick = function () {
        document.getElementById("myModalLogin").style.display = "none";
        document.getElementById("myModalSignup").style.display = "none";
    };
});

// Close modal when clicking outside
window.onclick = function (event) {
    let modalFollowUs = document.getElementById("myModal");
    let modalLogin = document.getElementById("myModalLogin");
    const modalSignup = document.getElementById("myModalSignup");

    if (event.target == modalFollowUs) {
        modalFollowUs.style.display = "none";
    }
    if (event.target == modalLogin) {
        modalLogin.style.display = "none";
    }
    if (event.target == modalSignup) {
        modalSignup.style.display = "none";
    }
};

// top section - scroll down button
window.onload = function () {
    const scrollButton = document.getElementById("scrollButton");
    if (scrollButton) {
        scrollButton.addEventListener("click", function () {
            window.scrollBy({
                top: 1300,
                behavior: 'smooth'
            });
        });
    }
};

// Additional check for logged-in user and hide login/signup buttons if already logged in
const loggedIn = false; // Replace with actual logged-in status check (e.g., sessionStorage or cookie)
if (loggedIn) {
    const loginSignupButtons = document.querySelectorAll(".login-signup-buttons"); // Replace with actual class
    if (loginSignupButtons) {
        loginSignupButtons.forEach(button => {
            button.style.display = "none"; // Hide login/signup buttons after successful login
        });
    }
    const socialMediaButtons = document.querySelectorAll(".social-media-buttons"); // Replace with actual class
    if (socialMediaButtons) {
        socialMediaButtons.forEach(button => {
            button.style.display = "block"; // Show social media buttons
        });
    }
}
