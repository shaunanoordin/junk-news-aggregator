/*  
News Aggregator
---------------

(Shaun A. Noordin | shaunanoordin.com | 20180518)
--------------------------------------------------------------------------------
 */

/*  Library Imports
 */
//------------------------------------------------------------------------------
import request from "superagent";
import datepicker from "js-datepicker";
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
let API_URL = "../api/";
if (window && window.location && /\:\/\/localhost/.test(window.location.href)) {
  API_URL = "../api/test-api.php";
}
//------------------------------------------------------------------------------

/*  Primary App Class
 */
//------------------------------------------------------------------------------
class App {
  constructor() {
    this.html = {};
    
    this.API_URL = API_URL;
    this.PAGE_TYPES = {
      DEFAULT: "default",  //No particular page type.
      LIST: "list",  //Main listing
    };
    
    this.currentPageType = this.PAGE_TYPES.DEFAULT;
    this.initialListSettings = {};  //This can be overwritten on individual pages.
    
    this.init = this.init.bind(this);
  }
  
  init() {
    this.html = {
      app: document.getElementById("app"),
      list: document.getElementById("list"),
      filterEvent: document.getElementById("filter-event"),
      filterLang: document.getElementById("filter-lang"),
      //filterTime: document.getElementById("filter-time"),
      filterDateStart: document.getElementById("filter-date-start"),
      filterDateEnd: document.getElementById("filter-date-end"),
      filterMessage: document.getElementById("filter-message"),
      filterPublisher: document.getElementById("filter-publisher"),
      filterButton: document.getElementById("filter-button"),
      //sort_comments: document.getElementById("sort_comments"),
      //sort_shares: document.getElementById("sort_shares"),
      //sort_likes: document.getElementById("sort_likes"),
      //sort_loves: document.getElementById("sort_loves"),
      //sort_hahas: document.getElementById("sort_hahas"),
      //sort_wows: document.getElementById("sort_wows"),
      //sort_sads: document.getElementById("sort_sads"),
      //sort_angrys: document.getElementById("sort_angrys"),
    };
    
    this.list_data = null;
    this.list_settings = Object.assign({
      filterEvent: this.html.filterEvent.value || "",
      filterLang: this.html.filterLang.value || "",
      //filterTime: this.html.filterTime.value || "",
      filterDateStart: this.html.filterDateStart.value || "",
      filterDateEnd: this.html.filterDateEnd.value || "",
      filterMessage: this.html.filterMessage.value || "",
      filterPublisher: this.html.filterPublisher.value || "",
      sort: "w_engagement",
      limit: 200,
      most_engaging: "",  //If this is set to a non-empty string, it means we're only interested in the most engaging stories from the specified time period and the given filters.
    }, this.initialListSettings);
    
    //Initialise settings for List-type page
    //--------------------------------
    if (this.currentPageType === this.PAGE_TYPES.LIST) {
      //Register UI: event filter
      if (this.html.filterEvent) {
        this.html.filterEvent.onchange = () => {
          this.list_settings.filterEvent = this.html.filterEvent.value;
          this.updateLanguages();  // Remember to update languages after updating the Event value.
          this.fetchList();
        };
        this.updateLanguages();
      }
      
      //Register UI: lang filter
      if (this.html.filterLang) {
        this.html.filterLang.onchange = () => {
          this.list_settings.filterLang = this.html.filterLang.value;
          this.fetchList();
        };
      }
      
      //Register UI: time filter
      // if (this.html.filterTime) {
      //   this.html.filterTime.onchange = () => {
      //     this.list_settings.filterTime = this.html.filterTime.value;
      //     this.fetchList();
      //   };
      // }
      
      const dateFormatter = (input, date, instance) => {
        input.value = `${date.getFullYear()}-${('0'+(date.getMonth()+1)).slice(-2)}-${('0'+date.getDate()).slice(-2)}`;
      }
      
      //Register UI: date start
      if (this.html.filterDateStart) {
        this.html.filterDateStart.onchange = () => {
          this.list_settings.dateStart = this.html.filterDateStart.value;
          this.fetchList();
        };
        
        const startPicker = datepicker("#filter-date-start", { formatter: dateFormatter, minDate: null, maxDate: null, });
      }
      
      //Register UI: date end
      if (this.html.filterDateEnd) {
        this.html.filterDateEnd.onchange = () => {
          this.list_settings.dateEnd = this.html.filterDateEnd.value;
          this.fetchList();
        };
        
        const endPicker = datepicker("#filter-date-end", { formatter: dateFormatter, minDate: null, maxDate: null, });
      }
      
      //Register UI: message filter
      if (this.html.filterMessage) {
        this.html.filterMessage.onchange = () => {
          this.list_settings.filterMessage = this.html.filterMessage.value;
          this.fetchList();
        };
      }
      
      //Register UI: publisher filter
      if (this.html.filterPublisher) {
        this.html.filterPublisher.onchange = () => {
          this.list_settings.filterPublisher = this.html.filterPublisher.value;
          this.fetchList();
        };
      }
      
      //Register UI: filter button
      if (this.html.filterButton) {
        this.html.filterButton.onclick = () => {
          this.fetchList();
        };
      }
      
      //Register UI: sort buttons
      for (let button of document.getElementsByClassName("sort-button")) {
        const sortValue = button.dataset.sort;
        button.onclick = () => {
          this.list_settings.sort = sortValue;
          this.fetchList();
        };
      }
      
      //Initial data fetch.
      //this.list_settings.filterTime = this.html.filterTime.value;
      this.fetchList();
    }
    //--------------------------------
  }
  
  /*
  Each Event has its own selection of Languages
  See the app-config.php file for more details.
   */
  updateLanguages () {
    console.log('+++ window.config', window.config);
    const appConfig = window.config || { events: {} };  // JS version of app-config is generated by header.php
    const chosenEvent = appConfig.events[this.list_settings.filterEvent];
    
    // First, reset the list of languages.
    const list = this.html.filterLang;
    while (list.hasChildNodes()) { list.removeChild(list.firstChild); }
    
    // Add the default language
    const defaultOption = document.createElement("option");
    defaultOption.textContent = "All";
    defaultOption.value = "";
    list.appendChild(defaultOption);
    
    // Add the languages specified for each Event.
    if (chosenEvent && chosenEvent.languages) {
      Object.keys(chosenEvent.languages).forEach((lang) => {
        const label = chosenEvent.languages[lang].label;
        const eleOption = document.createElement("option");
        eleOption.textContent = label;
        eleOption.value = lang;
        list.appendChild(eleOption);
      });
    }
  }
  
  fetchList() {
    console.log('+++ App.fetchList()', this.list_settings);
    if (!this.html.list) return;
    
    const list = this.html.list;
    let eleMessage = null;
    
    //Show loading message.
    while (list.hasChildNodes()) { list.removeChild(list.firstChild); }
    eleMessage = document.createElement("li");
    eleMessage.className = "info";
    eleMessage.textContent = "Loading...";
    list.appendChild(eleMessage);
    
    request.get(this.API_URL)
    .query({ event: this.list_settings.filterEvent })
    .query({ lang: this.list_settings.filterLang })
    //.query({ hours_ago: this.list_settings.filterTime })
    .query({ date_start: this.list_settings.dateStart })
    .query({ date_end: this.list_settings.dateEnd })
    .query({ message: this.list_settings.filterMessage })
    .query({ publisher: this.list_settings.filterPublisher })
    .query({ limit: this.list_settings.limit })
    .query({ order: this.list_settings.sort })
    .query({ most_engaging: this.list_settings.most_engaging })
    .then((response) => {
      if (response && response.ok && response.body && response.body.data) {
        return response.body.data;
      }
      throw new Error("Invalid response from API");
    })
    .then((data) => {
      this.list_data = data;
      return this.updateList();
    })
    .catch((err) => {
      //Show loading message.
      while (list.hasChildNodes()) { list.removeChild(list.firstChild); }
      eleMessage = document.createElement("li");
      eleMessage.className = "info error";
      eleMessage.textContent = "ERROR: " + err;
      list.appendChild(eleMessage);
    });
  }
  
  updateList() {
    console.log('+++ App.updateList()', this.list_settings);
    const data = this.list_data;
    const list = this.html.list;
    let eleMessage = null;
    
    //Reset the list
    while (list.hasChildNodes()) { list.removeChild(list.firstChild); }

    //Show "no data" message, if applicable.
    if (!data || data.length === 0) {
      eleMessage = document.createElement("li");
      eleMessage.className = "info";
      eleMessage.textContent = "No articles";
      list.appendChild(eleMessage);
      return;
    }

    //For each news article, add it to the list.
    //Structure:
    //  <li class="item">
    //    <div class="left">
    //      <a href="photo" 
    //        href="https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3"
    //        target="_blank"
    //        rel="noopener noreferrer"
    //      >
    //        <img src="https://scontent.xx.fbcdn.net/v/t1.0-0/p130x130/31823834_1703680869686071_5510796134324371456_n.jpg?_nc_cat=0&oh=81acd9fe53f698974d7b4633df7805b2&oe=5B522AC6">
    //      </a>
    //      <div class="links">
    //        <a
    //          class="link-facebook"
    //          title="View Facebook post"
    //          href="https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3"
    //          target="_blank"
    //          rel="noopener noreferrer"
    //        >
    //          <img src="assets/logo-facebook.png">
    //        </a>
    //        <a
    //          class="link-website"
    //          title="View original article"
    //          href="https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3"
    //          target="_blank"
    //          rel="noopener noreferrer"
    //        >
    //          🌐
    //        </a>
    //      </div>
    //    </div>
    //    <div class="right">
    //      <div class="header">
    //        <span class="publisher">100percentfedup</span>
    //        <span class="time">1 hour ago</span>
    //      </div>
    //      <div class="message">
    //        After 100 years; the BOY Scouts are changing their name to remove the word “Boy;” so as not to offend... girls 🤦‍♂️🤦‍♂️🤦‍♂️  Tell the Boy Scouts how completely stupid their politically correct pandering is!  972-580-2000 or MyScouting@scouting.org
    //      </div>
    //      <div class="reactions">
    //        <span class="reaction">
    //          <span class="key">👍</span>
    //          <span class="value">180</span>
    //        </span>
    //      </div>
    //    </div>
    //  </li>
    data.map((item) => {
      const eleItem = document.createElement("li");
      eleItem.className = "item";
      list.appendChild(eleItem);
      
      //----------------

      const eleLeft = document.createElement("div");
      eleLeft.className = "left";
      eleItem.append(eleLeft);
      
      const elePhoto = document.createElement("a");
      elePhoto.className = "photo";
      if (item.link) {
        elePhoto.href = item.link;
        elePhoto.target = "_blank";
        elePhoto.rel = "noopener noreferrer";
      }
      eleLeft.appendChild(elePhoto);

      const elePhotoImg = document.createElement("img");
      if (item.picture) {
        elePhotoImg.src = item.picture;
      } else {
        elePhotoImg.src = "assets/no-image.png";
      }
      elePhoto.appendChild(elePhotoImg);
      
      const eleLinks = document.createElement("div");
      eleLinks.className = "links";
      eleLeft.appendChild(eleLinks);
      
      if (item.post_ID) {
        const urlFacebook = `https://facebook.com/${item.post_ID}`;
        const eleLinkFacebook = document.createElement("a");
        eleLinkFacebook.className = "link-facebook";
        eleLinkFacebook.href = urlFacebook;
        eleLinkFacebook.title = "View Facebook post";
        eleLinkFacebook.target = "_blank";
        eleLinkFacebook.rel = "noopener noreferrer";
        eleLinkFacebook.textContent = "🔗";
        eleLinks.appendChild(eleLinkFacebook);        
      }
      
      if (item.link) {
        const eleLinkWebsite = document.createElement("a");
        eleLinkWebsite.className = "link-website";
        eleLinkWebsite.href = item.link;
        eleLinkWebsite.title = "View original article";
        eleLinkWebsite.target = "_blank";
        eleLinkWebsite.rel = "noopener noreferrer";
        eleLinkWebsite.textContent = "🌐";
        eleLinks.appendChild(eleLinkWebsite);
      }
      
      //----------------

      const eleRight = document.createElement("div");
      eleRight.className = "right";
      eleItem.appendChild(eleRight);

      const eleHeader = document.createElement("div");
      eleHeader.className = "header";
      eleRight.appendChild(eleHeader);

      const elePublisher = document.createElement("span");
      elePublisher.className = "publisher";
      elePublisher.textContent = item.publisher_name;
      eleHeader.appendChild(elePublisher);

      const eleTime = document.createElement("span");
      eleTime.className = "time";
      try {
        const now = new Date();
        let time_string = item.created_time || "";
        let created_time = new Date(time_string);
        
        //Browser compatibility: Safari
        if (isNaN(created_time.getTime())) {  //If time is valid, this might be a browser compatibility issue: Safari cannot process "2018-12-31 12:59:59" but can process "2018/12/31 12:59:59"
          time_string = time_string.replace(/\-/g, '/');
          created_time = new Date(time_string);
        }
        
        const timeAgo = (now - created_time) / 1000;  //Time since created_time, in seconds.
        
        if (isNaN(timeAgo)) {  //Failsafe
          eleTime.textContent = item.created_time;
        } else if (timeAgo < 60) {
          eleTime.textContent = Math.floor(timeAgo) + " second(s) ago";
        } else if (timeAgo < 60 * 60) {
          eleTime.textContent = Math.floor(timeAgo / 60) + " minute(s) ago";
        } else if (timeAgo < 60 * 60 * 24) {
          eleTime.textContent = Math.floor(timeAgo / (60 * 60)) + " hour(s) ago";
        } else {
          eleTime.textContent = Math.floor(timeAgo / (60 * 60 * 24)) + " day(s) ago";
        }
        
        eleTime.title = created_time;
      } catch (err) { eleTime.textContent = ""; }
      eleHeader.appendChild(eleTime);

      const eleMessage = document.createElement("div");
      eleMessage.className = "message";
      eleMessage.textContent = item.message;
      eleRight.appendChild(eleMessage);

      const eleReactions = document.createElement("div");
      eleReactions.className = "reactions";
      eleRight.appendChild(eleReactions);
      
      //Prepare the macro for adding reactions. This is for coding convenience.
      //--------------------------------
      const macro_addRowOfReactions = (prefix = null, reactions, truncateDecimals = false) => {
        //Reactions are organised by rows
        const eleReactionsRow = document.createElement("div");
        eleReactionsRow.className = "row";
        eleReactions.appendChild(eleReactionsRow);
        
        //If there's a prefix, add a label to the front of the row.
        if (prefix) {
          const elePrefix = document.createElement("label");
          elePrefix.textContent = prefix;
          eleReactionsRow.appendChild(elePrefix);
        }
        
        //Now let's process each Reaction.
        Object.entries(reactions).map(([labelKey, itemKey]) => {
          //Only add reactions if they have non-zero values.
          const reactionValue = item[itemKey];
          if ((reactionValue && reactionValue !== "0")  //Most of the time, we only want reactions with a valid value.
              || (itemKey.startsWith("w_") && reactionValue !== null)) {  //However, an exception is that we'll also show weighted values that have a value of 0. (i.e. not null)
            //Each Reaction is a key-value pair.
            const eleReaction = document.createElement("span");
            eleReaction.className = "reaction";
            eleReaction.title = `${itemKey}: ${reactionValue}`;
            eleReactionsRow.appendChild(eleReaction);

            //This is the key
            const eleKey = document.createElement("span");
            eleKey.className = "key";
            eleKey.textContent = labelKey;
            eleReaction.appendChild(eleKey);

            //This is the value
            const eleValue = document.createElement("span");
            eleValue.className = "value";
            if (!truncateDecimals) {
              eleValue.textContent = reactionValue; 
            } else {  //Truncate float values
              const NUMBER_OF_DECIMALS = 2;
              const indexOfDecimal = reactionValue.indexOf(".");
              eleValue.textContent = (indexOfDecimal > 0)
                ? reactionValue.substr(0, indexOfDecimal + NUMBER_OF_DECIMALS + 1)
                : reactionValue;
            }
            eleReaction.appendChild(eleValue);
          }
        });
      };
      //--------------------------------
      
      //For each type of Reaction, add it to the Reactions.
      //--------------------------------
      macro_addRowOfReactions("Total:", {
        "🔃": "shares",
        "💬": "comments",
        "👍": "likes",
        "❤️": "LOVEs",
        "😄": "HAHAs",
        "😲": "WOWs",
        "😟": "SADs",
        "😡": "ANGRYs",
        "All": "totalEngs",
      }, false);
      
      macro_addRowOfReactions("Age-adjusted:", {
        "🔃": "w_shares",
        "💬": "w_comments",
        "👍": "w_likes",
        "❤️": "w_LOVEs",
        "😄": "w_HAHAs",
        "😲": "w_WOWs",
        "😟": "w_SADs",
        "😡": "w_ANGRYs",
        "All": "w_totalEngs",
      }, true);
      //--------------------------------

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
