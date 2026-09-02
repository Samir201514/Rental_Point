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
            <button class="btn" id="activityTab"> My Activity </button>
            <button class="btn" id="postsTab"> My Posts </button>
            <button class="btn" id="savedTab"> Saved Posts </button>
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
            <div id="editProfileDetailsBtn">
                <button> Edit Profile Details </button>
            </div>
        </section>

         <section id="myActivityDiv">
            <h3> Post Views </h3>
            <div id="postCounts">
                <br>
                <div> 
                    <span> Total Views </span>
                    <br><br>
                    <span> 1235 </span>
                </div>
                <div> 
                    <span> Total Saves </span>
                    <br><br>
                    <span> 1235 </span>
                </div>
                <div> 
                    <span> Total Contacts </span>
                    <br><br>
                    <span> 1235 </span>
                </div>
            </div>

                <br><br><br>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th> Title </th>
                                <th> Views </th>
                                <th> Saves </th>
                                <th> contacts </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="myPostsDiv">
            <div>
                <h3> My Posts </h3>
                <br>
            </div>

            <div>

            </div>
        </section>

            <section id="savedPostsDiv">
            <div>
                <h3> Saved Posts </h3>
                <br>
            </div>

            <div>

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
    
    <!-- Delete account Popup -->
    <div id="popupBg"></div>
    <div id="deleteAccountPopup">
        <button> X </button>        
        <br>
        <span> Do You Want to Delete Rental Point Account Permanently? </span>
        <br><br><br>
        <button id="cancelDeleteBtn"> Cancel </button>
        <button style="background:rgba(217, 63, 63, 1);"> Yes, Delete Permanently </button>
    </div>


    <footer></footer>
</body>
</html>