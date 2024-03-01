create database loja_games
default character set utf8
default collate utf8_general_ci;

use loja_games;

create table tbl_categoria_produto
(
	cod_categoria_produto int primary key auto_increment,
    descricao_categoria_produto varchar(25) not null    
)
default charset utf8;

create table tbl_desenvolvedor
(	
    cod_desenvolvedor int primary key auto_increment,
    nome_desenvolvedor varchar(45) not null    
)
default charset utf8;

create table tbl_fornecedor
(	
    cod_fornecedor int primary key auto_increment,
    nome_fornecedor varchar(45) not null    
)
default charset utf8;

create table tbl_usuario
(
	cod_usuario int primary key auto_increment,
    nome_usuario varchar(80) not null,
    descricao_email varchar(80) not null,
    descricao_senha varchar(6) not null,
    descricao_status boolean not null,
    descricao_endereco varchar(80) not null,
    descricao_cidade varchar(30) not null,
    num_cep char(9) not null
)
default charset utf8;

create table tbl_produto
(
	cod_produto int primary key auto_increment,
    cod_categoria_produto int not null,
    nome_produto varchar(100) not null,
    cod_desenvolvedor int not null,
    cod_fornecedor int not null,
    valor_preco float not null,
    qtd_estoque int not null,
    descricao_produto text not null,
    descricao_capa text not null,
    sg_lancamento enum('S','N') not null,
    constraint fk_categoria_produto foreign key(cod_categoria_produto) references tbl_categoria_produto(cod_categoria_produto),
	constraint fk_desenvolvedor_produto foreign key(cod_desenvolvedor) references tbl_desenvolvedor(cod_desenvolvedor),
    constraint fk_fornecedor_produto foreign key(cod_fornecedor) references tbl_fornecedor(cod_fornecedor)
)
default charset utf8;

create table tbl_venda
(
	cod_venda int(11) primary key auto_increment,
    numero_ticket varchar(13) not null,
    cod_cliente int(11) not null,
    cod_produto int(11) not null,
    qtd_produto int(11) not null,
    valor_item int(11) not null,
    valor_total_item decimal (10,2) generated always as ((qtd_produto * valor_item)) virtual,
    data_venda date not null
)
default charset utf8;

create table tbl_form
(
    cod_form int primary key auto_increment,
    nome_usuario_form varchar(80) not null,
    descricao_email_form varchar(80) not null,
    descricao_form text not null
)
default charset utf8;

insert into tbl_categoria_produto 
values(default,'Ação'),    				 	-- 1
(default, 'Aventura'),     	 				-- 2
(default, 'Estratégia'),					-- 3
(default, 'Esporte'),						-- 4
(default, 'Corrida'),						-- 5
(default, 'Simulação'),						-- 6
(default, 'Batalha'),						-- 7
(default, 'RPG'),							-- 8
(default, 'FPS'),							-- 9
(default, 'MMO'),							-- 10
(default, 'Xbox'),							-- 11
(default, 'Playstation'),					-- 12
(default, 'Nintendo'),						-- 13
(default, 'Munitor Gamer'), 				-- 14
(default, 'Controles'),						-- 15
(default, 'Headset'),						-- 16
(default, 'Fones de ouvido'),				-- 17
(default, 'Controle de mídia'), 			-- 18
(default, 'Teclado/Mouse'),					-- 19
(default, 'Cabo USB/HDMI/Carregador'),		-- 20
(default, 'Cabo de força');					-- 21

insert into tbl_desenvolvedor
values(default,'Rockstar Games'),					-- codigo 1
(default, 'Guerrilla Games'),						-- codigo 2	
(default, 'Kojima Productions'),					-- codigo 3
(default, 'Insomniac Games'),						-- codigo 4
(default, 'Santa Monica Studio'),					-- codigo 5
(default, 'Ubisoft Montreal'),						-- codigo 6
(default, 'Naughty Dog'),							-- codigo 7
(default, 'Crystal Dynamics e Eidos Montréal'),		-- codigo 8
(default, 'Firaxis Games'),							-- codigo 9
(default, 'Paradox Development Studio'),			-- codigo 10
(default, 'Polyphony Digital '),					-- codigo 11
(default, 'Electonic Arts'),						-- codigo 12
(default, '11 bit studio'),							-- codigo 13
(default, 'Playstation'),				    		-- codigo 14
(default, 'Microsoft'),								-- codigo 15
(default, 'Visual Concepts'),                       -- codigo 16
(default, 'EA Gothenburg'),                         -- codigo 17
(default, 'Codemasters'),                           -- codigo 18
(default, 'Criterion Games'),                       -- codigo 19
(default, 'Team Fractal Alligator'),                -- codigo 20
(default, 'Maxis'),                                 -- codigo 21
(default, 'Ubisoft'),                               -- codigo 22
(default, 'Dice'),                                  -- codigo 23
(default, 'CD Projekt'),                            -- codigo 24
(default, 'Iron Galaxy'),                           -- codigo 25
(default, 'Bethesda Game Studios'),                 -- codigo 26
(default, 'Valve Corporation'),                     -- codigo 27
(default, 'Blizzard Entertainment'),                -- codigo 28
(default, 'CyberConnect2'),                         -- codigo 29
(default, 'ZeniMax Online Studios'),                -- codigo 30
(default, 'Panic Button Games'), 					-- codigo 31
(default, 'Xbox'),                                  -- codigo 32
(default, 'Nintendo');                              -- codigo 33

insert into tbl_fornecedor
values(default,'Rockstar Games'),
(default, 'Sony Interactive Entertainment'),
(default, 'Square Enix'),
(default, 'SND'),
(default, 'MH Games'),
(default, 'Comp Distribuidora'),
(default, 'Mais Eletrônicos'),
(default, 'Nave Atacado'),
(default, 'MGSP Group'),
(default, 'Netshop Games'),
(default, 'Origin'),
(default, 'Ubisoft'),
(default, 'Blizzard Entertainment'),
(default, 'Blue Waves Games'),
(default, 'Playstation'),				    		
(default, 'Microsoft'),	
(default, 'Xbox'),
(default, 'Nintendo');

insert into tbl_usuario 
values(default, 'José Cleitinho','josecleitinho@gmail.com','123456','1','Rua Adamastor, 58','Santos','05252-020'),
(default, 'Bruna Pianco','bruna@gmail.com','654321','1','Rua Professor Atílio Innocenti, 65','São Paulo','77431-735'),
(default, 'Guilherme Gomes','guigomes@gmail.com','481256','0','Rua Ovídio José Antônio Santana, 73','São Paulo','72941-308'),
(default, 'Guilherme Vieira','guivieira@gmail.com','973520','0','Rua Ana Velha, 593','São Paulo','62616-739'),
(default, 'Helen Silva','helen@gmail.com','984812','1','Rua Joaquim Gonçalves da Silva, 87','São Paulo','68962-091'),
(default, 'Marcelo Henrique','marcelo@gmail.com','352069','1','Rua Abel Seixas, 98','São Paulo','89157-155');

-- Primeira parte 
insert into tbl_produto
values 
(Default,'1', '<p>Red Dead Redemption 2 - Assuma sua Posição no Velho Oeste</p>',
'1','1','133.75','25', '<p>O famoso "GTA do velho oeste" está de volta, trazendo consigo o retorno de um mundo aberto 
povoado por cowboys.Com o fim dessa época chegando, gangues são perseguidas pelas autoridades e você se encontra 
bem em meio ao confronto.</p>','reddead.png','N'),
 
(Default,'1', '<p>Horizon Zero Dawn - O Futuro é Seu e das Máquinas</p>',
'2','2','59.99','85','<p>Esteja preparado para encarar um futuro dominado por máquinas em Horizon Zero Dawn. 
Como a jovem Aloy, você deverá sobreviver em uma terra selvagem onde perigosos robôs aguardam para lhe atacar.
 Misturando elementos de fantasia com ficção científica, este jogo único proporcionará horas de aventura.</p>','horizonzero.png','N'),

(Default,'1','<p>Death Stranding - O Amanhã Está em Suas Mãos</p>','3','2','145.99','23',
'<p>Esta incrível obra, fruto da imaginação do aclamado criador da série de jogos Metal Gear Solid, busca lhe conectar 
não apenas a gráficos deslumbrantes, mas também a personagens interpretados por um tremendo 
elenco de atores hollywoodianos.</p>','deathstranding.png','N'),
 
(Default,'1','<p>Marvel’s Spider-Man Torne-se o Herói da Cidade que Nunca Dorme</p>','1','4','125.99','80',
'<p>Marvels Spider-Man é o jogo definitivo para fãs de super-heróis, especialmente do famoso escalador de paredes originário 
dos quadrinhos. Jogadores assumirão o papel do jovem herói e deverão enfrentar desafios para equilibrar a vida normal de 
Peter Parker com a extraordinária do Homem - Aranha.</p>','marvelspider.png','N');

-- Segunda parte 
insert into tbl_produto
values
(Default,'2','<p>Assassin’s Creed IV - Assassino em Solo</p>','6','1','56.99','60',
'<p>Lançado em 2013, Assassin’s Creed IV: Black Flag chegou mais tarde ao PS4 com gráficos aprimorados e a mesma aventura 
empolgante. Apesar de dar continuidade a história da Crença dos Assassinos, o game funciona muito bem sozinho por 
trazer uma nova mecânica de navegação. Sim, é possível passar horas controlando navios e realizando saques!</p>','creediv.png','N'),

(Default,'2','<p>Uncharted 4: A Thief’s End</p>','7','2','56.90','50',
'<p>Claramente inspirada em Tomb Raider, a franquia Uncharted também encerra o legado do protagonista principal 
com ainda mais aventura. Em Uncharted 4: A Thief’s End, Nathan Drake e seu irmão saem em busca de um tesouro 
que mudará suas vidas para sempre. No entanto, essa busca atrai inimigos que estarão presentes ao longo de 
todo o percurso.</p>','uncharted.png','S'),

(Default,'2','<p>Shadow of The Tomb Raider - O Capítulo Mais Sombrio</p>','8','3','102.99','90',
'<p>Dando um fim à mais recente trilogia de jogos da Lara Croft, Shadow of The Tomb Raider traz de volta o que há de melhor nos jogos 
anteriores e leva a heroína para lugares exóticos repletos de tumbas para explorar e mistérios a serem descobertos. É o jogo perfeito
para quem curte arqueologia, aventura e ação.</p>','shadow.png','S'),

(Default,'2','<p>God of War - O Renascimento de uma Lenda</p>','5','2','62.89','32',
'<p>Quando o assunto é executar tudo com maestria, o jogo do ano de 2018, God of War, é o exemplo 
mais recente. Não só o game tinha a obrigação de honrar todo o legado de Kratos, o deus da guerra, 
como também teve de dar um novo propósito para o herói, que agora é pai e precisa ensinar e esconder 
todo o seu passado do próprio filho.</p>','godofwar.png','S');

-- Tercira parte
insert into tbl_produto
values
(Default,'3','<p>XCOM 2</p>','9','6','132.12','70', '<p>Os Alienígenas dominaram o planeta e você lidera 
a força de combate feita para combater os invasores em XCOM 2. Melhore seus soldados, seus equipamentos 
e mantenha todos os guerreiros vivos durante essa história… se puder.</p>','xcom2.png','S'),

(Default,'3','<p>Europa Universalis 4</p>','10','9','69.99','40','<p>Crie, expanda e consolide o 
seu império através dos séculos em Europa Universalis 4. Com detalhes históricos realmente precisos e uma 
liberdade de jogo incrível, é um ótimo simulador de estratégias diplomáticas e de dominância para todos 
os fans de jogos de estratégia.</p>','europauniversalis.png','N'),

(Default,'3','<p>Frostpunk</p>','13','8','182.99','40','<p>Você é o líder da última civilização humana do mundo. 
Diferente de outros jogos de estratégia, Frostpunk te coloca contra um inimigo implacável, o mundo. Você precisa 
sobreviver ao frio e às condições extremas, a verdadeira pergunta aqui é, quanto tempo você consegue aguentar?</p>','frostpunk.png','S'),

(Default,'4','<p>Fifa 21 Ultimate Team</p>','12','9','249.90','95','<p>Descubra novas formas de cooperar e se 
expressar nas ruas e nos estádios. Com tecnologia Frostbite, o FIFA 21 eleva o jogo com novos recursos: Aproveite 
vitórias ainda maiores junto com os ELENCOS DO FUTEBOL VOLTA e o Co-op do FIFA Ultimate Team.</p>','fifa.png','S');

-- Quarta parte
insert into tbl_produto
values
(Default,'4','<p>Gran Turismo Sport</p>','11','4','119.90','62','<p>De motoristas casuais a viciados em combustível, 
o Gran Turismo Sport oferece muitas emoções de alta octanagem para todos os motoristas.Aperte o cinto no seu carro 
preferido e dirija em 17 locais e 40 percursos.O Gran Turismo Sport possui dois campeonatos online, o Nations Cup 
e o Manufacturer’s Cup, além do modo de um jogador.</p>','granturismo.png','S'),

(Default,'4','<p>NBA 2K21</p>','16','2','179.90','87', '<p>Comemorando estrelas da NBA como 
Damian Lillard e Zion Williamson, o NBA 2K21 oferece uma imersão única em todas as facetas na cultura 
e basquete da NBA, onde tudo faz parte do jogo. Com melhorias extensas à jogabilidade, incluindo um Pro 
Stick reformulado e movimentos de defesa característicos, o NBA 2K21 é um ótimo jeito de se familiarizar 
com a série NBA 2K. Inclui a versão NBA 2K21: Edição Mamba Forever, em memória ao falecido Kobe Bryant, 
estrela da NBA.</p>','nba.png','S'),

(Default,'5','<p>Need for Speed Heat</p>','17','10','135.51','35', '<p>O grande chamariz de NFS Heat é, sem dúvidas, a 
dinâmica cíclica das corridas. Basicamente, correr de dia, em eventos oficiais, concede dinheiro para adquirir 
novos carros e acessórios, enquanto os rachas noturnos concedem pontos de experiência usados para desbloquear 
veículos de outras classes e peças de desempenho.</p>','needsorspeed.png','S'),

(Default,'5','<p>F1 2020</p>','18','10','208.99','42', '<p>Depois de vários anos tendo o modo Carreira como seu carro-chefe, 
F1 2020 muda seu foco e traz como principal atração o modo Minha Equipe. Nele, o jogador é dono e piloto (ao mesmo 
tempo) de uma nova equipe no mundo da Fórmula 1. É possível personalizar logo, cores, pintura, macacão, capacetes 
e mais.</p>','f1.png','S');

-- Quinta parte
insert into tbl_produto
values
(Default,'5','<p>Need For Speed Hot Pursuit</p>','19','2','99.90','34', '<p>Need For Speed: Hot Pursuit Remastered traz 
uma jogabilidade do tipo arcade, em que dificilmente você precisará muito do freio para conseguir manter o seu 
carro na pista. Já para fazer as curvas, é claro, você deverá abusar bastante do drift.</p>','needforfpeedhotpursuit.png','N'),

(Default,'6','<p>Hacknet Edição Completa</p>','20','3','79.90','57', '<p>Hacknet é um simulador de invasões cibernéticas 
imersivo com base em terminais para PC. Entre na toca do coelho enquanto segue as instruções de um hacker que 
morreu recentemente. E, ao contrário do que relata a mídia, essa morte pode não ter sido acidental. Usando 
linhas de comando e processos reais de invasão de sistemas, você vai resolver o mistério com o mínimo de ajuda 
do jogo em um mundo cheio de segredos para explorar.</p>','hacknet.png','S'),

(Default,'6','<p>The Sims 4</p>','21','11','119.00','0', '<p>O The Sims 4 é um jogo de simulação de vida, similar aos seus 
antecessores. Os jogadores criam um Sim e controlam sua vida de modo semelhante ao da vida real, de forma não 
linear, já que não há um objetivo específico a ser realizado.</p>','thesims4.png','N'),

(Default,'6','<p>Simcity 3000 Unlimited</p>','21','11','18.50','45', '<p>Construa e gerencie sua própria cidade e veja-a 
ganhar vida. Seja protagonista da sua própria cidade enquanto projeta e cria uma metrópole linda e movimentada. 
Toda decisão é sua conforme a cidade fica maior e mais complexa. Faça escolhas inteligentes para manter seus 
cidadãos felizes e sua cidade cada vez mais épica. Então troque, converse, dispute e entre em clubes com outros 
prefeitos. Siga rumo ao extraordinário!</p>','simcity.png','N');

-- Sexta parte
insert into tbl_produto
values
(Default,'7','<p>Assassin’s Creed Valhalla</p>','22','12','149.90','23', '<p>Torne-se Eivor, um invasor Viking lendário 
em busca de glória. Explore a Idade das Trevas da Inglaterra enquanto ataca seus inimigos, amplia seu assentamento 
e consolida seu poder político.</p>','assassins.png','N'),

(Default,'7','<p>Battlefield 1942</p>','23','11','120.00','42', '<p>Battlefield 1942 permite que os jogadores entrem em 
um combate de infantaria e sentem atrás do volante em uma variedade de veículos, desde submarinos até navios de 
batalha e bombardeiros.</p>','battlefield.png','N'),

(Default,'8','<p>The Witcher RPG</p>','24','3','120.00','39', '<p>Em meio à Terceira Guerra Nilfgaardiana, Geralt de 
Rívia, o Lobo Branco, percorre o continente em busca do paradeiro de seu amor perdido! Mas esta não é a única 
história. Um milhão de outras aventuras acontecem neste vasto continente e você está bem no meio delas!</p>','thewitcher.png','N'),

(Default,'8','<p>The Elder Scrolls V: Skyrim</p>','25','5','749.99','89', '<p>Jogabilidade. Skyrim é um jogo de RPG que 
mantém a tradicional jogabilidade de mundo aberto encontrada na série The Elder Scrolls. O jogador é livre para 
andar pela terra de Skyrim a sua vontade. Em Skyrim há nove grandes "posses", com nove capitais que são as 
principais cidades do jogo.</p>','theelderscrollsskyrim.png','S');

-- Sétima parte 
insert into tbl_produto
values
(Default,'8','<p>The Elder Scrolls IV: Oblivion</p>','26','4','144.90','0', '<p>Depois do misterioso assassinato do 
Imperador, Uriel Septim VII, o trono de Tamriel permanece vazio. Com o Império à beira do desmoronamento, os 
portais de Oblivion são abertos e os Daedras marcham sobre Tamriel, deixando um rastro de destruição por onde 
passam.</p>','theelderscrollsoblivion.png','N'),

(Default,'9','<p>Counter-Strike</p>','27','8','144.90','27', '<p>O jogo é baseado em rodadas nas quais equipes de 
contraterroristas e terroristas combatem-se até a eliminação completa de um dos times, e tem como objetivo 
principal plantar e desarmar bombas, ou sequestrar e salvar reféns.</p>','counterStrike.png','N'),

(Default,'9','<p>Overwatch</p>','25','5','144.90','45', '<p>Overwatch se passa na Terra em um futuro próximo, anos 
após o fim da crise global Omnica. Esta crise colocou a humanidade sob a ameaça da inteligência artificial 
"Omnic". Isto levou à revolta dos robôs em todo o mundo e um grande conflito em escala global.</p>','overwatch.png','N'),

(Default,'9','<p>Doom</p>','31','3','349.90','67', '<p>Sendo um jogo de tiro em primeira pessoa, Doom é jogado através 
do ponto de vista do personagem principal. O objetivo de cada fase é simplesmente encontrar a saída que leva ao 
próximo nível, um botão com um sinal "EXIT" em vermelho, enquanto que o objetivo é sobreviver a todos os perigos 
ao longo do caminho.</p>','doom.png','N');

-- Oitava parte
insert into tbl_produto
values
(Default,'10','<p>World of Warcraft</p>','28','13','349.90','12', '<p>World of Warcraft  é um jogo on-line do gênero 
MMORPG. O jogo se passa no mundo fantástico de Azeroth, introduzido no primeiro jogo da série, Warcraft: Orcs 
& Humans, lançado em 1994.</p>','worldofwarcraft.png','N'),

(Default,'10','<p>Naruto Shippuden: Ultimate Ninja Storm 4 Road to Boruto</p>','29','14','142.00','39', '<p>Com este 
jogo de Naruto, você desfrutará de horas de diversão e novos desafios que permitirão que você se aprimore como 
jogador. Modo livre ou missões a serem cumpridas. Você escolhe jogar entre a linha da história de Sasuke ou 
Naruto até o ponto onde elas se cruzam.</p>','narutoshippuden.png','N'),

(Default,'10','<p>The Elder Scrolls Online</p>','30','3','69.90','26', '<p>The Elder Scrolls Online pega o melhor da série 
e aproveita nessa gigantesca plataforma online. O jogo é recheado de missões interessantes, personagens memoráveis 
e um combate bem dinâmico. Além disso, o jogo apresenta um sistema de criação robusto para armas, armaduras, alimentos 
e para desenvolver seu personagem.</p>','theelderscrolls.png','N'),

(default,'11','<p>Xbox Serie X</p>','32','17','4.599','20','<p>O Xbox mais rápido e poderoso de todos os tempos. O 
Xbox Series X oferece taxas de quadro extraordinariamente estáveis de até 120 FPS com o pop visual de HDR. 
Mergulhe em personagens mais nítidos, mundos mais brilhantes e detalhes incríveis com o realismo do 4K. O 
Som Espacial em 3D é a próxima evolução em tecnologia de áudio, usando algoritmos avançados para criar mundos 
realistas e envolventes que colocam você no centro de sua experiência.</p>','xboxx.png','N');

-- Nona parte
insert into tbl_produto
values(default,'11','<p>Xbox Serie S</p>','32','17','6.999','22','<p>Desempenho de última geração no menor Xbox de todos os 
tempos. Torne-se totalmente digital com o Xbox Series S e crie uma biblioteca de jogos digitais. Seus jogos, 
salvamentos e backups estão seguros na nuvem. Além disso, aproveite a capacidade de encomendar e pré-instalar 
os próximos jogos para estar pronto para jogar no momento em que forem lançados.</p>','xboxs.png','N'),

(default,'12','<p>PlayStation 5</p>','14','15','4.699','22','<p>O PlayStation 5 é o console de nova geração que carrega 
todo o legado construído pela Sony ao longo de décadas de história no mundo dos games. Dentre suas inúmeras 
inovações, a principal dela é o carregamento através de SSDs (Solid State Drives), que permite minimizar o 
tempo de carregamento de todos os processos dentro do console, eliminando para sempre telas de loading e horas 
de instalação.</p>', 'PS5.png','N'),

(default,'12','<p>PlayStation 4</p>','14','15','2.499','27','<p>O Sistema do PS4 foca nos jogadores, garantindo que os 
melhores jogos e a experiência mais imersiva seja possível na plataforma. O console possui seu poder gráfico 
baseado em um processador poderoso, que possui oito núcleos funcionando a 64 bits. Entre em diversos desafios 
com sua comunidade gamer e compartilhe seus triúnfos épicos ao apertar um simples botão, com as novas 
funcionalidades de Streaming, gravação de vídeo e screenshots.</p>','PS4.png','N'),

(default,'12','<p>PlayStation 4 PRO</p>','14','15','4.499','30','<p>Com seu console PlayStation 4 Pro você terá 
entretenimento garantido todos os dias. Sua tecnologia foi criada para colocar novos desafios para jogadores 
novatos e especialistas. Com o console PlayStation 4, líder mundial de vendas por anos, você poderá desfrutar 
de horas de jogo e excelente navegabilidade para desfrutar de filmes, séries e conteúdo online. Qualidade de 
outro nível Este console é considerado o melhor do mercado, já que tem uma resolução de até 4K. Não só isso, 
o controle DualShock combina recursos revolucionários e sem precedentes, preservando a precisão, conforto e 
exatidão em cada movimento. Adaptado às suas necessidades Salve as suas aplicações, fotos, vídeos e muito mais 
no disco rígido, que tem uma capacidade de 1 TB.</p>','PS4pro.png', 'N');

-- Décima parte
insert into tbl_produto
values(default, '13','<p>Console Nintendo Switch Joy-Con 32GB Azul e Vermelho Neon</p>','33','18','3.360','32',
'<p>O mais novo console da Nintendo promete inovar na jogabilidade, apresentando os joy-cons, controles 
removíveis e personalizáveis que atuam por conta própria, captando a distância das mãos, gestos, e 
movimentos, com um sensor infra vermelho e um giroscópio. Acompanham também uma função de vibração 
aprimorada, chamada de Rumble HD, que pode transmitir sensações táteis fiéis à realidade. O console 
possui uma resolução de 720p em seu display de 6.2 polegadas, e 1080p quando conectado a uma TV, e 
traz consigo recursos online totalmente novos, com foco em partidas multiplayer e parties com amigos.</p>','nintendo.png','N'),

(default,'13','<p>Console Nintendo Switch - Modelo Lite Turquesa 32Gb</p>','33','18','1.679','32',
'<p>Apresentando o Nintendo Switch Lite, uma nova versão do sistema Nintendo Switch 
otimizada para jogos pessoais e portáteis. O Nintendo Switch Lite é um sistema pequeno e leve 
do Nintendo Switch. Com um + Control Pad incorporado e um design elegante e unibody, o Nintendo 
Switch Lite é ótimo para jogos em movimento e compatível com jogos populares</p>','nintendo1.png','N'),

(default,'14','<p>Monitor Gamer Redragon Blackmagic RGB</p>','4','5','3.126','23','<p>Com um design fino, 
elegante e moderno o Blackmagic, além de entregar máximo desempenho durante os games, também dá 
um toque de estilo ao seu setup mostrando o logo da Redragon projetado na superfície.</p>','monitorgamer.png','N'),

(default,'15','<p>Xbox Wireless Controller - Preto Carbono</p>','32','17','54.99','20','<p>Experimente o design 
modernizado do Xbox Wireless Controller, com superfícies esculpidas e geometria refinada para maior conforto 
durante o jogo. Fique no alvo com o punho texturizado e um direcional híbrido. Capture e compartilhe conteúdo 
perfeitamente com um botão Share dedicado.</p>','controllxbox.png','N');

-- Décima Primeira parte
insert into tbl_produto
values(default,'15','<p>Xbox Wireless Controller + Wireless Adapter for Windows 10</p>','32','17','79.99','29','<p>Experimente 
o design modernizado do Xbox Wireless Controller, com superfícies esculpidas e geometria refinada para maior 
conforto durante o jogo. Fique no alvo com um D-pad híbrido e aperto texturizado nos gatilhos, pára-choques e 
caixa traseira. Com o Adaptador Xbox Wireless incluído, você pode conectar até 8 Controladores Xbox Wireless de 
uma vez e jogar juntos sem fio no Windows 10 PC.</p>','controllxbox2.png','N'),

(default,'15','<p>Xbox Wireless Controller + USB</p>','32','17','59.99','19','<p>Experimente o design modernizado do Xbox 
Wireless Controller, com superfícies esculpidas e geometria refinada para maior conforto durante o jogo. Jogue 
sem fio ou use o cabo USB-C de 9 incluído para uma experiência de jogo com fio. Fique no alvo com um D-pad 
híbrido e aperto texturizado nos gatilhos, pára-choques e caixa traseira.</p>','controllxbox1.png','N'),

(default,'19','<p>Razer Turret para Xbox One</p>','32','17','249.90','32','<p>Conheça o primeiro teclado e mouse sem fio 
do mundo projetados para Xbox One e PCs com Windows. Ele possui uma precisão incrível em um teclado sem tensão 
com um tapete de mouse embutido, emparelhado com um mouse com o aclamado Razer 5G Advanced.</p>','tecladoxbox.png','N'),

(default,'20','<p>Adaptador Xbox Wireless para Windows 10</p>','15','17','24.99','45','<p>Com o novo e aprimorado 
Adaptador Xbox Sem Fio para Windows 10, você pode jogar seus jogos de PC favoritos usando qualquer Controle 
Sem Fio Xbox. Apresenta um design 66% menor, suporte de som estéreo sem fio e a capacidade de conectar até 
oito controladores de uma vez.</p>','adaptadorxbox.png','N');

-- Décima Segunda parte
insert into tbl_produto
values(default,'18','<p>PDP Gaming Talon Media Remote</p>','32','17','19.99','34','<p>Chega de se atrapalhar com o botão 
direito do controlador para pausar o filme. Com um design de controle remoto de TV tradicional, você pode 
acessar rapidamente os controles de reprodução, salto e volume junto com os controles comuns do Xbox como A, 
B, X, Y e um D-pad. Os botões retroiluminados ativados por movimento, que agora são mais duradouros, ajudam 
você a encontrar os botões certos, mesmo no escuro.</p>','controlexbox.png','N'),

(default,'17','<p>Fone de ouvido sem fio Xbox</p>','32','17','99.99','34','<p>Experimente áudio de alta qualidade 
com baixa latência, conexão 100% sem fio com o console Xbox, sem a necessidade de dongle ou estação base.</p>','fonedeouvidoxbox.png','N'),

(default,'17','<p>Portal Beoplay da Bang & Olufsen</p>','32','17','499.00','32','<p>O design elegante do Portal 
Beoplay significa que você pode usá-los em qualquer situação. Os fones de ouvido vêm com funções de jogo de 
acesso rápido, conectividade sólida para jogos móveis e som surround virtual Dolby Atmos para uma experiência 
de jogo imersiva no Xbox e outras plataformas compatíveis.</p>','fonedeouvidoxbox1.png','N'),

(default,'20','<p>Cabo HDMI</p>','12','17','14.99','50','<p>Desbloqueie todo o potencial dos consoles de jogos de 
última geração com um cabo HDMI de fibra óptica que vai longe. O cabo HDMI importa 48 Gbps de fibra combina o 
mais recente em padrões HDMI com um chipset ativo e núcleos de fibra óptica para garantir uma imagem nítida e 
confiável a distâncias impossíveis com cabos HDMI de cobre tradicionais. Aproveite ao máximo o suporte de 4K 
120 Hz do Xbox Series X conforme especificado em HDMI 2.1 com este cabo Projetado para Xbox.</p>','hdmi.png','N');

-- Décima Terceira parte
insert into tbl_produto
values(default,'15','<p>Controle sem fio DualSense</p>','14','15','64.99','23','<p>Descubra uma experiência de jogos mais 
profunda e altamente imersiva 1 com o novo controle do PS5™, que oferece feedback tátil e efeitos de gatilho 
dinâmicos 2. O controle sem fio DualSense também inclui um microfone integrado e botão de criação, tudo em um 
design icônico e confortável.</p>','playstationcontroll.png','N'),

(default,'16','<p>Headset sem fio PULSE 3D</p>','14','15','599.00','37','<p>Desfrute de conforto ao jogar com um 
headset sem fio ajustado para áudio 3D em consoles PS52. Com carregamento USB Type-C e dois microfones para 
cancelamento de ruído, você pode curtir o bate-papo com a maior nitidez de voz.</p>','playstationheadset.png','N'),

(default,'18','<p>Controle de mídia</p>','14','15','199.00','12','<p>Conveniência e um layout intuitivo para você 
controlar filmes, serviços de streaming e muito mais no seu console PS5.</p>','playstationcontrole.png','N'),

(default,'15','<p>Controle sem fio DUALSHOCK 4</p>','14','15','279.00','43','<p>Assuma controle total de todos os 
jogos usando o controle com design mais inteligente que já criamos, com gatilhos responsivos, controles refinados, 
empunhaduras texturizadas e uma série de recursos inovadores que aproximam você mais ainda dos seus jogos.</p>',
'playstationcontroll1.png','N');

-- Décima Quarta parte
insert into tbl_produto
values(default,'16', '<p>Headset sem fio série Ouro</p>', '14', '15', '439.00', '33', '<p>Desfrute do padrão Ouro em áudio de 
jogos com o headset sem fio série Ouro repaginado; agora com conforto refinado e dois microfones embutidos para 
uma melhor comunicação nos jogos.</p>', 'playstationheadset1.png','N'),

(default,'19','<p>Teclado Microsoft Bluetooth</p>','16','15','266.99','22','<p>Aprecie a sensação sólida do nosso 
teclado moderno e elegante enquanto você trabalha no Windows e no Office 365. O design sem fio apresenta teclas 
de atalho para economia de tempo e pares com o seu laptop via Bluetooth. Uma experiência de digitação sem fio 
elegante, o design sem fio combina perfeitamente com o seu laptop via Bluetooth e oferece uma bateria extra 
longa até 2 anos. Design fino e moderno a um valor excepcional.</p>','microsoftteclado.png','N'),

(default,'19','<p>Teclado Microsoft 600</p>','16','15','124.90','45','<p>O teclado com fio 600 está pronto quando você,
 não precisa procurar um teclado de qualidade que ofereça grande valor. Obtenha todos os recursos de que você precisa - 
e muito mais - com qualidade e confiabilidade da Microsoft. As teclas de toque silencioso e o acesso rápido aos 
controles de mídia simplificam a maneira como você usa o computador e permitem que você se concentre na tarefa 
em questão.</p>','microsoftteclado1.png','N'),

(default,'21','<p>Cabo De Força Tripolar Para Fonte 3x0,75 mm 1,2 Metros</p>','12','8','9.90','45','<p>Cabo De Força 
Tripolar para Computador, Cpu, Monitor 10a, comprimento aproximadamente 1,20m, compatível com Computador (PC / Desktop)</p>',
'cabodeforca.png','N');

create view view_produto 
as select
	tbl_produto.cod_produto,
    tbl_categoria_produto.descricao_categoria_produto,
    tbl_produto.nome_produto,
    tbl_desenvolvedor.nome_desenvolvedor,
    tbl_fornecedor.nome_fornecedor,
    tbl_produto.valor_preco,
    tbl_produto.qtd_estoque,
    tbl_produto.descricao_produto,
    tbl_produto.descricao_capa,
    tbl_produto.sg_lancamento
from tbl_produto inner join tbl_categoria_produto
	on tbl_produto.cod_categoria_produto = tbl_categoria_produto.cod_categoria_produto
inner join tbl_desenvolvedor
	on tbl_produto.cod_desenvolvedor = tbl_desenvolvedor.cod_desenvolvedor
inner join tbl_fornecedor
	on tbl_produto.cod_fornecedor = tbl_fornecedor.cod_fornecedor;

create view view_venda
as select 
	tbl_venda.data_venda,
	tbl_venda.numero_ticket,
	tbl_venda.cod_cliente,
	tbl_produto.nome_produto,
	tbl_venda.qtd_produto,
	tbl_venda.valor_total_item
from tbl_venda inner join tbl_produto 
	on tbl_venda.cod_produto = tbl_produto.cod_produto;

use loja_games;
drop database loja_games;
drop table tbl_categoria_produto;
drop table tbl_produto; 
drop table tbl_desenvolvedor;
drop table tbl_fornecedor;
drop table tbl_usuario;
drop table tbl_venda;
drop view view_produto;
drop view view_venda;

select * from tbl_categoria_produto;
select * from tbl_produto; 
select * from tbl_desenvolvedor;
select * from tbl_fornecedor;
select * from tbl_usuario;
select * from tbl_venda;
select * from tbl_form;
select * from view_produto;
select * from view_venda;