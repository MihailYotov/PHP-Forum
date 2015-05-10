<div class="main">
    <h1><?= htmlspecialchars($this->title); ?></h1>

    <?php if ($this->isLoggedIn) : ?>
        <h3><a href="/questions/create">Ask a question</a></h3>
    <?php endif ?>

    <ul class="tagsSidebar">
        <li><strong>Tags: </strong></li>
        <li><a href="/questions">All</a></li>
        <?php foreach ($this->tags as $tag) : ?>
            <li>
                <a href="questions/viewTag/<?= htmlspecialchars($tag['name']) ?> "><?= htmlspecialchars($tag['name']) ?></a>
                <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] > 0) : ?>
                    <a href="questions/deleteTag/<?= htmlspecialchars($tag['id']) ?> " class="warningText">[X]</a>
                <?php endif ?>
            </li>
        <?php endforeach ?>
    </ul>


    <div class="questionsList">
    <ul>
        <?php foreach ($this->questions as $question) : ?>
            <li>
                <a href="questions/viewQuestion/<?= $question['id'] ?> "><?= htmlspecialchars($question['title']) ?> [<?= htmlspecialchars($question['visits']) ?>]</a>
            </li>
        <?php endforeach ?>
    </ul>
    </div>


    <ul class="categoriesSidebar">
        <li><strong>Categories: </strong></li>
        <li><a href="/questions">All</a></li>
        <?php foreach ($this->categories as $category) : ?>
            <li>
                <a href="questions/viewCategory/<?= htmlspecialchars($category['name']) ?> "><?= htmlspecialchars($category['name']) ?></a>
                <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] > 0) : ?>
                    <a href="questions/deleteCategory/<?= htmlspecialchars($category['id']) ?> " class="warningText">[X]</a>
                <?php endif ?>
            </li>
        <?php endforeach ?>
        <li>
            <?php if(isset($_SESSION['isAdmin'])) : ?>
                <?php if ($_SESSION['isAdmin'] > 0) : ?>
                    <form action="/questions/addCategory" method="post" id="addCategoryForm">
                        <label for="addCategory"></label>
                        <input type="text" id="addCategory" name="addCategory" required="required" pattern="[a-zA-Z0-9 /\\@#$%&]+"/>
                        <br/>
                        <input type="submit" name="submit" value="Add Category"/>
                    </form>
                <?php endif ?>
            <?php endif ?>
        </li>
    </ul>




</div>