<div class="main">

    <h1><?= htmlspecialchars($this->title); ?></h1>

    <form action="/account/register" method="post">
        <fieldset>
            <legend>Register</legend>

            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required="required"  pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="Username"/>

            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required="required"  pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="******"/>

            <label for="fName">Name:</label>
            <input type="text" id="fName" name="fName"  pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="First Name"/>

            <label for="lName">Last Name:</label>
            <input type="text" id="lName" name="lName"  pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="Last Name"/>

            <label for="email">Email: </label>
            <input type="text" id="email" name="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="your@email.com"/>

            <input type="submit" name="submit" value="Register"/>

        </fieldset>
    </form>

</div>