# arctic-wordpress-theme
A Wordpress theme based on the Arctic and Aurora Borealis. Used by arcticdata.io

## Style changes
- Edit the Sass files in /theme/library/scss
- Run the Sass compiler to create the finished product, the `style.css` CSS file:
  ```bash
  sass --watch theme/library/scss/style.scss:theme/style.css
  ```
  The `--watch` flag will tell Sass to compile after every change to the .scss files.
- The `style.css` file can be updated in Wordpress by copying the file to `wp-content/themes/aurora` in the Wordpress installation.

### About Sass
Learn more about Sass using the Sass guide: https://sass-lang.com/guide
