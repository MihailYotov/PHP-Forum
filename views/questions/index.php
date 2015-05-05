<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <table>
        <?php foreach ($this->questions as $question) : ?>
        <tr>
            <th><?= htmlspecialchars($question['title']) ?></th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($question['content']) ?></td>
        </tr>
        <?php endforeach ?>
    </table>



</div>