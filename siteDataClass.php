<?php

/**
 * 数据对象声明
 * 
 * @author RoyenHeart
 */

/**
 * 服主通讯录类
 */
class Owner {

    private $index = array();

    /**
     * 给定 name，mail，phone，qq 参数添加记录
     */
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

    /**
     * 通过键名寻找通讯录对应数据
     */
    public function getData($key) {
        if (!empty($this->index[$key])) {
            return $this->index[$key];
        } else {
            throw new siteExceptionContactKeyUnknown();
        }
    }

    /**
     * 销毁
     */
    public function __destruct() {
        
    }
    
}

?>