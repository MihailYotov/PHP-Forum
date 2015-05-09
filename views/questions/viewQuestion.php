<div class="main">

    <div id="questionBox" class="clearfix">
        <?php foreach ($this->questions as $question) : ?>
        <h3><?= htmlspecialchars($question['title']) ?></h3>
        <h4>Asked by: <?= htmlspecialchars($question['userName']) ?> /
            Category: <?= htmlspecialchars($question['category']) ?> /
            Visited: <?= htmlspecialchars($question['visits']) ?>
        </h4>

        <div><strong><?= htmlspecialchars($question['content']) ?><strong></div>
        <h3>
            <a href="/questions/createAnswer/<?= $question['id'] ?> ">Answer the question</a>
            <?php if ($_SESSION['isAdmin'] > 0) : ?>
                <span class="deleteButton"><a
                        href="/questions/deleteQuestion/<?= $question['id'] ?> ">[DELETE]</a></span>
            <?php endif ?>
        </h3>

        <?php if($this->tags) : ?>
        <div>
            <span>Tags: </span>
            <?php foreach ($this->tags as $tag) : ?>
                <span><?= htmlspecialchars($tag['name']); ?></span>
            <?php endforeach ?>
        </div>

        <?php endif ?>
    </div>


    <?php if ($this->answers) : ?>
        <table class="responsesTable clearfix">

            <?php foreach ($this->answers as $answer) : ?>
                <tr>
                    <td class="answeredUserId">
                        <?php if ($_SESSION['isAdmin'] > 0) : ?>
                            <a href="/questions/deleteAnswer/<?= htmlspecialchars($answer['id']) ?>/<?= $question['id'] ?> "
                               class="warningText">[X]</a>
                        <?php endif ?>
                        <?= htmlspecialchars($answer['userName']) ?>:
                        <?php if ($answer['userEmail']) : ?>
                            <br/>
                            Email: <?= htmlspecialchars($answer['userEmail']) ?>

                        <?php endif ?>
                    </td>
                    <td class="answeredContent"><?= htmlspecialchars($answer['content']) ?></td>
                </tr>
            <?php endforeach ?>

        </table>
    <?php endif ?>

    <?php endforeach ?>
</div>