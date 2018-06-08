## This will show @var CArTransaction
#if( $NAME.toLowerCase().contains('m_obj') )
	#set( $REQUIRED_CLASS_PART = ${NAME} )
	#set( $REQUIRED_CLASS_PART = $REQUIRED_CLASS_PART.replaceAll("m_obj", "") )
	#set( $REQUIRED_CLASS_PART = "C$REQUIRED_CLASS_PART" )
#else
	#set( $REQUIRED_CLASS_PART = "" )
#end
 
## This will show @var CArTransaction[]
#if( $NAME.toLowerCase().contains('m_arrobj') )
	#set( $REQUIRED_CLASS_PART = ${NAME} )
	#set( $REQUIRED_CLASS_PART = $REQUIRED_CLASS_PART.replaceAll("m_arrobj", "") )
 
	## Logic to singularize.
	#set ($stringLength = $REQUIRED_CLASS_PART.length() - 1)
	#set ($REQUIRED_CLASS_PART = $REQUIRED_CLASS_PART.substring(0,$stringLength))
	#set( $ARRAY_PART = "[]" )
	#set( $REQUIRED_CLASS_PART = "C$REQUIRED_CLASS_PART$ARRAY_PART" ) 
#end
/**
 * ${TYPE_TAG} ${REQUIRED_CLASS_PART} ${TYPE_HINT}
 */