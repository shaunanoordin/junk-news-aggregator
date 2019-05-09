# News Aggregator

Simple web app that lets users review the contents of a database of selected
news articles. The database is a separate system, containing news articles
gathered from social media.

## Development

- This is a web app built on HTML5, JavaScript and CSS.
- It uses Babel to transpile 'modern' ES6 code into 'current' (2018) JavaScript code.
- It uses Webpack to bundle JS files together. (Important for making the transpiled ES6 'import' functionality work.)
- Its also uses Stylus to make writing CSS easier.
- Developing the web app requires Node.js installed on your machine and a handy command line interface. (Bash, cmd.exe, etc)
- However, the _compiled_ web app itself can be run simply by opening the `index.html` in a web browser. (Chrome, Firefox, etc)

Project Anatomy/Components:

- **Main News Aggregator app** - originally designed as a standalone app, but later integrated into a larger website.
  - Source code in [/src/main-news-app](./src/main-news-app)
  - Compiled via `webpack` (run `npm start` for convenience)
  - Compiled code at [/web/news/app](./web/news/app)
- **Image Grid/Top256 Mini-App/Home Page** (yep, it's a bit overloaded) - code at [/web/index.php](./web/index.php)
- **Top 10 Mini-App** - code at [/web/top10.php](./web/top10.php)
- **Database Interface** - connects to external news database. Code at [/web/news/api](./web/news/api)
- **Data Files** - contains list of top 10/top 256 articles and the app config. Found at [/web/news/files](./web/news/files)
  - Data files are updated frequently on the live server.
- **App and Mini-App Config File** - found at [/web/news/files/app-config.json](./web/news/files/app-config.json)
  - Please modify `app-config.json` to change the title, text, etc displayed on the app and mini-apps.
- **Website** - the full website consists of every other file in [/web](web/)

External Requirements:

- News database (separate project)
- Data file generating scripts (separate project)

Prerequisites: Node.js, npm, PHP

Starting the project:

1. Install the project dependencies by running `npm install`
2. Run `npm start` to start the server.
3. Open `http://localhost:3000` on your browser to view the app.
