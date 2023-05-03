<nav class="info-student">
    <nav class="list-discipline">
        <p>Список студентов в группе</p>
        <div>
            <ul>
                <?php
                foreach ($group_students as $group_student) {
                    echo '<li>' . '<div>' . '<a href="/server/rating-create?id=' . $_GET['id'] . '&id_student=' . $group_student->id . '">' . $group_student->surname . ' ' . $group_student->name . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
