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
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/progress') . '?id=' . $student->id . ">" . $student->surname . ' ' . $student->name . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li>' . '<div>' . '<a href="#">' . $student->studentGroups->number . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li>' . '<div>' . '<a href="#">' . $student->studentGroups->course . '</a>' . '</div>' . '</li>';
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
                echo '<li>' . '<div>' . '<a href="#">' . $discipline->title . '</a>' . '</div>' . '</li>';
            }
            ?>
        </ul>
    </div>
</nav>