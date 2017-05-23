<div class="login">

    <div class="left">
        <h2>I am already registered</h2>
        <p>Login to access your account and shop online.</p>
        <form action="index.php?pageid=loginprocess" method="post">
            <input type="text" name="username" id="username" placeholder="  username*" required /><br />
            <input type="password" id="password" name="password" placeholder="  password*" required /><br />
            <p><input type="submit" name="login" value="Login" /></p>
        </form>

    </div> <!-- end left -->	

    <div class="right">
        <h2>New Customers</h2>
        <p>Register to enjoy the convenience of shopping online.</p>
        <form action="index.php?pageid=regprocess" method="post">
            <input type="text" name="firstName" id="firstName" required placeholder="  first name*" /><br />
            <input type="text" name="lastName" id="lastName"  required placeholder="  last name*" /><br />
            <input type="email" name="email" id="email" placeholder="  email address*" required /><br />
            <input type="number" name="phone" id="phone" required placeholder="  phone number*" pattern=".{10,}" title="Include your area code. Numbers only." /><br />
            <input type="text" name="street" id="street" required placeholder="  street address*" /><br />
            <input type="text" name="suburb" id="suburb" required placeholder="  suburb*" /><br />
            <input type="number" min="1000" max="9999" name="postcode" id="postcode" required placeholder="  postcode*" pattern=".{4,}" title="Minimum of 4 characters." /><br />
            <input type="text" name="username" id="username" placeholder="  username*" required /><br />
            <input type="password" id="password" name="password" placeholder="  password*" required pattern=".{8,}" title="Minimum of 8 characters."/><br />
            <p><input type="submit" name="register" value="Register" /></p>
        </form>
    </div> <!-- end right -->

</div>
