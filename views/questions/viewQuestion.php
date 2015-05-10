<div class="main">

    <div id="questionBox">
        <?php foreach ($this->questions as $question) : ?>
        <h3><?= htmlspecialchars($question['title']) ?></h3>
        <h4>Asked by: <?= htmlspecialchars($question['userName']) ?> /
            Category: <?= htmlspecialchars($question['category']) ?> /
            Visited: <?= htmlspecialchars($question['visits']) ?>
        </h4>

        <div class="questionBoxQuestion">
            <span><strong>Question:</strong></span>
            <?= htmlspecialchars($question['content']) ?>
        </div>
        <hr/>

        <?php if ($this->tags) : ?>
            <div class="questionBoxTags">
                <strong>
                    <span>Tags: </span>
                    <?php foreach ($this->tags as $tag) : ?>
                        <span><?= htmlspecialchars($tag['name']); ?>,</span>
                    <?php endforeach ?>
                </strong>
            </div>

        <?php endif ?>

        <h3>
            <a href="/questions/createAnswer/<?= $question['id'] ?> ">Answer the question</a>
            <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] > 0) : ?>
                <span class="deleteButton">
                    <a href="/questions/deleteQuestion/<?= $question['id'] ?> ">[DELETE]</a>
                </span>
            <?php endif ?>
        </h3>
    </div>


    <?php if ($this->answers) : ?>
        <table class="responsesTable">

            <?php foreach ($this->answers as $answer) : ?>
                <tr>
                    <td class="answeredUserId">
                        <strong>
                            <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] > 0) : ?>
                                <a href="/questions/deleteAnswer/<?= htmlspecialchars($answer['id']) ?>/<?= $question['id'] ?> "
                                   class="warningText">[X]</a>
                            <?php endif ?>
                            <?= htmlspecialchars($answer['userName']) ?>:
                            <?php if ($answer['userEmail']) : ?>
                                <br/>
                                Email: <?= htmlspecialchars($answer['userEmail']) ?>
                            <?php endif ?>
                        </strong>
                        <hr/>
                    </td>
                </tr>
                <tr>
                    <td class="answeredContent"><?= htmlspecialchars($answer['content']) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php endif ?>

    <?php endforeach ?>
</div>