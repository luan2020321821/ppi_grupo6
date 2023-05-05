
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dataingresso` varchar(30) NOT NULL,
  `siape` varchar(9) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `titulacao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `dataingresso`, `siape`, `estado`, `cidade`, `telefone`, `senha`) VALUES
(1, 'George Goncalves', 'teste@teste.com', '15/06/1990', '999999999', 'RS', 'Alegrete', '55998989898', 'teste123'),
(9, 'Gabriel', 'gabriel@teste.com', '13/13/1913', '82921962004', 'RS', 'Alegrete', '55999863393', 'testekkk');


