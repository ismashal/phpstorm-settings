## Generate method name
#set( $REQUIRED_METHOD_NAME = $FIELD_NAME )
#set( $REQUIRED_METHOD_NAME = $REQUIRED_METHOD_NAME.replaceAll("m_int|m_flt|m_dbl|m_str|m_obj|m_bool|m_mix|m_res|m_arrint|m_arrflt|m_arrdbl|m_arrstr|m_arrobj|m_arrbool|m_arrres|m_arrmix", "") )

/**
 * @return ${TYPE_HINT}
 */
public ${STATIC} function ${GET_OR_IS}${REQUIRED_METHOD_NAME}()#if(${RETURN_TYPE}): ${RETURN_TYPE}#else#end
{
#if (${STATIC} == "static")
    return self::$${FIELD_NAME};
#else
    return $this->${FIELD_NAME};
#end
}
