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
?>
<h1>Create your own deed poll</h1>
<p>
    <strong>Download your generated deed poll:</strong>
</p>
<form method="post" action="/download">
    <input type="hidden" name="old_name"                 value="<?php echo htmlspecialchars($data['old_name']['value']); ?>" />
    <input type="hidden" name="new_name"                 value="<?php echo htmlspecialchars($data['new_name']['value']); ?>" />
    <input type="hidden" name="address_line_1"           value="<?php echo htmlspecialchars($data['address_line_1']['value']); ?>" />
    <input type="hidden" name="address_line_2"           value="<?php echo htmlspecialchars($data['address_line_2']['value']); ?>" />
    <input type="hidden" name="address_city"             value="<?php echo htmlspecialchars($data['address_city']['value']); ?>" />
    <input type="hidden" name="address_zip"              value="<?php echo htmlspecialchars($data['address_zip']['value']); ?>" />
    <input type="hidden" name="date"                     value="<?php echo htmlspecialchars($data['date']['value']); ?>" />
    <input type="hidden" name="suitable_for_enrolment"   value="<?php echo htmlspecialchars($data['suitable_for_enrolment']['value']); ?>" />
    <input type="hidden" name="marital_status"           value="<?php echo htmlspecialchars($data['marital_status']['value']); ?>" />
    <input type="hidden" name="citizenship"              value="<?php echo htmlspecialchars($data['citizenship']['value']); ?>" />
    <input type="hidden" name="witness_1_name"           value="<?php echo htmlspecialchars($data['witness_1_name']['value']); ?>" />
    <input type="hidden" name="witness_1_address_line_1" value="<?php echo htmlspecialchars($data['witness_1_address_line_1']['value']); ?>" />
    <input type="hidden" name="witness_1_address_line_2" value="<?php echo htmlspecialchars($data['witness_1_address_line_2']['value']); ?>" />
    <input type="hidden" name="witness_1_address_city"   value="<?php echo htmlspecialchars($data['witness_1_address_city']['value']); ?>" />
    <input type="hidden" name="witness_1_address_zip"    value="<?php echo htmlspecialchars($data['witness_1_address_zip']['value']); ?>" />
    <input type="hidden" name="witness_1_occupation"     value="<?php echo htmlspecialchars($data['witness_1_occupation']['value']); ?>" />
    <input type="hidden" name="use_second_witness"       value="<?php echo htmlspecialchars($data['use_second_witness']['value']); ?>" />
    <input type="hidden" name="witness_2_name"           value="<?php echo htmlspecialchars($data['witness_2_name']['value']); ?>" />
    <input type="hidden" name="witness_2_address_line_1" value="<?php echo htmlspecialchars($data['witness_2_address_line_1']['value']); ?>" />
    <input type="hidden" name="witness_2_address_line_2" value="<?php echo htmlspecialchars($data['witness_2_address_line_2']['value']); ?>" />
    <input type="hidden" name="witness_2_address_city"   value="<?php echo htmlspecialchars($data['witness_2_address_city']['value']); ?>" />
    <input type="hidden" name="witness_2_address_zip"    value="<?php echo htmlspecialchars($data['witness_2_address_zip']['value']); ?>" />
    <input type="hidden" name="witness_2_occupation"     value="<?php echo htmlspecialchars($data['witness_2_occupation']['value']); ?>" />
    <ul>
        <li><img src="/img/pdf_small.png" />&nbsp;&nbsp;&nbsp;<input type="submit" name="pdf" class="btn btn-primary btn-xs" value="Download in PDF format" />
    </p>
        <li><img src="/img/word_small.png" />&nbsp;&nbsp;&nbsp;<input type="submit" name="word" class="btn btn-primary btn-xs" value="Download in Word format" />
    </ul>
</form>

<br />
<br />
<form method="post" action="/">
    <input type="hidden" name="old_name"                 value="<?php echo htmlspecialchars($data['old_name']['value']); ?>" />
    <input type="hidden" name="new_name"                 value="<?php echo htmlspecialchars($data['new_name']['value']); ?>" />
    <input type="hidden" name="address_line_1"           value="<?php echo htmlspecialchars($data['address_line_1']['value']); ?>" />
    <input type="hidden" name="address_line_2"           value="<?php echo htmlspecialchars($data['address_line_2']['value']); ?>" />
    <input type="hidden" name="address_city"             value="<?php echo htmlspecialchars($data['address_city']['value']); ?>" />
    <input type="hidden" name="address_zip"              value="<?php echo htmlspecialchars($data['address_zip']['value']); ?>" />
    <input type="hidden" name="date"                     value="<?php echo htmlspecialchars($data['date']['value']); ?>" />
    <input type="hidden" name="suitable_for_enrolment"   value="<?php echo htmlspecialchars($data['suitable_for_enrolment']['value']); ?>" />
    <input type="hidden" name="marital_status"           value="<?php echo htmlspecialchars($data['marital_status']['value']); ?>" />
    <input type="hidden" name="citizenship"              value="<?php echo htmlspecialchars($data['citizenship']['value']); ?>" />
    <input type="hidden" name="witness_1_name"           value="<?php echo htmlspecialchars($data['witness_1_name']['value']); ?>" />
    <input type="hidden" name="witness_1_address_line_1" value="<?php echo htmlspecialchars($data['witness_1_address_line_1']['value']); ?>" />
    <input type="hidden" name="witness_1_address_line_2" value="<?php echo htmlspecialchars($data['witness_1_address_line_2']['value']); ?>" />
    <input type="hidden" name="witness_1_address_city"   value="<?php echo htmlspecialchars($data['witness_1_address_city']['value']); ?>" />
    <input type="hidden" name="witness_1_address_zip"    value="<?php echo htmlspecialchars($data['witness_1_address_zip']['value']); ?>" />
    <input type="hidden" name="witness_1_occupation"     value="<?php echo htmlspecialchars($data['witness_1_occupation']['value']); ?>" />
    <input type="hidden" name="use_second_witness"       value="<?php echo htmlspecialchars($data['use_second_witness']['value']); ?>" />
    <input type="hidden" name="witness_2_name"           value="<?php echo htmlspecialchars($data['witness_2_name']['value']); ?>" />
    <input type="hidden" name="witness_2_address_line_1" value="<?php echo htmlspecialchars($data['witness_2_address_line_1']['value']); ?>" />
    <input type="hidden" name="witness_2_address_line_2" value="<?php echo htmlspecialchars($data['witness_2_address_line_2']['value']); ?>" />
    <input type="hidden" name="witness_2_address_city"   value="<?php echo htmlspecialchars($data['witness_2_address_city']['value']); ?>" />
    <input type="hidden" name="witness_2_address_zip"    value="<?php echo htmlspecialchars($data['witness_2_address_zip']['value']); ?>" />
    <input type="hidden" name="witness_2_occupation"     value="<?php echo htmlspecialchars($data['witness_2_occupation']['value']); ?>" />
    <p>
        <input type="submit" name="change" class="btn" value="Change my details" />
    </p>
</form>
<br />
<br />

<h2>What you need to do next</h2>
<ol>
    <li>Download your deed poll and print it out
    <li>Sign the the deed poll in both your old and new names in the presence of your witness(es)
    <li>Have your witness(es) sign the deed poll in your presence
    <li><a href="/what-next">Inform everyone about your new name</a>
</ol>
<?php if ($data['suitable_for_enrolment']['value']) { ?>
<p>
    If you want to enrol your deed poll then follow the instructions in <a href="http://hmctsformfinder.justice.gov.uk/courtfinder/forms/loc019-eng.pdf">leaflet LOC019</a>.
</p>
<?php } ?>

<h2>Who can be your witness</h2>
<p>
    You need to choose someone who:
</p>
<ul>
    <li>knows who you are
    <li>is resident in the U.K.
    <li>is not a relative or your partner
    <li>has not been detained under the Mental Health Act
</ul>

