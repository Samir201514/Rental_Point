<!DOCTYPE html>
<html lang="en">
<head>
    <title> Profile | Edit </title>
    <link rel="stylesheet" href="css/userProfile.css">
    <script src="js/userProfile.js" defer> </script>
</head>
<body>
    <header></header>


    <main>
        <form action="../../Controller/editUserProfileController.php" method="POST" enctype="multipart/form-data">
            <section id="userIntroTab">
                <img src="../../Storage/User/Profile/default.png" alt="Error" width="150px">
                <br>
                <label for="ProfilePhoto"> Select Your New Profile Picture </label>
                <br>
                <input type="file" name="ProfilePhoto">
                <br><br>

                <label for="name"> Name </label>
                <input type="text" name="name" 
                value = 
                "
                <?php 
                "<h2> 
                    <i> MD. ARAFAT RAHMAN SAMIR </i> 
                </h2>" 
                ?>
                ">
            </section>

            <section id="aboutTab">
                <h3> Editing Personal Information </h3>
                <hr><br>

                <label for="email"> Email </label>
                <input type="text" name="email" class="data" value="">
                <hr>
                <label for="phone"> Phone Number </label>
                <input type="text" name="phone" class="data" value="">
                <hr>
                <label for="currentLocation"> Current Location </label>
                <input type="text" name="currentLocation" class="data" value="">
                <hr>
            </section>

            <section id="userPrefTab">
                <h3> Editing Preference </h3>
                <hr><br>
                

                <label for="lookingFor"> Looking For </label>
                <select name="lookingFor" class="data" >
                    <option value=""> Choose a Option </option>
                    <option value="Flat"> Flat </option>
                    <option value="Sublet"> Sublet </option>
                    <option value="Roommate"> Roommate </option>
                </select>
                <hr>
                
                <label> Budget Range </label>
                <input type="number" name="minBudget" class="data" value="">
                <span> to </span>
                <input type="number" name="maxBudget" class="data" value="">
                <hr>

                <label for="location"> Location </label>
                <input type="text" name="location" class="data" value="">
                <hr>

                <label for="moveInDate"> Move In Date </label>
                <input type="date" name="moveInDate" class="data" value="">
                <hr>

                <label for="occupation"> Occupation </label>
                <input type="text" name="occupation" class="data" value="">
                <hr>
            </section>

            <section id="updateInfoBtn">
                <input type="submit" value="Cancel">
                <input type="submit" name="Save" value="Save Changes">
             </section>
        </form>
    </main>

    <footer></footer>
</body>
</html>