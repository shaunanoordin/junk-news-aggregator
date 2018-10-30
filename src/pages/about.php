<?php $page_id = "about" ?>
<?php include "common/header.php" ?>
<main class="info-page">
  <div class="info-section">
    <h1>ABOUT</h1>
    <section>
      <p>	
        This tool for evaluating the spread of junk news on Facebook was built by the <a href="https://comprop.oii.ox.ac.uk">Computational Propaganda project (COMPROP)</a> at the <a href="https://www.oii.ox.ac.uk/">Oxford Internet Institute (OII)</a>, <a href="https://www.ox.ac.uk">University of Oxford</a>. Our aim in building this tool is to help researchers, policy makers, and social media platforms understand the impact of junk news on public life. We do not endorse the spread of junk news, and do not make money by aggregating this content. 
      </p>
      <p>
        This work is funded by the European Research Council through the grant “Computational Propaganda: Investigating the Impact of Algorithms and Bots on Political Discourse in Europe,” Proposal 648311, 2015-2020, Philip N. Howard, Principal Investigator, and the grant "Restoring Trust in Social Media Civic Engagement," Proposal Number: 767454, 2017-2018, Philip N. Howard, Principal Investigator. We are grateful for additional support from the Open Society Foundation and Ford Foundation. Project activities were approved by the University of Oxford’s Research Ethics Committee, CUREC OII C1A 15-044. Any opinions, findings, and conclusions or recommendations expressed in this material are those of the researchers and do not necessarily reflect the views of the funders, or the University of Oxford. 
      </p>
      <p>
        We thank Shaun A. Noordin, Adham Tamer and John Gilbert of the OII, and Mike Antcliffe of Achromatic Security, for their valuable web development and security testing work on this project.
      </p>
    </section>

    <section>
      <h2>Instructions for Accessing and Using the Full Aggregator</h2>
      <p>
        All of the site is public including the <a href="top10.php">Top 10 Aggregator</a>, except the full Aggregator. To access to the full Aggregator, please click the <a href="singup.php">"Sign Up"</a> link to request access. Login credentials will be sent to you in due course. When you have them click on the <a href="https://newsaggregator.oii.ox.ac.uk/news/app">"Log In"</a> link and enter these credentials to see the full Aggregator.
      </p> 
      <p>
        Once you’ve logged in to the full Aggregator, you will see a main page ("Explore" in the navigation bar), that goes back up to one month. You can search and filter both pages in the exact same way.
      </p>
      <p>
        On the main page of the aggregator ("Explore" link), you can select how far back into the past you want the Facebook posts to go ("Showing Facebook news posts from the last ... "). You can also optionally filter results by keyword (in the "optionally filtered by content" box) or by publisher name. In addition, you can sort by Newest or Oldest posts in the selected period.  And/or you can sort by each engagement type, e.g. to get most Liked posts first. And/or you can sort by the age-adjusted version of the latter. 
      </p>
      <p>
        The age-adjusted engagement metrics offer a better way for comparing engagement levels across posts, as, due to the Facebook Graph API’s rate limits, not all posts are collected at the exact same instant. E.g. one post collected 1 minutes after it was posted, another collected 43 minutes after it was posted. At most, a post may have been collected an hour after it was posted at the latest — our data collection fetches new posts from Facebook every hour on the hour. So, to adjust for this difference in post age at the time when post data was collected, we have these age-adjusted engagement numbers (they equal the number of engagements divided by the post’s age in seconds). 
      </p>
    </section>

    <section>
      <h2>Disclaimer</h2>
      <p>
        The Junk News Aggregator and its Top 10 version identify "junk news" sites based on a grounded typology tested in several scientific studies conducted by the COMPROP research group. It reflects our scientific opinion and evaluation, and does not necessarily reflect the views of our funders or the University of Oxford. The basis of opinion is described in our <a href="about.php">methodology</a>.
      </p>
    </section>

    <section>
      <h2> Contact </h2>
      <p>
        For any enquiries or feedback related to the Junk News Aggregator, please email: <a href="mailto:newsaggregator@oii.ox.ac.uk">newsaggregator@oii.ox.ac.uk</a>.
      </p>
    </section>
  </div>
</main>
<?php include "common/footer.php" ?>