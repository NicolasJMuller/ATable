# 🍽️ À Table - Site de prestations traiteur

## 📌 Présentation du projet

**À Table** est un site web dynamique de prestations traiteur, développé dans le cadre de la SAÉ 203 du BUT Métiers du Multimédia et de l’Internet (MMI).  
Ce site permet aux utilisateurs de découvrir et proposer des offres culinaires pour différents événements, de s’inscrire, de se connecter, d’envoyer des messages ou encore de consulter les souvenirs d’événements passés.


---

## 👥 Membres du groupe

## Juliette Quiévreux
![Photo de Juliette](/readme/photojuliette.jpg)
mail : juliette.quievreux9@etu.univ-lorraine.fr




---
## Nicolas Muller
![Photo de Nicolas](/readme/photonicolas.jpg)

mail : nicolas.muller7@etu.univ-lorraine.fr


---
## 📚 Table des matières

1. [Technologies utilisées](#-technologies-utilisées)
2. [Fonctionnalités dynamiques](#️-fonctionnalités-dynamiques) 
3. [Pages principales du site](#️-pages-principales-du-site)
4. [Hébergement](#hébergement)
 -[URL d'hébergement de notre site]()
5. [Intégration Web](#intégration-web)
    -[Validation W3C](#validation-w3c)
    -[Bootstrap](#bootstrap)
    -[Responsive](#responsive)
6. [Développement Web](#développement-web)
7. [Système d'information et bases de données](#️-système-dinformation-et-bases-de-données)

8. [Design & Maquettage](#-design--maquettage)
9. [Objectifs atteints](#-design--maquettage)
10. [Arborescence du projet](#-arborescence-du-projet)
11. [sobriété et éco-conception](#sobriété-et-éco-conception)
    -[score eco-index du site](#score-eco-index-du-site)
    -[poids de chaque page du site](#poids-de-chaque-page-du-site)
12. [Liste des éléments faits et manquants dans le projet](#liste-des-éléments-faits-et-manquants-dans-le-projet)


---

## 🧰 Technologies utilisées

- HTML5  
- CSS3 (pour modifier Bootstrap)
- Bootstrap 5  
- PHP  
- MySQL (base de données relationnelle)

---

## 🧱 Hébergement 



## URL d'hébergement de notre site

- Always Data : https://sae203atable.alwaysdata.net/
- Webetu : https://webetu.iutnc.univ-lorraine.fr/~e96506u/sae203-atable/construction/index.php

---



##  🧩 Intégration Web


## Bootstrap

Nous avons réutilisé tout les éléments de Athome.


---




## Responsive

![Capture 600px](/readme/responsive600.jpg)
![Capture 8000px](/readme/responsive800.jpg)
![Capture 1000px](/readme/responsive1000.jpg)
![Capture 1300px](/readme/responsive1300.jpg)

---


## 🛠️ Développement Web

**Liste des blocs**

- Formulaire d'inscription et de connexion dynamisé.

- Barre de recherche dynamisé.

- Modale dynamisé.

- Envoie de mail dynamisé.

- Enregistrement de mail pour un historique dynamisé, nous conservons l'heure, le message, le destinataire, la personne qui l'envoie afin de pouvoir redonner cela sous forme d'historique dans le profil de l'utilisateur.

- Affichage des demandes et des offres

- Création d'offre et de demande depuis la page profil. 

- Opération qui ne peut ce faire que si on est sur un compte client pour demande et prestataire pour offre.

- Page souvenir permettant au client de partager des moments qu'ils ont apprécié.

- Accueil qui montre les dernières offres et demandes.

- Option pour changer le prénom, nom, mots de passe et le numéro de téléphone pour les clients ; ainsi que le numéro de téléphone et le mot de passe pour les prestataires.

---






## 🗂️ Pages principales du site

Le site contient les pages suivantes :

- `index.php` : page d’accueil du site  
- `contact.php` : formulaire de contact  
- `connexion.php` : page de connexion utilisateur  
- `deconnexion.php` : déconnexion de l’utilisateur  
- `inscription.php` : page d’inscription  
- `profil.php` : profil personnel de l’utilisateur connecté  
- `messages.php` : consultation des messages reçus  
- `afficheProposition.php` : page détaillée pour chaque proposition  
- `souvenirs.php` : galerie de souvenirs des événements passés
- `mentionslegales.php` : page de mentions légales
- `erreur404.php` : page d'erreur 404
- `erreur403.php` : page d'erreur 403
- `.htaccess` : page de sécurité


---

## ⚙️ Fonctionnalités dynamiques

- **Système d'inscription et de connexion** sécurisé avec PHP/MySQLi  
- **Gestion des profils utilisateurs**  
- **Envoi et réception de messages avec historique**  
- **Consultation dynamique des offres traiteur** depuis la base de données  
- **Affichage de souvenirs** d’événements passés sous forme de galerie  
- **Formulaire de contact** avec enregistrement en base ou envoi
- **Barre de recherche** 

---

## 🗃️ Système d'information et bases de données

Lien vers fichier .sql de nos tables : téléchargeable dans l'index

Le site repose sur une base de données relationnelle conçue selon deux étapes fondamentales :

- Un **Modèle Conceptuel de Données (MCD)** réalisé sur Looping  
![MCD](/readme/MCD.jpg)
![Explicationsmld](/readme/explicationsmld.jpg)


- Un **Modèle Logique de Données (MLD)**, réalisé à l'aide d'un codage sur Excel, ce qui a permis de structurer les différentes tables et leurs relations de manière visuelle avant de les implémenter dans la base de données MySQL. 
![MLD](/readme/MLD.jpg)





**Capture d'écran du Modèle Physique de Données**
![Modèle Physique de Données](/readme/mpd.jpg)


**Table**
![Tabledb](/readme/tablesdb.jpg)

**Structure de chaque table**

**Clients**
![structure](/readme/structureclients.jpg)
![table](/readme/atclients.jpg)

**Eating**
![structure](/readme/structureeating.jpg)
![table](/readme/ateating.jpg)

**Events**
![structure](/readme/structureevents.jpg)
![table](/readme/atevents.jpg)

**Feast**
![structure](/readme/structurefeast.jpg)
![table](/readme/atfeast.jpg)

**Foods**
![structure](/readme/structurefoods.jpg)
![table](/readme/atfoods.jpg)

**Memories**
![structure](/readme/structurememories.jpg)
![table](/readme/atmemories.jpg)

**Message**
![structure](/readme/structuremessages.jpg)
![table](/readme/atmessages.jpg)

**Occasions**
![structure](/readme/structureoccasions.jpg)
![table](/readme/atoccasions.jpg)

**Offers**
![structure](/readme/structureoffers.jpg)
![table](/readme/atoffers.jpg)

**Providers**
![structure](/readme/structureproviders.jpg)
![table](/readme/atproviders.jpg)

**Requests**
![structure](/readme/structurerequests.jpg)
![table](/readme/atrequests.jpg)

**Visual**
![structures](/readme/structurevisual.jpg)



---

## 🔍 Requètes 



SELECT O.*, P.*
	FROM AT_OFFERS O
	JOIN AT_PROVIDERS P ON O.PR_Code = P.PR_Code
        ORDER BY O.OF_Code;';

Permet de récupérer toute les infos des offres et des prestataires.

-- -------------------------

if ($prestataire == 0) {
    $requete = "INSERT INTO AT_CLIENTS (CL_Code, CL_LastName, CL_FirstName, CL_Phone, CL_Mail, CL_City, CL_PostalCode, CL_Profil, CL_Username, CL_Password) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?, NULL, ?, ?)";
} else {
    $requete = "INSERT INTO AT_PROVIDERS 
    (PR_Code, PR_Label, PR_Phone, PR_Mail, PR_WebSite, PR_Profil, PR_PostalCode, PR_Adress, PR_City, PR_Username, PR_Password) 
    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
}

Permet d'inscrire un utilisateur en fonction de si il coche prestataire ou non (donc client)


-- ------------------------

INSERT INTO AT_MESSAGES (sender_username, recipient_username, message_text) 
                             VALUES ('$username', '$recipient_username', '$message_text')";

Permet d'envoyer un message et d'en sauvegarder une trace pour l'historique.

-- -----------------------

    $query = "SELECT * FROM AT_MESSAGES WHERE sender_username = '$username' OR recipient_username = '$username' ORDER BY message_date DESC";
 
Permet d'afficher l'historique de message en fonction de leur date d'envoie.


-- ------------

"SELECT X.At_FirstName
FROM (
    SELECT 'Client' AS Type, CL_FirstName AS At_FirstName, CL_Username FROM AT_CLIENTS
    UNION ALL
    SELECT 'Prestataire', PR_Label AS At_FirstName, PR_Username AS CL_Username FROM AT_PROVIDERS
) AS X
WHERE X.CL_Username = ?";

Permet de récuperer le nom de la personne et de l'afficher (Prestataire = label)


-- ---------------------

  $sql = "INSERT INTO AT_OFFERS (OF_Label, OF_Description, OF_Price, OF_Pictures, PR_Code, OF_MinGuest, OF_MaxGuest) 
                VALUES (?, ?, ?, NULL, ?, ?, ?)";

Permet la création d'offre 

-- -----------------------

"INSERT INTO AT_REQUESTS (RE_Label, RE_Description, RE_Date, RE_City, RE_PostalCode, RE_Guest, RE_Budget, EV_Code, CL_Code)
            VALUES ('$label', '$description', '$date', '$ville', '$codePostal', $nbInvite, $budget, $evenement, $codeClient)";

Permet la création d'une demande

-- ------------------------------

"SELECT R.*, C.*, E.*
FROM AT_REQUESTS R
JOIN AT_CLIENTS C ON R.CL_Code = C.CL_Code
JOIN AT_EVENTS E ON R.EV_Code = E.EV_Code
WHERE RE_Label LIKE '%$search%' OR RE_Description LIKE '%$search%'";

Requete pour la barre de recherche

-- -----------------------

"SELECT * FROM AT_MEMORIES ORDER BY ME_Date DESC;";

Récuperation de la catégorie souvenir


---

## 🎨 Design & Maquettage

Une **maquette Figma** a été conçue en amont du développement afin de structurer le parcours utilisateur et harmoniser le design général.  
Le site est entièrement responsive grâce à **Bootstrap**, et respecte une charte graphique sobre et professionnelle.

---

## ✅ Objectifs atteints

- Développement d’un site complet et fonctionnel  
- Intégration et exploitation d’une base de données relationnelle  
- Création de fonctionnalités interactives (connexion, messages, contact)  
- Réalisation d’une maquette Figma fidèle au rendu final  
- Respect des contraintes techniques et esthétiques de la SAÉ 203  
- Travail collaboratif efficace et équilibré

---

## 📁 Arborescence du projet

sae203-atable
├─ .htaccess
├─ construction
│  ├─ bibli.php
│  ├─ connexion_mysql.php
│  ├─ favicon.svg
│  ├─ index.php
│  ├─ medias
│  │  ├─ contenu
│  │  │  ├─ Construction.webp
│  │  │  ├─ offre
│  │  │  │  └─ intro.webp
│  │  │  ├─ photoEntreprise
│  │  │  │  ├─ airMarinUser.webp
│  │  │  │  ├─ cakePlaisirUser.webp
│  │  │  │  ├─ cakeUser.webp
│  │  │  │  ├─ canaUser.webp
│  │  │  │  ├─ carrouselbergUser.webp
│  │  │  │  ├─ CherrierUser.webp
│  │  │  │  ├─ CyprienUser.webp
│  │  │  │  ├─ FineMareeUser.webp
│  │  │  │  ├─ GalceUser.webp
│  │  │  │  ├─ GourmandeUser.webp
│  │  │  │  ├─ GroletUser.webp
│  │  │  │  ├─ HammametUser.webp
│  │  │  │  ├─ HarmonieUser.webp
│  │  │  │  ├─ JumeauxUser.webp
│  │  │  │  ├─ LeGarconUser.webp
│  │  │  │  ├─ LesFillesUser.webp
│  │  │  │  ├─ MarcinoUser.webp
│  │  │  │  ├─ MessineUser.webp
│  │  │  │  ├─ NiceUser.webp
│  │  │  │  ├─ PerelleUser.webp
│  │  │  │  ├─ PlaisirUser.webp
│  │  │  │  ├─ PoilaneUser.webp
│  │  │  │  ├─ RitzUser.webp
│  │  │  │  ├─ RomainvilleUser.webp
│  │  │  │  └─ YankaUser.webp
│  │  │  ├─ photoOffre
│  │  │  │  ├─ blinis.webp
│  │  │  │  ├─ cremeBrulee.webp
│  │  │  │  ├─ crepeFramboise.webp
│  │  │  │  ├─ cylindreChocoBlanc.webp
│  │  │  │  ├─ dosCabillaud.webp
│  │  │  │  ├─ parisBrest.webp
│  │  │  │  ├─ samoussaPoulet.webp
│  │  │  │  ├─ supremeVolaille.webp
│  │  │  │  ├─ tacoSaumon.webp
│  │  │  │  └─ tarteletteSaintJacques.webp
│  │  │  └─ photoProfil
│  │  │     ├─ AlbaUser.webp
│  │  │     ├─ AlbaUserM.webp
│  │  │     ├─ EmmaUser.webp
│  │  │     ├─ EmmaUserM.webp
│  │  │     ├─ GabrielUser.webp
│  │  │     ├─ GabrielUserM.webp
│  │  │     ├─ JadeUser.webp
│  │  │     ├─ JadeUserM.webp
│  │  │     ├─ JamalUser.webp
│  │  │     ├─ JamalUserM.webp
│  │  │     ├─ LeoUser.webp
│  │  │     ├─ LeoUserM.webp
│  │  │     ├─ LouiseUser.webp
│  │  │     ├─ LouiseUserM.webp
│  │  │     ├─ MaelUser.webp
│  │  │     ├─ MaelUserM.webp
│  │  │     ├─ RaphaelUser.webp
│  │  │     ├─ RaphaelUserM.webp
│  │  │     ├─ RomyUser.webp
│  │  │     └─ RomyUserM.webp
│  │  └─ interface
│  │     ├─ erreur403.webp
│  │     ├─ erreur404.webp
│  │     ├─ Fichier_24x.webp
│  │     └─ logo.svg
│  └─ pages
│     ├─ 403.php
│     ├─ 404.php
│     ├─ afficheProposition.php
│     ├─ connexion.php
│     ├─ contact.php
│     ├─ deconnexion.php
│     ├─ inscription.php
│     ├─ mentionlegal.php
│     ├─ messages.php
│     ├─ profil.php
│     ├─ recherche.php
│     └─ souvenirs.php
├─ index.php
├─ medias
├─ photojuliette.jpg
├─ photonicolas.jpg
└─ ReadMe.md

---


##  🌱 sobriété et éco-conception
![Capture écoconception](/readme/eco.png)
---


## ♻️ Score eco-index du site
80/100
Score : B
---


## 🌍 Poids de chaque page du site
0.968 Mo

---



## 🎯 Liste des éléments faits et manquants dans le projet

**Générales**
✓ Utiliser les langages web vus en cours : HTML, CSS, JS, PHP. 
✓ Utiliser une base de données relationnelle et le langage associé SQL.
✓Les codes (HTML, CSS, JS, PHP) devront être écrits selon les règles et conventions en vigueur, correctement indentés et commentés.
✓Vous devrez utiliser le logiciel VSCode pour l'édition des codes informatiques et la mise en ligne sur les serveurs.
✓Le site (par son thème, ses données, ses contenus médias ou textuels...) ne devra contenir aucune connotation ou interprétation politique, religieuse, sexuelle etc.
X Les médias intégrés pourront être tirés d'internet mais devront être libres de droit 
✓ Il ne faut pas reprendre le concept/le site créé en sae105


**Intégration**

✓Maintien des contraintes déjà en vigueur dans la SAÉ 105
✓Les fichiers seront organisés en dossiers, conformément aux préconisations d'arborescence faites en cours IntegWeb (classement des fichiers selon leur type ou fonctions).
✓Les pages créées doivent être valides (respect des normes W3C)
✓Les éléments d'intégration en faveur de l'accessibilité devront être utilisés partout où cela est possible (images, liens, formulaires...)
✓Une barre de navigation devra être présente sur toutes les pages pour accéder aux différentes parties du site (voir exemples mis à disposition dans la section "Documents / Liens utiles")
✓Sur l'ensemble du site, vous devrez avoir intégré un maximum d'éléments sémantiques abordés en intégration : titres, paragraphes, médias, listes, tableaux, formulaire etc.
✓Votre site devra contenir au moins un formulaire. La soumission du formulaire donnera lieu à l'envoi des informations saisies par mail à un étudiant du binôme. Le formulaire ne devra pouvoir être soumis que si les données sont correctes (bons types de champs, champs obligatoires ou non)
✓Les médias devront être optimisés pour une diffusion sur le web (format, taille, niveau de compression...)
✓Votre site devra intégrer une favicon personnalisée
✓Les méta données (auteur, mots clés, description, title...) devront être à jour et bien choisies

**Éléments spécifiques à la SAÉ 203**

✓Le site devra exploiter au maximum la plateforme BOOTSTRAP dans sa version en cours (5.3)
✓Bootstrap devra être utilisé en mode "CDN" (voir fin du TP @Home). Pas de dossier dist à stocker donc
✓Il est interdit d'utiliser un modèle (template) BOOTSTRAP existant. L'utilisation d'un modèle existant entrainera la note de 0
✓Le site devra avoir une structure qui se détache au maximum de l'exemple @Home
✓Dans la version dynamique, il n'y aura plus de fichier d'extension .html, il faudra utiliser l'extension PHP pour tous les fichiers, même si il n'y a pas de code PHP dans certains de ces fichiers. Par conséquent, la page principale du site sera nommée index.php 
✓Il faudra intégrer un contenu rédactionnel significatif dans les pages statiques
✓Les pages devront être 100% responsive et donc s'afficher parfaitement sur tous les tailles d'écran
✓Toutes les images bitmap devront être stockées au format webp ou avif
✓Attention : il est important lors de l'intégration de fragments de code bootstrap depuis la documentation :
de s'assurer qu'il n'y a pas de valeur d'id dupliquée (il reste donc indispensable d'opérer la validation w3c des codes html)
d'ajouter un maximum de sémantique en remplaçant les <div> qui peuvent l'être par les balises sémantiques adaptées (section, article, aside, blockquote etc.).


**Système d'information**

✓Votre système d'information devra exploiter un nombre d'environ 6 à 10 tables avec des liaisons (mécanisme de clé étrangère).
✓Votre MCD devra contenir au moins une association hiérarchique (1-n) et au moins une association non hiérarchique (n-n)
✓L'interclassement de vos tables sera "utf8_mb4general_ci" 
✓Le moteur de base de données sera "myisam" (pas innodb). Les contraintes de clés étrangères ne sont par conséquent pas à matérialiser
✓Le nom de chaque table doit être préfixé par le nom du projet (ou ses initiales). Sur le projet nommé athome, cela donnerait ces noms de table : athome_categories, athome_biens et athome_employes
✓Le nom de chaque champ sera préfixé par les initiales de sa table
✓Les noms de tables et de champs de votre base seront en anglais
✓Dans votre projet, vous devrez utiliser a minima certaines requêtes de type jointure, exploitant donc la relation existant entre les tables, mais aussi les clauses de filtrage (WHERE) et de classement (ORDER BY). Des requêtes plus avancées (limit, having, group by, fonctions sql, imbriquées...) sont bienvenues et donneront lieu à un bonus. 
✓Vos tables devront contenir une quantité significative d'enregistrements
✓Un mot de passe stocké dans un champ ne doit pas l'être en clair, il devra être crypté via la fonction php: sha1()

**Développement web**

✓Le développement reposera sur PHP et des fonctions MYSQLi pour l'accès aux bases de données, en utilisant les instructions vues en cours. Pour toute autre instructions PHP demander validation.
✓Le code doit être bien commenté pour chaque ligne technique.
✓Le code devra être factorisé (la barre de navigation, le footer seront dans des fichiers séparés)

**Optionnel pour améliorer la note** : 

✓Il doit y avoir un système de connexion dans la barre de navigation qui envoie sur un formulaire de connexion. Il faudra une table contenant les données de connexion et les mots de passe devront être hashés dans la table. Si la connexion se passe bien, on revient automatiquement sur la page d'accueil du site sinon cela affiche un message d'erreur dans la page connexion. Dans cette même page, il doit y avoir un lien vers une page d'inscription et une page de modification de mot de passe. 
✓Lorsque vous êtes connecté, la barre de navigation doit évoluer en permettant d'accéder à sa page profil (et/ou une page panier) et aussi un lien de déconnexion.
✓Pour le formulaire de contact : Les données du formulaire devront être envoyées par mail (voir exemple disponible dans la section "Documents / Liens utiles"). Voir exemple de code script réalisant l'envoi par mail (à adapter par rapport à votre formulaire)
✓Le formulaire devra permettre de saisir l'adresse mail destinataire des données
✓Il faut pouvoir naviguer dans les champs du formulaire par le clavier (accessibilité)La barre de navigation devra contenir un formulaire de recherche fonctionnel.
✓Pour les requêtes envoyées vers la BDD, elles devront respecter au mieux les bonnes pratiques de sécurité vues en cours afin déviter les attaques d'injections de code.

**Hébergement**

✓Maintien des contraintes déjà en vigueur dans la SAÉ 105
✓Vous devrez avoir mis en place un fichier .htaccess à la racine de votre projet
interdisant le "listage" des fichiers/dossiers du projet (redirection vers l'index)
spécifiant des pages "error 404" et "error 403 " personnalisées, conforme à l'identité visuelle de votre site

Éléments spécifiques à la SAÉ 203
✓Votre site devra être hébergé sur deux espaces web : le serveur webetu d'un étudiant du binôme et chez l'hébergeur AlwaysData (https://www.alwaysdata.com/fr). Les étudiants ayant déjà un hébergeur personnel ou souhaitant acquérir leur propre nom de domaine et hébergement sont libres de le faire et de l'utiliser pour gérer un troisième hébergement. 


---

Nous avons fait un usage raisonné de l’intelligence artificielle, en sollicitant une aide modérée.


## 🧠 Projet réalisé dans le cadre de la SAÉ 203 - BUT MMI 1ère année Saint-Dié-Des-Vosges
