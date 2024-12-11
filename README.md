# WordPress Headless avec Next.js Frontend

Ce projet est une solution complète pour créer un site WordPress headless avec un frontend Next.js. Il comprend un thème WordPress personnalisé et une application Next.js optimisée.

## 🚀 Caractéristiques

- ⚡️ Performance optimisée avec Next.js
- 🔒 Authentification JWT sécurisée
- 🔍 SEO optimisé
- 📱 Responsive design
- 🔄 Preview en temps réel
- 🌐 API REST personnalisée
- 💾 Mise en cache intelligente
- 🎨 Tailwind CSS pour le styling
- 📝 TypeScript pour la sécurité du type

## 📋 Prérequis

### Backend WordPress

- PHP 7.4+
- WordPress 5.9+
- Plugins requis :
  - JWT Authentication
  - WP REST Cache
  - Advanced Custom Fields (recommandé)

### Frontend Next.js

- Node.js 14+
- npm ou yarn
- Git

## 🛠 Installation

### 1. Configuration WordPress

1. Installez WordPress
2. Clonez le thème headless :

```bash
cd wp-content/themes/
git clone https://github.com/votre-repo/wp-starter-headless
```

3. Activez le thème dans l'admin WordPress
4. Installez et activez les plugins requis
5. Configurez les permaliens (Settings > Permalinks) sur "Post name"

### 2. Configuration du Frontend

1. Clonez le dépôt frontend :

```bash
git clone https://github.com/votre-repo/front_nextjs
cd front_nextjs
```

2. Installez les dépendances :

```bash
npm install
# ou
yarn install
```

3. Configurez les variables d'environnement :

```bash
cp .env.local.example .env.local
```

4. Modifiez .env.local avec vos paramètres :

```env
NEXT_PUBLIC_WORDPRESS_API_URL=http://votre-wordpress.com
NEXT_PUBLIC_SITE_URL=http://votre-frontend.com
JWT_SECRET_KEY=votre-clé-secrète
```

## 🚦 Développement

### Backend WordPress

Le thème WordPress expose plusieurs endpoints API :

```bash
/wp-json/wp-headless/v1/posts     # Liste des articles
/wp-json/wp-headless/v1/pages     # Liste des pages
/wp-json/wp-headless/v1/menus     # Menus de navigation
/wp-json/wp-headless/v1/settings  # Paramètres globaux
/wp-json/wp-headless/v1/preview   # Preview des articles
```

### Frontend Next.js

Démarrez le serveur de développement :

```bash
npm run dev
# ou
yarn dev
```

## 📁 Structure des fichiers

```
frontend/
├── src/
│   ├── components/          # Composants React
│   ├── lib/                # Utilitaires et API
│   ├── pages/              # Routes Next.js
│   ├── styles/             # Styles globaux
│   └── types/              # Types TypeScript
├── public/                 # Fichiers statiques
└── package.json

wordpress-theme/
├── inc/
│   ├── api/                # Endpoints API
│   ├── admin/             # Interface admin
│   └── core/              # Fonctions core
└── functions.php
```

## 🔒 Sécurité

### WordPress

- Authentification JWT pour l'API
- Rate limiting
- CORS configuré
- Validation des données
- Sanitization des entrées

### Next.js

- Protection XSS
- Headers de sécurité
- Validation des données
- Gestion sécurisée des tokens

## 🚀 Déploiement

### WordPress

1. Déployez WordPress sur votre hébergement
2. Configurez SSL
3. Activez le cache
4. Configurez les variables d'environnement

### Next.js

1. Construisez l'application :

```bash
npm run build
# ou
yarn build
```

2. Déployez sur votre plateforme préférée (Vercel recommandé) :

```bash
vercel deploy
```

## 📈 Performance

- Mise en cache API côté WordPress
- Static Site Generation avec Next.js
- Images optimisées
- Code splitting automatique
- Prefetching intelligent

## 🔄 Preview en temps réel

Le système de preview permet de visualiser les modifications avant publication :

1. Éditez un article dans WordPress
2. Cliquez sur "Preview"
3. Vous êtes redirigé vers le frontend avec une URL sécurisée
4. Les modifications sont visibles en temps réel

## 🎨 Personnalisation

### WordPress

- Ajoutez des endpoints API personnalisés dans `/inc/api/endpoints/`
- Personnalisez l'admin dans `/inc/admin/`
- Ajoutez des hooks dans `functions.php`

### Next.js

- Créez des composants dans `/src/components/`
- Ajoutez des pages dans `/src/pages/`
- Personnalisez les styles dans `/src/styles/`

## 📝 Contribution

1. Fork le projet
2. Créez une branche (`git checkout -b feature/AmazingFeature`)
3. Commit vos changements (`git commit -m 'Add AmazingFeature'`)
4. Push sur la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## 📜 License

Distribué sous la licence MIT. Voir `LICENSE` pour plus d'informations.

## 📧 Contact

Votre Nom - [@votretwitter](https://twitter.com/votretwitter)

Lien du projet : [https://github.com/votre-nom/wp-starter-headless](https://github.com/votre-nom/wp-starter-headless)

## 🙏 Remerciements

- [WordPress](https://wordpress.org)
- [Next.js](https://nextjs.org)
- [Vercel](https://vercel.com)
- [Tailwind CSS](https://tailwindcss.com)
