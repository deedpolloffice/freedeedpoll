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
<ul>
    <li><img src="/img/pdf_small.png" /> <a href="/download?<?php echo htmlspecialchars(http_build_query(array_merge($params, [ 'format' => 'pdf' ]))); ?>">in PDF format</a>
    <li><img src="/img/word_small.png" /> <a href="/download?<?php echo htmlspecialchars(http_build_query(array_merge($params, [ 'format' => 'word' ]))); ?>">in Word format</a>
</ul>

<br />
<br />
<p>
    <a class="btn btn-primary" href="/form?<?php echo htmlspecialchars(http_build_query(array_merge($params))); ?>">Change my details</a>
</p>
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

