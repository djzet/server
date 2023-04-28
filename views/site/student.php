<nav class="info">
    <p>Студенты (<a href="<?= app()->route->getUrl('/create-student'); ?>">создать</a>)</p>
    <div>
        <p>Студент</p>
        <p>Редактировать</p>
        <p>Удалить</p>
    </div>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/progress') . '?id=' . $student->id . ">" . $student->surname . ' ' . $student->name . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/update-student') . '?id=' . $student->id . ">" . 'Редактировать' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li>' . '<div>' . '<a href="#">' . 'Удалить' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
