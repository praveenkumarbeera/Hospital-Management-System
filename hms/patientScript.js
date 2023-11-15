
// JavaScript for Patient Registration
document.getElementById("patientRegistrationForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const name = document.getElementById("patientName").value;
    const email = document.getElementById("patientEmail").value;
    const phone = document.getElementById("patientPhone").value;

    // Create an object to send to the server
    const data = {
        name: name,
        email: email,
        phone: phone
    };

    fetch("patient_registration.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(responseData => {
        if (responseData.success) {
            // Registration successful, display a success message
            alert("Patient registration successful!");
            // You can also redirect to a different page here
        } else {
            // Registration failed, display an error message
            alert("Patient registration failed. Please try again.");
        }
    });
});

