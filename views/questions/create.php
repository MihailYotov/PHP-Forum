<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <form action="/questions/create" method="post">

        <label for="questionTitle">Title: </label>
        <input type="text" id="questionTitle" name="questionTitle" required="required"/>

        <label for="questionContent">Content: </label>
        <textarea id="questionContent" name="questionContent" required="required"> </textarea>

        <label for="category">Category: </label>
        <select name="category" id="selectCategory">
            <?php foreach ($this->categories as $categorie) : ?>
                <option value="<?= htmlspecialchars($categorie['name']) ?>" ><?= htmlspecialchars($categorie['name']) ?></option>
            <?php endforeach ?>
        </select>

        <label for="tags">Tags:</label>
        <input type="text" id="tags" name="tags" pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="E.g.: PHP, Java, C#"/>
        <p><cite>Only words and numbers, separated by comma(,). </cite></p>

        <input type="submit" name="submit" value="Ask" />
    </form>
</div>
