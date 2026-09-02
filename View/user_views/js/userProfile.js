// switching between tabs
const btn = document.getElementsByClassName("btn");
const aboutDiv = document.getElementById("aboutDiv");
const myActivityDiv = document.getElementById("myActivityDiv");
const myPostsDiv = document.getElementById("myPostsDiv");
const savedPostsDiv = document.getElementById("savedPostsDiv");
const settingsDiv = document.getElementById("settingsDiv");

btn[0].addEventListener("click", ()=>{
    aboutDiv.style.display = "block";
    myActivityDiv.style.display = "none";
    myPostsDiv.style.display = "none";
    savedPostsDiv.style.display = "none";
    settingsDiv.style.display = "none";
});

btn[1].addEventListener("click", ()=>{
    aboutDiv.style.display = "none";
    myActivityDiv.style.display = "block";
    myPostsDiv.style.display = "none";
    savedPostsDiv.style.display = "none";
    settingsDiv.style.display = "none";
});

btn[2].addEventListener("click", ()=>{
    aboutDiv.style.display = "none";
    myActivityDiv.style.display = "none";
    myPostsDiv.style.display = "block";
    savedPostsDiv.style.display = "none";
    settingsDiv.style.display = "none";
});

btn[3].addEventListener("click", ()=>{
    aboutDiv.style.display = "none";
    myActivityDiv.style.display = "none";
    myPostsDiv.style.display = "none";
    savedPostsDiv.style.display = "block";
    settingsDiv.style.display = "none";
});

btn[4].addEventListener("click", ()=>{
    aboutDiv.style.display = "none";
    myActivityDiv.style.display = "none";
    myPostsDiv.style.display = "none";
    savedPostsDiv.style.display = "none";
    settingsDiv.style.display = "block";
});


// editProfileDetailsBtn
const editProfileDetailsBtn = document.getElementById("editProfileDetailsBtn");
editProfileDetailsBtn.addEventListener("click", ()=>{
    window.location.href = "../../Controller/editUserProfile.php"
})


// Delete account popup
const popupBg = document.getElementById("popupBg");
const deleteAccountPopup = document.getElementById("deleteAccountPopup");

const deleteAccountBtn = document.getElementById("deleteAccountBtn");
deleteAccountBtn.addEventListener("click", ()=>{
    deleteAccountPopup.style.display = "block";
    popupBg.style.display = "block";
});

const cancelDeleteBtn = document.getElementById("cancelDeleteBtn")
cancelDeleteBtn.addEventListener("click", ()=>{
    deleteAccountPopup.style.display = "none";
    popupBg.style.display = "none";
})