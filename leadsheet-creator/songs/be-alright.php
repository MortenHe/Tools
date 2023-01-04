<?php

//Elemente des Songs
$song = [
  "title" => "Be Alright",
  "artist" => "NEXUS",
  "parts" => [
    "riff" => [
      "hm", "hm", "G", "A",
      "hm", "hm", "G", "A",
      "hm", "hm"
    ],
    "verse" => [
      "G-F#", "hm", "em-A", "hm",
      "em-A", "hm", "G-em", "F# (weg auf 3)"
    ],
    "ref" => [
      "hm", "G", "em", "F#",
      "hm", "G", "F#", "G-em"
    ]
  ]
];

//Ablauf
$seq = [
  ["riff"],
  ["verse", "I learned to control"],
  ["ref", "It's just the same"],
  ["riff"],
  ["verse", "I often think about you"],
  ["ref", "It's just the same"],
  ["riff"],
  ["verse", "Git-Solo"],
  ["ref", "It's just the same"],
  ["ref", "It's just the same"],
  ["riff"],
];
