SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



CREATE TABLE IF NOT EXISTS `anuncio` (
  `id_anuncio` int(10) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `combustivel` varchar(50) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `anofabricacao` varchar(15) NOT NULL,
  `kilometragem` varchar(15) NOT NULL,
  `cambio` varchar(25) NOT NULL,
  `observacao` varchar(1000) NOT NULL,
  `foto` varchar(999) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `id_usuario_ref` int(10) NOT NULL,
  PRIMARY KEY (`id_anuncio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;



INSERT INTO `anuncio` (`id_anuncio`, `tipo`, `marca`, `modelo`, `combustivel`, `cor`, `anofabricacao`, `kilometragem`, `cambio`, `observacao`, `foto`, `valor`, `id_usuario_ref`) VALUES
(5, 'automovel', 'Chevrolet', 'Agile', 'Manual', 'Prata', '2011', '235000', '', 'Caro segundo dono, sugeito a testes e verificaÃ§Ãµes pelo comprador!', '', '36000,00', 2),
(9, 'automovel', 'Fiat', 'Marea', 'gasolina', 'chumbo perolizado', '2000', '235000', 'Manual', 'BARBADA!!!\r\nÃ“TIMO CARRO, EXCELENTE CUSTO BENEFICIO E SEGURANÃ‡A EM ADQUIRIR UM EXCELENTE VÃ‰ICULO, NA CERTEZA, SÃ“ SUCESSO.\r\nVAI COM SEGURO DE VIDA INCLUSO E NÃƒO ACEITO DEVOLUÃ‡Ã•ES!\r\nDISPENSO CURIOSOS, CARRO DE MULHER E UNICA DONA!\r\nTUDO REVISADO!', '', '45.562,99', 1),
(10, 'automovel', 'Chevrolet', 'Onix', 'flex', 'branco', '2015', '3500000', 'Manual', 'Caro de primeira!\r\n', '', '45.562,99', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
