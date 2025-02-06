# 📌 Livecoding & Veille sur AJAX

## 🚀 Introduction
Ce projet contient le code source du livecoding et de la veille technologique sur **AJAX (Asynchronous JavaScript and XML)**. L'objectif est de comprendre et de mettre en pratique les principes d'AJAX dans une architecture MVC.

## 📖 Contenu du projet
- **Présentation théorique** : Explication détaillée d'AJAX et son rôle dans le développement web.
- **Exemples de code** : Implémentation d'AJAX avec **jQuery, Fetch API et Axios**.
- **Gestion dynamique des utilisateurs** : CRUD en AJAX avec un backend en PHP.
- **Bonnes pratiques de sécurité** : Protection contre les attaques CSRF et validation côté serveur.

## 🧐 Concepts abordés
### 1️⃣ Définition et fonctionnement d'AJAX
- AJAX permet de **charger des données en arrière-plan** sans recharger la page.
- Il utilise **XMLHttpRequest** ou **Fetch API** pour communiquer avec le serveur.

### 2️⃣ Utilisation d'AJAX dans MVC
- Envoi de requêtes asynchrones pour mettre à jour des parties spécifiques de la page.
- Séparation des responsabilités :
  - **Vue** : Interface utilisateur avec HTML/CSS/JS.
  - **Contrôleur** : Traitement des requêtes AJAX.
  - **Modèle** : Interaction avec la base de données.

### 3️⃣ Intégration avec différentes méthodes
#### 📌 **Avec jQuery**
```javascript
$.ajax({
    url: 'action.php',
    type: 'POST',
    data: { action: 'view' },
    success: function(response) {
        $('#userTable').html(response);
    }
});
```

#### 📌 **Avec Fetch API**
```javascript
fetch('action.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ action: 'view' })
})
.then(response => response.text())
.then(data => document.getElementById('userTable').innerHTML = data);
```

### 4️⃣ Gestion des réponses JSON
```javascript
success: function(response) {
    var data = JSON.parse(response);
    $('#id').val(data.id);
    $('#fname').val(data.fName);
}
```

### 5️⃣ Sécurisation des requêtes AJAX
- **CSRF Token** pour éviter les attaques Cross-Site Request Forgery.
- **Validation côté serveur** pour éviter les failles d’injection.

## 🛠️ Prérequis
- **Serveur local** : XAMPP, WAMP, ou autre.
- **PHP & MySQL** : Backend pour stocker et récupérer les données.
- **jQuery** (optionnel) : Simplifie les appels AJAX.

## 📂 Structure du projet
```
project-ajax/
├── App/
│   ├── index.htphpml     # Interface utilisateur
│   ├── script.js         # Gestion AJAX côté client
│   ├── action.php        # Gestion des requêtes AJAX
│   ├── database.php      # Connexion à la base de données
│   ├── user.php          # Modèle utilisateur (CRUD)
└── README.md             # Documentation
```

## 🚀 Installation & Utilisation
1. **Cloner le repo**
```sh
git clone https://github.com/MouadHallaffou/liveCoding-ajax-mvc
```
2. **Configurer la base de données** (importer `db.sql`).
3. **Démarrer le serveur local** et ouvrir `App/index.php`.

## 📌 Objectifs
- Comprendre le fonctionnement d'AJAX dans un projet MVC.
- Utiliser AJAX pour manipuler des données sans recharger la page.
- Appliquer des bonnes pratiques de sécurité dans les requêtes asynchrones.

## 🔗 Ressources
- [MDN Web Docs - AJAX](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX)
- [jQuery AJAX](https://api.jquery.com/jquery.ajax/)
- [Fetch API](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API)

---
📌 **Auteur** : Mouad Hallaffou
📅 **Date** : 06 - 02 - 2025 

