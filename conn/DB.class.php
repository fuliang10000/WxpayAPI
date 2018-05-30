<?php

/**
 * DB单例
 * Class DB
 */
class DB
{
    private $host     ='localhost'; //数据库主机
    private $user     = 'root';     //数据库用户名
    private $pwd      = 'root';     //数据库用户名密码
    private $database = 'wxdevelopment'; //数据库名
    private $charset  = 'utf8';     //数据库编码，GBK,UTF8,gb2312
    private $link;                  //数据库连接标识;
    private static $_instance;      //存储对象

    /**
     * 私有的构造函数，防止外部被实例化
     */
    private function __construct()
    {
        if (!$this->link) {
            $this->link = mysqli_connect($this->host, $this->user, $this->pwd, $this->database);
        }
        $this->query("SET NAMES '{$this->charset}'");

        return $this->link;
    }

    /**
     * 私有的克隆方法，防止被克隆
     */
    private function __clone(){}

    /**
     * DB对象存储
     * @return DB
     */
    public static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /**
     * 执行query语句
     */
    public function query($sql)
    {
        $result = mysqli_query($this->link, $sql);

        return $this->link;
    }

    /**
     * 根据sql语句获取单行记录
     */
    public function getRow($sql)
    {
        $result = $this->query($sql);

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    /**
     * 根据sql语句获取多行记录
     */
    public function getRows($sql)
    {
        $result = $this->query($sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows;
    }
}