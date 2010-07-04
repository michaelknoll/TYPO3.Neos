<?php
declare(ENCODING = 'utf-8');
namespace F3\TYPO3\TypoScript\Processors;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3".                      *
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

/**
 * Testcase for the TypoScript IfProcessor
 *
 * @version $Id$
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class IfProcessorTest extends \F3\Testing\BaseTestCase {

	/**
	 * @var \F3\TYPO3\TypoScript\Processors\IfProcessor
	 */
	protected $ifProcessor;

	/**
	 * Sets up this test case
	 *
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	protected function setUp() {
		$this->ifProcessor = new \F3\TYPO3\TypoScript\Processors\IfProcessor();
	}

	/**
	 * Checks if the if() processor basically works for satisfied conditions
	 *
	 * @test
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 */
	public function ifBasicallyWorksForSatisfiedConditions() {
		$subject = 'not needed here';
		$this->ifProcessor->setCondition(TRUE);
		$this->ifProcessor->setTrueValue('I am really true!');
		$this->ifProcessor->setFalseValue('I am more than just false!');

		$expectedResult = 'I am really true!';
		$result = $this->ifProcessor->process($subject);
		$this->assertEquals($expectedResult, $result, 'The TypoScript processor "if" did not return the expected result. (condition: TRUE)');
	}

	/**
	 * Checks if the if() processor basically works for unsatisfied conditions
	 *
	 * @test
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 */
	public function ifBasicallyWorksForUnatisfiedConditions() {
		$subject = 'not needed here';
		$this->ifProcessor->setCondition(FALSE);
		$this->ifProcessor->setTrueValue('I am really true!');
		$this->ifProcessor->setFalseValue('I am more than just false!');

		$expectedResult = 'I am more than just false!';
		$result = $this->ifProcessor->process($subject);
		$this->assertEquals($expectedResult, $result, 'The TypoScript processor "if" did not return the expected result. (condition: FALSE)');
	}

	/**
	 * Checks if the if() processor throws an exception on an invalid condition
	 *
	 * @test
	 * @expectedException \F3\TypoScript\Exception
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	public function ifThrowsExceptionOnInvalidCondition() {
		$subject = 'not needed here';
		$this->ifProcessor->setCondition(NULL);
		$this->ifProcessor->setTrueValue('I am really true!');
		$this->ifProcessor->setFalseValue('I am more than just false!');

		$this->ifProcessor->process($subject);
	}

	/**
	 * Checks if the if() processor returns an empty string by default for satisfied conditions
	 *
	 * @test
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	public function trueValueIsEmptyByDefault() {
		$subject = 'not needed here';
		$this->ifProcessor->setCondition(TRUE);

		$expectedResult = '';
		$result = $this->ifProcessor->process($subject);
		$this->assertEquals($expectedResult, $result, 'The TypoScript processor "if" did not return an empty string although trueValue has not been specified. (condition: TRUE)');
	}

	/**
	 * Checks if the if() processor returns an empty string by default for unsatisfied conditions
	 *
	 * @test
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	public function falseValueIsEmptyByDefault() {
		$subject = 'not needed here';
		$this->ifProcessor->setCondition(FALSE);

		$expectedResult = '';
		$result = $this->ifProcessor->process($subject);
		$this->assertEquals($expectedResult, $result, 'The TypoScript processor "if" did not return an empty string although falseValue has not been specified. (condition: FALSE)');
	}
}
?>
