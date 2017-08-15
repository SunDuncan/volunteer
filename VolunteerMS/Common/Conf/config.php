<?php
return array(
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'volunteerms',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '907244758smy.',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'mxh_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    // 'SHOW_RUN_TIME'     => true,   // 运行时间显示
    // 'SHOW_ADV_TIME'     => true,   // 显示详细的运行时间
    // 'SHOW_DB_TIMES'     => true,   // 显示数据库查询和写入次数
    // 'SHOW_CACHE_TIMES'  => true,   // 显示缓存操作次数
    // 'SHOW_USE_MEM'      => true,   // 显示内存开销
    // 'SHOW_LOAD_FILE'    => true,   // 显示加载文件数
    // 'SHOW_FUN_TIMES'    => true ,  // 显示函数调用次数
);
