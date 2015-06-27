<div class="main">

    <h1><?= htmlspecialchars($this->title); ?></h1>

    <form action="/account/register" method="post">
        <label for="username">Username: </label>
        <br/>
        <input type="text" id="username" name="username" required="required" pattern="[a-zA-Z0-9 /\\@#$%&]+"
               placeholder="Username"/>
        <br/>
        <label for="password">Password: </label>
        <br/>
        <input type="password" id="password" name="password" required="required" pattern="[a-zA-Z0-9 /\\@#$%&]+"
               placeholder="******"/>
        <br/>
        <label for="fName">Name:</label>
        <br/>
        <input type="text" id="fName" name="fName" pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="First Name"/>
        <br/>
        <label for="lName">Last Name:</label>
        <br/>
        <input type="text" id="lName" name="lName" pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="Last Name"/>
        <br/>
        <label for="email">Email: </label>
        <br/>
        <input type="text" id="email" name="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
               placeholder="your@email.com"/>
        <br/>
        <input type="submit" name="submit" value="Register"/>
    </form>

</div>