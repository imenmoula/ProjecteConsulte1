# **ConsultingExpert**

**ConsultingExpert** est une plateforme de consulting en ligne développée avec Angular pour le frontend, Node.js et FastAPI pour le backend, et MongoDB pour la base de données. Elle permet aux utilisateurs de se connecter, de consulter des experts dans différents domaines et de gérer leurs consultations.

---

## **Fonctionnalités**

### **Authentification Utilisateur :**
- Écran de connexion pour les utilisateurs inscrits.
- Écran d’inscription pour les nouveaux utilisateurs.
- Déconnexion sécurisée.

---

### **Administration :**
- **Gestion des domaines** : Ajouter, modifier et supprimer des domaines d’expertise.
- **Gestion des experts** : Ajouter, éditer ou supprimer les profils des experts.
- **Suivi des disponibilités** : Consulter et mettre à jour les créneaux disponibles des experts.
- **Liste des clients** : Visualiser et gérer les comptes des clients.

---

### **Expert :**
- **Modification du profil** : Personnalisation des informations professionnelles.
- **Gestion des disponibilités** : Ajout, édition et suppression des créneaux horaires.
- **Consultations** : Suivi et gestion des rendez-vous avec les clients.

---

### **Utilisateur :**
- **Passer une demande de consultation** : Réserver un rendez-vous avec un expert.
- **Consulter les experts** : Recherche et exploration des profils experts par domaine.
- **Gestion du compte** : Mise à jour des informations personnelles.

---

## **Captures d'Écran**

### **1. Interface utilisateur**
![interface utilisateur](public/photo/photo1.png)


---

### **2. a propos interface user**
![apropos](public/photo/photo2.png)

---

### **3. Profil de l’Expert**
![ edit Profil Expert](public/photo/photo3.png)

---



### **5. Gestion des Disponibilités**
![Gestion des Disponibilités](C:\laragon\www\ProjecteConsulte1\public\photo\photo4.png)
---

## **Installation**

1. **Clonez le dépôt :**
   ```bash
   git clone https://github.com/votre-utilisateur/consulting-expert.git
   cd consulting-expert

1. **Installation des dépendances PHP avec Composer :**Assurez-vous d'avoir Composer installé. Ensuite, exécutez la commande suivante pour installer les dépendances :
   ```bash
         composer install

1. **Exécution des migrations :** Pour configurer la base de données, exécutez la commande suivante pour appliquer les migrations :
 ```bash
 php artisan migrate