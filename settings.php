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
 * Course list block settings
 *
 * @package    block_custom_course_list
 * @copyright  2007 Petr Skoda
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $options = array('all'=>get_string('allcourses', 'block_custom_course_list'), 'own'=>get_string('owncourses', 'block_custom_course_list'));

    $settings->add(new admin_setting_configselect('block_custom_course_list_adminview', get_string('adminview', 'block_custom_course_list'),
                       get_string('configadminview', 'block_custom_course_list'), 'all', $options));

    $settings->add(new admin_setting_configcheckbox('block_custom_course_list_hideallcourseslink', get_string('hideallcourseslink', 'block_custom_course_list'),
                       get_string('confighideallcourseslink', 'block_custom_course_list'), 0));

    $categories = core_course_category::get(0)->get_children();  // Parent = 0   ie top-level categories only

    foreach ($categories as $key => $value) {
    	//echo $value->id.' '.$value->name.'<br>';
    	// https://moodle.org/mod/forum/discuss.php?d=227249
    	// new admin_setting_configstoredfile($name, $title, $description, 'slide2image');
    	$settings->add(new admin_setting_configstoredfile('theme_moove/catimage'.$value->id, $value->name, 'Immagine per '.$value->name, 'catimage'.$value->id));
    }
}


