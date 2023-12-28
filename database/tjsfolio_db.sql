CREATE TABLE CImages (
    CImages_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CI_name VARCHAR(100) NOT NULL,
    CI_date DATE NOT NULL,
    CI_desc TEXT NOT NULL,
    CI_image VARCHAR(120) NOT NULL,
    CI_TV_Column INT NOT NULL CHECK (CI_TV_Column BETWEEN 1 AND 4),
    CI_TV_no INT NOT NULL,
    CI_TV_Desktop INT NOT NULL CHECK (CI_TV_Desktop BETWEEN 1 AND 3),
    CI_Desktop_no INT NOT NULL,
    CI_TV_Tablet INT NOT NULL CHECK (CI_TV_Tablet BETWEEN 1 AND 2),
    CI_Tablet_no INT NOT NULL,
    CI_Mobile_no INT NOT NULL
);

CREATE TABLE BWImages (
    BWImages_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    BW_name VARCHAR(100) NOT NULL,
    BW_date DATE NOT NULL,
    BW_desc TEXT NOT NULL,
    BW_image VARCHAR(120) NOT NULL,
    BW_TV_Column INT NOT NULL CHECK (BW_TV_Column BETWEEN 1 AND 4),
    BW_TV_no INT NOT NULL,
    BW_TV_Desktop INT NOT NULL CHECK (BW_TV_Desktop BETWEEN 1 AND 3),
    BW_Desktop_no INT NOT NULL,
    BW_TV_Tablet INT NOT NULL CHECK (BW_TV_Tablet BETWEEN 1 AND 2),
    BW_Tablet_no INT NOT NULL,
    BW_Mobile_no INT NOT NULL
);

CREATE TABLE CoverArts (
    CAImages_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CA_name VARCHAR(100) NOT NULL,
    CA_date DATE NOT NULL,
    CA_desc TEXT NOT NULL,
    CA_image VARCHAR(120) NOT NULL,
    CA_TV_Column INT NOT NULL CHECK (CA_TV_Column BETWEEN 1 AND 4),
    CA_TV_no INT NOT NULL,
    CA_TV_Desktop INT NOT NULL CHECK (CA_TV_Desktop BETWEEN 1 AND 3),
    CA_Desktop_no INT NOT NULL,
    CA_TV_Tablet INT NOT NULL CHECK (CA_TV_Tablet BETWEEN 1 AND 2),
    CA_Tablet_no INT NOT NULL,
    CA_Mobile_no INT NOT NULL
);

CREATE TABLE User (
    User_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(35) NOT NULL,
    UserPassword VARCHAR(40) NOT NULL,
    UserPermissionLevel INT NOT NULL CHECK (UserPermissionLevel BETWEEN 1 AND 3),
    User_image VARCHAR(120) NOT NULL
);

INSERT INTO cimages (`CImages_ID`, `CI_name`, `CI_date`, `CI_desc`, `CI_image`, `CI_TV_Column`, `CI_TV_no`, `CI_Desktop_Column`, `CI_Desktop_no`, `CI_Tablet_Column`, `CI_Tablet_no`, `CI_Mobile_no`)
VALUES
(1, 'Slika1', '2023-10-27', 'Opis1', '494715.jpg', 1, 1, 1, 1, 1, 1, 1),
(2, 'Slika2', '2023-10-27', 'Opis2', 'black-hole-dark-4k-wo-1920x1080.jpg', 2, 1, 2, 1, 2, 1, 2),
(3, 'Slika3', '2023-10-27', 'Opis3', 'blade-runner-2049-cyberpunk-alley-4k-mm-1920x1080.jpg', 3, 1, 3, 1, 1, 2, 3),
(4, 'Slika4', '2023-10-27', 'Opis4', 'Doslovno doslovno doslovno ja.jpg', 4, 1, 1, 2, 2, 2, 4),
(5, 'Slika5', '2023-10-27', 'Opis5', 'eden-nebula-2c-1920x1080.jpg', 1, 2, 2, 2, 1, 3, 5),
(6, 'Slika6', '2023-10-27', 'Opis6', 'IMG_5303.png', 2, 2, 3, 2, 2, 3, 6),
(7, 'Slika7', '2023-10-27', 'Opis7', 'lord_joc_Varazdin_town_square_covered_in_snow_decorated_with_ch_d49c3048-9ce5-4a56-9331-8170e2342166.png', 3, 2, 1, 3, 1, 4, 7),
(8, 'Slika8', '2023-10-27', 'Opis8', 'lord_joc_Varazdin_town_square_covered_in_snow.webp', 4, 2, 2, 3, 2, 4, 8),
(9, 'Slika9', '2023-10-27', 'Opis9', 'nebula-digital-space-5k-dq-1920x1080.jpg', 1, 3, 3, 3, 1, 5, 9),
(10, 'Slika10', '2023-10-27', 'Opis10', 'nebula-fractal-art-22-1920x1080.jpg', 2, 3, 1, 4, 2, 5, 10),
(11, 'Slika11', '2023-10-27', 'Opis11', 'nebula-landscape-5k-pv-1920x1080.jpg', 3, 3, 2, 4, 1, 6, 11),
(12, 'Slika12', '2023-10-27', 'Opis12', 'nebula-stars-space-galaxy-4k-it-1920x1080.jpg', 4, 3, 3, 4, 2, 6, 12),
(13, 'Slika13', '2023-10-27', 'Opis13', 'purple-nebula-haze-stars-4k-r6-1920x1080.jpg', 1, 4, 1, 5, 1, 7, 13),
(14, 'Slika14', '2023-10-27', 'Opis14', 'ruzic.jpg', 2, 4, 2, 5, 2, 7, 14),
(15, 'Slika15', '2023-10-27', 'Opis15', 'space-galaxy-4k-y9-1920x1080.jpg', 3, 4, 3, 5, 1, 8, 15),
(16, 'Slika16', '2023-10-27', 'Opis16', 'stars-space-galaxy-nebula-5k-da-1920x1080.jpg', 4, 4, 1, 6, 2, 8, 16),
(17, 'Slika17', '2023-10-27', 'Opis17', 'triumph-volumetric-nebula-4k-m6-1920x1080.jpg', 1, 5, 2, 6, 1, 9, 17),
(18, 'Slika18', '2023-10-27', 'Opis18', 'Untitled-3.jpg', 2, 5, 3, 6, 2, 9, 18),
(19, 'Slika19', '2023-10-27', 'Opis19', 'VZ_jeate_bez_pahulja.jpg', 3, 5, 1, 7, 1, 10, 19),
(20, 'Slika20', '2023-10-27', 'Opis20', 'wallpaperflare.com_wallpaper.jpg', 4, 5, 2, 7, 2, 10, 20),
(21, 'Slika21', '2023-10-27', 'Opis21', 'wallpaperflare.com_wallpaperrr.jpg', 1, 6, 3, 7, 1, 11, 21),
(22, 'Slika22', '2023-10-27', 'Opis22', 'wallpaperflare.com_wallpaperrrrrr.jpg', 2, 6, 1, 8, 2, 11, 22),
(23, 'Slika23', '2023-10-27', 'Opis23', 'fire-in-the-sky-4k-ns-1920x1080.jpg', 3, 6, 2, 8, 1, 12, 23),
(24, 'Slika24', '2023-10-27', 'Opis24', 'hand-of-nebula-4k-ii-1920x1080.jpg', 4, 6, 3, 8, 2, 12, 24);

