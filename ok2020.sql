-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost:3306
-- Vytvořeno: Úte 14. dub 2020, 11:43
-- Verze serveru: 5.7.29-0ubuntu0.18.04.1
-- Verze PHP: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `ok2020`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_words` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perex` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discussion` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `articles`
--

INSERT INTO `articles` (`id`, `menu_id`, `title`, `url`, `user_id`, `published`, `description`, `key_words`, `perex`, `content`, `discussion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', 'home', 1, 1, 'Site Home page', 'home page', '<p>Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Aenean id metus id velit ullamcorper pulvinar. Praesent dapibus. Integer lacinia. Mauris metus. Integer pellentesque quam vel velit. Aliquam erat volutpat. Duis condimentum augue id magna semper rutrum. Aliquam ornare wisi eu metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Pellentesque ipsum. Vivamus porttitor turpis ac leo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Etiam neque. Pellentesque ipsum. Proin mattis lacinia justo. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Vestibulum fermentum tortor id mi. Duis pulvinar. Etiam commodo dui eget wisi.</p>\n<p>Integer tempor. Integer vulputate sem a nibh rutrum consequat. Aliquam erat volutpat. Suspendisse sagittis ultrices augue. Fusce nibh. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Nam quis nulla. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Proin in tellus sit amet nibh dignissim sagittis. Vivamus porttitor turpis ac leo. Duis pulvinar. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Aliquam erat volutpat. Mauris elementum mauris vitae tortor. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>\n<p>Morbi scelerisque luctus velit. Duis risus. Etiam bibendum elit eget erat. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Quisque porta. Integer lacinia. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Aliquam ante. Nullam rhoncus aliquam metus. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Phasellus faucibus molestie nisl. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Praesent vitae arcu tempor neque lacinia pretium. Nulla quis diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam dictum tincidunt diam. Etiam neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus luctus egestas leo.</p>\n<p>Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Nullam sit amet magna in magna gravida vehicula. Fusce nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque arcu. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vivamus porttitor turpis ac leo. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Etiam egestas wisi a erat. Integer vulputate sem a nibh rutrum consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Quisque tincidunt scelerisque libero. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>', 0, '2020-04-10 11:03:10', '2020-04-10 11:03:10'),
(2, 4, 'Proin mattis lacinia justo, etiam egestas wisi a erat', 'proin_mattis_lacinia_justo', 2, 1, 'Proin mattis lacinia justo, etiam egestas wisi a erat', 'Proin; mattis; lacinia; justo;', '<p>Proin mattis lacinia justo. Etiam egestas wisi a erat. Nullam at arcu a est sollicitudin euismod. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Aliquam erat volutpat. Praesent id justo in neque elementum ultrices. Etiam quis quam.</p>', '<p>Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Phasellus et lorem id felis nonummy placerat. Pellentesque ipsum. Donec quis nibh at felis congue commodo. Curabitur vitae diam non enim vestibulum interdum. Maecenas libero. Integer pellentesque quam vel velit. Phasellus rhoncus. Pellentesque arcu. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Integer imperdiet lectus quis justo. Vestibulum fermentum tortor id mi. Phasellus rhoncus. Etiam commodo dui eget wisi. Nulla quis diam. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Proin in tellus sit amet nibh dignissim sagittis. Proin mattis lacinia justo. Mauris metus. Nullam rhoncus aliquam metus. Fusce aliquam vestibulum ipsum. In dapibus augue non sapien. Fusce wisi. Nulla est.</p>\r\n<p>Nam sed tellus id magna elementum tincidunt. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? In dapibus augue non sapien. Etiam dictum tincidunt diam. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Nulla non lectus sed nisl molestie malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Fusce tellus. Vivamus ac leo pretium faucibus. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Nunc auctor. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Fusce consectetuer risus a nunc. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer malesuada. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam sed tellus id magna elementum tincidunt. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Maecenas sollicitudin. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Aliquam ante. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien.</p>', 0, '2020-04-12 18:11:09', '2020-04-13 13:49:44'),
(3, 4, 'Vivamus ac leo pretium faucibus, phasellus faucibus molestie nisl', 'vivamus_ac_leo_pretium_faucibus', 2, 1, 'Vivamus ac leo pretium faucibus', 'Vivamus; ac; leo; pretium; faucibus;', '<p>Vivamus ac leo pretium faucibus. Phasellus faucibus molestie nisl. Mauris elementum mauris vitae tortor. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Maecenas sollicitudin. In dapibus augue non sapien. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. In rutrum. Quisque tincidunt scelerisque libero. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero.</p>', '<p>In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Proin in tellus sit amet nibh dignissim sagittis. Cras elementum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Fusce suscipit libero eget elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est.</p>\r\n<p>Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Maecenas libero. Aliquam id dolor. Fusce consectetuer risus a nunc. Fusce tellus. Duis risus. Etiam neque. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Nullam at arcu a est sollicitudin euismod. Maecenas sollicitudin. Phasellus rhoncus. Curabitur bibendum justo non orci. Vivamus luctus egestas leo. Fusce tellus. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Curabitur bibendum justo non orci.</p>\r\n<p>Fusce consectetuer risus a nunc. Maecenas sollicitudin. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Etiam bibendum elit eget erat. Pellentesque sapien. Fusce tellus. Maecenas aliquet accumsan leo. Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Vestibulum fermentum tortor id mi. Sed convallis magna eu sem. Vivamus ac leo pretium faucibus.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam at arcu a est sollicitudin euismod. Nunc dapibus tortor vel mi dapibus sollicitudin. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer malesuada. Phasellus faucibus molestie nisl. Quisque porta. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Praesent id justo in neque elementum ultrices. Nam sed tellus id magna elementum tincidunt.</p>', 0, '2020-04-12 18:24:13', '2020-04-13 20:10:51'),
(4, 4, 'Fusce wisi, Aliquam ornare wisi eu metus', 'fusce_wisi', 2, 1, 'Fusce wisi', 'Fusce; wisi;', '<p>Fusce wisi. Aliquam ornare wisi eu metus. Duis risus. Fusce tellus. Nullam at arcu a est sollicitudin euismod. Nunc auctor. Aliquam id dolor. Etiam neque. Integer vulputate sem a nibh rutrum consequat. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit.</p>', '<p>Aenean placerat. Integer malesuada. Suspendisse nisl. Nulla est. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Phasellus faucibus molestie nisl. Nunc tincidunt ante vitae massa. Etiam neque. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Aliquam erat volutpat. Nunc auctor. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Pellentesque arcu. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Nullam eget nisl. Quisque tincidunt scelerisque libero. Fusce wisi. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien.</p>\r\n<p>Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Mauris tincidunt sem sed arcu. In rutrum. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Vestibulum fermentum tortor id mi. Aliquam erat volutpat. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Fusce wisi. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Ut tempus purus at lorem. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Integer in sapien.</p>\r\n<p>Integer tempor. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Aenean vel massa quis mauris vehicula lacinia. Vestibulum fermentum tortor id mi. Etiam dictum tincidunt diam. Etiam posuere lacus quis dolor. Integer in sapien. Nulla non lectus sed nisl molestie malesuada. In rutrum. Etiam bibendum elit eget erat. Phasellus faucibus molestie nisl. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit.</p>\r\n<p>Aenean placerat. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Phasellus faucibus molestie nisl. Maecenas lorem. Phasellus faucibus molestie nisl. Mauris metus. Aenean fermentum risus id tortor. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Nulla pulvinar eleifend sem. Fusce aliquam vestibulum ipsum. Phasellus faucibus molestie nisl. Etiam posuere lacus quis dolor. Nam sed tellus id magna elementum tincidunt.</p>', 0, '2020-04-12 18:57:31', '2020-04-13 21:29:48'),
(5, 4, 'Nulla accumsan, elit sit amet varius semper', 'nulla_accumsan_elit_sit_amet_varius_semper', 2, 1, 'Nulla accumsan, elit sit amet varius semper', 'Nulla accumsan, elit, sit amet, varius semper', '<p>Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Nulla non lectus sed nisl molestie malesuada. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla est. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam sed tellus id magna elementum tincidunt. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Et harum quidem rerum facilis est et expedita distinctio. Integer vulputate sem a nibh rutrum consequat. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Aliquam erat volutpat.</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Fusce consectetuer risus a nunc. Mauris tincidunt sem sed arcu. Duis pulvinar. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Nulla non lectus sed nisl molestie malesuada. Integer imperdiet lectus quis justo. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Etiam posuere lacus quis dolor. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Praesent in mauris eu tortor porttitor accumsan.</p>\r\n<p>Fusce wisi. Integer lacinia. Etiam egestas wisi a erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Sed convallis magna eu sem. Praesent in mauris eu tortor porttitor accumsan. Aliquam ornare wisi eu metus. Vivamus luctus egestas leo. Donec quis nibh at felis congue commodo. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Donec quis nibh at felis congue commodo. Integer imperdiet lectus quis justo. Nullam rhoncus aliquam metus. Donec quis nibh at felis congue commodo. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. In convallis.</p>\r\n<p>Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Nulla est. Phasellus et lorem id felis nonummy placerat. Cras elementum. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Duis risus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Vivamus luctus egestas leo. Praesent in mauris eu tortor porttitor accumsan. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Etiam bibendum elit eget erat. Aliquam erat volutpat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Curabitur sagittis hendrerit ante. Maecenas lorem. Fusce tellus.</p>\r\n<p>Nullam faucibus mi quis velit. Phasellus rhoncus. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Nunc dapibus tortor vel mi dapibus sollicitudin. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Phasellus et lorem id felis nonummy placerat. Etiam bibendum elit eget erat. Suspendisse sagittis ultrices augue. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Maecenas libero.</p>', 0, '2020-04-12 19:23:38', '2020-04-12 19:23:38'),
(6, 4, 'Pellentesque arcu, Integer tempor', 'pellentesque_arcu_Integer_tempor', 2, 1, 'Pellentesque arcu, Integer tempor', 'Pellentesque; arcu; Integer; tempor;', '<p>Pellentesque arcu. Integer tempor. Nullam rhoncus aliquam metus. Nunc tincidunt ante vitae massa. Donec quis nibh at felis congue commodo. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Integer pellentesque quam vel velit. Pellentesque pretium lectus id turpis. Nulla non arcu lacinia neque faucibus fringilla. Nullam sit amet magna in magna gravida vehicula. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo.</p>', '<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Proin mattis lacinia justo. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Praesent dapibus. Aliquam in lorem sit amet leo accumsan lacinia. Vivamus porttitor turpis ac leo. Ut tempus purus at lorem. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Nulla est. Integer pellentesque quam vel velit.</p>\r\n<p>Integer tempor. Mauris dictum facilisis augue. Praesent dapibus. In dapibus augue non sapien. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Fusce wisi. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Nulla est. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Nullam dapibus fermentum ipsum. Integer imperdiet lectus quis justo. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Integer lacinia. Integer vulputate sem a nibh rutrum consequat. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Aliquam in lorem sit amet leo accumsan lacinia.</p>\r\n<p>Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Mauris dictum facilisis augue. Suspendisse nisl. Nullam faucibus mi quis velit. Integer in sapien. Fusce aliquam vestibulum ipsum. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Donec iaculis gravida nulla. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Aenean fermentum risus id tortor. Pellentesque arcu. Integer pellentesque quam vel velit. Phasellus faucibus molestie nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris tincidunt sem sed arcu. Maecenas libero.</p>\r\n<p>Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Nulla non lectus sed nisl molestie malesuada. Duis pulvinar. Etiam quis quam. Aliquam ornare wisi eu metus. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Nullam sit amet magna in magna gravida vehicula. Curabitur bibendum justo non orci. Phasellus rhoncus. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Integer malesuada. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nunc dapibus tortor vel mi dapibus sollicitudin. Nullam eget nisl. Phasellus faucibus molestie nisl. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero.</p>', 0, '2020-04-13 11:56:59', '2020-04-13 11:56:59'),
(7, 4, 'Duis risus, vivamus ac leo pretium faucibus', 'duis_risus_vivamus_ac_leo_pretium_faucibus', 2, 1, 'Duis risus, Vivamus ac leo pretium faucibus', 'Duis; risus; Vivamus; ac; leo; pretium; faucibus;', '<p>Duis risus. Vivamus ac leo pretium faucibus. Integer tempor. Pellentesque pretium lectus id turpis. Pellentesque sapien. Curabitur sagittis hendrerit ante. Phasellus faucibus molestie nisl. Mauris metus. Proin mattis lacinia justo. Donec vitae arcu. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Duis pulvinar. Nunc auctor. Nulla quis diam. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Nullam at arcu a est sollicitudin euismod. Praesent vitae arcu tempor neque lacinia pretium. Phasellus faucibus molestie nisl. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor.</p>', '<p>Phasellus faucibus molestie nisl. Suspendisse nisl. Aliquam erat volutpat. Curabitur vitae diam non enim vestibulum interdum. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. In dapibus augue non sapien. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Cras elementum. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Etiam dictum tincidunt diam. Nulla non lectus sed nisl molestie malesuada. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque arcu.</p>\r\n<p>Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Curabitur sagittis hendrerit ante. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Suspendisse sagittis ultrices augue. Aenean id metus id velit ullamcorper pulvinar. Etiam posuere lacus quis dolor. Nullam sit amet magna in magna gravida vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Donec iaculis gravida nulla. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Donec quis nibh at felis congue commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n<p>Sed convallis magna eu sem. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla non lectus sed nisl molestie malesuada. Pellentesque sapien. Vestibulum fermentum tortor id mi. Maecenas libero. Etiam egestas wisi a erat. Vivamus porttitor turpis ac leo. Integer lacinia.</p>\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce consectetuer risus a nunc. Aenean fermentum risus id tortor. Praesent in mauris eu tortor porttitor accumsan. Morbi scelerisque luctus velit. Nulla quis diam. Suspendisse nisl. Nullam faucibus mi quis velit. Sed ac dolor sit amet purus malesuada congue. In sem justo, commodo ut, suscipit at, pharetra vitae, orci.</p>', 0, '2020-04-13 12:12:17', '2020-04-13 12:12:17'),
(15, 4, 'Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui', 'maecenas_ipsum_velit_consectetuer_eu_lobortis_ut_dictum_at_dui', 2, 1, 'Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui', 'Maecenas; ipsum; velit;', '<p>Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Integer malesuada. Mauris tincidunt sem sed arcu. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Aliquam erat volutpat. Curabitur sagittis hendrerit ante. Nullam dapibus fermentum ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam id dolor. Integer lacinia. Integer malesuada. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Praesent in mauris eu tortor porttitor accumsan. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer pellentesque quam vel velit. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Pellentesque pretium lectus id turpis. Praesent id justo in neque elementum ultrices.</p>', '<p>Aenean vel massa quis mauris vehicula lacinia. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Morbi scelerisque luctus velit. Nullam sit amet magna in magna gravida vehicula. Aenean vel massa quis mauris vehicula lacinia. Etiam egestas wisi a erat. Nullam dapibus fermentum ipsum. Morbi scelerisque luctus velit. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Praesent id justo in neque elementum ultrices. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit.</p>\r\n\r\n<p>Etiam bibendum elit eget erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Fusce consectetuer risus a nunc. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Vivamus ac leo pretium faucibus. Integer lacinia. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Integer vulputate sem a nibh rutrum consequat. Sed ac dolor sit amet purus malesuada congue. In dapibus augue non sapien. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Curabitur bibendum justo non orci. Cras pede libero, dapibus nec, pretium sit amet, tempor quis.</p>\r\n\r\n<p>Aliquam ornare wisi eu metus. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. In rutrum. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Aliquam erat volutpat. Duis viverra diam non justo. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Curabitur bibendum justo non orci. Duis pulvinar. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Etiam posuere lacus quis dolor. Praesent id justo in neque elementum ultrices. Integer tempor. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Sed ac dolor sit amet purus malesuada congue. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aliquam erat volutpat. Nunc dapibus tortor vel mi dapibus sollicitudin. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Pellentesque sapien. Praesent id justo in neque elementum ultrices. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', 0, '2020-04-13 19:43:52', '2020-04-13 19:43:52');

-- --------------------------------------------------------

--
-- Struktura tabulky `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_structure_id` smallint(5) UNSIGNED NOT NULL,
  `parent_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_page` tinyint(1) NOT NULL DEFAULT '0',
  `priority` smallint(6) NOT NULL,
  `type_of_page_id` smallint(6) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key_words` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `menus`
--

INSERT INTO `menus` (`id`, `web_structure_id`, `parent_menu_id`, `name`, `url`, `title_page`, `priority`, `type_of_page_id`, `meta_title`, `meta_description`, `meta_key_words`, `display`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Home', 'home', 1, 4, 1, 'Home', 'Home', 'Home', 1, '2020-04-10 11:03:10', '2020-04-13 21:29:58'),
(2, 1, NULL, 'Login', 'login', 0, 16, 12, 'Login', 'Login', 'Login', 1, '2020-04-10 11:03:10', '2020-04-13 07:31:14'),
(3, 1, NULL, 'Administrator', 'administrator', 0, 20, 13, 'Administrator', 'Administrator', 'Administrator', 1, '2020-04-10 11:03:10', '2020-04-13 21:29:58'),
(4, 1, 0, 'Blog', 'blog', 0, 8, 2, 'Blog', 'Blog', 'Blog', 1, '2020-04-10 11:05:11', '2020-04-13 21:29:56'),
(5, 1, 0, 'Durmitor', 'durmitor', 0, 12, 4, 'Durmitor photogalery', 'Durmitor photogalery', 'Durmitor, photogalery', 0, '2020-04-11 08:12:31', '2020-04-13 21:30:06');

-- --------------------------------------------------------

--
-- Struktura tabulky `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_07_133012_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_04_07_204918_create_web_structures_table', 1),
(6, '2020_04_07_210930_create_types_of_pages_table', 1),
(7, '2020_04_07_210938_create_menus_table', 1),
(8, '2020_04_07_214456_create_articles_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `roles`
--

CREATE TABLE `roles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`) VALUES
(1, 'Administrator', 'admin'),
(2, 'Manager', 'manager'),
(3, 'Moderator', 'moderator'),
(4, 'Registered', 'registered');

-- --------------------------------------------------------

--
-- Struktura tabulky `types_of_pages`
--

CREATE TABLE `types_of_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_of_page` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `switched_on` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `types_of_pages`
--

INSERT INTO `types_of_pages` (`id`, `type_of_page`, `switched_on`) VALUES
(1, 'Page', 1),
(2, 'Blog', 1),
(3, 'E-shop', 1),
(4, 'Photogalery', 1),
(5, 'All_photogaleries', 1),
(6, 'Forum', 1),
(7, 'Order', 1),
(8, 'Basket', 1),
(9, 'Customer', 1),
(10, 'Invoicing', 1),
(11, 'Contact', 1),
(12, 'Users', 1),
(13, 'Administrator', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nick` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` smallint(6) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `nick`, `email`, `password`, `role_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ondrej.kuzel@seznam.cz', '$2y$10$B3pT.iKemI.qL7ukLj15Uu50ZzHAr53MjWYx1Ee9fyx75f/beBbf6', 1, '2020-04-10 11:03:09', 'q9TBzJIQKgPDl9OxzK4OUrSM7iQphm6BbWQXjhbxqhwsQ2up89ye70ZIW85g', '2020-04-10 11:03:09', '2020-04-10 11:03:09'),
(2, 'ondrak', 'ondrej.kuzel@gmail.com', '$2y$10$6eZybPTMdu6pnyX6JlhHNe3gbdAM.SnnAhr0vmUIVMm4IyunqHRcK', 1, '2020-04-10 11:03:09', 'fLxWCUK30fIp60QBA0ut65Os8aHDXpyGVU2esiTXSkdSDUlkx8fwcDteJFWE', '2020-04-10 11:03:09', '2020-04-10 11:03:09');

-- --------------------------------------------------------

--
-- Struktura tabulky `web_structures`
--

CREATE TABLE `web_structures` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `web_structure` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `switched_on` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `web_structures`
--

INSERT INTO `web_structures` (`id`, `web_structure`, `switched_on`) VALUES
(1, 'horizontal menu', 1),
(2, 'vertical menu', 0),
(3, 'left block', 0),
(4, 'right block', 0);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_url_unique` (`url`);

--
-- Klíče pro tabulku `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_url_unique` (`url`);

--
-- Klíče pro tabulku `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Klíče pro tabulku `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Klíče pro tabulku `types_of_pages`
--
ALTER TABLE `types_of_pages`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- Klíče pro tabulku `web_structures`
--
ALTER TABLE `web_structures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pro tabulku `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pro tabulku `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pro tabulku `roles`
--
ALTER TABLE `roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `types_of_pages`
--
ALTER TABLE `types_of_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pro tabulku `web_structures`
--
ALTER TABLE `web_structures`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
