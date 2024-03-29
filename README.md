# projetPHP2023
Ceci est un projet de BUT2 en Développement Web, utilisant principalement le langage PHP.

## Etudiantes - Groupe C :
- Lilou Pedro
- Mirindra Randrianarison Ratsiandavana

## Lien de notre applicaton web :
https://patientele.alwaysdata.net/

[**Sujet**](https://moodle.iut-tlse3.fr/course/view.php?id=742) : Création d'une application permettant à un secrétariat de manipuler les RDVs médicaux des patients
L'objectif est de créer une application de gestion d'un cabinet médical permettant au secrétariat de saisir les rendez-vous de consultation. Elle doit permettre de gérer la liste des usagers du centre (avec leurs civilités, leurs noms et prénoms, leurs adresses complètes, leurs dates et lieux de naissance, et leurs numéros de sécurité sociale) ainsi que la liste des médecins (avec leurs civilités, noms, et prénoms). Chaque usager pourra avoir un médecin référent parmi ceux du centre. Le secrétariat devra pouvoir saisir les rendez-vous en choisissant l'usager et le médecin dans des listes et en saisissant la date, l'heure, et la durée de la consultation (30 min par défaut).

## Pré-requis :
Comme l'application doit être accessible aux neophytes, il n'y a aucun pré-requis technique à posséder.

## Prise en main de l'application web

L'application s'ouvre sur la page d'authentification **index.php**. Pour pouvoir y accéder, il faut rentrer un identifiant parmi la liste ci-dessous :

  - TJonquille
  - MLapin
  - ACoquelico
  - STulipe
  - CBouvier
  - BBrioche

Il faut saisir n'importe quel mot de passe.

L'interface se décompose en 4 menus : **Usagers**, **Médecins**, **Consultations** et **Statistiques**.

## Les menus **Usagers**, **Médecins** et **Consultations**
- Affichent la liste des usagers, médecins ou consultations du cabinet médical sous forme de tableau.
- Pour créer un nouvel usager, un nouveau médecin ou une nouvelle consultation, il faut cliquer sur le lien **Ajouter** présenté juste en-dessous du titre.
- Pour modifier ou supprimer un usager, un médecin ou une consultation, il suffit de cliquer sur la colonne **Action** correspondante à ces opérations.
- Pour le cas de la modification d'une consultation, on ne peut modifier que sa durée.

## Le menu **Statistiques**
- Affiche un tableau à double entrées présentant le nombre de patients par tranche d'âge.
- Affiche le nombre d'heures totales effectuées par chaque médecin du cabinet médical.

## Header
- Contient les 4 menus du menu principal.
- Contient une rubrique représentée par une icône de profil qui permet à l'utilisateur de visualiser son profil dans le menu **Profil** ou de se déconnecter.
