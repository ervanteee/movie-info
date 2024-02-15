document.addEventListener("DOMContentLoaded", function () {
    const click = document.getElementById('click_admin');
    const hideElements = document.getElementsByClassName('hide')[0]; // Adjust if there are multiple elements

    click.addEventListener("click", function () {
        // Toggle the display property of the element with the 'hide' class
        hideElements.style.display = (hideElements.style.display === "none") ? "block" : "none";

        /*
        if (hideElements.style.display === "none") {
            hideElements.style.display = "block";
        } else {
            hideElements.style.display = "none";
        }

        classic if else
        */
        
    });
});

