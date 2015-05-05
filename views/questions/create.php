<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <form action="/questions/create" method="post">

        <label for="questionTitle">Title: </label>
        <input type="text" id="questionTitle" name="questionTitle"/>

        <label for="questionContent">Content: </label>
        <textarea id="questionContent" name="questionContent"> </textarea>

        <input type="submit" name="submit" value="Ask" />
    </form>
</div>
