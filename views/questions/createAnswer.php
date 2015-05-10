<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <div class="answerForm">
        <form action="/questions/postAnswer" method="post">
            <input type="hidden" value="<?= $this->questionId ?> " name="theQuestionId"/>

            <label for="answerContent">Content:</label>
            <textarea id="answerContent" name="answerContent" required="required"></textarea>

            <?php if(!$this->isLoggedIn) : ?>
                <label for="annonimusName">Your name: </label>
                <input type="text" id="annonimusName" name="annonimusName" required="required"/>

                <label for="annonimusEmail">Your email</label>
                <input type="text" id="annonimusEmail" name="annonimusEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>


            <?php endif ?>

            <input type="submit" name="submit" value="Answer" />
        </form>
    </div>
</div>