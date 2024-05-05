// Description: Add functionality to all comment buttons
for (let i = 0; i < document.getElementsByClassName("open-comment").length; i++){
    commentBtn = document.getElementsByClassName("open-comment");
    // Add event listener to each comment button to toggle display of comment form
    commentBtn[i].addEventListener("click", () => {
        // Toggle display of comment form
        commentFormArray = document.getElementsByClassName("comment-form"); 
        commentFormArray[i].style.display = (commentFormArray[i].style.display == "block") ? "none" : "block";

        //Change text of comment button
        commentBtn[i].textContent = (commentBtn[i].textContent == "Reply") ? "Close" : "Reply";

        // Focus on textarea
        document.getElementsByClassName("comment-area")[i].focus();

        // Hide all other comment forms
        for (let j = 0; j < commentFormArray.length; j++){
            if (j != i){
                commentFormArray[j].style.display = "none";
            }
        }
    }
)}

// Description: Add functionality to comment textarea
for (let i = 0; i < document.getElementsByClassName("comment-area").length; i++){
    document.getElementsByClassName("comment-area")[i].addEventListener("input", () => {
        // Auto resize textarea
        document.getElementsByClassName("comment-area")[i].style.height = "auto";
        document.getElementsByClassName("comment-area")[i].style.height = document.getElementsByClassName("comment-area")[i].scrollHeight + "px";

        // Update character count
        document.getElementsByClassName("chr-count")[i].textContent = document.getElementsByClassName("comment-area")[i].value.length + " / 300";
    }
)}; 

// Description: Add warning to post delete button
for (let i = 0; i < document.getElementsByClassName("delete-btn").length; i++){
    document.getElementsByClassName("delete-btn")[i].addEventListener("click", (event) => {
        if (!window.confirm("Are you sure you would like to delete this post?")){
            event.preventDefault(); 
        }
    }
)}
