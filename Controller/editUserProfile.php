<!DOCTYPE html>
<html lang="en">
<head>
    <title> Profile | Edit </title>
    <link rel="stylesheet" href="../View/user_views/css/userProfile.css">
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
                    <h2 id="userName"> 
                        <input type="text" name="name" id="name" value=""> 
                    </h2>
                    <span> ✅ Verified </span>
                </div>
            </div>
            
            <label for="bio"> Bio </label>
            <input type="text" name="bio" id="bio" value="">
        </section>
        
        <section id="aboutDiv">
            <h3> Personal Information </h3>
            <br>

            <label for="email"> Email </label>
            <input type="text" name="email" id="email" value="">
            <hr>
            <label for="phone"> Phone Number </label>
            <input type="text" name="phone" id="phone" value="">
            <hr>
            <label for="division"> Address </label>
            <input type="text" name="division" id="division" value="">
            <hr>
            <label for="division"> Address </label>
            <input type="text" name="division" id="division" value="">
            <hr>
            <span> Dhaka </span>
            <hr>
            <div>
                <button> Cancel </button>
                <button> Save Changes </button>
            </div>
        </section>

    </main>

    <footer></footer>
</body>
</html>