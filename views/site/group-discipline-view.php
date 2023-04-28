<nav class="info-student">
    <nav class="list-discipline">
        <p>Список списов дисципин с семемтром <?= $semesters['semester']; ?></p>
        <div>
            <ul>
                <?php
                foreach ($group_disciplines_views as $group_disciplines_view) {
                    echo '<li>' . '<div>' . '<a href="#">' . $group_disciplines_view->title . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
