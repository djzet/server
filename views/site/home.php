<nav class="list-group">
    <p>Список групп</p>
    <div>
        <ul>
            <?php
            foreach ($groups as $group) {
                echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/progress-group') . '?id=' . $group->id . ">" . $group->number . '</a>' . '</div>' . '</li>';
            }
            ?>
        </ul>
    </div>
</nav>
<nav class="info">
    <p>Основная информация</p>
    <div>
        <p>Студент</p>
        <p>Группа</p>
        <p>Курс</p>
    </div>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li>' . '<div>' . $student->surname . ' ' . $student->name . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li>' . '<div>' . $student->studentGroups->number . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li>' . '<div>' . $student->studentGroups->course . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
<nav class="list-discipline">
    <p>Список дисциплин</p>
    <div>
        <ul>
            <?php
            foreach ($disciplines as $discipline) {
                echo '<li>' . '<div>' . $discipline->title . '</div>' . '</li>';
            }
            ?>
        </ul>
    </div>
</nav>