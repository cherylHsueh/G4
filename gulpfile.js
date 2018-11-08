//套件引入
var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;


// sass 編譯函式
gulp.task('sass', function () {
  return gulp.src('./sass/*.scss') //來源目錄
    .pipe(sass().on('error', sass.logError)) //經由sass 轉譯
    .pipe(gulp.dest('./css')); //目的地目錄
});





gulp.task('default', ['sass'], function () {

  browserSync.init({
    server: {
      //根目錄
      baseDir: "./",
<<<<<<< HEAD
      index: "aboutNew.html"
=======
      index: "blogSubmit.html"
>>>>>>> commit: 私藏內頁及分享頁新增動態及背景物件
    }
  });

  gulp.watch(["sass/*.scss"  , "sass/**/*.scss"], ['sass']).on('change', reload);
  gulp.watch("*.html").on('change', reload);
  gulp.watch("js/*.js").on('change', reload);
  gulp.watch("images/*").on('change', reload);
  // gulp.watch("images/*").on('change', reload);
<<<<<<< HEAD
});
=======
});
>>>>>>> commit: 私藏內頁及分享頁新增動態及背景物件