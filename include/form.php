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

  $leftColWidth  = 3;
  $rightColWidth = 9;

?>
<div class="row">
    <div class="col-xs-12 col-sm-8 span8">
        <h1>Create your own deed poll</h1>
        <div class="alert alert-warning"><strong>Warning:</strong> This deed poll generator is only suitable for British citizens or Commonwealth citizens over the age of 18 years.</div>
    <?php if (!$formIsValid) { ?>
        <div class="alert alert-danger"><strong>Warning:</strong> Some of the fields weren’t filled in correctly. Please correct your mistakes below.</div>
    <?php } ?>
        <form class="form-horizontal
            <?php if ($data['suitable_for_enrolment']['value']) {?>suitable-for-enrolment<?php } ?>
            <?php if ($data['use_second_witness']['value']) {?>use-second-witness<?php } ?>
            " role="form" action="/" method="post">

        <fieldset>
        <legend>Your change of name</legend>
          <div class="form-group control-group <?php if ($data['old_name']['error']) { ?>has-error error<?php } ?>">
            <label for="old_name" class="col-md-<?php echo $leftColWidth; ?> control-label">Your old name</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="old_name" name="old_name" placeholder="Joe Bloggs" value="<?php echo htmlspecialchars($data['old_name']['value']); ?>">
              <?php if ($data['old_name']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['old_name']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['new_name']['error']) { ?>has-error error<?php } ?>">
            <label for="new_name" class="col-md-<?php echo $leftColWidth; ?> control-label">Your new name</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="new_name" name="new_name" placeholder="Fred Bloggs" value="<?php echo htmlspecialchars($data['new_name']['value']); ?>">
              <?php if ($data['new_name']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['new_name']['error']); ?></p>
              <?php } ?>
            </div>
          </div>
        </fieldset>

        <fieldset>
        <legend>Your home address</legend>
          <div class="form-group control-group <?php if ($data['address_line_1']['error']) { ?>has-error error<?php } ?>">
            <label for="address_line_1" class="col-md-<?php echo $leftColWidth; ?> control-label">Address</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="address_line_1" name="address_line_1" value="<?php echo htmlspecialchars($data['address_line_1']['value']); ?>">
              <?php if ($data['address_line_1']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['address_line_1']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['address_line_2']['error']) { ?>has-error error<?php } ?>">
            <label for="address_line_2" class="col-md-<?php echo $leftColWidth; ?> control-label"></label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="address_line_2" name="address_line_2" value="<?php echo htmlspecialchars($data['address_line_2']['value']); ?>">
              <?php if ($data['address_line_2']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['address_line_2']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['address_city']['error']) { ?>has-error error<?php } ?>">
            <label for="address_city" class="col-md-<?php echo $leftColWidth; ?> control-label">Town</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="address_city" name="address_city" value="<?php echo htmlspecialchars($data['address_city']['value']); ?>">
              <?php if ($data['address_city']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['address_city']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['address_zip']['error']) { ?>has-error error<?php } ?>">
            <label for="address_zip" class="col-md-<?php echo $leftColWidth; ?> control-label">Postcode</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="address_zip" name="address_zip" value="<?php echo htmlspecialchars($data['address_zip']['value']); ?>">
              <?php if ($data['address_zip']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['address_zip']['error']); ?></p>
              <?php } ?>
            </div>
          </div>
        </fieldset>

        <fieldset>
        <legend>Other details</legend>
          <div class="form-group control-group <?php if ($data['date']['error']) { ?>has-error error<?php } ?>">
            <label class="col-md-<?php echo $leftColWidth; ?> control-label">Do you want to date the deed poll with today’s date?</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <div class="radio">
                <label>
                  <input type="radio" name="date" value="today" <?php if ($data['date']['value'] == 'today') { ?>checked<?php } ?>>
                  yes
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="date" value="manually" <?php if ($data['date']['value'] == 'manually') { ?>checked<?php } ?>>
                  no, I’ll date the deed poll when I sign it
                </label>
              </div>
              <?php if ($data['date']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['date']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['suitable_for_enrolment']['error']) { ?>has-error error<?php } ?>" id="suitable-for-enrolment">
            <label class="col-md-<?php echo $leftColWidth; ?> control-label">Do you want the deed poll to be suitable for enrolment?</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <div class="radio">
                <label>
                  <input type="radio" name="suitable_for_enrolment" value="1" <?php if ($data['suitable_for_enrolment']['value'] == '1') { ?>checked<?php } ?>>
                  yes
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="suitable_for_enrolment" value="0" <?php if ($data['suitable_for_enrolment']['value'] == '0') { ?>checked<?php } ?>>
                  no
                </label>
              </div>
              <?php if ($data['suitable_for_enrolment']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['suitable_for_enrolment']['error']); ?></p>
              <?php } ?>
                <p class="help-block">You can choose to have your deed poll enrolled in the Royal Courts of Justice if you wish. If you answer “no” you will not be able to enrol your deed poll.</p>
            </div>
          </div>

          <div class="enrolled">
          <div class="form-group control-group <?php if ($data['marital_status']['error']) { ?>has-error error<?php } ?>">
            <label class="col-md-<?php echo $leftColWidth; ?> control-label">Your marital status</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <div class="radio">
                <label>
                  <input type="radio" name="marital_status" value="single" <?php if ($data['marital_status']['value'] == 'single') { ?>checked<?php } ?>>
                  single
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="marital_status" value="married" <?php if ($data['marital_status']['value'] == 'married') { ?>checked<?php } ?>>
                  married
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="marital_status" value="widowed" <?php if ($data['marital_status']['value'] == 'widowed') { ?>checked<?php } ?>>
                  widowed
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="marital_status" value="divorced" <?php if ($data['marital_status']['value'] == 'divorced') { ?>checked<?php } ?>>
                  divorced
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="marital_status" value="civil partner" <?php if ($data['marital_status']['value'] == 'civil partner') { ?>checked<?php } ?>>
                  civil partner
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="marital_status" value="former civil partner (of a civil partnership which ended on death)" <?php if ($data['marital_status']['value'] == 'former civil partner (of a civil partnership which ended on death)') { ?>checked<?php } ?>>
                  former civil partner (of a civil partnership which ended on death)
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="marital_status" value="former civil partner (of a civil partnership which ended on dissolution)" <?php if ($data['marital_status']['value'] == 'former civil partner (of a civil partnership which ended on dissolution)') { ?>checked<?php } ?>>
                  former civil partner (of a civil partnership which ended on dissolution)
                </label>
              </div>
              <?php if ($data['marital_status']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['marital_status']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['citizenship']['error']) { ?>has-error error<?php } ?>">
            <label class="col-md-<?php echo $leftColWidth; ?> control-label">Your type of citizenship</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="1(1)" <?php if ($data['citizenship']['value'] == '1(1)') { ?>checked<?php } ?>>
                  I was born in the U.K. on or after 1<sup>st</sup> January 1983 and one of my parents was either a British citizen, or was settled in the U.K., at the time of my birth
                </label>
              </div>
              <?php /*
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="1(1)_overseas" <?php if ($data['citizenship']['value'] == '1(1)_overseas') { ?>checked<?php } ?>>
                  I was born in a British overseas territory other than the Sovereign Base Areas of Akrotiri and Dhekelia on or after 21<sup>st</sup> May 2002 and one of my parents was either a British citizen, or was settled in the U.K. or that territory, at the time of my birth
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="1(1A)" <?php if ($data['citizenship']['value'] == '1(1A)') { ?>checked<?php } ?>>
                  I was born in the U.K. or in a British overseas territory other than the Sovereign Base Areas of Akrotiri and Dhekelia on or after 13<sup>th</sup> January 2010 and one of my parents was a member of the armed forces at the time of my birth
                </label>
              </div>
              */ ?>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="1(2)" <?php if ($data['citizenship']['value'] == '1(2)') { ?>checked<?php } ?>>
                  I was found as an abandoned new-born baby in the U.K. on or after 1<sup>st</sup> January 1983 and thus I was deemed to be a British citizen under section 1(2) of the British Nationality Act 1981
                </label>
              </div>
              <?php /*
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="1(2)_overseas" <?php if ($data['citizenship']['value'] == '1(2)_overseas') { ?>checked<?php } ?>>
                  I was found as an abandoned new-born baby in a British overseas territory other than the Sovereign Base Areas of Akrotiri and Dhekelia on or after 21<sup>st</sup> May 2002 and thus I was deemed to be a British citizen under section 1(2) of the British Nationality Act 1981
                </label>
              </div>
              */ ?>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="1(3)" <?php if ($data['citizenship']['value'] == '1(3)') { ?>checked<?php } ?>>
                  I was born in the U.K. on or after 1<sup>st</sup> January 1983, and while I was a minor one of my parents became a British citizen or became settled in the U.K., and I was registered as a British citizen under section 1(3) of the British Nationality Act 1981
                </label>
              </div>
              <?php /*
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="1(3A)" <?php if ($data['citizenship']['value'] == '1(3A)') { ?>checked<?php } ?>>
                  I was born in the U.K. on or after 13<sup>th</sup> January 2010, and while I was a minor one of my parents became a member of the armed forces, and I was registered as a British citizen under section 1(3A) of the British Nationality Act 1981
                </label>
              </div>
              */ ?>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="1(4)" <?php if ($data['citizenship']['value'] == '1(4)') { ?>checked<?php } ?>>
                  I was born in the U.K. on or after 1<sup>st</sup> January 1983 and in each of the first 10 years of my life I had not been absent from the U.K. for more than 90 days, and I was registered as a British citizen (once over the age of 10 years) under section 1(4) of the British Nationality Act 1981
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="2(1)" <?php if ($data['citizenship']['value'] == '2(1)') { ?>checked<?php } ?>>
                  I was born outside the U.K. on or after 1<sup>st</sup> January 1983 and one of my parents was a British citizen at the time of my birth (that is—I’m a British citizen “by descent”, under section 2(1) of the British Nationality Act 1981)
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="4A" <?php if ($data['citizenship']['value'] == '4A') { ?>checked<?php } ?>>
                  I was a British overseas territories citizen who was registered as a British citizen under section 4A of the British Nationality Act 1981 on or after 21<sup>st</sup> May 2002
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="4B" <?php if ($data['citizenship']['value'] == '4B') { ?>checked<?php } ?>>
                  I was a British Overseas citizen, British subject (under the British Nationality Act 1981), British protected person, or British National (Overseas), who did not have any other citizenship or nationality, and who was registered as a British citizen under section 4B of the British Nationality Act 1981 on or after 30<sup>th</sup> April 2003
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="4C" <?php if ($data['citizenship']['value'] == '4C') { ?>checked<?php } ?>>
                  I was born before 1<sup>st</sup> January 1983, and if I had become a citizen of the United Kingdom and Colonies at some time before 1<sup>st</sup> January 1983, then on 31<sup>st</sup> December 1982 I would have had the right of abode in the U.K. by virtue of section 2 of the Immigration Act 1971; and I was registered as a British citizen under section 4C of the British Nationality Act 1981 on or after 30<sup>th</sup> April 2003
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="6(1)" <?php if ($data['citizenship']['value'] == '6(1)') { ?>checked<?php } ?>>
                  I have made an application for naturalisation as a British citizen, and at the time the application was made I had full age and capacity, and at that time I was not married to a British citizen nor was I the civil partner of a British citizen, and I was granted a certificate of naturalisation on or after 1<sup>st</sup> January 1983
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="6(2)" <?php if ($data['citizenship']['value'] == '6(2)') { ?>checked<?php } ?>>
                  I have made an application for naturalisation as a British citizen, and at the time the application was made I had full age and capacity, and at that time I was either married to a British citizen or was the civil partner of a British citizen, and I was granted a certificate of naturalisation on or after 1<sup>st</sup> January 1983
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="11(1)" <?php if ($data['citizenship']['value'] == '11(1)') { ?>checked<?php } ?>>
                  On 31<sup>st</sup> December 1982 I was a citizen of the United Kingdom and Colonies and I had the right of abode in the U.K. under the Immigration Act 1971
                </label>
              </div>
              <?php // British overseas territories citizens ?>
              <div class="radio">
                <label>
                  <?php // automatically a British citizen under section 3 of British Overseas Territories Act 2002 ?>
                  <input type="radio" name="citizenship" value="15(1)" <?php if ($data['citizenship']['value'] == '15(1)') { ?>checked<?php } ?>>
                  I was born in a British overseas territory other than the Sovereign Base Areas of Akrotiri and Dhekelia on or after 1<sup>st</sup> January 1983 and one of my parents was either a British Dependent Territories citizen (now called a <em>British overseas territories citizen</em>), or was settled in a British overseas territory, at the time of my birth
                </label>
              </div>
              <div class="radio">
                <label>
                  <?php // automatically a British citizen under section 3 of British Overseas Territories Act 2002 ?>
                  <input type="radio" name="citizenship" value="15(2)" <?php if ($data['citizenship']['value'] == '15(2)') { ?>checked<?php } ?>>
                  I was found as an abandoned new-born baby in a British overseas territory other than the Sovereign Base Areas of Akrotiri and Dhekelia on or after 1<sup>st</sup> January 1983 and thus I was deemed to be a British overseas territories citizen (at that time) under section 15(2) of the British Nationality Act 1981
                </label>
              </div>
              <div class="radio">
                <label>
                  <?php // automatically a British citizen under section 3 of British Overseas Territories Act 2002 ?>
                  <input type="radio" name="citizenship" value="15(3)" <?php if ($data['citizenship']['value'] == '15(3)_bc') { ?>checked<?php } ?>>
                  I was born in a British overseas territory other than the Sovereign Base Areas of Akrotiri and Dhekelia on or after 1<sup>st</sup> January 1983, and while I was a minor one of my parents became a British Dependent Territories citizen (now called a <em>British overseas territories citizen</em>) or became settled in a British overseas territory, and I was registered as a British Dependent Territories citizen under section 15(3) of the British Nationality Act 1981 before 21<sup>st</sup> May 2002
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="15(3)_botc" <?php if ($data['citizenship']['value'] == '15(3)_botc') { ?>checked<?php } ?>>
                  I was born in a British overseas territory on or after 1<sup>st</sup> January 1983, and while I was a minor one of my parents became a British overseas territories citizen (or British Dependent Territories citizen) or became settled in a British overseas territory, and I was registered as a British overseas territories citizen under section 15(3) of the British Nationality Act 1981 on or after 21<sup>st</sup> May 2002
                </label>
              </div>
              <?php // British citizens born before 1st January 1983 ?>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="15(4)_botc" <?php if ($data['citizenship']['value'] == '15(4)_botc') { ?>checked<?php } ?>>
                  I was born in a British overseas territory on or after 1<sup>st</sup> January 1983 and in each of the first 10 years of my life I had not been absent from that territory for more than 90 days, and I was registered as a British overseas territories citizen (once over the age of 10 years) under section 15(4) of the British Nationality Act 1981
                </label>
              </div>
              <?php // British Overseas citizens ?>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="26_boc" <?php if ($data['citizenship']['value'] == '26_boc') { ?>checked<?php } ?>>
                  On 31<sup>st</sup> December 1982 I was a citizen of the United Kingdom and Colonies and I did not become a British citizen or a British Dependent Territories citizen (now called a <em>British overseas territories citizen</em>) at that time
                </label>
              </div>
              <?php // British Commonwealth citizens ?>
              <div class="radio">
                <label>
                  <input type="radio" name="citizenship" value="37(1)_cc" <?php if ($data['citizenship']['value'] == '37(1)_cc') { ?>checked<?php } ?>>
                  I am a citizen of Antigua and Barbuda, Australia, The Bahamas, Bangladesh, Barbados, Belize, Botswana, Brunei, Cameroon, Canada, Republic of Cyprus, Dominica, Fiji, The Gambia, Ghana, Grenada, Guyana, India, Jamaica, Kenya, Kiribati, Lesotho, Malawi, Malaysia, Maldives, Malta, Mauritius, Mozambique, Nauru, New Zealand, Nigeria, Pakistan, Papua New Guinea, Saint Christopher and Nevis, Saint Lucia, Saint Vincent and the Grenadines, Seychelles, Sierra Leone, Singapore, Solomon Islands, South Africa, Sri Lanka, Swaziland, Tanzania, Tonga, Trinidad and Tobago, Tuvalu, Uganda, Vanuatu, Western Samoa, Zambia, Zimbabwe, or Namibia
                </label>
              </div>
              <?php if ($data['citizenship']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['citizenship']['error']); ?></p>
              <?php } ?>
            </div>
          </div>
          </div>
        </fieldset>

        <fieldset>
        <legend>Witness’s details</legend>
          <div class="form-group control-group <?php if ($data['witness_1_name']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_1_name" class="col-md-<?php echo $leftColWidth; ?> control-label">Full name</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_1_name" name="witness_1_name" value="<?php echo htmlspecialchars($data['witness_1_name']['value']); ?>">
              <?php if ($data['witness_1_name']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_1_name']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_1_address_line_1']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_1_address_line_1" class="col-md-<?php echo $leftColWidth; ?> control-label">Address</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_1_address_line_1" name="witness_1_address_line_1" value="<?php echo htmlspecialchars($data['witness_1_address_line_1']['value']); ?>">
              <?php if ($data['witness_1_address_line_1']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_1_address_line_1']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_1_address_line_2']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_1_address_line_2" class="col-md-<?php echo $leftColWidth; ?> control-label"></label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_1_address_line_2" name="witness_1_address_line_2" value="<?php echo htmlspecialchars($data['witness_1_address_line_2']['value']); ?>">
              <?php if ($data['witness_1_address_line_2']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_1_address_line_2']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_1_address_city']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_1_address_city" class="col-md-<?php echo $leftColWidth; ?> control-label">Town</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_1_address_city" name="witness_1_address_city" value="<?php echo htmlspecialchars($data['witness_1_address_city']['value']); ?>">
              <?php if ($data['witness_1_address_city']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_1_address_city']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_1_address_zip']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_1_address_zip" class="col-md-<?php echo $leftColWidth; ?> control-label">Postcode</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_1_address_zip" name="witness_1_address_zip" value="<?php echo htmlspecialchars($data['witness_1_address_zip']['value']); ?>">
              <?php if ($data['witness_1_address_zip']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_1_address_zip']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_1_occupation']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_1_occupation" class="col-md-<?php echo $leftColWidth; ?> control-label">Occupation</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_1_occupation" name="witness_1_occupation" value="<?php echo htmlspecialchars($data['witness_1_occupation']['value']); ?>">
              <?php if ($data['witness_1_occupation']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_1_occupation']['error']); ?></p>
              <?php } ?>
            </div>
          </div>
        </fieldset>

        <fieldset>
        <legend>Second witness’s details</legend>
          <div class="form-group control-group <?php if ($data['use_second_witness']['error']) { ?>has-error error<?php } ?>" id="use-second-witness">
            <label class="col-md-<?php echo $leftColWidth; ?> control-label">Use two witnesses</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <div class="radio">
                <label>
                  <input type="radio" name="use_second_witness" value="1" <?php if ($data['use_second_witness']['value'] == '1') { ?>checked<?php } ?>>
                  yes
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="use_second_witness" value="0" <?php if ($data['use_second_witness']['value'] == '0') { ?>checked<?php } ?>>
                  no, just use one witness
                </label>
              </div>
              <?php if ($data['use_second_witness']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['use_second_witness']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="second-witness">
          <div class="form-group control-group <?php if ($data['witness_2_name']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_2_name" class="col-md-<?php echo $leftColWidth; ?> control-label">Full name</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_2_name" name="witness_2_name" value="<?php echo htmlspecialchars($data['witness_2_name']['value']); ?>">
              <?php if ($data['witness_2_name']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_2_name']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_2_address_line_1']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_2_address_line_1" class="col-md-<?php echo $leftColWidth; ?> control-label">Address</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_2_address_line_1" name="witness_2_address_line_1" value="<?php echo htmlspecialchars($data['witness_2_address_line_1']['value']); ?>">
              <?php if ($data['witness_2_address_line_1']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_2_address_line_1']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_2_address_line_2']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_2_address_line_2" class="col-md-<?php echo $leftColWidth; ?> control-label"></label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_2_address_line_2" name="witness_2_address_line_2" value="<?php echo htmlspecialchars($data['witness_2_address_line_2']['value']); ?>">
              <?php if ($data['witness_2_address_line_2']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_2_address_line_2']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_2_address_city']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_2_address_city" class="col-md-<?php echo $leftColWidth; ?> control-label">Town</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_2_address_city" name="witness_2_address_city" value="<?php echo htmlspecialchars($data['witness_2_address_city']['value']); ?>">
              <?php if ($data['witness_2_address_city']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_2_address_city']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_2_address_zip']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_2_address_zip" class="col-md-<?php echo $leftColWidth; ?> control-label">Postcode</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_2_address_zip" name="witness_2_address_zip" value="<?php echo htmlspecialchars($data['witness_2_address_zip']['value']); ?>">
              <?php if ($data['witness_2_address_zip']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_2_address_zip']['error']); ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="form-group control-group <?php if ($data['witness_2_occupation']['error']) { ?>has-error error<?php } ?>">
            <label for="witness_2_occupation" class="col-md-<?php echo $leftColWidth; ?> control-label">Occupation</label>
            <div class="controls col-md-<?php echo $rightColWidth; ?>">
              <input type="text" class="form-control" id="witness_2_occupation" name="witness_2_occupation" value="<?php echo htmlspecialchars($data['witness_2_occupation']['value']); ?>">
              <?php if ($data['witness_2_occupation']['error']) { ?>
                <p class="help-block"><strong>Error:</strong> <?php echo htmlspecialchars($data['witness_2_occupation']['error']); ?></p>
              <?php } ?>
            </div>
          </div>
          </div>
        </fieldset>

        <div class="form-group">
          <div class="controls col-md-offset-<?php echo $leftColWidth; ?> col-md-<?php echo $rightColWidth; ?>">
            <input type="submit" class="btn btn-primary" name="submit" value="Generate deed poll">
          </div>
        </div>

        </form>
    </div>
    <div class="col-xs-12 col-sm-4 span4">
        <h3>How to change your name in the U.K.</h3>
        <ol>
            <li>Fill in this form
            <li>If you want to enrol your deed poll you need to answer “yes” for the question “Do you want the deed poll to be suitable for enrolment?”
            <li>Download your deed poll and print it out
            <li>Sign the the deed poll in both your old and new names in the presence of your witness(es)
            <li>Have your witness(es) sign the deed poll in your presence
            <li><a href="/what-next">Inform everyone about your new name</a>
        </ol>

        <h3>Who can be your witness</h3>
        <p>
            You need to choose someone who:
        </p>
        <ul>
            <li>knows who you are
            <li>is resident in the U.K.
            <li>is not a relative or your partner
            <li>has not been detained under the Mental Health Act
        </ul>

        <h3>Frequently asked questions</h3>
        <h4>Do I enter my title (Mr, Mrs, Miss, etc.)?</h4>
        <p>
            No—your title is not part of your name.
        </p>

        <h4>What name can I call myself</h4>
        <p>
            There is no law about what names you can or cannot call yourself, so you can call yourself anything you like, provided it is not for a criminal purpose. For more detailed advice see: <a href="/names">restricions on names</a>.
        </p>

    </div>
</div>

<script>
    $(document).ready(function() {
        var form = $('form');
        $('#suitable-for-enrolment input:radio').click(function() { form.toggleClass('suitable-for-enrolment', $(this).val() == '1'); });
        $('#use-second-witness     input:radio').click(function() { form.toggleClass('use-second-witness', $(this).val() == '1'); });
    });
</script>
