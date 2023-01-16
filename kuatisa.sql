-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Abr-2021 às 18:01
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kuatisa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `address`
--

CREATE TABLE `address` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `street` varchar(255) NOT NULL DEFAULT '',
  `number` varchar(255) NOT NULL DEFAULT '',
  `complement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `app_categories`
--

CREATE TABLE `app_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `sub_of` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(15) NOT NULL DEFAULT '',
  `order_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `app_invoices`
--

CREATE TABLE `app_invoices` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `wallet_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `invoice_of` int(11) UNSIGNED DEFAULT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(15) NOT NULL DEFAULT '',
  `value` decimal(10,2) NOT NULL,
  `currency` varchar(5) NOT NULL DEFAULT 'BRL',
  `due_at` date NOT NULL,
  `repeat_when` varchar(10) NOT NULL DEFAULT '',
  `period` varchar(10) NOT NULL DEFAULT 'month',
  `enrollments` int(11) DEFAULT NULL,
  `enrollment_of` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `app_wallets`
--

CREATE TABLE `app_wallets` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `wallet` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `uri` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'post' COMMENT 'post, page, etc',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `title`, `uri`, `description`, `cover`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Controle', 'controle', 'Dicas e sacadas sobre como controlar suas contas com CaféControl. Vamos tomar um ótimo café?', NULL, 'post', '2018-10-22 15:24:12', '2018-10-22 15:24:12'),
(2, 'Informática', 'informatica', 'teste', NULL, 'post', '2021-03-28 22:56:36', '2021-03-28 22:56:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `redes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faq_channels`
--

CREATE TABLE `faq_channels` (
  `id` int(11) UNSIGNED NOT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `faq_channels`
--

INSERT INTO `faq_channels` (`id`, `channel`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sobre o Kuatisa', 'Saiba mais sobre o CaféControl', '2018-10-21 09:24:51', '2021-02-21 15:43:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `channel_id` int(11) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL DEFAULT '',
  `response` text NOT NULL,
  `order_by` int(11) UNSIGNED DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `faq_questions`
--

INSERT INTO `faq_questions` (`id`, `channel_id`, `question`, `response`, `order_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'O kuatisa é gratuito?', '<p>Sim, o Kuatisa é gratuito e com ele você pode usar os recursos para  mostar seu perfil sem qualquer custo ou cobrança.</p><p>No futuro pretendemos ter planos com recursos premium onde você terá ainda mais controle, este será um plano pago, mas você poderá optar por usa-lo ou continuar no plano gratuito.</p>', 1, '2018-10-21 09:28:11', '2021-04-23 12:10:17'),
(2, 1, 'O que fazer com o kuatisa?', '<p>Com o Kuatisa você pode procurar profissionais e solicitar eles através de seus dados divulgados. Caso sejas um profissional não hesita cadastra-se e mostre a sua área habilitação dados essências e poderás usufruir desta jornada tudo de forma muito simples.', 2, '2018-10-21 09:30:04', '2021-04-23 12:37:15'),
(4, 1, 'Como usar o kuatisa?', '<p>Para usar o kuatisa é simples, basta se cadastrar em nossa plataforma .</p><p>Caso sejas um cliente faça busca de profissionais freelancer de sua necessidade</p> ', 3, '2018-10-22 08:04:00', '2021-04-23 12:46:11'),
(5, 1, 'De onde surgiu o kuatisa?', '<p>O Kuatisa é um projeto que surgiu em 2019 no IMPN onde dois jovens sonhadores tiveram essa ideia para trabalharem nele como trabalho de conclusão do curso o objectivo geral é Implementar um sitio elctrónico, cujo o objectivo divulgar os prestadores de serviços diversos e reduzir a sobrecarga de esforço da população e não só, há procura de um prestador de serviços, para que seja, simples e eficaz</p>', 4, '2018-10-22 08:07:01', '2021-04-23 12:53:25'),
(6, 1, 'Sobre freelancer o que é?', '<p>De uma maneira bem resumida: Freelancer são profissionais com certas habilidades que os tomam capazes de lucrar com elas sem receber ordens de empresas ou pessoas em particular.</p>\r\n<p>Dessa forma, a definição geral de freelance abrange não só uma profissão, mas na verdade, faz parte deste termo um conjunto de profissões ou habilidades onde o profissional da área pode atuar. O profissional freelancer (comumente conhecido como freela no Brasil) é um profissional autônomo que oferece serviços, geralmente trabalhando em vários empregos para vários clientes ao mesmo tempo</p>', 5, '2018-10-22 08:10:32', '2021-04-23 13:16:26'),
(8, 1, 'Ainda com dúvidas?', '<p>Caso ainda tenha qualquer dúvida, fique a vontade para entrar em contato consoco em nossos canais de atendimento. Estamos aqui para te ajudar a controlar suas contas enquanto toma um ótimo café :)</p>', 6, '2018-10-22 08:11:58', '2018-10-22 08:12:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mail_queue`
--

CREATE TABLE `mail_queue` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `from_email` varchar(255) NOT NULL DEFAULT '',
  `from_name` varchar(255) NOT NULL DEFAULT '',
  `recipient_email` varchar(255) NOT NULL DEFAULT '',
  `recipient_name` varchar(255) NOT NULL DEFAULT '',
  `sent_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `report_access`
--

CREATE TABLE `report_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `users` int(11) NOT NULL DEFAULT 1,
  `views` int(11) NOT NULL DEFAULT 1,
  `pages` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `report_access`
--

INSERT INTO `report_access` (`id`, `users`, `views`, `pages`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 5, '2021-03-28 11:47:41', '2021-03-29 11:52:49'),
(3, 1, 1, 68, '2021-03-29 11:52:52', '2021-03-29 16:45:55'),
(4, 1, 1, 8, '2021-04-01 19:30:10', '2021-04-01 19:39:45'),
(5, 1, 3, 24, '2021-04-02 10:27:47', '2021-04-02 21:32:35'),
(6, 1, 1, 64, '2021-04-03 08:13:13', '2021-04-03 08:49:10'),
(7, 1, 1, 5, '2021-04-04 14:47:31', '2021-04-04 15:03:30'),
(8, 1, 1, 1, '2021-04-05 17:51:08', '2021-04-05 17:51:08'),
(9, 1, 2, 24, '2021-04-06 08:46:23', '2021-04-06 20:19:35'),
(10, 1, 2, 8, '2021-04-07 08:59:45', '2021-04-07 18:54:49'),
(11, 1, 1, 29, '2021-04-08 07:23:14', '2021-04-08 21:09:14'),
(12, 1, 1, 6, '2021-04-09 18:42:31', '2021-04-09 18:47:35'),
(13, 1, 2, 121, '2021-04-10 11:22:32', '2021-04-10 17:35:17'),
(14, 1, 1, 9, '2021-04-11 09:34:57', '2021-04-11 09:38:05'),
(15, 1, 1, 1, '2021-04-11 09:34:57', '2021-04-11 09:34:57'),
(16, 1, 1, 3, '2021-04-12 10:22:45', '2021-04-12 10:23:47'),
(17, 1, 1, 26, '2021-04-23 11:16:18', '2021-04-23 13:20:41'),
(18, 1, 2, 303, '2021-04-24 09:02:07', '2021-04-24 18:44:26'),
(19, 1, 2, 374, '2021-04-25 10:16:10', '2021-04-25 19:52:58'),
(20, 2, 4, 420, '2021-04-26 05:13:28', '2021-04-26 16:00:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `report_online`
--

CREATE TABLE `report_online` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` int(11) UNSIGNED DEFAULT NULL,
  `ip` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `agent` varchar(255) NOT NULL DEFAULT '',
  `pages` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `report_online`
--

INSERT INTO `report_online` (`id`, `user`, `ip`, `url`, `agent`, `pages`, `created_at`, `updated_at`) VALUES
(27, NULL, '::1', '/entrar', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 29, '2021-04-26 15:57:08', '2021-04-26 16:00:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `request_client`
--

CREATE TABLE `request_client` (
  `id` int(11) NOT NULL,
  `auth` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `name_client` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sms` text NOT NULL,
  `about_service` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `request_client`
--

INSERT INTO `request_client` (`id`, `auth`, `service`, `name_client`, `email`, `sms`, `about_service`, `created_at`) VALUES
(5, 56, 40, 'Amilcar CM', 'cordelioacmiguel@gmail.com', 'kkkkkkkkkkkkkkkk', 'Rasual', '2021-04-26 07:31:55'),
(6, 56, 39, 'Amilcar CM', 'cordelioacmiguel@gmail.com', 'lkkkkkkkkkkkkkkkk', 'sim', '2021-04-26 07:32:28'),
(7, 56, 39, 'Amilcar CM', 'al@gmail.com', 'jkbblj', 'sim', '2021-04-26 15:59:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` int(11) UNSIGNED DEFAULT NULL,
  `category` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `uri` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `content` text NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'draft' COMMENT 'post, draft, trash ',
  `post_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `author`, `category`, `title`, `uri`, `subtitle`, `content`, `cover`, `video`, `views`, `status`, `post_at`, `created_at`, `updated_at`, `deleted_at`, `contact`) VALUES
(39, 56, 1, 'testetitulo', 'testetitulo', 'testesubtitle', 'ddddddddddddddddd', 'images/2021/04/testetitulo-56-1619421104.jpg', NULL, 5, 'post', '2021-04-26 07:11:44', '2021-04-26 07:11:44', '2021-04-26 15:59:33', NULL, 1),
(40, 56, 1, 'testetitulo222', 'testetitulo222', 'testesubtitle2222', 'dssssssssssssssss', 'images/2021/04/testetitulo222-56-1619422269.jpg', NULL, 1, 'post', '2021-04-26 07:31:09', '2021-04-26 07:31:09', '2021-04-26 13:24:38', NULL, 1),
(41, 56, 1, 'testetitulo', 'testetitulo', 'dffff', 'mmmmmmmmmmmmmmmmmmmmmmmmmmmm', 'images/2021/04/testetitulo-56-1619452753.jpg', NULL, 0, 'post', '2021-04-26 15:59:13', '2021-04-26 15:59:13', '2021-04-26 15:59:13', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT 'registered' COMMENT 'registered, confirmed',
  `password` varchar(255) NOT NULL DEFAULT '',
  `forget` varchar(255) DEFAULT NULL,
  `document` varchar(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `status`, `password`, `forget`, `document`, `photo`, `created_at`, `updated_at`, `contact`) VALUES
(56, 'Alfredo', 'Manuel', 'alfredo@gmail.com', 'registered', '$2y$10$O6PAUmyhNwF9XR9bJGPEY.3PKcf6XnScTraQAYifp4xc48NLdRvki', NULL, NULL, 'images/user/avatar.jpg', '2021-03-27 14:15:11', '2021-04-10 12:39:30', 0),
(57, 'Mandy', 'Cavalo', 'alfredo1@gmail.com', 'registered', '$2y$10$RnAkkdZiUyv5RA.erdeQFOUbA1MDco9mB3CNgy3R4luVlpcyZiza6', NULL, NULL, 'images/user/avatar.jpg', '2021-04-10 11:24:10', '2021-04-10 12:39:37', 0),
(58, 'Cordelio', 'Cavalo', 'alfredo2@gmail.com', 'registered', '$2y$10$PyYq..0NjmxT3OWQLoLuhuHp.3BKKTv8.ni/sOLoIC/L9Et9XGb16', NULL, NULL, 'images/user/avatar.jpg', '2021-04-10 11:25:40', '2021-04-10 12:39:46', 0),
(59, 'Mandy', 'Manuel', 'alfr@gmail.com', 'registered', '$2y$10$RBWkHqBzcuLbn.uC33cN9uUANA55gdxjid/lbcih1AIrBER1.0A5q', NULL, NULL, NULL, '2021-04-26 11:50:54', NULL, 0),
(60, 'Alfredo', 'Manuel', 'aljjjj@gmail.com', 'registered', '$2y$10$Wv/RCsjdR0cdGfGPvm2uwe7iKjiOuQgHOhq1h9rUv4wepYBd1bUpS', NULL, NULL, NULL, '2021-04-26 11:54:10', NULL, 0),
(61, 'Mandy', 'ddd', 'dddddddd@ds.ds', 'registered', '$2y$10$NjbHBtnZcfoyoRp.vPgN1uwEvq02kM1ezYW2uxgPNxxKpfuaTLFkS', NULL, NULL, NULL, '2021-04-26 11:54:43', NULL, 0),
(62, 'Alfredo', 'ccccccc', 'coracmiguel@gmail.com', 'registered', '$2y$10$UBa3xQowYB9w58TcIUjJK.BHiVlxXcXAuWQWQpW25enT6U5Dl6v3e', NULL, NULL, NULL, '2021-04-26 11:56:55', NULL, 0),
(63, 'Cordelio', 'Cavalo', 'all@gmail.com', 'registered', '$2y$10$1I.le.3exQXIGfEGV9xmcOubOc9QI2.XrUsalSLqEmvQsQcZDMyOu', NULL, NULL, 'mmmmm', '2021-04-26 11:58:16', '2021-04-26 12:00:21', 0),
(64, 'ddd', 'Cavalo', 'al@gmcccail.com', 'registered', '$2y$10$8Ap0xOb2firHmyxwYj52eeR89Q5Xh2WTADNxHiSjSqQg1nH5TjW3y', NULL, NULL, 'images/user/avatar.jpg', '2021-04-26 12:02:23', NULL, 0),
(65, 'Manuel', 'Chivela', 'chivela@gmail.com', 'registered', '$2y$10$efJ2YTjYgWK/BAGRYQnCA.qIqGkE1hkzARK1SEA4CtCB2zHBjWx5i', NULL, NULL, 'images/user/avatar.jpg', '2021-04-26 12:03:34', NULL, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addr_user` (`user_id`);

--
-- Índices para tabela `app_categories`
--
ALTER TABLE `app_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_of` (`sub_of`);

--
-- Índices para tabela `app_invoices`
--
ALTER TABLE `app_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_user` (`user_id`),
  ADD KEY `app_wallet` (`wallet_id`),
  ADD KEY `app_category` (`category_id`),
  ADD KEY `app_invoice` (`invoice_of`);

--
-- Índices para tabela `app_wallets`
--
ALTER TABLE `app_wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_user` (`user_id`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `faq_channels`
--
ALTER TABLE `faq_channels`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Índices para tabela `mail_queue`
--
ALTER TABLE `mail_queue`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `report_access`
--
ALTER TABLE `report_access`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `report_online`
--
ALTER TABLE `report_online`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Índices para tabela `request_client`
--
ALTER TABLE `request_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth` (`auth`),
  ADD KEY `auth_2` (`auth`),
  ADD KEY `service` (`service`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category`),
  ADD KEY `user_id` (`author`);
ALTER TABLE `services` ADD FULLTEXT KEY `title` (`title`,`subtitle`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `app_categories`
--
ALTER TABLE `app_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `app_invoices`
--
ALTER TABLE `app_invoices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `app_wallets`
--
ALTER TABLE `app_wallets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `faq_channels`
--
ALTER TABLE `faq_channels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `mail_queue`
--
ALTER TABLE `mail_queue`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `report_access`
--
ALTER TABLE `report_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `report_online`
--
ALTER TABLE `report_online`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `request_client`
--
ALTER TABLE `request_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `app_categories`
--
ALTER TABLE `app_categories`
  ADD CONSTRAINT `sub_of` FOREIGN KEY (`sub_of`) REFERENCES `app_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `app_invoices`
--
ALTER TABLE `app_invoices`
  ADD CONSTRAINT `app_category` FOREIGN KEY (`category_id`) REFERENCES `app_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `app_invoice` FOREIGN KEY (`invoice_of`) REFERENCES `app_invoices` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `app_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `app_wallet` FOREIGN KEY (`wallet_id`) REFERENCES `app_wallets` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `app_wallets`
--
ALTER TABLE `app_wallets`
  ADD CONSTRAINT `wallet_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD CONSTRAINT `channel_id` FOREIGN KEY (`channel_id`) REFERENCES `faq_channels` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
