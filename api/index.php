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
      "publisher" => "100percentfedup",
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
      "publisher" => "100percentfedup",
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
      "publisher" => "100percentfedup",
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
      "publisher" => "100percentfedup",
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
      "publisher" => "100percentfedup",
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
    ]
  ]
];

header('Content-Type: application/json');
echo json_encode($json);
?>