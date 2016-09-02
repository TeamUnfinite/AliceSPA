var gulp = require('gulp');
var compilerPackage = require('google-closure-compiler');
var closureCompiler = compilerPackage.gulp();

gulp.task('build',function(){
    return closureCompiler({
          js: [
              'AliceSPA/AngularExt.js',
              'AliceSPA/AliceSPA.module.js',
              'AliceSPA/Constant/*.js',
              'AliceSPA/Directive/*.js',
              'AliceSPA/Service/*.js'
            ],
          externs: [
              'AliceSPA/Closure-Compiler.extern.js'
            ],
          compilation_level: 'SIMPLE',
          warning_level: 'VERBOSE',
          language_in: 'ECMASCRIPT6',
          language_out: 'ECMASCRIPT5_STRICT',
          //output_wrapper: '(function(){\n%output%\n}).call(this)',
          js_output_file: 'AliceSPA.min.js'
        })
        .src() // needed to force the plugin to run without gulp.src
        .pipe(gulp.dest('./AliceSPA_dist'));
});
