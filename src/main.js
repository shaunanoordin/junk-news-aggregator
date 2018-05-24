/*  
Junk News Aggregator
--------------------

(Shaun A. Noordin | shaunanoordin.com | 20180518)
--------------------------------------------------------------------------------
 */

/*  Library Imports
 */
//------------------------------------------------------------------------------
import request from "superagent";
//------------------------------------------------------------------------------

/*  Asset Imports
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

//Config
//------------------------------------------------------------------------------
const API_URL = "../api/";  //TODO //TEMP
//------------------------------------------------------------------------------

/*  Primary App Class
 */
//------------------------------------------------------------------------------
class App {
  constructor() {
    this.html = {};
    
    this.PAGE_TYPES = {
      DEFAULT: "default",  //No particular page type.
      LIST: "list",  //Main listing
    };
    
    this.currentPageType = this.PAGE_TYPES.DEFAULT;
    this.init = this.init.bind(this);
  }
  
  init() {
    console.log('+++ Page Type: ', this.currentPageType);
    
    this.html = {
      app: document.getElementById("app"),
      list: document.getElementById("list"),
      filter: document.getElementById("filter"),
      sort_comments: document.getElementById("sort_comments"),
      sort_shares: document.getElementById("sort_shares"),
      sort_likes: document.getElementById("sort_likes"),
      sort_loves: document.getElementById("sort_loves"),
      sort_hahas: document.getElementById("sort_hahas"),
      sort_wows: document.getElementById("sort_wows"),
      sort_sads: document.getElementById("sort_sads"),
      sort_angrys: document.getElementById("sort_angrys"),
    };
    
    if (this.currentPageType === this.PAGE_TYPES.LIST) {
      this.populateList();
    }
  }
  
  populateList() {
    console.log('+++ App.populateList()', this.html);
    if (!this.html.list) return;
    
    request.get(API_URL)
    .then((response) => {
      console.log("+++ Response: ", response);
      
      if (response && response.ok && response.body && response.body.data) {
        return response.body.data;
      }
      
      throw new Error("Invalid response from API");
    })
    .then((data) => {
      console.log("+++ Data: ", data);
      
      //Reset the list
      const list = this.html.list;
      while (list.hasChildNodes()) { list.removeChild(list.firstChild); }
      
      //TODO: sort and/or filter the data list.
      const sortedData = data;
      
      //For each news article, add it to the list.
      //Structure:
      //  <li class="item">
      //    <a
      //      class="image"
      //      href="https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3"
      //      target="_blank"
      //    >
      //      <img src="https://scontent.xx.fbcdn.net/v/t1.0-0/p130x130/31823834_1703680869686071_5510796134324371456_n.jpg?_nc_cat=0&oh=81acd9fe53f698974d7b4633df7805b2&oe=5B522AC6">
      //    </a>
      //    <div class="content">
      //      <div class="header">
      //        <span class="publisher">100percentfedup</span>
      //        <span class="time">1 hour ago</span>
      //      </div>
      //      <div class="message">
      //        After 100 years; the BOY Scouts are changing their name to remove the word “Boy;” so as not to offend... girls 🤦‍♂️🤦‍♂️🤦‍♂️  Tell the Boy Scouts how completely stupid their politically correct pandering is!  972-580-2000 or MyScouting@scouting.org
      //      </div>
      //      <div class="reactions">
      //        <span class="reaction">
      //          <span class="key">Shares</span>
      //          <span class="value">348</span>
      //        </span>
      //      </div>
      //    </div>
      //  </li>
      sortedData.map((item) => {
        const eleItem = document.createElement("li");
        eleItem.className = "item";
        list.appendChild(eleItem);
        
        const eleImage = document.createElement("a");
        eleImage.className = "image";
        eleImage.href = item.link;
        eleImage.target = "_blank";
        eleItem.appendChild(eleImage);
        
        const eleImageImg = document.createElement("img");
        eleImageImg.src = item.picture;
        eleImage.appendChild(eleImageImg);
        
        const eleContent = document.createElement("div");
        eleContent.className = "content";
        eleItem.appendChild(eleContent);
        
        const eleHeader = document.createElement("div");
        eleHeader.className = "header";
        eleContent.appendChild(eleHeader);
        
        const elePublisher = document.createElement("span");
        elePublisher.className = "publisher";
        elePublisher.textContent = item.publisher;
        eleHeader.appendChild(elePublisher);
        
        const eleTime = document.createElement("span");
        eleTime.className = "time";
        try {
          const now = new Date();
          const created_time = new Date(item.created_time);
          const timeAgo = (now - created_time) / 1000;  //Time since created_time, in seconds.
          
          if (timeAgo < 60) {
            eleTime.textContent = Math.floor(timeAgo) + " second(s) ago";
          } else if (timeAgo < 60 * 60) {
            eleTime.textContent = Math.floor(timeAgo / 60) + " minute(s) ago";
          } else if (timeAgo < 60 * 60 * 24) {
            eleTime.textContent = Math.floor(timeAgo / (60 * 60)) + " hours(s) ago";
          } else {
            eleTime.textContent = Math.floor(timeAgo / (60 * 60 * 24)) + " day(s) ago";
          }
        } catch (err) { eleTime.textContent = ""; }
        eleHeader.appendChild(eleTime);
        
        const eleMessage = document.createElement("div");
        eleMessage.className = "message";
        eleMessage.textContent = item.message;
        eleContent.appendChild(eleMessage);
        
        const eleReactions = document.createElement("div");
        eleReactions.className = "reactions";
        eleContent.appendChild(eleReactions);
        
        //For each type of Reaction, add it to the Reactions.
        const reactions = {
          "Shares": "shares",
          "Comments": "comments",
          "👍": "likes",
          "❤️": "LOVEs",
          "😄": "HAHAs",
          "😲": "WOWs",
          "😟": "SADs",
          "😡": "ANGRYs",
        
        };
        Object.entries(reactions).map(([labelKey, itemKey]) => {
          const eleReaction = document.createElement("span");
          eleReaction.className = "reaction";
          
          //Only add reactions if they have non-zero values.
          const reactionValue = item[itemKey];
          if (reactionValue && reactionValue !== "0") {
            eleReactions.appendChild(eleReaction);
          }
          
          const eleKey = document.createElement("span");
          eleKey.className = "key";
          eleKey.textContent = labelKey;
          eleReaction.appendChild(eleKey);
          
          const eleValue = document.createElement("span");
          eleValue.className = "value";
          eleValue.textContent = reactionValue; 
          eleReaction.appendChild(eleValue);
        });
        
      });    
    })
    .catch((err) => {
      //TODO
      alert("ERROR: " + err);
    });
  }
}
//------------------------------------------------------------------------------

/*  Initialisations
 */
//------------------------------------------------------------------------------
window.app = new App();
window.onload = window.app.init;

//Note: each page should specify its page type, e.g.
//  window.app.currentPageType = window.app.PAGE_TYPES.LIST;
//------------------------------------------------------------------------------
