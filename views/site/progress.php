<nav class="info-student">
    <p>Студент <?php
        foreach ($students as $student) {
            echo $student->surname . ' ' . $student->name . ' ' . '(гр. ' . $student->studentGroups->number . ')';
        }
        ?>
    </p>
    <div>
        <p>Дисциплина</p>
        <p>Часы</p>
        <p>Семестр</p>
        <p>Контроль</p>
        <p>Оценка</p>
    </div>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . '<a href="#">' . $rating_discipline->ratingDisciplines->title . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . '<a href="#">' . $rating_discipline->ratingDisciplines->hours . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . '<a href="#">' . $rating_discipline->ratingDisciplines->semester . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . '<a href="#">' . $rating_discipline->ratingDisciplines->controlDisciplines->title . '</a>' . '</div>' . '</li>';
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
