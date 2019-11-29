module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        copy: {
            live2d_widget: {
                expand: true,
                cwd: 'node_modules/live2d-widget/lib',
                src: '**',
                dest: '../js/live2d-widget/',
            },
            live2d_models: {
                files: [
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-chitose/assets',
                        src: '**',
                        dest: '../assets/live2d_models/chitose/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-epsilon2_1/assets',
                        src: '**',
                        dest: '../assets/live2d_models/epsilon2_1/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-gf/assets',
                        src: '**',
                        dest: '../assets/live2d_models/gf/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-haruto/assets',
                        src: '**',
                        dest: '../assets/live2d_models/haruto/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-hibiki/assets',
                        src: '**',
                        dest: '../assets/live2d_models/hibiki/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-hijiki/assets',
                        src: '**',
                        dest: '../assets/live2d_models/hijiki/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-izumi/assets',
                        src: '**',
                        dest: '../assets/live2d_models/izumi/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-koharu/assets',
                        src: '**',
                        dest: '../assets/live2d_models/koharu/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-miku/assets',
                        src: '**',
                        dest: '../assets/live2d_models/miku/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-ni-j/assets',
                        src: '**',
                        dest: '../assets/live2d_models/ni-j/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-nico/assets',
                        src: '**',
                        dest: '../assets/live2d_models/nico/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-nietzsche/assets',
                        src: '**',
                        dest: '../assets/live2d_models/nietzsche/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-nipsilon/assets',
                        src: '**',
                        dest: '../assets/live2d_models/nipsilon/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-nito/assets',
                        src: '**',
                        dest: '../assets/live2d_models/nito/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-shizuku/assets',
                        src: '**',
                        dest: '../assets/live2d_models/shizuku/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-tororo/assets',
                        src: '**',
                        dest: '../assets/live2d_models/tororo/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-tsumiki/assets',
                        src: '**',
                        dest: '../assets/live2d_models/tsumiki/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-unitychan/assets',
                        src: '**',
                        dest: '../assets/live2d_models/unitychan/',
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/live2d-widget-model-z16/assets',
                        src: '**',
                        dest: '../assets/live2d_models/z16/',
                    },

                ]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.registerTask('default', ['copy']);
};