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
                    echo '<li>' . '<div>' . '<a href="#">' . $student->surname . ' ' . $student->name . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($discipline_bodys as $discipline_body) {
                    echo '<li>' . '<div>' . '<a href="#">' . $discipline_body->hours . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($discipline_bodys as $discipline_body) {
                    echo '<li>' . '<div>' . '<a href="#">' . $discipline_body->semester . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($discipline_bodys as $discipline_body) {
                    echo '<li>' . '<div>' . '<a href="#">' . $discipline_body->controlDisciplines->title . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . '<a href="#">' . $rating_discipline->rating . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
