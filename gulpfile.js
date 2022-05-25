var gulp = require('gulp');

var livereload = require('gulp-livereload');


gulp.task('default', gulp.series(Php,watch));
// gulp.task('default', gulp.parallel(Php,watch));


function watch(){

    livereload.listen();

    gulp.watch('resources/views/**/*.blade.php',Php);


    // gulp.watch('resources/views/**/*.scss', Style);

    gulp.watch('resources/js/**/*.js',Php);
    gulp.watch('resources/js/**/*.vue',Php);

}


function Php(done){

    livereload.reload();

    done();
}


