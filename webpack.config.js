/*
Webpack Config
--------------

--------------------------------------------------------------------------------
 */

var path = require("path");
var nib = require("nib");

var MAIN_APP_FOLDER = "web/news/app";

//Plugins
var CleanWebpackPlugin = require("clean-webpack-plugin");  //Cleans (deletes) the build folder before, er, building.
var ExtractTextPlugin = require("extract-text-webpack-plugin");  //Due to the project setup, Webpack packages the CSS/Stylus files INTO the main.js output file. This plugin allows us to extract the bundled CSS code into its own separate .CSS file.

module.exports = {
  //Main entry point
  //Starting from this entry JS file, Webpack begins to look for which files to
  //bundle into the output package by looking at which JS/image/style/etc files
  //are referenced/imported by the code.
  //Hence, make sure all asset and style files (e.g. JPG/GIF/PNG files,
  //CSS/Stylus files) are imported/referenced in this entry file (or in a JS
  //file imported by this entry file, etc) or one of its "children" JS files.
  entry: "./src/main-news-app/main.js",
  
  //Main output package/bundle
  //Webpack combines all the code imported by the entry JS file (and all the
  //code imported by that imported code, etc etc) to produces a single packaged
  //JS file to be used by our app.
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, MAIN_APP_FOLDER),
    //publicPath: "/",  //Optional: defines the base path for the app.
  },
  
  //Extra functionality
  //- CleanWebpackPlugin: deletes the build folder before building.
  //- ExtractTextPlugin: allows us to extract the CSS code into a file separate
  //  from the main packaged output JS file.
  plugins: [
    new CleanWebpackPlugin([MAIN_APP_FOLDER]),
    new ExtractTextPlugin({
      filename: '[name].css',
      allChunks: true,
    }),
  ],
  
  mode: "development",
  
  //Specify rules for bundling each file type.
  module: {
    rules: [
      {
        //JavaScript files are processed through Babel for ES2015 compatibility.
        test: /\.js$/,
        exclude: /node_modules/,
        use: "babel-loader"
      },
      {
        //PHP and HTML files are simply copied into the app folder.
        test: /\.(html|php\d?)$/,
        exclude: /node_modules/,
        use: [{
          loader: "file-loader",
          
          //These options ensures the image's folder structure is preserved.
          options: {
            name: "[path][name].[ext]",
            context: path.join(__dirname, "src/main-news-app/pages")
          }
        }],
      },
      {
        //Image files are simply copied into the app folder.
        test: /\.(jpg|png|gif|svg\d?)$/,
        exclude: /node_modules/,
        use: [{
          loader: "file-loader",
          
          //These options ensures the image's folder structure is preserved.
          options: {
            name: "[path][name].[ext]",
            context: path.join(__dirname, "src/main-news-app")
          }
        }],
      },
      {
        //Stylus files are processed through several loaders, and then
        //separated into their own .CSS file.
        //Sorry for how convoluted this is; by default, WebPack packages the CSS
        //code into the packaged output JS file, which isn't what we want.
        test: /\.styl$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            {
              loader: 'css-loader',
            },
            {
              loader: 'stylus-loader',
              options: {
                use: [nib()],
              },
            }
          ],
        }),
      },
    ]
  },
}
