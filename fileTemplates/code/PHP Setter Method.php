## Generate method name
#set( $REQUIRED_METHOD_NAME = $FIELD_NAME )
#set( $REQUIRED_METHOD_NAME = $REQUIRED_METHOD_NAME.replaceAll("m_int|m_flt|m_dbl|m_str|m_obj|m_bool|m_mix|m_res|m_arrint|m_arrflt|m_arrdbl|m_arrstr|m_arrobj|m_arrbool|m_arrres|m_arrmix", "") )

## Modify parameter name to remove m_
#set( $REQUIRED_PARAMETER_NAME = $PARAM_NAME )
#set( $REQUIRED_PARAMETER_NAME = $REQUIRED_PARAMETER_NAME.replaceAll("m_", "") )

/**
 * @param ${TYPE_HINT} $${REQUIRED_PARAMETER_NAME}
 */
public ${STATIC} function set${REQUIRED_METHOD_NAME}(#if (${SCALAR_TYPE_HINT})${SCALAR_TYPE_HINT} #else#end$${REQUIRED_PARAMETER_NAME})
{
#if (${STATIC} == "static")
    self::$${FIELD_NAME} = $${REQUIRED_PARAMETER_NAME};
#else
    $this->${FIELD_NAME} = $${REQUIRED_PARAMETER_NAME};
#end
}
