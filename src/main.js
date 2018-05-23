/*  
Junk News Aggregator
--------------------

(Shaun A. Noordin | shaunanoordin.com | 20180518)
--------------------------------------------------------------------------------
 */

/*  Imports
    Import style and asset files, so Webpack knows to package them.
 */
//------------------------------------------------------------------------------
//Full info on how require.context() and importAll() works is available at
//https://webpack.js.org/guides/dependency-management/
function importAll(r) {
  r.keys().forEach(r);
}
importAll(require.context("./", true, /\.(styl|css)$/));
importAll(require.context("./assets/", true, /\.(png|jpg|gif)$/));
importAll(require.context("./pages/", true, /\.(php|html)$/));
//------------------------------------------------------------------------------

/*  Primary App Class
 */
//------------------------------------------------------------------------------
class App {
  constructor() {
  }
}
//------------------------------------------------------------------------------

/*  Initialisations
 */
//------------------------------------------------------------------------------
window.app = new App();
//------------------------------------------------------------------------------
