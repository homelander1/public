// Open Follow Us modal
document.getElementById("openFollowUsModal").onclick = function () {
    document.getElementById("myModal").style.display = "block";
};



// Close Follow Us modal on 'X'
document.querySelectorAll(".modal .close")[0].onclick = function () {
    document.getElementById("myModal").style.display = "none";
};

// Open Log In modal
document.getElementById("openLoginModal").onclick = function () {
    document.getElementById("myModalLogin").style.display = "block";
};

// Switch to Sign Up modal from Log In
document.getElementById("switchToSignUp").onclick = function (event) {
    event.preventDefault();
    document.getElementById("myModalLogin").style.display = "none";
    document.getElementById("myModalSignup").style.display = "block";
};

// Switch to Log In modal from Sign Up
document.getElementById("switchToLogin").onclick = function (event) {
    event.preventDefault();
    document.getElementById("myModalSignup").style.display = "none";
    document.getElementById("myModalLogin").style.display = "block";
};

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
document.getElementById("scrollButton").addEventListener("click", function () {
    window.scrollBy({
        top: 1300, // Scroll down 1300px
        behavior: 'smooth'
    });
});


