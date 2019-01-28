<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2018 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

namespace Jtf\Form\Field;

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for the Joomla Platform.
 * Supports a URL text field
 *
 * @link    http://www.w3.org/TR/html-markup/input.url.html#input.url
 * @see     JFormRuleUrl for validation of full urls
 * @since   3.0.0
 */
class UrlField extends TextField
{
	/**
	 * The form field type.
	 *
	 * @var     string
	 * @since   3.0.0
	 */
	protected $type = 'Url';

	/**
	 * Name of the layout being used to render the field
	 *
	 * @var     string
	 * @since   3.0.0
	 */
	protected $layout = 'joomla.form.field.url';

	/**
	 * Method to get the field input markup.
	 *
	 * @return   string  The field input markup.
	 * @since    3.0.0
	 */
	protected function getInput()
	{
		// Trim the trailing line in the layout file
		return rtrim($this->getRenderer($this->layout)->render($this->getLayoutData()), PHP_EOL);
	}

	/**
	 * Method to get the data to be passed to the layout for rendering.
	 *
	 * @return   array
	 * @since    3.0.0
	 */
	protected function getLayoutData()
	{
		$data = parent::getLayoutData();

		// Initialize some field attributes.
		$maxLength    = !empty($this->maxLength) ? ' maxlength="' . $this->maxLength . '"' : '';

		// Note that the input type "url" is suitable only for external URLs, so if internal URLs are allowed
		// we have to use the input type "text" instead.
		$inputType    = $this->element['relative'] ? 'type="text"' : 'type="url"';

		$extraData = array(
			'maxLength' => $maxLength,
			'inputType' => $inputType,
		);

		return array_merge($data, $extraData);
	}
}
