module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        sourceMap: false,
        outputStyle: 'expanded',
      },
      dist: {
        files: {
          'assets/css/blackoot.dev.css': 'assets/scss/blackoot.scss',
          'assets/css/blackoot-unresponsive.dev.css': 'assets/scss/blackoot-unresponsive.scss',
        }
      }
    },

    postcss: {
      options: {
        processors: [
          require('autoprefixer')({browsers: 'last 2 versions'}),
        ]
      },
      dist: {
        src: 'assets/css/*.dev.css'
      }
    },

    csscomb: {
      dist: {
        options: {
          config: 'assets/css/csscomb.json'
        },
        files: {
          'css/blackoot.dev.css': 'assets/css/blackoot.dev.css',
          'css/blackoot-unresponsive.dev.css': 'assets/css/blackoot-unresponsive.dev.css',
        }
      }
    },

    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      target: {
        files: {
          'css/blackoot.min.css': 'css/blackoot.dev.css',
          'css/blackoot-unresponsive.min.css': 'css/blackoot-unresponsive.dev.css',
        }
      }
    },

    clean: ['assets/css/*.css'],

    jshint: {
      files: ['Gruntfile.js', 'assets/js/blackoot.js'],
      options: {
        globals: {
          jQuery: true
        }
      }
    },

    concat: {
     options: {
      separator: '\n\n',
     },
     dist: {
      src: [
        'assets/js/blackoot.js',
        'assets/js/superfish.js',
      ],
      dest: 'js/blackoot.dev.js',
     },
    },

    uglify: {
      build: {
        src: 'js/blackoot.dev.js',
        dest: 'js/blackoot.min.js'
      }
    },

    makepot: {
      target: {
        options: {
          domainPath: '/languages/',
          potFilename: 'blackoot-lite.pot',
          type: 'wp-theme'
        }
      }
    },

    watch: {
        scss: {
            files: ['assets/scss/*.scss'],
            tasks: ['sass', 'postcss', 'csscomb', 'cssmin', 'clean'],
            options: {
              interrupt: true,
            },
          },
        js: {
            files: ['assets/js/*.js'],
            tasks: ['jshint', 'concat', 'uglify'],
            options: {
              interrupt: true,
            },
          },
        pot: {
            files: ['*.php', '**/*.php', '**/**/*.php'],
            tasks: ['makepot'],
            options: {
              interrupt: true,
            },
          }
    },


});

grunt.registerTask('default', ['sass', 'postcss', 'csscomb', 'cssmin', 'clean', 'jshint', 'concat', 'uglify', 'makepot']);

};
