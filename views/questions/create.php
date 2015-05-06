<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <form action="/questions/create" method="post">

        <label for="questionTitle">Title: </label>
        <input type="text" id="questionTitle" name="questionTitle"/>

        <label for="questionContent">Content: </label>
        <textarea id="questionContent" name="questionContent"> </textarea>

        <label for="category">Category: </label>
        <select name="category" id="selectCategory">
            <?php foreach ($this->categories as $categorie) : ?>
                <option value="<?= $categorie['name'] ?>" ><?= $categorie['name'] ?></option>
            <?php endforeach ?>
        </select>

        <input type="submit" name="submit" value="Ask" />
    </form>
</div>
