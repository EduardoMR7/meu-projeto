SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `atendimento` (
  `idAtendimento` int(11) NOT NULL,
  `idFormaAtendimento` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `ativo` enum('S','N') NOT NULL,
  `respostaAtendimento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `atendimento` (`idAtendimento`, `idFormaAtendimento`, `idUsuario`, `dataCadastro`, `ativo`, `respostaAtendimento`) VALUES
(1, 1, 2, '2024-07-13 21:07:49', 'S', 'agora vai que vai que vai'),
(3, 2, 1, '2024-07-13 22:58:56', 'S', 'agora sim');

CREATE TABLE `formaatendimento` (
  `idFormaAtendimento` int(11) NOT NULL,
  `nomeAtendimento` varchar(255) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `formaatendimento` (`idFormaAtendimento`, `nomeAtendimento`, `dataCadastro`) VALUES
(1, 'Presencial', '2024-07-13 20:14:45'),
(2, 'Whatsapp', '2024-07-13 20:14:54'),
(3, 'Ligação', '2024-07-13 20:15:07'),
(4, 'E-mail', '2024-07-13 20:15:18'),
(5, 'Redes Sociais', '2024-07-13 20:15:33'),
(6, 'TEAMS', '2024-07-13 20:15:43'),
(7, 'Outros', '2024-07-13 20:15:54');

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `loginUsuario` varchar(255) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `telefoneCelular` varchar(45) NOT NULL,
  `ativo` enum('S','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `loginUsuario`, `senhaUsuario`, `dataCadastro`, `telefoneCelular`, `ativo`) VALUES 
(7, 'Eduardo Mello Rosa', 'eduardomellorosa58@gmail.com', 'eduardorosa', 'e10adc3949ba59abbe56e057f20f883e', '2024-07-13 05:05:14', '(51) 998407-4070', 'S'),
(10, 'Lucas Fraga de Oliveira', 'lucasfraga637@gmail.com', 'fragalu', 'e10adc3949ba59abbe56e057f20f883e', '2024-07-13 05:06:12', '(51) 99966-6661', 'S'),
(8, 'Douglas da Silva Michel', 'douglasmichel.176@gmail.com', 'douglasmichel', 'e10adc3949ba59abbe56e057f20f883e', '2024-07-13 19:59:05', '(51) 99966-6666', 'S'),
(9, 'Felipe Sampaio Portugues', 'felipesampaio702@gmail.com', 'fportugues', 'e10adc3949ba59abbe56e057f20f883e', '2024-07-13 21:00:00', '(51) 99966-6662', 'S');

ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`idAtendimento`),
  ADD KEY `idFormaAtendimento` (`idFormaAtendimento`),
  ADD KEY `idUsuario` (`idUsuario`);

  ALTER TABLE `formaatendimento`
  ADD PRIMARY KEY (`idFormaAtendimento`);

  ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

  ALTER TABLE `atendimento`
  MODIFY `idAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

  ALTER TABLE `formaatendimento`
  MODIFY `idFormaAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

  ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

  ALTER TABLE `atendimento`
  ADD CONSTRAINT `atendimento_ibfk_1` FOREIGN KEY (`idFormaAtendimento`) REFERENCES `formaatendimento` (`idFormaAtendimento`),
  ADD CONSTRAINT `atendimento_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;