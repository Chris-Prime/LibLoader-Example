<?php
/*
 *   LibLoader-Example: explains how to use Simple-LibLoader and Localizer
 *   Copyright (C) 2016  Chris Prime
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace test;

use pocketmine\plugin\PluginBase;
use sll\LibLoader;
use tester\Tester;
use localizer\Localizer;
use localizer\iso\ISO_639_1;

class Main extends PluginBase {

	public function onEnable() {
		// Using Simple-LibLoader
		LibLoader::loadLib($this->getFile() . "lib/Localizer");

		// Preparing Localizer
		@mkdir($this->getDataFolder());
		if(!is_dir($this->getDataFolder() . "languages")) {
			Localizer::transferLanguages($this->getFile()."languages", $this->getDataFolder()."languages");
		}
		// Loading languages
		Localizer::loadLanguages($this->getDataFolder() . "languages");

		// Localizer example
		$this->getLogger()->info("Word " . Localizer::en('monster') . " in Latvian is '".Localizer::lv('monster')."'");
	}

}