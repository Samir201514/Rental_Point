<!DOCTYPE html>
<html lang="en">
<head>
    <title> Profile </title>
    <link rel="stylesheet" href="/Rental_Point/View/user_views/css/userProfile.css">
    <script src="/Rental_Point/View/user_views/js/userProfile.js" defer></script>
</head>
<body>
    <header></header>

    <main>
        <section id="userIntroTab">
            <?php if (!empty($user["ProfilePhoto"])) { ?>
                <img src="../../<?php echo htmlspecialchars($user["ProfilePhoto"]); ?>" alt="Error" width="150px">
            <?php } else { ?>
                <img src="../../storage/user/profile/default.png" alt="Error" width="150px">
            <?php } ?>

            <h2>
                <i> <?php echo htmlspecialchars($user["Name"]); ?> </i>
            </h2>

            <?php if ($user["IsVerified"] == 1) { ?>
                <span> ✅ Verified </span>
            <?php } ?>

            <?php if ($user["UserTypeId"] == 2) { ?>
                <span> Owner </span>
            <?php } else { ?>
                <span> Tenant </span>
            <?php } ?>
            <span> . </span>
            <span> <?php echo htmlspecialchars($user["Location"]); ?> </span>
        </section>

        <section id="btnSection">
            <button class="btn"> About </button>
            <button class="btn"> My Activity </button>
            <button class="btn"> My Posts </button>
            <button class="btn"> Saved Posts </button>
            <button class="btn"> Settings </button>
            <hr>
        </section>

        <?php if ($user["UserTypeId"] == 2) { ?>
        <section id="propertyVerifyTab">
            <h3> Property Verification </h3>
            <hr> <br>
            <span> Upload your property document (in pdf) to get verified badge </span>
            <br><br>
            <form action="../../Controller/propertyVerificationController.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="VerifyDocPath">
                <br><br>
                <input type="submit" value="Submit">
            </form>
        </section>
        <?php } ?>

        <section id="aboutTab">
            <h3> Personal Information </h3>
            <hr> <br>

            <span> Name </span>
            <span> <?php echo htmlspecialchars($user["Name"]); ?> </span>
            <hr>
            <span> Email </span>
            <span> <?php echo htmlspecialchars($user["Email"]); ?> </span>
            <hr>
            <span> Phone </span>
            <span> <?php echo htmlspecialchars($user["Phone"]); ?> </span>
            <hr>
            <span> Current Location </span>
            <span> <?php echo htmlspecialchars($user["Location"]); ?> </span>
            <hr>
            <div class="editProfileDetailsBtn">
                <form action="editUserProfileController.php" method="GET">
                    <button type="submit"> Edit Profile Details </button>
                </form>
            </div>
        </section>

        <?php if ($user["UserTypeId"] == 3) { ?>
        <section id="userPrefTab">
            <h3> Preference </h3>
            <hr><br>

            <span> Looking For </span>
            <span> <?php echo htmlspecialchars($userPref["LookingFor"]); ?> </span>
            <hr>
            <span> Budget Range </span>
            <span> <?php echo htmlspecialchars($userPref["MinBudget"]); ?> to <?php echo htmlspecialchars($userPref["MaxBudget"]); ?> </span>
            <hr>
            <span> Location </span>
            <span> <?php echo htmlspecialchars($userPref["Location"]); ?> </span>
            <hr>
            <span> Move In Date </span>
            <span> <?php echo htmlspecialchars($userPref["MoveInDate"]); ?> </span>
            <hr>
            <span> Occupation </span>
            <span> <?php echo htmlspecialchars($userPref["Occupation"]); ?> </span>
            <hr>
        </section>
        <?php } ?>

        <section id="activityTab">

            <?php if ($user["UserTypeId"] == 2) { ?>
            <h3> Post Views </h3>
            <br>
            <div id="viewCounts">
                <div class="counts">
                    <span> Total Views </span>
                    <br><br>
                    <span class="numbers"> <?php echo htmlspecialchars($postStats["TotalViews"]); ?> </span>
                </div>

                <div class="counts">
                    <span> Total Saves </span>
                    <br><br>
                    <span class="numbers"> <?php echo htmlspecialchars($postStats["TotalSaves"]); ?> </span>
                </div>

                <div class="counts">
                    <span> Total Contacts </span>
                    <br><br>
                    <span class="numbers"> <?php echo htmlspecialchars($postStats["TotalContacts"]); ?> </span>
                </div>
            </div>

            <br><br><br><hr>

            <div id="viewPerPost">
                <h3> Per-Post Analytics </h3>
                <table border="1">
                    <thead>
                        <tr>
                            <th> Title </th>
                            <th> Views </th>
                            <th> Saves </th>
                            <th> Contacts </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($perPostAnalytics)) { ?>
                        <tr>
                            <td> <?php echo htmlspecialchars($row["Title"]); ?> </td>
                            <td> <?php echo htmlspecialchars($row["ViewsCount"]); ?> </td>
                            <td> <?php echo htmlspecialchars($row["SavesCount"]); ?> </td>
                            <td> <?php echo htmlspecialchars($row["ContactsCount"]); ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br><br><br><hr>
            <?php } ?>

            <div id="bookingRequests">
                <h3> Booking Requests </h3>
                <table border="1">
                    <thead>
                        <tr>
                            <th> Name </th>
                            <th> Post Title </th>
                            <th> Preferred Date-Time </th>
                            <th> Message </th>
                            <th> Status </th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($booking = mysqli_fetch_assoc($bookingsReceived)) { ?>
                        <tr>
                            <td> <?php echo htmlspecialchars($booking["RequesterName"]); ?> </td>
                            <td> <?php echo htmlspecialchars($booking["Title"]); ?> </td>
                            <td> <?php echo htmlspecialchars($booking["PreferredDateTime"]); ?> </td>
                            <td> <?php echo htmlspecialchars($booking["Note"]); ?> </td>
                            <td> <?php echo htmlspecialchars($booking["Status"]); ?> </td>
                            <td>
                                <?php if ($booking["Status"] == "Pending") { ?>
                                <form action="../../Controller/bookingActionController.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking["BookingId"]); ?>">
                                    <button type="submit" name="new_status" value="Rejected"> Reject </button>
                                    <button type="submit" name="new_status" value="Approved"> Approve </button>
                                </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br><br><br><hr>

            <div id="myReports">
                <h3> My Reports </h3>
                <?php while ($report = mysqli_fetch_assoc($myReports)) { ?>
                <div style="background-color: #FFFFFF;">
                    <p> Title : <?php echo htmlspecialchars($report["Title"]); ?> </p>
                    <p> Date : <?php echo htmlspecialchars($report["ReportedAt"]); ?> </p>
                    <p> Reason : <?php echo htmlspecialchars($report["ReportType"]); ?> </p>
                    <p> Description : <?php echo htmlspecialchars($report["Description"]); ?> </p>
                    <p> Status : <?php echo htmlspecialchars($report["Status"]); ?> </p>
                    <?php if (!empty($report["Response"])) { ?>
                    <p> Response : <?php echo htmlspecialchars($report["Response"]); ?> </p>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>

            <br><br><br><hr>

            <div id="mySupports">
                <h3> My Support Tickets </h3>
                <button onclick="window.location.href='../../View/user_views/helpForm.php'"> Ask for Help </button>
                <?php while ($ticket = mysqli_fetch_assoc($mySupportTickets)) { ?>
                <div style="background-color: #FFFFFF;">
                    <p> Subject : <?php echo htmlspecialchars($ticket["Subject"]); ?> </p>
                    <p> Date : <?php echo htmlspecialchars($ticket["SubmittedAt"]); ?> </p>
                    <p> Description : <?php echo htmlspecialchars($ticket["Description"]); ?> </p>
                    <p> Status : <?php echo htmlspecialchars($ticket["Status"]); ?> </p>
                    <?php if (!empty($ticket["Response"])) { ?>
                    <p> Response : <?php echo htmlspecialchars($ticket["Response"]); ?> </p>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </section>

        <section id="postsTab">
            <h3> My Posts </h3>
            <button onclick="window.location.href='../../View/user_views/createPost.php'"> + Create New Post </button>
            <br>
            <?php while ($post = mysqli_fetch_assoc($myPosts)) { ?>
            <div id="postCard" style="background-color: #FFFFFF;">
                <div>
                    <span> <?php echo htmlspecialchars($post["PostType"]); ?> </span>
                    <?php if (!empty($post["ImagePath"])) { ?>
                    <img src="../../<?php echo htmlspecialchars($post["ImagePath"]); ?>" alt="Error">
                    <?php } ?>
                </div>

                <p> <?php echo htmlspecialchars($post["Title"]); ?> </p>
                <p> <?php echo htmlspecialchars($post["MonthlyRent"]); ?> </p>
                <p> <?php echo htmlspecialchars($post["Location"]); ?> </p>

                <hr>

                <p>
                    <?php echo htmlspecialchars($post["PosterName"]); ?>
                    <?php if ($post["IsVerified"] == 1) { ?>
                        <span> Verified </span>
                    <?php } ?>
                </p>
                <p> <?php echo htmlspecialchars($post["UserRole"]); ?> </p>
                <p> <?php echo htmlspecialchars($post["CreatedAt"]); ?> </p>
                <div>
                    <form action="../../Controller/editPostController.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($post["PostId"]); ?>">
                        <button type="submit"> Edit </button>
                    </form>
                    <form action="../../Controller/deletePostController.php" method="POST" style="display:inline;">
                        <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post["PostId"]); ?>">
                        <button type="submit"> Delete </button>
                    </form>
                    <form action="../../View/user_views/postDetails.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($post["PostId"]); ?>">
                        <button type="submit"> Details </button>
                    </form>
                </div>
            </div>
            <?php } ?>
        </section>

        <section id="savedTab">
            <h3> Saved Posts </h3>
            <br>

            <?php while ($saved = mysqli_fetch_assoc($savedPosts)) { ?>
            <div id="postCard" style="background-color: #FFFFFF;">
                <div>
                    <span> <?php echo htmlspecialchars($saved["PostType"]); ?> </span>
                    <?php if (!empty($saved["ImagePath"])) { ?>
                    <img src="../../<?php echo htmlspecialchars($saved["ImagePath"]); ?>" alt="Error">
                    <?php } ?>
                </div>

                <p> <?php echo htmlspecialchars($saved["Title"]); ?> </p>
                <p> <?php echo htmlspecialchars($saved["MonthlyRent"]); ?> </p>
                <p> <?php echo htmlspecialchars($saved["Location"]); ?> </p>

                <hr>

                <p>
                    <?php echo htmlspecialchars($saved["PosterName"]); ?>
                    <?php if ($saved["IsVerified"] == 1) { ?>
                        <span> Verified </span>
                    <?php } ?>
                </p>
                <p> <?php echo htmlspecialchars($saved["UserRole"]); ?> </p>
                <p> <?php echo htmlspecialchars($saved["CreatedAt"]); ?> </p>
                <div>
                    <form action="../../Controller/toggleSaveController.php" method="POST" style="display:inline;">
                        <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($saved["PostId"]); ?>">
                        <button type="submit"> Remove </button>
                    </form>
                    <form action="../../View/user_views/postDetails.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($saved["PostId"]); ?>">
                        <button type="submit"> Details </button>
                    </form>
                </div>
            </div>
            <?php } ?>
        </section>

        <section id="settingsTab">
            <div>
                <h3> Account Settings </h3>
                <br>
                <button class="editProfileDetailsBtn"> Edit Profile Details &gt; </button>
                <hr>
                <button id="changePasswordBtn"> Change Password </button>
                <hr>
                <button id="LogoutBtn"> Logout </button>
                <hr>
                <button id="deleteAccountBtn"> Delete Rental Point Account </button>
            </div>
        </section>

        <div id="popupBg"></div>

        <!-- Change Password Popup -->
        <div id="changePasswordPopup">
            <h3> Change Password </h3>
            <button> X </button>
            <br>
            <form action="../../Controller/changePasswordController.php" method="POST">
                <label for="currentPassword"> Current Password </label>
                <input type="password" name="currentPassword">
                <hr>
                <label for="NewPassword"> Enter New Password </label>
                <input type="password" name="NewPassword">
                <hr>
                <label for="againNewPassword"> Enter New Password Again </label>
                <input type="password" name="againNewPassword">
                <hr>
                <input type="button" id="cancelChangePasswordBtn" value="Cancel">
                <input type="submit" name="saveNewPassword" value="Save New Password" style="background:rgba(111, 185, 135, 1);">
            </form>
        </div>

        <!-- Logout Popup -->
        <div id="logoutPopup">
            <button> X </button>
            <br>
            <span> Do You Want to Logout? </span>
            <br><br><br>
            <button id="cancelLogoutBtn"> No </button>
            <form action="../View/logout.php" method="POST" style="display:inline;">
                <button type="submit" id="confirmLogoutBtn" style="background:rgba(217, 63, 63, 1);"> Yes </button>
            </form>
        </div>

        <!-- Delete account Popup -->
        <div id="deleteAccountPopup">
            <button> X </button>
            <br>
            <span> Do You Want to Delete Rental Point Account Permanently? </span>
            <br><br><br>
            <button id="cancelDeleteBtn"> Cancel </button>
            <form action="../../Controller/deleteAccountController.php" method="POST" style="display:inline;">
                <input type="hidden" name="confirm_delete" value="1">
                <button type="submit" style="background:rgba(217, 63, 63, 1);"> Yes, Delete Permanently </button>
            </form>
        </div>
    </main>

    <footer></footer>
</body>
</html>