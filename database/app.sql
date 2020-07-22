
CREATE DATABASE `ydf_mall` default character set utf8mb4 collate utf8mb4_unicode_ci;

CREATE TABLE `ydf_admin` (
  `id` int unsigned AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(64) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `mobile` varchar(32) NOT NULL DEFAULT '' COMMENT '手机号',
  `status` tinyint DEFAULT 1 COMMENT '1 = 正常 2 = 停用',
  `created_at` datetime  NULL DEFAULT NULL,
  `updated_at` datetime  NULL  DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='管理员表';

create table ydf_images (
    id int unsigned AUTO_INCREMENT comment '图片id 图片名加随机数md5',
    `name` varchar(64) not null default '' comment '图片名称',
    url varchar(255) not null default '' comment '绝对地址',
    path varchar(255) not null default '' comment '物理地址',
    id_del tinyint not null default 0 comment '0：未删除，1:删除',
    created_at datetime null default null,
    PRIMARY KEY (`id`),
    key(id_del)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='图片表';

CREATE TABLE ydf_brand (
  `id` int unsigned AUTO_INCREMENT COMMENT '品牌ID',
  name varchar(64) not null default '' comment '品牌名称',
  logo char(32) not null default '' comment '品牌LOGO 图片ID',
  sort mediumint unsigned DEFAULT 100 COMMENT '品牌排序 越小越靠前',
  `created_at` datetime  NULL DEFAULT NULL,
  `updated_at` datetime  NULL  DEFAULT NULL,
  is_del tinyint not null default 0 comment '0：未删除，1:删除',
  primary key (id),
  key (sort),
  key (is_del)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='品牌表';


create table ydf_goods_category (
    id int unsigned  auto_increment,
    pid int unsigned not null default 0 comment '上级分类id',
    name varchar(32) not null default '' comment '分类名称',
    goods_type_id int unsigned not null default 0 comment '类型id 关联 goods_type.id',
    sort mediumint unsigned not null default 0 comment '分类排序 越小越靠前',
    image_id int not null default 0 comment '分类图片ID',
    status tinyint not null default 1 comment '1:显示  2：不显示',
    created_at datetime null default null,
    updated_at datetime  NULL  DEFAULT NULL,
    primary key(id),
    key(pid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品分类表';

create table ydf_goods_type (
    id int unsigned auto_increment,
    name varchar(32) not null default '' comment '商品类型名称',
    sort mediumint unsigned not null default 0 comment '分类排序 越小越靠前',
    primary key (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品类型表';

create table ydf_goods (
    id int unsigned auto_increment,
    bn varchar(64) not null default '' comment '商品编码',
    name varchar(64) not null default '' comment '商品名称',
    brief varchar(255) not null default ''comment '商品简介',
    price decimal(10,2) not null default 0.00  COMMENT '商品价格',
    costprice decimal(10,2) not null default 0.00 COMMENT '成本价',
    mktprice decimal(10,2) not null default 0.00 COMMENT '市场价',
    image_id int not null default 0 COMMENT '默认图片 图片id',
    pics varchar(255) not null default '' comment '商品图片画册  逗号分隔',
    goods_category_id int(10) unsigned not null  default 0 COMMENT '商品分类ID 关联goods_category.id',
    goods_type_id int(10) unsigned not null  default 0 COMMENT '商品分类ID 关联goods_type.id',
    brand_id int(10) unsigned not null  default 0 COMMENT '品牌ID 关联brand.id',
    marketable tinyint(1) unsigned DEFAULT 1 COMMENT '上架标志 1=上架 2=下架',
    stock int unsigned DEFAULT '0' COMMENT '库存',
    freeze_stock int unsigned DEFAULT '0' COMMENT '冻结库存',
    weight decimal(10,2) unsigned DEFAULT NULL COMMENT '重量',
    unit varchar(20) DEFAULT NULL COMMENT '商品单位',
    introduction longtext COMMENT '商品详情',
    comments_count int(10) unsigned DEFAULT '0' COMMENT '评论次数',
    view_count int(10) unsigned DEFAULT '0' COMMENT '浏览次数',
    buy_count int(10) unsigned DEFAULT '0' COMMENT '购买次数',
    up_at datetime null DEFAULT NULL COMMENT '上架时间',
    down_at datetime null DEFAULT NULL COMMENT '下架时间',
    sort mediumint unsigned DEFAULT 100 COMMENT '商品排序 越小越靠前',
    is_recommend tinyint(1) unsigned DEFAULT '2' COMMENT '是否推荐，1是，2不是推荐',
    is_hot tinyint(1) unsigned DEFAULT '2' COMMENT '是否热门，1是，2否',
    label_ids varchar(255) not null  default '' COMMENT '标签id 逗号分隔',
    spec_list text COMMENT '商品规格-当前选中 商品销售属性:[{"key":"颜色","value":["银色","黑色"]},{"key":"容量","value":"4G"}]',
    spec_desc text COMMENT '商品规格-所有 商品销售属性:[{"key":"颜色","value":["银色","黑色"]},{"key":"容量","value":"4G"}]',
    created_at datetime  NULL DEFAULT NULL,
    updated_at datetime  NULL  DEFAULT NULL,
    is_del tinyint not null default 0 comment '0：未删除，1:删除',
    primary key (id),
    key (is_del),
    key (is_hot),
    key (is_recommend)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品表';

create table ydf_products(
    id int unsigned auto_increment,
    goods_id int unsigned not null  default 0 COMMENT '品牌ID 关联goods.id',
    barcode varchar(128) not null default '' comment '货品条码',
    sku_code varchar(128) not null default '' comment '货品条码',
    price decimal(10,2) not null default 0.00  COMMENT '商品价格',
    costprice decimal(10,2) not null default 0.00 COMMENT '成本价',
    mktprice decimal(10,2) not null default 0.00 COMMENT '市场价',
    marketable tinyint(1) unsigned DEFAULT 1 COMMENT '上架标志 1=上架 2=下架',
    stock int unsigned DEFAULT '0' COMMENT '库存',
    freeze_stock int unsigned DEFAULT '0' COMMENT '冻结库存',
    spec_params text COMMENT '商品规格 商品销售属性:[{"key":"颜色","value":["银色"]},{"key":"容量","value":"4G"}]',
    is_defalut tinyint unsigned DEFAULT 2 COMMENT '是否默认货品 1=是 2=否',
    image_id int not null default 0 COMMENT '默认图片 图片id',
    created_at datetime  NULL DEFAULT NULL,
    updated_at datetime  NULL  DEFAULT NULL,
    is_del tinyint not null default 0 comment '0：未删除，1:删除',
    primary key(id),
    key is_del (is_del),
    key (goods_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='货品表';

create table ydf_type_spec_rel (
    type_id int not null default 0 comment 'type.id',
    spec_id int not null default 0 comment 'spec.id',
    primary key(spec_id,type_id),
    key(type_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品类型-规格关联表';

create table ydf_spec (
    id int unsigned auto_increment,
    name varchar(64) not null default '' COMMENT '属性名称',
    sort mediumint unsigned not null default 0 comment '分类排序 越小越靠前',
    details varchar(255) not null default '' COMMENT '描述',
    primary key (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='产品规格-属性名称表';

create table ydf_spec_value (
    id int unsigned auto_increment,
    spec_key_id int not null default 0 comment '属性id 关联sku_key.id',
    name varchar(64) not null default '' COMMENT '属性值',
    sort mediumint unsigned not null default 0 comment '分类排序 越小越靠前',
    details varchar(255) not null default '' COMMENT '描述',
    primary key (id),
    key(spec_key_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='产品规格-属性值表';



CREATE TABLE `ydf_order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) NOT NULL COMMENT '订单ID 关联order.id',
  `goods_id` int(10) unsigned DEFAULT NULL COMMENT '商品ID 关联goods.id',
  `product_id` int(10) unsigned DEFAULT NULL COMMENT '货品ID 关联products.id',
  `sn` varchar(30) DEFAULT NULL COMMENT '货品编码',
  `bn` varchar(30) DEFAULT NULL COMMENT '商品编码',
  `name` varchar(200) DEFAULT NULL COMMENT '商品名称',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '货品价格单价',
  `costprice` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '货品成本价单价',
  `mktprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `image_url` varchar(100) NOT NULL COMMENT '图片',
  `nums` smallint(5) unsigned DEFAULT NULL COMMENT '数量',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '总价',
  `promotion_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品优惠总金额',
  `promotion_list` varchar(5000) NOT NULL COMMENT '促销信息',
  `weight` decimal(10,2) DEFAULT NULL COMMENT '总重量',
  `sendnums` smallint(5) unsigned DEFAULT NULL COMMENT '发货数量',
  `addon` text COMMENT '货品明细序列号存储',
  `utime` bigint(12) unsigned DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单明细表';

CREATE TABLE `ydf_user_addr` (
  `id` int(10) unsigned AUTO_INCREMENT,
  `user_id` int(10) unsigned not null default 0 COMMENT '用户id 关联user.id',
  `area_id` int(10) unsigned not null default 0 COMMENT '收货地区ID',
  `address` varchar(200) not null default '' COMMENT '收货详细地址',
  `name` varchar(50) not null default '' COMMENT '收货人姓名',
  `mobile` char(15) not null default '' COMMENT '收货电话',
  `updated_at` datetime  NULL DEFAULT NULL,
  `is_def` tinyint(1) unsigned DEFAULT NULL COMMENT '是否默认 1=默认 2=不默认',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='收获地址表';

CREATE TABLE `ydf_logistics` (
  `id` int(10) unsigned AUTO_INCREMENT,
  `logi_name` varchar(30) DEFAULT '' COMMENT '物流公司名称',
  `logi_code` varchar(50) DEFAULT '' COMMENT '物流公司编码',
  `sort` tinyint(3) unsigned DEFAULT '100' COMMENT '排序 越小越靠前',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `logi_code` (`logi_code`) USING BTREE,
  KEY `sort` (`sort`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='物流公司表';

CREATE TABLE `ydf_ship` (
  `id` int(11) unsigned AUTO_INCREMENT,
  `type` tinyint(1) not null default 1 comment '1:按重量算，2：按件算',
  `name` varchar(50) DEFAULT '' COMMENT '配送方式名称',
  `has_cod` tinyint(1) unsigned DEFAULT '1' COMMENT '是否货到付款 1=不是货到付款 2=是货到付款',
  `firstunit` mediumint(8) unsigned DEFAULT 0 COMMENT '首重',
  `continueunit` mediumint(8) unsigned DEFAULT 0 COMMENT '续重',
  `def_area_fee` tinyint(1) unsigned DEFAULT '1' COMMENT '按地区设置配送费用是否启用默认配送费用 1=启用 2=不启用',
  `area_type` tinyint(1) unsigned DEFAULT '1' COMMENT '地区类型 1=全部地区 2=指定地区',
  `firstunit_price` decimal(10,2) unsigned DEFAULT 0.00 COMMENT '首重费用',
  `continueunit_price` decimal(10,2) unsigned DEFAULT 0.00 COMMENT '续重费用',
  `logi_name` varchar(50) DEFAULT  ''  COMMENT '物流公司名称',
  `logi_code` varchar(50) DEFAULT  ''  COMMENT '物流公司编码',
  `is_def` tinyint unsigned DEFAULT '2' COMMENT '是否默认 1=默认 2=不默认',
  `sort` mediumint unsigned DEFAULT '100' COMMENT '配送方式排序 越小越靠前',
  `status` tinyint unsigned DEFAULT '1' COMMENT '状态 1=正常 2=停用',
  `free_postage` tinyint(1) unsigned DEFAULT '2' COMMENT '是否包邮，1包邮，2不包邮',
  `area_fee` text COMMENT '地区配送费用 数据格式 [[{"area_id":[],"firstunit":"","continueunit":"","firstunit_price":"","continueunit_price":""}]]',
  `goodsmoney` decimal(20,2) DEFAULT '0.00' COMMENT '商品总额满多少免运费',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `sort` (`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='物流模板表';

CREATE TABLE `ydf_promotion` (
  `id` int unsigned AUTO_INCREMENT,
  `name` varchar(64) NOT NULL default '' COMMENT '促销名称',
  `exclusive` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '排他，1不排他，2排他',
  `status` tinyint NOT NULL DEFAULT 1 COMMENT '启用状态，1开启，2关闭',
  `condition_code` varchar(64) not null  default '' comment '促销条件编码 如 GOODS_ALL(所有商品),GOODS_IDS(指定商品),ORDER_FULL(订单满减)',
  `condition_params` text  comment '促销参数',
  `result_code` varchar(64) not null  default '' comment '促销结果编码 如 GOODS_DISCOUNT(指定商品X折) ORDER_REDUCE(订单减多少钱) ',
  `result_params` text  comment '促销结果参数',
  `desc` text comment '促销描述',
  `sort` mediumint unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `start_time` datetime  NULL DEFAULT NULL COMMENT '开始时间',
  `end_time` datetime  NULL DEFAULT NULL COMMENT '结束时间',
   delete_at  datetime  NULL DEFAULT NULL COMMENT '删除时间',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='促销表';

create table ydf_coupon(
    id int unsigned AUTO_INCREMENT,
    type tinyint not null default 0 comment '优惠卷类型；0->全场赠券；1->会员赠券；2->购物赠券；3->注册赠券',
    name varchar(64) not null default '' comment '优惠券名称',
    use_key tinyint not null default 0 comment '使用场景 0->全场通用；1->指定分类；2->指定商品',
    use_value text comment '使用场景对应的指定分类或者商品的id  逗号分隔',
    amount decimal(10,2) not null default 0.00 comment '金额',
    per_limit tinyint unsigned not null default 0 comment '每人限领数量',
    min_point decimal(10,2) not null default 0.00 comment '使用门槛；0表示无门槛',
    start_time datetime  NULL DEFAULT NULL COMMENT '开始时间',
    end_time datetime  NULL DEFAULT NULL COMMENT '结束时间',
    note varchar(255) not null default '' comment '备注',
    publish_count int not null default 0 comment '发放数量',
    use_count int not null default 0 comment '使用数量',
    receive_count int not null default 0 comment '领取数量',
    code varchar(64) not null default '' comment '优惠码',
    enable_time datetime NULL DEFAULT NULL COMMENT '可领取的截止日期',
    status tinyint(1) NULL DEFAULT 1 COMMENT '状态 1:正常 2:禁用',
    created_at datetime  NULL DEFAULT NULL,
    updated_at datetime  NULL  DEFAULT NULL,
    primary key (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='优惠券表';

create table ydf_coupon_log(
   id int unsigned AUTO_INCREMENT,
   coupon_id int not null default 0 comment '优惠券id',
   user_id int not null default 0 comment '用户id',
   order_id int not null default 0 comment '订单id',
   coupon_code varchar(64) not null default '' comment '优惠码',
   user_nickname varchar(64) not null default '' comment '领取人昵称',
   get_type  int not null default 1 comment '获取类型：0->后台赠送；1->主动获取',
   create_time datetime  NULL DEFAULT NULL comment '创建时间',
   use_status tinyint not null default 0  comment '使用状态：0->未使用；1->已使用；2->已过期',
   use_time datetime  NULL DEFAULT NULL comment '使用时间',
   order_sn varchar(128) not null default ''  comment '订单号码',
   primary key (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='优惠券记录表';

CREATE TABLE `ydf_cart` (
    id int unsigned auto_increment,
    goods_id int not null default 0 comment 'goods.id',
    product_id int not null default 0 comment 'product.id',
    user_id  int not null default 0 comment 'user.id',
    cartgory_id int not null default 0 comment '分类id',
    nums int not null default 0 comment '购买数量',
    price decimal(10,2) not null default 0.00 comment '加入购入车时的价格',
    goods_pic int not null default 0 comment '商品主图',
    goods_name varchar(128) not null default '' comment '商品名称',
    goods_brand varchar(128) not null default '' comment '商品品牌',
    goods_sn varchar(128) not null default '' comment '商品条码',
    goods_brief varchar(128) not null default '' comment '商品简介',
    user_nickname varchar(128) not null default '' comment '用户昵称',
    product_sku_code varchar(128) not null default '' comment '商品sku码',
    product_spec text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
    created_at datetime  NULL DEFAULT NULL,
    updated_at datetime  NULL  DEFAULT NULL,
    deleted_at datetime  NULL  DEFAULT NULL,
    primary key (id),
    key (user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='购物车表';


CREATE TABLE `ydf_order` (
  `order_id` varchar(32) NOT NULL COMMENT '订单号 日期字符串+微秒+3位随机数生成',
  `total_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '订单总金额',
  `payed_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '应付金额（实际支付金额）',
   freight_amount decimal(10,2) unsigned NOT NULL DEFAULT '0.00' comment '运费金额',
   promotion_amount decimal(10,2) unsigned NOT NULL DEFAULT '0.00' comment '促销优化金额（促销价、满减、阶梯价）',
   coupon_amount decimal(10,2) unsigned NOT NULL DEFAULT '0.00' comment '优惠券抵扣金额',
  `pay_status` tinyint(1) unsigned DEFAULT '1' COMMENT '支付状态 1=未付款 2=已付款 3=部分付款 4=部分退款 5=已退款',
  `ship_status` tinyint(1) unsigned DEFAULT '1' COMMENT '发货状态 1=未发货 2=部分发货 3=已发货 4=部分退货 5=已退货',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '订单状态 1=正常 2=完成 3=取消',
   order_type tinyint not null default 1 comment '1->普通订单 2:秒杀 3：拼团',
  `payment_time` datetime  NULL DEFAULT NULL COMMENT '支付时间',
  `confirm_time` datetime  NULL DEFAULT NULL COMMENT '支付时间',
  `logistics_id` varchar(20) DEFAULT NULL COMMENT '配送方式ID 关联ship.id',
  `logistics_name` varchar(50) DEFAULT NULL COMMENT '配送方式名称',
  `cost_freight` decimal(6,2) unsigned DEFAULT '0.00' COMMENT '配送费用',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户ID 关联user.id',
  `confirm` tinyint unsigned DEFAULT '1' COMMENT '售后状态 1=未确认收货 2=已确认收货',
  `ship_area_code` varchar(16) DEFAULT '' COMMENT '收货地区code',
  `ship_address` varchar(200) DEFAULT NULL COMMENT '收货详细地址',
  `ship_name` varchar(50) DEFAULT NULL COMMENT '收货人姓名',
  `ship_mobile` varchar(32) DEFAULT NULL COMMENT '收货电话',
  `weight` int unsigned DEFAULT '0' COMMENT '商品总重量 单位（克）',
  `order_pmt` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '订单优惠金额',
  `goods_pmt` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '商品优惠金额',
  `coupon_pmt` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '优惠券优惠额度',
  `coupon_list` varchar(1024) DEFAULT NULL COMMENT '优惠券信息 存json [{"coupon_id":"","coupon_log_id":""}]',
  `promotion_list` varchar(1024) DEFAULT NULL COMMENT '促销优惠信息 存 [{"romotion_id":"促销id","name":"促销名称","desc":"促销描述"}]',
  `memo` varchar(255) DEFAULT NULL COMMENT '买家备注',
  `ip` varchar(50) DEFAULT NULL COMMENT '下单IP',
  `mark` varchar(510) DEFAULT NULL COMMENT '卖家备注',
  `is_comment` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '是否评论，1未评论，2已评论',
  created_at datetime  NULL DEFAULT NULL,
  updated_at datetime  NULL  DEFAULT NULL,
  deleted_at datetime  NULL  DEFAULT NULL comment '删除时间',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单表';

create table ydf_order_item(
    id int unsigned not null auto_increment,
    order_id varchar(32) not null default '' comment '订单号',
    goods_id int not null default 0 comment '商品id',
    product_id int not null default 0 comment '产品id',
    `sn` varchar(30) not null DEFAULT '' COMMENT '货品编码',
    `bn` varchar(30) not null DEFAULT '' COMMENT '商品编码',
    goods_pic int not null default 0 comment '商品主图',
    goods_name varchar(128) not null default '' comment '商品名称',
    goods_brand varchar(128) not null default '' comment '商品品牌',
    price decimal(10,2) not null default 0.00  COMMENT '商品价格',
    costprice decimal(10,2) not null default 0.00 COMMENT '成本价',
    mktprice decimal(10,2) not null default 0.00 COMMENT '市场价',
    nums int not null default 0 comment '商品数量',
    amount decimal(10,2) unsigned not null default 0.00 comment '总价',
    promotion_amount decimal(10,2) unsigned not null default 0.00 comment '该商品优惠总金额',
   `coupon_list` varchar(1024) DEFAULT NULL COMMENT '优惠券信息 存json {"coupon_id":"","coupon_log_id":""}',
   `promotion_list` varchar(1024) DEFAULT NULL COMMENT '促销优惠信息 存 {"romotion_id":"促销id","name":"促销名称","desc":"促销描述"}',
    `weight` decimal(10,2) DEFAULT NULL COMMENT '总重量',
    `sendnums` smallint(5) unsigned DEFAULT NULL COMMENT '发货数量',
    product_spec text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
    created_at datetime  NULL DEFAULT NULL,
    updated_at datetime  NULL  DEFAULT NULL,
    primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单明细表';

create table ydf_aftersales(
    `id` varchar(32) NOT NULL COMMENT '售后单id 日期字符串+as+微秒+3位随机数生成',
    order_id varchar(32) not null default '' comment '订单id',
    order_items_id varchar(32) not null default '' comment '订单明细表id',
    goods_id int not null default 0 comment '商品id',
    product_id int not null default 0 comment '产品id',
    `sn` varchar(30) not null DEFAULT '' COMMENT '货品编码',
    `bn` varchar(30) not null DEFAULT '' COMMENT '商品编码',
    goods_pic int not null default 0 comment '商品主图',
    goods_name varchar(128) not null default '' comment '商品名称',
    nums int not null default 0 comment '商品数量',
    user_id int not null default 0 comment '用户id',
    type tinyint not null default 1 comment '售后类型 1->只退款 2->退货退款',
    refund decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '退款金额',
    `status` tinyint unsigned DEFAULT '1' COMMENT '状态 0=待提交 1=未审核 2=审核通过 3=审核拒绝',
    product_spec text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
    `reason` varchar(255) NOT NULL default '' COMMENT '退款原因',
    `desc` varchar(255) not null default '' comment '描述',
    `images` text comment '用户上传图片 逗号分隔',
    admin_mark varchar(500) not null default '' comment '管理员备注',
    handle_time datetime  NULL DEFAULT NULL comment '管理员处理时间',
    created_at datetime  NULL DEFAULT NULL,
    updated_at datetime  NULL  DEFAULT NULL,
    primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='售后表';

CREATE TABLE `jshop_bill_delivery` (
  `id` varchar(32) NOT NULL COMMENT '售后单id 日期字符串+dl+微秒+3位随机数生成',
  `logi_name` varchar(50) DEFAULT NULL COMMENT '物流公司名称',
  `logi_code` varchar(50) DEFAULT NULL COMMENT '物流公司编码',
  `logi_no` varchar(50) DEFAULT NULL COMMENT '物流单号',
  `logi_information` longtext COMMENT '快递物流信息',
  `logi_status` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '0快递信息可能更新  1快递信息不更新了',
  `ship_area_code` int(10) unsigned DEFAULT NULL COMMENT '收货地区code',
  `ship_address` varchar(200) DEFAULT NULL COMMENT '收货详细地址',
  `ship_name` varchar(50) DEFAULT NULL COMMENT '收货人姓名',
  `ship_mobile` char(15) DEFAULT NULL COMMENT '收货电话',
  `confirm_time` bigint(12) unsigned DEFAULT NULL COMMENT '确认收货时间',
  `status` tinyint(1) unsigned DEFAULT '2' COMMENT '状态 1=准备发货 2=已发货 3=已确认 4=其他',
  `desc` varchar(255) not null  DEFAULT '' COMMENT '备注',
  created_at datetime  NULL DEFAULT NULL,
  updated_at datetime  NULL  DEFAULT NULL,
  last_logi_at datetime  NULL  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='发货单表';

CREATE TABLE `jshop_bill_delivery_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_id` varchar(32) NOT NULL COMMENT '发货单号 关联bill_delivery.id',
  `goods_id` int unsigned NOT NULL default 0,
  `product_id` int unsigned NOT NULL default 0,
  `sn` varchar(32) NOT NULL default '',
  `bn` varchar(32) NOT NULL default '',
  `name` varchar(128) NOT NULL default '',
  `nums` int unsigned DEFAULT NULL COMMENT '发货数量',
  `weight` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
   product_spec text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='发货单详情表';

CREATE TABLE `jshop_bill_delivery_order_rel` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `order_id` varchar(32) DEFAULT NULL COMMENT '订单号',
  `delivery_id` varchar(32) DEFAULT NULL COMMENT '发货单号',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `delivery_id` (`delivery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='发货单订单关联表';

CREATE TABLE `ydf_delivery` (
  `id` varchar(32) NOT NULL COMMENT '发货单id 日期字符串+dl+微秒+3位随机数生成',
  `order_id` varchar(32) DEFAULT NULL COMMENT '订单号',
  `logi_name` varchar(50) DEFAULT NULL COMMENT '物流公司名称',
  `logi_code` varchar(50) DEFAULT NULL COMMENT '物流公司编码',
  `logi_no` varchar(50) DEFAULT NULL COMMENT '物流单号',
  `logi_information` longtext COMMENT '快递物流信息',
  `logi_status` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '0快递信息可能更新  1快递信息不更新了',
  `ship_area_code` int(10) unsigned DEFAULT NULL COMMENT '收货地区code',
  `ship_address` varchar(200) DEFAULT NULL COMMENT '收货详细地址',
  `ship_name` varchar(50) DEFAULT NULL COMMENT '收货人姓名',
  `ship_mobile` char(15) DEFAULT NULL COMMENT '收货电话',
  `confirm_time` bigint(12) unsigned DEFAULT NULL COMMENT '确认收货时间',
  `status` tinyint(1) unsigned DEFAULT '2' COMMENT '状态 1=准备发货 2=已发货 3=已确认 4=其他',
  `desc` varchar(255) not null  DEFAULT '' COMMENT '备注',
  created_at datetime  NULL DEFAULT NULL,
  updated_at datetime  NULL  DEFAULT NULL,
  last_logi_at datetime  NULL  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='发货单表';

CREATE TABLE `ydf_delivery_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_id` varchar(32) NOT NULL COMMENT '发货单号 关联bill_delivery.id',
  `goods_id` int unsigned NOT NULL default 0,
  `product_id` int unsigned NOT NULL default 0,
  `sn` varchar(32) NOT NULL default '',
  `bn` varchar(32) NOT NULL default '',
  `name` varchar(128) NOT NULL default '',
  `nums` int unsigned DEFAULT NULL COMMENT '发货数量',
  `weight` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
   product_spec text comment '商品销售属性:[{"key":"颜色","value":"银色"},{"key":"容量","value":"4G"}]',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='发货单详情表';



/*
[{"area_value":"[{\"id\":\"110000\",\"pid\":\"-1\",\"name\":\"\u5317\u4eac\u5e02\",\"ischecked\":\"1\"},{\"id\":\"120000\",\"pid\":\"-1\",\"name\":\"\u5929\u6d25\u5e02\",\"ischecked\":\"1\"},{\"id\":\"130000\",\"pid\":\"-1\",\"name\":\"\u6cb3\u5317\u7701\",\"ischecked\":\"1\"},{\"id\":\"140000\",\"pid\":\"-1\",\"name\":\"\u5c71\u897f\u7701\",\"ischecked\":\"1\"}]","area":"110000,110100,110101,110102,110105,110106,110107,110108,110109,110111,110112,110113,110114,110115,110116,110117,110118,110119,120000,120100,120101,120102,120103,120104,120105,120106,120110,120111,120112,120113,120114,120115,120116,120117,120118,120119,130000,130100,130101,130102,130104,130105,130107,130108,130109,130110,130111,130121,130123,130125,130126,130127,130128,130129,130130,130131,130132,130133,130183,130184,130200,130201,130202,130203,130204,130205,130207,130208,130209,130223,130224,130225,130227,130229,130281,130283,130300,130301,130302,130303,130304,130306,130321,130322,130324,130400,130401,130402,130403,130404,130406,130421,130423,130424,130425,130426,130427,130428,130429,130430,130431,130432,130433,130434,130435,130481,130500,130501,130502,130503,130521,130522,130523,130524,130525,130526,130527,130528,130529,130530,130531,130532,130533,130534,130535,130581,130582,130600,130601,130602,130606,130607,130608,130609,130623,130624,130626,130627,130628,130629,130630,130631,130632,130633,130634,130635,130636,130637,130638,130681,130683,130684,130700,130701,130702,130703,130705,130706,130708,130709,130722,130723,130724,130725,130726,130727,130728,130730,130731,130732,130800,130801,130802,130803,130804,130821,130822,130823,130824,130825,130826,130827,130828,130900,130901,130902,130903,130921,130922,130923,130924,130925,130926,130927,130928,130929,130930,130981,130982,130983,130984,131000,131001,131002,131003,131022,131023,131024,131025,131026,131028,131081,131082,131100,131101,131102,131103,131121,131122,131123,131124,131125,131126,131127,131128,131182,139000,139001,139002,140000,140100,140101,140105,140106,140107,140108,140109,140110,140121,140122,140123,140181,140200,140201,140202,140203,140211,140212,140221,140222,140223,140224,140225,140226,140227,140300,140301,140302,140303,140311,140321,140322,140400,140401,140402,140411,140421,140423,140424,140425,140426,140427,140428,140429,140430,140431,140481,140500,140501,140502,140521,140522,140524,140525,140581,140600,140601,140602,140603,140621,140622,140623,140624,140700,140701,140702,140721,140722,140723,140724,140725,140726,140727,140728,140729,140781,140800,140801,140802,140821,140822,140823,140824,140825,140826,140827,140828,140829,140830,140881,140882,140900,140901,140902,140921,140922,140923,140924,140925,140926,140927,140928,140929,140930,140931,140932,140981,141000,141001,141002,141021,141022,141023,141024,141025,141026,141027,141028,141029,141030,141031,141032,141033,141034,141081,141082,141100,141101,141102,141121,141122,141123,141124,141125,141126,141127,141128,141129,141130,141181,141182","firstunit_area_price":"5","continueunit_area_price":"1","exp":"5 + (ceil(abs(w-500)\/500) * 1)"},{"area_value":"[{\"id\":\"150000\",\"pid\":\"-1\",\"name\":\"\u5185\u8499\u53e4\u81ea\u6cbb\u533a\",\"ischecked\":\"1\"},{\"id\":\"210000\",\"pid\":\"-1\",\"name\":\"\u8fbd\u5b81\u7701\",\"ischecked\":\"1\"},{\"id\":\"220000\",\"pid\":\"-1\",\"name\":\"\u5409\u6797\u7701\",\"ischecked\":\"1\"},{\"id\":\"230000\",\"pid\":\"-1\",\"name\":\"\u9ed1\u9f99\u6c5f\u7701\",\"ischecked\":\"1\"}]","area":"150000,150100,150101,150102,150103,150104,150105,150121,150122,150123,150124,150125,150200,150201,150202,150203,150204,150205,150206,150207,150221,150222,150223,150300,150301,150302,150303,150304,150400,150401,150402,150403,150404,150421,150422,150423,150424,150425,150426,150428,150429,150430,150500,150501,150502,150521,150522,150523,150524,150525,150526,150581,150600,150601,150602,150603,150621,150622,150623,150624,150625,150626,150627,150700,150701,150702,150703,150721,150722,150723,150724,150725,150726,150727,150781,150782,150783,150784,150785,150800,150801,150802,150821,150822,150823,150824,150825,150826,150900,150901,150902,150921,150922,150923,150924,150925,150926,150927,150928,150929,150981,152200,152201,152202,152221,152222,152223,152224,152500,152501,152502,152522,152523,152524,152525,152526,152527,152528,152529,152530,152531,152900,152921,152922,152923,210000,210100,210101,210102,210103,210104,210105,210106,210111,210112,210113,210114,210115,210123,210124,210181,210200,210201,210202,210203,210204,210211,210212,210213,210214,210224,210281,210283,210300,210301,210302,210303,210304,210311,210321,210323,210381,210400,210401,210402,210403,210404,210411,210421,210422,210423,210500,210501,210502,210503,210504,210505,210521,210522,210600,210601,210602,210603,210604,210624,210681,210682,210700,210701,210702,210703,210711,210726,210727,210781,210782,210800,210801,210802,210803,210804,210811,210881,210882,210900,210901,210902,210903,210904,210905,210911,210921,210922,211000,211001,211002,211003,211004,211005,211011,211021,211081,211100,211101,211102,211103,211104,211122,211200,211201,211202,211204,211221,211223,211224,211281,211282,211300,211301,211302,211303,211321,211322,211324,211381,211382,211400,211401,211402,211403,211404,211421,211422,211481,220000,220100,220101,220102,220103,220104,220105,220106,220112,220113,220122,220182,220183,220200,220201,220202,220203,220204,220211,220221,220281,220282,220283,220284,220300,220301,220302,220303,220322,220323,220381,220382,220400,220401,220402,220403,220421,220422,220500,220501,220502,220503,220521,220523,220524,220581,220582,220600,220601,220602,220605,220621,220622,220623,220681,220700,220701,220702,220721,220722,220723,220781,220800,220801,220802,220821,220822,220881,220882,222400,222401,222402,222403,222404,222405,222406,222424,222426,230000,230100,230101,230102,230103,230104,230108,230109,230110,230111,230112,230113,230123,230124,230125,230126,230127,230128,230129,230183,230184,230200,230201,230202,230203,230204,230205,230206,230207,230208,230221,230223,230224,230225,230227,230229,230230,230231,230281,230300,230301,230302,230303,230304,230305,230306,230307,230321,230381,230382,230400,230401,230402,230403,230404,230405,230406,230407,230421,230422,230500,230501,230502,230503,230505,230506,230521,230522,230523,230524,230600,230601,230602,230603,230604,230605,230606,230621,230622,230623,230624,230700,230701,230702,230703,230704,230705,230706,230707,230708,230709,230710,230711,230712,230713,230714,230715,230716,230722,230781,230800,230801,230803,230804,230805,230811,230822,230826,230828,230881,230882,230883,230900,230901,230902,230903,230904,230921,231000,231001,231002,231003,231004,231005,231025,231081,231083,231084,231085,231086,231100,231101,231102,231121,231123,231124,231181,231182,231200,231201,231202,231221,231222,231223,231224,231225,231226,231281,231282,231283,232700,232721,232722,232723","firstunit_area_price":"0","continueunit_area_price":"0","exp":"0 + (ceil(abs(w-500)\/500) * 0)"}]
*/













