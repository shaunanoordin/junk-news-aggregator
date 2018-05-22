/*  
Junk News Aggregator
--------------------

(Shaun A. Noordin | shaunanoordin.com | 20180518)
--------------------------------------------------------------------------------
 */

//Import style and asset files, so Webpack knows to package them.
import "./main.styl";
import "./assets/simple-bg.png";
import "./pages/index.php";
import "./pages/index.html";

/*  Primary App Class
 */
//==============================================================================
class App {
  constructor() {
    //this.console = document.getElementById("console");
    console.log("START");
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
