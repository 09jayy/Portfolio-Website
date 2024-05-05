// Event listener for clear button
document.querySelector('input[type="reset"]').addEventListener("click", (event) => {
    if (!window.confirm("Clear blog post?") ){
        event.preventDefault(); 
    } else {
        for (let inputBox of document.getElementsByClassName("input-box") ){
            inputBox.style.borderColor = "transparent";
        }
    }
});

// Event listener for submit button if fields are empty
document.querySelector('input[type="submit"]').addEventListener("click", (event) => {
    for (let inputBox of document.getElementsByClassName("input-box") ){
        inputBox.style.borderColor = "transparent";
        if (!inputBox.value){
            event.preventDefault(); 
            inputBox.style.borderColor = "red"; 
        }
    }
})