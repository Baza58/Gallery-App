var path = require('path');

module.exports = {
	entry: {
		search: './resources/assets/js/search/search.js', 
		galleryHome: './resources/assets/js/gallery-home/galleryHome.js',
		galleryView: './resources/assets/js/gallery-view/galleryView.js',
		galleryViewPublic: './resources/assets/js/gallery-view-public/galleryViewPublic.js',
		galleryHomePublic: './resources/assets/js/gallery-home-public/galleryHomePublic.js',
	},
	output: {
		path: path.join(__dirname, 'public/js/'),
		filename: '[name].js'
	},
	module: {
		loaders: [
			{
				test: /\.js$/,
				loader: 'babel?stage=0',
				exclude: /node_modules/
			},
			{
				test: /\.sass$/,
				loaders: ['style', 'css', 'sass?indentedSyntax' ]
			}
		]
	}
}