
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
    id int unsigned AUTO_INCREMENT '图片id 图片名加随机数md5',
    `name` varchar(64) not null default '' comment '图片名称',
    url varchar(255) not null default '' comment '绝对地址',
    path varchar(255) not null default '' comment '物理地址',
    id_del tinyint not null default 0 comment '0：未删除，1:删除',
    created_at datetime null default null,
    PRIMARY KEY (`id`),
    key(id_del)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='图片表';

CREATE TABLE ydf_barnd (
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
    spec_key_ids varchar(255) not null  default '' COMMENT 'sku属性id串 逗号分隔',
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
    sn varchar(64) not null default '' comment '商品编码',
    price decimal(10,2) not null default 0.00  COMMENT '商品价格',
    costprice decimal(10,2) not null default 0.00 COMMENT '成本价',
    mktprice decimal(10,2) not null default 0.00 COMMENT '市场价',
    marketable tinyint(1) unsigned DEFAULT 1 COMMENT '上架标志 1=上架 2=下架',
    stock int unsigned DEFAULT '0' COMMENT '库存',
    freeze_stock int unsigned DEFAULT '0' COMMENT '冻结库存',
    sku_select_ids varchar(255) not null  default '' COMMENT 'sku属性id串 逗号分隔',
    is_defalut tinyint unsigned DEFAULT 2 COMMENT '是否默认货品 1=是 2=否',
    image_id int not null default 0 COMMENT '默认图片 图片id',
    created_at datetime  NULL DEFAULT NULL,
    updated_at datetime  NULL  DEFAULT NULL,
    is_del tinyint not null default 0 comment '0：未删除，1:删除',
    primary key(id),
    key is_del (is_del),
    key (goods_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='货品表';

create table ydf_sku_select(
    id int unsigned auto_increment,
    product_id int unsigned not null  default 0 COMMENT '产品id 关联products.id',
    spec_value_ids int unsigned not null  default 0 COMMENT '规格属性值id 关联spec_value.id',
    primary key (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='货品-sku 选项值表';

create table ydf_spec_key (
    id int unsigned auto_increment,
    type_id int not null default 0 comment '类型id 关联 goods_type.id',
    name varchar(64) not null default '' COMMENT '属性名称',
    details varchar(255) not null default '' COMMENT '描述',
    primary key (id),
    key(type_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='产品规格-属性名称表';

create table ydf_spec_value (
    id int unsigned auto_increment,
    spec_key_id int not null default 0 comment '属性id 关联sku_key.id',
    name varchar(64) not null default '' COMMENT '属性名称',
    details varchar(255) not null default '' COMMENT '描述',
    primary key (id),
    key(spec_key_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='产品规格-属性值表';




