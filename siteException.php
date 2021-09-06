<?php

/**
 * 网页错误
 * @author RoyenHeart
 */

class siteException extends \Exception {
    // site exception parent class
}

class siteExpectionOwnerUnknown extends siteException {
    // the owner's name is not known
}

class siteExceptionContactKeyUnknown extends siteException {
    // put undefined key when get contact'data
}

?>