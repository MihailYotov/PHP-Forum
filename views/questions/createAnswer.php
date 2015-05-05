<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <form action="/questions/createAnswer" method="post">
        <input type="hidden" value="<?= $this->questionId ?> " name="theQuestionId"/>

        <label for="answerContent">Content:</label>
        <textarea id="answerContent" name="answerContent"></textarea>

        <input type="submit" name="submit" value="Answer" />
    </form>
</div>