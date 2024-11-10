
document.getElementById("contactForm").addEventListener("submit", function (event) {
    event.preventDefault();  // Prevent default form submission

    const formData = new FormData(this);

    fetch("ContactUs.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === "exists") {
                showNotification("You have already subscribed");
                closeModal();
            } else if (data.status === "success") {
                showNotification("Subscription successful!");
                closeModal();
            } else {
                showNotification("An error occurred. Please try again.");
            }
        })
        .catch(error => console.error("Error:", error));
});

function showNotification(message) {
    const notification = document.createElement("div");
    notification.classList.add("notification");
    notification.textContent = message;
    document.body.appendChild(notification);
    setTimeout(() => notification.remove(), 3000);  // Remove notification after 3 seconds
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

