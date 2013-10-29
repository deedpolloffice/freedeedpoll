<?php
/**
  This file is part of FREE DEED POLL.org.

  Copyright © 2013 Deed Poll Office Ltd

  FREE DEED POLL.org is free software: you can redistribute it and/or modify
  it under the terms of the GNU Affero General Public License as
  published by the Free Software Foundation, either version 3 of the
  License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU Affero General Public License for more details.

  You should have received a copy of the GNU Affero General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

function escape_rtf($text) { return utf8_decode(str_replace(array('\\', '{', '}'), array('\\\\', '\{', '\}'), $text)); }

$ret = file_get_contents("$rootDir/docs/deed_poll_template.rtf");

$ret = str_replace('(NEW NAME)', escape_rtf($data['new_name']['value']), $ret);
$ret = str_replace('(OLD NAME)', escape_rtf($data['old_name']['value']), $ret);
if (!$data['suitable_for_enrolment']['value']) {
    $ret = str_replace(', (MARITAL STATUS), and a (TYPE OF CITIZEN) under section (SECTION) of the British Nationality Act 1981', '', $ret);
}
if (preg_match('/\bcivil partner\b/', $data['marital_status']['value'])) $data['marital_status']['value'] = "a {$data['marital_status']['value']}";
$ret = str_replace('(MARITAL STATUS)', escape_rtf($data['marital_status']['value']), $ret);
switch (true) {
    case (preg_match('/_botc$/', $data['citizenship']['value'])):
	$citizen = 'British overseas territories citizen';
	break;
    case (preg_match('/_boc$/', $data['citizenship']['value'])):
	$citizen = 'British Overseas citizen';
	break;
    case (preg_match('/_cc$/', $data['citizenship']['value'])):
	$citizen = 'Commonwealth citizen';
	break;
    default:
	$citizen = 'British citizen';
	break;
}
$ret = str_replace('(TYPE OF CITIZEN)', escape_rtf($citizen), $ret);
$ret = str_replace('(SECTION)', escape_rtf(preg_replace('/_[a-z]+$/', '', $data['citizenship']['value'])), $ret);
$address = [];
foreach ([ 'line_1', 'line_2', 'city', 'zip' ] as $part) {
    if ($data[$key = "address_{$part}"]['value'] == '') continue;
    $address[] = $data[$key]['value'];
}
$ret = str_replace('(' . strtoupper(str_replace('_', ' ', $type)) . 'ADDRESS)', escape_rtf(implode(', ', $address)), $ret);
$useTwoWitnesses = $data['suitable_for_enrolment']['value'] || $data['use_second_witness']['value'];
foreach ([ 'witness_1_', 'witness_2_' ] as $type) {
    $address = [];
    foreach ([ 'name', 'address_line_1', 'address_line_2', 'address_city', 'address_zip' ] as $part) {
	$value = $data["{$type}{$part}"]['value'];
	if ($type == 'witness_2_' && !$useTwoWitnesses) $value = '';
	$ret = str_replace('(' . strtoupper(str_replace('_', ' ', "{$type}{$part}")) . ')', escape_rtf($value), $ret);
    }
}
$ret = str_replace('(WITNESS 1 SIGNATURE)', $signature = '_________________________________', $ret);
$ret = str_replace('(WITNESS 2 SIGNATURE)', $useTwoWitnesses ? $signature : '', $ret);
$ret = str_replace('(WITNESS 1 OCCUPATION)', escape_rtf("Occupation: {$data['witness_1_occupation']['value']}"), $ret);
$ret = str_replace('(WITNESS 2 OCCUPATION)', escape_rtf($useTwoWitnesses ? "Occupation: {$data['witness_2_occupation']['value']}" : ''), $ret);
if ($data['date']['value'] == 'manually') {
    $day   = '_____';
    $month = '__________________';
    $year  = '_____';
} else {
    $date  = new \DateTime('now', new \DateTimeZone('Europe/London'));
    $day   = $date->format('jS');
    $month = $date->format('F');
    $year  = $date->format('y');
}
$ret = str_replace('(DAY)',   escape_rtf($day), $ret);
$ret = str_replace('(MONTH)', escape_rtf($month), $ret);
$ret = str_replace('(YEAR)',  escape_rtf($year), $ret);
#echo $ret;die;

if (isset($_POST['pdf']) || $_REQUEST['format'] == 'pdf') {
    $tempFileNameBase = "/tmp/freedeedpoll_" . time() . '_' . rand(0, 1000);
    if (!file_put_contents($fileName = "$tempFileNameBase.rtf", $ret)) {
	throw new \Exception("Temporary file '$fileName' could not be written");
    }
    $cmd = sprintf("$rootDir/bin/rtf2pdf %s", escapeshellarg($fileName));
    exec(sprintf($cmd), $output, $returnVar);
    if ($returnVar) {
        throw new \Exception("Could not convert '$fileName' to PDF" . (count($output) ? ': ' . implode("\n", $output) : ''));
    }
    if (!$ret = file_get_contents($fileName = "$tempFileNameBase.pdf")) {
	throw new \Exception("Could not read contents from '$fileName'");
    }
    if (!unlink($fileName = "$tempFileNameBase.rtf")) {
        throw new \Exception("Could not delete temporary file '$fileName'");
    }
    if (!unlink($fileName = "$tempFileNameBase.pdf")) {
        throw new \Exception("Could not delete temporary file '$fileName'");
    }
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="deed_poll.pdf"');
} else {
    header('Content-Type: application/rtf');
    header('Content-Disposition: attachment; filename="deed_poll.rtf"');
}
echo $ret;

