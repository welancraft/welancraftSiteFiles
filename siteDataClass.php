<?php

/**
 * 数据对象声明
 * 
 * @author RoyenHeart
 */

/**
 * 服主通讯录
 */
class Owner {

    private $index = array();

    public function __construct($name, $mail, $phone, $qq) {
        if (empty($name)) {
            throw new siteExpectionOwnerUnknown();
        } else {
            $this->index['name'] = $name;
            $this->index['mail'] = (!empty($mail))?$mail:'unknown';
            $this->index['phone'] = (!empty($phone))?$phone:'unknown';
            $this->index['qq'] = (!empty($qq))?$qq:'unknown';
        }
    }

    public function getData($key) {
        if (!empty($this->index[$key])) {
            return $this->index[$key];
        } else {
            throw new siteExceptionContactKeyUnknown();
        }
    }

    public function __destruct() {
        
    }
    
}

?>