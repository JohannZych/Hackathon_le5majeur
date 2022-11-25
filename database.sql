CREATE DATABASE cinq_majeur;

use cinq_majeur;

CREATE TABLE user (
                      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      lastname VARCHAR(255) NOT NULL,
                      firstname VARCHAR(255) NOT NULL,
                      email VARCHAR(150) NOT NULL,
                      `password` VARCHAR(255) NOT NULL
);

CREATE TABLE stepmom (
                         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         userID INT NOT NULL,
                         lastname VARCHAR(255) NOT NULL,
                         firstname VARCHAR(255) NOT NULL,
                         birthday DATE NOT NULL
);

CREATE TABLE trip (
                      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      category INT NOT NULL,
                      trip_name VARCHAR(255) NOT NULL,
                      image VARCHAR(255) NOT NULL,
                      continent VARCHAR(50) NOT NULL,
                      type VARCHAR(255),
                      duration VARCHAR(255),
                      network_coverage VARCHAR(3),
                      distance INT
);

ALTER TABLE stepmom ADD CONSTRAINT fk_user_stepmom FOREIGN KEY(userID)
    REFERENCES user (id);

INSERT INTO trip (category, trip_name, continent, image, type)
VALUES
    ( 1, 'La Réunion', 'Afrique', 'https://www.rungisinternational.com/wp-content/uploads/2020/01/montagne-salazie-778x533.jpg', 'Découverte dune culture'),
    (1, 'Maroc', 'Afrique', 'https://partir.ouest-france.fr/magazine/wp-content/uploads/2022/09/nncabldgvia.jpg','Découverte dune culture'),
    (1, 'Zanzibar', 'Afrique', 'https://images5.bovpg.net/r/media/1/2/8/3/4/283474.jpg', 'Découverte dune culture'),
    (1, 'Cap de Bonne espérance', 'Afrique', 'https://www.carnets-et-voyages.net/wp-content/uploads/2020/07/cabo-buena-esperanza-sudafrica.jpg', 'Sportif'),
    (1, 'Martinique', 'Afrique', 'https://media.routard.com/image/71/4/la_plage_des_salines.1400714.w740.jpg', 'Découverte dune culture'),
    (1, 'New York', 'Amérique', 'https://cdn.futura-sciences.com/cdn-cgi/image/width=1024,quality=50,format=auto/sources/images/gratte-ciel-New-York.jpg', 'Visite dune capitale'),
    (1, 'Costa Rica', 'Amérique', 'https://www.okvoyage.com/wp-content/uploads/2017/01/top-5-costa-rica-1-810x540.jpg', 'Découverte dune culture'),
    (1, 'Guadeloupe', 'Amérique', 'https://www.augoutdemma.be/wp-content/uploads/2021/02/la-desirade-guadeloupe-99.jpg', 'Découverte dune culture'),
    (1, 'Grèce', 'Europe', 'https://lesvolsdalexi.s3.ca-central-1.amazonaws.com/blog/20190612142758/santorini-cover-1152x605.jpg', 'Découverte dune culture'),
    (1, 'Les Canaries', 'Europe', 'https://a.cdn-hotels.com/gdcs/production68/d643/5e93aebf-bd88-4b50-b4e8-a3fcaaeb271d.jpg?impolicy=fcrop&w=800&h=533&q=medium', 'Découverte dune culture'),
    (1, 'Croatie', 'Europe', 'https://escales.ponant.com/wp-content/uploads/2021/01/la-une-1-croatie.jpg', 'Découverte dune culture'),
    (1, 'Corse', 'Europe', 'https://d2p1ubzgqn8tkf.cloudfront.net/article/1139447/lg_5bf5424540236bff54245402393064v_.jpg', 'Sportif'),
    (1, 'Thailande', 'Asie', 'https://www.okvoyage.com/wp-content/uploads/2019/12/thailande-1-810x540.jpg', 'Découverte dune culture'),
    (1, 'Les Philippines', 'Asie', 'https://www.okvoyage.com/wp-content/uploads/2011/08/canva-white-and-green-sail-boat-photography-1-810x810.jpg', 'Découverte dune culture'),
    (1, 'Cambodge', 'Asie', 'https://www.bouger-voyager.com/wp-content/uploads/2014/06/cambodia-angkor-wat1.jpg', 'Découverte dune culture'),
    (1, 'Singapour', 'Asie', 'https://images.prismic.io/cadremploi-edito/NzI1MjBiOTMtMDg2ZC00MjFhLWE4MmQtNGMzMjQ0ODZmYzBi_travailler_a_singapour-1140.jpg?auto=compress,format&rect=30,0,1080,540&w=800&h=400', 'Visite dune capitale'),
    (1, 'Australie', 'Océanie', 'https://www.viago.ca/wp-content/uploads/2014/10/Les-beautes-de-lAustralie-768x432.jpg', 'Sportif'),
    (1, 'Iles Fidji', 'Océanie', 'https://static1.evcdn.net/images/reduction/355367_w-1200_h-630_q-70_m-crop.jpg', 'Découverte dune culture'),
    (1, 'Nouvelle Zélande', 'Océanie', 'https://photo.comptoir.fr/asset/contexte/61/nouvelle-zelande/wanaka/lac-wanaka-otago-nouvelle-zelande-498320-1440x720.jpg', 'Découverte dune culture'),
    (1, 'Indonésie', 'Océanie', 'https://www.lindigo-mag.com/photo/art/grande/32925588-30540798.jpg?v=1555948694', 'Découverte dune culture');


INSERT INTO trip (category, trip_name, continent, image, distance)
VALUES
    (3, '1 semaine à Montcuq avec soirée Bingo et Blagues', 'Europe', 'https://woody.cloudly.space/app/uploads/lot-tourisme/2022/08/thumbs/220703083433-Vue-drone-du-village-de-Montcuq-%C2%A9%C2%A9-Lot-Tourisme-Cyril-Novello-640x360.jpg', 1),
    (3, '1 semaine de Trek en Patagonie', 'Amérique', 'https://www.1001-pas.fr/wp-content/uploads/2016/05/Patagonie-torres_del_Paine-tours-1024x683.jpg', 5000),
    (3, '1 semaine de Safari en tente au Kenya', 'Afrique', 'https://www.kuoni.fr/wp-content/uploads/2021/06/onu22riuciwnmt5.jpg', 5000),
    (3, '2 semaines de Poterie extrême', 'Europe', 'https://www.ateliers-hybride.fr/wp-content/uploads/2021/07/initiation-ceramique-pau.jpg',1),
    (3, '2 semaines de science à Tchernobyl', 'Europe', 'https://medias.pourlascience.fr/api/v1/images/view/60cc6f548fe56f336d45dcc7/wide_1300/image.jpg', 1000),
    (3, '2 semaines de bronzette aux Iles Kerguelen', 'Antarctique', 'https://www.ensta-bretagne.fr/sites/default/files/2019-06/mission-poleipev.jpg', 5000),
    (3, '1 mois de croisière avec Yvette Horner et son accordéon', 'Europe', 'https://www.radioclassique.fr/wp-content/thumbnails/uploads/2018/06/20180612-horner-tt-width-1200-height-630-fill-0-crop-1-bgcolor-ffffff.jpg', 5000),
    (3, '1 mois le Tour Europe en marchant', 'Europe', 'https://static.lpnt.fr/images/2012/02/16/sipa-506373-jpg_346415_660x287.JPG', 1000),
    (3, '1 mois de pêche en Mer du Nord', 'Europe', 'https://www.notre-planete.info/actualites/images/peche/bateau-peche-mer-du-Nord.webp', 5000);

INSERT INTO trip (category, trip_name, continent, image, distance, network_coverage, duration)
VALUES
    (2,'2 semaines de croisière en Méditerranée', 'Europe', 'https://i.la-croix.com/1400x933/smart/2022/01/04/1201193112/Photo-dillustration-bateau-croisiere_0.jpg', 1000, 'non', 'Deux semaines'),
    (2, '2 semaines de transhumance dans les Pyrenées', 'Europe', 'https://www.etonnantes-pyrenees.com/wp-content/uploads/2014/12/transhumance-pyrenees.jpg', 1000, 'non', 'Deux semaines'),
    (2, '2 semaines de Yoga à Wroclaw', 'Europe', 'https://www.yoghamsa.com/wp-content/uploads/2017/03/yoga-foret.jpg', 1000, 'non', 'Deux semaines');

