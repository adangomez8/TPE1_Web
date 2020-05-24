-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2020 a las 07:22:26
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre`, `apellido`, `mail`, `password`) VALUES
(1, 'Adán', 'Gómez', 'adanvgomez1234@gmail.com', 'adan123'),
(2, 'Eugenio', 'Miller', 'eugeniomiller93@gmail.com', 'euge123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre`, `foto`) VALUES
(1, 'J. K. Rowling', 'https://navigator.ge/wp-content/uploads/2019/10/598afde61ffc511e880846b099cf5937.jpg'),
(2, 'George R.R. Martin', 'https://images.pagina12.com.ar/styles/focal_3_2_960x640/public/media/articles/46332/martin_0.jpg?itok=gp4TISJt'),
(3, 'Julio Cortázar ', 'https://2.bp.blogspot.com/_bDp_dN-4hD8/SJowh9zCcWI/AAAAAAAAABw/efKhRGHQ4tk/w1200-h630-p-k-no-nu/jc.jpg'),
(4, 'Jorge Luis Borges', 'https://images.pagina12.com.ar/styles/focal_3_2_960x640/public/media/articles/13103/borges4.jpg?itok=HXhqK0pw'),
(5, 'John Katzenbach', 'https://3.bp.blogspot.com/-DTQqO1km0pM/WOZ4k9uGPdI/AAAAAAAALKE/fIKt70E7YkI1L5gDHTG7lF7TiYWMd1qbwCLcB/s1600/John-Katzenbach.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `genero` text NOT NULL,
  `sinopsis` text NOT NULL,
  `anio` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `id_autor_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre`, `genero`, `sinopsis`, `anio`, `imagen`, `leido`, `id_autor_fk`) VALUES
(1, 'Harry Potter y la piedra filosofal ', 'Novela, literatura fantástica, literatura juvenil', 'El día de su cumpleaños, Harry Potter descubre que es hijo de dos conocidos hechiceros, de los que ha heredado poderes mágicos. Debe asistir a una famosa escuela de magia y hechicería, donde entabla una amistad con dos jóvenes que se convertirán en sus compañeros de aventura. Durante su primer año en Hogwarts, descubre que un malévolo y poderoso mago llamado Voldemort está en busca de una piedra filosofal que alarga la vida de quien la posee.', 1997, 'https://salamandra.info/sites/default/files/styles/book_detail/public/books/covers/hp_y_la_piedra_filosofal.jpg?itok=GWUphIke', 0, 1),
(2, 'Harry Potter y la cámara secreta', 'Novela, literatura fantástica, literatura juvenil.', 'Sin saber que alguien ha abierto la Cámara de los Secretos, dejando escapar una serie de monstruos peligrosos, Harry y sus amigos Ron y Hermione tendrán que enfrentarse con arañas gigantes, serpientes encantadas, fantasmas enfurecidos y, sobre todo, con la mismísima reencarnación de su más temible adversario.', 1998, 'https://salamandra.info/sites/default/files/styles/book_detail/public/books/covers/hp_y_la_camara_secreta.jpg?itok=EmdY8_eM', 0, 1),
(3, 'Harry Potter y el prisionero de Azkaban', 'Novela, literatura fantástica, literatura juvenil. ', 'De la prisión de Azkaban se ha escapado un terrible villano, Sirius Black, un asesino en serie que fue cómplice de lord Voldemort y que, dicen los rumores, quiere vengarse de Harry por haber destruido a su maestro. ... El desafío es enorme, pero Harry, Ron y Hermione son capaces de enfrentarse a todo esto y mucho más.', 1999, 'https://salamandra.info/sites/default/files/styles/book_detail/public/books/covers/hp_y_la_camara_secreta.jpg?itok=EmdY8_eM', 0, 1),
(4, 'Harry Potter y el cáliz de fuego', 'Novela, literatura juvenil, literatura fantástica.', 'Tras otro abominable verano con los Dursley, Harry se dispone a iniciar el cuarto curso en Hogwarts, la famosa escuela de magia y hechicería. A sus catorce años, a Harry le gustaría ser un joven mago como los demás y dedicarse a aprender nuevos sortilegios, encontrarse con sus amigos Ron y Hermione y asistir con ellos a los Mundiales de Quidditch. Sin embargo, al llegar al colegio le espera una gran sorpresa que lo obligará a enfrentarse a los desafíos más temibles de toda su vida. Si logra superarlos, habrá demostrado que ya no es un niño y que está preparado para vivir las nuevas y emocionantes experiencias que el futuro le depara.', 2000, 'https://salamandra.info/sites/default/files/styles/book_detail/public/books/covers/hp_caliz_de_fuego_y_el_2015_300_rgb.jpg?itok=lKZC7g_n', 0, 1),
(5, 'Quidditch a través de los tiempos', 'Literatura fantástica, fantasía contemporanea.', 'Si alguna vez te has preguntado de dónde proviene la snitch dorada, cómo adquieren vida las bludgers o por qué los Wigtown Wanderers llevan un cuchillo de carnicero dibujado en el uniforme, entonces querrás leer Quidditch a través de los tiempos. Esta edición es una copia del ejemplar que está en la biblioteca del Colegio Hogwarts y que los jóvenes fanáticos del quidditch consultan casi a diario.', 2001, 'https://imagessl3.casadellibro.com/a/l/t5/93/9788498382693.jpg', 0, 1),
(6, 'Animales fantásticos y donde encontrarlos', 'Drama, literatura fantástica, ficción de aventura.', 'En 1926, el mago experto en zoología Newt Scamander hace una breve parada en Nueva York mientras viaja catalogando y capturando criaturas mágicas por el mundo. Jacob, un humano corriente, provoca por error que las criaturas escapen y se oculten por la ciudad. Scamander tendrá que atraparlas de nuevo, antes de que causen problemas.', 2001, 'https://imagessl2.casadellibro.com/a/l/t5/02/9788498387902.jpg', 0, 1),
(7, 'Harry Potter y la orden del fénix', 'Novela, literatura fantástica, literatura juvenil.', 'Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se encuentra más inquieto que nunca. Apenas ha tenido noticias de Ron y Hermione, y presiente que algo extraño está sucediendo en Hogwarts. En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus temores se vuelven realidad. El Ministerio de Magia niega que Voldemort haya regresado y ha iniciado una campaña de desprestigio contra Harry y Dumbledore, para lo cual ha asignado a la horrible profesora Dolores Umbridge la tarea de vigilar todos sus movimientos. Así pues, además de sentirse solo e incomprendido, Harry sospecha que Voldemort puede adivinar sus pensamientos, e intuye que el temible mago trata de apoderarse de un objeto secreto que le permitiría recuperar su poder destructivo.', 2003, 'https://http2.mlstatic.com/libro-harry-potter-y-la-orden-del-fenix-9788498386646-sm-D_NQ_NP_995292-MLA31578244936_072019-F.jpg', 0, 1),
(8, 'Juego de tronos', 'Ficción política, fantasía', 'En el legendario mundo de los Siete Reinos, donde el verano puede durar décadas y el invierno toda una vida, y donde rastros de una magia inmemorial surgen en los rincones más sombríos, la tierra del norte, Invernalia, está resguardada por un colosal muro de hielo que detiene a fuerzas oscuras y sobrenaturales.\r\n\r\nEn este majestuoso escenario, lord Stark y su familia se encuentran en el centro de un conflicto que desatará todas las pasiones: la traición y la lealtad, la compasión y la sed de venganza, el amor y el poder, la lujuria y el incesto, todo ello para ganar la más mortal de las batallas: el trono de hierro, una poderosa trampa que atrapará a los personajes -y al lector.\r\n\r\nLos paisajes tienen más en común con la cadencia de Shakespeare, la intensidad de Kipling o el sentido aventurero de Melville, que con la épica de Tolkien.\r\n\r\nEl auténtico ariete de Martin son las esquirlas del alma humana, y sus criaturas se desenvuelven en los territorios de lo carnal sin necesidad de magia o fuegos artificiales. No hay en la obra del escritor anillos ni pócimas, sino espadas, ejércitos y muros.\r\n\r\nEn las páginas de Martin conviven Hamlet y Chéjov, Milton y Dickens, Conan y El Rey Arturo, en una extraña mezcla que avanza con puño de hierro, sustentado en un pilar gris y oscuro: la certeza de que lo peor aún está por llegar.\r\n\r\nJuego de tronos es el primer volumen de Canción de hielo y fuego, la monumental saga de fantasía épica del escritor George R. R. Martin que ha vendido más de 20 millones de ejemplares en todo el mundo. Traducida a más de 30 idiomas, esta novela ha sido adaptada a la televisión en una superproducción de HBO con gran éxito.\r\n', 1996, 'https://images.cdn1.buscalibre.com/fit-in/360x360/3d/76/3d76043985ab3665f9bbbaa4fdf4deaa.jpg', 0, 2),
(9, 'Choque de reyes', 'Ficción política, fantasía', 'Un cometa del color de la sangre hiende el cielo, cargado de malos augurios. Y hay razones sobradas para pensar así: los Siete Reinos se ven sacudidos por las luchas intestinas entre los nobles por la sucesión al Trono de Hierro. En la otra orilla del mar Angosto, la princesa Daenerys Targaryen conduce a su pueblo de jinetes salvajes a través del desierto. Y en los páramos helados del norte, más allá del Muro, un ejército implacable avanza hacia un territorio asolado por el caos y las guerras fratricidas.\r\nGeorge R.R. Martin, con pulso firme y enérgico, nos deleita con un brillante despliegue de personajes, engranando una trama rica, densa y sorprendente. Nos vuelve testigos de luchas fratricidas, intrigas y traiciones palaciegas en una tierra maldita por la guerra, donde fuerzas ocultas se alzan de nuevo y acechan para reinar en las noches del largo invierno que se avecina.\r\n', 1998, 'https://www.planetadelibros.com.ar/usuaris/libros/fotos/293/m_libros/292512_portada_juego-de-tronos-choque-de-reyes-n-0103_aa-vv_201901161311.jpg', 0, 2),
(10, 'Tormenta de espadas', 'Ficción política, fantasía', 'Las huestes de los fugaces reyes de Poniente, descompuestas en hordas, asuelan y esquilman una tierra castigada por la guerra e indefensa ante un invierno que se anuncia inusitadamente crudo. Las alianzas nacen y se desvanecen como volutas de humo bajo el viento helado del Norte. Ajena a las intrigas palaciegas, e ignorante del auténtico peligro en ciernes, la Guardia de la Noche se ve desbordada por los salvajes. Y al otro lado del mundo, Daenerys Targaryen intenta reclutar en las Ciudades Libres un ejército con el que desembarcar en su tierra. Martin hace que lo imposible parezca sencillo. Tormenta de espadas confirma Canción de hielo y fuego como un hito de la fantasía épica. Brutal y poética, conmovedora y cruel, la magia de Martin, como la del mundo de Poniente, necesita apenas una pincelada para cautivar al lector, hacerlo reír y llorar, y conseguir que el asombro ceda paso a la más profunda admiración por la serie.', 2000, 'https://contentv2.tap-commerce.com/cover/large/9789506442415_1.jpg?id_com=1113', 0, 2),
(11, 'Festín de cuervos', 'Ficción política, fantasía', 'Mientras los vientos del otoño desnudan los árboles, las últimas cosechas se pudren en los pocos campos que no han sido devastados por la guerra, y por los ríos teñidos de rojo bajan cadáveres de todos los blasones y estirpes. Y aunque casi todo Poniente yace extenuado, en diversos rincones florecen nuevas e inquietantes intrigas que ansían nutrirse de los despojos de un reino moribundo.', 2005, 'https://www.ventadelibros.com.ar/wp-content/uploads/2020/02/690255-MLA32105342864_092019-O.jpg', 0, 2),
(12, 'Danza de dragones', 'Ficción política, fantasía', '\"Danza de dragones\" es el quinto libro de la saga \"Canción de hielo y fuego\". Narra los acontecimientos posteriores al tercer libro \"Tormenta de espadas\", simultáneos a los acaecidos en el cuarto, \"Festín de cuervos\". La Guerra de los Cinco Reyes parece que decae. En el Norte, el Rey Stannis Baratheon se ha instalado en el Muro y ha jurado ganarse la lealtad de los norteños para continuar su lucha para reclamar el Trono de Hierro, aunque esto se complica porque la mayoría de la costa oeste está ocupada por los Hijos del Hierro. En el propio Muro Jon Nieve ha sido elegido 998 Lord Comandante de la Guardia de la Noche, pero tiene enemigos tanto en la Guardia como más allá del Muro. Tyrion Lannister ha sido llevado en barco al otro lado del Mar Angosto a la Ciudad Libre de Pentos, pero su destino final es desconocido incluso para él. En el lejano este, Daenerys Targaryen ha conquistado la ciudad de Meereen, pero ha decidido quedarse y gobernarla, perfeccionando sus habilidades como dirigente que serán necesarias cuando viaje a Poniente. Pero la existencia de Daenerys ya es conocida por muchos en Poniente y desde las islas del Hierro y Dorne, desde Antigua y las Ciudades Libres se mandan emisarios para encontrarla y usar su causa para sus propios beneficios.', 2011, 'https://contentv2.tap-commerce.com/cover/large/9789506442545_1.jpg?id_com=1113', 0, 2),
(13, 'Nómadas nocturnos', 'Novela', 'Nómadas nocturnos. Los volcryn están a punto de desgarrar el Velo del Tentador, que pende como una niebla negra entre las estrellas. Y nosotros los seguimos por los abismos interestelares que nadie más transita. A través del vacío, a través del silencio infinito, vamos en pos de ellos mi Nómada Nocturno y yo.', 1980, 'https://1.bp.blogspot.com/-DPoE6rnxLLQ/XezezJUeLdI/AAAAAAAAYQ4/B-EPHYb4K_E_TUvAXbp0f_hlKwZmWkPiQCNcBGAsYHQ/s1600/nomadas%2Bnocturnos.jpg', 0, 2),
(14, 'Muerte de la luz', 'Cuento, ficción', 'Worlorn acoge en sus ciudades vacías un reducido número de habitantes, entre ellos el noble kavalar Jaantony Riv alto-Jadehierro Vikary del clan Jadehierro, su teyn Garse Janacek y su betheyni Gwen Delvano. Gwen pide ayuda a Dirk t\'Larien, un antiguo amante a quien abandonó en Avalón, y este acude a ella llevando en la mano la joya susurrante que una vez le regalase, símbolo de un lazo que pretendía durar para siempre, y las brasas del amor pasado aún encendidas en el corazón. Pero Jadehierro no es el único clan de Alto Kavalaan que permanece en Worlorn; su civilización arcaica y bárbara tiene su máximo exponente en los Braith y en la práctica de su deporte favorito: la caza de cuasi-hombres en los paisajes desolados del planeta. Muerte de la luz es la primera novela de George R.R. Martin y una obra de culto entre los aficionados a la ciencia ficción.', 1977, 'http://quelibroleo.com/images/libros/libro_1317311593.jpg', 0, 2),
(15, 'Rayuela', 'Novela, ficción', 'Worlorn acoge en sus ciudades vacías un reducido número de habitantes, entre ellos el noble kavalar Jaantony Riv alto-Jadehierro Vikary del clan Jadehierro, su teyn Garse Janacek y su betheyni Gwen Delvano. Gwen pide ayuda a Dirk t\'Larien, un antiguo amante a quien abandonó en Avalón, y este acude a ella llevando en la mano la joya susurrante que una vez le regalase, símbolo de un lazo que pretendía durar para siempre, y las brasas del amor pasado aún encendidas en el corazón. Pero Jadehierro no es el único clan de Alto Kavalaan que permanece en Worlorn; su civilización arcaica y bárbara tiene su máximo exponente en los Braith y en la práctica de su deporte favorito: la caza de cuasi-hombres en los paisajes desolados del planeta. Muerte de la luz es la primera novela de George R.R. Martin y una obra de culto entre los aficionados a la ciencia ficción.', 1963, 'https://http2.mlstatic.com/rayuela-julio-cortazar-libro-ed-conmemorativa-rae-D_NQ_NP_698360-MLA30242130470_052019-F.webp', 0, 3),
(16, 'Bestiario', 'Cuento, ficción', 'Bestiario es el primer libro de relatos que Julio Cortázar publica con su auténtico nombre. No hay en estas ocho obras maestras ni el menor balbuceo ni resacas juveniles: son perfectas. Estos cuentos, que hablan de objetos y hechos cotidianos, pasan a la dimensión de la pesadilla o de la revelación de un modo natural e imperceptible. Sorpresa o incomodidad son, en cada texto, un condimento que se agrega al placer indescriptible de su lectura. Sus relatos nos desazonan porque poseen una característica muy rara en la literatura: se nos quedan mirando, como si esperaran algo de nosotros. Después de leer estos verdaderos clásicos del género, nuestra opinión sobre el mundo no puede seguir siendo la misma.', 1951, 'https://static.megustaleer.com/images/libros_650_x/AL1657A.jpg', 0, 3),
(17, 'Casa tomada', 'Cuento, ficción', 'El cuento de la casa tomada narra cómo dos hermanos son expulsados de su propia casa familiar a causa de “algo” que se va apoderando de ella, desplazándolos poco a poco a lo largo de las habitaciones de la casa, hasta la calle.\r\n\r\nEl protagonista y su hermana Irene, se resisten a abandonarla, lamentando tan sólo las pérdidas que les ocasiona ese “algo” cada vez que toma una parte de la casa.\r\n\r\nPero, cuando ésta es tomada completamente, no tienen más remedio que dejarla, llevándose únicamente consigo un reloj y la llave de la casa, de la cual se deshacen tirándola por la cloaca.\r\n', 1946, 'https://3.bp.blogspot.com/-OFAJkvbgQko/WfIOimcYROI/AAAAAAAACh4/04IiN91WkIc8WOIkYAlqOUgeilBeyYoOgCLcBGAs/s1600/casatomada.jpg', 0, 3),
(18, 'El final del juego', 'Ficción', 'En el Final del juego este es un hombre de negocios que regresa a su mansión en un lugar de bosques y prados. Después de completar los procedimientos típicos de regresar a casa, va a su oficina donde se acomoda poniendo su silla de terciopelo de espaldas a la puerta y frente a una ventana que da al bosque. De esta manera, el hombre continúa muy sumergido en una novela que había estado leyendo en su viaje en tren y que había dejado para asuntos urgentes.', 1956, 'https://www.traficantes.net/sites/default/files/styles/Portada200alto/public/book_covers/9788466331852.GIF?itok=JEclt6FE', 0, 3),
(19, 'La vuelta al día en ochenta mundos', 'Novela, narrativa', 'En La vuelta al día en ochenta mundos (1967) Julio Cortázar propone desde el título, una visión distinta de la conocida. Ese es el sentido de la inversión del título de la obra clásica de Julio Verne. A partir de ahí arrancan los efectos de \"improvisación\" y disgresión repartidos a lo largo de los \"ochenta mundos\": \"A mi tocayo le debo el título de este libro y a Lester Young la libertad de alterarlo sin ofender la saga de “Phileas Fogg\". Julio Verne y el jazz se conjugan y dialogan en la escritura intersticial de Cortázar y sus mundos. El libro muestra la formación universal del autor y puede considerarse como su enciclopedia personal en donde se incluyen sus reflexiones sobre la literatura, el mundo, su posición política, su creación poética, sus lecturas y autores preferidos, sus descubrimientos por analogías, su sentido del humor. Un inventario tan variado que gira permanentemente en torno de sus preocupaciones fundamentales.', 1967, 'https://i.pinimg.com/originals/5d/9b/d1/5d9bd1f051ddae64f26e3abbd61a4a21.jpg', 0, 3),
(20, 'Todos los fuegos el fuego', 'Cuento, ficción', 'Una referencia obligada para cualquier lector. «Los ídolos infunden respeto, admiración, cariño y, por supuesto, grandes envidias. Cortázar inspiraba todos esos sentimientos como muy pocos escritores, pero inspiraba además otro menos frecuente: la devoción.» Gabriel García Márquez. Ocho muestras rotundas de la plenitud creadora que alcanzan los cuentos de Cortázar... Títulos como «La autopista del Sur» «Reunión» «La salud de los enfermos» o «La señorita Cora» en los que el autor abrió nuevos caminos por los que año tras año siguen transitando los lectores y los amantes del cuento.\r\n\r\n', 1966, 'https://www.elresumen.com/tapas_libros/todos_los_fuegos_el_fuego.jpg', 0, 3),
(21, 'El psicoanalista ', 'Thriller, suspenso', '«Feliz aniversario, doctor. Bienvenido al primer día de su muerte.» Así comienza el anónimo que recibe el psicoanalista Frederick Starks, y que le obliga a emplear toda su astucia y rapidez para, en quince días, averiguar quién es el autor de esa amenazadora misiva que promete hacerle la vida imposible. De no conseguir su objetivo, deberá elegir entre suicidarse o ser testigo de cómo, uno tras otro, sus familiares y conocidos mueren por obra de un psicópata decidido a llevar hasta el final su sed de venganza. Dando un inesperado giro a la relación entre médico y paciente, John Katzenbach nos ofrece una novela emblemática del mejor suspense psicológico. La edición publicada en 2012 para conmemorar el décimo aniversario de la primera edición original de El psicoanalista, incluye un epílogo que John Katzenbach ha escrito especialmente para los lectores en lengua española.', 2002, 'https://http2.mlstatic.com/libro-nuevo-el-psicoanalista-john-katzenbach-D_NQ_NP_957315-MLA29398457441_022019-F.jpg', 0, 5),
(22, 'La historia del loco', 'Novela, thriller, suspenso, misterio', 'Su familia lo recluyó en el psiquiátrico tras una conducta imprevisible. Pero un reencuentro en los terrenos de la clausurada institución remueve algo profundo en su mente agitada: unos recuerdos sombríos sobre los truculentos hechos que condujeron al cierre del W. S. Hospital, y el asesinato sin resolver de una joven enfermera, cuyo cadáver mutilado fue encontrado una noche después del cierre de las luces. La policía sospechó de un paciente, pero sólo ahora, con la reaparición del asesino, se conocerá la respuesta.', 2004, ' https://contentv2.tap-commerce.com/cover/large/9788466619462_1.jpg?id_com=1113', 0, 5),
(23, 'El profesor ', 'Misterio, thriller, suspenso', 'Adrian Thomas es un profesor universitario retirado, al que acaban de diagnosticarle una demencia degenerativa que lo llevará pronto a la muerte.  Jubilado, viudo y enfermo cree que lo mejor que puede hacer es quitarse la vida.\r\n\r\nPero al salir del consultorio del médico es testigo involuntario del secuestro de Jennifer Riggins, una conflictiva adolescente de dieciseis años con un largo historial de huidas, que desaparece sin dejar rastro dentro de una camioneta conducida por una mujer rubia.\r\n\r\nEl profesor Thomas se debate entre poner fin a su vida y ser útil una última vez antes de morir.  Decide ayudar a encontrar a Jennifer e intentar darle la oportunidad de vivir su joven vida.  Para eso debe sumergirse en el oscuro mundo de la pornografía en Internet\r\n', 2010, 'https://2.bp.blogspot.com/-pcKZsUcOEEI/VlCjiO0ImZI/AAAAAAAABhA/KLYT-pAXOAc/s1600/91wVfX6eNkL._SL1500_.jpg', 0, 5),
(24, 'Juicio final', 'Novela, ficción, misterio', 'Matthew Cowart, un famoso y ya establecido periodista de Miami, recibe la carta de un hombre condenado a muerte que asegura ser inocente. Gracias a sus pesquisas pone al descubierto una información que permite al convicto Robert Earl Ferguson salir en libertad. Sin embargo, y para su horror, Cowart se percata de que ha puesto en marcha una tremenda máquina de matar.', 1992, 'https://contentv2.tap-commerce.com/cover/large/9788498724530_1.jpg?id_com=825', 0, 5),
(25, 'El estudiante', 'Thriller, ficción, suspendo', 'Mientras intenta mantenerse alejado del alcohol, Timothy Moth Warner alterna sus clases de posgrado en la Universidad de Miami con las reuniones de un grupo de autoayuda para adictos. Su tío Ed, médico psiquiatra y alcohólico rehabilitado, es su gran apoyo moral. Preocupado porque Ed ha faltado a una cita, Moth se dirige a la consulta de su tío y lo encuentra muerto, en medio de un charco de sangre. Aparentemente, se ha disparado en la sien.\r\nPara la policía, se trata de un claro caso de suicidio y pronto da el caso por cerrado. Sin embargo, Moth está convencido de que fue asesinado. Desolado y decidido a encontrar él mismo al asesino, busca apoyo en la única persona en la que puede confiar: Andrea Martine, que había sido su novia y a la que no ve desde hace cuatro años. Pese a que está sumida en la depresión tras haber vivido una situación traumática, Andy no puede dejar de escucharle.\r\n', 2014, 'https://contentv2.tap-commerce.com/cover/large/9788466655002_1.jpg?id_com=1113', 0, 5),
(26, 'El final perfecto', 'Misterio, thriller, suspenso', 'Apenas unos kilómetros de distancia separan a tres mujeres que no se conocen entre sí. La Pelirroja Uno es una doctora soltera de cerca de cincuenta años; la Pelirroja Dos una profesora de escuela en la treintena y la Pelirroja Tres una estudiante de diecisiete años. Las tres son vulnerables. Las tres son el objetivo de un psicópata obsesionado por demostrar al mundo quién es él en realidad. Ahora que se acerca al final de su vida, necesita llevar a cabo su obra de arte final. Crímenes que serán estudiados en las universidades, de los que se hablará durante décadas. Crímenes perfectos. El asesino les dice a las tres mujeres que va a matarlas. No saben cuándo ni cómo ni dónde. Sólo saben que él está ahí fuera, cada vez más cerca. Que lo sabe todo sobre ellas. Que las ha seguido durante meses. Y que ahora va a comenzar un terrible acoso psicológico que las empujará paso a paso hacia la muerte. Como si nadaran entre tiburones, no saben si el peligro está delante o detrás de ellas, si está cerca, si está lejos, si deben seguir nadando o si es mejor quedarse quietas, si deben unirse o actuar por separado...Sólo tienen dos salidas: esconderse y esperar, o luchar e intentar ser más listas que su depredador. ¿Conseguirán las tres mujeres cambiar el final del cuento, o serán devoradas por su peor pesadilla?', 2012, 'https://cloud10.todocoleccion.online/libros-segunda-mano-terror-misterio-policiaco/tc/2016/04/08/17/55976211.jpg', 0, 5),
(27, 'La biblioteca de Babel', 'Relato breve, cuento', 'El narrador comienza su historia describiendo la biblioteca. Se compone de innumerables habitaciones hexagonales; en cada una, hay cuatro paredes ocupadas por estanterías. Las otras paredes contienen pequeños rincones en los que los lectores pueden dormir y bañarse, así como pasillos que conectan cada hexágono con otras habitaciones. En cada pasillo, una escalera de caracol permite viajar a las salas de la biblioteca arriba y abajo. No hay pasillos sin espejos.', 1941, 'https://www.holaebook.com/imglibro/Jorge-luis-borgesprlogos-de-la-biblioteca-de-babel.jpg', 0, 4),
(28, 'El libro de arena', 'Ciencia ficción, horror, fantasía', 'En este libro el autor nos da a conocer una serie de cuentos con diferentes temáticas, y cada relato presenta un epílogo. Aquí hablaremos de los relatos más resaltantes dentro de la obra. El primer cuento lleva por título “El Otro” y está narrado en primera persona, éste se encontraba sentado en un banco, mirando un río y un edificio de gran tamaño que lo cautivaba. En el otro lado del banco, estaba alguien y comienza a silbar, a éste se le llamó El Otro, y el protagonista comienza a interrogarlo, y así se da cuenta que ambos se llaman Jorge Luis Borges. Pero El Otro era más joven.', 1975, 'https://upload.wikimedia.org/wikipedia/commons/8/8d/El_libro_de_arena.JPG', 0, 4),
(29, 'El jardín de los senderos que se bifurcan', 'Cuento, fantasía', 'Durante la Primera Guerra Mundial[1] un espía chino, Yu Tsun, al servicio de los alemanes, opera en una provincia británica. Tras un párrafo exponiendo planes de batalla británicos en el frente francés que sufrieron un contratiempo, se indica que existe una nueva luz sobre ese retraso militar. La explicación consiste en la confesión del propio Yu Tsun, ya prisionero, a partir de la segunda página de su revelación. Advierte que un socio espía acaba de ser descubierto y muerto por un capitán irlandés, Madden, y está cierto que su propio arresto sobrevendrá de modo inminente. Entonces idea un plan desesperado para transmitir a su Jefe alemán la información sobre la ciudad donde deben efectuarse los bombardeos. Con apremio encuentra en la guía telefónica el modo de transmitir su mensaje al exterior y se embarca en un tren hacia Fenton. Con el capitán tras su pista, el chino viaja hasta la casa de Stephen Albert y es muy bien recibido por el sabio sinólogo, quien se alegra al descubrir su parentesco con el legendario Ts’ui Pên, autor del Jardín de senderos que se bifurcan, una novela china caótica y  antes de él incomprendida. El sinólogo le revela al espía el contenido filosófico y maravilloso de lo legado por su antepasado, al haber armado un laberinto que descifraba el enigma del tiempo bifurcándose. Por la evocación con ese pasado y motivado para terminar su plan, el chino mata a Stephen Albert con un revolver de una sola bala. Después él queda apresado y condenado a la horca. Al terminar su confesión, Yu Tsun se expresa abrumado por su destino que ya carga los múltimples tiempos bifurcados: “No sabe (nadie puede saber) mi innumerable contrición y cansancio.”', 1941, 'https://jiescribano.files.wordpress.com/2019/08/borges_el_jardc3adn.gif', 0, 4),
(30, 'El hacedor', 'Poesía, ficción', 'Caracterizan las páginas de El hacedor el cruce de géneros (relatos, ensayos y poemas) y la diversidad temática. Homero y Dante alternan con Rosas y Facundo; la fantasía que inventa laberintos inéditos, con la crónica de sucesos aparentemente triviales pero cargados de insospechadas significaciones; el particularismo criollo, con la universalidad histórica que abarca tanto la simbología oriental como la cultura europea. «De cuántos libros he entregado a la imprenta -escribió el propio Jorge Luis Borges- ninguno, creo, es tan personal como esta colectiva y desordenada silva de varia lección.»', 1960, 'https://pendulo.com/imagenes_grandes/9786073/978607311104.GIF', 0, 4),
(31, 'Funes el memorioso', 'Cuento', 'En esta obra, el narrador, que es una versión del propio Borges, conoce a Ireneo Funes, un adolescente que vive en Fray Bentos, Uruguay, en el año 1884. El primo de Borges le pregunta al niño por la hora, y Funes responde al instante, sin la ayuda de un reloj y precisa el minuto.\r\nBorges investiga una diversidad de temas en el texto, como la necesidad de generalización y abstracción al pensamiento y la ciencia. Funes puede compararse con un sabio autista, en el sentido de que ha logrado una habilidad extraordinaria, la memoria, sin la necesidad obvia de aprender o practicar. La historia plantea la pregunta no resuelta de cuánto potencial sin cumplir verdaderamente contiene el cerebro humano.\r\n', 1942, 'https://resumiendolo.com/wp-content/uploads/2018/03/funes_el_memorioso___jlb_by_esquizobestia-e1520596282888.jpg', 0, 4),
(32, 'El Aleph', 'Cuento', 'Este volumen reúne dieciocho relatos de Jorge Luis Borges, entre ellos quizá los más elogiados y repetidamente citados. Tanto «El inmortal» como «Los teólogos» «Deutsches Requiem» y «La espera» muestran las posibilidades expresivas de la «estética de la inteligencia» borgiana, inimitable fusión de mentalidad matemática, profundidad metafísica y captación poética del mundo.', 1945, 'https://descargarlibrosenpdf.files.wordpress.com/2017/05/el-aleph.jpg?w=1140', 0, 4),
(33, 'Tom y Jerry', 'comedia', 'TOM CORRE A JRRY', 1997, 'google.com', 0, 1),
(34, 'Tom y Jerry', 'comedia', 'TOM CORRE A JRRY', 1997, 'google.com', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `mail`, `password`) VALUES
(1, 'Ignacio', 'Miller', 'nachimiller123@gmail.com', 'nachi123'),
(2, 'Francisco', 'Ramirez', 'franramirez@gmail.com', 'fran123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_autor` (`id_autor_fk`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autor_fk`) REFERENCES `autores` (`id_autor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
