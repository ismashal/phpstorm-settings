<?php
#set( $APPLICATION_NAME_CONSTANT = ${Application_Name} )
#set( $APPLICATION_NAME_CONSTANT = $APPLICATION_NAME_CONSTANT.toUpperCase() )
#if ('' != ${Parent_Controller})
require_once( PATH_${APPLICATION_NAME_CONSTANT}_APPLICATION . '/SomeFolder/${Parent_Controller}.class.php' );
#end
#set( $REQUIRED_CLASS_PART = ${NAME} )
#set( $REQUIRED_CLASS_PART = $REQUIRED_CLASS_PART.replaceAll(".class.php", "") )

#set( $FIRST_HANDLE_FUNCTION_NAME = ${StringUtils.removeAndHump(${First_Action}, "_")} )

#if ('' != ${Second_Action})
#set( $SECOND_HANDLE_FUNCTION_NAME = ${StringUtils.removeAndHump(${Second_Action}, "_")} )
#end
class ${REQUIRED_CLASS_PART}#if ('' != ${Parent_Controller}) extends ${Parent_Controller}#end {

	public function __construct() {
		parent::__construct();
		return true;
	}

	public function initialize() {
		parent::initialize();
		return true;
	}

	final public function execute() {

		switch( ${DS}this->getRequestAction() ) {
			case NULL:
			case '${First_Action}':
				${DS}this->handle${FIRST_HANDLE_FUNCTION_NAME}();
				break;
#if ('' != ${Second_Action})

			case '${Second_Action}':
				${DS}this->handle${SECOND_HANDLE_FUNCTION_NAME}();
				break;
#end

			default:
				trigger_error( 'Application Error: Failed to handle action.', E_USER_ERROR );
				break;
		}

		return true;
	}

	private function handle${FIRST_HANDLE_FUNCTION_NAME}() {

		${DS}this->display${FIRST_HANDLE_FUNCTION_NAME}();

	}
#if ('' != ${Second_Action})

	private function handle${SECOND_HANDLE_FUNCTION_NAME}() {

		${DS}this->display${SECOND_HANDLE_FUNCTION_NAME}();

	}
#end

	private function display${FIRST_HANDLE_FUNCTION_NAME}() {

		require_once( PATH_PHP_INTERFACES . 'Interfaces.defines.php' );

		${DS}objSmarty = ${DS}this->loadSmarty( PATH_INTERFACES_${APPLICATION_NAME_CONSTANT} );

		${DS}objSmarty->assign( '${First_Action}', ${DS}this->arrmix${FIRST_HANDLE_FUNCTION_NAME} );
		${DS}objSmarty->display( PATH_INTERFACES_${APPLICATION_NAME_CONSTANT} . 'some_folder/${First_Action}.tpl' );

		return;
	}
#if ('' != ${Second_Action})
	
	private function display${SECOND_HANDLE_FUNCTION_NAME}() {

		require_once( PATH_PHP_INTERFACES . 'Interfaces.defines.php' );

		${DS}objSmarty = ${DS}this->loadSmarty( PATH_INTERFACES_${APPLICATION_NAME_CONSTANT} );
	
		${DS}objSmarty->assign( '${Second_Action}', ${DS}this->arrmix${SECOND_HANDLE_FUNCTION_NAME} );
		${DS}objSmarty->display( PATH_INTERFACES_${APPLICATION_NAME_CONSTANT} . 'some_folder/${Second_Action}.tpl' );

		return;
	}
#end

}
?>