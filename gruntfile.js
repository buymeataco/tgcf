module.exports = function(grunt) {
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-scss-lint');
	grunt.initConfig({
		uglify: {
			my_target: {
				files: {
					'js/script.min.js': ['_/components/js/*.js']
				} //files
			} //my_target
		}, //uglify
		compass: {
			dev: {
				options: {
					config: 'config.rb'
				} //options
			} //dev
		}, //compass 
		postcss: {
			options: {
				processors: [
					require('pixrem')(), // add fallbacks for rem units 
					require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes 
				]
			},
			dist: {
				src: 'css/*.css'
			}
		},
		scsslint: {
    		allFiles: [
      			'_/components/sass/*.scss',
    		],
    		options: {
      			bundleExec: false,
      			reporterOutput: 'scss-lint-report.xml',
      			colorizeOutput: true
    		},
  		},
		watch: {
			options: {livereload: true},
			scripts: {
				files: ['_/components/js/*.js'],
				tasks: ['uglify']
				}, //scripts
			sass: {
				files: ['_/components/sass/*.scss'],
				tasks: ['compass:dev']
				}, //sass
			html: {
				files: ['*.php']
				}				
		} //watch
	}) //initConfig
	grunt.registerTask('default',['watch','scsslint']);
} //exports