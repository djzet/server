-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 29 2023 г., 04:18
-- Версия сервера: 10.3.28-MariaDB
-- Версия PHP: 8.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `server`
--

-- --------------------------------------------------------

--
-- Структура таблицы `controls`
--

CREATE TABLE `controls`
(
    `id`    int(11)      NOT NULL,
    `title` varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `controls`
--

INSERT INTO `controls` (`id`, `title`)
VALUES (1, 'Оценка'),
       (2, 'Зачет'),
       (3, 'Экзамен');

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines`
(
    `id`       int(11)      NOT NULL,
    `title`    varchar(255) NOT NULL,
    `semester` int(11)      NOT NULL,
    `hours`    int(11)      NOT NULL,
    `control`  int(11)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`id`, `title`, `semester`, `hours`, `control`)
VALUES (1, 'Английский', 6, 200, 1),
       (2, 'Физ-ра', 6, 200, 1),
       (3, 'Математика', 2, 50, 3),
       (4, 'Русский', 2, 50, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups`
(
    `id`     int(11) NOT NULL,
    `number` int(11) NOT NULL,
    `course` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `number`, `course`)
VALUES (1, 100, 1),
       (2, 200, 2),
       (3, 300, 3),
       (4, 400, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `group_disciplines`
--

CREATE TABLE `group_disciplines`
(
    `id`            int(11) NOT NULL,
    `id_group`      int(11) NOT NULL,
    `id_discipline` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `group_disciplines`
--

INSERT INTO `group_disciplines` (`id`, `id_group`, `id_discipline`)
VALUES (1, 1, 1),
       (2, 1, 2),
       (3, 1, 3),
       (4, 1, 4),
       (5, 2, 1),
       (6, 2, 2),
       (7, 3, 3),
       (8, 3, 4),
       (9, 4, 1),
       (10, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `rating_disciplines`
--

CREATE TABLE `rating_disciplines`
(
    `id`            int(11) NOT NULL,
    `id_discipline` int(11) NOT NULL,
    `rating`        int(11) NOT NULL,
    `id_student`    int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `rating_disciplines`
--

INSERT INTO `rating_disciplines` (`id`, `id_discipline`, `rating`, `id_student`)
VALUES (1, 1, 5, 1),
       (2, 2, 5, 1),
       (3, 1, 5, 2),
       (4, 2, 5, 2),
       (5, 3, 5, 3),
       (6, 4, 5, 3),
       (7, 1, 5, 4),
       (8, 4, 5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles`
(
    `id`    int(11)      NOT NULL,
    `title` varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `title`)
VALUES (1, 'admin'),
       (2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students`
(
    `id`            int(11)      NOT NULL,
    `surname`       varchar(255) NOT NULL,
    `name`          varchar(255) NOT NULL,
    `patronymic`    varchar(255) NOT NULL,
    `gender`        varchar(255) NOT NULL,
    `date_birth`    date         NOT NULL,
    `group_student` int(11)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `surname`, `name`, `patronymic`, `gender`, `date_birth`, `group_student`)
VALUES (1, 'Иванов', 'Иван', 'Иванович', 'Мужской', '2001-01-01', 1),
       (2, 'Сидоров', 'Сергей', 'Сергеевич', 'Мужской', '2001-02-02', 2),
       (3, 'Петров', 'Петр', 'Петрович', 'Мужской', '2001-03-03', 3),
       (4, 'Максимов', 'Максим', 'Максимович', 'Мужской', '2001-04-04', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users`
(
    `id`       int(11)      NOT NULL,
    `login`    varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role`     int(11)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`)
VALUES (1, 'root', '63a9f0ea7bb98050796b649e85481845', 1),
       (2, 'tur', '832e21f9da1ad55895637d00686fdb42', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `controls`
--
ALTER TABLE `controls`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
    ADD PRIMARY KEY (`id`),
    ADD KEY `control` (`control`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group_disciplines`
--
ALTER TABLE `group_disciplines`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_group` (`id_group`, `id_discipline`),
    ADD KEY `id_discipline` (`id_discipline`);

--
-- Индексы таблицы `rating_disciplines`
--
ALTER TABLE `rating_disciplines`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_discipline` (`id_discipline`, `id_student`),
    ADD KEY `id_student` (`id_student`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
    ADD PRIMARY KEY (`id`),
    ADD KEY `group_student` (`group_student`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `login` (`login`),
    ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `controls`
--
ALTER TABLE `controls`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `group_disciplines`
--
ALTER TABLE `group_disciplines`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 11;

--
-- AUTO_INCREMENT для таблицы `rating_disciplines`
--
ALTER TABLE `rating_disciplines`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `disciplines`
--
ALTER TABLE `disciplines`
    ADD CONSTRAINT `disciplines_ibfk_1` FOREIGN KEY (`control`) REFERENCES `controls` (`id`);

--
-- Ограничения внешнего ключа таблицы `group_disciplines`
--
ALTER TABLE `group_disciplines`
    ADD CONSTRAINT `group_disciplines_ibfk_1` FOREIGN KEY (`id_discipline`) REFERENCES `disciplines` (`id`),
    ADD CONSTRAINT `group_disciplines_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`);

--
-- Ограничения внешнего ключа таблицы `rating_disciplines`
--
ALTER TABLE `rating_disciplines`
    ADD CONSTRAINT `rating_disciplines_ibfk_1` FOREIGN KEY (`id_discipline`) REFERENCES `disciplines` (`id`),
    ADD CONSTRAINT `rating_disciplines_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
    ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`group_student`) REFERENCES `groups` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
    ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
