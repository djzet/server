<nav class="info-student">
    <p>Группа - <?= $groups['number'] ?>&emsp;( Дисциплина - <?= $disciplines['title'] ?> )</p>
    <div>
        <p>Студент</p>
        <p>Часы</p>
        <p>Семестр</p>
        <p>Контроль</p>
        <p>Оценка</p>
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
                foreach ($discipline_bodys as $discipline_body) {
                    echo '<li>' . '<div>' . $discipline_body->hours . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($discipline_bodys as $discipline_body) {
                    echo '<li>' . '<div>' . $discipline_body->semester . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($discipline_bodys as $discipline_body) {
                    echo '<li>' . '<div>' . $discipline_body->controlDisciplines->title . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . $rating_discipline->rating . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
