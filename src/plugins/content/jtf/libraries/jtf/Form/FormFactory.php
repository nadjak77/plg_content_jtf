<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2018 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

namespace Jtf\Form;

defined('_JEXEC') or die;

/**
 * Default factory for creating Form objects
 *
 * @since  4.0.0
 */
class FormFactory implements FormFactoryInterface
{
	/**
	 * Method to get an instance of a form.
	 *
	 * @param   string  $name     The name of the form.
	 * @param   array   $options  An array of form options.
	 *
	 * @return  Form
	 *
	 * @since   4.0.0
	 */
	public function createForm(string $name, array $options = array()): Form
	{
		return new Form($name, $options);
	}
}
