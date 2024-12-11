# Frontend Next.js pour WordPress Headless

Application frontend Next.js optimisée pour WordPress Headless avec support TypeScript, Tailwind CSS et système de preview en temps réel.

## 🚀 Fonctionnalités

- ⚡️ Next.js 12+ avec TypeScript
- 🎨 Tailwind CSS pour le styling
- 🔄 Preview en temps réel des articles
- 📱 Design responsive
- 🔍 SEO optimisé
- 🔒 Sécurité renforcée
- 💾 Mise en cache optimisée
- 🌐 API WordPress intégrée

## 📋 Prérequis

- Node.js 14+
- WordPress avec le thème wp-starter-headless installé
- npm ou yarn

## 🛠️ Installation

1. Clonez le projet :

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

4. Modifiez .env.local avec l'URL de votre WordPress :

```env
NEXT_PUBLIC_WORDPRESS_API_URL=http://votre-wordpress.com
```

## 📁 Structure du projet

```
front_nextjs/
├── src/
│   ├── components/          # Composants React réutilisables
│   │   ├── layout/         # Composants de mise en page
│   │   ├── posts/          # Composants liés aux articles
│   │   └── common/         # Composants communs
│   ├── lib/                # Fonctions utilitaires et API
│   ├── types/              # Types TypeScript
│   └── utils/              # Fonctions helpers
├── pages/                  # Routes Next.js
│   ├── api/               # API Routes
│   ├── posts/            # Pages des articles
│   └── preview/          # Pages de preview
├── public/                # Fichiers statiques
└── styles/               # Styles globaux
```

## 🚀 Développement

Lancez le serveur de développement :

```bash
npm run dev
# ou
yarn dev
```

Ouvrez [http://localhost:3000](http://localhost:3000) dans votre navigateur.

## 🔄 Système de Preview

Le système de preview permet de visualiser les articles non publiés :

1. Éditez un article dans WordPress
2. Cliquez sur "Preview"
3. Vous êtes redirigé vers l'URL de preview sécurisée
4. Les modifications sont visibles en temps réel

## 📡 API WordPress

L'application se connecte aux endpoints suivants :

```typescript
/wp-json/wp-headless/v1/posts      # Liste des articles
/wp-json/wp-headless/v1/posts/{id} # Article spécifique
/wp-json/wp-headless/v1/preview    # Preview des articles
```

## 🎨 Styling

Le projet utilise Tailwind CSS pour le styling :

1. Les classes sont définies dans `tailwind.config.js`
2. Les styles globaux sont dans `styles/globals.css`
3. Les composants utilisent les classes Tailwind

## 🔒 Sécurité

- Validation des données d'API
- Protection XSS
- Tokens sécurisés pour les previews
- Headers de sécurité configurés

## 📦 Build et Déploiement

1. Créez une build de production :

```bash
npm run build
# ou
yarn build
```

2. Démarrez le serveur de production :

```bash
npm start
# ou
yarn start
```

### Déploiement sur Vercel

```bash
vercel deploy
```

## 🔧 Configuration avancée

### Personnalisation des composants

1. Créez de nouveaux composants dans `src/components/`
2. Importez et utilisez-les dans vos pages

### Ajout de nouvelles routes

1. Créez des fichiers dans `pages/`
2. Utilisez le routing dynamique de Next.js

### Modification de l'API

1. Ajoutez des fonctions dans `src/lib/wordpress.ts`
2. Créez de nouvelles API routes dans `pages/api/`

## 🐛 Débogage

1. Utilisez les outils de développement Next.js
2. Vérifiez les logs dans la console
3. Utilisez le mode debug de VS Code

## 📝 Scripts disponibles

```json
{
  "dev": "next dev",
  "build": "next build",
  "start": "next start",
  "lint": "next lint",
  "type-check": "tsc --noEmit"
}
```

## 🔍 SEO

- Métadonnées optimisées
- Support des Open Graph tags
- Sitemap automatique
- robots.txt configurable

## 📱 Responsive Design

- Mobile-first approach
- Breakpoints configurables
- Images optimisées

## 🤝 Contribution

1. Fork le projet
2. Créez une branche (`git checkout -b feature/AmazingFeature`)
3. Commit vos changements (`git commit -m 'Add AmazingFeature'`)
4. Push sur la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## 📜 License

Distribué sous la licence MIT. Voir `LICENSE` pour plus d'informations.

## 🆘 Support

Pour toute question ou problème :

1. Consultez la documentation
2. Ouvrez une issue
3. Contactez l'équipe de développement

## 🔄 Mises à jour

Pour mettre à jour les dépendances :

```bash
npm update
# ou
yarn upgrade
```

## 📚 Documentation complémentaire

- [Next.js Documentation](https://nextjs.org/docs)
- [WordPress REST API](https://developer.wordpress.org/rest-api/)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [TypeScript](https://www.typescriptlang.org/docs)
