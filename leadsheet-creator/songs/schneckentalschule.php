<?php

//Elemente des Songs
$song = [
  "title" => "Kennt ihr die coole Schneckentalschule?",
  "artist" => "Martin Helfer",
  "parts" => [
    "verse" => [
      "D", "hm", "A-G", "D",
      "f#m", "hm", "E", "A",
    ],
    "bridge" => [
      "G", "A", "hm", "E",
      "em", "em", "A", "A"
    ],
    "ref" => [
      "D", "G-A", "D", "hm",
      "G", "A", "D", "A",
      "D", "G-A", "D", "hm",
      "G", "A", "D", "D"
    ],
    "end" => [
      "G", "A", "D", "D",
      "G", "A", "D (ferm.)"
    ]
  ]
];

//Ablauf
$seq = [
  ["ref", "Kennt ihr die coole Schneckentalschule?"],
  ["verse", "Die Jacke an,<br>den Ranzen an"],
  ["bridge", "Wo kommt die<br>Kartoffel her?"],
  ["ref", "Kennt ihr die coole Schneckentalschule?"],
  ["verse", "Die Heft raus<br>und schnell notiert"],
  ["bridge", "Wo kommt die<br>Kartoffel her?"],
  ["ref", "Kennt ihr die coole Schneckentalschule?"],
  ["end", "Gemeinsam sind<br>wir stark"],
];
