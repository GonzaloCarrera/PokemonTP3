CREATE DATABASE if not exists pokemons_gonzalo_carrera;
use pokemons_gonzalo_carrera;

CREATE TABLE pokemon (
    id int unsigned auto_increment,
    imagen varchar(250),
    nombre varchar(50),
    ataque varchar(15),
    tipo varchar(50),
    primary key (id)
);

insert into pokemon ( nombre, imagen, ataque, tipo)
values ('bulbasaur','recursos/img/1bulbasaur.png','49','planta / veneno'),
('ivysaur','recursos/img/2ivysaur.png','62','planta / veneno'),
('venusaur','recursos/img/3venusaur.png','82','planta / veneno'),
('charmander','recursos/img/4charmander.png','52','fuego'),
('charmeleon','recursos/img/5charmeleon.png','64','fuego'),
('charizard','recursos/img/6charizard.png','84','fuego / volador'),
('squirtle','recursos/img/7squirtle.png','48','agua'),
('wartortle','recursos/img/8wartortle.png','63','agua'),
('blastoise','recursos/img/9blastoise.png','83','agua'),
('pidgey','recursos/img/16pidgey.png','45','normal / volador'),
('pidgeotto','recursos/img/17pidgeotto.png','60','normal / volador'),
('pidgeot','recursos/img/18pidgeot.png','80','normal / volador'),
('rattata','recursos/img/19rattata.png','56','normal'),
('raticate','recursos/img/20raticate.png','81','normal'),
('pikachu','recursos/img/25pikachu.png','55','eléctrico'),
('raichu','recursos/img/26raichu.png','90','eléctrico'),
('psyduck','recursos/img/54psyduck.png','52','agua'),
('golduck','recursos/img/55golduck.png','82','agua'),
('abra','recursos/img/63abra.png','20','psíquico'),
('kadabra','recursos/img/64kadabra.png','35','psíquico'),
('alakazam','recursos/img/65alakazam.png','50','psíquico'),
('magmar','recursos/img/126magmar.png','95','fuego'),
('magikarp','recursos/img/129magikarp.png','10','agua'),
('gyarados','recursos/img/130gyarados.png','125','agua / volador'),
('snorlax','recursos/img/143snorlax.png','110','normal'),
('articuno','recursos/img/144articuno.png','85','hielo / volador'),
('zapdos','recursos/img/145zapdos.png','90','eléctrico / volador'),
('moltres','recursos/img/146moltres.png','100','fuego / volador'),
('mewtwo','recursos/img/150mewtwo.png','110','psíquico');

CREATE TABLE usuario (
    id int unsigned auto_increment,
    user varchar(50) unique,
    pass varchar(50),
    primary key (id)
);

INSERT INTO usuario (user, pass)
values ('admin', 'admin');