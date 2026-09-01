// switching between tabs
const btn = document.getElementsByClassName("btn");
const aboutDiv = document.getElementById("aboutDiv");
const settingsDiv = document.getElementById("settingsDiv"); 
settingsDiv.style.display = "none";

btn[0].addEventListener("click", ()=>{
    aboutDiv.style.display = "block";
    settingsDiv.style.display = "none";
});

btn[7].addEventListener("click", ()=>{
    aboutDiv.style.display = "none";
    settingsDiv.style.display = "block";
});



// Delete account popup
const popupBg = document.getElementById("popupBg");
popupBg.style.display = "none";
const deleteAccountPopup = document.getElementById("deleteAccountPopup");
deleteAccountPopup.style.display = "none";

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