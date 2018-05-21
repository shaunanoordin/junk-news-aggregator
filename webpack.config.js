var path = require("path");
var nib = require("nib");
var ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
  entry: "./src/main.js",
  
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "app"),
    //publicPath: "/",
  },
  
  plugins: [
    new ExtractTextPlugin({
      filename: '[name].css',
      allChunks: true,
    }),
  ],
  
  mode: "development",
  
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: "babel-loader"
      },
      {
        test: /\.(jpg|png|gif|svg\d?)$/,
        exclude: /node_modules/,
        use: [{
          loader: "file-loader",
          options: {
            name: "[path][name].[ext]",
            context: path.join(__dirname, "src")
          }
        }],
      },
      {
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
