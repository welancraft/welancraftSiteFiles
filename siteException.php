<?php

/**
 * php自定义错误
 * 
 * @author RoyenHeart
 */

/**
 * 自定义错误类型
 */
class siteException extends Exception {
    // site exception parent class
}

/**
 * 服主姓名未知
 */
class siteExpectionOwnerUnknown extends siteException {

    /* Override */ 
    function __toString() {
        echo "Oops, there may be an unknown owner <br>";
        return " Exception " . $this->getCode() . " : " . $this->getMessage() . "<br>" .
        " in " . $this->getFile() . " on line " . $this->getLine() . "<br>";
    }
}

/**
 * 服主通讯录，未找到对应记录
 */
class siteExceptionContactKeyUnknown extends siteException {

    /* Override */ 
    function __toString() {
        echo "Oops, there may be something wrong to search owner data <br>";
        return " Exception " . $this->getCode() . " : " . $this->getMessage() . "<br>" .
        " in " . $this->getFile() . " on line " . $this->getLine() . "<br>";
    }
}

?>