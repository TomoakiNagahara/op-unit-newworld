<?php
/**
 * Layout.class.php
 *
 * @creation  2017-05-09
 * @version   1.0
 * @package   unit-newworld
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Layout
 *
 * @creation  2017-02-14
 * @version   1.0
 * @package   unit-newworld
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Layout
{
	/** trait.
	 *
	 */
	use OP_CORE;

	/** Constants
	 *
	 * @var string
	 */
	const _EXECUTE_		 = 'layout-execute';
	const _DIRECTORY_	 = 'layout-dir';
	const _NAME_		 = 'layout-name';

	/** Get layout controller.
	 *
	 * @return $string
	 */
	static private function _GetLayoutController()
	{
		//	Get layout directory.
		if(!$layout_dir  = Env::Get(Layout::_DIRECTORY_)){
			$message = "Has not been set layout directory.";
			Notice::Set($message, debug_backtrace());
			return false;
		}

		//	Get layout name.
		if(!$layout_name = Env::Get(Layout::_NAME_)){
			$message = "Has not been set layout name.";
			Notice::Set($message, debug_backtrace());
			return false;
		}

		//	Get layout controller's file path.
		$directory = rtrim(ConvertPath($layout_dir),'/');
		$full_path = "{$directory}/{$layout_name}/index.php";

		//	Check exists layout controller.
		if(!file_exists($full_path)){
			$message = "Does not exists layout controller. ($full_path)";
			Notice::Set($message, debug_backtrace());
			return false;
		}

		//	...
		return $full_path;
	}

	/** Execute layout.
	 *
	 * @param string $content
	 */
	static function Run($content)
	{
		//	...
		Http::Mime('text/html');

		//	Search layout controller.
		if( $file_path = self::_GetLayoutController() ){
			//	Execute layout.
			Template::Run($file_path, ['content'=>$content]);
		}
	}
}
