<?php
/*
* Short Description / title.
*
* Overview of what the file does. About a paragraph or two
*
* Copyright (c) 2010 Carl Sutton ( dogmatic69 )
*
* @filesource
* @copyright Copyright (c) 2010 Carl Sutton ( dogmatic69 )
* @link http://www.infinitas-cms.org
* @package {see_below}
* @subpackage {see_below}
* @license http://www.opensource.org/licenses/mit-license.php The MIT License
* @since {check_current_milestone_in_lighthouse}
*
* @author {your_name}
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*/

class DebugKitEvents extends AppEvents {

/**
 * Attach behaviors
 *
 * @param Event $Event
 *
 * @return void
 */
	public function onAttachBehaviors(Event $Event) {
		if(!Configure::read('debug')) {
			return;
		}

		if(is_subclass_of($Event->Handler, 'Model')) {
			$Event->Handler->Behaviors->attach('DebugKit.Timed');
		}
	}

/**
 * Components to load
 *
 * @param Event $Event
 *
 * @return void|array
 */
	public function onRequireComponentsToLoad(Event $Event) {
		if(!Configure::read('debug')) {
			return;
		}

		return array(
			'DebugKit.Toolbar'
		);
	}

/**
 * css to load
 *
 * @param Event $Event
 *
 * @return void|array
 */
	public function onRequireCssToLoad(Event $Event, $data = null) {
		if(!Configure::read('debug')) {
			return;
		}

		return array(
			'DebugKit.debug_toolbar'
		);
	}

/**
 * js to load
 *
 * @param Event $Event
 *
 * @return void|array
 */
	public function onRequireJavascriptToLoad(Event $Event, $data = null) {
		if(!Configure::read('debug')) {
			return;
		}

		return array(
			'DebugKit.jquery',
			'DebugKit.js_debug_toolbar',
			'DebugKit.debug_kit'
		);
	}
}