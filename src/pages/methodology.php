<?php include "common/header.php" ?>
<main class="info-page">
  <div class="info-section">
		<h1>METHODOLOGY</h1>

    <section>
      <h3>About</h3>
      <p>
        The <a href="signup.php">Junk News Aggregator</a> and the <a href="top10.php">Top 10 Junk News Aggregator</a> are research projects of the <a href="comprop.oii.ox.ac.uk">Computational Propaganda group (COMPROP)</a> of the <a href="www.oii.ox.ac.uk">Oxford Internet Institute (OII)</a> at the <a href="http://www.ox.ac.uk">University of Oxford</a>.
      </p>
      <p>
        These aggregators are intended as tools to help researchers, journalists, and the public see what English language junk news stories are being shared and engaged with on Facebook, ahead of the 2018 US midterm elections on November 6, 2018. 
      </p>

      <p>
        The aggregators show junk news posts along with how many reactions they received, for all eight types of post reactions available on Facebook, namely, Likes, Comments, Shares, and the five emoji reactions: Love, Haha, Wow, Angry, and Sad. 
      </p>	
    </section>

    <section>	
      <h3> What is Junk News? </h3>
      <p>
        Per the definitions in Bolsover & Howard (2018), Gallacher et al. (2017) Howard et al. (2017, 2018), and Woolley and Howard (2018), the term "junk news" refers to various forms of propaganda and ideologically extreme, hyper-partisan, or conspiratorial political news and information. The term includes news publications that present verifiably false content as factual news. This content includes propagandistic, ideologically extreme, hyper-partisan, or conspiracy-oriented news and information. Frequently, attention-grabbing techniques are used, such as lots of pictures, moving images, excessive capitalization, personal attacks, emotionally charged words and pictures, populist generalizations, and logical fallacies. It presents commentary as news. The term refers to a publisher overall, i.e. based on content that is typically published by a publisher, rather than referring to an individual article. Further context on junk news can be found <a href="#more_on_junk_news">below</a>.
      </p>
    </section>

    <section>	
      <h3> The Methodology in a Nutshell </h3>
      <p>
        In brief, the methodology used for the aggregator followed these steps:
      </p>
      <ol> 
        <li> Sources of junk news were identified from a dataset of tweets from US users relating to the 2018 midterms elections. Links contained in those tweets were extracted. </li>
        <li> A team of 5 rigorously trained coders labelled these links (source websites) independently, based on a grounded typology that has been tested over several elections around the world in 2016-2018. </li>
        <li> A source website was coded as junk news when it failed on 3 out of 5 of criteria of the typology.</li>
        <li> For each junk news source website, the posts it uploaded on its public Facebook page are retrieved and displayed on the Junk News Aggregator (retrieving posts every hour) and on the Top 10 version (retrieving once every 24 hours and displaying most engaged with posts).</li>
      </ol>
      <p>
        More details about the data collection, methodology, and how the aggregators work can be found in sections <a href="#full_method">Data Collection and Methodology</a>, <a href="#about_jna">About the Junk News Aggregator</a>, and <a href="#about_top10">About the Top-10 Junk News Aggregator</a>, below.
      </p>
    </section>

    <section id="about_jna">	
      <h3> About the Junk News Aggregator</h3>	
      <p>
        If you would like to request access to the Junk News Aggregator, please fill out the relevant <a href="signup.php">form</a>. The Junk News Aggregator shows Facebook posts posted by junk news outlets on their public Facebook page. It shows posts uploaded to Facebook up to a month ago. You can filter posts based on how long ago they were posted (e.g. 1 hour ago, 2 hours ago, etc.), and also based on keywords and based on the publisher name. You can also sort posts, not only by when they were posted (newest/ oldest), but also by how many engagements (or reactions) they received, for each of the eight post engagement types available on Facebook (Likes, Comments, Shares, and the five emoji reactions: Love, Haha, Wow, Angry, Sad), and by the sum of all engagements across all eight metrics ("All"). In addition, you can sort posts by the age-weighted version of each of the engagement types (number of engagements divided by the post's age in seconds), which shows the number of engagements this post received per each second of its life on Facebook (up to the point it was retrieved by the Aggregator system). Since the Aggregator system only queries Facebook once an hour, this accounts for the age of the post at the time Facebook was queried, and offers a more appropriate measure for comparing and sorting posts based on engagement numbers.
      </p>
    </section>

    <section id="about_top10">	
      <h3> About the Top-10 Junk News Aggregator</h3>
      <p>
        The <a href="top10.php">Top-10 Junk News Aggregator</a> is a smaller and simpler version of the Junk News Aggregator. It uses the same data as the Junk News Aggregator, but it queries this data less frequently, once every 24 hours, at 5pm ET, and shows only the top 10 most engaged with Facebook posts that were posted in this 24-hour period by junk news sources. Specifically, these are the top 10 most engaged with posts in terms of the overall age-weighted total engagements these posts have received. A post's overall age-weighted total engagements is the sum of all engagements received by this post (the number of Likes + Comments + Shares + Love reactions + Haha reactions + Wow reactions + Angry reactions + Sad reactions) divided by the post's age in seconds, where a post's age equals the time when the post was retrieved from Facebook minus the time when the post was posted to Facebook, and this age is measured here in seconds.
      </p>
    </section>

    <section id="full_method">	
      <h3> Data Collection and Methodology </h3>
      <p>
        The Junk News Aggregator and its Top 10 version offer users the ability to track in near real time the junk news content being posted and engaged with on Facebook, and filter this information by time, reaction type, and by keywords.
      </p>
      <p>
        It queries Facebook every hour on the hour, using the public Facebook Graph API, and collects only public data. No sensitive, personal or user-identifying data is collected. Specifically, it queries a list of Public Facebook Pages of specific junk news publishers. These junk news publishers were chosen because their web content was found to be particularly frequently discussed in social media conversations relating to the 2018 US midterm elections. The list of junk news publishers was assembled and utilised in the Aggregator according to the following sequence of steps:
      </p>
      <ol> 
        <li>Selecting Twitter hashtags relevant to the 2018 US midterm elections. Ensure that these hashtags relate to this specific election and not to other 2018 elections around the world, and ensure the list of hashtags is balanced, in the sense of covering both right and left-leaning hashtags.</li>
        <li> Using the Twitter Streaming API, to get any other hashtags that are mentioned together with the hashtags in our list: get all tweets mentioning any of the hashtags in our list, and from these tweets, get other hashtags mentioned in those tweets. This snowball sampling of hashtags results in an expanded list of hashtags. This snowball sampling for the hashtags happened from September 15 to September 19, 2018. The list of hashtags can be found <a href="files/hashtag_list.txt">here</a>.  </li>
        <li> Using this expanded hashtag list, use the Twitter Streaming API to retrieve all English-language tweets (including retweets and quote tweets) mentioning any of these hashtags. This data collection ran from September 21 to September 30, 2018. </li>
        <li> Out of this set of tweets, get all the URLs they mention. Keep only the base URL (i.e. not a specific article's URL but the homepage URL), and count how many times each base URL was mentioned. </li>
        <li> Giving this list of URLs to trained US experts (trained human annotators or "coders"), to classify all URLs into categories of news and political content, using a grounded typology (Woolley and Howard, 2018). For the junk news category, there exist five criteria, so if a news source fails to satisfy at least three of these five criteria, it gets classified under this category. To train our team of US experts to categorize sources of political news and information according to our grounded typology, we established a rigorous training system. For the analysis of the 2018 US midterms we worked with a team of three coders. Each source was triple-coded. Any conflicting decision was thoroughly discussed between coders to achieve consensus. For sources where consensus was not achieved, coders discussed with each other thoroughly to achieve consensus. In the event that consensus was not achieved, an executive team of three other highly experienced coders reviewed the source and made a final coding decision. </li>
        <!-- For the analysis of the 2018 US midterms, we worked with a team of five experienced coders who have conducted this kind of analysis in elections across the US and Europe, achieving an inter-coder reliability score of Krippendorf’s alpha = 0.89. Each source was double-coded. In the event that consensus was not achieved, one other experienced coder from the team reviewed the source to make a final decision after discussion.-->
        <li> For every website in the Junk News list that has been shared on Twitter, identifying their Facebook page, if they have any. In order to establish that a given Facebook page corresponds to a given website, it is required that either the website explicitly lists this Facebook page as theirs, and/or that the given Facebook page lists under its 'Website' field this particular website.</li>
        <li> Out of all junk news sites, keep only the ones that have a Facebook page. Out of those, keep only the top 50 most shared ones on Twitter (due to the Facebook Graph API's rate limits, not all of them can be tracked). These 50 junk news sites, along with the typology criteria which they violate (due to which they get classified as junk news), can be found in <a href="/files/JN_sources_criteria.csv">this CSV file</a>, and the explanation of the code (abbreviation) used for each criterion is in <a href="/files/jn_criteria_abbreviations.csv">this CSV file</a>. </li> 
        <li> Out of these 50 junk news sites, for the public Facebook page of each, retrieve the public posts authored by them and some of the post metadata (including aggregate-level engagement numbers): every hour on the hour, get all posts authored by these pages, not including any names of people who engage with these posts, but rather only numbers of engagements (reactions), for all eight types of engagement that Facebook makes available: Share, Comment, Like, Love, Haha, Wow, Sad, Angry. Write these posts to a database. </li>
        <li> For the Junk News Aggregator site, retrieve data from this database of public Facebook posts by junk news publishers, and allow site visitors to explore, sort, and filter this data by time, engagement numbers, and keywords. </li>
      </ol>
      <p>
        We note that, for each Facebook post collected, the displayed engagement numbers were last updated at most an hour after the post was posted, as, due to the Facebook API's data limits, we cannot update those again later. But the link to the Facebook post is provided, so you can click on that to see current engagement levels for this post.
      </p>
    </section>

    <section id="more_on_junk_news">	
      <h3> Further Context on Junk News </h3>
      <p>
        Social media is an important source of news and information about politics in the United States. But during the 2016 US Presidential Election social media platforms emerged as a fertile breeding ground for foreign influence campaigns, conspiracy theories, and radical alternative media outlets. Anecdotally, the nature of this political news and information seems to have evolved over time, but political communication researchers have yet to develop a comprehensive, grounded, internally consistent, typology of the types of sources shared by social media users. Rather than chasing a definition of what is popularly known as “fake news”, we produce a grounded typology of what users actually shared and apply rigorous coding and content analysis techniques to define the new phenomenon. To understand what social media users are sharing in their political communication, we analyzed large volumes of political conversation over Twitter during the 2016 Presidential campaign period and the 2018 State of the Union Address in the United States. Based on this analysis, researchers have developed the concept of “junk news”, which refers to sources that deliberately publish or aggregate misleading, deceptive or incorrect information packaged as real news about politics, economics or culture.
      </p>
      <p>
        Following the highly contentious 2016 US Presidential Election, there has been a growing body of empirical work demonstrating how large volumes of misinformation can circulate over social media during critical moments of public life (Allcott and Gentzkow 2017; Vicario et al. 2016; Vosoughi, Roy, and Aral 2018). Scholars have argued that the spread of “computational propaganda” sustained by social media algorithms can negatively impact democratic discourse and disrupt digital public spheres (Bradshaw and Howard 2018; P. Howard, Woolley, and Woolley 2016; Persily 2017; Tucker et al. 2017; Wardle and Derakhshan 2017). Indeed, both social network infrastructure and user behaviors provide capacities and constraints for the spread of computational propaganda (Bradshaw and Howard 2018; Flaxman, Goel, and Rao 2016; Marwick and Lewis 2017; Pariser 2011; Wu 2017). Yet, the body of work that is devoted to conceptualizing misinformation phenomena faces a number of epistemological and methodological challenges, has remained fragmentary, is ambiguous at best and lacks a common vocabulary (boyd, 2017; Fletcher, Cornia, Graves, & Nielsen, 2018; Wardle & Derakhshan, 2017). Terminology on misinformation has become highly contentious, constantly being weaponised by politically motivated actors to discredit media reporting (Neudert 2017; Woolley and Howard 2017).
      </p>
      <p>
        Drawing on perspectives from political communication, this typology helps reveal the nature of content being shared over social media. The typology has evolved over several years and multiple scholarly publications, including scientific working papers, peer review journal articles, and book manuscripts.
      </p>
      <p>
        There have been a few attempts to systematically operationalize fake news as a concept. The primary challenge is that it is impossible to evaluate the amount of fact checking that goes into a particular piece of writing at a scale sufficient for saying something general about the trends on a social media platform. Most researchers—and indeed most citizens—have manual heuristics for evaluating sources that deliberately publish or aggregate misleading, deceptive or incorrect information purporting to be real news about politics, economics or culture. For different social media users there are different ways of evaluating the qualities of news and political information on social media.
      </p>
      <p>
        Some outlets appear highly unprofessional. These sources do not employ standards and best practices of professional journalism. They refrain from providing clear information about real authors, editors, publishers and owners. They lack transparency and accountability, and do not publish corrections on debunked information. Other outlets have stylistic trademarks that make them suspicious to most readers. These sources use emotionally driven language with emotive expressions, hyperbole, ad hominem attacks, misleading headlines, excessive capitalization, unsafe generalizations and logical fallacies, moving images, and lots of pictures and mobilizing memes. For other sources of political news and information, false information and conspiracy theories seem to drive the strategy of word choice, story placement, and argument structure. They report without consulting multiple sources and do not fact-check. Sources are often untrustworthy and standards of production lack reliability. While some sources may have a fatal “credibility issue”, others have strong bias, and reporting in these sources is highly biased, ideologically skewed or hyper-partisan, and news reporting frequently includes strongly opinionated commentary and inflammatory viewpoints. Finally, some sources simply mimic established news reporting styles and formats, as counterfeit sources. Such sources are most commonly cited as examples of fake news, but they are essentially sources of commentary that is masked as news. They are stylistically disguised or falsely branded, making references to news agencies and credible sources, and headlines written in a news tone with date, time and location stamps.
      </p>
      <p>
        Focusing specifically on political news and information being shared during the 2016 US Presidential election and the State of the Union Address in January 2018, we analyze 21.8 million tweets that voters shared over Twitter, one of the most popular platforms for conversations about politics in the United States.
      </p> 
      <p>
        Content typologies are of central importance to the study of political communication, and for many years the broad categories and subcategories of political news and information have remained widely accepted by researchers, though of course there is debate over how transportable such traditional categories are to new media political communication (Earl, Martin, McCarthy, & Soule, 2004; Karlsson & Sjøvaag, 2016). However, the recent attention and debate over the effects of junk news in the media ecosystem have forced researchers—especially those working in political communication and social media—to re-evaluate the production models, normative values, and ideational impact of political news and information of social media with new categories and definitions that are actually grounded in the content being shared over social media (Jr, Lim, and Ling 2018). Currently, the debate lacks a grounded and comparative framework of the types of information that circulate on social media, and remains detached from evidence of social media sharing behavior. We advance this debate with a rigorously composed typology based on a focused, cross case comparison of key political events in the US.
      </p>
      <p>
        We proceed from a recognition that what users consume and share over social media in their political conversations is not simply news, but could include a wide variety of sources for political news and information, including user-generated content, conspiratorial alternative media outlets, and entertainment outlets. Indeed, there is significant research that humorous content is a staple of information sharing in contemporary political communication (Becker 2012; Becker, Xenos, and Waisanen 2010; Moy, Xenos, and Hess 2006). Given the lack of guidance in the existing literature on what information users are sharing, a grounded and iterative method of cataloguing content and evaluation is especially relevant. Based on our analysis of the US Presidential Election in 2016 we develop and analyze such a grounded typology of sources of news and information shared over Twitter. While Twitter provides access to a wealth of data on public news sharing in the United States, the user base is not fully representative (Blank 2017). Nevertheless, Twitter remains a central source of news and is especially popular among journalists, politicians and opinion leaders, who further disseminate information in non-public social media spaces such as Facebook and WhatsApp (Jungherr 2016).
      </p>
      <p>
        Typology building is one of the most foundational tasks in political research, and is especially important when it comes to investigating and explicating new phenomena, unexpected problems, or sudden changes in social systems (Aronovitch, 2012; Howard & Hussain, 2013; Swedberg, 2018). Understanding the diversity of variables and cases, among real world outcomes, involves carefully constructing categories that both accurately describe the features of such new political phenomena and serve as transportable concepts across several cases. Certainly political propaganda, misinformation, dirty tricks, and negative campaigning are not new features of public life. But social media applications are new platforms for spreading political news and information, the speed at which misinformation spreads is significantly greater, and use of an individual’s data in the targeting formula for misinformation are three distinct components of this contemporary mode of political communication.
      </p>
      <p>
        Typologies in political communication research have been useful for frame analysis for the study of news, or the organization of event-based datasets in which media accounts provide the primary features for important incidents (Althaus, Edy, and Phalen 2001; Erickson and Howard 2007). Even before social media, scholars used such methods to expose the ways in which sensational news organizations used human interest frames, while serious news organizations used responsibility and conflict frames (Semetko and Valkenburg 2000). In order to understand what users were actually sharing over social media, we develop a typology of political news and information.
      </p>
    </section>

    <section>
      <h3> References</h3>
      <!-- <ul>
        <li> Bolsover G. & Howard, P. N. (2018) <a href="https://tandfonline.com/doi/full/10.1080/1369118X.2018.1476576">Chinese computational propaganda: automation, algorithms and the manipulation of information about Chinese politics on Twitter and Weibo, Information, Communication & Society, DOI: 10.1080/1369118X.2018.1476576</a></li>
        <li> Gallacher, J., Barash, V., Howard, P. N., Kelly, J. (2017). <a href="https://comprop.oii.ox.ac.uk/research/working-papers/vetops/">Junk News on Military Affairs and National Security: Social Media Disinformation Campaigns Against US Military Personnel and Veterans.  (Data Memo 2017.9). Oxford, UK: Project on Computational Propaganda.</a>
        </li>
        <li> Howard, P. N., Bolsover, G., Kollanyi, B., Bradshaw, S., & Neudert, L.-M. (2017). <a href="https://comprop.oii.ox.ac.uk/2017/03/26/junk-news-and-bots-during-the-u-s-election-what-were-michigan-voters-sharing-over-twitter/">Junk news and bots during the U.S. Election: What were Michigan voters sharing over Twitter?  (Data Memo 2017.1). Oxford, UK: Project on Computational Propaganda.</a></li>
        <li> Howard, P. N., Woolley, S. & Calo, R. (2018). <a href="https://www.tandfonline.com/doi/full/10.1080/19331681.2018.1448735">Algorithms, bots, and political communication in the US 2016 election: The challenge of automated political communication for election law and administration, Journal of Information Technology & Politics, 15:2, 81-93, DOI: 10.1080/19331681.2018.1448735</a></li>
        <li> Machado, C., Kira, B., Hirsch, G., Marchal, N., Kollanyi, B., Howard, P. N., & Barash, V. (2018). <a href="https://comprop.oii.ox.ac.uk/research/brazil2018/">News and Political Information Consumption in Brazil: Mapping the First Round of the 2018 Brazilian Presidential Election on Twitter. (Data Memo 2018.4). Oxford, UK: Project on Computational Propaganda.</a></li>
        <li> Woolley, S. C., & Howard, P. N. (Eds.). (2018). <a href="https://www.oii.ox.ac.uk/research/books/computational-propaganda-political-parties-politicians-and-political-manipulation-on-social-media/">Computational Propaganda: Political Parties, Politicians, and Political Manipulation on Social Media. Oxford University Press.</a> </li>
      </ul> -->
      <ul>
      <li>Allcott, Hunt, and Matthew Gentzkow. 2017. “Social Media and Fake News in the 2016 Election.” National Bureau of Economic Research. http://www.nber.org/papers/w23089.</li>
      <li>Althaus, Scott L., Jill A. Edy, and Patricia F. Phalen. 2001. “Using Substitutes for Full-Text News Stories in Content Analysis: Which Text Is Best?” American Journal of Political Science 45 (3): 707–23. https://doi.org/10.2307/2669247.</li>
      <li>Aronovitch, Hilliard. 2012. “Interpreting Weber’s Ideal-Types.” Philosophy of the Social Sciences 42 (3): 356–69. https://doi.org/10.1177/0048393111408779.</li>
      <li>Becker, Amy B. 2012. “Comedy Types and Political Campaigns: The Differential Influence of Other-Directed Hostile Humor and Self-Ridicule on Candidate Evaluations.” Mass Communication and Society 15 (6): 791–812. https://doi.org/10.1080/15205436.2011.628431.</li>
      <li>Becker, Amy B., Michael A. Xenos, and Don J. Waisanen. 2010. “Sizing Up The Daily Show: Audience Perceptions of Political Comedy Programming.” Atlantic Journal of Communication 18 (3): 144–57. https://doi.org/10.1080/15456871003742112.</li>
      <li>Blank, Grant. 2017. “The Digital Divide Among Twitter Users and Its Implications for Social Research.” Social Science Computer Review 35 (6): 679–97. https://doi.org/10.1177/0894439316671698.</li>
      <li>Bolsover, Gillian & Philip Howard. 2018. “Chinese computational propaganda: automation, algorithms and the manipulation of information about Chinese politics on Twitter and Weibo.” Information, Communication & Society. DOI: 10.1080/1369118X.2018.1476576</li>
      <li>boyd, danah. 2017. “Google and Facebook Can’t Just Make Fake News Disappear.” WIRED. 2017. https://www.wired.com/2017/03/google-and-facebook-cant-just-make-fake-news-disappear/.</li>
      <li>Bradshaw, Samantha, and Philip N. Howard. 2018. “Why Does Junk News Spread So Quickly Across Social Media? Algorithms, Advertising and Exposure in Public Life.” Knight Foundation Working Paper, January. https://kf-site-production.s3.amazonaws.com/media_elements/files/000/000/142/original/Topos_KF_White-Paper_Howard_V1_ado.pdf.</li>
      <li>Earl, Jennifer, Andrew Martin, John D. McCarthy, and Sarah A. Soule. 2004. “The Use for Newspaper Data in the Study of Collective Action.” Annual Review of Sociology 30 (1): 65–80. https://doi.org/10.1146/annurev.soc.30.012703.110603.</li>
      <li>Erickson, Kris, and Philip N. Howard. 2007. “A Case of Mistaken Identity? News Accounts of Hacker, Consumer, and Organizational Responsibility for Compromised Digital Records.” Journal of Computer-Mediated Communication 12 (4): 1229–47. https://doi.org/10.1111/j.1083-6101.2007.00371.x.</li>
      <li>Flaxman, Seth, Sharad Goel, and Justin M. Rao. 2016. “Filter Bubbles, Echo Chambers, and Online News Consumption.” Public Opinion Quarterly 80 (S1): 298–320. https://doi.org/10.1093/poq/nfw006.</li>
      <li>Fletcher, Richard, Alessio Cornia, Lucas Graves, and Rasmus Kleis Nielsen. n.d. “Measuring the Reach of ‘Fake News’ and Online Disinformation in Europe,” 10.</li>
      <li>Gallacher, John D., Vlad Barash, Philip N. Howard, and John Kelly. 2017 “Junk News on Military Affairs and National Security: Social Media Disinformation Campaigns Against US Military Personnel and Veterans.” (Data Memo 2017.9). Oxford, UK: Project on Computational Propaganda.</li>
      <li>Howard, Philip, Gillian Bolsover, Bence Kollanyi, Samantha Bradshaw, & Lisa-Maria Neudert. 2017. “Junk news and bots during the U.S. Election: What were Michigan voters sharing over Twitter?” (Data Memo 2017.1). Oxford, UK: Project on Computational Propaganda.</li>
      <li>Howard, Philip N., and Muzammil M. Hussain. 2013. Democracy’s Fourth Wave? Digital Media and the Arab Spring. New York, NY: Oxford University Press.</li>
      <li>Howard, Philip, and Samuel Woolley. 2016. “Political Communication, Computational Propaganda, and Autonomous Agents.” Edited by Philip N. Howard. International Journal of Communication 10 (Special Issue): 20.</li>
      <li>Howard, Philip, Samuel Woolley, Ryan Calo. 2018. “Algorithms, bots, and political communication in the US 2016 election: The challenge of automated political communication for election law and administration.” Journal of Information Technology & Politics, 15:2, 81-93, DOI: 10.1080/19331681.2018.1448735</li>
      <li>Jr, Edson C. Tandoc, Zheng Wei Lim, and Richard Ling. 2018. “Defining ‘Fake News.’” Digital Journalism 6 (2): 137–53. https://doi.org/10.1080/21670811.2017.1360143.</li>
      <li>Jungherr, Andreas. 2016. “Twitter Use in Election Campaigns: A Systematic Literature Review.” Journal of Information Technology & Politics 13 (1): 72–91. https://doi.org/10.1080/19331681.2015.1132401.</li>
      <li>Karlsson, Michael, and Helle Sjøvaag. 2016. “Content Analysis and Online News.” Digital Journalism 4 (1): 177–92. https://doi.org/10.1080/21670811.2015.1096619.</li>
      <li>Caio Machado, Beatriz Kira, Gustavo Hirsch, Nahema Marchal, Bence Kollanyi, Philip N. Howard, Thomas Lederer, and Vlad Barash. 2018. “News and Political Information Consumption in Brazil: Mapping the First Round of the 2018 Brazilian Presidential Election on Twitter.” (Data Memo 2018.4). Oxford, UK: Project on Computational Propaganda.</li>
      <li>Marwick, Alice, and Rebecca Lewis. 2017. “Media Manipulation and Disinformation Online.” Data & Society Research Institute. https://datasociety.net/pubs/oh/DataAndSociety_MediaManipulationAndDisinformationOnline.pdf.</li>
      <li>Moy, Patricia, Michael A. Xenos, and Verena K. Hess. 2006. “Priming Effects of Late-Night Comedy.” International Journal of Public Opinion Research 18 (2): 198–210. https://doi.org/10.1093/ijpor/edh092.</li>
      <li>Narayanan, V, V Barash, J Kelly, B Kollanyi, L M Neudert, and P N Howard. n.d. “Polarization, Partisanship and Junk News Consumption over Social Media in the US.” Data Memo 2018.1.</li>
      <li>Neudert, Lisa Maria. 2017. “Computational Propaganda in Germany: A Cautionary Tale.” 2017.7. Computational Propaganda Working Paper Series. Oxford, United Kingdom: Oxford Internet Institute, University of Oxford.</li>
      <li>Pariser, Eli. 2011. The Filter Bubble: How the New Personalized Web Is Changing What We Read and How We Think. London, UK: Penguin Books.</li>
      <li>Persily, Nate. 2017. “The 2016 U.S. Election: Can Democracy Survive the Internet?” Journal of Democracy 28 (2): 63–76.</li>
      <li>Semetko, Holli A., and Patti M. Valkenburg Valkenburg. 2000. “Framing European Politics: A Content Analysis of Press and Television News.” Journal of Communication 50 (2): 93–109. https://doi.org/10.1111/j.1460-2466.2000.tb02843.x.</li>
      <li>Swedberg, Richard. 2018. “How to Use Max Weber’s Ideal Type in Sociological Analysis.” Journal of Classical Sociology 18 (3): 181–96. https://doi.org/10.1177/1468795X17743643.</li>
      <li>Tucker, Joshua A., Yannis Theocharis, Margaret E. Roberts, and Pablo Barberá. 2017. “From Liberation2 to Turmoil: Social Media and Democracy.” Journal of Democracy 28 (4): 46–59.</li>
      <li>Vicario, Michela Del, Alessandro Bessi, Fabiana Zollo, Fabio Petroni, Antonio Scala, Guido Caldarelli, H. Eugene Stanley, and Walter Quattrociocchi. 2016. “The Spreading of Misinformation Online.” Proceedings of the National Academy of Sciences 113 (3): 554–59. https://doi.org/10.1073/pnas.1517441113.</li>
      <li>Vosoughi, Soroush, Deb Roy, and Sinan Aral. 2018. “The Spread of True and False News Online.” Science 359 (6380): 1146–51. https://doi.org/10.1126/science.aap9559.</li>
      <li>Wardle, Claire, and Hossein Derakhshan. 2017. “Information Disorder: Toward and Interdisciplinary Framework for Research and Policy Making.” Council of Europe. https://rm.coe.int/information-disorder-report-november-2017/1680764666.</li>
      <li>Woolley, Samuel, and Philip Howard. 2017. “Computational Propaganda: Executive Summary.” Working Paper 2017.11. Oxford, United Kingdom: Project on Computational Propaganda, Oxford Internet Institute, Oxford University.</li>
      <li>Woolley, Samuel, and Philip Howard (Eds.). 2018. “Computational Propaganda: Political Parties, Politicians, and Political Manipulation on Social Media.” Oxford University Press.</li>
      <li>Wu, Tim. 2017. The Attention Merchants: The Epic Struggle to Get Inside Our Heads. Atlantic Books. </li>
      </ul>

    </section>
  </div>
</main>
<?php include "common/footer.php" ?>