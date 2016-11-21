<?php
/**
 * Prado class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link https://github.com/pradosoft/prado4
 * @copyright Copyright &copy; 2005-2016 The PRADO Group
 * @license https://github.com/pradosoft/prado4/blob/master/LICENSE
 * @package Prado
 */

namespace Prado;

/**
 * Prado class.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package Prado
 * @since 3.0
 */
class Prado extends PradoBase
{
}

Prado::init();

/**
 * Defines Prago in global namespace
 */
class_alias('\Prado\Prado', 'Prado', true);