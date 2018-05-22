/*  
Junk News Aggregator
--------------------

(Shaun A. Noordin | shaunanoordin.com | 20180518)
--------------------------------------------------------------------------------
 */

//Import style and asset files, so Webpack knows to package them.
import "./main.styl";
import "./assets/simple-bg.png";

/*  Primary App Class
 */
//==============================================================================
class App {
  constructor() {
    this.console = document.getElementById("console");
  }
}
//==============================================================================

/*  Initialisations
 */
//==============================================================================
var app;
window.onload = function() {
  window.app = new App();
};
//==============================================================================
