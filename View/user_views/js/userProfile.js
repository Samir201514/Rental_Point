// switching between tabs
const btn = document.getElementsByClassName("btn");
const aboutTab = document.getElementById("aboutTab");
const activityTab = document.getElementById("activityTab");
const postsTab = document.getElementById("postsTab");
const savedTab = document.getElementById("savedTab");
const settingsTab = document.getElementById("settingsTab");

btn[0].addEventListener("click", ()=>{
    aboutTab.style.display = "block";
    activityTab.style.display = "none";
    postsTab.style.display = "none";
    savedTab.style.display = "none";
    settingsTab.style.display = "none";
});

btn[1].addEventListener("click", ()=>{
    aboutTab.style.display = "none";
    activityTab.style.display = "block";
    postsTab.style.display = "none";
    savedTab.style.display = "none";
    settingsTab.style.display = "none";
});

btn[2].addEventListener("click", ()=>{
    aboutTab.style.display = "none";
    activityTab.style.display = "none";
    postsTab.style.display = "block";
    savedTab.style.display = "none";
    settingsTab.style.display = "none";
});

btn[3].addEventListener("click", ()=>{
    aboutTab.style.display = "none";
    activityTab.style.display = "none";
    postsTab.style.display = "none";
    savedTab.style.display = "block";
    settingsTab.style.display = "none";
});

btn[4].addEventListener("click", ()=>{
    aboutTab.style.display = "none";
    activityTab.style.display = "none";
    postsTab.style.display = "none";
    savedTab.style.display = "none";
    settingsTab.style.display = "block";
});


// editProfileDetailsBtn
const editProfileDetailsBtn = document.getElementById("editProfileDetailsBtn");
editProfileDetailsBtn.addEventListener("click", ()=>{
    // window.location.href = "../../Controller/editUserProfile.php"
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