<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * filter simplefilter admin settings and defaults
 *
 * @package    filter
 * @subpackage simplefilter
 * @copyright  2017 Richard Jones (@link https://richardnz.net/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // default values for filter.php
    $START_TAG = '{{NEWTEXT:';
    $END_TAG = '}}';

    // language strings
    $heading = get_string('settings_heading', 'filter_simplefilter');
    $description = get_string('settings_desc', 'filter_simplefilter');

    $settings->add(new admin_setting_heading('simplefiltersettings',
            $heading, $description));


    $settings->add(new admin_setting_configtext('filter_simplefilter/starttag',
            get_string('settings_start_tag', 'filter_simplefilter'),
            get_string('settings_start_tag_desc', 'filter_simplefilter'),
            $START_TAG, PARAM_TEXT));

    $settings->add(new admin_setting_configtext('filter_simplefilter/endtag',
            get_string('settings_end_tag', 'filter_simplefilter'),
            get_string('settings_end_tag_desc', 'filter_simplefilter'),
            $END_TAG, PARAM_TEXT));
}