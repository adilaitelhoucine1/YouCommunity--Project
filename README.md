# 🎉 Evently

Une plateforme web pour **découvrir, créer et gérer des événements communautaires locaux**. 

## 🚀 Fonctionnalités

- 👤 **Gestion des utilisateurs**
  - Authentification sécurisée
  - Profils utilisateurs avec rôles

- 📅 **Gestion des événements**
  - Création et modification d'événements
  - Filtrage par localisation et catégorie
  - Système de RSVP

- 💬 **Interactions**
  - Commentaires sur les événements
  - Notifications

## 🛠 Technologies

- **Backend :** Laravel 11
- **Frontend :** Blade + Tailwind CSS
- **Base de données :** MySQL/PostgreSQL

## ⚙️ Installation

1. **Cloner le projet**
```bash
git clone https://github.com/adilaitelhoucine1/YouCommunity--Project.git
cd evently
```

2. **Installer les dépendances**
```bash
composer install
npm install
```

3. **Configuration**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Base de données**
```bash
php artisan migrate --seed
```

5. **Lancer le projet**
```bash
php artisan serve
npm run dev
```

## 📝 Licence

Licence MIT

---

Créé avec ❤️ pour la communauté
