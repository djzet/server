<nav class="info-student">
    <nav class="list-discipline">
        <p>Список дисциплин</p>
        <div>
            <ul>
                <?php
                foreach ($group_disciplines as $group_discipline) {
                    echo '<li>' . '<div>' . '<a href="/server/attach-create?id=' . $_GET['id'] . '&id_discipline=' . $group_discipline->id . '">' . $group_discipline->title . ' ' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
