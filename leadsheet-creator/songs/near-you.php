<?php

//Elemente des Songs
$song = [
  "title" => "Near You",
  "artist" => "Nobody",
  "parts" => [
    "verse" => [
      "D", "f#m", "G", "A",
      "D", "f#m", "G", "A",
      "G", "A", "gm", "A",
    ],
    "riff" => [
      "D", "f#m", "G", "A",
      "D", "f#m", "G", "A",
    ],
    "bridge" => [
      "D", "D", "D", "D",
    ],
    "ref" => [
      "f#m", "f#m", "hm", "hm",
      "E", "E", "A", "A",
      "G/a", "A"
    ],
    "solo" => [
      "D", "f#m", "G", "A",
      "D", "f#m", "G", "A",
    ],
    "verse-2" => [
      "G", "A", "gm", "A",
    ],
    "end" => [
      "D (ferm.)"
    ]
  ]
];

//Ablauf
$seq = [
  ["verse", "Let me tell you a story"],
  ["riff"],
  ["verse", "Have you ever been"],
  ["riff"],
  ["bridge"],
  ["ref", "I'm going mad"],
  ["riff", "Git-Solo"],
  ["verse-2", "I seem to be"],
  ["riff"],
  ["end"],
];
