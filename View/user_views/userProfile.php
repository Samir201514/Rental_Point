<!DOCTYPE html>
<html lang="en">
<head>
    <title> Profile </title>
    <link rel="stylesheet" href="css/userProfile.css">
    <script src="js/userProfile.js" defer> </script>
</head>
<body>
    <header></header>


    <main>
        <section id="photo">
            <div id="cover">
                <img src="" width="500px">
            </div>

            <div id="proPic">
                <div id="picName">
                    <h2 id="userName"> <i> Name </i> </h2>
                    <span> ✅ Verified </span>
                    <br>
                    <span id="userType"> Type </span>
                    <span> . </span>
                    <span id="userLocation"> Location </span>
                </div>
            </div>
            
            <p id="bio">
                My Bio
            </p>
        </section>
        
        <section id="btnSection">
            <button class="btn" id="aboutTab"> About </button>
            <button class="btn" id="postsTab"> My Posts </button>
            <button class="btn" id="activityTab"> My Activity </button>
            <button class="btn" id="savedTab"> Saved Posts </button>
            <button class="btn" id="bookingTab"> Booking </button>
            <button class="btn" id="reportTab"> Report </button>
            <button class="btn" id="helpTab"> Help </button>
            <button class="btn" id="settingsTab"> Settings </button>
            <hr>
        </section>
        
        <section id="aboutDiv">
            <h3> Personal Information </h3>
            <br>
            
            <span> Name </span>
            <span> Samir </span>
            <hr>
            <span> Email </span>
            <span> arafat.rahman3926@gmail.com </span>
            <hr>
            <span> Phone </span>
            <span> 01575431438 </span>
            <hr>
            <span> Location </span>
            <span> Dhaka </span>
            <hr>
            <div id="editBtn">
                <button> Edit Profile Details </button>
            </div>
        </section>

        <section id="settingsDiv">
            <div>
                <h3> Account Settings </h3>
                <br>
                <button> Edit Profile Details > </button>
                <hr>
                <button> Change Password </button>
                <hr>
                <button> Logout </button>
                <hr>
                <button id="deleteAccountBtn"> Delete Rental Point Account </button>
            </div>

            <div>

            </div>
        </section>
    </main>
    
    // Delete account Popup
    <div id="popupBg"></div>
    <div id="deleteAccountPopup">
        <button> X </button>        
        <br>
        <span> Do You Want to Delete Rental Point Account Permanently? </span>
        <br><br><br>
        <button id="cancelDeleteBtn"> Cancel </button>
        <button style="background:rgb(214, 63, 63);"> Yes, Delete Permanently </button>
    </div>


    <footer></footer>
</body>
</html>