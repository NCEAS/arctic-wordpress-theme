# arctic-wordpress-theme
A Wordpress theme based on the Arctic and Aurora Borealis. Used by arcticdata.io

## Run WP locally and develop the theme

1. install docker
2. follow instructions at https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/ to install `wp-env` package.
3. Make sure you're working directory is the root of this repo
4. run `wp-env start`
5. Open http://localhost:8888 in your browser to see the Wordpress site.
6. Login to the admin dashboard at http://localhost:8888/wp-admin/ with username `admin` and password `password`

To stop the server run `wp-env stop`
To start the server again later run `wp-env start`

### Import content from the production site:

1. go to https://arcticdata.io/wp-admin/
2. go to Tools > Export
3. Select "All content" and click "Download Export File"
4. Save the resulting xml file on your machine
5. With you local wp-env server running, go to http://localhost:8888/wp-admin/
6. Go to Tools > Import
7. Select "WordPress" from the list of importers (you may need to install the WordPress importer plugin first)
8. Upload the xml file you downloaded in step 4
9. Assign the posts to an existing user (e.g. admin) and check the box to download and import file attachments
10. Click "Submit" to start the import process.
  

It will take a long time to download all of the media files. You can bypass this step if you want by unchecking the "Download and import file attachments" box in step 9, but your local site will not have any images.

If you ever need to clear this content and start over, you can reset your wp-env environment by running `wp-env destroy` followed by `wp-env start`. This will delete all content and settings and give you a fresh Wordpress install.

### Get real content for testing
1. ssh into the server running wordpress (see https://devdocs.nceas.ucsb.edu/docs/our-projects/adc/)
2. Export the database using `wp export --dir=.` (you may need to install the wp cli tool first)
3. Copy the resulting xml file to your local machine

## Use the theme in a self-hosted Wordpress installation

1. Make sure you have committed and pushed all changes to the theme in this repo
2. ssh into the server running wordpress and navigate to the themes directory
3. Clone this repo or pull the latest changes if you have already cloned it
4. Copy the contents of the `theme` directory in this repo to `wp-content/themes/aurora` in the Wordpress installation
5. Go to the Wordpress admin dashboard and navigate to Appearance > Themes
6. Activate the Aurora theme if it is not already activated

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
