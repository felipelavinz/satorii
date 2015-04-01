module.exports = function( grunt ){
	grunt.initConfig({
		less : {
			dev:  {
				options: {
					sourceMap: true,
					sourceMapURL: 'style.css.map',
					sourceMapFilename: 'css/style.css.map'
				},
				files: {
					'css/style.css' : 'css/src/style.less'
				}
			},
			dist : {
				options: {
					optimization: 1,
					sourceMap: false,
					plugins: [
						new ( require('less-plugin-clean-css') )()
					]
				},
				files : {
					'css/style.min.css' : 'css/src/style.less'
				}
			}
		},
		watch : {
			styles: {
				files : [ 'assets/**/*.less', 'css/src/**/*.less' ],
				tasks : [ 'less:dev' ]
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default', [ 'watch:styles' ]);
};