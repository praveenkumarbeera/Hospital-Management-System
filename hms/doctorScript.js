// JavaScript for Doctor Login
document.getElementById("doctorLoginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const username = document.getElementById("doctorUsername").value;
    const password = document.getElementById("doctorPassword").value;

    // Create an object to send to the server
    const data = {
        username: username,
        password: password
    };

    fetch("doctor_login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(responseData => {
        if (responseData.success) {
            window.location.href = "doctor_dashboard.php";
            alert("Success");
        } else {
            alert("Doctor login failed. Please check your credentials.");
        }
    });
});
