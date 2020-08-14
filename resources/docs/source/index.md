---
title: API Reference

language_tabs:
- bash
- javascript
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://192.168.0.178:8888/docs/collection.json)

<!-- END_INFO -->

#AmountChange

余额变动表
<!-- START_cb4656c77f02f5d2babb4efca025ea31 -->
## index
余额变动表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/amount?current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/amount"
);

let params = {
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/amount',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "amountChanges": {
            "current_page": 1,
            "data": [],
            "first_page_url": "\/?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/amount`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `mobile` |  optional  | 手机号
    `nickname` |  optional  | 昵称
    `type` |  optional  | 类型[1:结算收入 2:提现支出]
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_cb4656c77f02f5d2babb4efca025ea31 -->

#Brand

品牌接口
<!-- START_18df6ca144e03eda0d60577e923b468c -->
## index
品牌列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/brand?condition=%E4%B8%89%E6%98%9F&is_del=culpa&current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/brand"
);

let params = {
    "condition": "三星",
    "is_del": "culpa",
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/brand',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'condition'=> '三星',
            'is_del'=> 'culpa',
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌查询成功",
    "data": {
        "brand": [
            {
                "id": 23,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:07"
            },
            {
                "id": 24,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:17:47"
            },
            {
                "id": 25,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:18:32"
            },
            {
                "id": 26,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-07 11:09:20"
            },
            {
                "id": 27,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:21:40"
            },
            {
                "id": 28,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:49:07"
            },
            {
                "id": 29,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:23"
            },
            {
                "id": 30,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:03"
            },
            {
                "id": 32,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:56:50"
            },
            {
                "id": 33,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:58:51"
            }
        ],
        "meta": {
            "current_page": 1,
            "per_page": "10",
            "total": 22,
            "last_page": 3
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/brand`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `condition` |  optional  | 品牌名称
    `is_del` |  optional  | 是否删除
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_18df6ca144e03eda0d60577e923b468c -->

<!-- START_99a0d0e111d20cd72c3e47abb0c195b9 -->
## store
保存品牌

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/brand" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u4e09\u661f","logo":1,"sort":100,"is_del":0}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/brand"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u4e09\u661f",
    "logo": 1,
    "sort": 100,
    "is_del": 0
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/brand',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '三星',
            'logo' => 1,
            'sort' => 100,
            'is_del' => 0,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌创建成功",
    "data": {
        "brand": {
            "id": 51,
            "name": "三星",
            "logo_id": "1",
            "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
            "sort": "100",
            "is_del": "0",
            "created_at": "2020-07-13 17:37:27",
            "updated_at": "2020-07-13 17:37:27"
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/brand`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 品牌名称
        `logo` | integer |  required  | logo图片ID
        `sort` | integer |  required  | 排序
        `is_del` | integer |  required  | 是否删除[0:正常,1:删除]
    
<!-- END_99a0d0e111d20cd72c3e47abb0c195b9 -->

<!-- START_a4f59d1215033d6370a41fefe2e4550e -->
## show
查询单一品牌

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/brand/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/brand/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/brand/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌查询成功",
    "data": {
        "brand": [
            {
                "id": 1,
                "name": "三星",
                "logo_id": "56",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/\/20200701\/8814141d326136b9b651c8ba192b0c51.png",
                "sort": 111,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 15:21:26"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/brand/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `brand` |  required  | 品牌ID

<!-- END_a4f59d1215033d6370a41fefe2e4550e -->

<!-- START_1b4e11f63c2b7a09cb999cc7ab10546d -->
## update
更新品牌

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/brand/51" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u4e09\u661f","logo":1,"sort":90,"is_del":0}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/brand/51"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u4e09\u661f",
    "logo": 1,
    "sort": 90,
    "is_del": 0
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/brand/51',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '三星',
            'logo' => 1,
            'sort' => 90,
            'is_del' => 0,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌更新成功",
    "data": {
        "brand": {
            "id": 51,
            "name": "三星",
            "logo_id": "1",
            "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
            "sort": "90",
            "is_del": "0",
            "created_at": "2020-07-13 17:37:27",
            "updated_at": "2020-07-13 17:37:27"
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/brand/{brand}`

`PATCH admin-api/admin/brand/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `brand` |  required  | 品牌ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 品牌名称
        `logo` | integer |  required  | logo图片ID
        `sort` | integer |  required  | 排序
        `is_del` | integer |  required  | 是否删除[0:正常,1:删除]
    
<!-- END_1b4e11f63c2b7a09cb999cc7ab10546d -->

<!-- START_058c5ed9e27b3084d1e5869cf760dae9 -->
## delete
删除品牌

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/brand/51" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/brand/51"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/brand/51',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌删除成功",
    "data": {
        "brand": {
            "id": 51,
            "name": "三星",
            "logo_id": "1",
            "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
            "sort": "90",
            "is_del": "1",
            "created_at": "2020-07-13 17:37:27",
            "updated_at": "2020-07-13 17:37:27"
        }
    }
}
```

### HTTP Request
`DELETE admin-api/admin/brand/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `brand` |  required  | 品牌ID

<!-- END_058c5ed9e27b3084d1e5869cf760dae9 -->

#Carousel

轮播图管理
<!-- START_2e6a9de9e6851788f8264fa915a92f47 -->
## index
轮播图列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/carousel?is_del=0&current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/carousel"
);

let params = {
    "is_del": "0",
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/carousel',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'is_del'=> '0',
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "coupons": {
            "current_page": 1,
            "data": [],
            "first_page_url": "\/?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/carousel`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  optional  | 轮播图名称
    `type` |  optional  | 轮播图类型[0:图片 1:视频]
    `location_type` |  optional  | 轮播图位置[0:首页顶部轮播图]
    `date_range` |  optional  | 起止时间
    `is_del` |  optional  | 是否删除[0:正常 1:删除]
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_2e6a9de9e6851788f8264fa915a92f47 -->

<!-- START_045a35c828bb4aacfd9b17221092fef7 -->
## store
保存

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/carousel" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u8f6e\u64ad\u56fe1","type":0,"location_type":0,"path":"https:\/\/www.baidu.com","sort":100,"is_show":1,"image_id":1,"start_at":"culpa","end_at":"culpa","is_del":"0"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/carousel"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u8f6e\u64ad\u56fe1",
    "type": 0,
    "location_type": 0,
    "path": "https:\/\/www.baidu.com",
    "sort": 100,
    "is_show": 1,
    "image_id": 1,
    "start_at": "culpa",
    "end_at": "culpa",
    "is_del": "0"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/carousel',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '轮播图1',
            'type' => 0,
            'location_type' => 0,
            'path' => 'https://www.baidu.com',
            'sort' => 100,
            'is_show' => 1,
            'image_id' => 1,
            'start_at' => 'culpa',
            'end_at' => 'culpa',
            'is_del' => '0',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "创建成功",
    "data": {
        "carousel": {
            "name": "轮播图1",
            "type": "0",
            "location_type": "0",
            "path": "https:\/\/www.baidu.com",
            "sort": "100",
            "is_show": "1",
            "image_id": "1",
            "start_at": "2020-08-01 00:00:00",
            "end_at": "2020-08-31 23:59:59",
            "is_del": "0",
            "updated_at": "2020-08-04 18:00:03",
            "created_at": "2020-08-04 18:00:03",
            "id": 7
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/carousel`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 轮播图名称
        `type` | integer |  required  | 类型[0:图片 1:视频]
        `location_type` | integer |  required  | 类型[0:首页顶部轮播图]
        `path` | string |  required  | 跳转地址
        `sort` | integer |  required  | 排序
        `is_show` | integer |  required  | 展示标记[0:不展示 1:展示]
        `image_id` | integer |  required  | 资源ID
        `start_at` | date |  optional  | 开始时间
        `end_at` | date |  optional  | 结束时间
        `is_del` | required |  optional  | 删除标记[0:正常 1:删除]
    
<!-- END_045a35c828bb4aacfd9b17221092fef7 -->

<!-- START_51157c9cf68e8cc3e86efffd7e29a0ac -->
## show
查询(单一)

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/carousel/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/carousel/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/carousel/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": -1,
    "message": "ID不存在",
    "data": []
}
```

### HTTP Request
`GET admin-api/admin/carousel/{carousel}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `carousel` |  required  | 轮播图ID

<!-- END_51157c9cf68e8cc3e86efffd7e29a0ac -->

<!-- START_1dac5ba7158bfe69e31f9298800657ab -->
## update
更新

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/carousel/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u8f6e\u64ad\u56fe1","location_type":0,"type":0,"path":"https:www.baidu.com","sort":100,"is_show":1,"image_id":1,"start_at":"culpa","end_at":"culpa","is_del":"0"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/carousel/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u8f6e\u64ad\u56fe1",
    "location_type": 0,
    "type": 0,
    "path": "https:www.baidu.com",
    "sort": 100,
    "is_show": 1,
    "image_id": 1,
    "start_at": "culpa",
    "end_at": "culpa",
    "is_del": "0"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/carousel/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '轮播图1',
            'location_type' => 0,
            'type' => 0,
            'path' => 'https:www.baidu.com',
            'sort' => 100,
            'is_show' => 1,
            'image_id' => 1,
            'start_at' => 'culpa',
            'end_at' => 'culpa',
            'is_del' => '0',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "更新成功",
    "data": {
        "carousel": {
            "id": 7,
            "name": "轮播图1",
            "type": "0",
            "location_type": "0",
            "path": "https:\/\/www.baidu.com",
            "sort": "100",
            "is_show": "1",
            "image_id": "1",
            "start_at": "2020-08-01 00:00:00",
            "end_at": "2020-08-31 23:59:59",
            "is_del": "0",
            "created_at": "2020-08-04 18:00:03",
            "updated_at": "2020-08-04 18:00:03"
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/carousel/{carousel}`

`PATCH admin-api/admin/carousel/{carousel}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `carousel` |  required  | 轮播图ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 轮播图名称
        `location_type` | integer |  required  | 类型[0:首页顶部轮播图]
        `type` | integer |  required  | 类型[0:图片 1:视频]
        `path` | string |  required  | 跳转地址
        `sort` | integer |  required  | 排序
        `is_show` | integer |  required  | 展示标记[0:不展示 1:展示]
        `image_id` | integer |  required  | 资源ID
        `start_at` | date |  optional  | 开始时间
        `end_at` | date |  optional  | 结束时间
        `is_del` | required |  optional  | 删除标记[0:正常 1:删除]
    
<!-- END_1dac5ba7158bfe69e31f9298800657ab -->

<!-- START_4939c6ec77401103f92a3dbb1b0f9764 -->
## delete
删除

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/carousel/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/carousel/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/carousel/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "删除成功",
    "data": []
}
```

### HTTP Request
`DELETE admin-api/admin/carousel/{carousel}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `carousel` |  required  | 轮播图ID

<!-- END_4939c6ec77401103f92a3dbb1b0f9764 -->

#Cashout

提现记录
<!-- START_56314bf22ed0fd661ccc0b242cf22f39 -->
## index
提现记录表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/cashout?current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/cashout"
);

let params = {
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/cashout',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "cashouts": {
            "current_page": 1,
            "data": [],
            "first_page_url": "\/?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/cashout`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `mobile` |  optional  | 手机号
    `nickname` |  optional  | 昵称
    `type` |  optional  | 类型[1:银行卡 2:微信余额]
    `status` |  optional  | 状态[0:已申请 1:成功 2:提现失败 3:拒绝]
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_56314bf22ed0fd661ccc0b242cf22f39 -->

<!-- START_0afb5bca87d64ea46724091f94e141d0 -->
## cashout
提现

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/cashout/culpa" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/cashout/culpa"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/cashout/culpa',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": -1,
    "message": "该提现记录不存在",
    "data": []
}
```

### HTTP Request
`GET admin-api/admin/cashout/{cashout}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `cashout` |  required  | 提现ID

<!-- END_0afb5bca87d64ea46724091f94e141d0 -->

#Category

商品分类接口
<!-- START_f4f166b44e57100900985c0216fcf04b -->
## index
分类列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/category" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/category"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/category',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "获取分类成功",
    "data": {
        "pids": [
            "0",
            "1"
        ],
        "treeCates": [
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 2,
                "is_more": 1
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2,
                "is_more": 0
            },
            {
                "id": 32,
                "pid": 1,
                "name": "|----|----短裤",
                "status": 2,
                "is_more": 0
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1,
                "is_more": 0
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1,
                "is_more": 0
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1,
                "is_more": 0
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1,
                "is_more": 0
            },
            {
                "id": 33,
                "pid": 0,
                "name": "|----a",
                "status": 1,
                "is_more": 0
            },
            {
                "id": 34,
                "pid": 0,
                "name": "|----a",
                "status": 1,
                "is_more": 0
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/category`


<!-- END_f4f166b44e57100900985c0216fcf04b -->

<!-- START_9af3075d87032b35a3a4836cdf38e396 -->
## create
获取加前缀的分类
获取商品类型

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/category/create" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/category/create"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/category/create',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "获取分类列表成功",
    "data": {
        "types": [
            {
                "id": 20,
                "name": "啊",
                "sort": 1,
                "created_at": "2020-07-08 11:23:21",
                "updated_at": "2020-07-08 11:23:21"
            },
            {
                "id": 22,
                "name": "啊啊啊啊啊",
                "sort": 1,
                "created_at": "2020-07-08 11:06:34",
                "updated_at": "2020-07-08 11:06:34"
            },
            {
                "id": 23,
                "name": "啊啊",
                "sort": 1,
                "created_at": "2020-07-08 11:09:28",
                "updated_at": "2020-07-08 11:09:28"
            },
            {
                "id": 25,
                "name": "电视剧",
                "sort": 1,
                "created_at": "2020-07-10 15:29:47",
                "updated_at": "2020-07-10 15:29:47"
            },
            {
                "id": 1,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-06 16:55:33",
                "updated_at": "2020-07-06 16:55:33"
            },
            {
                "id": 2,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-09 14:41:37",
                "updated_at": "2020-07-09 14:41:37"
            },
            {
                "id": 3,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:49:49",
                "updated_at": "2020-07-06 16:49:49"
            },
            {
                "id": 4,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:50:16",
                "updated_at": "2020-07-06 16:50:16"
            },
            {
                "id": 5,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:51:00",
                "updated_at": "2020-07-06 16:51:00"
            },
            {
                "id": 6,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:52:06",
                "updated_at": "2020-07-06 16:52:06"
            },
            {
                "id": 7,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:52:20",
                "updated_at": "2020-07-06 16:52:20"
            },
            {
                "id": 8,
                "name": "通用类型1",
                "sort": 100,
                "created_at": "2020-07-06 17:05:38",
                "updated_at": "2020-07-06 17:05:38"
            },
            {
                "id": 14,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:46",
                "updated_at": "2020-07-07 09:47:46"
            },
            {
                "id": 15,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:47",
                "updated_at": "2020-07-07 09:47:47"
            },
            {
                "id": 16,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:47",
                "updated_at": "2020-07-07 09:47:47"
            },
            {
                "id": 17,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:48:32",
                "updated_at": "2020-07-07 09:48:32"
            },
            {
                "id": 19,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 10:17:41",
                "updated_at": "2020-07-07 10:17:41"
            },
            {
                "id": 26,
                "name": "通用类型",
                "sort": 100,
                "created_at": "2020-07-14 10:57:26",
                "updated_at": "2020-07-14 10:57:26"
            },
            {
                "id": 21,
                "name": "啊啊",
                "sort": 123,
                "created_at": "2020-07-08 11:06:04",
                "updated_at": "2020-07-08 11:06:04"
            },
            {
                "id": 18,
                "name": "手机",
                "sort": 210,
                "created_at": "2020-07-07 09:48:42",
                "updated_at": "2020-07-07 09:48:42"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 213,
                "created_at": "2020-07-07 09:47:19",
                "updated_at": "2020-07-07 09:47:19"
            }
        ],
        "cates": [
            {
                "id": 0,
                "name": "顶级分类"
            },
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 2
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 32,
                "pid": 1,
                "name": "|----|----短裤",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            },
            {
                "id": 33,
                "pid": 0,
                "name": "|----a",
                "status": 1
            },
            {
                "id": 34,
                "pid": 0,
                "name": "|----a",
                "status": 1
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/category/create`


<!-- END_9af3075d87032b35a3a4836cdf38e396 -->

<!-- START_1519f34630cd39ea95a1ab4f0a203526 -->
## store
保存分类

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/category" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"pid":1,"name":"\u77ed\u88e4","goods_type_id":1,"sort":100,"image_id":1,"status":1}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/category"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "pid": 1,
    "name": "\u77ed\u88e4",
    "goods_type_id": 1,
    "sort": 100,
    "image_id": 1,
    "status": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/category',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'pid' => 1,
            'name' => '短裤',
            'goods_type_id' => 1,
            'sort' => 100,
            'image_id' => 1,
            'status' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "分类创建成功",
    "data": {
        "category": {
            "pid": "1",
            "name": "短裤",
            "goods_type_id": "1",
            "sort": "100",
            "image_id": "1",
            "status": "1",
            "updated_at": "2020-07-14 09:20:32",
            "created_at": "2020-07-14 09:20:32",
            "id": 32
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/category`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `pid` | integer |  required  | 父级ID
        `name` | string |  required  | 分类名称
        `goods_type_id` | integer |  required  | 商品类型ID
        `sort` | integer |  required  | 排序
        `image_id` | integer |  required  | 分类图片ID
        `status` | integer |  required  | 状态[1:显示,2:隐藏]
    
<!-- END_1519f34630cd39ea95a1ab4f0a203526 -->

<!-- START_0100ca6f467fb6bbe86d2ed510209ac4 -->
## show
查询分类(单一)

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/category/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/category/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/category/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "分类查询成功",
    "data": {
        "cate": [
            {
                "id": 1,
                "pid": 0,
                "name": "男装",
                "goods_type_id": 0,
                "sort": 100,
                "image_id": 0,
                "status": 2,
                "created_at": null,
                "updated_at": "2020-07-14 14:34:03"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/category/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  required  | 分类ID

<!-- END_0100ca6f467fb6bbe86d2ed510209ac4 -->

<!-- START_92529498e4cbdefc19b317c78c3f2662 -->
## edit
编辑分类

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/category/1/edit" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/category/1/edit"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/category/1/edit',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "分类查询成功",
    "data": {
        "cate": [
            {
                "id": 1,
                "pid": 0,
                "name": "男装",
                "goods_type_id": 0,
                "sort": 100,
                "image_id": 0,
                "status": 2,
                "created_at": null,
                "updated_at": "2020-07-14 14:34:03"
            }
        ],
        "types": [
            {
                "id": 20,
                "name": "啊",
                "sort": 1,
                "created_at": "2020-07-08 11:23:21",
                "updated_at": "2020-07-08 11:23:21"
            },
            {
                "id": 22,
                "name": "啊啊啊啊啊",
                "sort": 1,
                "created_at": "2020-07-08 11:06:34",
                "updated_at": "2020-07-08 11:06:34"
            },
            {
                "id": 23,
                "name": "啊啊",
                "sort": 1,
                "created_at": "2020-07-08 11:09:28",
                "updated_at": "2020-07-08 11:09:28"
            },
            {
                "id": 25,
                "name": "电视剧",
                "sort": 1,
                "created_at": "2020-07-10 15:29:47",
                "updated_at": "2020-07-10 15:29:47"
            },
            {
                "id": 1,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-06 16:55:33",
                "updated_at": "2020-07-06 16:55:33"
            },
            {
                "id": 2,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-09 14:41:37",
                "updated_at": "2020-07-09 14:41:37"
            },
            {
                "id": 3,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:49:49",
                "updated_at": "2020-07-06 16:49:49"
            },
            {
                "id": 4,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:50:16",
                "updated_at": "2020-07-06 16:50:16"
            },
            {
                "id": 5,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:51:00",
                "updated_at": "2020-07-06 16:51:00"
            },
            {
                "id": 6,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:52:06",
                "updated_at": "2020-07-06 16:52:06"
            },
            {
                "id": 7,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:52:20",
                "updated_at": "2020-07-06 16:52:20"
            },
            {
                "id": 8,
                "name": "通用类型1",
                "sort": 100,
                "created_at": "2020-07-06 17:05:38",
                "updated_at": "2020-07-06 17:05:38"
            },
            {
                "id": 14,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:46",
                "updated_at": "2020-07-07 09:47:46"
            },
            {
                "id": 15,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:47",
                "updated_at": "2020-07-07 09:47:47"
            },
            {
                "id": 16,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:47",
                "updated_at": "2020-07-07 09:47:47"
            },
            {
                "id": 17,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:48:32",
                "updated_at": "2020-07-07 09:48:32"
            },
            {
                "id": 19,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 10:17:41",
                "updated_at": "2020-07-07 10:17:41"
            },
            {
                "id": 26,
                "name": "通用类型",
                "sort": 100,
                "created_at": "2020-07-14 10:57:26",
                "updated_at": "2020-07-14 10:57:26"
            },
            {
                "id": 21,
                "name": "啊啊",
                "sort": 123,
                "created_at": "2020-07-08 11:06:04",
                "updated_at": "2020-07-08 11:06:04"
            },
            {
                "id": 18,
                "name": "手机",
                "sort": 210,
                "created_at": "2020-07-07 09:48:42",
                "updated_at": "2020-07-07 09:48:42"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 213,
                "created_at": "2020-07-07 09:47:19",
                "updated_at": "2020-07-07 09:47:19"
            }
        ],
        "cates": [
            {
                "id": 0,
                "name": "顶级分类"
            },
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 2
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 32,
                "pid": 1,
                "name": "|----|----短裤",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            },
            {
                "id": 33,
                "pid": 0,
                "name": "|----a",
                "status": 1
            },
            {
                "id": 34,
                "pid": 0,
                "name": "|----a",
                "status": 1
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/category/{category}/edit`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  required  | 分类ID

<!-- END_92529498e4cbdefc19b317c78c3f2662 -->

<!-- START_888c1271b11c30f9aafb957e2dd909ba -->
## update
更新分类

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/category/32" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"pid":1,"name":"\u77ed\u88e42","goods_type_id":1,"sort":100,"image_id":1,"status":1}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/category/32"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "pid": 1,
    "name": "\u77ed\u88e42",
    "goods_type_id": 1,
    "sort": 100,
    "image_id": 1,
    "status": 1
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/category/32',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'pid' => 1,
            'name' => '短裤2',
            'goods_type_id' => 1,
            'sort' => 100,
            'image_id' => 1,
            'status' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "分类更新成功",
    "data": {
        "category": {
            "pid": "1",
            "name": "短裤2",
            "goods_type_id": "1",
            "sort": "100",
            "image_id": "1",
            "status": "1",
            "updated_at": "2020-07-14 09:20:32",
            "created_at": "2020-07-14 09:20:32",
            "id": 32
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/category/{category}`

`PATCH admin-api/admin/category/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  required  | 分类ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `pid` | integer |  required  | 父级ID
        `name` | string |  required  | 分类名称
        `goods_type_id` | integer |  required  | 商品类型ID
        `sort` | integer |  required  | 排序
        `image_id` | integer |  required  | 分类图片ID
        `status` | integer |  required  | 状态[1:显示,2:隐藏]
    
<!-- END_888c1271b11c30f9aafb957e2dd909ba -->

<!-- START_d075b786a6abd91d064a857408e8e073 -->
## delete
删除分类

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/category/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/category/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/category/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "删除成功",
    "data": []
}
```

### HTTP Request
`DELETE admin-api/admin/category/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  required  | 分类ID

<!-- END_d075b786a6abd91d064a857408e8e073 -->

<!-- START_3590f96b16201711832b3d26401d039f -->
## status
更改状态

> Example request:

```bash
curl -X PATCH \
    "http://192.168.0.178:8888/admin-api/admin/category/status/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"status":12}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/category/status/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "status": 12
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://192.168.0.178:8888/admin-api/admin/category/status/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'status' => 12,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "状态更改成功",
    "data": []
}
```

### HTTP Request
`PATCH admin-api/admin/category/status/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  required  | 分类ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `status` | integer |  required  | 状态[1:显示,2:隐藏]
    
<!-- END_3590f96b16201711832b3d26401d039f -->

#Coupon

优惠券接口
<!-- START_903dc5dc07a0f42c4b2854285855fa23 -->
## index
优惠券列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/coupon?perPage=10&currentPage=1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/coupon"
);

let params = {
    "perPage": "10",
    "currentPage": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/coupon',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'perPage'=> '10',
            'currentPage'=> '1',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "coupons": {
            "current_page": 1,
            "data": [
                {
                    "id": 5,
                    "type": 0,
                    "name": "30元优惠券",
                    "use_key": 0,
                    "use_value": "",
                    "amount": "30.00",
                    "per_limit": 1,
                    "min_point": "80.00",
                    "start_time": "2020-07-01 00:00:00",
                    "end_time": "2020-08-31 23:59:59",
                    "note": "这是一张30元的优惠券",
                    "publish_count": 800,
                    "use_count": 0,
                    "receive_count": 0,
                    "stock_count": 800,
                    "code": "6B9255AA20A4E51C",
                    "enable_time": "2020-07-31 23:59:59",
                    "status": 1,
                    "created_at": "2020-08-03 15:31:07",
                    "updated_at": "2020-08-03 15:32:43"
                },
                {
                    "id": 2,
                    "type": 0,
                    "name": "30元优惠券",
                    "use_key": 0,
                    "use_value": "",
                    "amount": "30.00",
                    "per_limit": 1,
                    "min_point": "80.00",
                    "start_time": "2020-07-01 00:00:00",
                    "end_time": "2020-08-31 23:59:59",
                    "note": "这是一张30元的优惠券",
                    "publish_count": 1000,
                    "use_count": 0,
                    "receive_count": 0,
                    "stock_count": 0,
                    "code": "8753B259CC787D39",
                    "enable_time": "2020-07-31 23:59:59",
                    "status": 1,
                    "created_at": "2020-07-16 15:02:28",
                    "updated_at": "2020-07-17 10:16:31"
                },
                {
                    "id": 4,
                    "type": 0,
                    "name": "20元优惠券",
                    "use_key": 0,
                    "use_value": "",
                    "amount": "20.00",
                    "per_limit": 1,
                    "min_point": "0.00",
                    "start_time": "2020-07-01 00:00:00",
                    "end_time": "2020-08-31 00:00:00",
                    "note": "这是一张优惠券",
                    "publish_count": 1000,
                    "use_count": 0,
                    "receive_count": 0,
                    "stock_count": 0,
                    "code": "F3494507D47DC700",
                    "enable_time": "2020-07-31 00:00:00",
                    "status": 1,
                    "created_at": "2020-07-16 14:44:10",
                    "updated_at": "2020-07-16 14:44:10"
                },
                {
                    "id": 3,
                    "type": 0,
                    "name": "50元优惠券",
                    "use_key": 0,
                    "use_value": "",
                    "amount": "50.00",
                    "per_limit": 1,
                    "min_point": "100.00",
                    "start_time": "2020-07-01 00:00:00",
                    "end_time": "2020-08-31 23:59:59",
                    "note": "这是一张50元的优惠券",
                    "publish_count": 1000,
                    "use_count": 0,
                    "receive_count": 0,
                    "stock_count": 0,
                    "code": "97D7BE62C439EB97",
                    "enable_time": "2020-07-31 23:59:59",
                    "status": 1,
                    "created_at": "2020-07-16 14:29:17",
                    "updated_at": "2020-07-17 10:16:07"
                },
                {
                    "id": 1,
                    "type": 0,
                    "name": "20元优惠券",
                    "use_key": 0,
                    "use_value": "",
                    "amount": "20.00",
                    "per_limit": 1,
                    "min_point": "10.00",
                    "start_time": "2020-07-01 00:00:00",
                    "end_time": "2020-08-31 23:59:59",
                    "note": "这是一张优惠券",
                    "publish_count": 1000,
                    "use_count": 0,
                    "receive_count": 0,
                    "stock_count": 0,
                    "code": "E92EE45AB1A3C690",
                    "enable_time": "2020-07-31 23:59:59",
                    "status": 1,
                    "created_at": "2020-07-16 14:22:00",
                    "updated_at": "2020-07-17 10:15:23"
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": 10,
            "prev_page_url": null,
            "to": 5,
            "total": 5
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/coupon`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  optional  | 优惠券名称
    `status` |  optional  | 状态[1:正常 2:禁用]
    `date_range` |  optional  | 起止时间[]
    `perPage` |  required  | 每页显示数量
    `currentPage` |  required  | 当前页
    `del` |  optional  | 是否删除[0:正常 1:删除]空值或0查正常 其他数值均为查所有

<!-- END_903dc5dc07a0f42c4b2854285855fa23 -->

<!-- START_973dd53f7441835a34c680c6f4ac4a66 -->
## create
创建优惠券

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/coupon/create" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/coupon/create"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/coupon/create',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "cates": [
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 2
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 32,
                "pid": 1,
                "name": "|----|----短裤",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            },
            {
                "id": 33,
                "pid": 0,
                "name": "|----a",
                "status": 1
            },
            {
                "id": 34,
                "pid": 0,
                "name": "|----a",
                "status": 1
            }
        ],
        "goods": [
            {
                "id": 1,
                "bn": "",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "6,8,9",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-22 15:21:15"
            },
            {
                "id": 2,
                "bn": "",
                "name": "2号衣服",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 1,
                "goods_type_id": 5,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:33"
            },
            {
                "id": 3,
                "bn": "",
                "name": "3号手机",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 11,
                "goods_type_id": 3,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:27"
            },
            {
                "id": 4,
                "bn": "",
                "name": "4号手机",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 10,
                "goods_type_id": 0,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:32"
            },
            {
                "id": 5,
                "bn": "G_202007225630",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 32,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": null,
                "freeze_stock": null,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-22 15:16:35",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-07-22 15:16:35",
                "updated_at": "2020-07-22 15:16:35"
            },
            {
                "id": 6,
                "bn": "G_202007226225",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 50,
                "freeze_stock": 17,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-22 15:17:36",
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-07-22 15:17:36",
                "updated_at": "2020-07-22 15:22:15"
            },
            {
                "id": 7,
                "bn": "G_202008047810",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:31:45",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:31:45",
                "updated_at": "2020-08-04 14:31:45"
            },
            {
                "id": 8,
                "bn": "G_202008048427",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:09",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:09",
                "updated_at": "2020-08-04 14:33:09"
            },
            {
                "id": 9,
                "bn": "G_202008049189",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:13",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:13",
                "updated_at": "2020-08-04 14:33:13"
            },
            {
                "id": 10,
                "bn": "G_2020080410320",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:16",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:16",
                "updated_at": "2020-08-04 14:33:16"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/coupon/create`


<!-- END_973dd53f7441835a34c680c6f4ac4a66 -->

<!-- START_794abc409b1fe1bbb188eaf45a3db4cf -->
## store
保存优惠券

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/coupon" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"20\u5143\u4f18\u60e0\u5238","type":0,"use_key":2,"use_value":"[1,2,3]","amount":20,"per_limit":1,"min_point":0,"start_time":"2020-07-01","end_time":"2020-08-31","note":"\u8fd9\u662f\u4e00\u5f20\u4f18\u60e0\u5238","publish_count":1000,"enable_time":"2020-07-31","status":12}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/coupon"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "20\u5143\u4f18\u60e0\u5238",
    "type": 0,
    "use_key": 2,
    "use_value": "[1,2,3]",
    "amount": 20,
    "per_limit": 1,
    "min_point": 0,
    "start_time": "2020-07-01",
    "end_time": "2020-08-31",
    "note": "\u8fd9\u662f\u4e00\u5f20\u4f18\u60e0\u5238",
    "publish_count": 1000,
    "enable_time": "2020-07-31",
    "status": 12
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/coupon',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '20元优惠券',
            'type' => 0,
            'use_key' => 2,
            'use_value' => '[1,2,3]',
            'amount' => 20.0,
            'per_limit' => 1,
            'min_point' => 0.0,
            'start_time' => '2020-07-01',
            'end_time' => '2020-08-31',
            'note' => '这是一张优惠券',
            'publish_count' => 1000,
            'enable_time' => '2020-07-31',
            'status' => 12,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "优惠券创建成功",
    "data": {
        "coupon": {
            "type": "0",
            "name": "20元优惠券",
            "use_key": "0",
            "use_value": "",
            "amount": "20",
            "per_limit": "1",
            "min_point": "0",
            "start_time": "2020-07-01",
            "end_time": "2020-08-31",
            "note": "这是一张优惠券",
            "publish_count": "1000",
            "enable_time": "2020-07-31",
            "status": "1",
            "code": "97D7BE62C439EB97",
            "updated_at": "2020-07-16 14:29:17",
            "created_at": "2020-07-16 14:29:17",
            "id": 3
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/coupon`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 优惠券名称
        `type` | integer |  required  | 优惠券类型[0:全场赠券 1:会员赠券 2:购物赠券 3:注册赠券]
        `use_key` | integer |  required  | 使用场景[0:全场通用 1:指定分类 2:指定商品]
        `use_value` | array |  required  | 使用场景对应的指定分类或者商品的id
        `amount` | float |  required  | 优惠券金额
        `per_limit` | integer |  required  | 每人限领数量
        `min_point` | float |  required  | 使用门槛[0.00表示无门槛]
        `start_time` | date |  required  | 开始时间
        `end_time` | data |  required  | 结束时间
        `note` | string |  optional  | 备注
        `publish_count` | integer |  required  | 发放数量
        `enable_time` | data |  required  | 可领取的结束时间
        `status` | integer |  required  | 状态[1:正常 2:禁用]
    
<!-- END_794abc409b1fe1bbb188eaf45a3db4cf -->

<!-- START_8e49118652bc0952547a9ec02905ef30 -->
## edit
编辑

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/coupon/1/edit" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/coupon/1/edit"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/coupon/1/edit',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "coupon": [
            {
                "id": 1,
                "type": 0,
                "name": "20元优惠券",
                "use_key": 0,
                "use_value": "",
                "amount": "20.00",
                "per_limit": 1,
                "min_point": "10.00",
                "start_time": "2020-07-01 00:00:00",
                "end_time": "2020-08-31 23:59:59",
                "note": "这是一张优惠券",
                "publish_count": 1000,
                "use_count": 0,
                "receive_count": 0,
                "stock_count": 0,
                "code": "E92EE45AB1A3C690",
                "enable_time": "2020-07-31 23:59:59",
                "status": 1,
                "created_at": "2020-07-16 14:22:00",
                "updated_at": "2020-07-17 10:15:23"
            }
        ],
        "cates": [
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 2
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 32,
                "pid": 1,
                "name": "|----|----短裤",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            },
            {
                "id": 33,
                "pid": 0,
                "name": "|----a",
                "status": 1
            },
            {
                "id": 34,
                "pid": 0,
                "name": "|----a",
                "status": 1
            }
        ],
        "goods": [
            {
                "id": 1,
                "bn": "",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "6,8,9",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-22 15:21:15"
            },
            {
                "id": 2,
                "bn": "",
                "name": "2号衣服",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 1,
                "goods_type_id": 5,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:33"
            },
            {
                "id": 3,
                "bn": "",
                "name": "3号手机",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 11,
                "goods_type_id": 3,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:27"
            },
            {
                "id": 4,
                "bn": "",
                "name": "4号手机",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 10,
                "goods_type_id": 0,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:32"
            },
            {
                "id": 5,
                "bn": "G_202007225630",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 32,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": null,
                "freeze_stock": null,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-22 15:16:35",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-07-22 15:16:35",
                "updated_at": "2020-07-22 15:16:35"
            },
            {
                "id": 6,
                "bn": "G_202007226225",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 50,
                "freeze_stock": 17,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-22 15:17:36",
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-07-22 15:17:36",
                "updated_at": "2020-07-22 15:22:15"
            },
            {
                "id": 7,
                "bn": "G_202008047810",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:31:45",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:31:45",
                "updated_at": "2020-08-04 14:31:45"
            },
            {
                "id": 8,
                "bn": "G_202008048427",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:09",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:09",
                "updated_at": "2020-08-04 14:33:09"
            },
            {
                "id": 9,
                "bn": "G_202008049189",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:13",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:13",
                "updated_at": "2020-08-04 14:33:13"
            },
            {
                "id": 10,
                "bn": "G_2020080410320",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:16",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:16",
                "updated_at": "2020-08-04 14:33:16"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/coupon/{coupon}/edit`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `coupon` |  required  | 优惠券ID

<!-- END_8e49118652bc0952547a9ec02905ef30 -->

<!-- START_9beca4faa14261343791593b5d53801f -->
## update
更新优惠券

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/coupon/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"20\u5143\u4f18\u60e0\u5238","type":0,"use_key":2,"use_value":"[1,2,3]","amount":20,"per_limit":1,"min_point":0,"start_time":"2020-07-01","end_time":"2020-08-31","note":"\u8fd9\u662f\u4e00\u5f20\u4f18\u60e0\u5238","publish_count":1000,"enable_time":"2020-07-31","status":12}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/coupon/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "20\u5143\u4f18\u60e0\u5238",
    "type": 0,
    "use_key": 2,
    "use_value": "[1,2,3]",
    "amount": 20,
    "per_limit": 1,
    "min_point": 0,
    "start_time": "2020-07-01",
    "end_time": "2020-08-31",
    "note": "\u8fd9\u662f\u4e00\u5f20\u4f18\u60e0\u5238",
    "publish_count": 1000,
    "enable_time": "2020-07-31",
    "status": 12
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/coupon/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '20元优惠券',
            'type' => 0,
            'use_key' => 2,
            'use_value' => '[1,2,3]',
            'amount' => 20.0,
            'per_limit' => 1,
            'min_point' => 0.0,
            'start_time' => '2020-07-01',
            'end_time' => '2020-08-31',
            'note' => '这是一张优惠券',
            'publish_count' => 1000,
            'enable_time' => '2020-07-31',
            'status' => 12,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "优惠券更新成功",
    "data": {
        "coupon": {
            "type": "0",
            "name": "20元优惠券",
            "use_key": "0",
            "use_value": "",
            "amount": "20",
            "per_limit": "1",
            "min_point": "0",
            "start_time": "2020-07-01",
            "end_time": "2020-08-31",
            "note": "这是一张优惠券",
            "publish_count": "1000",
            "enable_time": "2020-07-31",
            "status": "1",
            "code": "97D7BE62C439EB97",
            "updated_at": "2020-07-16 14:29:17",
            "created_at": "2020-07-16 14:29:17",
            "id": 3
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/coupon/{coupon}`

`PATCH admin-api/admin/coupon/{coupon}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `coupon` |  required  | 优惠券ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 优惠券名称
        `type` | integer |  required  | 优惠券类型[0:全场赠券 1:会员赠券 2:购物赠券 3:注册赠券]
        `use_key` | integer |  required  | 使用场景[0:全场通用 1:指定分类 2:指定商品]
        `use_value` | array |  required  | 使用场景对应的指定分类或者商品的id
        `amount` | float |  required  | 优惠券金额
        `per_limit` | integer |  required  | 每人限领数量
        `min_point` | float |  required  | 使用门槛[0.00表示无门槛]
        `start_time` | date |  required  | 开始时间
        `end_time` | data |  required  | 结束时间
        `note` | string |  optional  | 备注
        `publish_count` | integer |  required  | 发放数量
        `enable_time` | data |  required  | 可领取的结束时间
        `status` | integer |  required  | 状态[1:正常 2:禁用]
    
<!-- END_9beca4faa14261343791593b5d53801f -->

<!-- START_20a28a23152d90d275b3d8b052bf8252 -->
## delete
删除优惠券

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/coupon/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/coupon/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/coupon/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "删除成功",
    "data": []
}
```

### HTTP Request
`DELETE admin-api/admin/coupon/{coupon}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `coupon` |  required  | 优惠券ID

<!-- END_20a28a23152d90d275b3d8b052bf8252 -->

#Delivery

发货单接口
<!-- START_062cddea90f96419451a307800f03011 -->
## index
发货单列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/delivery?per_page=culpa&current_page=culpa" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/delivery"
);

let params = {
    "per_page": "culpa",
    "current_page": "culpa",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/delivery',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'per_page'=> 'culpa',
            'current_page'=> 'culpa',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET admin-api/admin/delivery`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  optional  | 发货单号
    `order_id` |  optional  | 订单号
    `date_range` |  optional  | 下单时间[范围]
    `logi_no` |  optional  | 快递单号
    `ship_mobile` |  optional  | 收货人电话
    `per_page` |  required  | 显示数量
    `current_page` |  required  | 当前页

<!-- END_062cddea90f96419451a307800f03011 -->

<!-- START_6300facc4d418ec2da4d0117a5440c39 -->
## show
查询单一

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/delivery/culpa" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/delivery/culpa"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/delivery/culpa',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "该发货单不存在",
    "data": []
}
```

### HTTP Request
`GET admin-api/admin/delivery/{delivery}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `delivery` |  required  | 发货单号

<!-- END_6300facc4d418ec2da4d0117a5440c39 -->

#Distribution

分销账户表
<!-- START_03d2b726dd87c051cb9e8edcba40e673 -->
## index
分销列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/distribution?current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/distribution"
);

let params = {
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/distribution',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "分销账户查询成功",
    "data": {
        "distributions": {
            "current_page": 1,
            "data": [],
            "first_page_url": "\/?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/distribution`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `mobile` |  optional  | 手机号
    `sex` |  optional  | 性别[1:男, 2:女]
    `nickname` |  optional  | 昵称
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_03d2b726dd87c051cb9e8edcba40e673 -->

#Goods

商品接口
<!-- START_7284dc020d27b9e996a97c77d295b761 -->
## index
商品列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/goods?marketable=1&is_del=0&current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/goods"
);

let params = {
    "marketable": "1",
    "is_del": "0",
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/goods',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'marketable'=> '1',
            'is_del'=> '0',
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "goods": {
            "current_page": 1,
            "data": [
                {
                    "id": 10,
                    "bn": "G_2020080410320",
                    "name": "三星S10 5G",
                    "brief": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "freight_amount": "0.00",
                    "image_id": 1,
                    "pics": [],
                    "goods_category_id": 1,
                    "goods_type_id": 1,
                    "brand_id": 1,
                    "marketable": 1,
                    "stock": 180,
                    "freeze_stock": 30,
                    "weight": "123.50",
                    "unit": "克",
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": "2020-08-04 14:33:16",
                    "down_at": null,
                    "sort": 100,
                    "is_recommend": 2,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                    "is_del": 0,
                    "created_at": "2020-08-04 14:33:16",
                    "updated_at": "2020-08-04 14:33:16",
                    "product": [
                        {
                            "id": 31,
                            "goods_id": 10,
                            "sku_code": "",
                            "sn": "P_20200804103201",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 50,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 1,
                            "image_id": 2,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:16",
                            "updated_at": "2020-08-04 14:33:16",
                            "image": {
                                "id": 2,
                                "name": "share",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "path": "20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "is_del": 0,
                                "created_at": "2020-07-10 15:29:01",
                                "updated_at": "2020-07-10 15:29:01"
                            }
                        },
                        {
                            "id": 32,
                            "goods_id": 10,
                            "sku_code": "",
                            "sn": "P_20200804103202",
                            "price": "120.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 10,
                            "freeze_stock": 2,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 3,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:16",
                            "updated_at": "2020-08-04 14:33:16",
                            "image": {
                                "id": 3,
                                "name": "三星logo",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "path": "20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:31:06",
                                "updated_at": "2020-06-29 15:31:06"
                            }
                        },
                        {
                            "id": 33,
                            "goods_id": 10,
                            "sku_code": "",
                            "sn": "P_20200804103203",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 90,
                            "freeze_stock": 18,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 2,
                            "image_id": 4,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:16",
                            "updated_at": "2020-08-04 14:33:16",
                            "image": {
                                "id": 4,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "path": "20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:32:23",
                                "updated_at": "2020-06-29 15:32:23"
                            }
                        },
                        {
                            "id": 34,
                            "goods_id": 10,
                            "sku_code": "",
                            "sn": "P_20200804103204",
                            "price": "150.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 30,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 5,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:16",
                            "updated_at": "2020-08-04 14:33:16",
                            "image": {
                                "id": 5,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "path": "20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:34:39",
                                "updated_at": "2020-06-29 15:34:39"
                            }
                        }
                    ],
                    "image": {
                        "id": 1,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:25:54",
                        "updated_at": "2020-06-29 15:25:54"
                    },
                    "category": {
                        "id": 1,
                        "pid": 0,
                        "name": "男装",
                        "goods_type_id": 0,
                        "sort": 100,
                        "image_id": 0,
                        "status": 2,
                        "created_at": null,
                        "updated_at": "2020-07-14 14:34:03"
                    },
                    "type": {
                        "id": 1,
                        "name": "手机",
                        "sort": 100,
                        "created_at": "2020-07-06 16:55:33",
                        "updated_at": "2020-07-06 16:55:33"
                    },
                    "brand": {
                        "id": 1,
                        "name": "三星",
                        "logo": "56",
                        "sort": 111,
                        "is_del": 1,
                        "created_at": "2020-06-29 14:31:19",
                        "updated_at": "2020-07-02 15:21:26"
                    }
                },
                {
                    "id": 9,
                    "bn": "G_202008049189",
                    "name": "三星S10 5G",
                    "brief": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "freight_amount": "0.00",
                    "image_id": 1,
                    "pics": [],
                    "goods_category_id": 1,
                    "goods_type_id": 1,
                    "brand_id": 1,
                    "marketable": 1,
                    "stock": 180,
                    "freeze_stock": 30,
                    "weight": "123.50",
                    "unit": "克",
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": "2020-08-04 14:33:13",
                    "down_at": null,
                    "sort": 100,
                    "is_recommend": 2,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                    "is_del": 0,
                    "created_at": "2020-08-04 14:33:13",
                    "updated_at": "2020-08-04 14:33:13",
                    "product": [
                        {
                            "id": 27,
                            "goods_id": 9,
                            "sku_code": "",
                            "sn": "P_2020080491891",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 50,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 1,
                            "image_id": 2,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:13",
                            "updated_at": "2020-08-04 14:33:13",
                            "image": {
                                "id": 2,
                                "name": "share",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "path": "20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "is_del": 0,
                                "created_at": "2020-07-10 15:29:01",
                                "updated_at": "2020-07-10 15:29:01"
                            }
                        },
                        {
                            "id": 28,
                            "goods_id": 9,
                            "sku_code": "",
                            "sn": "P_2020080491892",
                            "price": "120.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 10,
                            "freeze_stock": 2,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 3,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:13",
                            "updated_at": "2020-08-04 14:33:13",
                            "image": {
                                "id": 3,
                                "name": "三星logo",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "path": "20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:31:06",
                                "updated_at": "2020-06-29 15:31:06"
                            }
                        },
                        {
                            "id": 29,
                            "goods_id": 9,
                            "sku_code": "",
                            "sn": "P_2020080491893",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 90,
                            "freeze_stock": 18,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 2,
                            "image_id": 4,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:13",
                            "updated_at": "2020-08-04 14:33:13",
                            "image": {
                                "id": 4,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "path": "20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:32:23",
                                "updated_at": "2020-06-29 15:32:23"
                            }
                        },
                        {
                            "id": 30,
                            "goods_id": 9,
                            "sku_code": "",
                            "sn": "P_2020080491894",
                            "price": "150.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 30,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 5,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:13",
                            "updated_at": "2020-08-04 14:33:13",
                            "image": {
                                "id": 5,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "path": "20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:34:39",
                                "updated_at": "2020-06-29 15:34:39"
                            }
                        }
                    ],
                    "image": {
                        "id": 1,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:25:54",
                        "updated_at": "2020-06-29 15:25:54"
                    },
                    "category": {
                        "id": 1,
                        "pid": 0,
                        "name": "男装",
                        "goods_type_id": 0,
                        "sort": 100,
                        "image_id": 0,
                        "status": 2,
                        "created_at": null,
                        "updated_at": "2020-07-14 14:34:03"
                    },
                    "type": {
                        "id": 1,
                        "name": "手机",
                        "sort": 100,
                        "created_at": "2020-07-06 16:55:33",
                        "updated_at": "2020-07-06 16:55:33"
                    },
                    "brand": {
                        "id": 1,
                        "name": "三星",
                        "logo": "56",
                        "sort": 111,
                        "is_del": 1,
                        "created_at": "2020-06-29 14:31:19",
                        "updated_at": "2020-07-02 15:21:26"
                    }
                },
                {
                    "id": 8,
                    "bn": "G_202008048427",
                    "name": "三星S10 5G",
                    "brief": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "freight_amount": "0.00",
                    "image_id": 1,
                    "pics": [],
                    "goods_category_id": 1,
                    "goods_type_id": 1,
                    "brand_id": 1,
                    "marketable": 1,
                    "stock": 180,
                    "freeze_stock": 30,
                    "weight": "123.50",
                    "unit": "克",
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": "2020-08-04 14:33:09",
                    "down_at": null,
                    "sort": 100,
                    "is_recommend": 2,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                    "is_del": 0,
                    "created_at": "2020-08-04 14:33:09",
                    "updated_at": "2020-08-04 14:33:09",
                    "product": [
                        {
                            "id": 23,
                            "goods_id": 8,
                            "sku_code": "",
                            "sn": "P_2020080484271",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 50,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 1,
                            "image_id": 2,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:09",
                            "updated_at": "2020-08-04 14:33:09",
                            "image": {
                                "id": 2,
                                "name": "share",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "path": "20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "is_del": 0,
                                "created_at": "2020-07-10 15:29:01",
                                "updated_at": "2020-07-10 15:29:01"
                            }
                        },
                        {
                            "id": 24,
                            "goods_id": 8,
                            "sku_code": "",
                            "sn": "P_2020080484272",
                            "price": "120.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 10,
                            "freeze_stock": 2,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 3,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:09",
                            "updated_at": "2020-08-04 14:33:09",
                            "image": {
                                "id": 3,
                                "name": "三星logo",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "path": "20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:31:06",
                                "updated_at": "2020-06-29 15:31:06"
                            }
                        },
                        {
                            "id": 25,
                            "goods_id": 8,
                            "sku_code": "",
                            "sn": "P_2020080484273",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 90,
                            "freeze_stock": 18,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 2,
                            "image_id": 4,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:09",
                            "updated_at": "2020-08-04 14:33:09",
                            "image": {
                                "id": 4,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "path": "20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:32:23",
                                "updated_at": "2020-06-29 15:32:23"
                            }
                        },
                        {
                            "id": 26,
                            "goods_id": 8,
                            "sku_code": "",
                            "sn": "P_2020080484274",
                            "price": "150.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 30,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 5,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:33:09",
                            "updated_at": "2020-08-04 14:33:09",
                            "image": {
                                "id": 5,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "path": "20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:34:39",
                                "updated_at": "2020-06-29 15:34:39"
                            }
                        }
                    ],
                    "image": {
                        "id": 1,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:25:54",
                        "updated_at": "2020-06-29 15:25:54"
                    },
                    "category": {
                        "id": 1,
                        "pid": 0,
                        "name": "男装",
                        "goods_type_id": 0,
                        "sort": 100,
                        "image_id": 0,
                        "status": 2,
                        "created_at": null,
                        "updated_at": "2020-07-14 14:34:03"
                    },
                    "type": {
                        "id": 1,
                        "name": "手机",
                        "sort": 100,
                        "created_at": "2020-07-06 16:55:33",
                        "updated_at": "2020-07-06 16:55:33"
                    },
                    "brand": {
                        "id": 1,
                        "name": "三星",
                        "logo": "56",
                        "sort": 111,
                        "is_del": 1,
                        "created_at": "2020-06-29 14:31:19",
                        "updated_at": "2020-07-02 15:21:26"
                    }
                },
                {
                    "id": 7,
                    "bn": "G_202008047810",
                    "name": "三星S10 5G",
                    "brief": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "freight_amount": "0.00",
                    "image_id": 1,
                    "pics": [],
                    "goods_category_id": 1,
                    "goods_type_id": 1,
                    "brand_id": 1,
                    "marketable": 1,
                    "stock": 180,
                    "freeze_stock": 30,
                    "weight": "123.50",
                    "unit": "克",
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": "2020-08-04 14:31:45",
                    "down_at": null,
                    "sort": 100,
                    "is_recommend": 2,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                    "is_del": 0,
                    "created_at": "2020-08-04 14:31:45",
                    "updated_at": "2020-08-04 14:31:45",
                    "product": [
                        {
                            "id": 19,
                            "goods_id": 7,
                            "sku_code": "",
                            "sn": "P_2020080478101",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 50,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 1,
                            "image_id": 2,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:31:45",
                            "updated_at": "2020-08-04 14:31:45",
                            "image": {
                                "id": 2,
                                "name": "share",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "path": "20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "is_del": 0,
                                "created_at": "2020-07-10 15:29:01",
                                "updated_at": "2020-07-10 15:29:01"
                            }
                        },
                        {
                            "id": 20,
                            "goods_id": 7,
                            "sku_code": "",
                            "sn": "P_2020080478102",
                            "price": "120.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 10,
                            "freeze_stock": 2,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 3,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:31:45",
                            "updated_at": "2020-08-04 14:31:45",
                            "image": {
                                "id": 3,
                                "name": "三星logo",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "path": "20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:31:06",
                                "updated_at": "2020-06-29 15:31:06"
                            }
                        },
                        {
                            "id": 21,
                            "goods_id": 7,
                            "sku_code": "",
                            "sn": "P_2020080478103",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 90,
                            "freeze_stock": 18,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 2,
                            "image_id": 4,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:31:45",
                            "updated_at": "2020-08-04 14:31:45",
                            "image": {
                                "id": 4,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "path": "20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:32:23",
                                "updated_at": "2020-06-29 15:32:23"
                            }
                        },
                        {
                            "id": 22,
                            "goods_id": 7,
                            "sku_code": "",
                            "sn": "P_2020080478104",
                            "price": "150.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 30,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 5,
                            "is_del": 0,
                            "created_at": "2020-08-04 14:31:45",
                            "updated_at": "2020-08-04 14:31:45",
                            "image": {
                                "id": 5,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "path": "20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:34:39",
                                "updated_at": "2020-06-29 15:34:39"
                            }
                        }
                    ],
                    "image": {
                        "id": 1,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:25:54",
                        "updated_at": "2020-06-29 15:25:54"
                    },
                    "category": {
                        "id": 1,
                        "pid": 0,
                        "name": "男装",
                        "goods_type_id": 0,
                        "sort": 100,
                        "image_id": 0,
                        "status": 2,
                        "created_at": null,
                        "updated_at": "2020-07-14 14:34:03"
                    },
                    "type": {
                        "id": 1,
                        "name": "手机",
                        "sort": 100,
                        "created_at": "2020-07-06 16:55:33",
                        "updated_at": "2020-07-06 16:55:33"
                    },
                    "brand": {
                        "id": 1,
                        "name": "三星",
                        "logo": "56",
                        "sort": 111,
                        "is_del": 1,
                        "created_at": "2020-06-29 14:31:19",
                        "updated_at": "2020-07-02 15:21:26"
                    }
                },
                {
                    "id": 6,
                    "bn": "G_202007226225",
                    "name": "三星S10",
                    "brief": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "freight_amount": "0.00",
                    "image_id": 1,
                    "pics": [],
                    "goods_category_id": 2,
                    "goods_type_id": 1,
                    "brand_id": 1,
                    "marketable": 1,
                    "stock": 50,
                    "freeze_stock": 17,
                    "weight": "120.00",
                    "unit": "克",
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": "2020-07-22 15:17:36",
                    "down_at": null,
                    "sort": 10,
                    "is_recommend": 2,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                    "is_del": 0,
                    "created_at": "2020-07-22 15:17:36",
                    "updated_at": "2020-07-22 15:22:15",
                    "product": [
                        {
                            "id": 17,
                            "goods_id": 6,
                            "sku_code": "",
                            "sn": "P_2020072262255",
                            "price": "120.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 10,
                            "freeze_stock": 2,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                            "is_default": 2,
                            "image_id": 7,
                            "is_del": 0,
                            "created_at": "2020-07-22 15:22:15",
                            "updated_at": "2020-07-22 15:22:15",
                            "image": {
                                "id": 7,
                                "name": "601韵动钻石之花健身操队1",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/6d20a916f06430004ca0db18b12505ef.jpg",
                                "path": "20200629\/6d20a916f06430004ca0db18b12505ef.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:38:10",
                                "updated_at": "2020-06-29 15:38:10"
                            }
                        },
                        {
                            "id": 18,
                            "goods_id": 6,
                            "sku_code": "",
                            "sn": "P_2020072262256",
                            "price": "150.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 40,
                            "freeze_stock": 15,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                            "is_default": 2,
                            "image_id": 6,
                            "is_del": 0,
                            "created_at": "2020-07-22 15:22:15",
                            "updated_at": "2020-07-22 15:22:15",
                            "image": {
                                "id": 6,
                                "name": "601韵动钻石之花健身操队",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                                "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:38:09",
                                "updated_at": "2020-06-29 15:38:09"
                            }
                        }
                    ],
                    "image": {
                        "id": 1,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:25:54",
                        "updated_at": "2020-06-29 15:25:54"
                    },
                    "category": {
                        "id": 2,
                        "pid": 1,
                        "name": "T恤啊啊",
                        "goods_type_id": 3,
                        "sort": 100,
                        "image_id": 80,
                        "status": 2,
                        "created_at": null,
                        "updated_at": "2020-07-07 10:15:38"
                    },
                    "type": {
                        "id": 1,
                        "name": "手机",
                        "sort": 100,
                        "created_at": "2020-07-06 16:55:33",
                        "updated_at": "2020-07-06 16:55:33"
                    },
                    "brand": {
                        "id": 1,
                        "name": "三星",
                        "logo": "56",
                        "sort": 111,
                        "is_del": 1,
                        "created_at": "2020-06-29 14:31:19",
                        "updated_at": "2020-07-02 15:21:26"
                    }
                },
                {
                    "id": 5,
                    "bn": "G_202007225630",
                    "name": "三星S10 5G",
                    "brief": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "freight_amount": "0.00",
                    "image_id": 1,
                    "pics": [],
                    "goods_category_id": 32,
                    "goods_type_id": 1,
                    "brand_id": 1,
                    "marketable": 1,
                    "stock": null,
                    "freeze_stock": null,
                    "weight": "123.50",
                    "unit": "克",
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": "2020-07-22 15:16:35",
                    "down_at": null,
                    "sort": 100,
                    "is_recommend": 2,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                    "is_del": 0,
                    "created_at": "2020-07-22 15:16:35",
                    "updated_at": "2020-07-22 15:16:35",
                    "product": [],
                    "image": {
                        "id": 1,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:25:54",
                        "updated_at": "2020-06-29 15:25:54"
                    },
                    "category": {
                        "id": 32,
                        "pid": 1,
                        "name": "短裤",
                        "goods_type_id": 1,
                        "sort": 100,
                        "image_id": 1,
                        "status": 2,
                        "created_at": "2020-07-14 09:20:32",
                        "updated_at": "2020-07-14 14:34:03"
                    },
                    "type": {
                        "id": 1,
                        "name": "手机",
                        "sort": 100,
                        "created_at": "2020-07-06 16:55:33",
                        "updated_at": "2020-07-06 16:55:33"
                    },
                    "brand": {
                        "id": 1,
                        "name": "三星",
                        "logo": "56",
                        "sort": 111,
                        "is_del": 1,
                        "created_at": "2020-06-29 14:31:19",
                        "updated_at": "2020-07-02 15:21:26"
                    }
                },
                {
                    "id": 1,
                    "bn": "",
                    "name": "三星S10",
                    "brief": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "freight_amount": "0.00",
                    "image_id": 1,
                    "pics": [
                        {
                            "id": 6,
                            "name": "601韵动钻石之花健身操队",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                            "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:38:09",
                            "updated_at": "2020-06-29 15:38:09"
                        },
                        {
                            "id": 8,
                            "name": "601韵动钻石之花健身操队2",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                            "path": "20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:38:11",
                            "updated_at": "2020-06-29 15:38:11"
                        },
                        {
                            "id": 9,
                            "name": "三星logo",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                            "path": "20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:39:48",
                            "updated_at": "2020-06-29 15:39:48"
                        }
                    ],
                    "goods_category_id": 2,
                    "goods_type_id": 1,
                    "brand_id": 1,
                    "marketable": 1,
                    "stock": 0,
                    "freeze_stock": 0,
                    "weight": "120.00",
                    "unit": "克",
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": null,
                    "down_at": null,
                    "sort": 10,
                    "is_recommend": 2,
                    "is_hot": 1,
                    "is_selected": 1,
                    "label_ids": "",
                    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                    "is_del": 0,
                    "created_at": null,
                    "updated_at": "2020-07-22 15:21:15",
                    "product": [
                        {
                            "id": 1,
                            "goods_id": 1,
                            "sku_code": "",
                            "sn": "",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 50,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 1,
                            "image_id": 2,
                            "is_del": 0,
                            "created_at": "2020-07-09 18:22:34",
                            "updated_at": "2020-07-22 15:21:15",
                            "image": {
                                "id": 2,
                                "name": "share",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "path": "20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "is_del": 0,
                                "created_at": "2020-07-10 15:29:01",
                                "updated_at": "2020-07-10 15:29:01"
                            }
                        },
                        {
                            "id": 3,
                            "goods_id": 1,
                            "sku_code": "",
                            "sn": "",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 90,
                            "freeze_stock": 18,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 2,
                            "image_id": 4,
                            "is_del": 0,
                            "created_at": "2020-07-09 18:22:34",
                            "updated_at": "2020-07-22 15:21:15",
                            "image": {
                                "id": 4,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "path": "20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:32:23",
                                "updated_at": "2020-06-29 15:32:23"
                            }
                        },
                        {
                            "id": 15,
                            "goods_id": 1,
                            "sku_code": "",
                            "sn": "P7",
                            "price": "120.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 10,
                            "freeze_stock": 2,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                            "is_default": 2,
                            "image_id": 7,
                            "is_del": 0,
                            "created_at": "2020-07-22 15:21:15",
                            "updated_at": "2020-07-22 15:21:15",
                            "image": {
                                "id": 7,
                                "name": "601韵动钻石之花健身操队1",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/6d20a916f06430004ca0db18b12505ef.jpg",
                                "path": "20200629\/6d20a916f06430004ca0db18b12505ef.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:38:10",
                                "updated_at": "2020-06-29 15:38:10"
                            }
                        },
                        {
                            "id": 16,
                            "goods_id": 1,
                            "sku_code": "",
                            "sn": "P8",
                            "price": "150.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 40,
                            "freeze_stock": 15,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                            "is_default": 2,
                            "image_id": 6,
                            "is_del": 0,
                            "created_at": "2020-07-22 15:21:15",
                            "updated_at": "2020-07-22 15:21:15",
                            "image": {
                                "id": 6,
                                "name": "601韵动钻石之花健身操队",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                                "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:38:09",
                                "updated_at": "2020-06-29 15:38:09"
                            }
                        }
                    ],
                    "image": {
                        "id": 1,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:25:54",
                        "updated_at": "2020-06-29 15:25:54"
                    },
                    "category": {
                        "id": 2,
                        "pid": 1,
                        "name": "T恤啊啊",
                        "goods_type_id": 3,
                        "sort": 100,
                        "image_id": 80,
                        "status": 2,
                        "created_at": null,
                        "updated_at": "2020-07-07 10:15:38"
                    },
                    "type": {
                        "id": 1,
                        "name": "手机",
                        "sort": 100,
                        "created_at": "2020-07-06 16:55:33",
                        "updated_at": "2020-07-06 16:55:33"
                    },
                    "brand": {
                        "id": 1,
                        "name": "三星",
                        "logo": "56",
                        "sort": 111,
                        "is_del": 1,
                        "created_at": "2020-06-29 14:31:19",
                        "updated_at": "2020-07-02 15:21:26"
                    }
                },
                {
                    "id": 2,
                    "bn": "",
                    "name": "2号衣服",
                    "brief": "",
                    "price": "210.00",
                    "costprice": "110.00",
                    "mktprice": "230.00",
                    "freight_amount": "0.00",
                    "image_id": 6,
                    "pics": [
                        {
                            "id": 6,
                            "name": "601韵动钻石之花健身操队",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                            "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:38:09",
                            "updated_at": "2020-06-29 15:38:09"
                        },
                        {
                            "id": 8,
                            "name": "601韵动钻石之花健身操队2",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                            "path": "20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:38:11",
                            "updated_at": "2020-06-29 15:38:11"
                        },
                        {
                            "id": 9,
                            "name": "三星logo",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                            "path": "20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:39:48",
                            "updated_at": "2020-06-29 15:39:48"
                        }
                    ],
                    "goods_category_id": 1,
                    "goods_type_id": 5,
                    "brand_id": 0,
                    "marketable": 1,
                    "stock": 0,
                    "freeze_stock": 0,
                    "weight": null,
                    "unit": null,
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": null,
                    "down_at": null,
                    "sort": 100,
                    "is_recommend": 1,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": null,
                    "spec_desc": null,
                    "is_del": 0,
                    "created_at": null,
                    "updated_at": "2020-07-17 16:52:33",
                    "product": [
                        {
                            "id": 7,
                            "goods_id": 2,
                            "sku_code": "",
                            "sn": "",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 50,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 1,
                            "image_id": 2,
                            "is_del": 0,
                            "created_at": "2020-07-14 10:22:05",
                            "updated_at": "2020-07-14 10:22:05",
                            "image": {
                                "id": 2,
                                "name": "share",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "path": "20200710\/410399c72b8d33868e424caab5e6d8cf.jpg",
                                "is_del": 0,
                                "created_at": "2020-07-10 15:29:01",
                                "updated_at": "2020-07-10 15:29:01"
                            }
                        },
                        {
                            "id": 8,
                            "goods_id": 2,
                            "sku_code": "",
                            "sn": "",
                            "price": "120.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 10,
                            "freeze_stock": 2,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 3,
                            "is_del": 0,
                            "created_at": "2020-07-14 10:22:05",
                            "updated_at": "2020-07-14 10:22:05",
                            "image": {
                                "id": 3,
                                "name": "三星logo",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "path": "20200629\/a67e412b04d7b0a5f29233683e97bde9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:31:06",
                                "updated_at": "2020-06-29 15:31:06"
                            }
                        },
                        {
                            "id": 9,
                            "goods_id": 2,
                            "sku_code": "",
                            "sn": "",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 90,
                            "freeze_stock": 18,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 2,
                            "image_id": 4,
                            "is_del": 0,
                            "created_at": "2020-07-14 10:22:05",
                            "updated_at": "2020-07-14 10:22:05",
                            "image": {
                                "id": 4,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "path": "20200629\/cde2ed52ffc69992a9c76b87f97dcfb9.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:32:23",
                                "updated_at": "2020-06-29 15:32:23"
                            }
                        },
                        {
                            "id": 10,
                            "goods_id": 2,
                            "sku_code": "",
                            "sn": "",
                            "price": "150.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "freight_amount": "0.00",
                            "marketable": 1,
                            "stock": 30,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                            "is_default": 2,
                            "image_id": 5,
                            "is_del": 0,
                            "created_at": "2020-07-14 10:22:05",
                            "updated_at": "2020-07-14 10:22:05",
                            "image": {
                                "id": 5,
                                "name": "601韵动钻石之花健身操队2",
                                "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "path": "20200629\/f1e8f823dd285bfb4e71769b44ac1aec.jpg",
                                "is_del": 0,
                                "created_at": "2020-06-29 15:34:39",
                                "updated_at": "2020-06-29 15:34:39"
                            }
                        }
                    ],
                    "image": {
                        "id": 6,
                        "name": "601韵动钻石之花健身操队",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:38:09",
                        "updated_at": "2020-06-29 15:38:09"
                    },
                    "category": {
                        "id": 1,
                        "pid": 0,
                        "name": "男装",
                        "goods_type_id": 0,
                        "sort": 100,
                        "image_id": 0,
                        "status": 2,
                        "created_at": null,
                        "updated_at": "2020-07-14 14:34:03"
                    },
                    "type": {
                        "id": 5,
                        "name": "通用类型5",
                        "sort": 100,
                        "created_at": "2020-07-06 16:51:00",
                        "updated_at": "2020-07-06 16:51:00"
                    },
                    "brand": null
                },
                {
                    "id": 3,
                    "bn": "",
                    "name": "3号手机",
                    "brief": "",
                    "price": "210.00",
                    "costprice": "110.00",
                    "mktprice": "230.00",
                    "freight_amount": "0.00",
                    "image_id": 6,
                    "pics": [
                        {
                            "id": 6,
                            "name": "601韵动钻石之花健身操队",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                            "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:38:09",
                            "updated_at": "2020-06-29 15:38:09"
                        },
                        {
                            "id": 8,
                            "name": "601韵动钻石之花健身操队2",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                            "path": "20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:38:11",
                            "updated_at": "2020-06-29 15:38:11"
                        },
                        {
                            "id": 9,
                            "name": "三星logo",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                            "path": "20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:39:48",
                            "updated_at": "2020-06-29 15:39:48"
                        }
                    ],
                    "goods_category_id": 11,
                    "goods_type_id": 3,
                    "brand_id": 0,
                    "marketable": 1,
                    "stock": 0,
                    "freeze_stock": 0,
                    "weight": null,
                    "unit": null,
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": null,
                    "down_at": null,
                    "sort": 100,
                    "is_recommend": 1,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": null,
                    "spec_desc": null,
                    "is_del": 0,
                    "created_at": null,
                    "updated_at": "2020-07-17 16:52:27",
                    "product": [],
                    "image": {
                        "id": 6,
                        "name": "601韵动钻石之花健身操队",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:38:09",
                        "updated_at": "2020-06-29 15:38:09"
                    },
                    "category": null,
                    "type": {
                        "id": 3,
                        "name": "通用类型5",
                        "sort": 100,
                        "created_at": "2020-07-06 16:49:49",
                        "updated_at": "2020-07-06 16:49:49"
                    },
                    "brand": null
                },
                {
                    "id": 4,
                    "bn": "",
                    "name": "4号手机",
                    "brief": "",
                    "price": "210.00",
                    "costprice": "110.00",
                    "mktprice": "230.00",
                    "freight_amount": "0.00",
                    "image_id": 6,
                    "pics": [
                        {
                            "id": 6,
                            "name": "601韵动钻石之花健身操队",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                            "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:38:09",
                            "updated_at": "2020-06-29 15:38:09"
                        },
                        {
                            "id": 8,
                            "name": "601韵动钻石之花健身操队2",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                            "path": "20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:38:11",
                            "updated_at": "2020-06-29 15:38:11"
                        },
                        {
                            "id": 9,
                            "name": "三星logo",
                            "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                            "path": "20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                            "is_del": 0,
                            "created_at": "2020-06-29 15:39:48",
                            "updated_at": "2020-06-29 15:39:48"
                        }
                    ],
                    "goods_category_id": 10,
                    "goods_type_id": 0,
                    "brand_id": 0,
                    "marketable": 1,
                    "stock": 0,
                    "freeze_stock": 0,
                    "weight": null,
                    "unit": null,
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": null,
                    "down_at": null,
                    "sort": 100,
                    "is_recommend": 1,
                    "is_hot": 1,
                    "is_selected": 2,
                    "label_ids": "",
                    "spec_list": null,
                    "spec_desc": null,
                    "is_del": 0,
                    "created_at": null,
                    "updated_at": "2020-07-17 16:52:32",
                    "product": [],
                    "image": {
                        "id": 6,
                        "name": "601韵动钻石之花健身操队",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:38:09",
                        "updated_at": "2020-06-29 15:38:09"
                    },
                    "category": null,
                    "type": null,
                    "brand": null
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": 10,
            "total": 10
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/goods`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `condition` |  optional  | 商品名称
    `bn` |  optional  | 编码
    `marketable` |  optional  | 是否上架
    `is_del` |  optional  | 是否删除
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_7284dc020d27b9e996a97c77d295b761 -->

<!-- START_46e4f76988957ecf8faec7ab8c1269e7 -->
## create
创建

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/goods/create" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/goods/create"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/goods/create',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "cates": [
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 2
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 32,
                "pid": 1,
                "name": "|----|----短裤",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            },
            {
                "id": 33,
                "pid": 0,
                "name": "|----a",
                "status": 1
            },
            {
                "id": 34,
                "pid": 0,
                "name": "|----a",
                "status": 1
            }
        ],
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24"
            },
            {
                "id": 3,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 16:55:04",
                "updated_at": "2020-07-06 16:55:04"
            },
            {
                "id": 4,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 17:16:29",
                "updated_at": "2020-07-06 17:16:29"
            },
            {
                "id": 5,
                "name": "颜色",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-09 14:40:53",
                "updated_at": "2020-07-09 14:40:53"
            },
            {
                "id": 6,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:33:57",
                "updated_at": "2020-07-10 11:33:57"
            },
            {
                "id": 7,
                "name": "电脑",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:34:50",
                "updated_at": "2020-07-10 11:34:50"
            },
            {
                "id": 8,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:38",
                "updated_at": "2020-07-10 11:35:38"
            },
            {
                "id": 9,
                "name": "11",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:47",
                "updated_at": "2020-07-10 11:35:47"
            },
            {
                "id": 10,
                "name": "2",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:36:25",
                "updated_at": "2020-07-10 11:36:25"
            },
            {
                "id": 11,
                "name": "啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:40:58",
                "updated_at": "2020-07-10 11:40:58"
            },
            {
                "id": 12,
                "name": "啊啊",
                "sort": 11,
                "details": "",
                "created_at": "2020-07-10 11:41:38",
                "updated_at": "2020-07-10 11:41:38"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 12:01:30",
                "updated_at": "2020-07-10 12:01:30"
            },
            {
                "id": 14,
                "name": "啊实打实大撒",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:17:43",
                "updated_at": "2020-07-10 16:17:43"
            },
            {
                "id": 15,
                "name": "手表",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:19:24",
                "updated_at": "2020-07-10 16:19:24"
            },
            {
                "id": 16,
                "name": "码数",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-14 11:08:54",
                "updated_at": "2020-07-14 11:08:54"
            },
            {
                "id": 17,
                "name": "码数",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-14 17:27:28",
                "updated_at": "2020-07-14 17:27:28"
            }
        ],
        "brand": [
            {
                "id": 1,
                "name": "三星",
                "logo": "56",
                "sort": 111,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 15:21:26"
            },
            {
                "id": 2,
                "name": "1",
                "logo": "1",
                "sort": 99,
                "is_del": 0,
                "created_at": "2020-06-29 17:34:32",
                "updated_at": "2020-07-01 17:29:12"
            },
            {
                "id": 18,
                "name": "三星白",
                "logo": "1",
                "sort": 108,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:29:37"
            },
            {
                "id": 19,
                "name": "三星白",
                "logo": "1",
                "sort": 108,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:30:06"
            },
            {
                "id": 20,
                "name": "1",
                "logo": "58",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:42:20"
            },
            {
                "id": 21,
                "name": "12",
                "logo": "59",
                "sort": 12,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:43:09"
            },
            {
                "id": 22,
                "name": "2",
                "logo": "60",
                "sort": 2,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:45:52"
            },
            {
                "id": 23,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:07"
            },
            {
                "id": 24,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:17:47"
            },
            {
                "id": 25,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:18:32"
            },
            {
                "id": 26,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-07 11:09:20"
            },
            {
                "id": 27,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:21:40"
            },
            {
                "id": 28,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:49:07"
            },
            {
                "id": 29,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:23"
            },
            {
                "id": 30,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:03"
            },
            {
                "id": 31,
                "name": "三星白",
                "logo": "1",
                "sort": 88111,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:55:16"
            },
            {
                "id": 32,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:56:50"
            },
            {
                "id": 33,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:58:51"
            },
            {
                "id": 34,
                "name": "1",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-08 10:12:06"
            },
            {
                "id": 35,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:13"
            },
            {
                "id": 36,
                "name": "三星",
                "logo": "1",
                "sort": 100,
                "is_del": 0,
                "created_at": "2020-06-30 17:59:15",
                "updated_at": "2020-06-30 17:59:15"
            },
            {
                "id": 37,
                "name": "啊",
                "logo": "1",
                "sort": 101,
                "is_del": 0,
                "created_at": "2020-06-30 18:11:16",
                "updated_at": "2020-07-01 16:55:46"
            },
            {
                "id": 38,
                "name": "阿斯顿撒",
                "logo": "50",
                "sort": 123,
                "is_del": 0,
                "created_at": "2020-07-01 15:49:58",
                "updated_at": "2020-07-01 16:56:29"
            },
            {
                "id": 39,
                "name": "三星啊",
                "logo": "52",
                "sort": 123,
                "is_del": 0,
                "created_at": "2020-07-01 15:51:10",
                "updated_at": "2020-07-01 17:03:39"
            },
            {
                "id": 40,
                "name": "13",
                "logo": "53",
                "sort": 122,
                "is_del": 0,
                "created_at": "2020-07-01 15:52:24",
                "updated_at": "2020-07-01 17:25:35"
            },
            {
                "id": 41,
                "name": "三星",
                "logo": "1",
                "sort": 10123,
                "is_del": 1,
                "created_at": "2020-07-01 15:53:52",
                "updated_at": "2020-07-01 16:48:43"
            },
            {
                "id": 42,
                "name": "啊实打实大",
                "logo": "1",
                "sort": 123,
                "is_del": 1,
                "created_at": "2020-07-01 15:53:53",
                "updated_at": "2020-07-01 16:49:30"
            },
            {
                "id": 43,
                "name": "三星",
                "logo": "1",
                "sort": 1011,
                "is_del": 0,
                "created_at": "2020-07-01 15:55:05",
                "updated_at": "2020-07-01 16:46:37"
            },
            {
                "id": 44,
                "name": "123",
                "logo": "1",
                "sort": 123,
                "is_del": 0,
                "created_at": "2020-07-01 15:55:40",
                "updated_at": "2020-07-01 16:47:14"
            },
            {
                "id": 45,
                "name": "三星1",
                "logo": "1",
                "sort": 101,
                "is_del": 1,
                "created_at": "2020-07-01 16:01:41",
                "updated_at": "2020-07-02 18:35:05"
            },
            {
                "id": 46,
                "name": "三星",
                "logo": "1",
                "sort": 111,
                "is_del": 0,
                "created_at": "2020-07-01 16:06:20",
                "updated_at": "2020-07-01 16:45:27"
            },
            {
                "id": 47,
                "name": "啊",
                "logo": "86",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-07-07 10:58:24",
                "updated_at": "2020-07-10 15:28:27"
            },
            {
                "id": 48,
                "name": "1",
                "logo": "87",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-07-07 10:59:51",
                "updated_at": "2020-07-08 10:11:42"
            },
            {
                "id": 49,
                "name": "1",
                "logo": "88",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-07-07 11:01:10",
                "updated_at": "2020-07-07 11:09:26"
            },
            {
                "id": 50,
                "name": "已",
                "logo": "89",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-07-08 10:42:13",
                "updated_at": "2020-07-08 10:42:15"
            },
            {
                "id": 51,
                "name": "三星",
                "logo": "1",
                "sort": 100,
                "is_del": 0,
                "created_at": "2020-07-13 17:37:27",
                "updated_at": "2020-07-13 17:37:27"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/goods/create`


<!-- END_46e4f76988957ecf8faec7ab8c1269e7 -->

<!-- START_e79468003ac0f9a6ef5341017aa38b25 -->
## store
保存商品

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/goods" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u4e09\u661fS10 5G","brief":"\u8fd9\u662f\u4e00\u6b3e\u795e\u5947\u7684\u624b\u673a","price":3688,"costprice":0,"mktprice":0,"image_id":1,"pics":"[2,3,4]","goods_category_id":32,"goods_type_id":10,"brand_id":1,"marketable":1,"stock":100,"freeze_stock":100,"weight":123.5,"unit":"\u514b","introduction":"\u8fd9\u662f\u8be6\u60c5","sort":100,"is_recommend":1,"is_hot":2,"is_selected":2,"spec_list":"{\"key\":\"\u989c\u8272\",\"value\":[\"\u9ed1\u8272\",\"\u767d\u8272\"]},{\"key\":\"\u5185\u5b58\",\"value\":[\"2G\",\"8G\"]}","spec_desc":"{\"key\":\"\u989c\u8272\",\"value\":[\"\u9ed1\u8272\",\"\u767d\u8272\",\"\u91d1\u8272\"]},{\"key\":\"\u5185\u5b58\",\"value\":[\"2G\",\"4G\",\"8G]\"}","is_del":0,"products":"[{\"barcode\":\"\",\"price\":\"100\",\"costprice\":\"0\",\"mktprice\":\"0\",\"stock\":\"50\",\"freeze_stock\":\"5\",\"spec_params\":[{\"key\":\"\u989c\u8272\",\"value\":\"\u9ed1\u8272\"},{\"key\":\"\u5185\u5b58\",\"value\":\"2G\"}],\"is_default\":\"1\",\"image_id\":\"2\",\"is_del\":\"0\"},{\"barcode\":\"\",\"price\":\"120\",\"costprice\":\"0\",\"mktprice\":\"0\",\"stock\":\"10\",\"freeze_stock\":\"2\",\"spec_params\":[{\"key\":\"\u989c\u8272\",\"value\":\"\u9ed1\u8272\"},{\"key\":\"\u5185\u5b58\",\"value\":\"4G\"}],\"is_default\":\"2\",\"image_id\":\"3\",\"is_del\":\"0\"}]"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/goods"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u4e09\u661fS10 5G",
    "brief": "\u8fd9\u662f\u4e00\u6b3e\u795e\u5947\u7684\u624b\u673a",
    "price": 3688,
    "costprice": 0,
    "mktprice": 0,
    "image_id": 1,
    "pics": "[2,3,4]",
    "goods_category_id": 32,
    "goods_type_id": 10,
    "brand_id": 1,
    "marketable": 1,
    "stock": 100,
    "freeze_stock": 100,
    "weight": 123.5,
    "unit": "\u514b",
    "introduction": "\u8fd9\u662f\u8be6\u60c5",
    "sort": 100,
    "is_recommend": 1,
    "is_hot": 2,
    "is_selected": 2,
    "spec_list": "{\"key\":\"\u989c\u8272\",\"value\":[\"\u9ed1\u8272\",\"\u767d\u8272\"]},{\"key\":\"\u5185\u5b58\",\"value\":[\"2G\",\"8G\"]}",
    "spec_desc": "{\"key\":\"\u989c\u8272\",\"value\":[\"\u9ed1\u8272\",\"\u767d\u8272\",\"\u91d1\u8272\"]},{\"key\":\"\u5185\u5b58\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
    "is_del": 0,
    "products": "[{\"barcode\":\"\",\"price\":\"100\",\"costprice\":\"0\",\"mktprice\":\"0\",\"stock\":\"50\",\"freeze_stock\":\"5\",\"spec_params\":[{\"key\":\"\u989c\u8272\",\"value\":\"\u9ed1\u8272\"},{\"key\":\"\u5185\u5b58\",\"value\":\"2G\"}],\"is_default\":\"1\",\"image_id\":\"2\",\"is_del\":\"0\"},{\"barcode\":\"\",\"price\":\"120\",\"costprice\":\"0\",\"mktprice\":\"0\",\"stock\":\"10\",\"freeze_stock\":\"2\",\"spec_params\":[{\"key\":\"\u989c\u8272\",\"value\":\"\u9ed1\u8272\"},{\"key\":\"\u5185\u5b58\",\"value\":\"4G\"}],\"is_default\":\"2\",\"image_id\":\"3\",\"is_del\":\"0\"}]"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/goods',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '三星S10 5G',
            'brief' => '这是一款神奇的手机',
            'price' => 3688.0,
            'costprice' => 0.0,
            'mktprice' => 0.0,
            'image_id' => 1,
            'pics' => '[2,3,4]',
            'goods_category_id' => 32,
            'goods_type_id' => 10,
            'brand_id' => 1,
            'marketable' => 1,
            'stock' => 100,
            'freeze_stock' => 100,
            'weight' => 123.5,
            'unit' => '克',
            'introduction' => '这是详情',
            'sort' => 100,
            'is_recommend' => 1,
            'is_hot' => 2,
            'is_selected' => 2,
            'spec_list' => '{"key":"颜色","value":["黑色","白色"]},{"key":"内存","value":["2G","8G"]}',
            'spec_desc' => '{"key":"颜色","value":["黑色","白色","金色"]},{"key":"内存","value":["2G","4G","8G]"}',
            'is_del' => 0,
            'products' => '[{"barcode":"","price":"100","costprice":"0","mktprice":"0","stock":"50","freeze_stock":"5","spec_params":[{"key":"颜色","value":"黑色"},{"key":"内存","value":"2G"}],"is_default":"1","image_id":"2","is_del":"0"},{"barcode":"","price":"120","costprice":"0","mktprice":"0","stock":"10","freeze_stock":"2","spec_params":[{"key":"颜色","value":"黑色"},{"key":"内存","value":"4G"}],"is_default":"2","image_id":"3","is_del":"0"}]',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "创建成功",
    "data": {
        "goods": {
            "bn": "G_202007142919",
            "name": "三星S10 5G",
            "price": "100.00",
            "costprice": "0.00",
            "mktprice": "0.00",
            "image_id": "1",
            "pics": "",
            "goods_category_id": "32",
            "goods_type_id": "1",
            "brand_id": "1",
            "marketable": "1",
            "stock": 180,
            "freeze_stock": 30,
            "weight": "123.5",
            "unit": "克",
            "introduction": null,
            "sort": "100",
            "is_recommend": "2",
            "is_hot": "1",
            "label_ids": "",
            "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
            "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
            "up_at": "2020-07-14 10:22:05",
            "updated_at": "2020-07-14 10:22:05",
            "created_at": "2020-07-14 10:22:05",
            "id": 2,
            "product": [
                {
                    "id": 7,
                    "goods_id": 2,
                    "barcode": "P_2020071429191",
                    "sku_code": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "marketable": 1,
                    "stock": 50,
                    "freeze_stock": 5,
                    "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                    "is_default": 1,
                    "image_id": 2,
                    "created_at": "2020-07-14 10:22:05",
                    "updated_at": "2020-07-14 10:22:05",
                    "is_del": 0
                },
                {
                    "id": 8,
                    "goods_id": 2,
                    "barcode": "P_2020071429192",
                    "sku_code": "",
                    "price": "120.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "marketable": 1,
                    "stock": 10,
                    "freeze_stock": 2,
                    "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                    "is_default": 2,
                    "image_id": 3,
                    "created_at": "2020-07-14 10:22:05",
                    "updated_at": "2020-07-14 10:22:05",
                    "is_del": 0
                },
                {
                    "id": 9,
                    "goods_id": 2,
                    "barcode": "P_2020071429193",
                    "sku_code": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "marketable": 1,
                    "stock": 90,
                    "freeze_stock": 18,
                    "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                    "is_default": 2,
                    "image_id": 4,
                    "created_at": "2020-07-14 10:22:05",
                    "updated_at": "2020-07-14 10:22:05",
                    "is_del": 0
                },
                {
                    "id": 10,
                    "goods_id": 2,
                    "barcode": "P_2020071429194",
                    "sku_code": "",
                    "price": "150.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "marketable": 1,
                    "stock": 30,
                    "freeze_stock": 5,
                    "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"4G\"}]",
                    "is_default": 2,
                    "image_id": 5,
                    "created_at": "2020-07-14 10:22:05",
                    "updated_at": "2020-07-14 10:22:05",
                    "is_del": 0
                }
            ]
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/goods`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `bn` | string |  optional  | 商品编码
        `name` | string |  required  | 商品名称
        `brief` | string |  optional  | 商品简介
        `price` | float |  required  | 商品价格
        `costprice` | float |  required  | 成本价
        `mktprice` | float |  required  | 市场价
        `image_id` | integer |  required  | 商品主图
        `pics` | array |  required  | 商品图片
        `goods_category_id` | integer |  required  | 商品分类ID
        `goods_type_id` | integer |  required  | 商品类型ID
        `brand_id` | integer |  required  | 品牌ID
        `marketable` | integer |  optional  | 上架标志[1:上架, 2:下架]
        `stock` | integer |  optional  | 库存
        `freeze_stock` | integer |  optional  | 冻结库存
        `weight` | float |  optional  | 重量
        `unit` | string |  optional  | 单位
        `introduction` | longtext |  optional  | 商品详情
        `sort` | integer |  required  | 商品排序 越小越靠前
        `is_recommend` | integer |  optional  | 推荐标志[1:推荐,2:不推荐]
        `is_hot` | integer |  optional  | 热门标志[1:是,2:不是]
        `is_selected` | integer |  optional  | 精选标志[1:是,2:不是]
        `label_ids` | array |  optional  | 标签ID
        `spec_list` | varchar |  optional  | 商品规格-当前选中
        `spec_desc` | varchar |  optional  | 商品规格-所有
        `is_del` | integer |  optional  | 删除标志[0:正常, 1:删除]
        `products` | array |  optional  | 规格详情
    
<!-- END_e79468003ac0f9a6ef5341017aa38b25 -->

<!-- START_ed85519e9616ded56819a141d5046f81 -->
## show
查询商品(单一)

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/goods/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/goods/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/goods/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "goods": [
            {
                "id": 1,
                "bn": "",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": [
                    {
                        "id": 6,
                        "name": "601韵动钻石之花健身操队",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:38:09",
                        "updated_at": "2020-06-29 15:38:09"
                    },
                    {
                        "id": 8,
                        "name": "601韵动钻石之花健身操队2",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                        "path": "20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:38:11",
                        "updated_at": "2020-06-29 15:38:11"
                    },
                    {
                        "id": 9,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                        "path": "20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:39:48",
                        "updated_at": "2020-06-29 15:39:48"
                    }
                ],
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-22 15:21:15",
                "product": [
                    {
                        "id": 1,
                        "goods_id": 1,
                        "sku_code": "",
                        "sn": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "freight_amount": "0.00",
                        "marketable": 1,
                        "stock": 50,
                        "freeze_stock": 5,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 1,
                        "image_id": 2,
                        "is_del": 0,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-22 15:21:15"
                    },
                    {
                        "id": 3,
                        "goods_id": 1,
                        "sku_code": "",
                        "sn": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "freight_amount": "0.00",
                        "marketable": 1,
                        "stock": 90,
                        "freeze_stock": 18,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 2,
                        "image_id": 4,
                        "is_del": 0,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-22 15:21:15"
                    },
                    {
                        "id": 15,
                        "goods_id": 1,
                        "sku_code": "",
                        "sn": "P7",
                        "price": "120.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "freight_amount": "0.00",
                        "marketable": 1,
                        "stock": 10,
                        "freeze_stock": 2,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 7,
                        "is_del": 0,
                        "created_at": "2020-07-22 15:21:15",
                        "updated_at": "2020-07-22 15:21:15"
                    },
                    {
                        "id": 16,
                        "goods_id": 1,
                        "sku_code": "",
                        "sn": "P8",
                        "price": "150.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "freight_amount": "0.00",
                        "marketable": 1,
                        "stock": 40,
                        "freeze_stock": 15,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 6,
                        "is_del": 0,
                        "created_at": "2020-07-22 15:21:15",
                        "updated_at": "2020-07-22 15:21:15"
                    }
                ],
                "image": {
                    "id": 1,
                    "name": "三星logo",
                    "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                    "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                    "is_del": 0,
                    "created_at": "2020-06-29 15:25:54",
                    "updated_at": "2020-06-29 15:25:54"
                },
                "category": {
                    "id": 2,
                    "pid": 1,
                    "name": "T恤啊啊",
                    "goods_type_id": 3,
                    "sort": 100,
                    "image_id": 80,
                    "status": 2,
                    "created_at": null,
                    "updated_at": "2020-07-07 10:15:38"
                },
                "type": {
                    "id": 1,
                    "name": "手机",
                    "sort": 100,
                    "created_at": "2020-07-06 16:55:33",
                    "updated_at": "2020-07-06 16:55:33"
                },
                "brand": {
                    "id": 1,
                    "name": "三星",
                    "logo": "56",
                    "sort": 111,
                    "is_del": 1,
                    "created_at": "2020-06-29 14:31:19",
                    "updated_at": "2020-07-02 15:21:26"
                }
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/goods/{good}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `good` |  required  | 商品ID

<!-- END_ed85519e9616ded56819a141d5046f81 -->

<!-- START_513ca9924fd55fb4467a47fb4a5925db -->
## edit
编辑商品

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/goods/1/edit" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/goods/1/edit"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/goods/1/edit',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "cates": [
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 2
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 32,
                "pid": 1,
                "name": "|----|----短裤",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            },
            {
                "id": 33,
                "pid": 0,
                "name": "|----a",
                "status": 1
            },
            {
                "id": 34,
                "pid": 0,
                "name": "|----a",
                "status": 1
            }
        ],
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24"
            },
            {
                "id": 3,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 16:55:04",
                "updated_at": "2020-07-06 16:55:04"
            },
            {
                "id": 4,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 17:16:29",
                "updated_at": "2020-07-06 17:16:29"
            },
            {
                "id": 5,
                "name": "颜色",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-09 14:40:53",
                "updated_at": "2020-07-09 14:40:53"
            },
            {
                "id": 6,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:33:57",
                "updated_at": "2020-07-10 11:33:57"
            },
            {
                "id": 7,
                "name": "电脑",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:34:50",
                "updated_at": "2020-07-10 11:34:50"
            },
            {
                "id": 8,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:38",
                "updated_at": "2020-07-10 11:35:38"
            },
            {
                "id": 9,
                "name": "11",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:47",
                "updated_at": "2020-07-10 11:35:47"
            },
            {
                "id": 10,
                "name": "2",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:36:25",
                "updated_at": "2020-07-10 11:36:25"
            },
            {
                "id": 11,
                "name": "啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:40:58",
                "updated_at": "2020-07-10 11:40:58"
            },
            {
                "id": 12,
                "name": "啊啊",
                "sort": 11,
                "details": "",
                "created_at": "2020-07-10 11:41:38",
                "updated_at": "2020-07-10 11:41:38"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 12:01:30",
                "updated_at": "2020-07-10 12:01:30"
            },
            {
                "id": 14,
                "name": "啊实打实大撒",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:17:43",
                "updated_at": "2020-07-10 16:17:43"
            },
            {
                "id": 15,
                "name": "手表",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:19:24",
                "updated_at": "2020-07-10 16:19:24"
            },
            {
                "id": 16,
                "name": "码数",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-14 11:08:54",
                "updated_at": "2020-07-14 11:08:54"
            },
            {
                "id": 17,
                "name": "码数",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-14 17:27:28",
                "updated_at": "2020-07-14 17:27:28"
            }
        ],
        "brand": [
            {
                "id": 1,
                "name": "三星",
                "logo": "56",
                "sort": 111,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 15:21:26"
            },
            {
                "id": 2,
                "name": "1",
                "logo": "1",
                "sort": 99,
                "is_del": 0,
                "created_at": "2020-06-29 17:34:32",
                "updated_at": "2020-07-01 17:29:12"
            },
            {
                "id": 18,
                "name": "三星白",
                "logo": "1",
                "sort": 108,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:29:37"
            },
            {
                "id": 19,
                "name": "三星白",
                "logo": "1",
                "sort": 108,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:30:06"
            },
            {
                "id": 20,
                "name": "1",
                "logo": "58",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:42:20"
            },
            {
                "id": 21,
                "name": "12",
                "logo": "59",
                "sort": 12,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:43:09"
            },
            {
                "id": 22,
                "name": "2",
                "logo": "60",
                "sort": 2,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:45:52"
            },
            {
                "id": 23,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:07"
            },
            {
                "id": 24,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:17:47"
            },
            {
                "id": 25,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:18:32"
            },
            {
                "id": 26,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-07 11:09:20"
            },
            {
                "id": 27,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:21:40"
            },
            {
                "id": 28,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:49:07"
            },
            {
                "id": 29,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:23"
            },
            {
                "id": 30,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:03"
            },
            {
                "id": 31,
                "name": "三星白",
                "logo": "1",
                "sort": 88111,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:55:16"
            },
            {
                "id": 32,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:56:50"
            },
            {
                "id": 33,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:58:51"
            },
            {
                "id": 34,
                "name": "1",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-08 10:12:06"
            },
            {
                "id": 35,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:13"
            },
            {
                "id": 36,
                "name": "三星",
                "logo": "1",
                "sort": 100,
                "is_del": 0,
                "created_at": "2020-06-30 17:59:15",
                "updated_at": "2020-06-30 17:59:15"
            },
            {
                "id": 37,
                "name": "啊",
                "logo": "1",
                "sort": 101,
                "is_del": 0,
                "created_at": "2020-06-30 18:11:16",
                "updated_at": "2020-07-01 16:55:46"
            },
            {
                "id": 38,
                "name": "阿斯顿撒",
                "logo": "50",
                "sort": 123,
                "is_del": 0,
                "created_at": "2020-07-01 15:49:58",
                "updated_at": "2020-07-01 16:56:29"
            },
            {
                "id": 39,
                "name": "三星啊",
                "logo": "52",
                "sort": 123,
                "is_del": 0,
                "created_at": "2020-07-01 15:51:10",
                "updated_at": "2020-07-01 17:03:39"
            },
            {
                "id": 40,
                "name": "13",
                "logo": "53",
                "sort": 122,
                "is_del": 0,
                "created_at": "2020-07-01 15:52:24",
                "updated_at": "2020-07-01 17:25:35"
            },
            {
                "id": 41,
                "name": "三星",
                "logo": "1",
                "sort": 10123,
                "is_del": 1,
                "created_at": "2020-07-01 15:53:52",
                "updated_at": "2020-07-01 16:48:43"
            },
            {
                "id": 42,
                "name": "啊实打实大",
                "logo": "1",
                "sort": 123,
                "is_del": 1,
                "created_at": "2020-07-01 15:53:53",
                "updated_at": "2020-07-01 16:49:30"
            },
            {
                "id": 43,
                "name": "三星",
                "logo": "1",
                "sort": 1011,
                "is_del": 0,
                "created_at": "2020-07-01 15:55:05",
                "updated_at": "2020-07-01 16:46:37"
            },
            {
                "id": 44,
                "name": "123",
                "logo": "1",
                "sort": 123,
                "is_del": 0,
                "created_at": "2020-07-01 15:55:40",
                "updated_at": "2020-07-01 16:47:14"
            },
            {
                "id": 45,
                "name": "三星1",
                "logo": "1",
                "sort": 101,
                "is_del": 1,
                "created_at": "2020-07-01 16:01:41",
                "updated_at": "2020-07-02 18:35:05"
            },
            {
                "id": 46,
                "name": "三星",
                "logo": "1",
                "sort": 111,
                "is_del": 0,
                "created_at": "2020-07-01 16:06:20",
                "updated_at": "2020-07-01 16:45:27"
            },
            {
                "id": 47,
                "name": "啊",
                "logo": "86",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-07-07 10:58:24",
                "updated_at": "2020-07-10 15:28:27"
            },
            {
                "id": 48,
                "name": "1",
                "logo": "87",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-07-07 10:59:51",
                "updated_at": "2020-07-08 10:11:42"
            },
            {
                "id": 49,
                "name": "1",
                "logo": "88",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-07-07 11:01:10",
                "updated_at": "2020-07-07 11:09:26"
            },
            {
                "id": 50,
                "name": "已",
                "logo": "89",
                "sort": 1,
                "is_del": 1,
                "created_at": "2020-07-08 10:42:13",
                "updated_at": "2020-07-08 10:42:15"
            },
            {
                "id": 51,
                "name": "三星",
                "logo": "1",
                "sort": 100,
                "is_del": 0,
                "created_at": "2020-07-13 17:37:27",
                "updated_at": "2020-07-13 17:37:27"
            }
        ],
        "goods": [
            {
                "id": 1,
                "bn": "",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": [
                    {
                        "id": 6,
                        "name": "601韵动钻石之花健身操队",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "path": "20200629\/3c0d21876ac64f8267765e05b6f3df29.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:38:09",
                        "updated_at": "2020-06-29 15:38:09"
                    },
                    {
                        "id": 8,
                        "name": "601韵动钻石之花健身操队2",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                        "path": "20200629\/54f0364db6501e4cfbce90e9f2f4b634.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:38:11",
                        "updated_at": "2020-06-29 15:38:11"
                    },
                    {
                        "id": 9,
                        "name": "三星logo",
                        "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                        "path": "20200629\/29ce5b702341e2f6f59b06fe36666be5.jpg",
                        "is_del": 0,
                        "created_at": "2020-06-29 15:39:48",
                        "updated_at": "2020-06-29 15:39:48"
                    }
                ],
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-22 15:21:15",
                "product": [
                    {
                        "id": 1,
                        "goods_id": 1,
                        "sku_code": "",
                        "sn": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "freight_amount": "0.00",
                        "marketable": 1,
                        "stock": 50,
                        "freeze_stock": 5,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 1,
                        "image_id": 2,
                        "is_del": 0,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-22 15:21:15"
                    },
                    {
                        "id": 3,
                        "goods_id": 1,
                        "sku_code": "",
                        "sn": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "freight_amount": "0.00",
                        "marketable": 1,
                        "stock": 90,
                        "freeze_stock": 18,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 2,
                        "image_id": 4,
                        "is_del": 0,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-22 15:21:15"
                    },
                    {
                        "id": 15,
                        "goods_id": 1,
                        "sku_code": "",
                        "sn": "P7",
                        "price": "120.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "freight_amount": "0.00",
                        "marketable": 1,
                        "stock": 10,
                        "freeze_stock": 2,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 7,
                        "is_del": 0,
                        "created_at": "2020-07-22 15:21:15",
                        "updated_at": "2020-07-22 15:21:15"
                    },
                    {
                        "id": 16,
                        "goods_id": 1,
                        "sku_code": "",
                        "sn": "P8",
                        "price": "150.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "freight_amount": "0.00",
                        "marketable": 1,
                        "stock": 40,
                        "freeze_stock": 15,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 6,
                        "is_del": 0,
                        "created_at": "2020-07-22 15:21:15",
                        "updated_at": "2020-07-22 15:21:15"
                    }
                ],
                "image": {
                    "id": 1,
                    "name": "三星logo",
                    "url": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                    "path": "20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                    "is_del": 0,
                    "created_at": "2020-06-29 15:25:54",
                    "updated_at": "2020-06-29 15:25:54"
                }
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/goods/{good}/edit`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `good` |  required  | 商品ID

<!-- END_513ca9924fd55fb4467a47fb4a5925db -->

<!-- START_9df4b98e5c8fb8d7e6f3b3d052edb18e -->
## update
更新商品

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/goods/2" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u4e09\u661fS10 5G","brief":"\u8fd9\u662f\u4e00\u6b3e\u795e\u5947\u7684\u624b\u673a","price":3688,"costprice":0,"mktprice":0,"image_id":1,"pics":"[2,3,4]","goods_category_id":32,"goods_type_id":10,"brand_id":1,"marketable":1,"stock":100,"freeze_stock":100,"weight":123.5,"unit":"\u514b","introduction":"\u8fd9\u662f\u8be6\u60c5","sort":100,"is_recommend":1,"is_hot":2,"is_selected":2,"spec_list":"{\"key\":\"\u989c\u8272\",\"value\":[\"\u9ed1\u8272\",\"\u767d\u8272\"]},{\"key\":\"\u5185\u5b58\",\"value\":[\"2G\",\"8G\"]}","spec_desc":"{\"key\":\"\u989c\u8272\",\"value\":[\"\u9ed1\u8272\",\"\u767d\u8272\",\"\u91d1\u8272\"]},{\"key\":\"\u5185\u5b58\",\"value\":[\"2G\",\"4G\",\"8G]\"}","is_del":0,"products":"[{\"barcode\":\"\",\"price\":\"100\",\"costprice\":\"0\",\"mktprice\":\"0\",\"stock\":\"50\",\"freeze_stock\":\"5\",\"spec_params\":[{\"key\":\"\u989c\u8272\",\"value\":\"\u9ed1\u8272\"},{\"key\":\"\u5185\u5b58\",\"value\":\"2G\"}],\"is_default\":\"1\",\"image_id\":\"2\",\"is_del\":\"0\"},{\"barcode\":\"\",\"price\":\"120\",\"costprice\":\"0\",\"mktprice\":\"0\",\"stock\":\"10\",\"freeze_stock\":\"2\",\"spec_params\":[{\"key\":\"\u989c\u8272\",\"value\":\"\u9ed1\u8272\"},{\"key\":\"\u5185\u5b58\",\"value\":\"4G\"}],\"is_default\":\"2\",\"image_id\":\"3\",\"is_del\":\"0\"}]"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/goods/2"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u4e09\u661fS10 5G",
    "brief": "\u8fd9\u662f\u4e00\u6b3e\u795e\u5947\u7684\u624b\u673a",
    "price": 3688,
    "costprice": 0,
    "mktprice": 0,
    "image_id": 1,
    "pics": "[2,3,4]",
    "goods_category_id": 32,
    "goods_type_id": 10,
    "brand_id": 1,
    "marketable": 1,
    "stock": 100,
    "freeze_stock": 100,
    "weight": 123.5,
    "unit": "\u514b",
    "introduction": "\u8fd9\u662f\u8be6\u60c5",
    "sort": 100,
    "is_recommend": 1,
    "is_hot": 2,
    "is_selected": 2,
    "spec_list": "{\"key\":\"\u989c\u8272\",\"value\":[\"\u9ed1\u8272\",\"\u767d\u8272\"]},{\"key\":\"\u5185\u5b58\",\"value\":[\"2G\",\"8G\"]}",
    "spec_desc": "{\"key\":\"\u989c\u8272\",\"value\":[\"\u9ed1\u8272\",\"\u767d\u8272\",\"\u91d1\u8272\"]},{\"key\":\"\u5185\u5b58\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
    "is_del": 0,
    "products": "[{\"barcode\":\"\",\"price\":\"100\",\"costprice\":\"0\",\"mktprice\":\"0\",\"stock\":\"50\",\"freeze_stock\":\"5\",\"spec_params\":[{\"key\":\"\u989c\u8272\",\"value\":\"\u9ed1\u8272\"},{\"key\":\"\u5185\u5b58\",\"value\":\"2G\"}],\"is_default\":\"1\",\"image_id\":\"2\",\"is_del\":\"0\"},{\"barcode\":\"\",\"price\":\"120\",\"costprice\":\"0\",\"mktprice\":\"0\",\"stock\":\"10\",\"freeze_stock\":\"2\",\"spec_params\":[{\"key\":\"\u989c\u8272\",\"value\":\"\u9ed1\u8272\"},{\"key\":\"\u5185\u5b58\",\"value\":\"4G\"}],\"is_default\":\"2\",\"image_id\":\"3\",\"is_del\":\"0\"}]"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/goods/2',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '三星S10 5G',
            'brief' => '这是一款神奇的手机',
            'price' => 3688.0,
            'costprice' => 0.0,
            'mktprice' => 0.0,
            'image_id' => 1,
            'pics' => '[2,3,4]',
            'goods_category_id' => 32,
            'goods_type_id' => 10,
            'brand_id' => 1,
            'marketable' => 1,
            'stock' => 100,
            'freeze_stock' => 100,
            'weight' => 123.5,
            'unit' => '克',
            'introduction' => '这是详情',
            'sort' => 100,
            'is_recommend' => 1,
            'is_hot' => 2,
            'is_selected' => 2,
            'spec_list' => '{"key":"颜色","value":["黑色","白色"]},{"key":"内存","value":["2G","8G"]}',
            'spec_desc' => '{"key":"颜色","value":["黑色","白色","金色"]},{"key":"内存","value":["2G","4G","8G]"}',
            'is_del' => 0,
            'products' => '[{"barcode":"","price":"100","costprice":"0","mktprice":"0","stock":"50","freeze_stock":"5","spec_params":[{"key":"颜色","value":"黑色"},{"key":"内存","value":"2G"}],"is_default":"1","image_id":"2","is_del":"0"},{"barcode":"","price":"120","costprice":"0","mktprice":"0","stock":"10","freeze_stock":"2","spec_params":[{"key":"颜色","value":"黑色"},{"key":"内存","value":"4G"}],"is_default":"2","image_id":"3","is_del":"0"}]',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "更新成功",
    "data": {
        "goods": [
            {
                "id": 1,
                "bn": "G_202007091799",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 190,
                "freeze_stock": 40,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-09 18:22:34",
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "created_at": "2020-07-09 18:22:34",
                "updated_at": "2020-07-09 18:34:50",
                "is_del": 1,
                "product": [
                    {
                        "id": 1,
                        "goods_id": 1,
                        "barcode": "",
                        "sku_code": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 50,
                        "freeze_stock": 5,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 1,
                        "image_id": 2,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 3,
                        "goods_id": 1,
                        "barcode": "",
                        "sku_code": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 90,
                        "freeze_stock": 18,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 2,
                        "image_id": 4,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 5,
                        "goods_id": 1,
                        "barcode": "P__2020070917995",
                        "sku_code": "",
                        "price": "120.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 10,
                        "freeze_stock": 2,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 7,
                        "created_at": "2020-07-09 18:22:41",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 6,
                        "goods_id": 1,
                        "barcode": "P__2020070917996",
                        "sku_code": "",
                        "price": "150.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 40,
                        "freeze_stock": 15,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 6,
                        "created_at": "2020-07-09 18:22:41",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`PUT admin-api/admin/goods/{good}`

`PATCH admin-api/admin/goods/{good}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `good` |  required  | 商品ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `bn` | string |  optional  | 商品编码
        `name` | string |  required  | 商品名称
        `brief` | string |  optional  | 商品简介
        `price` | float |  required  | 商品价格
        `costprice` | float |  required  | 成本价
        `mktprice` | float |  required  | 市场价
        `image_id` | integer |  required  | 商品主图
        `pics` | array |  required  | 商品图片
        `goods_category_id` | integer |  required  | 商品分类ID
        `goods_type_id` | integer |  required  | 商品类型ID
        `brand_id` | integer |  required  | 品牌ID
        `marketable` | integer |  optional  | 上架标志[1:上架, 2:下架]
        `stock` | integer |  optional  | 库存
        `freeze_stock` | integer |  optional  | 冻结库存
        `weight` | float |  optional  | 重量
        `unit` | string |  optional  | 单位
        `introduction` | longtext |  optional  | 商品详情
        `sort` | integer |  required  | 商品排序 越小越靠前
        `is_recommend` | integer |  optional  | 推荐标志[1:推荐,2:不推荐]
        `is_hot` | integer |  optional  | 热门标志[1:是,2:不是]
        `is_selected` | integer |  optional  | 精选标志[1:是,2:不是]
        `label_ids` | array |  optional  | 标签ID
        `spec_list` | varchar |  optional  | 商品规格-当前选中
        `spec_desc` | varchar |  optional  | 商品规格-所有
        `is_del` | integer |  optional  | 删除标志[0:正常, 1:删除]
        `products` | array |  optional  | 规格详情
    
<!-- END_9df4b98e5c8fb8d7e6f3b3d052edb18e -->

<!-- START_0e7ca44b274b1c083d1358c699b1c923 -->
## delete
删除商品

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/goods/2" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/goods/2"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/goods/2',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "删除成功",
    "data": {
        "goods": [
            {
                "id": 1,
                "bn": "G_202007091799",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 190,
                "freeze_stock": 40,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-09 18:22:34",
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "created_at": "2020-07-09 18:22:34",
                "updated_at": "2020-07-09 18:34:50",
                "is_del": 1,
                "product": [
                    {
                        "id": 1,
                        "goods_id": 1,
                        "barcode": "",
                        "sku_code": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 50,
                        "freeze_stock": 5,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 1,
                        "image_id": 2,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 3,
                        "goods_id": 1,
                        "barcode": "",
                        "sku_code": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 90,
                        "freeze_stock": 18,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 2,
                        "image_id": 4,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 5,
                        "goods_id": 1,
                        "barcode": "P__2020070917995",
                        "sku_code": "",
                        "price": "120.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 10,
                        "freeze_stock": 2,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 7,
                        "created_at": "2020-07-09 18:22:41",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 6,
                        "goods_id": 1,
                        "barcode": "P__2020070917996",
                        "sku_code": "",
                        "price": "150.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 40,
                        "freeze_stock": 15,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 6,
                        "created_at": "2020-07-09 18:22:41",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`DELETE admin-api/admin/goods/{good}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `good` |  required  | 商品ID

<!-- END_0e7ca44b274b1c083d1358c699b1c923 -->

<!-- START_3431e9b60f9448204cb04338396d69b8 -->
## set
设置商品属性

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/goods/attr/2?key=marketable&value=2" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/goods/attr/2"
);

let params = {
    "key": "marketable",
    "value": "2",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/goods/attr/2',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'key'=> 'marketable',
            'value'=> '2',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "设置成功",
    "data": {
        "goods": {
            "id": 2,
            "bn": "",
            "name": "2号衣服",
            "brief": "",
            "price": "210.00",
            "costprice": "110.00",
            "mktprice": "230.00",
            "freight_amount": "0.00",
            "image_id": 6,
            "pics": "6,8,9",
            "goods_category_id": 1,
            "goods_type_id": 5,
            "brand_id": 0,
            "marketable": "2",
            "stock": 0,
            "freeze_stock": 0,
            "weight": null,
            "unit": null,
            "introduction": null,
            "comments_count": 0,
            "view_count": 0,
            "buy_count": 0,
            "up_at": null,
            "down_at": null,
            "sort": 100,
            "is_recommend": 1,
            "is_hot": 1,
            "is_selected": 2,
            "label_ids": "",
            "spec_list": null,
            "spec_desc": null,
            "is_del": 0,
            "created_at": null,
            "updated_at": "2020-08-14 16:48:05"
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/goods/attr/{good}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `good` |  required  | 商品ID
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `key` |  required  | 设置的字段名[marketable,is_recommend,is_hot,is_selected]
    `value` |  optional  | 设置的字段值[1:(上架or是),2:(下架or否)]

<!-- END_3431e9b60f9448204cb04338396d69b8 -->

#Logistics

物流公司接口
<!-- START_5f8a5722fd5dc1f3af0fe1b2c6ee71f0 -->
## index
物流公司列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/logi?per_page=10&current_page=1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/logi"
);

let params = {
    "per_page": "10",
    "current_page": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/logi',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'per_page'=> '10',
            'current_page'=> '1',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "logistics": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "sort": 1,
                    "created_at": "2020-07-17 11:44:44",
                    "updated_at": "2020-07-17 11:51:57"
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": 1,
            "total": 1
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/logi`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  optional  | 物流公司名称
    `code` |  optional  | 物流公司编码
    `per_page` |  required  | 每页显示数量
    `current_page` |  required  | 当前页

<!-- END_5f8a5722fd5dc1f3af0fe1b2c6ee71f0 -->

<!-- START_20d7b0515ec699cec2ad23908b99eab3 -->
## store
保存

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/logi" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"logi_name":"\u987a\u4e30\u901f\u8fd0","logi_code":"SF-Express","sort":"100"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/logi"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "logi_name": "\u987a\u4e30\u901f\u8fd0",
    "logi_code": "SF-Express",
    "sort": "100"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/logi',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'logi_name' => '顺丰速运',
            'logi_code' => 'SF-Express',
            'sort' => '100',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "创建成功",
    "data": {
        "logistics": {
            "logi_name": "顺丰速运",
            "logi_code": "SF-Express",
            "sort": "100",
            "updated_at": "2020-07-17 11:44:44",
            "created_at": "2020-07-17 11:44:44",
            "id": 1
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/logi`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `logi_name` | string |  required  | 物流公司名称
        `logi_code` | string |  required  | 物流公司编码
        `sort` | numeric |  required  | 排序
    
<!-- END_20d7b0515ec699cec2ad23908b99eab3 -->

<!-- START_0e383798b39608065d436c9e1b18b9d8 -->
## edit
编辑

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/logi/1/edit" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/logi/1/edit"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/logi/1/edit',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "logistics": [
            {
                "id": 1,
                "logi_name": "顺丰速运",
                "logi_code": "SF-Express",
                "sort": 1,
                "created_at": "2020-07-17 11:44:44",
                "updated_at": "2020-07-17 11:51:57"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/logi/{logi}/edit`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `logi` |  required  | 物流ID

<!-- END_0e383798b39608065d436c9e1b18b9d8 -->

<!-- START_24b72c23fad2227c019e96eed9746aff -->
## update
更新

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/logi/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"logi_name":"\u987a\u4e30\u901f\u8fd0","logi_code":"SF-Express","sort":"100"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/logi/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "logi_name": "\u987a\u4e30\u901f\u8fd0",
    "logi_code": "SF-Express",
    "sort": "100"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/logi/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'logi_name' => '顺丰速运',
            'logi_code' => 'SF-Express',
            'sort' => '100',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "更新成功",
    "data": {
        "logistics": {
            "logi_name": "顺丰速运",
            "logi_code": "SF-Express",
            "sort": "100",
            "updated_at": "2020-07-17 11:44:44",
            "created_at": "2020-07-17 11:44:44",
            "id": 1
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/logi/{logi}`

`PATCH admin-api/admin/logi/{logi}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `logi` |  required  | 物流ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `logi_name` | string |  required  | 物流公司名称
        `logi_code` | string |  required  | 物流公司编码
        `sort` | numeric |  required  | 排序
    
<!-- END_24b72c23fad2227c019e96eed9746aff -->

<!-- START_ff163b2850ed79144730427b5d55ae99 -->
## delete
删除物流公司

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/logi/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/logi/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/logi/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "删除成功",
    "data": []
}
```

### HTTP Request
`DELETE admin-api/admin/logi/{logi}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `logi` |  required  | 物流ID

<!-- END_ff163b2850ed79144730427b5d55ae99 -->

#Order

订单接口
<!-- START_e75f64b27267b678c0f3dd07bc5ea4da -->
## index
订单列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/order?per_page=10&current_page=1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/order"
);

let params = {
    "per_page": "10",
    "current_page": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/order',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'per_page'=> '10',
            'current_page'=> '1',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "orders": {
            "current_page": 1,
            "data": [],
            "first_page_url": "\/?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/order`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `order_id` |  optional  | 订单ID
    `date_range` |  optional  | 日期区间
    `order_type` |  optional  | 订单类型[1:普通,2:秒杀,3:拼团]
    `name_or_mobile` |  optional  | 用户昵称或电话
    `ship_mobile` |  optional  | 收货人电话
    `per_page` |  required  | 每页显示数量
    `current_page` |  required  | 当前页

<!-- END_e75f64b27267b678c0f3dd07bc5ea4da -->

<!-- START_a3d135de30676bde29b57319cfd9073f -->
## show
查询订单

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/order/culpa" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/order/culpa"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/order/culpa',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": -1,
    "message": "该订单不存在",
    "data": []
}
```

### HTTP Request
`GET admin-api/admin/order/{order}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `order` |  required  | 订单ID

<!-- END_a3d135de30676bde29b57319cfd9073f -->

<!-- START_4ea3f5e193ec8a728e89b7df8cb0f7c2 -->
## edit
编辑订单

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/order/culpa/edit" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/order/culpa/edit"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/order/culpa/edit',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": -1,
    "message": "该订单不存在",
    "data": []
}
```

### HTTP Request
`GET admin-api/admin/order/{order}/edit`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `order` |  required  | 订单ID

<!-- END_4ea3f5e193ec8a728e89b7df8cb0f7c2 -->

<!-- START_f27bf893692c2914110d46fa19fc817b -->
## update
更新订单

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/order/20200727123340order001835" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"ship_area_code":"9","ship_address":"1\u53f7","ship_name":"\u5f90\u5176\u9633","ship_mobile":"18107120122"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/order/20200727123340order001835"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "ship_area_code": "9",
    "ship_address": "1\u53f7",
    "ship_name": "\u5f90\u5176\u9633",
    "ship_mobile": "18107120122"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/order/20200727123340order001835',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'ship_area_code' => '9',
            'ship_address' => '1号',
            'ship_name' => '徐其阳',
            'ship_mobile' => '18107120122',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "更新成功",
    "data": {
        "order": {
            "order_id": "20200727123340order001835",
            "total_amount": "860.00",
            "payed_amount": "860.00",
            "freight_amount": "10.00",
            "promotion_amount": "0.00",
            "coupon_amount": "0.00",
            "pay_status": 1,
            "ship_status": 3,
            "status": 1,
            "order_type": 1,
            "payment_time": null,
            "confirm_time": null,
            "logistics_id": null,
            "logistics_name": null,
            "cost_freight": "0.00",
            "user_id": 1,
            "confirm": 1,
            "ship_area_code": "9",
            "ship_address": "1号",
            "ship_name": "徐其阳",
            "ship_mobile": "18107120122",
            "weight": 0,
            "order_pmt": "0.00",
            "goods_pmt": "0.00",
            "coupon_pmt": "0.00",
            "coupon_list": null,
            "promotion_list": null,
            "memo": null,
            "ip": null,
            "mark": null,
            "is_comment": 1,
            "created_at": "2020-07-27 12:33:40",
            "updated_at": "2020-07-29 17:58:36",
            "is_del": 0
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/order/{order}`

`PATCH admin-api/admin/order/{order}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `order` |  required  | 订单ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `ship_area_code` | required |  optional  | 收货人地址ID
        `ship_address` | required |  optional  | 收货人详细地址
        `ship_name` | required |  optional  | 收货人姓名
        `ship_mobile` | required |  optional  | 收货人电话
    
<!-- END_f27bf893692c2914110d46fa19fc817b -->

<!-- START_6476c266a2e2af22f030a31a604bc611 -->
## ship_
发货

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/order/ship/20200727123340order001835" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"ship_area_code":"9","ship_address":"1\u53f7","ship_name":"\u5f90\u5176\u9633","ship_mobile":"18107120122","send_nums":"18107120122","logi_id":"18107120122","logi_no":"18107120122"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/order/ship/20200727123340order001835"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "ship_area_code": "9",
    "ship_address": "1\u53f7",
    "ship_name": "\u5f90\u5176\u9633",
    "ship_mobile": "18107120122",
    "send_nums": "18107120122",
    "logi_id": "18107120122",
    "logi_no": "18107120122"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/order/ship/20200727123340order001835',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'ship_area_code' => '9',
            'ship_address' => '1号',
            'ship_name' => '徐其阳',
            'ship_mobile' => '18107120122',
            'send_nums' => '18107120122',
            'logi_id' => '18107120122',
            'logi_no' => '18107120122',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "发货成功",
    "data": []
}
```

### HTTP Request
`POST admin-api/admin/order/ship/{order}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `order` |  required  | 订单ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `ship_area_code` | required |  optional  | 收货人地址ID
        `ship_address` | required |  optional  | 收货人详细地址
        `ship_name` | required |  optional  | 收货人姓名
        `ship_mobile` | required |  optional  | 收货人电话
        `send_nums` | required |  optional  | 发货数量
        `logi_id` | required |  optional  | 物流公司
        `logi_no` | required |  optional  | 物流单号
    
<!-- END_6476c266a2e2af22f030a31a604bc611 -->

#Promotion

促销接口
<!-- START_35f3b107a2b5876462953a19dec3a401 -->
## index
促销列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/promotion?current_page=1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/promotion"
);

let params = {
    "current_page": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/promotion',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "promotions": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "name": "元旦促销",
                    "exclusive": 1,
                    "status": 1,
                    "condition_code": "GOODS_IDS",
                    "condition_params": "1,2,3",
                    "result_code": "GOODS_DISCOUNT",
                    "result_params": "{\"discount\":77}",
                    "description": "这是一个元旦促销活动",
                    "sort": 100,
                    "start_time": "2020-07-01 00:00:00",
                    "end_time": "2020-08-31 00:00:00",
                    "is_del": 0,
                    "created_at": "2020-07-16 17:42:44",
                    "updated_at": "2020-07-16 17:52:45"
                },
                {
                    "id": 2,
                    "name": "元旦促销",
                    "exclusive": 1,
                    "status": 1,
                    "condition_code": "GOODS_IDS",
                    "condition_params": "1,2,3",
                    "result_code": "GOODS_DISCOUNT",
                    "result_params": "{\"discount\":77}",
                    "description": "这是一个元旦促销活动",
                    "sort": 100,
                    "start_time": "2020-07-01 00:00:00",
                    "end_time": "2020-08-31 00:00:00",
                    "is_del": 0,
                    "created_at": "2020-07-16 17:43:40",
                    "updated_at": "2020-07-16 17:53:01"
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": 10,
            "prev_page_url": null,
            "to": 2,
            "total": 2
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/promotion`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `current_page` |  required  | 当前页

<!-- END_35f3b107a2b5876462953a19dec3a401 -->

<!-- START_a5c463a1a5a4405b41a3d367ab9434a4 -->
## create
创建促销

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/promotion/create" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/promotion/create"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/promotion/create',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "goods": [
            {
                "id": 1,
                "bn": "",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "6,8,9",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-22 15:21:15"
            },
            {
                "id": 2,
                "bn": "",
                "name": "2号衣服",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 1,
                "goods_type_id": 5,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:33"
            },
            {
                "id": 3,
                "bn": "",
                "name": "3号手机",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 11,
                "goods_type_id": 3,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:27"
            },
            {
                "id": 4,
                "bn": "",
                "name": "4号手机",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 10,
                "goods_type_id": 0,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:32"
            },
            {
                "id": 5,
                "bn": "G_202007225630",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 32,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": null,
                "freeze_stock": null,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-22 15:16:35",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-07-22 15:16:35",
                "updated_at": "2020-07-22 15:16:35"
            },
            {
                "id": 6,
                "bn": "G_202007226225",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 50,
                "freeze_stock": 17,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-22 15:17:36",
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-07-22 15:17:36",
                "updated_at": "2020-07-22 15:22:15"
            },
            {
                "id": 7,
                "bn": "G_202008047810",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:31:45",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:31:45",
                "updated_at": "2020-08-04 14:31:45"
            },
            {
                "id": 8,
                "bn": "G_202008048427",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:09",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:09",
                "updated_at": "2020-08-04 14:33:09"
            },
            {
                "id": 9,
                "bn": "G_202008049189",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:13",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:13",
                "updated_at": "2020-08-04 14:33:13"
            },
            {
                "id": 10,
                "bn": "G_2020080410320",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:16",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:16",
                "updated_at": "2020-08-04 14:33:16"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/promotion/create`


<!-- END_a5c463a1a5a4405b41a3d367ab9434a4 -->

<!-- START_631d0f0513240b6233427bda5f88b524 -->
## store
保存促销

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/promotion" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u56fd\u5e86\u8282\u4fc3\u9500","exclusive":1,"condition_code":"GOODS_IDS","condition_params":"1","result_code":"GOODS_DISCOUNT","result_params":"{\"discount\":97}","description":"\u8fd9\u662f\u4e00\u4e2a\u56fd\u5e86\u8282\u4fc3\u9500\u6d3b\u52a8","sort":"100","start_time":"2020-07-01","end_time":"2020-08-31","is_del":0,"status":1}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/promotion"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u56fd\u5e86\u8282\u4fc3\u9500",
    "exclusive": 1,
    "condition_code": "GOODS_IDS",
    "condition_params": "1",
    "result_code": "GOODS_DISCOUNT",
    "result_params": "{\"discount\":97}",
    "description": "\u8fd9\u662f\u4e00\u4e2a\u56fd\u5e86\u8282\u4fc3\u9500\u6d3b\u52a8",
    "sort": "100",
    "start_time": "2020-07-01",
    "end_time": "2020-08-31",
    "is_del": 0,
    "status": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/promotion',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '国庆节促销',
            'exclusive' => 1,
            'condition_code' => 'GOODS_IDS',
            'condition_params' => '1',
            'result_code' => 'GOODS_DISCOUNT',
            'result_params' => '{"discount":97}',
            'description' => '这是一个国庆节促销活动',
            'sort' => '100',
            'start_time' => '2020-07-01',
            'end_time' => '2020-08-31',
            'is_del' => 0,
            'status' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "创建成功",
    "data": {
        "promotion": {
            "name": "元旦促销",
            "exclusive": "1",
            "condition_code": "GOODS_IDS",
            "condition_params": [
                1
            ],
            "result_code": "GOODS_DISCOUNT",
            "result_params": "{\"discount\":77}",
            "description": "这是一个元旦促销活动",
            "sort": "100",
            "start_time": "2020-07-01",
            "end_time": "2020-08-31",
            "is_del": "0",
            "status": "1",
            "updated_at": "2020-07-16 17:46:56",
            "created_at": "2020-07-16 17:46:56",
            "id": 1
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/promotion`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 促销名称
        `exclusive` | integer |  required  | 排他标志[1:不排他 2:排他]
        `condition_code` | string |  required  | 促销条件编码[GOODS_ALL(所有商品),GOODS_IDS(指定商品),ORDER_FULL(订单满减)]
        `condition_params` | array |  required  | 促销条件参数[1,2,3]
        `result_code` | string |  required  | 促销结果编码[GOODS_DISCOUNT(指定商品X折) ORDER_REDUCE(订单减多少钱)]
        `result_params` | string |  required  | 促销结果参数[{"discount":97}(指定商品97折)]
        `description` | string |  required  | 促销描述
        `sort` | numeric |  required  | 排序
        `start_time` | date |  required  | 开始时间
        `end_time` | data |  required  | 结束时间
        `is_del` | integer |  required  | 是否删除[0:正常 1:删除]
        `status` | integer |  required  | 状态[1:正常 2:禁用]
    
<!-- END_631d0f0513240b6233427bda5f88b524 -->

<!-- START_98029f6edcb80eba2efae82750e433fa -->
## show
查询促销

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/promotion/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/promotion/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/promotion/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "promotion": [
            {
                "id": 1,
                "name": "元旦促销",
                "exclusive": 1,
                "status": 1,
                "condition_code": "GOODS_IDS",
                "condition_params": "1,2,3",
                "result_code": "GOODS_DISCOUNT",
                "result_params": "{\"discount\":77}",
                "description": "这是一个元旦促销活动",
                "sort": 100,
                "start_time": "2020-07-01 00:00:00",
                "end_time": "2020-08-31 00:00:00",
                "is_del": 0,
                "created_at": "2020-07-16 17:42:44",
                "updated_at": "2020-07-16 17:52:45"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/promotion/{promotion}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `promotion` |  required  | 促销ID

<!-- END_98029f6edcb80eba2efae82750e433fa -->

<!-- START_ee029bbce15fe72800902ad3dbb33f44 -->
## edit
编辑促销

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/promotion/1/edit" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/promotion/1/edit"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/promotion/1/edit',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "goods": [
            {
                "id": 1,
                "bn": "",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "6,8,9",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-22 15:21:15"
            },
            {
                "id": 2,
                "bn": "",
                "name": "2号衣服",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 1,
                "goods_type_id": 5,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:33"
            },
            {
                "id": 3,
                "bn": "",
                "name": "3号手机",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 11,
                "goods_type_id": 3,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:27"
            },
            {
                "id": 4,
                "bn": "",
                "name": "4号手机",
                "brief": "",
                "price": "210.00",
                "costprice": "110.00",
                "mktprice": "230.00",
                "freight_amount": "0.00",
                "image_id": 6,
                "pics": "6,8,9",
                "goods_category_id": 10,
                "goods_type_id": 0,
                "brand_id": 0,
                "marketable": 1,
                "stock": 0,
                "freeze_stock": 0,
                "weight": null,
                "unit": null,
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": null,
                "down_at": null,
                "sort": 100,
                "is_recommend": 1,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": null,
                "spec_desc": null,
                "is_del": 0,
                "created_at": null,
                "updated_at": "2020-07-17 16:52:32"
            },
            {
                "id": 5,
                "bn": "G_202007225630",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 32,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": null,
                "freeze_stock": null,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-22 15:16:35",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-07-22 15:16:35",
                "updated_at": "2020-07-22 15:16:35"
            },
            {
                "id": 6,
                "bn": "G_202007226225",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 50,
                "freeze_stock": 17,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-22 15:17:36",
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-07-22 15:17:36",
                "updated_at": "2020-07-22 15:22:15"
            },
            {
                "id": 7,
                "bn": "G_202008047810",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:31:45",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:31:45",
                "updated_at": "2020-08-04 14:31:45"
            },
            {
                "id": 8,
                "bn": "G_202008048427",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:09",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:09",
                "updated_at": "2020-08-04 14:33:09"
            },
            {
                "id": 9,
                "bn": "G_202008049189",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:13",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:13",
                "updated_at": "2020-08-04 14:33:13"
            },
            {
                "id": 10,
                "bn": "G_2020080410320",
                "name": "三星S10 5G",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "freight_amount": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 1,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 180,
                "freeze_stock": 30,
                "weight": "123.50",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-08-04 14:33:16",
                "down_at": null,
                "sort": 100,
                "is_recommend": 2,
                "is_hot": 1,
                "is_selected": 2,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "is_del": 0,
                "created_at": "2020-08-04 14:33:16",
                "updated_at": "2020-08-04 14:33:16"
            }
        ],
        "promotion": [
            {
                "id": 1,
                "name": "元旦促销",
                "exclusive": 1,
                "status": 1,
                "condition_code": "GOODS_IDS",
                "condition_params": "1,2,3",
                "result_code": "GOODS_DISCOUNT",
                "result_params": "{\"discount\":77}",
                "description": "这是一个元旦促销活动",
                "sort": 100,
                "start_time": "2020-07-01 00:00:00",
                "end_time": "2020-08-31 00:00:00",
                "is_del": 0,
                "created_at": "2020-07-16 17:42:44",
                "updated_at": "2020-07-16 17:52:45"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/promotion/{promotion}/edit`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `promotion` |  required  | 促销ID

<!-- END_ee029bbce15fe72800902ad3dbb33f44 -->

<!-- START_aaf34137eb604492f774705f72dae3c5 -->
## update
更新促销

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/promotion/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u56fd\u5e86\u8282\u4fc3\u9500","exclusive":3,"condition_code":"GOODS_IDS","condition_params":"1","result_code":"GOODS_DISCOUNT","result_params":"{\"discount\":97}","description":"\u8fd9\u662f\u4e00\u4e2a\u56fd\u5e86\u8282\u4fc3\u9500\u6d3b\u52a8","sort":"100","start_time":"2020-07-01","end_time":"2020-08-31","is_del":0,"status":1}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/promotion/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u56fd\u5e86\u8282\u4fc3\u9500",
    "exclusive": 3,
    "condition_code": "GOODS_IDS",
    "condition_params": "1",
    "result_code": "GOODS_DISCOUNT",
    "result_params": "{\"discount\":97}",
    "description": "\u8fd9\u662f\u4e00\u4e2a\u56fd\u5e86\u8282\u4fc3\u9500\u6d3b\u52a8",
    "sort": "100",
    "start_time": "2020-07-01",
    "end_time": "2020-08-31",
    "is_del": 0,
    "status": 1
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/promotion/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '国庆节促销',
            'exclusive' => 3,
            'condition_code' => 'GOODS_IDS',
            'condition_params' => '1',
            'result_code' => 'GOODS_DISCOUNT',
            'result_params' => '{"discount":97}',
            'description' => '这是一个国庆节促销活动',
            'sort' => '100',
            'start_time' => '2020-07-01',
            'end_time' => '2020-08-31',
            'is_del' => 0,
            'status' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "更新成功",
    "data": {
        "promotion": {
            "name": "元旦促销",
            "exclusive": "1",
            "condition_code": "GOODS_IDS",
            "condition_params": [
                1,
                2,
                3
            ],
            "result_code": "GOODS_DISCOUNT",
            "result_params": "{\"discount\":77}",
            "description": "这是一个元旦促销活动",
            "sort": "100",
            "start_time": "2020-07-01",
            "end_time": "2020-08-31",
            "is_del": "0",
            "status": "1",
            "updated_at": "2020-07-16 17:46:56",
            "created_at": "2020-07-16 17:46:56",
            "id": 1
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/promotion/{promotion}`

`PATCH admin-api/admin/promotion/{promotion}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `promotion` |  required  | 促销ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 促销名称
        `exclusive` | integer |  required  | 排他标志[1:不排他 2:排他]
        `condition_code` | string |  required  | 促销条件编码[GOODS_ALL(所有商品),GOODS_IDS(指定商品),ORDER_FULL(订单满减)]
        `condition_params` | array |  required  | 促销条件参数[1,2,3]
        `result_code` | string |  required  | 促销结果编码[GOODS_DISCOUNT(指定商品X折) ORDER_REDUCE(订单减多少钱)]
        `result_params` | string |  required  | 促销结果参数[{"discount":97}(指定商品97折)]
        `description` | string |  required  | 促销描述
        `sort` | numeric |  required  | 排序
        `start_time` | date |  required  | 开始时间
        `end_time` | data |  required  | 结束时间
        `is_del` | integer |  required  | 是否删除[0:正常 1:删除]
        `status` | integer |  required  | 状态[1:正常 2:禁用]
    
<!-- END_aaf34137eb604492f774705f72dae3c5 -->

<!-- START_0dfc9c7e2cf812b37bb55a09d97483d2 -->
## delete
删除促销

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/promotion/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/promotion/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/promotion/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "删除成功",
    "data": []
}
```

### HTTP Request
`DELETE admin-api/admin/promotion/{promotion}`


<!-- END_0dfc9c7e2cf812b37bb55a09d97483d2 -->

#SaleItems

分销商品结算表
<!-- START_02b0d71682369f9dc44a01ed81b11755 -->
## index
结算列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/sale_item?current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/sale_item"
);

let params = {
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/sale_item',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "saleItems": {
            "current_page": 1,
            "data": [],
            "first_page_url": "\/?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/sale_item`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `mobile` |  optional  | 手机号
    `order_id` |  optional  | 订单ID
    `status` |  optional  | 状态
    `nickname` |  optional  | 昵称
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_02b0d71682369f9dc44a01ed81b11755 -->

#SalerInfo

用户分销账户表
<!-- START_efea6dbb3f7f4a7fcaa7a66e7693752a -->
## index
用户分销账户列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/saler_info?current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/saler_info"
);

let params = {
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/saler_info',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "salerInfos": {
            "current_page": 1,
            "data": [],
            "first_page_url": "\/?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/saler_info`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `mobile` |  optional  | 手机号
    `nickname` |  optional  | 昵称
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_efea6dbb3f7f4a7fcaa7a66e7693752a -->

<!-- START_52f7c5886c4823a38af0080615bdcdda -->
## admin-api/admin/saler_info/{saler_info}
> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/saler_info/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/saler_info/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/saler_info/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": -1,
    "message": "该分销账户不存在",
    "data": []
}
```

### HTTP Request
`GET admin-api/admin/saler_info/{saler_info}`


<!-- END_52f7c5886c4823a38af0080615bdcdda -->

#SearchHotKeywords

热搜接口
<!-- START_7a5dbe267077951476ac2b47c290cf30 -->
## index
热搜列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/keyword?is_del=0&current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/keyword"
);

let params = {
    "is_del": "0",
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/keyword',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'is_del'=> '0',
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "keywords": {
            "current_page": 1,
            "data": [],
            "first_page_url": "\/?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/keyword`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `keywords` |  optional  | 关键词
    `type` |  optional  | 添加类型[1:系统添加 2:后台添加]
    `is_show` |  optional  | 是否展示[0:不展示 1:展示]
    `is_hot` |  optional  | 是否热门[0:非热门 1:热门]
    `is_del` |  optional  | 是否删除[0:正常 1:删除]
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_7a5dbe267077951476ac2b47c290cf30 -->

<!-- START_bd5ae2c1df38bdc96bcb6a2d8a78d9c3 -->
## store
保存

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/keyword" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"keywords":"\u590f\u5b63","sort":100,"is_show":1,"is_hot":1,"is_delete":"0"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/keyword"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "keywords": "\u590f\u5b63",
    "sort": 100,
    "is_show": 1,
    "is_hot": 1,
    "is_delete": "0"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/keyword',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'keywords' => '夏季',
            'sort' => 100,
            'is_show' => 1,
            'is_hot' => 1,
            'is_delete' => '0',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`POST admin-api/admin/keyword`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `keywords` | string |  required  | 关键词
        `sort` | integer |  required  | 排序
        `is_show` | integer |  required  | 展示标记[0:不展示 1:展示]
        `is_hot` | integer |  required  | 热门标记[0:非热门 1:热门]
        `is_delete` | required |  optional  | 删除标记[0:正常 1:删除]
    
<!-- END_bd5ae2c1df38bdc96bcb6a2d8a78d9c3 -->

<!-- START_4054ce29ef219db3261a14cc43d1eb88 -->
## show
查询(单一)

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/keyword/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/keyword/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/keyword/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": -1,
    "message": "ID不存在",
    "data": []
}
```

### HTTP Request
`GET admin-api/admin/keyword/{keyword}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `keyword` |  required  | 关键词ID

<!-- END_4054ce29ef219db3261a14cc43d1eb88 -->

<!-- START_2f1231c6aefae76419ddc038c5ff073c -->
## update
更新

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/keyword/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"keywords":"\u590f\u5b63","sort":100,"is_show":1,"is_hot":1,"is_delete":"0"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/keyword/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "keywords": "\u590f\u5b63",
    "sort": 100,
    "is_show": 1,
    "is_hot": 1,
    "is_delete": "0"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/keyword/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'keywords' => '夏季',
            'sort' => 100,
            'is_show' => 1,
            'is_hot' => 1,
            'is_delete' => '0',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`PUT admin-api/admin/keyword/{keyword}`

`PATCH admin-api/admin/keyword/{keyword}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `keyword` |  required  | 关键词ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `keywords` | string |  required  | 关键词
        `sort` | integer |  required  | 排序
        `is_show` | integer |  required  | 展示标记[0:不展示 1:展示]
        `is_hot` | integer |  required  | 热门标记[0:非热门 1:热门]
        `is_delete` | required |  optional  | 删除标记[0:正常 1:删除]
    
<!-- END_2f1231c6aefae76419ddc038c5ff073c -->

<!-- START_86d41d3c1c90758abee6bafc4fb650e3 -->
## delete
删除

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/keyword/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/keyword/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/keyword/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "删除成功",
    "data": []
}
```

### HTTP Request
`DELETE admin-api/admin/keyword/{keyword}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `keyword` |  required  | 关键词ID

<!-- END_86d41d3c1c90758abee6bafc4fb650e3 -->

#Ship

配送方式接口
<!-- START_8688f211e3e8308288e86a921ed2764e -->
## index
配送方式列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/ship?per_page=10&current_page=1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/ship"
);

let params = {
    "per_page": "10",
    "current_page": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/ship',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'per_page'=> '10',
            'current_page'=> '1',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "ships": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                1005,
                                2005,
                                2576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 11:16:14",
                    "updated_at": "2020-07-21 11:16:14"
                },
                {
                    "id": 3,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": null,
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 11:26:14",
                    "updated_at": "2020-07-21 11:26:14"
                },
                {
                    "id": 4,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                1005,
                                2005,
                                2576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 11:43:41",
                    "updated_at": "2020-07-21 11:43:41"
                },
                {
                    "id": 5,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                10005,
                                2005,
                                25576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                9755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 14:42:39",
                    "updated_at": "2020-07-21 14:42:39"
                },
                {
                    "id": 6,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                10005,
                                2005,
                                25576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                9755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 14:43:01",
                    "updated_at": "2020-07-21 14:43:01"
                },
                {
                    "id": 7,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                10005,
                                2005,
                                25576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                9755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 14:43:31",
                    "updated_at": "2020-07-21 14:43:31"
                },
                {
                    "id": 8,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                10005,
                                2005,
                                25576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                9755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 14:44:08",
                    "updated_at": "2020-07-21 14:44:08"
                },
                {
                    "id": 9,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                10005,
                                2005,
                                25576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                9755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 14:44:56",
                    "updated_at": "2020-07-21 14:44:56"
                },
                {
                    "id": 10,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                10005,
                                2005,
                                25576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                9755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 14:45:11",
                    "updated_at": "2020-07-21 14:45:11"
                },
                {
                    "id": 11,
                    "type": 1,
                    "name": "配送方式1",
                    "has_cod": 1,
                    "firstunit": 500,
                    "continueunit": 500,
                    "def_area_fee": 1,
                    "area_type": 1,
                    "firstunit_price": "10.00",
                    "continueunit_price": "5.00",
                    "logi_name": "顺丰速运",
                    "logi_code": "SF-Express",
                    "is_def": 2,
                    "sort": 100,
                    "status": 1,
                    "free_postage": 2,
                    "area_fee": [
                        {
                            "area_id": [
                                10005,
                                2005,
                                25576
                            ],
                            "firstunit": "500",
                            "continueunit": "500",
                            "firstunit_price": 12,
                            "continueunit_price": 8,
                            "area": []
                        },
                        {
                            "area_id": [
                                1005,
                                9755,
                                2576
                            ],
                            "firstunit": 500,
                            "continueunit": 500,
                            "firstunit_price": 8,
                            "continueunit_price": 3,
                            "area": []
                        }
                    ],
                    "goodsmoney": "0.00",
                    "created_at": "2020-07-21 14:45:20",
                    "updated_at": "2020-07-21 14:45:20"
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "\/?page=2",
            "next_page_url": "\/?page=2",
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": 10,
            "total": 13
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/ship`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `per_page` |  required  | 每页显示数量
    `current_page` |  required  | 当前页

<!-- END_8688f211e3e8308288e86a921ed2764e -->

<!-- START_85ab7c04f068df1fc347d7030e49a816 -->
## create
创建配送方式

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/ship/create" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/ship/create"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/ship/create',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "logistics": [
            {
                "id": 1,
                "logi_name": "顺丰速运",
                "logi_code": "SF-Express",
                "sort": 1,
                "created_at": "2020-07-17 11:44:44",
                "updated_at": "2020-07-17 11:51:57"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/ship/create`


<!-- END_85ab7c04f068df1fc347d7030e49a816 -->

<!-- START_519081b62fa4c01362bc8c8791c12560 -->
## store
保存配送方式

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/ship" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u914d\u9001\u65b9\u5f0f1","type":1,"has_cod":1,"firstunit":500,"continueunit":500,"def_area_fee":1,"area_type":1,"firstunit_price":10,"continueunit_price":5,"logi_name":"\u987a\u4e30\u901f\u8fd0","logi_code":"SF-Express","is_def":2,"sort":100,"status":1,"free_postage":2,"goodsmoney":0,"area_fee":"[{\"area_id\":[10005,2005,25576],\"firstunit\":\"500\",\"continueunit\":\"500\",\"firstunit_price\":\"12\",\"continueunit_price\":\"8\"},{\"area_id\":[1005,9755,2576],\"firstunit\":\"500\",\"continueunit\":\"500\",\"firstunit_price\":\"8\",\"continueunit_price\":\"3\"}]"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/ship"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u914d\u9001\u65b9\u5f0f1",
    "type": 1,
    "has_cod": 1,
    "firstunit": 500,
    "continueunit": 500,
    "def_area_fee": 1,
    "area_type": 1,
    "firstunit_price": 10,
    "continueunit_price": 5,
    "logi_name": "\u987a\u4e30\u901f\u8fd0",
    "logi_code": "SF-Express",
    "is_def": 2,
    "sort": 100,
    "status": 1,
    "free_postage": 2,
    "goodsmoney": 0,
    "area_fee": "[{\"area_id\":[10005,2005,25576],\"firstunit\":\"500\",\"continueunit\":\"500\",\"firstunit_price\":\"12\",\"continueunit_price\":\"8\"},{\"area_id\":[1005,9755,2576],\"firstunit\":\"500\",\"continueunit\":\"500\",\"firstunit_price\":\"8\",\"continueunit_price\":\"3\"}]"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/ship',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '配送方式1',
            'type' => 1,
            'has_cod' => 1,
            'firstunit' => 500,
            'continueunit' => 500,
            'def_area_fee' => 1,
            'area_type' => 1,
            'firstunit_price' => 10.0,
            'continueunit_price' => 5.0,
            'logi_name' => '顺丰速运',
            'logi_code' => 'SF-Express',
            'is_def' => 2,
            'sort' => 100,
            'status' => 1,
            'free_postage' => 2,
            'goodsmoney' => 0.0,
            'area_fee' => '[{"area_id":[10005,2005,25576],"firstunit":"500","continueunit":"500","firstunit_price":"12","continueunit_price":"8"},{"area_id":[1005,9755,2576],"firstunit":"500","continueunit":"500","firstunit_price":"8","continueunit_price":"3"}]',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST admin-api/admin/ship`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 配送方式名称
        `type` | integer |  required  | 计算方式[1:按重量 2:按件数]
        `has_cod` | integer |  required  | 是否货到付款[1:不是 2:是]
        `firstunit` | integer |  required  | 首重(单位:克)
        `continueunit` | integer |  required  | 续重(单位:克)
        `def_area_fee` | integer |  required  | 按地区设置配送费用是否启用默认配送费用[1:启用 2:不启用]
        `area_type` | integer |  required  | 地区类型[1:全部地区 2:指定地区]
        `firstunit_price` | float |  required  | 首重费用
        `continueunit_price` | float |  required  | 续重费用
        `logi_name` | string |  required  | 物流公司名称
        `logi_code` | string |  required  | 物流公司编码
        `is_def` | integer |  required  | 是否默认[1:默认 2:不默认]
        `sort` | integer |  required  | 排序
        `status` | integer |  required  | 状态[1:正常 2:禁用]
        `free_postage` | integer |  required  | 是否包邮[1:包邮 2:不包邮]
        `goodsmoney` | float |  required  | 满多少免运费
        `area_fee` | array |  optional  | 地区配送费用
    
<!-- END_519081b62fa4c01362bc8c8791c12560 -->

<!-- START_6c50287825e627ffb8f5cd57c42fce4e -->
## show
查询配送方式

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/ship/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/ship/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/ship/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "ship": [
            {
                "id": 1,
                "type": 1,
                "name": "配送方式1",
                "has_cod": 1,
                "firstunit": 500,
                "continueunit": 500,
                "def_area_fee": 1,
                "area_type": 1,
                "firstunit_price": "10.00",
                "continueunit_price": "5.00",
                "logi_name": "顺丰速运",
                "logi_code": "SF-Express",
                "is_def": 2,
                "sort": 100,
                "status": 1,
                "free_postage": 2,
                "area_fee": [
                    {
                        "area_id": [
                            1005,
                            2005,
                            2576
                        ],
                        "firstunit": "500",
                        "continueunit": "500",
                        "firstunit_price": 12,
                        "continueunit_price": 8,
                        "area": []
                    },
                    {
                        "area_id": [
                            1005,
                            755,
                            2576
                        ],
                        "firstunit": 500,
                        "continueunit": 500,
                        "firstunit_price": 8,
                        "continueunit_price": 3,
                        "area": []
                    }
                ],
                "goodsmoney": "0.00",
                "created_at": "2020-07-21 11:16:14",
                "updated_at": "2020-07-21 11:16:14"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/ship/{ship}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `ship` |  required  | 配送方式ID

<!-- END_6c50287825e627ffb8f5cd57c42fce4e -->

<!-- START_50ec9c5c380580f5f4f921c9d84d5a36 -->
## edit
编辑

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/ship/1/edit" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/ship/1/edit"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/ship/1/edit',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "logistics": [
            {
                "id": 1,
                "logi_name": "顺丰速运",
                "logi_code": "SF-Express",
                "sort": 1,
                "created_at": "2020-07-17 11:44:44",
                "updated_at": "2020-07-17 11:51:57"
            }
        ],
        "ships": [
            {
                "id": 1,
                "type": 1,
                "name": "配送方式1",
                "has_cod": 1,
                "firstunit": 500,
                "continueunit": 500,
                "def_area_fee": 1,
                "area_type": 1,
                "firstunit_price": "10.00",
                "continueunit_price": "5.00",
                "logi_name": "顺丰速运",
                "logi_code": "SF-Express",
                "is_def": 2,
                "sort": 100,
                "status": 1,
                "free_postage": 2,
                "area_fee": [
                    {
                        "area_id": [
                            1005,
                            2005,
                            2576
                        ],
                        "firstunit": "500",
                        "continueunit": "500",
                        "firstunit_price": 12,
                        "continueunit_price": 8,
                        "area": []
                    },
                    {
                        "area_id": [
                            1005,
                            755,
                            2576
                        ],
                        "firstunit": 500,
                        "continueunit": 500,
                        "firstunit_price": 8,
                        "continueunit_price": 3,
                        "area": []
                    }
                ],
                "goodsmoney": "0.00",
                "created_at": "2020-07-21 11:16:14",
                "updated_at": "2020-07-21 11:16:14"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/ship/{ship}/edit`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `ship` |  required  | 配送方式ID

<!-- END_50ec9c5c380580f5f4f921c9d84d5a36 -->

<!-- START_f513de490f213a511467e25214b780c3 -->
## update
更新

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/ship/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u914d\u9001\u65b9\u5f0f1","type":1,"has_cod":1,"firstunit":500,"continueunit":500,"def_area_fee":1,"area_type":1,"firstunit_price":10,"continueunit_price":5,"logi_name":"\u987a\u4e30\u901f\u8fd0","logi_code":"SF-Express","is_def":2,"sort":100,"status":1,"free_postage":2,"goodsmoney":0,"area_fee":"[{\"area_id\":[10005,2005,25576],\"firstunit\":\"500\",\"continueunit\":\"500\",\"firstunit_price\":\"12\",\"continueunit_price\":\"8\"},{\"area_id\":[1005,9755,2576],\"firstunit\":\"500\",\"continueunit\":\"500\",\"firstunit_price\":\"8\",\"continueunit_price\":\"3\"}]"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/ship/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u914d\u9001\u65b9\u5f0f1",
    "type": 1,
    "has_cod": 1,
    "firstunit": 500,
    "continueunit": 500,
    "def_area_fee": 1,
    "area_type": 1,
    "firstunit_price": 10,
    "continueunit_price": 5,
    "logi_name": "\u987a\u4e30\u901f\u8fd0",
    "logi_code": "SF-Express",
    "is_def": 2,
    "sort": 100,
    "status": 1,
    "free_postage": 2,
    "goodsmoney": 0,
    "area_fee": "[{\"area_id\":[10005,2005,25576],\"firstunit\":\"500\",\"continueunit\":\"500\",\"firstunit_price\":\"12\",\"continueunit_price\":\"8\"},{\"area_id\":[1005,9755,2576],\"firstunit\":\"500\",\"continueunit\":\"500\",\"firstunit_price\":\"8\",\"continueunit_price\":\"3\"}]"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/ship/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '配送方式1',
            'type' => 1,
            'has_cod' => 1,
            'firstunit' => 500,
            'continueunit' => 500,
            'def_area_fee' => 1,
            'area_type' => 1,
            'firstunit_price' => 10.0,
            'continueunit_price' => 5.0,
            'logi_name' => '顺丰速运',
            'logi_code' => 'SF-Express',
            'is_def' => 2,
            'sort' => 100,
            'status' => 1,
            'free_postage' => 2,
            'goodsmoney' => 0.0,
            'area_fee' => '[{"area_id":[10005,2005,25576],"firstunit":"500","continueunit":"500","firstunit_price":"12","continueunit_price":"8"},{"area_id":[1005,9755,2576],"firstunit":"500","continueunit":"500","firstunit_price":"8","continueunit_price":"3"}]',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT admin-api/admin/ship/{ship}`

`PATCH admin-api/admin/ship/{ship}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `ship` |  required  | 配送方式ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 配送方式名称
        `type` | integer |  required  | 计算方式[1:按重量 2:按件数]
        `has_cod` | integer |  required  | 是否货到付款[1:不是 2:是]
        `firstunit` | integer |  required  | 首重(单位:克)
        `continueunit` | integer |  required  | 续重(单位:克)
        `def_area_fee` | integer |  required  | 按地区设置配送费用是否启用默认配送费用[1:启用 2:不启用]
        `area_type` | integer |  required  | 地区类型[1:全部地区 2:指定地区]
        `firstunit_price` | float |  required  | 首重费用
        `continueunit_price` | float |  required  | 续重费用
        `logi_name` | string |  required  | 物流公司名称
        `logi_code` | string |  required  | 物流公司编码
        `is_def` | integer |  required  | 是否默认[1:默认 2:不默认]
        `sort` | integer |  required  | 排序
        `status` | integer |  required  | 状态[1:正常 2:禁用]
        `free_postage` | integer |  required  | 是否包邮[1:包邮 2:不包邮]
        `goodsmoney` | float |  required  | 满多少免运费
        `area_fee` | array |  optional  | 地区配送费用
    
<!-- END_f513de490f213a511467e25214b780c3 -->

<!-- START_96dd991546c459d04868a95a43911087 -->
## delete
删除

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/ship/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/ship/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/ship/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE admin-api/admin/ship/{ship}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `ship` |  required  | 配送方式ID

<!-- END_96dd991546c459d04868a95a43911087 -->

#Spec

属性接口
Class SpecController
<!-- START_d757b7c508d3a517dd482d2275d1862b -->
## index
属性列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/spec?current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/spec"
);

let params = {
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/spec',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "specs": {
            "current_page": 1,
            "data": [
                {
                    "id": 6,
                    "name": "啊啊",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:33:57",
                    "updated_at": "2020-07-10 11:33:57",
                    "value": [
                        {
                            "id": 58,
                            "spec_id": 6,
                            "name": "啊1111",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:42:59",
                            "updated_at": "2020-07-10 16:42:59"
                        },
                        {
                            "id": 59,
                            "spec_id": 6,
                            "name": "11",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:42:59",
                            "updated_at": "2020-07-10 16:42:59"
                        },
                        {
                            "id": 60,
                            "spec_id": 6,
                            "name": "2",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:42:59",
                            "updated_at": "2020-07-10 16:42:59"
                        }
                    ]
                },
                {
                    "id": 7,
                    "name": "电脑",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:34:50",
                    "updated_at": "2020-07-10 11:34:50",
                    "value": [
                        {
                            "id": 47,
                            "spec_id": 7,
                            "name": "笔记本",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:59:15",
                            "updated_at": "2020-07-10 11:59:15"
                        }
                    ]
                },
                {
                    "id": 8,
                    "name": "啊啊",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:35:38",
                    "updated_at": "2020-07-10 11:35:38",
                    "value": [
                        {
                            "id": 50,
                            "spec_id": 8,
                            "name": "啊啊啊啊",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 12:00:53",
                            "updated_at": "2020-07-10 12:00:53"
                        },
                        {
                            "id": 51,
                            "spec_id": 8,
                            "name": "啊11111",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 12:00:53",
                            "updated_at": "2020-07-10 12:00:53"
                        }
                    ]
                },
                {
                    "id": 9,
                    "name": "11",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:35:47",
                    "updated_at": "2020-07-10 11:35:47",
                    "value": [
                        {
                            "id": 42,
                            "spec_id": 9,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:58:35",
                            "updated_at": "2020-07-10 11:58:35"
                        },
                        {
                            "id": 43,
                            "spec_id": 9,
                            "name": "11",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:58:35",
                            "updated_at": "2020-07-10 11:58:35"
                        }
                    ]
                },
                {
                    "id": 10,
                    "name": "2",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:36:25",
                    "updated_at": "2020-07-10 11:36:25",
                    "value": [
                        {
                            "id": 27,
                            "spec_id": 10,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:36:25",
                            "updated_at": "2020-07-10 11:36:25"
                        },
                        {
                            "id": 28,
                            "spec_id": 10,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:36:25",
                            "updated_at": "2020-07-10 11:36:25"
                        },
                        {
                            "id": 29,
                            "spec_id": 10,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:36:25",
                            "updated_at": "2020-07-10 11:36:25"
                        }
                    ]
                },
                {
                    "id": 11,
                    "name": "啊",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:40:58",
                    "updated_at": "2020-07-10 11:40:58",
                    "value": [
                        {
                            "id": 30,
                            "spec_id": 11,
                            "name": "11",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:40:58",
                            "updated_at": "2020-07-10 11:40:58"
                        },
                        {
                            "id": 31,
                            "spec_id": 11,
                            "name": "22",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:40:58",
                            "updated_at": "2020-07-10 11:40:58"
                        }
                    ]
                },
                {
                    "id": 13,
                    "name": "啊啊",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 12:01:30",
                    "updated_at": "2020-07-10 12:01:30",
                    "value": [
                        {
                            "id": 52,
                            "spec_id": 13,
                            "name": "11",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 12:01:30",
                            "updated_at": "2020-07-10 12:01:30"
                        },
                        {
                            "id": 53,
                            "spec_id": 13,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 12:01:30",
                            "updated_at": "2020-07-10 12:01:30"
                        }
                    ]
                },
                {
                    "id": 14,
                    "name": "啊实打实大撒",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 16:17:43",
                    "updated_at": "2020-07-10 16:17:43",
                    "value": [
                        {
                            "id": 54,
                            "spec_id": 14,
                            "name": "啊啊",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:17:43",
                            "updated_at": "2020-07-10 16:17:43"
                        },
                        {
                            "id": 55,
                            "spec_id": 14,
                            "name": "啊啊",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:17:43",
                            "updated_at": "2020-07-10 16:17:43"
                        }
                    ]
                },
                {
                    "id": 15,
                    "name": "手表",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 16:19:24",
                    "updated_at": "2020-07-10 16:19:24",
                    "value": [
                        {
                            "id": 56,
                            "spec_id": 15,
                            "name": "黑",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:19:24",
                            "updated_at": "2020-07-10 16:19:24"
                        },
                        {
                            "id": 57,
                            "spec_id": 15,
                            "name": "白",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:19:24",
                            "updated_at": "2020-07-10 16:19:24"
                        }
                    ]
                },
                {
                    "id": 3,
                    "name": "内存",
                    "sort": 10,
                    "details": "",
                    "created_at": "2020-07-06 16:55:04",
                    "updated_at": "2020-07-06 16:55:04",
                    "value": [
                        {
                            "id": 8,
                            "spec_id": 3,
                            "name": "2G",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-06 16:55:04",
                            "updated_at": "2020-07-06 16:55:04"
                        },
                        {
                            "id": 9,
                            "spec_id": 3,
                            "name": "4G",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-06 16:55:04",
                            "updated_at": "2020-07-06 16:55:04"
                        },
                        {
                            "id": 10,
                            "spec_id": 3,
                            "name": "8G",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-06 16:55:04",
                            "updated_at": "2020-07-06 16:55:04"
                        }
                    ]
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "\/?page=2",
            "next_page_url": "\/?page=2",
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": 10,
            "total": 16
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/spec`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `condition` |  optional  | 类型名称
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_d757b7c508d3a517dd482d2275d1862b -->

<!-- START_c02fbe26c391ada63d6ad6e0c90e6175 -->
## store
保存属性

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/spec" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u7801\u6570","sort":100,"values":"[34,35,36,37,38,39,40]"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/spec"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u7801\u6570",
    "sort": 100,
    "values": "[34,35,36,37,38,39,40]"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/spec',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '码数',
            'sort' => 100,
            'values' => '[34,35,36,37,38,39,40]',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "创建成功",
    "data": {
        "$spec": {
            "name": "码数",
            "sort": "100",
            "updated_at": "2020-07-14 11:08:54",
            "created_at": "2020-07-14 11:08:54",
            "id": 16,
            "value": [
                {
                    "id": 61,
                    "spec_id": 16,
                    "name": "34",
                    "sort": 0,
                    "details": "",
                    "created_at": "2020-07-14 11:08:54",
                    "updated_at": "2020-07-14 11:08:54"
                },
                {
                    "id": 62,
                    "spec_id": 16,
                    "name": "35",
                    "sort": 0,
                    "details": "",
                    "created_at": "2020-07-14 11:08:54",
                    "updated_at": "2020-07-14 11:08:54"
                },
                {
                    "id": 63,
                    "spec_id": 16,
                    "name": "36",
                    "sort": 0,
                    "details": "",
                    "created_at": "2020-07-14 11:08:54",
                    "updated_at": "2020-07-14 11:08:54"
                }
            ]
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/spec`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 属性名称
        `sort` | integer |  required  | 排序(越小越靠前)
        `values` | array |  required  | 属性值
    
<!-- END_c02fbe26c391ada63d6ad6e0c90e6175 -->

<!-- START_8b4b51921983c576bc2765c473ceffcb -->
## show
查询属性(单一)

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/spec/culpa" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/spec/culpa"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/spec/culpa',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": -1,
    "message": "ID错误,该属性不存在",
    "data": []
}
```

### HTTP Request
`GET admin-api/admin/spec/{spec}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `spec` |  required  | 属性ID

<!-- END_8b4b51921983c576bc2765c473ceffcb -->

<!-- START_dc2ee438febbf6caac3d61fb33373248 -->
## update
更新属性

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/spec/culpa" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u7801\u6570","sort":100,"values":"[34,35,36,37,38,39,40]"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/spec/culpa"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u7801\u6570",
    "sort": 100,
    "values": "[34,35,36,37,38,39,40]"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/spec/culpa',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '码数',
            'sort' => 100,
            'values' => '[34,35,36,37,38,39,40]',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "更新成功",
    "data": {
        "$spec": {
            "name": "码数",
            "sort": "100",
            "updated_at": "2020-07-14 11:08:54",
            "created_at": "2020-07-14 11:08:54",
            "id": 16,
            "value": [
                {
                    "id": 61,
                    "spec_id": 16,
                    "name": "34",
                    "sort": 0,
                    "details": "",
                    "created_at": "2020-07-14 11:08:54",
                    "updated_at": "2020-07-14 11:08:54"
                },
                {
                    "id": 62,
                    "spec_id": 16,
                    "name": "35",
                    "sort": 0,
                    "details": "",
                    "created_at": "2020-07-14 11:08:54",
                    "updated_at": "2020-07-14 11:08:54"
                },
                {
                    "id": 63,
                    "spec_id": 16,
                    "name": "36",
                    "sort": 0,
                    "details": "",
                    "created_at": "2020-07-14 11:08:54",
                    "updated_at": "2020-07-14 11:08:54"
                }
            ]
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/spec/{spec}`

`PATCH admin-api/admin/spec/{spec}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `spec` |  required  | 属性名ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 属性名称
        `sort` | integer |  required  | 排序(越小越靠前)
        `values` | array |  required  | 属性值
    
<!-- END_dc2ee438febbf6caac3d61fb33373248 -->

<!-- START_63db4b0cf6e0c90db3bf00a6eac0103f -->
## delete
删除

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/spec/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/spec/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/spec/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE admin-api/admin/spec/{spec}`


<!-- END_63db4b0cf6e0c90db3bf00a6eac0103f -->

#Type


<!-- START_4b6c8f50d20d7d66cc74eed6a8f2fd65 -->
## index
类型列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/type?current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/type"
);

let params = {
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/type',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "types": {
            "current_page": 1,
            "data": [
                {
                    "id": 25,
                    "name": "电视剧",
                    "sort": 1,
                    "created_at": "2020-07-10 15:29:47",
                    "updated_at": "2020-07-10 15:29:47"
                },
                {
                    "id": 23,
                    "name": "啊啊",
                    "sort": 1,
                    "created_at": "2020-07-08 11:09:28",
                    "updated_at": "2020-07-08 11:09:28"
                },
                {
                    "id": 20,
                    "name": "啊",
                    "sort": 1,
                    "created_at": "2020-07-08 11:23:21",
                    "updated_at": "2020-07-08 11:23:21"
                },
                {
                    "id": 22,
                    "name": "啊啊啊啊啊",
                    "sort": 1,
                    "created_at": "2020-07-08 11:06:34",
                    "updated_at": "2020-07-08 11:06:34"
                },
                {
                    "id": 2,
                    "name": "手机",
                    "sort": 100,
                    "created_at": "2020-07-09 14:41:37",
                    "updated_at": "2020-07-09 14:41:37"
                },
                {
                    "id": 3,
                    "name": "通用类型5",
                    "sort": 100,
                    "created_at": "2020-07-06 16:49:49",
                    "updated_at": "2020-07-06 16:49:49"
                },
                {
                    "id": 26,
                    "name": "通用类型",
                    "sort": 100,
                    "created_at": "2020-07-14 10:57:26",
                    "updated_at": "2020-07-14 10:57:26"
                },
                {
                    "id": 5,
                    "name": "通用类型5",
                    "sort": 100,
                    "created_at": "2020-07-06 16:51:00",
                    "updated_at": "2020-07-06 16:51:00"
                },
                {
                    "id": 6,
                    "name": "通用类型5",
                    "sort": 100,
                    "created_at": "2020-07-06 16:52:06",
                    "updated_at": "2020-07-06 16:52:06"
                },
                {
                    "id": 8,
                    "name": "通用类型1",
                    "sort": 100,
                    "created_at": "2020-07-06 17:05:38",
                    "updated_at": "2020-07-06 17:05:38"
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 3,
            "last_page_url": "\/?page=3",
            "next_page_url": "\/?page=2",
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": 10,
            "total": 21
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/type`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `condition` |  optional  | 类型名称
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_4b6c8f50d20d7d66cc74eed6a8f2fd65 -->

<!-- START_0e504f0c18c229c2076a25f06ee1defe -->
## create
创建类型

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/type/create" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/type/create"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/type/create',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24"
            },
            {
                "id": 3,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 16:55:04",
                "updated_at": "2020-07-06 16:55:04"
            },
            {
                "id": 4,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 17:16:29",
                "updated_at": "2020-07-06 17:16:29"
            },
            {
                "id": 5,
                "name": "颜色",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-09 14:40:53",
                "updated_at": "2020-07-09 14:40:53"
            },
            {
                "id": 6,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:33:57",
                "updated_at": "2020-07-10 11:33:57"
            },
            {
                "id": 7,
                "name": "电脑",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:34:50",
                "updated_at": "2020-07-10 11:34:50"
            },
            {
                "id": 8,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:38",
                "updated_at": "2020-07-10 11:35:38"
            },
            {
                "id": 9,
                "name": "11",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:47",
                "updated_at": "2020-07-10 11:35:47"
            },
            {
                "id": 10,
                "name": "2",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:36:25",
                "updated_at": "2020-07-10 11:36:25"
            },
            {
                "id": 11,
                "name": "啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:40:58",
                "updated_at": "2020-07-10 11:40:58"
            },
            {
                "id": 12,
                "name": "啊啊",
                "sort": 11,
                "details": "",
                "created_at": "2020-07-10 11:41:38",
                "updated_at": "2020-07-10 11:41:38"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 12:01:30",
                "updated_at": "2020-07-10 12:01:30"
            },
            {
                "id": 14,
                "name": "啊实打实大撒",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:17:43",
                "updated_at": "2020-07-10 16:17:43"
            },
            {
                "id": 15,
                "name": "手表",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:19:24",
                "updated_at": "2020-07-10 16:19:24"
            },
            {
                "id": 16,
                "name": "码数",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-14 11:08:54",
                "updated_at": "2020-07-14 11:08:54"
            },
            {
                "id": 17,
                "name": "码数",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-14 17:27:28",
                "updated_at": "2020-07-14 17:27:28"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/type/create`


<!-- END_0e504f0c18c229c2076a25f06ee1defe -->

<!-- START_def4ed48d2f7f93b9349022bcccc02e3 -->
## store
保存分类

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/admin/type" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u901a\u7528\u7c7b\u578b","spec_id":"[1]","sort":100}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/type"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u901a\u7528\u7c7b\u578b",
    "spec_id": "[1]",
    "sort": 100
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/admin/type',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '通用类型',
            'spec_id' => '[1]',
            'sort' => 100,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "创建成功",
    "data": {
        "type": {
            "name": "通用类型",
            "sort": "100",
            "updated_at": "2020-07-14 10:57:26",
            "created_at": "2020-07-14 10:57:26",
            "id": 26,
            "spec": [
                {
                    "id": 1,
                    "name": "通用",
                    "sort": 100,
                    "details": "",
                    "created_at": "2020-07-06 17:18:24",
                    "updated_at": "2020-07-06 17:18:24",
                    "pivot": {
                        "type_id": 26,
                        "spec_id": 1
                    }
                }
            ]
        }
    }
}
```

### HTTP Request
`POST admin-api/admin/type`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 类型名称
        `spec_id` | array |  required  | 属性名ID
        `sort` | integer |  required  | 排序
    
<!-- END_def4ed48d2f7f93b9349022bcccc02e3 -->

<!-- START_ace288eb7da4e0c155017dee04a9c02a -->
## show
查询类型(单一)

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/type/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/type/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/type/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "type": [
            {
                "id": 1,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-06 16:55:33",
                "updated_at": "2020-07-06 16:55:33"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/type/{type}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  required  | 类型ID

<!-- END_ace288eb7da4e0c155017dee04a9c02a -->

<!-- START_de9e268079f85cac20529b55d6169b88 -->
## edit
编辑类型

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/type/1/edit" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/type/1/edit"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/type/1/edit',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "type": [
            {
                "id": 1,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-06 16:55:33",
                "updated_at": "2020-07-06 16:55:33",
                "spec": [
                    {
                        "id": 1,
                        "name": "通用",
                        "sort": 100,
                        "details": "",
                        "created_at": "2020-07-06 17:18:24",
                        "updated_at": "2020-07-06 17:18:24",
                        "pivot": {
                            "type_id": 1,
                            "spec_id": 1
                        }
                    },
                    {
                        "id": 3,
                        "name": "内存",
                        "sort": 10,
                        "details": "",
                        "created_at": "2020-07-06 16:55:04",
                        "updated_at": "2020-07-06 16:55:04",
                        "pivot": {
                            "type_id": 1,
                            "spec_id": 3
                        }
                    }
                ]
            }
        ],
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24"
            },
            {
                "id": 3,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 16:55:04",
                "updated_at": "2020-07-06 16:55:04"
            },
            {
                "id": 4,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 17:16:29",
                "updated_at": "2020-07-06 17:16:29"
            },
            {
                "id": 5,
                "name": "颜色",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-09 14:40:53",
                "updated_at": "2020-07-09 14:40:53"
            },
            {
                "id": 6,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:33:57",
                "updated_at": "2020-07-10 11:33:57"
            },
            {
                "id": 7,
                "name": "电脑",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:34:50",
                "updated_at": "2020-07-10 11:34:50"
            },
            {
                "id": 8,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:38",
                "updated_at": "2020-07-10 11:35:38"
            },
            {
                "id": 9,
                "name": "11",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:47",
                "updated_at": "2020-07-10 11:35:47"
            },
            {
                "id": 10,
                "name": "2",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:36:25",
                "updated_at": "2020-07-10 11:36:25"
            },
            {
                "id": 11,
                "name": "啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:40:58",
                "updated_at": "2020-07-10 11:40:58"
            },
            {
                "id": 12,
                "name": "啊啊",
                "sort": 11,
                "details": "",
                "created_at": "2020-07-10 11:41:38",
                "updated_at": "2020-07-10 11:41:38"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 12:01:30",
                "updated_at": "2020-07-10 12:01:30"
            },
            {
                "id": 14,
                "name": "啊实打实大撒",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:17:43",
                "updated_at": "2020-07-10 16:17:43"
            },
            {
                "id": 15,
                "name": "手表",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:19:24",
                "updated_at": "2020-07-10 16:19:24"
            },
            {
                "id": 16,
                "name": "码数",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-14 11:08:54",
                "updated_at": "2020-07-14 11:08:54"
            },
            {
                "id": 17,
                "name": "码数",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-14 17:27:28",
                "updated_at": "2020-07-14 17:27:28"
            }
        ]
    }
}
```

### HTTP Request
`GET admin-api/admin/type/{type}/edit`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  required  | 类型ID

<!-- END_de9e268079f85cac20529b55d6169b88 -->

<!-- START_c088a6963d9a5b955ead8e241e768997 -->
## update
更新类型

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/admin-api/admin/type/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"name":"\u901a\u7528\u7c7b\u578b1","spec_id":"[1]","sort":100}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/type/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "name": "\u901a\u7528\u7c7b\u578b1",
    "spec_id": "[1]",
    "sort": 100
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/admin-api/admin/type/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'name' => '通用类型1',
            'spec_id' => '[1]',
            'sort' => 100,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "更新成功",
    "data": {
        "type": {
            "name": "通用类型1",
            "sort": "100",
            "updated_at": "2020-07-14 10:57:26",
            "created_at": "2020-07-14 10:57:26",
            "id": 26,
            "spec": [
                {
                    "id": 1,
                    "name": "通用",
                    "sort": 100,
                    "details": "",
                    "created_at": "2020-07-06 17:18:24",
                    "updated_at": "2020-07-06 17:18:24",
                    "pivot": {
                        "type_id": 26,
                        "spec_id": 1
                    }
                }
            ]
        }
    }
}
```

### HTTP Request
`PUT admin-api/admin/type/{type}`

`PATCH admin-api/admin/type/{type}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  required  | 类型ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 类型名称
        `spec_id` | array |  required  | 属性名ID
        `sort` | integer |  required  | 排序
    
<!-- END_c088a6963d9a5b955ead8e241e768997 -->

<!-- START_4961ae06d4b7ea14ac8f1358d26b17fe -->
## delete
删除分类

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/admin-api/admin/type/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/type/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/admin-api/admin/type/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "删除成功",
    "data": []
}
```

### HTTP Request
`DELETE admin-api/admin/type/{type}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  required  | 类型ID

<!-- END_4961ae06d4b7ea14ac8f1358d26b17fe -->

#User

用户接口
<!-- START_7db60fa119816a6bc4e3227b905c7511 -->
## index
用户列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/admin/user?current_page=1&per_page=10" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/user"
);

let params = {
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/admin/user',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'query' => [
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "用户查询成功",
    "data": {
        "brand": {
            "current_page": 1,
            "data": [
                {
                    "id": 3,
                    "openid": "345",
                    "nickname": "知了",
                    "avatar": "http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/DYAIOgq83eqZ59TwKO4IBDXWFmmLuDN2gDJbiaVxwrqHAMPksJbUfzXSnpnDbJwv9UJj00etocicgPfoSGpPSL7w\/132",
                    "mobile": "13174797037",
                    "sex": 2,
                    "unique_code": "334456",
                    "pid": {
                        "id": 2,
                        "openid": "234",
                        "nickname": "X",
                        "avatar": "http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/P78kJjgI0cWkJ8vDh9FssKY3V51x49jMib4d5ic4YGNwcKlSd9NmZhF2pI2LmrkdLKrx9Dkc33Wyld0MQt9KWDJQ\/132",
                        "mobile": "13174797057",
                        "sex": 2,
                        "unique_code": "223344",
                        "pid": 1,
                        "ppid": 0,
                        "status": 1,
                        "created_at": "2020-07-14 17:41:01",
                        "updated_at": "2020-07-14 17:41:04"
                    },
                    "ppid": {
                        "id": 1,
                        "openid": "123",
                        "nickname": "五岁",
                        "avatar": "http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/umxqic2CHGySYhT47Rz03eLUyxpNCic7XP2O9k9Hez1GSo0VDoA6iaWConpADX06jcWnavWhfQbcXJt5tLSUwia4Fw\/132",
                        "mobile": "18107120122",
                        "sex": 1,
                        "unique_code": "123456",
                        "pid": 0,
                        "ppid": 0,
                        "status": 1,
                        "created_at": "2020-07-14 17:40:19",
                        "updated_at": "2020-07-15 09:17:30"
                    },
                    "status": 1,
                    "created_at": "2020-07-14 17:41:59",
                    "updated_at": "2020-07-14 17:42:01"
                },
                {
                    "id": 2,
                    "openid": "234",
                    "nickname": "X",
                    "avatar": "http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/P78kJjgI0cWkJ8vDh9FssKY3V51x49jMib4d5ic4YGNwcKlSd9NmZhF2pI2LmrkdLKrx9Dkc33Wyld0MQt9KWDJQ\/132",
                    "mobile": "13174797057",
                    "sex": 2,
                    "unique_code": "223344",
                    "pid": {
                        "id": 1,
                        "openid": "123",
                        "nickname": "五岁",
                        "avatar": "http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/umxqic2CHGySYhT47Rz03eLUyxpNCic7XP2O9k9Hez1GSo0VDoA6iaWConpADX06jcWnavWhfQbcXJt5tLSUwia4Fw\/132",
                        "mobile": "18107120122",
                        "sex": 1,
                        "unique_code": "123456",
                        "pid": 0,
                        "ppid": 0,
                        "status": 1,
                        "created_at": "2020-07-14 17:40:19",
                        "updated_at": "2020-07-15 09:17:30"
                    },
                    "ppid": 0,
                    "status": 1,
                    "created_at": "2020-07-14 17:41:01",
                    "updated_at": "2020-07-14 17:41:04"
                },
                {
                    "id": 1,
                    "openid": "123",
                    "nickname": "五岁",
                    "avatar": "http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/umxqic2CHGySYhT47Rz03eLUyxpNCic7XP2O9k9Hez1GSo0VDoA6iaWConpADX06jcWnavWhfQbcXJt5tLSUwia4Fw\/132",
                    "mobile": "18107120122",
                    "sex": 1,
                    "unique_code": "123456",
                    "pid": 0,
                    "ppid": 0,
                    "status": 1,
                    "created_at": "2020-07-14 17:40:19",
                    "updated_at": "2020-07-15 09:17:30"
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": "10",
            "prev_page_url": null,
            "to": 3,
            "total": 3
        }
    }
}
```

### HTTP Request
`GET admin-api/admin/user`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `mobile` |  optional  | 手机号
    `sex` |  optional  | 性别[1:男, 2:女]
    `nickname` |  optional  | 昵称
    `status` |  optional  | 状态[1:正常, 2:禁用]
    `pid_phone` |  optional  | 推荐人手机号
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_7db60fa119816a6bc4e3227b905c7511 -->

<!-- START_e2c87a7b4fe9764a67ed7e2d93501c82 -->
## status
更改用户状态

> Example request:

```bash
curl -X PATCH \
    "http://192.168.0.178:8888/admin-api/admin/user/status/1" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"status":"2"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/admin/user/status/1"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "status": "2"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://192.168.0.178:8888/admin-api/admin/user/status/1',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'status' => '2',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PATCH admin-api/admin/user/status/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | 用户ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `status` | required |  optional  | 状态[1:正常, 2:禁用]
    
<!-- END_e2c87a7b4fe9764a67ed7e2d93501c82 -->

#Z-Other


<!-- START_c1ebba912b77a4efd01b64e716849b88 -->
## uploadImages
上传图片

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/images" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"images":{"":"culpa"}}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/images"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "images": {
        "": "culpa"
    }
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/images',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'images' => [
                '' => 'culpa',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST admin-api/images`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `images[]` | file |  optional  | 图片文件
    
<!-- END_c1ebba912b77a4efd01b64e716849b88 -->

<!-- START_a3eea0fd8825e3c81fa5f6fc2c0bf327 -->
## uploadVideo
上传视频

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/admin-api/video" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*" \
    -d '{"video":"culpa"}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/video"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

let body = {
    "video": "culpa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/admin-api/video',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
        'json' => [
            'video' => 'culpa',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST admin-api/video`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `video` | file |  optional  | 视频文件
    
<!-- END_a3eea0fd8825e3c81fa5f6fc2c0bf327 -->

<!-- START_5bb04da3c9782aac4edc211c594429ed -->
## area
获取全国地区

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/admin-api/areas/culpa" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: */*"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/admin-api/areas/culpa"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "*/*",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/admin-api/areas/culpa',
    [
        'headers' => [
            'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET admin-api/areas/{type?}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  optional  | boolean 是否更新地区缓存[true:更新 false:不更新] 默认不更新

<!-- END_5bb04da3c9782aac4edc211c594429ed -->


