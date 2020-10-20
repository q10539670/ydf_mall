-- noinspection SqlNoDataSourceInspectionForFile

CREATE DATABASE `ydf_mall` default character set utf8mb4 collate utf8mb4_unicode_ci;

CREATE TABLE `ydf_admin`
(
    `id`         int unsigned AUTO_INCREMENT COMMENT '用户ID',
    `username`   varchar(64)  NOT NULL DEFAULT '' COMMENT '用户名',
    `password`   varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
    `mobile`     varchar(32)  NOT NULL DEFAULT '' COMMENT '手机号',
    `status`     tinyint               DEFAULT 1 COMMENT '1 = 正常 2 = 停用',
    `created_at` datetime     NULL     DEFAULT NULL,
    `updated_at` datetime     NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='管理员表';

create table ydf_images
(
    id         int unsigned AUTO_INCREMENT comment '图片id 图片名加随机数md5',
    `name`     varchar(64)  not null default '' comment '图片名称',
    url        varchar(255) not null default '' comment '绝对地址',
    path       varchar(255) not null default '' comment '物理地址',
    id_del     tinyint      not null default 0 comment '0：未删除，1:删除',
    created_at datetime     null     default null,
    PRIMARY KEY (`id`),
    key (id_del)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='图片表';


CREATE TABLE ydf_brand
(
    `id`         int unsigned AUTO_INCREMENT COMMENT '品牌ID',
    name         varchar(64) not null default '' comment '品牌名称',
    logo         int         not null default 0 comment '品牌LOGO 图片ID',
    sort         mediumint unsigned   DEFAULT 100 COMMENT '品牌排序 越小越靠前',
    `created_at` datetime    NULL     DEFAULT NULL,
    `updated_at` datetime    NULL     DEFAULT NULL,
    is_del       tinyint     not null default 0 comment '0：未删除，1:删除',
    primary key (id),
    key (sort),
    key (is_del)
) ENGINE = InnoDB
  AUTO_INCREMENT = 16
  DEFAULT CHARSET = utf8mb4 COMMENT ='品牌表';


create table ydf_goods_category
(
    id            int unsigned auto_increment,
    pid           int unsigned       not null default 0 comment '上级分类id',
    name          varchar(32)        not null default '' comment '分类名称',
    goods_type_id int unsigned       not null default 0 comment '类型id 关联 goods_type.id',
    sort          mediumint unsigned not null default 0 comment '分类排序 越小越靠前',
    image_id      int                not null default 0 comment '分类图片ID',
    image_top_id  int                not null default 0 comment '顶部图片ID',
    status        tinyint            not null default 1 comment '1:显示  2：不显示',
    created_at    datetime           null     default null,
    updated_at    datetime           NULL     DEFAULT NULL,
    primary key (id),
    key (pid)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='商品分类表';

-- 2020-09-29
-- alter table ydf_goods_category add image_top_id  int not null default 0 comment '顶部图片ID' after image_id;


create table ydf_goods_type
(
    id   int unsigned auto_increment,
    name varchar(32)        not null default '' comment '商品类型名称',
    sort mediumint unsigned not null default 0 comment '分类排序 越小越靠前',
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='商品类型表';

create table ydf_goods
(
    id                int unsigned auto_increment,
    bn                varchar(64)    not null default '' comment '商品编码',
    name              varchar(64)    not null default '' comment '商品名称',
    brief             varchar(255)   not null default '' comment '商品简介',
    price             decimal(10, 2) not null default 0.00 COMMENT '商品价格',
    costprice         decimal(10, 2) not null default 0.00 COMMENT '成本价',
    mktprice          decimal(10, 2) not null default 0.00 COMMENT '市场价',
    freight_price     decimal(10, 2) not null default 0.00 COMMENT '单件运费',
    image_id          int            not null default 0 COMMENT '默认图片 图片id',
    pics              varchar(255)   not null default '' comment '商品图片画册  逗号分隔',
    goods_category_id int unsigned   not null default 0 COMMENT '商品分类ID 关联goods_category.id',
    goods_type_id     int unsigned   not null default 0 COMMENT '商品分类ID 关联goods_type.id',
    brand_id          int unsigned   not null default 0 COMMENT '品牌ID 关联brand.id',
    marketable        tinyint unsigned        DEFAULT 1 COMMENT '上架标志 1=上架 2=下架',
    stock             int unsigned            DEFAULT '0' COMMENT '库存',
    freeze_stock      int unsigned            DEFAULT '0' COMMENT '冻结库存',
    weight            decimal(10, 2) unsigned DEFAULT NULL COMMENT '重量',
    unit              varchar(20)             DEFAULT NULL COMMENT '商品单位',
    introduction      longtext COMMENT '商品详情',
    comments_count    int unsigned            DEFAULT '0' COMMENT '评论次数',
    view_count        int unsigned            DEFAULT '0' COMMENT '浏览次数',
    buy_count         int unsigned            DEFAULT '0' COMMENT '购买次数',
    up_at             datetime       null     DEFAULT NULL COMMENT '上架时间',
    down_at           datetime       null     DEFAULT NULL COMMENT '下架时间',
    sort              mediumint unsigned      DEFAULT 100 COMMENT '商品排序 越小越靠前',
    is_recommend      tinyint unsigned        DEFAULT '2' COMMENT '是否推荐，1是，2不是推荐',
    is_hot            tinyint unsigned        DEFAULT '2' COMMENT '是否热门，1是，2否',
    is_selected       tinyint unsigned        DEFAULT '2' COMMENT '是否精选，1是，2否',
    label_ids         varchar(255)   not null default '' COMMENT '标签id 逗号分隔',
    spec_list         text COMMENT '商品规格-当前选中 商品销售属性:[{"key":"颜色","value":["银色","黑色"]},{"key":"容量","value":"4G"}]',
    spec_desc         text COMMENT '商品规格-所有 商品销售属性:[{"key":"颜色","value":["银色","黑色"]},{"key":"容量","value":"4G"}]',
    created_at        datetime       NULL     DEFAULT NULL,
    updated_at        datetime       NULL     DEFAULT NULL,
    is_del            tinyint        not null default 0 comment '0：未删除，1:删除',
    primary key (id),
    key (is_del),
    key (is_hot),
    key (is_recommend)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='商品表';

create table ydf_products
(
    id            int unsigned auto_increment,
    goods_id      int unsigned   not null default 0 COMMENT '品牌ID 关联goods.id',
    sn            varchar(128)   not null default '' comment '商品编码',
    sku_code      varchar(128)   not null default '' comment '货品条码',
    price         decimal(10, 2) not null default 0.00 COMMENT '商品价格',
    costprice     decimal(10, 2) not null default 0.00 COMMENT '成本价',
    mktprice      decimal(10, 2) not null default 0.00 COMMENT '市场价',
    freight_price decimal(10, 2) not null default 0.00 COMMENT '单件运费',
    marketable    tinyint unsigned        DEFAULT 1 COMMENT '上架标志 1=上架 2=下架',
    stock         int unsigned            DEFAULT '0' COMMENT '库存',
    freeze_stock  int unsigned            DEFAULT '0' COMMENT '冻结库存',
    spec_params   text COMMENT '商品规格 商品销售属性:[{"key":"颜色","value":["银色"]},{"key":"容量","value":"4G"}]',
    is_default    tinyint unsigned        DEFAULT 2 COMMENT '是否默认货品 1=是 2=否',
    image_id      int            not null default 0 COMMENT '默认图片 图片id',
    created_at    datetime       NULL     DEFAULT NULL,
    updated_at    datetime       NULL     DEFAULT NULL,
    is_del        tinyint        not null default 0 comment '0：未删除，1:删除',
    primary key (id),
    key is_del (is_del),
    key (goods_id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='货品表';
alter table ydf_products
    add freight_price decimal(10, 2) not null default 0.00 COMMENT '单件运费' after mktprice;

create table ydf_type_spec_rel
(
    type_id int not null default 0 comment 'type.id',
    spec_id int not null default 0 comment 'spec.id',
    primary key (spec_id, type_id),
    key (type_id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='商品类型-规格关联表';

create table ydf_spec
(
    id      int unsigned auto_increment,
    name    varchar(64)        not null default '' COMMENT '属性名称',
    sort    mediumint unsigned not null default 0 comment '分类排序 越小越靠前',
    details varchar(255)       not null default '' COMMENT '描述',
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='产品规格-属性名称表';

create table ydf_spec_value
(
    id          int unsigned auto_increment,
    spec_key_id int                not null default 0 comment '属性id 关联sku_key.id',
    name        varchar(64)        not null default '' COMMENT '属性值',
    sort        mediumint unsigned not null default 0 comment '分类排序 越小越靠前',
    details     varchar(255)       not null default '' COMMENT '描述',
    primary key (id),
    key (spec_key_id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='产品规格-属性值表';

CREATE TABLE `ydf_order`
(
    `order_id`       varchar(128)            NOT NULL COMMENT '订单号 日期字符串+微秒+3位随机数生成',
    `total_amount`   decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '订单总金额',
    `payed_amount`   decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '应付金额（实际支付金额）',
    freight_amount   decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' comment '运费金额',
    promotion_amount decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' comment '促销优化金额（促销价、满减、阶梯价）',
    coupon_amount    decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' comment '优惠券抵扣金额',
    `pay_status`     tinyint(1) unsigned              DEFAULT '1' COMMENT '支付状态 1=未付款 2=已付款 3=部分付款 4=部分退款 5=已退款',
    `ship_status`    tinyint(1) unsigned              DEFAULT '1' COMMENT '发货状态 1=未发货 2=部分发货 3=已发货 4=部分退货 5=已退货',
    `status`         tinyint(1) unsigned              DEFAULT '1' COMMENT '订单状态 1=正常 2=完成 3=取消',
     order_type       tinyint                 not null default 1 comment '1->普通订单 2:秒杀 3：拼团',
    `payment_time`   datetime                NULL     DEFAULT NULL COMMENT '支付时间',
    `confirm_time`   datetime                NULL     DEFAULT NULL COMMENT '支付时间',
    `logistics_id`   varchar(20)                      DEFAULT NULL COMMENT '配送方式ID 关联ship.id',
    `logistics_name` varchar(50)                      DEFAULT NULL COMMENT '配送方式名称',
    `user_id`        int(10) unsigned                 DEFAULT NULL COMMENT '用户ID 关联user.id',
    `confirm`        tinyint unsigned                 DEFAULT '1' COMMENT '售后状态 1=未确认收货 2=已确认收货',
    `ship_area_code` varchar(16)                      DEFAULT '0' COMMENT '收货地区code',
    `ship_address`   varchar(200)                     DEFAULT NULL COMMENT '收货详细地址',
    `ship_name`      varchar(50)                      DEFAULT NULL COMMENT '收货人姓名',
    `ship_mobile`    varchar(32)                      DEFAULT NULL COMMENT '收货电话',
    `weight`         decimal(10, 2)                   DEFAULT '0.00' COMMENT '商品总重量 单位（克）',
    `order_pmt`      decimal(10, 2) unsigned          DEFAULT '0.00' COMMENT '订单优惠金额',
    `goods_pmt`      decimal(10, 2) unsigned          DEFAULT '0.00' COMMENT '商品优惠金额',
    `coupon_pmt`     decimal(10, 2) unsigned          DEFAULT '0.00' COMMENT '优惠券优惠额度',
    `coupon_list`    varchar(1024)                    DEFAULT NULL COMMENT '优惠券信息 存json [{"coupon_id":"","coupon_log_id":""，"details":""}]',
    `promotion_list` varchar(1024)                    DEFAULT NULL COMMENT '促销优惠信息 存 [{"romotion_id":"促销id","name":"促销名称","desc":"促销描述"}]',
    `saleinfo_param` varchar(128)    NOT NULL DEFAULT '' comment '分销参数',
    `memo`           varchar(255)                     DEFAULT NULL COMMENT '买家备注',
    `ip`             varchar(50)                      DEFAULT NULL COMMENT '下单IP',
    `mark`           varchar(510)                     DEFAULT NULL COMMENT '卖家备注',
    `is_comment`     tinyint unsigned        NOT NULL DEFAULT '1' COMMENT '是否评论，1未评论，2已评论',
    created_at       datetime                NULL     DEFAULT NULL,
    updated_at       datetime                NULL     DEFAULT NULL,
    is_del           tinyint                 not null default 0 comment '0：未删除，1:删除',
    PRIMARY KEY (`order_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='订单表';
-- alter table ydf_order add `coupon_pmt`      decimal(10, 2) unsigned          DEFAULT '0.00' COMMENT '订单优惠金额' after weight;
-- alter table ydf_order add `goods_pmt`      decimal(10, 2) unsigned          DEFAULT '0.00' COMMENT '订单优惠金额' after weight;
-- alter table ydf_order add `order_pmt`      decimal(10, 2) unsigned          DEFAULT '0.00' COMMENT '订单优惠金额' after weight;

CREATE TABLE `ydf_order_items`
(
    `id`               int(10) unsigned        NOT NULL AUTO_INCREMENT,
    `order_id`         varchar(20)             NOT NULL COMMENT '订单ID 关联order.id',
    `goods_id`         int(10) unsigned                 DEFAULT NULL COMMENT '商品ID 关联goods.id',
    `product_id`       int(10) unsigned                 DEFAULT NULL COMMENT '货品ID 关联products.id',
    `sn`               varchar(30)                      DEFAULT NULL COMMENT '货品编码',
    `bn`               varchar(30)                      DEFAULT NULL COMMENT '商品编码',
    `name`             varchar(200)                     DEFAULT NULL COMMENT '商品名称',
    `price`            decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '货品价格单价',
    `costprice`        decimal(10, 2) unsigned          DEFAULT '0.00' COMMENT '货品成本价单价',
    `mktprice`         decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '市场价',
    `image_url`        varchar(100)            NOT NULL COMMENT '图片',
    `nums`             smallint(5) unsigned             DEFAULT NULL COMMENT '数量',
    `amount`           decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '总价',
    `payed_amount`           decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '实际支付金额',
    `promotion_amount` decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '促销优惠金额',
    `coupon_amount` decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品优惠总金额',
    `promotion_list`   varchar(5000)           NOT NULL COMMENT '促销信息',
    `weight`           decimal(10, 2)                   DEFAULT NULL COMMENT '总重量',
    `sendnums`         smallint(5) unsigned             DEFAULT NULL COMMENT '发货数量',
    `addon`            text COMMENT '货品明细序列号存储',
    `utime`            bigint(12) unsigned              DEFAULT NULL COMMENT '更新时间',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='订单明细表';

CREATE TABLE `ydf_user_address`
(
    `id`         int(10) unsigned AUTO_INCREMENT,
    `user_id`    int(10) unsigned not null default 0 COMMENT '用户id 关联user.id',
    `area_id`    int(10) unsigned not null default 0 COMMENT '收货地区ID',
    `address`    varchar(200)     not null default '' COMMENT '收货详细地址',
    `name`       varchar(50)      not null default '' COMMENT '收货人姓名',
    `mobile`     char(15)         not null default '' COMMENT '收货电话',
    `updated_at` datetime         NULL     DEFAULT NULL,
    `is_def`     tinyint unsigned not null DEFAULT 2 COMMENT '是否默认 1=默认 2=不默认',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='收获地址表';

CREATE TABLE `ydf_logistics`
(
    `id`        int(10) unsigned AUTO_INCREMENT,
    `logi_name` varchar(30)         DEFAULT '' COMMENT '物流公司名称',
    `logi_code` varchar(50)         DEFAULT '' COMMENT '物流公司编码',
    `sort`      tinyint(3) unsigned DEFAULT '100' COMMENT '排序 越小越靠前',
    PRIMARY KEY (`id`) USING BTREE,
    UNIQUE KEY `logi_code` (`logi_code`) USING BTREE,
    KEY `sort` (`sort`) USING BTREE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='物流公司表';

CREATE TABLE `ydf_ship`
(
    `id`                 int(11) unsigned AUTO_INCREMENT,
    `type`               tinyint(1) not null     default 1 comment '1:按重量算，2：按件算',
    `name`               varchar(50)             DEFAULT '' COMMENT '配送方式名称',
    `has_cod`            tinyint(1) unsigned     DEFAULT '1' COMMENT '是否货到付款 1=不是货到付款 2=是货到付款',
    `firstunit`          mediumint(8) unsigned   DEFAULT 0 COMMENT '首重',
    `continueunit`       mediumint(8) unsigned   DEFAULT 0 COMMENT '续重',
    `def_area_fee`       tinyint(1) unsigned     DEFAULT '1' COMMENT '按地区设置配送费用是否启用默认配送费用 1=启用 2=不启用',
    `area_type`          tinyint(1) unsigned     DEFAULT '1' COMMENT '地区类型 1=全部地区 2=指定地区',
    `firstunit_price`    decimal(10, 2) unsigned DEFAULT 0.00 COMMENT '首重费用',
    `continueunit_price` decimal(10, 2) unsigned DEFAULT 0.00 COMMENT '续重费用',
    `logi_name`          varchar(50)             DEFAULT '' COMMENT '物流公司名称',
    `logi_code`          varchar(50)             DEFAULT '' COMMENT '物流公司编码',
    `is_def`             tinyint unsigned        DEFAULT '2' COMMENT '是否默认 1=默认 2=不默认',
    `sort`               mediumint unsigned      DEFAULT '100' COMMENT '配送方式排序 越小越靠前',
    `status`             tinyint unsigned        DEFAULT '1' COMMENT '状态 1=正常 2=停用',
    `free_postage`       tinyint(1) unsigned     DEFAULT '2' COMMENT '是否包邮，1包邮，2不包邮',
    `area_fee`           text COMMENT '地区配送费用 数据格式 [[{"area_id":[],"firstunit":"","continueunit":"","firstunit_price":"","continueunit_price":""}]]',
    `goodsmoney`         decimal(20, 2)          DEFAULT '0.00' COMMENT '商品总额满多少免运费',
    PRIMARY KEY (`id`) USING BTREE,
    KEY `sort` (`sort`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='物流模板表';

CREATE TABLE `ydf_promotion`
(
    `id`               int unsigned AUTO_INCREMENT,
    `name`             varchar(64)        NOT NULL default '' COMMENT '促销名称',
    `exclusive`        tinyint unsigned   NOT NULL DEFAULT '1' COMMENT '排他，1不排他，2排他',
    `status`           tinyint            NOT NULL DEFAULT 1 COMMENT '启用状态，1开启，2关闭',
    `condition_code`   varchar(64)        not null default '' comment '促销条件编码 如 GOODS_ALL(所有商品),GOODS_IDS(指定商品),ORDER_FULL(订单满减)',
    `condition_params` text comment '促销参数',
    `result_code`      varchar(64)        not null default '' comment '促销结果编码 如 GOODS_DISCOUNT(指定商品X折) ORDER_REDUCE(订单减多少钱)',
    `result_params`    text comment '促销结果参数 ',
    `description`      text comment '促销描述',
    `sort`             mediumint unsigned NOT NULL DEFAULT '100' COMMENT '排序',
    `start_time`       datetime           NULL     DEFAULT NULL COMMENT '开始时间',
    `end_time`         datetime           NULL     DEFAULT NULL COMMENT '结束时间',
    is_del             tinyint            not null default 0 comment '0：未删除，1:删除',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='促销表';

create table ydf_coupon
(
    id            int unsigned AUTO_INCREMENT,
    type          tinyint          not null default 0 comment '优惠卷类型；0->全场赠券；1->会员赠券；2->购物赠券；3->注册赠券',
    name          varchar(64)      not null default '' comment '优惠券名称',
    use_key       tinyint          not null default 0 comment '使用场景 0->全场通用；1->指定分类；2->指定商品',
    use_value     text comment '使用场景对应的指定分类或者商品的id  逗号分隔',
    amount        decimal(10, 2)   not null default 0.00 comment '金额',
    per_limit     tinyint unsigned not null default 0 comment '每人限领数量',
    min_point     decimal(10, 2)   not null default 0.00 comment '使用门槛；0表示无门槛',
    start_time    datetime         NULL     DEFAULT NULL COMMENT '开始时间',
    end_time      datetime         NULL     DEFAULT NULL COMMENT '结束时间',
    note          varchar(255)     not null default '' comment '备注',
    publish_count int              not null default 0 comment '发放数量',
    use_count     int              not null default 0 comment '使用数量',
    receive_count int              not null default 0 comment '领取数量',
    stock_count   int              not null default 0 comment '剩余数量',
    code          varchar(64)      not null default '' comment '优惠码',
    pull_start_time datetime         NULL     DEFAULT NULL COMMENT '可领取的开始日期',
    pull_end_time datetime         NULL     DEFAULT NULL COMMENT '可领取的截止日期',
    enable_time   datetime         NULL     DEFAULT NULL COMMENT '可领取的截止日期',
    status        tinyint(1)       NULL     DEFAULT 1 COMMENT '状态 1:正常 2:禁用',
    created_at    datetime         NULL     DEFAULT NULL,
    updated_at    datetime         NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='优惠券表';

create table ydf_coupon_log
(
    id          int unsigned AUTO_INCREMENT,
    coupon_id   int          not null default 0 comment '优惠券id',
    user_id     int          not null default 0 comment '用户id',
    order_id    int          not null default 0 comment '订单id',
    coupon_code varchar(64)  not null default '' comment '优惠码',
    get_type    int          not null default 1 comment '获取类型：0->后台赠送；1->主动获取',
    create_at   datetime     NULL     DEFAULT NULL comment '创建时间',
    use_status  tinyint      not null default 0 comment '使用状态：0->未使用；1->已使用；2->已过期',
    use_time    datetime     NULL     DEFAULT NULL comment '使用时间',
    expire_at   datetime     NULL     DEFAULT NULL comment '过期时间',
    order_sn    varchar(128) not null default '' comment '订单号码',
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='优惠券记录表';
alter table ydf_coupon_log
    add expire_at datetime NULL DEFAULT NULL comment '过期时间' after use_time;

CREATE TABLE `ydf_cart`
(
    id               int unsigned auto_increment,
    goods_id         int            not null default 0 comment 'goods.id',
    product_id       int            not null default 0 comment 'product.id',
    user_id          int            not null default 0 comment 'user.id',
    category_id      int            not null default 0 comment '分类id',
    nums             int            not null default 0 comment '购买数量',
    marketable       tinyint unsigned        DEFAULT 1 COMMENT '上架标志 1=上架 2=下架',
    price_now        decimal(10, 2) not null default 0.00 comment '当前价格',
    price            decimal(10, 2) not null default 0.00 comment '加入购入车时的价格',
    goods_pic_url    varchar(255)   not null default '' comment '商品主图',
    goods_name       varchar(128)   not null default '' comment '商品名称',
    goods_brand      varchar(128)   not null default '' comment '商品品牌',
    goods_sn         varchar(128)   not null default '' comment '商品条码',
    goods_brief      varchar(128)   not null default '' comment '商品简介',
    user_nickname    varchar(128)   not null default '' comment '用户昵称',
    product_sku_code varchar(128)   not null default '' comment '商品sku码',
    product_spec     text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
    created_at       datetime       NULL     DEFAULT NULL,
    updated_at       datetime       NULL     DEFAULT NULL,
    is_del           tinyint        not null default 0 comment '0：未删除，1:删除',
    primary key (id),
    key (user_id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='购物车表';
alter table ydf_cart add marketable tinyint unsigned DEFAULT 1 COMMENT '上架标志 1=上架 2=下架' after nums;
alter table ydf_cart add price_now decimal(10, 2) not null default 0.00 comment '当前价格' after marketable;

create table ydf_order_item
(
    id               int unsigned            not null auto_increment,
    order_id         varchar(128)            not null default '' comment '订单号',
    goods_id         int                     not null default 0 comment '商品id',
    product_id       int                     not null default 0 comment '产品id',
    `sn`             varchar(30)             not null DEFAULT '' COMMENT '货品编码',
    `bn`             varchar(30)             not null DEFAULT '' COMMENT '商品编码',
    goods_pic_url    varchar(255)            not null default '' comment '商品主图',
    goods_name       varchar(128)            not null default '' comment '商品名称',
    goods_brand      varchar(128)            not null default '' comment '商品品牌',
    price            decimal(10, 2)          not null default 0.00 COMMENT '商品价格',
    costprice        decimal(10, 2)          not null default 0.00 COMMENT '成本价',
    mktprice         decimal(10, 2)          not null default 0.00 COMMENT '市场价',
    nums             int                     not null default 0 comment '商品数量',
    total_amount     decimal(10, 2) unsigned not null default 0.00 comment '子订单总金额',
    payed_amount     decimal(10, 2) unsigned not null default 0.00 comment '实际金额=总金额-优惠金额',
    promotion_amount decimal(10, 2) unsigned not null default 0.00 comment '该商品优惠总金额',
    `coupon_list`    varchar(1024)                    DEFAULT NULL COMMENT '优惠券信息 存json {"coupon_id":"","coupon_log_id":""}',
    `promotion_list` varchar(1024)                    DEFAULT NULL COMMENT '促销优惠信息 存 {"romotion_id":"促销id","name":"促销名称","desc":"促销描述"}',
    `weight`         decimal(10, 2)                   DEFAULT NULL COMMENT '总重量',
    `sendnums`       smallint(5) unsigned             DEFAULT NULL COMMENT '发货数量',
    product_spec     text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
    created_at       datetime                NULL     DEFAULT NULL,
    updated_at       datetime                NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='订单明细表';

create table ydf_aftersales
(
    `id`           varchar(128)            NOT NULL COMMENT '售后单id 日期字符串+as+微秒+3位随机数生成',
    order_id       varchar(128)            not null default '' comment '订单id',
    order_items_id int                     not null default 0 comment '订单明细表id',
    goods_id       int                     not null default 0 comment '商品id',
    product_id     int                     not null default 0 comment '产品id',
    `sn`           varchar(30)             not null DEFAULT '' COMMENT '货品编码',
    `bn`           varchar(30)             not null DEFAULT '' COMMENT '商品编码',
    goods_name     varchar(128)            not null default '' comment '商品名称',
    goods_pic_url  varchar(255)            not null default '' comment '商品主图',
    nums           int                     not null default 0 comment '商品数量',
    user_id        int                     not null default 0 comment '用户id',
    type           tinyint                 not null default 1 comment '售后类型 1->只退款 2->退货退款',
    refund         decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '退款金额',
    `status`       tinyint unsigned                 DEFAULT '1' COMMENT '状态 0=待提交 1=未审核 2=审核通过 3=审核拒绝',
    product_spec   text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
    `reason`       varchar(255)            NOT NULL default '' COMMENT '退款原因',
    `user_desc`    varchar(255)            not null default '' comment '描述',
    `images`       text comment '用户上传图片 逗号分隔',
    is_del         tinyint                 not null default 0 comment '0：未删除，1:删除',
    admin_mark     varchar(500)            not null default '' comment '管理员备注',
    handle_time    datetime                NULL     DEFAULT NULL comment '管理员处理时间',
    created_at     datetime                NULL     DEFAULT NULL,
    updated_at     datetime                NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='售后表';

create table ydf_mall_amount_log
(
    `id`       int(10) unsigned        NOT NULL AUTO_INCREMENT,
    type       tinyint                 not null default 0 comment '1=>收入 2=>支出',
    kind       tinyint                 not null default 0 comment '11=>购买商品收入 21=>佣金支出 22=>退款支出',
    money      decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '金额',
    content    text comment '',
    content2    text comment '',
    created_at datetime                NULL     DEFAULT NULL,
    updated_at datetime                NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='店铺流水表';

CREATE TABLE `ydf_delivery`
(
    `id`               varchar(32)      NOT NULL COMMENT '发货单id 日期字符串+dl+微秒+3位随机数生成',
    order_id           varchar(32)               DEFAULT NULL COMMENT '订单号',
    `logi_name`        varchar(50)               DEFAULT NULL COMMENT '物流公司名称',
    `logi_code`        varchar(50)               DEFAULT NULL COMMENT '物流公司编码',
    `logi_no`          varchar(50)               DEFAULT NULL COMMENT '物流单号',
    `logi_information` longtext COMMENT '快递物流信息',
    `logi_status`      tinyint unsigned NOT NULL DEFAULT '0' COMMENT '0=>快递信息可能更新  1=>快递信息不更新了',
    `ship_area_code`   int(10) unsigned          DEFAULT NULL COMMENT '收货地区code',
    `ship_address`     varchar(200)              DEFAULT NULL COMMENT '收货详细地址',
    `ship_name`        varchar(50)               DEFAULT NULL COMMENT '收货人姓名',
    `ship_mobile`      char(15)                  DEFAULT NULL COMMENT '收货电话',
    `confirm_time`     bigint(12) unsigned       DEFAULT NULL COMMENT '确认收货时间',
    `status`           tinyint(1) unsigned       DEFAULT '2' COMMENT '状态 1=准备发货 2=已发货 3=已确认 4=其他',
    `desc`             varchar(255)     not null DEFAULT '' COMMENT '备注',
    created_at         datetime         NULL     DEFAULT NULL,
    updated_at         datetime         NULL     DEFAULT NULL,
    last_logi_at       datetime         NULL     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='发货单表';

CREATE TABLE `ydf_delivery_items`
(
    `id`          int(10) unsigned        NOT NULL AUTO_INCREMENT,
    `delivery_id` varchar(32)             NOT NULL COMMENT '发货单号 关联bill_delivery.id',
    `goods_id`    int unsigned            NOT NULL default 0,
    `product_id`  int unsigned            NOT NULL default 0,
    `goods_name`  varchar(128)            NOT NULL default '',
    goods_pic_url varchar(255)            not null default '' comment '商品主图',
    `sn`          varchar(32)             NOT NULL default '',
    `bn`          varchar(32)             NOT NULL default '',
    `nums`        int unsigned                     DEFAULT NULL COMMENT '发货数量',
    `weight`      decimal(10, 2) unsigned NOT NULL DEFAULT '0.00',
    product_spec  text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
    PRIMARY KEY (`id`) USING BTREE,
    KEY `id` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='发货单详情表';

create table ydf_search_log
(
    id         int         not null auto_increment,
    user_id    int         not null default 0 comment '搜索用户id',
    keywords   varchar(32) not null default '' comment '搜索关键词',
    is_delete  tinyint     not null default 0 comment '用户是否删除 0=>未删除 1=>已删除',
    is_finish  tinyint     not null default 0 comment '此记录是否分析 0=>未分析  1=>已分析',
    created_at datetime    NULL     DEFAULT NULL,
    updated_at datetime    NULL     DEFAULT NULL,
    primary key (id),
    key (user_id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='用户搜索历史';

create table ydf_search_hot_keywords
(
    id         int         not null auto_increment,
    type       int         not null default 0 comment '1=>系统添加  2=>后台添加',
    is_show    tinyint     not null default 0 comment '是否展示在热门搜索（后台手动标记） 0=>不展示 1=>展示',
    is_hot     tinyint     not null default 0 comment '是否热门（系统自动标记） 0=>非热门 1=>热门',
    num        int         not null default 0 comment '热门值 每条记录+1',
    sort       int unsigned         DEFAULT 100 COMMENT '品牌排序 越小越靠前',
    keywords   varchar(32) not null default '' comment '搜索关键词',
    is_delete  tinyint     not null default 0 comment '',
    created_at datetime    NULL     DEFAULT NULL,
    updated_at datetime    NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='热门关键字';

create table ydf_lunbo
(
    id            int          not null auto_increment,
    name          varchar(128) not null default '' comment '名称',
    type          tinyint      not null default 0 comment '0=>图片 1=>视频',
    location_type tinyint      not null default 0 comment '0=>首页顶部轮播图',
    path          varchar(256) not null default '' comment '跳转路径',
    sort          int unsigned          DEFAULT 100 COMMENT '品牌排序 越小越靠前',
    is_show       tinyint      not null default 0 comment '是否展示 0=>不展示 1=>展示',
    image_id      int          not null default 0 comment '资源id',
    start_at      datetime     NULL     DEFAULT NULL comment '展示的开始时间',
    end_at        datetime     NULL     DEFAULT NULL comment '展示的截止时间',
    is_delete     tinyint      not null default 0 comment '0=>未删除  1=>删除',
    created_at    datetime     NULL     DEFAULT NULL,
    updated_at    datetime     NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='轮播图';
alter table ydf_lunbo
    add location_type tinyint not null default 0 comment '0=>首页顶部轮播图' after type;


CREATE TABLE `ydf_user_bankcards`
(
    `id`           int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID号',
    `user_id`      int unsigned not null DEFAULT 0 COMMENT '用户ID',
    `bank_name`    varchar(64)  not null DEFAULT '' COMMENT '银行名称',
    `bank_code`    varchar(32)  not null DEFAULT '' COMMENT '银行缩写',
    `bank_area_id` int unsigned not null DEFAULT 0 COMMENT '账号地区ID',
    `account_bank` varchar(255) not null DEFAULT '' COMMENT '开户行',
    `account_name` varchar(60)  not null DEFAULT '' COMMENT '账户名',
    `card_number`  varchar(30)  not null DEFAULT '' COMMENT '卡号',
    `card_type`    tinyint               DEFAULT '1' COMMENT '银行卡类型: 1=储蓄卡 2=信用卡',
    `is_default`   tinyint unsigned      DEFAULT '2' COMMENT '默认卡 1=默认 2=不默认',
    created_at     datetime     NULL     DEFAULT NULL,
    updated_at     datetime     NULL     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='用户银行卡表';

create table ydf_user
(
    id            int          not null auto_increment,
    openid        varchar(64)  not null default '' comment 'openid',
    nickname      varchar(64)  not null default '' comment '昵称',
    avatar        varchar(255) not null default '' comment '头像',
    mobile        varchar(32)  not null default '' comment '手机号',
    sex           tinyint      not null default 0 comment '1=>男， 2=>女',
    session_key   varchar(128) not null default '' comment '小程序的session_key',
    unique_code   varchar(32)  not null default '' comment '身份码',
    saler_info_id int          not null default 0 comment '分销详情id',
    status        tinyint      not null default 1 comment '1=>正常， 2=>禁用',
    created_at    datetime     NULL     DEFAULT NULL,
    updated_at    datetime     NULL     DEFAULT NULL,
    userinfo_at    datetime     NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='用户表';
  alter table ydf_user add userinfo_at    datetime     NULL     DEFAULT NULL after updated_at;
alter table ydf_user
    add saler_info_id int not null default 0 comment '分销详情id' after sex;
alter table ydf_user
    add session_key   varchar(128) not null default '' comment '小程序的session_key' after sex;


create table ydf_user_saler_info
(
    id                        int                     not null auto_increment,
    user_id                   int                     not null default 0 comment 'user.id',
    openid                    varchar(64)             not null default '' comment 'openid',
    totoal_amount             decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '累计收益金额',
    received_amount           decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '已提现金额',
    store_amount              decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '剩余可提现金额',
    wait_amount_today         decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '今日待到账金额',
    wait_amount_total         decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '累计待到账金额',
    plan_amount_last_month    decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '上月预估收入金额',
    plan_amount_current_month decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '本月预估收入金额',
    created_at                datetime                NULL     DEFAULT NULL,
    updated_at                datetime                NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='用户表-分销账户表';

CREATE TABLE `ydf_sale_items`
(
    id              int unsigned            NOT NULL AUTO_INCREMENT COMMENT 'ID号',
    order_id        varchar(32)             not null default '' comment '订单id',
    order_phone     varchar(32)             not null default '' comment '下单者手机号',
    order_items_id  int         not null default 0 comment '订单明细表id',
    goods_id        int                     not null default 0 comment '商品id',
    product_id      int                     not null default 0 comment '产品id',
    buyer_user_id   int                     not null default 0 comment '购买者user_id',
    share_user_id   int                     not null default 0 comment '分享者user_id',
    goods_pic_url   varchar(255)            not null default '' comment '商品主图',
    goods_name      varchar(128)            not null default '' comment '商品名称',
    nums            int                     not null default 0 comment '商品数量',
    pay_amount      decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '扣除优惠的实际支付金额',
    rate            decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '分销提成比率',
    allocate_amount decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '分销提成金额',
    status          tinyint                 not null default 0 comment '-1=>已失效  1=>未结算（未收货） 2=>未结算（已收货） 11=>已结算  ',
    content         varchar(255)            not null default '' comment '备注',
    created_at      datetime                NULL     DEFAULT NULL,
    updated_at      datetime                NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT =' 分销商品结算表 ';

CREATE TABLE `ydf_sale_amount_change_log`
(
    id         int unsigned            NOT NULL AUTO_INCREMENT COMMENT '',
    type       tinyint                 not null default 1 comment '1=>结算收入  2=>提现支出',
    user_id    int                     not null default 0 comment 'user.id',
    params     varchar(255)            not null default '' comment '',
    amount     decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT '金额数量',
    created_at datetime                NULL     DEFAULT NULL,
    primary key (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='用户账户金额变动表';

create table ydf_sale_cashout
(
    id             int unsigned            NOT NULL AUTO_INCREMENT COMMENT '',
    cashout_id     varchar(128)            not null default '' comment '提现单id 日期字符串+as+微秒+3位随机数生成',
    user_id        int unsigned            not null DEFAULT 0 COMMENT ' 用户ID ',
    type           int unsigned            not null default 1 comment '1=>银行卡 2=>微信余额 ',
    bankcard_id    int                     not null default 0 comment ' 银行卡id ',
    apply_amount   decimal(10, 2) unsigned NOT NULL DEFAULT '0.00' COMMENT ' 提现金额 ',
    status         tinyint                 not null default 0 comment '0=>已申请 1=>发放成功 2=>发放失败 3=>拒绝 ',
    pay_return_msg varchar(128)            not null default '' comment '付款返回信息',
    pay_detail     text comment '付款详情',
    content        text comment '备注',
    created_at     datetime                NULL     DEFAULT NULL,
    updated_at     datetime                NULL     DEFAULT NULL,
    apply_at       datetime                NULL     DEFAULT NULL comment '付款时间',
    primary key (id),
    key (cashout_id),
    key (user_id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT =' 佣金提现记录表 ';



