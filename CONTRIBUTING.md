# Contribuer à WP Starter Headless

Merci de votre intérêt pour contribuer à WP Starter Headless !

## Process de développement

1. Fork le projet
2. Créez votre branche de fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## Standards de code

### Backend (WordPress)

- PHP : Suivre les [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- REST API : Suivre les [WP REST API Standards](https://developer.wordpress.org/rest-api/)

### Frontend (Next.js)

- JavaScript : Suivre les standards ESLint
- React : Suivre les bonnes pratiques React
- TypeScript recommandé

## Tests

### Backend

- Lancez `composer run phpcs` pour vérifier le code PHP
- Testez les endpoints API avec Postman ou des tests unitaires

### Frontend

- Lancez `npm run lint` pour vérifier le code
- Lancez `npm run test` pour les tests unitaires

## Pull Requests

1. Mettez à jour le README.md avec les détails des changements
2. Mettez à jour le numéro de version dans les fichiers appropriés
3. La PR sera mergée une fois que vous aurez l'approbation d'un mainteneur
