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
 * superframe lib (API)
 *
 * @package    filter_simplefilter
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * Modified for use in MoodleBites for Developers Level 1 by Richard Jones & Justin Hunt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL')|| die();

class filter_simplefilter extends moodle_text_filter {

    function filter($text, array $options = array()) {
        global $PAGE;

        // Basic test to avoid work.
        if (!is_string($text)) {
            // non string content can not be filtered anyway.
            return $text;
        }

        // Admin might need to change these at some point - eg to double curlies,
        // therefore defined in {@link settings.php} with default values.
        $def_config = get_config('filter_simplefilter');
        $starttag = $def_config->starttag;
        $endtag = $def_config->endtag;

        // Do a quick check to see if we have a tag
        if (strpos($text, $starttag) === false) {
            return $text;
        }

        $renderer = $PAGE->get_renderer('filter_simplefilter');

        // There may be a tag in here somewhere so continue
        // Get the contents and positions in the text and call the
        // renderer to deal with them.
        $text = filter_simplefilter_insert_content($text, $starttag, $endtag, $renderer);
        return $text;
    }
}



}