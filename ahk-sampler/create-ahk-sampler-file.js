//.ahk Datei fuer Sampler erstellen aus .wav-Dateien in Ordner

//Files lesen und schreiben
const fs = require('fs-extra')

//Config auslesen
const config = fs.readJSONSync('config.json');
const audioDir = config.audioDir;
const folder = config.folder;

//Ueber Dateien in Ordner gehen und Anweisungen fuer .ahk-Skript erstellen
const lines = [];
files = fs.readdirSync(audioDir + '/' + folder);
for (const file of files) {

    //Dateinname splitten, um Taste zu ermitteln "1 alles-gut.wav" -> ["1","alles-gut.wav"]
    const parts = file.split(" ");

    //.ahk-Code erstellen und sammeln
    const line = parts[0] + '::SoundPlay, %A_ScriptDir%\\' + folder + '\\' + file
    lines.push(line);
}

//abschliessende Zeile in .ahk-Skript
lines.push("return");

//Datei mit Anweisungen erstellen
fs.writeFileSync(audioDir + "/" + folder + '.ahk', lines.join('\n'));