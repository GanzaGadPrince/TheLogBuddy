-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2025 at 10:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thelogbuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseid` int(11) NOT NULL,
  `coursename` varchar(250) DEFAULT NULL,
  `Descri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `coursename`, `Descri`) VALUES
(1, 'CRUD', 'PHP Create, Read, Update< and Delete actions'),
(2, 'logarithm', 'Log'),
(3, 'PHP Arrays', 'Learn arrays like a boss, no more lost data!'),
(4, 'MySQL Joins', 'Tables love to meet each other, join them!'),
(5, 'CRUD Basics', 'Create, read, update, delete, easy peasy.'),
(6, 'Assoc Arrays', 'Key-value pairs, like your school locker codes.'),
(7, 'Multidim Array', 'Arrays inside arrays, like inception!'),
(8, 'Three Dim Array', '3D arrays, because 2D is boring.'),
(9, 'SQL Select', 'Pick what you want from tables without crying.'),
(10, 'SQL Insert', 'Add stuff to your tables, instant magic.'),
(11, 'SQL Update', 'Change your mistakes, no teacher involved.'),
(12, 'SQL Delete', 'Delete like a ninja, tables beware!'),
(13, 'PHP If Else', 'Decisions in PHP without drama.'),
(14, 'PHP Loops', 'Do stuff again and again, no sweat.'),
(15, 'PHP Functions', 'Functions: code in a capsule, reusable!'),
(16, 'PHP Strings', 'Strings are friends, not scary monsters.'),
(17, 'MySQL Where', 'Filter like a pro, find your data fast.'),
(18, 'C Variables', 'Store stuff like a boss, numbers or text.'),
(19, 'C Loops', 'Repeat like a robot, no manual work.'),
(20, 'C Arrays', 'Keep data lined up like a row of desks.'),
(21, 'C Pointers', 'Point to memory, but don’t get lost!'),
(22, 'C Structs', 'Group stuff together, like friends in a team.'),
(23, 'HTML Basics', 'Make web pages, show off to friends.'),
(24, 'CSS Basics', 'Make your page pretty, no tears required.'),
(25, 'JavaScript Fun', 'Buttons, clicks, popups, total chaos!'),
(26, 'Python Intro', 'Snake language, but actually useful.'),
(27, 'OOP Concepts', 'Objects everywhere, like real life.'),
(28, 'Data Structures', 'Stacks, queues, lists, don’t panic.'),
(29, 'Algorithms', 'Step by step, like cooking instructions.'),
(30, 'Networking', 'Packets travel faster than your wifi rage.'),
(31, 'Operating Sys', 'Your PC has a brain, meet it.'),
(32, 'PHP Sessions', 'Remember users, like a diary.'),
(33, 'MySQL ForeignKey', 'Connect tables, like friends on social media.'),
(34, 'Error Handling', 'Mistakes happen, catch them like a pro.'),
(35, 'Recursion', 'Function calls itself, inception time.'),
(36, 'C Functions', 'Reusable code blocks, no copy-paste.'),
(37, 'C Strings', 'Handle text without losing your mind.'),
(38, 'C Input Output', 'Talk to the user, simple and fun.'),
(39, 'Math Algebra', 'X and Y, solve the mystery!'),
(40, 'Math Geometry', 'Shapes, angles, triangles, triangles everywhere!'),
(41, 'Physics Motion', 'Stuff moves, figure out how fast.'),
(42, 'Physics Force', 'Push, pull, don’t break anything.'),
(43, 'Chemistry Atoms', 'Tiny particles doing big drama.'),
(44, 'Chemistry Reactions', 'Mix stuff, see magic happen.'),
(45, 'Biology Cells', 'Tiny rooms inside living things.'),
(46, 'Biology DNA', 'Twist and shout, the code of life.'),
(47, 'English Grammar', 'Words in order, impress your teacher.'),
(48, 'English Writing', 'Write stories, avoid snores.'),
(49, 'History Wars', 'Learn battles without blood, fun!'),
(50, 'History Kings', 'Kings and queens, drama included.'),
(51, 'Geography Maps', 'Locate stuff, avoid getting lost.'),
(52, 'Geography Weather', 'Rain or shine, science explains it.'),
(53, 'Computer Ethics', 'Don’t hack, be cool, save the world.'),
(54, 'Algorithms 2', 'Sort stuff fast, impress friends.'),
(55, 'Database Design', 'Plan tables like building blocks.'),
(56, 'PHP Forms', 'Forms that actually work, wow.'),
(57, 'MySQL Index', 'Speed up search, be a hero.'),
(58, 'C Arrays 2D', 'Matrix fun, not boring!'),
(59, 'C Arrays 3D', 'Level up arrays, nerd mode.'),
(60, 'Python Loops', 'Repeat like a boss, less typing.'),
(61, 'Python Functions', 'Code once, use forever.'),
(62, 'Web Dev Basics', 'HTML+CSS+JS combo magic.'),
(63, 'Cybersecurity', 'Protect your stuff, stay safe.'),
(64, 'AI Intro', 'Robots thinking, kinda scary.'),
(65, 'Logic Gates', 'Electronics make decisions too.'),
(66, 'Statistics', 'Numbers tell stories, believe it.'),
(67, 'Economics Basics', 'Money, trade, confusing but fun.'),
(68, 'Psychology Intro', 'Brains are weird, study them.'),
(69, 'Sociology', 'People are strange, learn why.'),
(70, 'Art Drawing', 'Draw like Picasso, or try.'),
(71, 'Art Colors', 'Mix paints, make rainbows.'),
(72, 'Music Theory', 'Notes and beats, jam time.'),
(73, 'PE Fitness', 'Run, jump, exercise, survive school.'),
(74, 'Health Basics', 'Eat, sleep, repeat.'),
(75, 'C Pointers 2', 'Memory tricks, don’t crash.'),
(76, 'C Memory', 'Stack, heap, brain overload.'),
(77, 'C Debugging', 'Fix errors like a detective.'),
(78, 'PHP Sessions 2', 'Remember users, remember cookies.'),
(79, 'PHP Cookies', 'Sweet treats for your browser.'),
(80, 'SQL Joins 2', 'Connect tables, impress teachers.'),
(81, 'MySQL Triggers', 'Magic automatic actions, wow.'),
(82, 'CSS Animations', 'Make things move, eye candy.'),
(83, 'JS DOM', 'Change pages with clicks, live action.'),
(84, 'Python Lists', 'Organize stuff like a pro.'),
(85, 'Python Dictionaries', 'Keys and values, perfect combo.'),
(86, 'AI Ethics', 'Robots need manners too.'),
(87, 'Networks 2', 'LAN, WAN, chaos controlled.'),
(88, 'Operating Sys 2', 'Manage stuff without losing mind.'),
(89, 'Data Science', 'Numbers tell secrets, magic.'),
(90, 'Statistics 2', 'Charts, graphs, don’t fall asleep.'),
(91, 'English Speaking', 'Talk like a native, maybe.'),
(92, 'English Reading', 'Read books, avoid boredom.'),
(93, 'Biology Ecology', 'Plants, animals, drama.'),
(94, 'Chemistry Acids', 'Burn stuff safely.'),
(95, 'Physics Energy', 'Power everything, feel it.'),
(96, 'Math Calculus', 'X changes, Y reacts.'),
(97, 'Math Trig', 'Sine, cosine, fun curves.'),
(98, 'History Ancient', 'Old stuff, still interesting.'),
(99, 'Geography Climate', 'Weather all over, don’t panic.'),
(100, 'CS Robotics', 'Build bots, become overlord.'),
(101, 'CS AI 2', 'Make machines think, spooky.'),
(102, 'CS IoT', 'Internet of things, tiny spies.'),
(103, 'CS Cyber', 'Hackers beware, ethical only.'),
(104, 'CS Cloud', 'Data in the sky, magic.'),
(105, 'CS DBMS', 'Tables in clouds, easy.'),
(106, 'CS OOP', 'Objects live forever.'),
(107, 'CS JS Adv', 'Buttons, clicks, chaos.'),
(108, 'CS Python Adv', 'Loops, lists, fun coding.'),
(109, 'CS PHP Adv', 'Web magic, no tears.'),
(110, 'CS C Adv', 'Pointers, structs, brain hurt.'),
(111, 'CS Algorithms 3', 'Solve problems fast, flex.'),
(112, 'CS Networking 3', 'Packets fly, stay calm.'),
(113, 'Math Stats', 'Probability, maybe win lottery.'),
(114, 'Math Logic', 'Think hard, still confused.'),
(115, 'Physics Optics', 'Light bends, trippy!'),
(116, 'Physics Sound', 'Boom boom, hear it all.'),
(117, 'Chem Lab', 'Mix carefully, kaboom?'),
(118, 'Bio Genetics', 'Twist DNA, cool stuff.'),
(119, 'English Lit', 'Read stories, feel smart.'),
(120, 'History Med', 'Knights, castles, drama.'),
(121, 'Geography Maps 2', 'Find your way, avoid getting lost.'),
(122, 'Health Nutrition', 'Eat good, live long.'),
(123, 'PE Sports', 'Run, jump, dodge homework.'),
(124, 'Art Music', 'Sing, paint, repeat.'),
(125, 'CS Security 2', 'Passwords strong, hackers cry.'),
(126, 'CS Programming 2', 'Loops, arrays, magic tricks.'),
(127, 'CS Coding Fun', 'Code games, impress friends.'),
(128, 'CS Debugging Fun', 'Errors happen, fix them fast.'),
(129, 'CS Comp Sci Fun', 'All CS topics mixed, yay!');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `helpid` int(11) NOT NULL,
  `helpcourseid` int(11) NOT NULL,
  `helpfromuser` int(11) NOT NULL,
  `HelpDecri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`helpid`, `helpcourseid`, `helpfromuser`, `HelpDecri`) VALUES
(8, 122, 1, 'I just don\'t get it'),
(9, 125, 3, 'LAN === Nightmare'),
(12, 124, 3, 'Aaaaeeeeeeh! coughs'),
(13, 125, 2, 'Can\'t wait to hack jado'),
(14, 119, 2, 'How Do I learn these words, like thous'),
(15, 89, 7, 'Master I can\'t understand the secrets from the words'),
(16, 3, 12, 'I keep mixing up key terms in this unit and my notes don’t make sense.'),
(17, 7, 5, 'I fail most quizzes because I don’t understand the examples in class.'),
(18, 1, 18, 'The formulas confuse me and I forget the steps during tests.'),
(19, 10, 2, 'I struggle to summarize chapters and end up rewriting everything.'),
(20, 5, 9, 'I get stuck halfway through assignments and can’t finish them on time.'),
(21, 14, 4, 'The concepts feel too abstract and I need help breaking them down.'),
(22, 2, 17, 'I always misinterpret the questions and lose easy points.'),
(23, 8, 1, 'I understand in class but forget everything when revising alone.'),
(24, 6, 11, 'I can’t keep up with the pace, and the homework feels overwhelming.'),
(25, 12, 7, 'I get confused when switching between similar topics.'),
(26, 4, 15, 'I need someone to explain the basics again because I feel lost.'),
(27, 9, 6, 'I make too many small mistakes and don’t notice them.'),
(28, 13, 20, 'The lessons feel too fast and I need extra guidance to understand.'),
(29, 11, 16, 'I forget examples the teacher gives and can’t apply the rules.'),
(30, 3, 8, 'My understanding is shallow and I panic when solving problems.'),
(31, 15, 10, 'I need help organizing revision for this topic.'),
(32, 2, 14, 'The diagrams and steps confuse me, especially during practice.'),
(33, 18, 3, 'I mix up methods and can’t decide which one to use.'),
(34, 16, 13, 'I want someone to review my work and show me what I’m doing wrong.'),
(35, 7, 19, 'I study hard but still fail to connect the concepts together.');

-- --------------------------------------------------------

--
-- Table structure for table `helpee`
--

CREATE TABLE `helpee` (
  `helpeeid` int(11) NOT NULL,
  `helpeefromuser` int(11) NOT NULL,
  `helpeetouser` int(11) NOT NULL,
  `helpeecourseid` int(11) NOT NULL,
  `helpeehelpid` int(11) NOT NULL,
  `locationn` varchar(250) NOT NULL,
  `timee` varchar(250) NOT NULL,
  `datee` varchar(250) NOT NULL,
  `statuss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helpee`
--

INSERT INTO `helpee` (`helpeeid`, `helpeefromuser`, `helpeetouser`, `helpeecourseid`, `helpeehelpid`, `locationn`, `timee`, `datee`, `statuss`) VALUES
(2, 1, 3, 122, 9, 'LEVEL 5 SOD A', '6:00 p.m. - 7:30 p.m.', '', 0),
(3, 1, 3, 122, 8, 'LEVEL 5 SOD A', '8:20 p.m. - 9:20 p.m.', '', 0),
(4, 3, 7, 124, 12, 'LEVEL 5 SOD A', '6:00 p.m. - 7:30 p.m.', '', 0),
(5, 12, 3, 3, 16, 'LEVEL 5 SOD B', '3:10 p.m. - 3:30 p.m.', '2025-11-22', 0),
(6, 7, 2, 89, 15, 'LEVEL 5 SOD A', '3:10 p.m. - 3:30 p.m.', '2025-11-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `masteredcourse`
--

CREATE TABLE `masteredcourse` (
  `mcourseid` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `mastereddescri` text NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masteredcourse`
--

INSERT INTO `masteredcourse` (`mcourseid`, `courseid`, `mastereddescri`, `userid`) VALUES
(1, 111, '', 1),
(2, 121, '', 1),
(3, 125, '', 1),
(4, 80, 'Connect tables, impress teachers.', 1),
(5, 29, 'Step by step, like cooking instructions.', 1),
(6, 120, 'Knights, castles, drama.', 1),
(7, 128, 'Errors happen, fix them fast.', 1),
(8, 90, 'Charts, graphs, don’t fall asleep.', 1),
(23, 128, 'Errors happen, fix them fast.', 3),
(24, 89, 'Numbers tell secrets, magic.', 3),
(26, 128, 'Errors happen, fix them fast.', 7),
(27, 119, 'Read stories, feel smart.', 7),
(28, 123, 'Run, jump, dodge homework.', 7),
(29, 52, 'Rain or shine, science explains it.', 7),
(30, 124, 'Sing, paint, repeat.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meetid` int(11) NOT NULL,
  `meetingground` varchar(250) DEFAULT NULL,
  `ufrom` int(11) DEFAULT NULL,
  `uto` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `names` varchar(250) DEFAULT NULL,
  `usertype` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `names`, `usertype`) VALUES
(1, 'Admin', '202cb962ac59075b964b07152d234b70', 'GANZA Gad Prince', 'admin'),
(2, 'isake', '202cb962ac59075b964b07152d234b70', 'Abuhabu', 'normal'),
(3, 'justyouwait', '202cb962ac59075b964b07152d234b70', 'GANZA Gad Prince', 'normal'),
(4, 'SkateVibe07', '202cb962ac59075b964b07152d234b70', 'Ethan Murenzi', 'Normal'),
(5, 'NovaDrip', '202cb962ac59075b964b07152d234b70', 'Aime Uwase', 'Normal'),
(6, 'PixelRogue', '202cb962ac59075b964b07152d234b70', 'Samuel Hakizimana', 'Normal'),
(7, 'ShadowBlink', '202cb962ac59075b964b07152d234b70', 'Kevin Mugisha', 'Normal'),
(8, 'FrostyByte', '202cb962ac59075b964b07152d234b70', 'Teta Ineza', 'Normal'),
(9, 'EchoDash', '202cb962ac59075b964b07152d234b70', 'Brian Nkurunziza', 'Normal'),
(10, 'CloudKid', '202cb962ac59075b964b07152d234b70', 'Cynthia Mutoni', 'Normal'),
(11, 'VibePilot', '202cb962ac59075b964b07152d234b70', 'David Habimana', 'Normal'),
(12, 'ZippyZoom', '202cb962ac59075b964b07152d234b70', 'Linda Uwimana', 'Normal'),
(13, 'SparkPlug17', '202cb962ac59075b964b07152d234b70', 'Ivan Tuyishime', 'Normal'),
(14, 'Chillaxer', '202cb962ac59075b964b07152d234b70', 'Benitha Uwamahoro', 'Normal'),
(15, 'TurboTeens', '202cb962ac59075b964b07152d234b70', 'Eric Rukundo', 'Normal'),
(16, 'MysticPunch', '202cb962ac59075b964b07152d234b70', 'Aimable Nizeyimana', 'Normal'),
(17, 'SnackAttack', '202cb962ac59075b964b07152d234b70', 'Deborah Mukamana', 'Normal'),
(18, 'FlipSideKid', '202cb962ac59075b964b07152d234b70', 'Patrick Uwitonze', 'Normal'),
(19, 'RiftRider', '202cb962ac59075b964b07152d234b70', 'Laurette Ishimwe', 'Normal'),
(20, 'GigaChill', '202cb962ac59075b964b07152d234b70', 'Claude Ngendahayo', 'Normal'),
(21, 'HypeMode', '202cb962ac59075b964b07152d234b70', 'Sandra Uwimana', 'Normal'),
(22, 'NeonBreeze', '202cb962ac59075b964b07152d234b70', 'Yvan Mugabo', 'Normal'),
(23, 'CosmicSnack', '202cb962ac59075b964b07152d234b70', 'Joan Umutoni', 'Normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`helpid`),
  ADD KEY `courseid` (`helpcourseid`),
  ADD KEY `help_ibfk_2` (`helpfromuser`);

--
-- Indexes for table `helpee`
--
ALTER TABLE `helpee`
  ADD PRIMARY KEY (`helpeeid`),
  ADD KEY `courseid` (`helpeecourseid`),
  ADD KEY `fromuser` (`helpeefromuser`),
  ADD KEY `touser` (`helpeetouser`),
  ADD KEY `helpid` (`helpeehelpid`);

--
-- Indexes for table `masteredcourse`
--
ALTER TABLE `masteredcourse`
  ADD PRIMARY KEY (`mcourseid`),
  ADD KEY `courseid` (`courseid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meetid`),
  ADD KEY `ufrom` (`ufrom`),
  ADD KEY `uto` (`uto`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `helpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `helpee`
--
ALTER TABLE `helpee`
  MODIFY `helpeeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `masteredcourse`
--
ALTER TABLE `masteredcourse`
  MODIFY `mcourseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meetid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `help`
--
ALTER TABLE `help`
  ADD CONSTRAINT `help_ibfk_1` FOREIGN KEY (`helpcourseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `help_ibfk_2` FOREIGN KEY (`helpfromuser`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `helpee`
--
ALTER TABLE `helpee`
  ADD CONSTRAINT `helpee_ibfk_1` FOREIGN KEY (`helpeecourseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `helpee_ibfk_2` FOREIGN KEY (`helpeefromuser`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `helpee_ibfk_3` FOREIGN KEY (`helpeetouser`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `helpee_ibfk_4` FOREIGN KEY (`helpeehelpid`) REFERENCES `help` (`helpid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `masteredcourse`
--
ALTER TABLE `masteredcourse`
  ADD CONSTRAINT `masteredcourse_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`),
  ADD CONSTRAINT `masteredcourse_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`ufrom`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`uto`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `meeting_ibfk_3` FOREIGN KEY (`course`) REFERENCES `courses` (`courseid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
