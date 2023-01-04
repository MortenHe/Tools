<?php

//Elemente des Songs
$song = [
  "title" => "This Song",
  "artist" => "Nobody",
  "parts" => [
    "verse" => [
      "E", "A-H", "E", "A-H",
      "E", "A-H", "G#", "c#m-A",
      "H (ring)"
    ],
    "verse-2" => [
      "E", "A-H", "E", "A-h",
      "E", "A-h", "G#", "c#m - A",
      "H", "E", "E7"
    ],
    "ref" => [
      "A-H", "E-c#m", "A-H", "E",
      "A-H", "E-c#m", "F#", "H7"
    ],
    "end" => [
      "E (ferm.)"
    ]
  ]
];

//Ablauf
$seq = [
  ["verse", "This song I've written"],
  ["verse-2", "Let me tell you"],
  ["ref", "Baby, I would never"],
  ["verse", "So tell me"],
  ["verse", "I only want you"],
  ["end"],
];
