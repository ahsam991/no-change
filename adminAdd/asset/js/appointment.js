function archiveAppointments() {
    var xhttp = new XMLHttpRequest();

    // Open a POST request to the controller
    xhttp.open("POST", "../controller/adminViewAppointments.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send the AJAX request with the 'archive' parameter
    xhttp.send("archive=true");

    // Handle the server response
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            var response = JSON.parse(xhttp.responseText);
            
            // Display appropriate message
            if (response.status === 'success') {
                alert(response.message);  // success message
            } else {
                alert(response.message);  // error message
            }
        }
    };
}
