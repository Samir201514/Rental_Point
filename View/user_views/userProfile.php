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
        <section id="userIntroTab">
                <img src="../../Storage/User/Profile/default.png" alt="Error" width="150px">

                <h2> 
                    <i> MD. ARAFAT RAHMAN SAMIR </i> 
                </h2>
                
                <span> ✅ Verified </span>
                
                <span> Owner </span>
                <span> . </span>
                <span> Mirpur, Dhaka </span>
        </section>
        
        <section id="btnSection">
            <button class="btn"> About </button>
            <button class="btn"> My Activity </button>
            <button class="btn"> My Posts </button>
            <button class="btn"> Saved Posts </button>
            <button class="btn"> Settings </button>
            <hr>
        </section>
        

        <section id="propertyVerifyTab">
            <h3> Property Verification </h3>
            <hr> <br>
            <span> Upload your property document(in pdf) to get verfiy badge</span>
            <br><br>
            <form action="../../Controller/propertyVerificationController.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="VerifyDocPath">
                <br><br>
                <input type="submit" value="Submit">
            </form>
        </section>

        <section id="aboutTab">
            <h3> Personal Information </h3>
            <hr> <br>

            <span> Name </span>
            <span> Samir </span>
            <hr>
            <span> Email </span>
            <span> arafat.rahman3926@gmail.com </span>
            <hr>
            <span> Phone </span>
            <span> 01575431438 </span>
            <hr>
            <span> Current Location </span>
            <span> Dhaka </span>
            <hr>
            <div class="editProfileDetailsBtn">
                <button> Edit Profile Details </button>
            </div>
        </section>

         <section id="activityTab">
                <h3> Post Views </h3>
                <div id="postCounts">
                    <br>
                    <div> 
                        <span> Total Views </span>
                        <br><br>
                        <span class="counts"> 1235 </span>
                    </div>
                    <div> 
                        <span> Total Saves </span>
                        <br><br>
                        <span class="counts"> 1235 </span>
                    </div>
                    <div> 
                        <span> Total Contacts </span>
                        <br><br>
                        <span class="counts"> 1235 </span>
                    </div>
                </div>
    
                <br><br><br>
    
                <div>
                    <table border="1">
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
                                <td> 2 Master Bedrooms </td>
                                <td> 50 </td>
                                <td> 10 </td>
                                <td> 03 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </section>

        <section id="postsTab">
            <div>
                <h3> My Posts </h3>
                <br>
            </div>

            <div>

            </div>
        </section>

        <section id="savedTab">
            <div>
                <h3> Saved Posts </h3>
                <br>
            </div>

            <div>

            </div>
        </section>

        <section id="settingsTab">
            <div>
                <h3> Account Settings </h3>
                <br>
                <button class="editProfileDetailsBtn"> Edit Profile Details > </button>
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

        <section id="userPrefTab">
            <h3> Preference </h3>
            <hr><br>
            
            <span> Looking For </span>
            <span> Roomate </span>
            <hr>
            <span> Budget Range </span>
            <span> MinBudget to MaxBudget </span>
            <hr>
            <span> Location </span>
            <span> Mirpur, Dhaka </span>
            <hr>
            <span> Move In Date </span>
            <span> 01 Oct 2026 </span>
            <hr>
            <span> Occupation </span>
            <span> Software Engineer </span>
            <hr>
            <!-- <div id="editUserPrefBtn">
                <button> Edit Preference Details </button>
            </div> -->
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