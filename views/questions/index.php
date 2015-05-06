<div class="main">
    <h1><?= htmlspecialchars($this->title); ?></h1>

    <?php if ($this->isLoggedIn) : ?>
        <h3><a href="/questions/create">Ask a question</a></h3>
    <?php endif ?>

    <ul class="questionsList">
        <?php foreach ($this->questions as $question) : ?>
            <li>
                <a href="questions/viewQuestion/<?= $question['id'] ?> "><?= htmlspecialchars($question['title']) ?></a>
            </li>
        <?php endforeach ?>
    </ul>



    <ul class="categoriesSidebar">
        <li><strong>Categories: </strong></li>
        <li><a href="/questions">All</a></li>
        <?php foreach ($this->categories as $category) : ?>
            <li>
                <a href="questions/viewCategory/<?= htmlspecialchars($category['name']) ?> "><?= htmlspecialchars($category['name']) ?></a>
            </li>
        <?php endforeach ?>
        <li>
            <?php if ($_SESSION['isAdmin'] > 0) : ?>
                <form action="/questions/addCategory" method="post" id="addCategoryForm">
                    <label for="addCategory"></label>
                    <input type="text" id="addCategory" name="addCategory"/>
                    <br/>
                   <input type="submit" name="submit" value="Add Category"/>
                </form>
            <?php endif ?>
        </li>
    </ul>


</div>