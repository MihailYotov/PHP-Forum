<div class="main">

    <h1><?= htmlspecialchars($this->title); ?></h1>

    <form action="/account/register" method="post">
        <fieldset>
            <legend>Register</legend>

            <label for="username">Username: </label>
            <input type="text" id="username" name="username"/>

            <label for="password">Password: </label>
            <input type="password" id="password" name="password"/>

            <label for="fName">Name:</label>
            <input type="text" id="fName" name="fName"/>

            <label for="lName">Last Name:</label>
            <input type="text" id="lName" name="lName"/>

            <label for="email">Email: </label>
            <input type="text" id="email" name="email"/>

            <input type="submit" name="submit" value="Register"/>

        </fieldset>
    </form>

</div>