<?php

require_once __DIR__ . '/../vendor/autoload.php';

//Song-Infos laden
include('songs/be-alright.php');
//include('songs/this-song.php');
//include('songs/near-you.php');
//include('songs/schneckentalschule.php');
//include('songs/jeden-morgen-geh-ich-in-die-schule.php');

//Labels fuer PDF
$label = [
  "riff" => "Riff",
  "verse" => "Str.",
  "ref" => "Ref.",
  "bridge" => "Bridge",
  "end" => "Ende",
];

//Title - Artist
$html = "";
$html .= "<table class='title_block'><tr>";
$html .= "<td class='title'>" . $song["title"] . "</td>";
$html .= "<td class='artist'>" . $song["artist"] . "</td>";
$html .= "</tr></table>";

//Str., Ref. zaehlen fuer Benennung Str. 1, Str. 2
$part_counter = [];

//Song aus Einzelteilen erstellen
foreach ($seq as $i => $item) {
  $key = $item[0];

  //verse und verse-2 (variierte Stophe) haben gleichen Label und Counter
  $key_short = explode("-", $key);
  $label_key = $key_short[0];
  if (!isset($part_counter[$label_key])) {
    $part_counter[$label_key] = 1;
  } else {
    $part_counter[$label_key]++;
  }

  //td zaehlen fuer </tr>
  $td_counter = 0;
  $html .= "<table class='part_table'>";
  foreach ($song["parts"][$key] as $td) {

    //Alle 4 td eine neue Zeile
    if ($td_counter % 4 === 0) {

      //Zu Beginn noch keine Zeile beenden
      if ($td_counter !== 0) {
        $html .= "</tr>";
      }
      $html .= "<tr>";

      //Part-Label und Textfragment vor eigentliche Noten
      if ($td_counter === 0) {
        $rowspan = ceil(count($song["parts"][$key]) / 4);
        $html .= "<td class='part_td' rowspan=" . $rowspan . ">";

        //Part-Label "Ref. 1", aber nicht bei Ende (nicht Ende 1)
        $suffix = $label_key !== "end" ? " " . $part_counter[$label_key] : "";
        $html .= "<b>" . $label[$label_key] . $suffix . "</b>";

        //Textfragment "It's just the same", "Git-Solo"
        if (isset($item[1])) {
          $html .= "<br><span class='lyrics_left'>" . $item[1] . "</span>";
        }
        $html .= "</td>";
      }
    }

    //Einzelakkord normal anzeigen
    $td_split = explode("-", $td);
    if (count($td_split) === 1) {
      $td_split_bracket = explode('(', $td);

      //Einfache Akkorde normal anzeigen
      if (count($td_split_bracket) === 1) {
        $html .= "<td class='single_chord_td'>" . $td . "</td>";
      }

      //Bemerkungen in Klammer kursiv anzeigen und nicht fett
      else {
        $html .= "<td class='single_chord_td'>" . trim($td_split_bracket[0]) . "<span class='bracket_note'> (" . $td_split_bracket[1] . "</span></td>";
      }
    }

    //Akkordwechsel im Takt mit zentriertem Geviert
    else {
      $html .= "<td><table class='geviert_table'><tr>";
      $html .= "<td class='first_chord'>" . $td_split[0] . "</td>";
      $html .= "<td class='geviert'>—</td>";
      $html .= "<td class='second_chord'>" . $td_split[1] . "</td>";
      $html .= "</tr></table></td>";
    }
    $td_counter++;
  }

  //Leere tds bis Zeileende auffuellen
  while ($td_counter % 4 !== 0) {
    $html .= "<td class='no-chord'></td>";
    $td_counter++;
  }
  $html .= "</tr></table>";
}

//PDF-Datei vorbereiten
$mpdf = new \Mpdf\Mpdf([
  'default_font' => 'arial',
  'format' => 'A4',
  'margin' => 0
]);
//$mpdf->img_dpi = 1200;

//HTML/CSS -> pdf
$stylesheet = file_get_contents(__DIR__ . '/styles.css');
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output(str_replace("?", "", $song["title"]) . " (" . $song["artist"] . ").pdf");
