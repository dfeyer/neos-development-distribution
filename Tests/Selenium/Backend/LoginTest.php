<?php
declare(ENCODING = 'utf-8');
namespace F3\Demo\Tests\Selenium\Backend;

/*                                                                        *
 * This script belongs to the TYPO3 project.                              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

require_once(__DIR__ . '/BackendTestCase.php');

/**
 * Verify that login to backend works like expected for the Demopackage
 *
 * @version $Id$
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class LoginTest extends \F3\Demo\Tests\Selenium\Backend\BackendTestCase {

	/**
	 * @test
	 * @author Daniel Pötzinger
	 */
	public function loginWithWrongCredentialsFails() {
		$this->backendLogin('username', 'unknownpassword');
		$this->waitForElementPresent("//input[contains(@class, 'x-form-invalid')]");
	}

	/**
	 * @test
	 * @author Daniel Pötzinger
	 */
	public function loginWithCorrectCredentialsWorks() {
		$this->backendLogin('admin', 'password');
		$this->waitForTextPresent('THIS IS THE BACKEND');
	}
}
?>