<?php
/*
Junk News Aggregator API
------------------------

Interface for getting news data from the Junk News database.

--------------------------------------------------------------------------------
 */

//Example data
$json = [
  "data" => [
    (object) [
      "publisher_name" => "100percentfedup",
      "post_ID" => "311190048935167_1703680993019392",
      "link" => "https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3",
      "message" => "After 100 years; the BOY Scouts are changing their name to remove the word “Boy;” so as not to offend... girls 🤦‍♂️🤦‍♂️🤦‍♂️  Tell the Boy Scouts how completely stupid their politically correct pandering is!  972-580-2000 or MyScouting@scouting.org",
      "picture" => "https://scontent.xx.fbcdn.net/v/t1.0-0/p130x130/31823834_1703680869686071_5510796134324371456_n.jpg?_nc_cat=0&oh=81acd9fe53f698974d7b4633df7805b2&oe=5B522AC6",
      "full_picture" => "https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/31823834_1703680869686071_5510796134324371456_n.jpg?_nc_cat=0&oh=bf2f81b2e7b898c3aae690ac9292a0be&oe=5B5992D3",
      "created_time" => "2018-05-03T15:30:01+0000",
      "shares" => "348",
      "comments" => "108",
      "likes" => "180",
      "LOVEs" => "0",
      "HAHAs" => "4",
      "WOWs" => "8",
      "SADs" => "88",
      "ANGRYs" => "176",
    ],
    (object) [
      "publisher_name" => "100percentfedup",
      "post_ID" => "311190048935167_1703809663006525",
      "link" => "https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703809643006527/?type=3",
      "message" => "#ThingsISawAtTrumpsWashingtonMIRally #BoycottNFL #MAGA  Leisa and I found this truck parked in a massive lot amongst thousands of vehicles at the Trump rally in Washington;MI",
      "picture" => "https://scontent.xx.fbcdn.net/v/t1.0-0/s130x130/31946698_1703809649673193_8938228402159091712_n.jpg?_nc_cat=0&oh=06969867e9cada7a9c7500855d0a82e0&oe=5B5A8D08",
      "full_picture" => "https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/31946698_1703809649673193_8938228402159091712_n.jpg?_nc_cat=0&oh=b07d1b26c2892f6f57972ead0ab9bd30&oe=5B93991D",
      "created_time" => "2018-05-03T15:26:31+0000",
      "shares" => "267",
      "comments" => "29",
      "likes" => "707",
      "LOVEs" => "76",
      "HAHAs" => "21",
      "WOWs" => "0",
      "SADs" => "0",
      "ANGRYs" => "2",
    ],
    (object) [
      "publisher_name" => "100percentfedup",
      "post_ID" => "311190048935167_1703789793008512",
      "link" => "https://100percentfedup.com/kim-kardashian-reportedly-working-with-ivanka-and-jared-on-special-missionliberal-heads-explode-in-54321/",
      "message" => "Do you agree with this?  https://100percentfedup.com/kim-kardashian-reportedly-working-with-ivanka-and-jared-on-special-missionliberal-heads-explode-in-54321/",
      "picture" => "https://external.xx.fbcdn.net/safe_image.php?d=AQBUOuscnim_9wMm&w=130&h=130&url=https%3A%2F%2F100percentfedup.com%2Fwp-content%2Fuploads%2F2018%2F05%2Fkim-kushners-1200x630.jpg&cfs=1&_nc_hash=AQAO_w7CSQZGjsvU",
      "full_picture" => "https://external.xx.fbcdn.net/safe_image.php?d=AQBTqqFw9xbxifCn&url=https%3A%2F%2F100percentfedup.com%2Fwp-content%2Fuploads%2F2018%2F05%2Fkim-kushners-1200x630.jpg&_nc_hash=AQDmd-JZlV8pMso4",
      "created_time" => "2018-05-03T14:45:54+0000",
      "shares" => "8",
      "comments" => "2",
      "likes" => "23",
      "LOVEs" => "2",
      "HAHAs" => "8",
      "WOWs" => "0",
      "SADs" => "0",
      "ANGRYs" => "0",
    ],
    (object) [
      "publisher_name" => "100percentfedup",
      "post_ID" => "311190048935167_1703745146346310",
      "link" => "https://100percentfedup.com/president-trump-responds-to-giulianis-bombshell-claim-during-hannity-interview-about-michael-cohen-payment-to-stormy-daniels-video/",
      "message" => "PRESIDENT TRUMP RESPONDS To Giuliani’s BOMBSHELL Claim During Hannity Interview About Michael Cohen Payment To Stormy Daniels [VIDEO]  https://100percentfedup.com/president-trump-responds-to-giulianis-bombshell-claim-during-hannity-interview-about-michael-cohen-payment-to-stormy-daniels-video/",
      "picture" => "https://external.xx.fbcdn.net/safe_image.php?d=AQCLHaTkjOqSZn-l&w=130&h=130&url=https%3A%2F%2F100percentfedup.com%2Fwp-content%2Fuploads%2F2018%2F05%2Fgiiuliani-1200x630.jpg&cfs=1&_nc_hash=AQDJuzyGXB_zSKAs",
      "full_picture" => "https://external.xx.fbcdn.net/safe_image.php?d=AQCp0tMY6UWvce3t&url=https%3A%2F%2F100percentfedup.com%2Fwp-content%2Fuploads%2F2018%2F05%2Fgiiuliani-1200x630.jpg&_nc_hash=AQDXyS-ZxOf-d0_Y",
      "created_time" => "2018-05-03T13:57:00+0000",
      "shares" => "21",
      "comments" => "16",
      "likes" => "149",
      "LOVEs" => "7",
      "HAHAs" => "0",
      "WOWs" => "1",
      "SADs" => "1",
      "ANGRYs" => "0",
    ],
    (object) [
      "publisher_name" => "100percentfedup",
      "post_ID" => "311190048935167_1703408046380020",
      "link" => "https://constitution.com/iran-lies-about-nukes-so-cnn-badgers-israel/",
      "message" => "What an embarrassment! Cuomo interrupts the Prime Minister multiple times; acting like a belligerent fool.",
      "picture" => "https://external.xx.fbcdn.net/safe_image.php?d=AQAnxRNaoDYefrnG&w=130&h=130&url=https%3A%2F%2Fconstitution.com%2Fwp-content%2Fuploads%2F2018%2F05%2FCNN-Cuomo-Netanyahu.jpg&cfs=1&sx=281&sy=0&sw=632&sh=632&_nc_hash=AQDJUgwJdohYgjpv",
      "full_picture" => "https://external.xx.fbcdn.net/safe_image.php?d=AQBDRkK5132ObYqv&url=https%3A%2F%2Fconstitution.com%2Fwp-content%2Fuploads%2F2018%2F05%2FCNN-Cuomo-Netanyahu.jpg&_nc_hash=AQCK_-hNKSSmsPOH",
      "created_time" => "2018-05-03T13:45:00+0000",
      "shares" => "93",
      "comments" => "35",
      "likes" => "44",
      "LOVEs" => "0",
      "HAHAs" => "2",
      "WOWs" => "16",
      "SADs" => "6",
      "ANGRYs" => "105",
    ],
    
  ]
];

header('Content-Type: application/json');
echo json_encode($json);
?>