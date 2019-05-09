const gulp = require('gulp')
const plumber = require('gulp-plumber')
const parcel = require('gulp-parcel')

gulp.task('js.parcel', () => {
    return gulp.src(`./src/js/**/*.js`, { read:false })
        .pipe(plumber())
        .pipe(parcel({
            cache: false,
            minify: false,
            hmr: false
        }))
        .pipe(gulp.dest(`./dist/js/`))
})
gulp.task('default', gulp.series('js.parcel'))