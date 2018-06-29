const path = require('path')

module.exports = {
  entry: {
    application: ['./resources/assets/sass/application.scss', './resources/assets/js/application.js']
  },
  port: 3003,
  html: false,
  assets_url: '/assets/', // Urls dans le fichier final
  stylelint: './sass/**/*.scss',
  assets_path: path.resolve('./public/assets/'), // ou build ?
  refresh: ['app/**/*.php', 'resources/views/**/*.php'], // Permet de forcer le rafraichissement du navigateur lors de la modification de ces fichiers
  historyApiFallback: false, // Passer à true si on utilise le mode: 'history' de vue-router (redirige toutes les requêtes sans réponse vers index.html)
  debug: process.env.NODE_ENV === 'development'
}
